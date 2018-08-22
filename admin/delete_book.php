<?php
ob_start();
require_once('../classess/connection.php');
//$filename=$file_path.$_GET['image'];
$filename =  $file_path.'file_download/'.$_GET['image'];
echo $filename_image =  $file_path.'file_download/images/'.$_GET['image_file'];
if(file_exists($filename))
{
  unlink($filename);
  unlink($filename_image);
}
$sql="delete from ".$SUFFIX."books where bk_id='".$_GET['id']."'";
$res=mysql_query($sql);

if($res==1)
{
	$succ=base64_encode("success");
	$action="delete";
	header('location:manage_file.php?res='.$succ.'&action='.$action);
}
else
{
	$succ=base64_encode("fail");
	$action="delete";
	header('location:manage_file.php?res='.$succ.'&action='.$action);
}
?>