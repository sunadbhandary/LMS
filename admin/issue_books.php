<?php

require_once("../includes/initialize.php");

// Redirect to index page if not logged in
if(!$session->is_logged_in()) {
  	redirect_to("../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PES Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This is the admin issuing page">
    <meta name="author" content="MadhurKapoor;AnandAgarwal">
	
	<link href="../css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      div.hero
	  {
		background-color:#f5f5f5;
		position:relative;
		width:80%;
		border:2px solid white;
		border-radius:10px;
	  }
	  div#indent-block
	  {
		position:relative;
		left:10px;
	  }
	  div.lead
	  {
		overflow:visible;
		position:relative;
	  }
	  body 
	  {
        padding-top: 60px;
        padding-bottom: 40px;
      }
	   .sidebar-nav 
	  {
        padding: 9px 0;
      }
	  div.margin
	  {	
		position:relative;
		top:10px;
		left:10px;
	  }
	small
	{
		font-style:italic;
	}
	</style>
  </head>
  
  <body>
  <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">PES Library</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link"><?=$_SESSION['id']?></a>&nbsp;
			  <button class="btn btn-inverse" onclick="location.href='../logout.php?logout';">SignOut&nbsp;</button>
            </p>
            <ul class="nav">
              <li><a href="admin_home.php">Home</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
	<div style="text-align:center;" class="container">
		<p class="lead"><h2>Welcome to the PES Library!!</h2></p>
	</div>
	<hr/>
	
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span2">
				<div class="well sidebar-nav">
					<ul class="nav nav-list">
						<li class="active"><a href="issue_books.php" data-toggle="tab"><b>Issue Books to Students</b></a></li><br/>
						<li><a href="current.php" data-toggle="tab"><b>Current</b></a></li><br/>
						<li><a href="suggestion_admin.php" data-toggle="tab"><b>Suggestion Box</b></a></li><br/>
						<li><a href="books.php" data-toggle="tab"><b>Book Details</b></a></li><br/>
						<li><a href="users.php" data-toggle="tab"><b>User Details</b></a></li><br/>
						<li><a href="view_Recommender.php" data-toggle="tab"><b>Recommended Books</b></a></li><br/>
						<li><a href="update.php" data-toggle="tab"><b>Reminders and Update</b></a></li><br/>
					</ul>
				</div>
				
			</div>
			<div class="span9">
				<div class="tab-content">
					<div class="hero">
						<div class="lead margin">
						<form  action = "issual_of_book.php" method="get"  >
							<table border="0">
								<tr>
									<td><label><b>BOOK ID : &nbsp;</b></label></td>
									<td><input type="text" value="" name="book_id"></td>
									<td><p style="font-size:14px;position:relative;left:5px;bottom:5px;"><small>&nbsp;*required</small></p></td>
								</tr>
								<tr>
									<td><label><b>CARD NUMBER : &nbsp;</b></label></td>
									<td><input type="text" value="" name="card_number"></td>
									<td><p style="font-size:14px;position:relative;left:5px;bottom:5px;"><small>&nbsp;*required</small></p></td>
								</tr>
								<tr>
									<td></td>
									<td style="position:absolute;top:-2px;right:20px;"><input type = "submit" value="Issue" class="btn btn-primary"/></td>
								</tr>
							</table>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
  </body>
</html>
