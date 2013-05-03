<?php
require_once("../includes/initialize.php");
if(!$session->is_logged_in()) {
  	redirect_to("../login.php");
}
extract($_POST);

if(isset($Card_Number) && $Card_Number != "")
{
	$user = User::find_by_id($Card_Number);
}
else
{
	die("The card Number is not sent");
}
	
if(isset($user) && $user != "" )
{
	//The query succeeded
	$user->Name   = $username;
	$user->email  = $email;
	$user->mobile = $mobile;
	$user->dept   = $department;

	$user->save();
	//Updation succeded

	redirect_to("http://localhost/se/lms/admin/user_details.php?Card_Number="."$user->Card_Number");
}
else
{
	die("The query failed");
}

?>
