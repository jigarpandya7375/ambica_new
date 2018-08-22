<?php
ob_start();
require_once('../classess/connection.php');
require_once('../classess/function.php');
//print_r($_GET);exit;
/*Delete Sub-Category Code Start Here*/

$sql="select * from ".$SUFFIX."sub_category where cat_id='".$_GET['id']."'";
$res=mysql_query($sql);
/*while($data=mysql_fetch_array($res))
{
	$sub_category_path=$file_path."category_images/".$data['sub_cat_image'];
	if(file_exists($sub_category_path))
	{
		unlink($sub_category_path);
	}
	
}*/
$sub_cat_delete="delete from ".$SUFFIX."sub_category where cat_id='".$_GET['id']."'";
mysql_query($sub_cat_delete);


/*Delete Category Code Start Here*/
$category_path=$file_path."category_images/".$_REQUEST['image'];
if(file_exists($category_path))
{
	unlink($category_path);
}

$sql_category="delete from ".$SUFFIX."category where cat_id='".$_GET['id']."'";
$res=mysql_query($sql_category);
if($res==1)
{	
    header('location:manage_category.php?res='.base64_encode("success")."&page_id=".$_REQUEST['page_id']);
}
else
{
	 header('location:manage_category.php?res='.base64_encode("fail")."&page_id=".$_REQUEST['page_id']);
}
?>