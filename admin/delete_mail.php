<?php
ob_start();
require_once('../classess/connection.php');
$sql="delete from ".$SUFFIX."mail where mail_id='".$_GET['id']."'";
$res=mysql_query($sql);

if($res==1)
{
	$succ=base64_encode("success");
	header('location:manage_mail_content.php?res='.$succ);
}
else
{
	$succ=base64_encode("fail");
	header('location:manage_mail_content.php?res='.$succ);
}
?>