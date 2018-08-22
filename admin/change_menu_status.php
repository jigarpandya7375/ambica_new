<?php
ob_start();
require_once('../classess/connection.php');
if($_GET['status']=='ACTIVE')
{
	$status="INACTIVE";	
   $sql="update ".$SUFFIX."menu_image set menu_status='".$status."' where menu_id='".$_GET['id']."'";
}
if($_GET['status']=='INACTIVE')
{
	$status="ACTIVE";	
   $sql="update ".$SUFFIX."menu_image set menu_status='".$status."' where menu_id='".$_GET['id']."'";
}
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