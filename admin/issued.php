<?php

require_once("../includes/initialize.php");

// Redirect to index page if not logged in
if(!$session->is_logged_in()) {
  	redirect_to("../login.php");
}
$user = User::find_by_id($_POST['Card_Number']);
$i=0;
$book_names;
$query_ids =($db->query("SELECT `book id` FROM `live transaction` WHERE `user id`={$user->Card_Number}"));

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

$book_ids = fetch($query_ids);

$no_books= count($book_ids);
if($no_books>0)
{
	$query_names =($db->query("SELECT * FROM `table 3` WHERE `Id`={$book_ids[0]} "));
	$book1 = $db->fetch_array($query_names);
}
if($no_books>1)
{
	$query_names =($db->query("SELECT * FROM `table 3` WHERE `Id`={$book_ids[1]} "));
	$book2 = $db->fetch_array($query_names);
}
if($no_books>2)
{
	$query_names =($db->query("SELECT * FROM `table 3` WHERE `Id`={$book_ids[2]} "));
	$book3 = $db->fetch_array($query_names);
}
$query_issues =($db->query("SELECT `date of issual` FROM `live transaction` WHERE `user id`={$user->Card_Number}"));
$issue = fetch($query_issues);

$query_dues =($db->query("SELECT `due date` FROM `live transaction` WHERE `user id`={$user->Card_Number}"));
$due_dates = fetch($query_dues);
//print_r($due_dates);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
		<script type="text/javascript">
		var fine_pay_1=0;
		var fine_pay_2=0;
		var fine_pay_3=0;
		function fun(x)
		{
		     	return '04-04-2013';

		}		

		function init()
		{
			
			grey_out();
			calculate_fine();
			var fine = fine_pay_1+fine_pay_2+fine_pay_3;
			if(fine>0)
			{
				alert("fine: " + fine);
			}
					
		}
		function grey_out()
		{
			var b1 = document.getElementById("book_title_1");
			var b2 = document.getElementById("book_title_2");
			var b3 = document.getElementById("book_title_3");
			var ren1 = document.getElementById("book1_renew");
			var ren2 = document.getElementById("book2_renew");
			var ren3 = document.getElementById("book3_renew");
			var rem1 = document.getElementById("book1_remove");
			var rem2 = document.getElementById("book2_remove");
			var rem3 = document.getElementById("book3_remove");
			if(b1.innerHTML=="")
			{
				ren1.disabled=true;
				rem1.disabled=true;
				
			}
			if(b2.innerHTML=="")
			{
				ren2.disabled=true;
				rem2.disabled=true;
				
			}
			if(b3.innerHTML=="")
			{
				ren3.disabled=true;
				rem3.disabled=true;
				
			}
		}
		function dateToString(date)
		{
			return date.getFullYear().toString()+"-"+ date.getMonth().toString() + "-"+date.getDate().toString();
		}
		function calculate_fine()
		{
			var fine1 = document.getElementById("fine1");
			var fine2 = document.getElementById("fine2");
			var fine3 = document.getElementById("fine3");
			var today = new Date();	
			var diff=0;
			var due1= toDate(document.getElementById("duedate1").innerHTML);
			//alert(due1);
			var due2= toDate(document.getElementById("duedate2").innerHTML);
			//alert(due2);			
			var due3= toDate(document.getElementById("duedate3").innerHTML);
			//alert(due3);
			if( (diff=difference_of_dates(due1, today))>0)
			{
				//alert(diff);
				if(diff>10) diff = 10 + 5*(diff - 10);	
				fine1.innerHTML=diff;	
				fine_pay_1 = diff;
			}
			if( (diff=difference_of_dates(due2, today))>0)
			{
				//alert(diff);
				if(diff>10) diff = 10 + 5*(diff - 10);
				fine2.innerHTML=diff;
				fine_pay_2 = diff;	
			}
			if( (diff=difference_of_dates(due3, today))>0)
			{

				//alert(diff);
				if(diff>10) diff = 10 + 5*(diff - 10);				
				fine3.innerHTML=diff;
				fine_pay_3 = diff;	
			}
						
		}
		function difference_of_dates( date1, date2)
		{
			
			return (Math.floor((date2.getTime() - date1.getTime())/(1000*60*60*24)));
		}
		function toDate( s)
		{
			var d_array=s.split("-");//0-year,1-month,2-day
			var returnDate = new Date();       
			returnDate.setFullYear(d_array[0],d_array[1]-1,d_array[2]);
			return returnDate;
		}
		
	</script>
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
  
  <body onload="init()">
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
					<table class="table table-hover">
						<tr>
							<th>Book No.</th><th>Book Name</th><th>Issue Date</th><th>Due Date</th><th>Fine</th><th>Action</th><th>Action</th>
						</tr>
						<tr>
							<td>1</td>
							<td id="book_title_1"><?php if($no_books>0) print_r($book1["Title"]); ?></td>
							<td id="issuedate1"><?php if($no_books>0) echo $issue[0];?></td>
							<td id="duedate1"><?php if($no_books>0) echo $due_dates[0];?></td>
							<td id="fine1"></td>
							<td><a href="renewal.php?index=0&card='<?php echo $user->Card_Number;?>'" > <button id ="book1_renew" class="btn" >Renew</button></a></td>
							<td><a href="removal.php?index=0&card='<?php echo $user->Card_Number;?>'" > <button id ="book1_remove" class="btn" >Return</button></a></td>
						</tr>
						<tr>
							<td>2</td>
							<td id="book_title_2"><?php if($no_books>1) print_r($book2["Title"]); ?></td>
							<td id="issuedate2"><?php if($no_books>1) echo $issue[1];?></td>
							<td id="duedate2"><?php if($no_books>1) echo $due_dates[1];?></td>
							<td id="fine2"></td>
							<td><a href="renewal.php?index=1&card='<?php echo $user->Card_Number;?>'" > <button id ="book2_renew" class="btn">Renew</button></a></td>
							<td><a href="removal.php?index=1&card='<?php echo $user->Card_Number;?>'" > <button id ="book2_remove" class="btn" >Return</button></a></td>
						</tr>
						<tr>
							<td>3</td>
							<td id="book_title_3"><?php if($no_books>2) print_r($book3["Title"]); ?></td>
							<td id="issuedate3"><?php if($no_books>2) echo $issue[2];?></td>
							<td id="duedate3"><?php if($no_books>2) echo $due_dates[2];?></td>
							<td id="fine3"></td>
							<td><a href="renewal.php?index=2&card='<?php echo $user->Card_Number;?>'" > <button id ="book3_renew" class="btn" >Renew</button></a></td>
							<td><a href="removal.php?index=2&card='<?php echo $user->Card_Number;?>'" > <button id ="book3_remove" class="btn" >Return</button></a></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	
  </body>
</html>
