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
    <meta name="description" content="This is the student search page">
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
	</style>
<script type="text/javascript" src="../css/jquery.js"></script>
<script>
function suggest(inputString){
if(inputString.length == 0) {
$('#suggestions').fadeOut();
} else {
var select=document.getElementById("type");
var typ=select.options[select.selectedIndex].value;
$.ajax({
url: "autocomplete.php",
data: 'act=search&type='+typ+'&queryString='+inputString,
success: function(msg){
if(msg.length >0) {
$('#suggestions').fadeIn();
$('#suggestionsList').html(msg);
//$('#category').removeClass('load');
}
}
});
}
}

</script>

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
						<li><a href="issue_books.php" data-toggle="tab"><b>Issue Books to Students</b></a></li><br/>
						<li><a href="current.php" data-toggle="tab"><b>Current</b></a></li><br/>
						<li><a href="suggestion_admin.php" data-toggle="tab"><b>Suggestion Box</b></a></li><br/>
						<li class="active"><a href="books.php" data-toggle="tab"><b>Book Details</b></a></li><br/>
						<li><a href="users.php" data-toggle="tab"><b>User Details</b></a></li><br/>
						<li><a href="view_Recommender.php" data-toggle="tab"><b>Recommended Books</b></a></li><br/>
						<li><a href="update.php" data-toggle="tab"><b>Reminders and Update</b></a></li><br/>
					</ul>
				</div>
				
			</div>
			<div class="span9">
				<div class="tab-content">
					<div class="hero">
						<div class="lead">
							<p>&nbsp;Search for a Book</p>
							<hr/>
							<div id="indent-block">
							<table border="0" cellpadding="5">
								<tr>
									<td><label><b>Search : </b></label></td>
									<td><input type="text" value="" id="name" onkeyup="suggest(this.value);"  class="name"></td>
									<td>
										<select name="type" id="type">
											<option value="title" selected>By Title</option>
											<option value="auth">By Author</option>
											<option value="key">By Keyword</option>

										</select>
									</td>
								</tr>
								
							</table>
							</div>
						</div>
					</div>
<?
$string='';

?>
<br/>
<div id="suggestions"> <div id="suggestionsList"> <?php /*&nbsp; */ echo $string ;?> </div>

</div>


				</div>
			</div>
		</div>
	</div>
	
  </body>
</html>
