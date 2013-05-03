<?php 
//logging out 
require_once("includes/initialize.php"); 
	$session->logout();
	redirect_to("index.html");
?>
