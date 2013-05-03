<?PHP
require_once("../includes/membersite_config.php");

$emailsent = false;
if(isset($_POST['submitted']))
{
   if($fgmembersite->EmailResetPasswordLink())
   {
        $fgmembersite->RedirectToURL("reset-pwd-link-sent.html");
        exit;
   }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
<meta charset="utf-8">
    <title>PES Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="This is the forgot password page for the LMS">
    <meta name="author" content="MadhurKapoor;AnandAgarwal">

    <link href="../css/bootstrap.css" rel="stylesheet">
    <script type='text/javascript' src='../scripts/gen_validatorv31.js'></script>
    <style type="text/css">
      body 
	  {
        padding-top: 140px;
        padding-bottom: 40px;
        background-color: #f5f5f5;  <!-- #5a5a5a is also an option -->
      }
	  
	  div.main
	  {
		background-color:white;
		-webkit-box-shadow:0px 0px 5px #CCCCC8;
		-moz-box-shadow:0px 0px 5px #CCCCC8;
		box-shadow:0px 0px 5px #CCCCC8;
		position:relative;
		top:30px;
		width:530px;
		padding-top:10px;
		padding-left:20px;
		padding-bottom:10px;
		padding-right:18px;
	  }
	  p.main
	  {
		font-size:26px;
		font-family: CharlesWorth Arial;
		font-weight:700;
		text-align:center;
	  }
	  p.tip
	  {
		font-style:italic;
		font-size:14px;
	  }
	  button.move_up
	  {
		position:relative;
		top:-15px;
		left:18px;
	  }
    </style>
  </head>

 <body>
    <div class="container main">
		<p class="lead main">Forgot Password</p><hr/>
		<form id='resetreq' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
		<input type='hidden' name='submitted' id='submitted' value='1'/>
		<div><span class='error'><?php echo '<font color="red">'.$fgmembersite->GetErrorMessage().'</font>'; ?></span></div>
		<table border="0" cellspacing="5">
		<tr>
		<td><label><b>Email:&nbsp;</b></label></td>
		<td><input type="text" size="40" class="input-block-level" placeholder="abc@xyz.com" name="email"></td>
		<td>&nbsp;&nbsp;<button class="btn btn-inverse move_up" type="submit">Send Password &raquo;</button></td>
		</tr>
		</table>
		<p class="tip">An email will be sent to you carrying a new generated password to the specified email-id.(Note that this same id should be registered with us). You can later reset the password by editing your profile information.</p>
    </div>
  </body>
</html>
