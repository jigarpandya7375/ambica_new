<?php
ob_start();
require_once('../classess/connection.php');
$file="../faraskhana_images/".$_GET['image'];
unlink($file);
$sql="delete from ".$SUFFIX."faraskhana where fk_id='".$_GET['id']."'";
$res=mysql_query($sql);

if($res==1)
{
	$succ=base64_encode("success");
	header('location:decorators.php?res='.$succ);
}
else
{
	$succ=base64_encode("fail");
	header('location:decorators.php?res='.$succ);
}
?>