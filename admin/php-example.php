<?php
ob_start();
session_start();
error_reporting(0);
require_once('../classess/connection.php');
require_once('../classess/function.php');

# Perform the query
//echo "SELECT * from rm_newsletter WHERE nw_email LIKE '%%%j%%' ORDER BY nw_email DESC LIMIT 10";exit;
	$query = "SELECT DISTINCT email FROM rm_newsletter WHERE email REGEXP '^".$_GET['q']."' ORDER BY email DESC";
$arr = array();
$rs = mysql_query($query);

# Collect the results
while($obj = mysql_fetch_object($rs)) {
    $arr[] = $obj;
}

# JSON-encode the response
$json_response = json_encode($arr);

# Optionally: Wrap the response in a callback function for JSONP cross-domain support
if($_GET["callback"]) {
    $json_response = $_GET["callback"] . "(" . $json_response . ")";
}

# Return the response
echo $json_response;

?>
