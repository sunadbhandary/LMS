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
      span.h3size
      {
	font-size:22px;
      }
      span.h4size
      {
	font-size:16px;
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
						<li class="active"><a href="#" data-toggle="tab"><b>Search Books</b></a></li><br/>
						<li><a href="../recommend/suggest.php" data-toggle="tab"><b>Suggest Books</b></a></li><br/>
						<li><a href="../profile/profile.php" data-toggle="tab"><b>Profile</b></a></li><br/>
						<li><a href="../changepwd/changepwd.php" data-toggle="tab"><b>Change Password</b></a></li><br/>
						<li><a href="../suggestions/suggest.php" data-toggle="tab"><b>Suggestion Box</b></a></li><br/>
					</ul>
				</div>
				
			</div>
			<div class="span10">
				<div class="tab-content">
				
				<?php
					$map = $db->query("SELECT `review id` FROM `review` WHERE `book id` = $_GET[id] ");
$r_id= $db->fetch_array($map);

$sql="SELECT `comments` FROM `review table` WHERE `review id`='$r_id[0]'";

$comments_array = $db->query($sql);


echo "<p><span class=\"h3size\">".$_GET["title"]."</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-<span class=\"h4size\">".$_GET["author"]."</span></p><br>";

if($comments_array && $db->num_rows($comments_array) > 0) 
{
echo " <table class=\"table table-hover\" cellpadding='2' cellspacing='4'> "; 

while($row=$db->fetch_array($comments_array))
{
	$id_array=$db->query(" SELECT `card id` FROM `review table` WHERE `review id`='$r_id[0]' AND `comments` = '$row[0]' ");
	$card_number=$db->fetch_array($id_array);
	
	$name_array=$db->query(" SELECT `Name` FROM `user` WHERE `Card Number` = '$card_number[0]' ");
	$name=$db->fetch_array($name_array);
	
		echo "<tr>";
			echo "<td width='300'>" .$row[0]. "</td>";
			echo "<td>" ."&nbsp&nbsp&nbsp&nbsp"."-".$name[0]. "</td>";
		echo "</tr>";
	
}
echo "</table>";
}
else
{
echo "No reviews found";
}

?>
				</div>
				<form action="comment.php?bookid=<?=$_GET[id]?>" method="post">
				<br />
Write your comments here..
<br />
<textarea id="feedbackText" name="comment"> 
</textarea>
<br />
<input type="submit">

<br />
</form>
			<br><br><p id="save_button"><input  id="subbutton" type="button" value="Reserve" class="btn btn-success" onclick="location.href='../reserve/reserve.php?bookid=<?=$_GET[id]?>'" /></p>			
			</div>
				
		</div>
		
	</div>
	
  </body>
</html>
