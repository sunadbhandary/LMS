<!--Login Page for our website-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
  <head>
    <meta charset="utf-8">
    <title>PES Library Log-In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This is the login page for the LMS">
    <meta name="author" content="MadhurKapoor;AnandAgarwal">
     <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
      

    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 140px;
        padding-bottom: 40px;
        background-color: #f5f5f5;  <!-- #5a5a5a is also an option -->
      }

	  div#outer
	  {
		position:fixed;
	  }
	  
	  span#login-block
	  {
		position:relative;
		left:650px;
		top:50px;
		float:left;
	  }
	  
	  span#image-block
	  {
		left:50px;
		width:750px;
		position:absolute;
		float:left;
	  }
	  
	  
	  span.desg{
		position:relative;
		top:5px;
		padding-top:2px;
		font-size:17px;
		font-family:Arial;
	  }
	  
      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5; 
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
    </style>
  </head>

  <body>
  <div id="outer">
  <?php
require_once("includes/initialize.php");
require_once("includes/membersite_config.php");
if($session->is_logged_in() ) {
  	if($_SESSION['type']=="student")
  	redirect_to("student_home/student_home.php");
  	else if($_SESSION['type']=="admin")
  		redirect_to("admin/admin_home.php");
  }

if(isset($_POST['submitted'])) //when the form is submitted and login credentials are correct we redirect to home page
{

   if($fgmembersite->Login() )
   {
   		if($_POST['designation']=="student")
  		 {  	
  	      $fgmembersite->RedirectToURL("student_home/student_home.php");
  		 }
  		 else if($_POST['designation']=="admin")
			$fgmembersite->RedirectToURL("admin/admin_home.php");
	}		
}

?>
	<span id="image-block">
		&nbsp;<img src="images/book2.jpg" alt="" height="90%" width="100%"></img>
	</span>
    <span id="login-block" class="container">
      
        <form class="form-signin" id='login' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
        
        <h2 class="form-signin-heading">Please Log in</h2>
        
        <input type='hidden' name='submitted' id='submitted' value='1'/>
        <div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
	<input type="text" class="input-block-level" placeholder="UserName / CardNumber" name='username' id='username' value='<?php echo $fgmembersite->SafeDisplay('username') ?>' maxlength="50">
         <span id='login_username_errorloc' class='error'></span>
        <input type="password" class="input-block-level" placeholder="Password" name='password' id='password' maxlength="50" />
        <span id='login_password_errorloc' class='error'></span><br/><br/>
        <label><input type="radio"  name="designation" value="student" checked="checked"><span class="desg"><strong>&nbsp;Student</strong></span></label>
        <label><input type="radio"  name="designation" value="admin"><span class="desg"><strong>&nbsp;Admin</strong></span></label><br/>
        <button class="btn btn-large btn-primary" type="submit">Log-in</button><br/>
		<span style="float:right"><a href="forgotpwd/reset-pwd-req.php">Forgot Password?</a></span>
      </form>
    


<script type='text/javascript'>
//Validator used for validating card number and password

    var frmvalidator  = new Validator("login");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("username","req","Please provide your username");
    
    frmvalidator.addValidation("password","req","Please provide the password");


</script>
</span>  
</div>
</body>
</html>

<!--Success Cases:
if both the card number and password are both cases
Failure:
If either of password and and card numbers are wrong or one of the fields is empty
-->



