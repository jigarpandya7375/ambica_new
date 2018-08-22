<?php
ob_start();
session_start();
error_reporting(0);
require_once('../classess/connection.php');
$sql="delete from ".$SUFFIX."admin where id='".$_GET['id']."'";
$res=mysql_query($sql);
if($res==1)
{
	header('location:admin_user.php?res='.base64_encode("success|Delete"));
}