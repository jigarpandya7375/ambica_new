<?php
ob_start();
require_once('../classess/connection.php');
$sql="delete from ".$SUFFIX."menu_image where menu_id='".$_GET['id']."'";
$res=mysql_query($sql);
if($res==1)
{
	$succ=base64_encode("success");
	header('location:menu_image.php?res='.$succ);
}
else
{
	$succ=base64_encode("fail");
	header('location:menu_image.php?res='.$succ);
}
?>