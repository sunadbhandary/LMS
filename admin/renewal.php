<?php

require_once("../includes/initialize.php");

// Redirect to index page if not logged in
if(!$session->is_logged_in()) {
  	redirect_to("../login.php");
}
$user = User::find_by_id($_GET["card"]);

function fetch($books)
{
	

	$i =0;
	global $db;
	$book_ids;
	while($book= $db->fetch_array($books))
	{
		$book_ids[$i] = $book[0];
		$i = $i +1;
	}
	return $book_ids;
}
$query_ids =($db->query("SELECT `book id` FROM `live transaction` WHERE `user id`={$user->Card_Number}"));
$book_ids = fetch($query_ids);
$index = $_GET["index"];
$query = "SELECT `status` FROM `reservation table` WHERE `book id`={$book_ids[$index]}";
$reserved = $db->fetch_array($db->query($query));
$reserved = $reserved[0];
//echo $reserved;
if($reserved)
{
	
}
else
{
	

	//echo "Renewal";
	//echo $book_ids[$index];
	date_default_timezone_set('Asia/Kolkata');
	$info = getdate();
	$date = $info['mday'];
	$month = $info['mon'];
	$year = $info['year'];
	$today = "$year-$month-$date";
	$today = Date($today);

	$duedate = date('Y-m-d',strtotime($today." +14 days"));

	$query = "UPDATE `live transaction` SET `date of issual`='{$today}', `due date`='{$duedate}' WHERE `user id`='{$user->Card_Number}' AND `book id`= '{$book_ids[$index]}' ";
	$db->query($query);
}
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
             <li><a href="admin_home.php">Home</a></li>
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
						<li><a href="issue_books.php" data-toggle="tab"><b>Issue Books to Students</b></a></li><br/>
						<li class="active"><a href="current.php" data-toggle="tab"><b>Current</b></a></li><br/>
						<li><a href="suggestion_admin.php" data-toggle="tab"><b>Suggestion Box</b></a></li><br/>
						<li><a href="books.php" data-toggle="tab"><b>Book Details</b></a></li><br/>
						<li><a href="users.php" data-toggle="tab"><b>User Details</b></a></li><br/>
						<li><a href="view_Recommender.php" data-toggle="tab"><b>Recommended Books</b></a></li><br/>
						<li><a href="update.php" data-toggle="tab"><b>Reminders and Update</b></a></li><br/>
					</ul>
				</div>
				
			</div>
			<div class="span10">
				<div class="tab-content">
					<?php if($reserved) echo("Someone has reserved the book!"); else echo("Renewed Successfully!!"); ?>
				</div>
			</div>
		</div>
	</div>
	
  </body>
</html>
