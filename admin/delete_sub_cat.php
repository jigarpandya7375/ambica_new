<?php
ob_start();
print_r($_GET);
require_once('../classess/connection.php');
$sql="delete from ".$SUFFIX."sub_category where sub_cat_id='".$_GET['id']."'";
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