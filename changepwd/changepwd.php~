<?php
require_once("../includes/initialize.php");
require_once("../includes/membersite_config.php");


if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("../login.php");
    exit;
}

if(isset($_POST['submitted']))
{
   if($fgmembersite->ChangePassword())
   {
        $fgmembersite->RedirectToURL("../student_home/student_home.php");
   }
}
$user = User::find_by_id($_SESSION['id']);

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
  <head>
    <meta charset="utf-8">
    <title>PES Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This is the student profile page">
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
       <script type='text/javascript' src='../scripts/gen_validatorv31.js'></script>
	<script src="../scripts/pwdwidget.js" type="text/javascript"></script> 
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
						<li><a href="../recommend/suggest.php" data-toggle="tab"><b>Suggest Books</b></a></li><br/>
						<li><a href="../profile/profile.php" data-toggle="tab"><b>Profile</b></a></li><br/>
						<li class="active"><a href="#" data-toggle="tab"><b>Change Password</b></a></li><br/>
						<li><a href="../suggestions/suggest.php" data-toggle="tab"><b>Suggestion Box</b></a></li><br/>					
					</ul>
				</div>
				
			</div>
                        
			<div class="span9">
				<div class="tab-content">
					<div class="hero">
						<div class="lead">
							<div>
							<p style="float:left;">&nbsp;Change Password</p>
                                                        
							
							</div>
							<hr style="position:relative;top:32px;"></hr>
							<div id="indent-block">
<form id='changepwd' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8' style="width:700px;">
<input type='hidden' name='submitted' id='submitted' value='1'/>					
<p id="save_button"><input id="subbutton" type="submit" value="Submit" class="btn btn-success" ></p>
							<div><span class='error'><?php echo '<font color="red">'.$fgmembersite->GetErrorMessage().'</font>'; ?></span></div>
							<table border="0">
							
							<tr>
								
    								<td><label><b>Old Password :</b></label></td>
    								
    								<td><input type='password' name='oldpwd' id='oldpwd' maxlength="50" /></td>
    								<span id='changepwd_oldpwd_errorloc' class='error'></span>    
    								
							</tr>
							<tr>
								<td><label><b>New Password:</b></label></td>
    								
    								<td><input type='password' name='newpwd' id='newpwd' maxlength="50" /><br/></td>
    								<span id='changepwd_newpwd_errorloc' class='error'></span>
    								
							</tr>
							</table>
                                                      
                                                       <!--<input id="subbutton" type="submit" value="Submit">-->
                                                       </form>
							<script type='text/javascript'>
// <![CDATA[
    							var pwdwidget = new PasswordWidget('oldpwddiv','oldpwd');
    							pwdwidget.enableGenerate = false;
    							pwdwidget.enableShowStrength=false;
    							pwdwidget.enableShowStrengthStr =false;	
    							pwdwidget.MakePWDWidget();
    
   							var pwdwidget = new PasswordWidget('newpwddiv','newpwd');
    							pwdwidget.MakePWDWidget();
    
    
    							var frmvalidator  = new Validator("changepwd");		
    							frmvalidator.EnableOnPageErrorDisplay();
    							frmvalidator.EnableMsgsTogether();

    							frmvalidator.addValidation("oldpwd","req","Please provide your old password");
    							frmvalidator.addValidation("newpwd","req","Please provide your new password");

// ]]>
							</script>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
  </body>
</html>

