<?php
require_once("../includes/initialize.php");
if(isset($_REQUEST['act']) && $_REQUEST['act'] =='search' && isset($_REQUEST['queryString'])) {

$string = '';
$queryString = $_REQUEST['queryString'];
if($_REQUEST['type'] =='title')
{
if($queryString != '')
      $query = "SELECT DISTINCT Title,Authors,Keywords FROM `table 3` WHERE Title like '%" .$queryString . "%' ORDER BY Title";
else
	$query = "SELECT DISTINCT Title,Authors,Keywords FROM `table 3` ORDER BY Title";
}
else if($_REQUEST['type'] =='auth')
{
if($queryString != '')
      $query = "SELECT DISTINCT Title,Authors,Keywords FROM `table 3` WHERE Authors like '%" .$queryString . "%' ORDER BY Authors";
else
	$query = "SELECT DISTINCT Title,Authors,Keywords FROM `table 3` ORDER BY Authors";
}
else if($_REQUEST['type'] =='key')
{
if($queryString != '')
      $query = "SELECT DISTINCT Title,Authors,Keywords FROM `table 3` WHERE Keywords like '%" .$queryString . "%' ORDER BY Keywords";
else
	$query = "SELECT DISTINCT Title,Authors,Keywords FROM `table 3` ORDER BY Keywords";
}

$resource = $db->query($query);
if($resource && $db->num_rows($resource) > 0) {
$string.= '<table class="table table-hover" border="0">';
while($result = $db->fetch_array($resource)){
$string.= '<tr>
		<td><a href="bookinfo.php?title='.htmlentities( urlencode($result['Title'])).'&author='.htmlentities( urlencode($result['Authors'])).'" style="text-decoration:none">
		'.$result['Title'].'</a>
		</td>'.
		'<td>'
			.$result['Authors'].'</td>
		<td>'
			.$result['Keywords'].'
		</td>
	</tr>';
}
$string.= '</table>';

} else {
$string.= '<li>No Record found</li>';
}
echo $string;
exit;

}


?>
