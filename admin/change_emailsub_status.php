<?php
ob_start();
require_once('../classess/connection.php');
if($_GET['status']=='Inactive')
{
	$status="Active";	
   $sql="update ".$SUFFIX."newsletter set status='".$status."' where id='".$_GET['id']."'";
}

$res=mysql_query($sql);
if($res==1)
{
	$succ=base64_encode("success");
	header('location:welcome.php?res='.$succ.'&rec_page_id='.$_REQUEST['page']);
}
else
{
	$succ=base64_encode("fail");
	header('location:welcome.php?res='.$succ.'&rec_page_id='.$_REQUEST['page']);
}
?>