<!--information page-->

<?php

require_once("../includes/initialize.php");

// Redirect to index page if not logged in
if(!$session->is_logged_in()) {
  	redirect_to("../login.php");
}
$user = User::find_by_id($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PES Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This is the student home page">
    <meta name="author" content="MadhurKapoor;AnandAgarwal">
	
	<link href="../css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body 
	  {
        padding-top: 60px;
        padding-bottom: 40px;
      }
	   .sidebar-nav 
	  {
        padding: 9px 0;
      }
span.underl
	{
		font-weight:900;
		font-size:16px;
		color:#29A3CC;
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
              Logged in as <a href="#" class="navbar-link"><?= $user->Name?></a>&nbsp;
			  <button class="btn btn-inverse" onclick="location.href='../logout.php?logout';">SignOut&nbsp;</button>
            </p>
            <ul class="nav">
              <li><a href="student_home.php">Home</a></li>
              <li class="active"><a href="#">About</a></li>
              <li><a href="contact.php">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
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
						<li ><a href="../issued/issued.php" data-toggle="tab"><b>Issued Books</b></a></li><br/>
						<li><a href="../search/search.php" data-toggle="tab"><b>Search Books</b></a></li><br/>
						<li><a href="../recommend/suggest.php" data-toggle="tab"><b>Suggest Books</b></a></li><br/>
						<li><a href="../profile/profile.php" data-toggle="tab"><b>Profile</b></a></li><br/>
						<li><a href="../changepwd/changepwd.php" data-toggle="tab"><b>Change Password</b></a></li><br/>
						<li><a href="../suggestions/suggest.php" data-toggle="tab"><b>Suggestion Box</b></a></li><br/>
					</ul>
				</div>
				
			</div>
			<div class="span10">
				<div class="tab-content">
				<span class="underl">Library Mission</span>
			<p>
				To provide continuous access to the Knowledge and Information in the Library to the students and faculty of the Institute for achieving excellence in their chosen disciplines.
			</p>
			<span class="underl">OPAC (Online Public Access Catalogue)</span>
			<p>
				Allows users to search all materials available in the library collection. Only Library Members can access full material by using their User ID and Password..  
			</p>
			<span class="underl">Library and Technology</span>
			<p>
				The libraries at PES occupy over 40,000 square feet and provide students with access to a vast repository of resources, including books and periodicals. These peaceful, sunlit areas provide ideal study spaces. Our libraries remain open until midnight on all days. During the examinations, they are open 24 hours. Completely automated library management systems make it possible to borrow books at any time of the day or night, as well as make reservations online. Multiple copies ensure that resources are easily available for reference in the library. Trained staff is always at hand to assist students. In addition to these resources, faculty members dynamically upload all their lecture and research notes on the PES Intranet. These are available to the students with the simple keying in of a password
			</p>
			<p>
				We strive to make learning more creative, interactive and information driven by using sophisticated delivery techniques. At PES, 40 different computer laboratories across the campuses house over a thousand computers for use by students and staff. High-end, sophisticated computing facilities are available to meet project requirements and encourage research.	
			</p>	
				</div>
			</div>
		</div>
	</div>
	
  </body>
</html>
