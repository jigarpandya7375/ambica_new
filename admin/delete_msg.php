<?php
require_once('../classess/connection.php');
$sql="delete from ".$SUFFIX."message where mess_id='".$_GET['id']."'";
$res=mysql_query($sql);
if($res==1)
{
	$succ=base64_encode("success");
	header('location:message.php?res='.$succ);
}
else
{
	$succ=base64_encode("fail");
	header('location:message.php?res='.$succ);
}
?>