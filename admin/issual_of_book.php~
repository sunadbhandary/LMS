<?php
	require_once("../includes/initialize.php");
	$max_no_books = 3;

	function reservation_table_delete($db , $book_id , $card_number)
	{
		$db->query("DELETE FROM `reservation table` WHERE `book id` = $book_id AND `user id` = $card_number");
	}

	function live_transaction_insert($db , $book_id , $card_number)
	{
		//already issued case : handle;
		$ispresent = $db->fetch_array($db->query("SELECT * FROM `live transaction` WHERE `book id` = $book_id AND `user id` = 					$card_number"));
		if(!$ispresent)
		{
			date_default_timezone_set('Asia/Calcutta');

			$info = getdate( time());
			$date = $info['mday'];
			$month = $info['mon'];
			$year = $info['year'];

			$date_of_issual = "$year-$month-$date";

			$info = getdate( time() + 60*60*24*14);
			$date = $info['mday'];
			$month = $info['mon'];
			$year = $info['year'];

			$due_date = "$year-$month-$date";

			$db->query("INSERT INTO `live transaction` (`user id`, `book id`, `date of issual`, `due date`) VALUES ('$card_number', '$book_id', '$date_of_issual', '$due_date');");

			return true;
		}
		else
		{	
			echo "The book is already issued to this person.";
			return false;
		}	
	}

	function book_status_update($db , $book_id)
	{
		$db->query("UPDATE `table 3` SET `Status` = 'not available' WHERE `Id` = $book_id");
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
	span.so
	{
		font-size:20px;
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
			<div class="span10">
				<div class="tab-content">			


<?php
	extract($_GET);

	$issued_status = false;

	if( isset($book_id) && $book_id != "" && isset($card_number) && $card_number != "" )
	{}
	else
	{
		die("INVALID DETAILS");
	}

	//check wether it is a valid book id
	//check wether usn is valid or not

	if( 	!$db->fetch_array(   $db->query("SELECT * FROM `user` WHERE `Card Number` = $card_number")   )  
		||  !$db->fetch_array( $db->query( "SELECT * FROM `table 3` WHERE `Id` = $book_id") )  
	  )
	{
		die("INVALID DETAILS , PLEASE CHECK THE DETAILS");
	}


	//check that card_number is elligible to get issual

	$result = $db->query("SELECT COUNT(*) FROM `live transaction`  WHERE `user id` = $card_number");
	$books_possesed = $db->fetch_array($result);
	$no_books_possesed = $books_possesed[0];

	if( $no_books_possesed < $max_no_books)
	{
		//check if the book is reserved..
		$book_reserved = $db->fetch_array($db->query("SELECT * FROM `reservation table` WHERE `book id` = $book_id"));

		//for safety checking the book status as well.
			//if the book is available.
		$res = $db->query("SELECT * FROM `table 3` WHERE `status` = 'available' AND `reference` = 'No' AND `Id`=$book_id");
		$issuable = $db->fetch_array( $res);

		if( $issuable )
		{
			if($book_reserved)
			{
		
			  $person_reserved=$db->fetch_array($db->query("SELECT `user id` FROM `reservation table` WHERE `book id`=$book_id"));
			  $person_same = ( $person_reserved[0] == $card_number );

			  if(  $person_same )
			  {
				//put an entry in the live transaction table.

				//reservation table delete
				reservation_table_delete($db , $book_id , $card_number);			

				//live transaction insert
				 $issue_status = live_transaction_insert($db , $book_id , $card_number);
			
				//book status update
				book_status_update($db , $book_id);
			
			  }
			  else
			  {
				echo "<span class=\"so\">Cannot issue book as the book is reserved by some other person</span>";
			  }
			}
			else
			{
				//live transaction insert
				 $issue_status = live_transaction_insert($db , $book_id , $card_number);
			
				//book status update
				book_status_update($db , $book_id);
			}
		}
		else
		{
			echo "<span class=\"so\">Cannot issue book as the book is not available for issuing</span>";
		}

	}
	else
	{
		echo "<span class=\"so\">Cannot issue book as number books issued is at max $max_no_books</span>";
	}

	if($issue_status)
	{
		echo "<span class=\"so\">The book is issued successfully</span>";
	}
?>
				</div>
			</div>
		</div>
	</div>
	
  </body>
</html>

