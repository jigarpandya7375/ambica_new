<?php
ob_start();
session_start();
error_reporting(0);
require_once('../classess/connection.php');
require_once('../classess/function.php');

$id=$_REQUEST['id'];
$value=$_REQUEST['value'];
$active=$_REQUEST['action'];
if($_REQUEST['action']=='Edit')
{
//echo $sql="UPDATE ".$SUFFIX."comment SET  content='".$value."' WHERE comment_id ='$id' ";
$update_comment=mysql_query("UPDATE ".$SUFFIX."comment SET  content='".$value."' WHERE comment_id ='$id'");
if($update_comment==1)
{
	echo $value;
	
}
}
if($_REQUEST['action']=='Delete')
{
	
	$delete_comment=mysql_query("delete from ".$SUFFIX."comment WHERE comment_id ='$id'");
	if($delete_comment==1)
	{
		echo "1";
		
	}
}
?>