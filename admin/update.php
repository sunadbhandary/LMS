<?php
require_once("../includes/initialize.php");
require_once("../includes/PHPMailer/class.phpmailer.php");
require_once("../includes/PHPMailer/class.smtp.php");
require_once("../includes/PHPMailer/language/phpmailer.lang-en.php");

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
    <meta name="description" content="This is the suggestion box page">
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
						<li><a href="issue_books.php" data-toggle="tab"><b>Issue Books to Students</b></a></li><br/>
						<li><a href="current.php" data-toggle="tab"><b>Current</b></a></li><br/>
						<li><a href="suggestion_admin.php" data-toggle="tab"><b>Suggestion Box</b></a></li><br/>
						<li><a href="books.php" data-toggle="tab"><b>Book Details</b></a></li><br/>
						<li><a href="users.php" data-toggle="tab"><b>User Details</b></a></li><br/>
						<li><a href="view_Recommender.php" data-toggle="tab"><b>Recommended Books</b></a></li><br/>
						<li class="active"><a href="#" data-toggle="tab"><b>Reminders and Update</b></a></li><br/>
					</ul>
				</div>
				
			</div>
			<div class="span9">
				<div class="tab-content">
						<div >
							<?php
								date_default_timezone_set('Asia/Kolkata'); // CDT

								$info = getdate();
								$date = $info['mday'];
								$month = $info['mon'];
								$year = $info['year'];
								$today = "$year-$month-$date";
								$today= Date($today);
								$renew_date = date('Y-m-d', strtotime($today . " +2 days"));
								//echo $renew_date;

								$mailer = new PHPMailer();	
								$mailer->IsSMTP();
								$mailer->CharSet = 'utf-8';

								$mailer->Subject = "Your book renewal reminder";
								$mailer->From = "Admin";
								$mailer->Password = "pesitlms";
								$mailer->Host     = "smtp.gmail.com";
								$mailer->Port     = 465;
								$mailer->SMTPAuth = true;
								$mailer->SMTPSecure = "ssl"; 
								$mailer->Username = "librarypesit@gmail.com";
								$mail->FromName = "Admin";
								//$mailer->Body ="Hello ";

								$sql="SELECT `user id` ,`book id` FROM `live transaction` WHERE `due date` = '$renew_date'";
								$book_user  =$db->query($sql);
	
								while($row = $db->fetch_array($book_user))
								{
									$details_array = $db->query("SELECT `Name`,`Email id`,`Title` FROM `user`,`table 3` WHERE `Card Number` = $row[0] AND `Id` = $row[1]");
									while($details_row = $db->fetch_array($details_array))
									{	
										$mailer->AddAddress($details_row[1],$details_row[0]);
										$mailer->Body="Please renew the book ".$details_row[2]." before ".$renew_date." to avoid fine";
										$mailer->Send();
									}
								}
	echo "reminders sent and database updated";
	 

?>
							
						</div>
					</div>
			</div>
		</div>
	</div>
	
  </body>
</html>
