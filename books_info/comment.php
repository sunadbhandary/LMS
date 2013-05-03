<?php

require_once("../includes/initialize.php");

// Redirect to index page if not logged in
if(!$session->is_logged_in()) {
  	redirect_to("../login.php");
}
$user = User::find_by_id($_SESSION['id']);
//echo $_GET[bookid];
//echo $_POST["comment"];
$map = $db->query("SELECT * FROM `review` WHERE `book id` = {$_GET["bookid"]} ");
$r_id= $db->fetch_array($map);
//print_r($r_id);
//$res=$db->query("SELECT * FROM `review table` WHERE `review id`=$r_id[1] AND `card id`='$user->Card_Number'");
$sql="INSERT INTO `review table`(`review id`, `card id`, `comments`) VALUES('$r_id[1]','$user->Card_Number','$_POST[comment]')";

if (!$db->query($sql))
  {
  $upd="UPDATE `review table` SET `comments`='$_POST[comment]' WHERE `review id`='$r_id[1]' AND `card id`='$user->Card_Number' ";
  $db->query($upd);
  }
  
$query=$db->query("SELECT Title,Authors FROM `table 3` WHERE `Id`=$_GET[bookid]");
$result=$db->fetch_array($query);
//print_r($result);
redirect_to("bookinfo.php?id={$_GET[bookid]}&title={$result[Title]}&author={$result[Authors]}");



?>

