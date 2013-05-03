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
        font-weight:800;
      }
      span.h4size
      {
	font-size:16px;
	font-weight:600;
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
              Logged in as <a href="#" class="navbar-link"><?= $_SESSION['id']?></a>&nbsp;
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
						<li><a href="current.php" data-toggle="tab"><b>Current</b></a></li><br/>
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
<?php

//query for the book and title
extract($_GET);

echo "<span class=\"h3size\">".$title."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp<span class=\"h4size\"> - ".$author."</span><br/>";

if( isset($title) && isset($author) && $title != "" && $author != "")
{
}
else
{
	die("Title and Author was not recieved correctly");
}

$column_names = " `Id`";

$query_string = "SELECT $column_names FROM `table 3` WHERE `Title` LIKE '$title' AND `Authors` LIKE '$author' LIMIT 0, 30 ";

$books_result = $db->query($query_string);


if( isset($books_result) && $books_result != "")
{
}
else
{
	die("Query unsuccessful..");
}

//Query is successful.
//$book_result is an collection of rows

echo "<br/><table class=\"table table-hover\" border = '0'>";
echo "<tr><th>Book Id</th><th>Id of Book Holder</th><th>Name of Book Holder</th></tr>"; 
while($row = $db->fetch_array($books_result))
{
	echo "<tr>";

	echo "<td>";
	$some_book_id = $row[0];
	echo $row[0]."&nbsp;&nbsp;&nbsp";
	echo "</td>";
	
	
		//we have book id;
	$user_query="SELECT * FROM `user` WHERE `Card Number` =  ANY (  SELECT  `user id` FROM `live transaction` WHERE `book id` = $row[0] )";

	$user_detail = $db->fetch_array($db->query($user_query));
		//==> according to the live transaction table only one user can have a book id in his possession.
	if($user_detail)
	{
		echo "<td>";
		echo $user_detail[0]."&nbsp;&nbsp;&nbsp</td><td>".$user_detail[1];
		echo "</td>";
	}
	else
	{
		echo "<td>";
		echo	"NOT RESERVED"."</td><td>"."NONE";
		echo "</td>";
	}
	
	echo "</tr>";
}
echo "</table>";
//comments of the books
$comment_query = "SELECT `comments` FROM `review table` WHERE `review id` = ANY(SELECT `review id` FROM `review` WHERE `book id` =$some_book_id)";
$comments = $db->query($comment_query);

echo "<br/><h3>Comments : </h3>";
echo "<ul>";
while($row = $db->fetch_array($comments))
{
	echo "<li>".$row[0]."</li>";	
}
echo "</ul>";
?>
				</div>
			</div>
		</div>
	</div>
	
  </body>
</html>
