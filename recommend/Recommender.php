<?php
require_once("../includes/initialize.php");
$user = User::find_by_id($_SESSION['id']);

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
              <li><a href="../student_home/student_home.php">Home</a></li>
              <li><a href="../student_home/about.php">About</a></li>
              <li><a href="../student_home/contact.php">Contact</a></li>
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
						<li><a href="../issued/issued.php" data-toggle="tab"><b>Issued Books</b></a></li><br/>
						<li><a href="../search/search.php" data-toggle="tab"><b>Search Books</b></a></li><br/>
						<li  class="active"><a href="#" data-toggle="tab"><b>Suggest Books</b></a></li><br/>
						<li><a href="../profile/profile.php" data-toggle="tab"><b>Profile</b></a></li><br/>
						<li><a href="../changepwd/changepwd.php" data-toggle="tab"><b>Change Password</b></a></li><br/>
						<li><a href="../suggestions/suggest.php" data-toggle="tab"><b>Suggestion Box</b></a></li><br/>
					</ul>
				</div>
				
			</div>
			<div class="span9">
				<div class="tab-content">
					<div class="hero">
						<div class="lead">
							<p>&nbsp;Recommend a Book</p>
							<hr/>
							<div id="indent-block">
								<?php>
								$sql= "INSERT INTO `recommender` (`userid`, `title`, `authors` , `edition` , `publisher` ,`feedback`) VALUES
		('$user->Card_Number', '$_POST[title]', '$_POST[authors]', '$_POST[edition]' , '$_POST[publisher]' , '$_POST[feedback]')";							
									if (!$db->query($sql))
									{
										$upd="UPDATE `recommender` SET `authors`='$_POST[authors]', edition='$_POST[edition]', publisher='$_POST[publisher]', feedback='$_POST[feedback]' WHERE `userid`='$user->Card_Number' AND `title`='$_POST[title]' ";
  										$db->query($upd);
										
									}
									echo 'Your request has been registered. We will look into the request and take the necessary action.';
								?>
