<?php
ob_start();
require_once('../classess/connection.php');
require_once('../classess/function.php');
//print_r($_GET);exit;
/*Delete Sub-Category Code Start Here*/




/*Delete Category Code Start Here*/
$category_path=$file_path."faraskhana_images/".$_REQUEST['image'];
if(file_exists($category_path))
{
	unlink($category_path);
}

$sql_category="delete from ".$SUFFIX."faraskhana where fk_id='".$_GET['id']."'";
$res=mysql_query($sql_category);
if($res==1)
{	
    header('location:manage_photo.php?res='.base64_encode("success")."&page_id=".$_REQUEST['page_id']);
}
else
{
	 header('location:manage_photo.php?res='.base64_encode("fail")."&page_id=".$_REQUEST['page_id']);
}
?>