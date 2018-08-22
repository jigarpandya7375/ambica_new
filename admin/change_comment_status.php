<?php
ob_start();
require_once('../classess/connection.php');
if($_GET['status']=='Pending')
{
	$status="Approved";	
   $sql="update ".$SUFFIX."comment set comment_status='".$status."' where comment_id='".$_GET['id']."'";
}
$res=mysql_query($sql);
if($res==1)
{
	$succ=base64_encode("success");
	header('location:welcome.php?res='.$succ.'&page_id='.$_REQUEST['page']);
}
else
{
	$succ=base64_encode("fail");
	header('location:welcome.php?res='.$succ.'&page_id='.$_REQUEST['page']);
}
?>