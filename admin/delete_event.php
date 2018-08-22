<?php
ob_start();
require_once('../classess/connection.php');
$sql="delete from ".$SUFFIX."event where ev_id='".$_GET['id']."'";
$res=mysql_query($sql);

if($res==1)
{
	$succ=base64_encode("success");
	header('location:manage_event.php?res='.$succ);
}
else
{
	$succ=base64_encode("fail");
	header('location:manage_event.php?res='.$succ);
}
?>