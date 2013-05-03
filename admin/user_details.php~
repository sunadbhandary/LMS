<?php
require_once("../includes/initialize.php");
$user = User::find_by_id($_GET['Card_Number']);
if(!$session->is_logged_in()) {
  	redirect_to("../login.php");
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PES Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This is the student profile page as seen by the admin">
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
	  #save_button
	  {	
		float:right;
		display:inline;
	  }
	  div#indent-block
	  {
	    top:20px;
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
	  sidebar-nav 
	  {
        padding: 9px 0;
      }
	  
	</style>
	<script type="text/javascript">
/*
		function glyph()
		{
			var ele = document.getElementById("add_before_me");
			newele = document.createElement("tr");
			newele.innerHTML = "<td></td><td><input type=\"text\" value=\"\"></td>";
			ele.appendChild( newele, ele.firstChild);
		}
*/

		function on_blur_handler( event )
		{
			if( this.value == "" )
				document.getElementById("Submit_button").disabled = true;
			else
				document.getElementById("Submit_button").disabled = false;
		}

		function values_changed()
		{
			return     username != document.getElementById('username').value
				|| email != document.getElementById('email').value
				|| mobile != document.getElementById('mobile').value
				|| department != document.getElementById('department').value;
		}

		function keep_init_values()
		{
			var username_input = document.getElementById('username');
			var email_input = document.getElementById('email');
			var mobile_input = document.getElementById('mobile');
			var department_input = document.getElementById('department');

			username_input.onblur = on_blur_handler;
			department_input.onblur = on_blur_handler;

			username = username_input.value;
			email = email_input.value;
			mobile = mobile_input.value;
			department = department_input.value;

			//document.write( username + "  " + email + "  " + mobile + "  " + department);
		}

		function create_form()
		{
			var Card_Number = document.getElementById('Card_Number_box');
			Card_Number.innerHTML = " <input type='text' disabled='disabled' id='temp_textbox' name='Card_Number' value='<?= $user->Card_Number?>' > </input>";

			var usrname = document.getElementById('username_box');
			usrname.innerHTML = " <input type='text' id='username' name='username' value='<?= $user->Name?>' > </input>";
			var email = document.getElementById('email_box');
			email.innerHTML = " <input type='text' id='email' name='email' value='<?= $user->email?>' > </input>";
			var mobile = document.getElementById('mobile_box');
			mobile.innerHTML = " <input type='text' id='mobile' name='mobile' value='<?= $user->mobile?>' > </input>";
			var dept = document.getElementById('department_box');
			dept.innerHTML = " <input type='text' id='department'  name='department' value='<?= $user->dept?>' > </input>";

			var cancel_button = document.getElementById("Cancel_button");
			cancel_button.disabled = false;

			var submit_button = document.getElementById("Submit_button");
			submit_button.disabled = false;

			keep_init_values();

			document.getElementById("form").onsubmit = submit_form;
		}

		function cancel_edit()
		{
			var Card_Number = document.getElementById('Card_Number_box');
			Card_Number.innerHTML = "<label name='Card_Number'> <?= $user->Card_Number?> </label>";
			var usrname = document.getElementById('username_box');
			usrname.innerHTML = "<label name='username'> <?= $user->Name?> </label>"
			var email = document.getElementById('email_box');
			email.innerHTML = "<label name='email'> <?=$user->email?> </label>";
			var mobile = document.getElementById('mobile_box');
			mobile.innerHTML = "<label name='mobile'> <?=$user->mobile?> </label>";
			var dept = document.getElementById('department_box');
			dept.innerHTML = "<label name='department'> <?=$user->dept?> </label>";

			var cancel_button = document.getElementById("Cancel_button");
			cancel_button.disabled = true;

			var submit_button = document.getElementById("Submit_button");
			submit_button.disabled = true;
		}

		function enable_card_no()
		{		
			var card_num_text_box = document.getElementById('temp_textbox');
			temp_textbox.disabled=false;

			return true;
		}

		function submit_form()
		{
			if( !values_changed() )
			{
				cancel_edit();
				return false;
			}
			else
			{
				enable_card_no();
				return true;
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
              Logged in as <a href="#" class="navbar-link"><?= $_SESSION['id']?></a>&nbsp;
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
						<li class="active"><a href="users.php" data-toggle="tab"><b>User Details</b></a></li><br/>
						<li><a href="view_Recommender.php" data-toggle="tab"><b>Recommended Books</b></a></li><br/>
						<li><a href="view_Recommender.php" data-toggle="tab"><b>Reminders and Updates</b></a></li><br/>
					</ul>
				</div>
				
			</div>
                        
			<div class="span9">
				<div class="tab-content">
					<div class="hero">
						<div class="lead">
							<div>
							<p style="float:left;">&nbsp;User Profile</p>
                                                        
							
							</div>
							<hr style="position:relative;top:32px;"></hr>
							<div id="indent-block">
                                                        <form id="form" method="post" action="save_usr_prof.php" style="width:700px;" enctype="multipart/form-data">
							<table border="0">
								<tr>
									<td><label><b>Card Number : </b></label></td>
									<td id="Card_Number_box"><label name="Card_Number"><input type="text" value="<?= $user->Card_Number?>" </input></label></td>
								</tr>
								<tr>
									<td><label><b>Name :</b></label></td>
									<td id="username_box"><label name="username"><input type="text" value="<?= $user->Name?>"</input> </label></td>
								</tr>
								<tr>
									<td><label><b>Email :</b></label></td>
									<td id="email_box"><label name="email"><input type="text" value="<?=$user->email?>"</input> </label></td>
								</tr>
								<tr>
									<td><label><b>Ph. No. :</b></label></td>
									<td id="mobile_box"><label name="mobile"><input type="text" value="<?=$user->mobile?>" </input></label></td>
								</tr>
                                                                <tr>
									<td><label><b>Department :</b></label></td>
									<td id="department_box"><label name="department"><input type="text" value="<?=$user->dept?>"</input></label> </td>
								</tr>
							</table>
                                                     		  <input class="btn btn-primary" id="Edit_button" type="button" value=" Edit " onclick="create_form()"> </input>
								  <input class="btn btn-danger" id="Cancel_button" type="button" disabled="disabled" value="Cancel" onclick="cancel_edit()"></input>
								  <input class="btn btn-success" id="Submit_button" type="submit" name="Submit" disabled="disabled" value="Save" name="Submit"> </ input>
                                                       </form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
  </body>
</html>

