<?php
ob_start();
session_start();
error_reporting(0);
require_once('../classess/connection.php');
$counter=$_POST['counter']+1;
$sql="update ".$SUFFIX."books set bk_count='".$counter."' where bk_id='".$_POST['id']."'";
mysql_query($sql);
echo "yes";
?>