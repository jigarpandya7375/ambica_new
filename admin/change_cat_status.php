<?php
ob_start();
require_once('../classess/connection.php');
if($_GET['status']=='ACTIVE')
{
	$status="INACTIVE";	
   $sql="update ".$SUFFIX."category set cat_status='".$status."' where cat_id='".$_GET['id']."'";
}
if($_GET['status']=='INACTIVE')
{
	$status="ACTIVE";	
   $sql="update ".$SUFFIX."category set cat_status='".$status."' where cat_id='".$_GET['id']."'";
}
$res=mysql_query($sql);
if($res==1)
{
	$succ=base64_encode("success");
	header('location:welcome.php?res='.$succ);
}
else
{
	$succ=base64_encode("fail");
	header('location:welcome.php?res='.$succ);
}
?>