<?php
ob_start();
//print_r($_GET);exit;
require_once('../classess/connection.php');
if($_GET['status']=='ACTIVE')
{
	$status="INACTIVE";	
   $sql="update ".$SUFFIX."sub_category set sub_cat_status='".$status."' where sub_cat_id='".$_GET['id']."'";
}
if($_GET['status']=='INACTIVE')
{
	$status="ACTIVE";	
   $sql="update ".$SUFFIX."sub_category set sub_cat_status='".$status."' where sub_cat_id='".$_GET['id']."'";
}
$res=mysql_query($sql);
 if($res==1)
{	
    header('location:manage_sub_cat.php?res='.base64_encode("success").'&menu='.$_GET['menu']);
}
else
{
	 header('location:manage_sub_cat.php?res='.base64_encode("fail").'&menu='.$_GET['menu']);
}
?>