<?php

print_r($_GET);

$page_name=list($url,$querystring) = explode('?', $_REQUEST['page'], 2);

//echo "The=>".$page_name;exit;

ob_start();

session_start();

//error_reporting(0);

//echo $_REQUEST['action'];

require_once('../classess/connection.php');

require_once('../classess/function.php');

$table_name=$_REQUEST['table'];

if(!isset($_SESSION['u_name']))

{

	header('location:index.php');

}



if($_REQUEST['action']=='Active')

{

	//echo "jgiar";exit;

    $cid=explode(",",$_REQUEST['str']);

	$i=0;

	

	for($i=0;$i<count($cid);$i++)

	{

	$id=$cid[$i];	

	//echo "UPDATE ".$SUFFIX."".$table_name." set status='Active' WHERE ".$_REQUEST['id']."='$id'"."<br/>";

	mysql_query("UPDATE ".$SUFFIX."".$table_name." set status='Active' WHERE ".$_REQUEST['id']."='$id'");

	header("location:".$page_name[0]."?res=".base64_encode("success").'&ac=Active&cui_id='.$_REQUEST['cui_id'].'&page_id='.$_REQUEST['page_id']);

	}

	

	

}

if($_REQUEST['action']=='Inactive')

{

    $cid=explode(",",$_REQUEST['str']);

	$i=0;

	

	for($i=0;$i<count($cid);$i++)

	{

	$id=$cid[$i];	

	//echo "UPDATE ".$SUFFIX."".$table_name." set status='Inactive' WHERE ".$_REQUEST['id']."='$id'";exit;

	mysql_query("UPDATE ".$SUFFIX."".$table_name." set status='Inactive' WHERE ".$_REQUEST['id']."='$id'");

	header("location:".$page_name[0]."?res=".base64_encode("success").'&ac=Inactive&cui_id='.$_REQUEST['cui_id'].'&page_id='.$_REQUEST['page_id']);

	}

}



if($_REQUEST['action']=='Block')

{

    $cid=explode(",",$_REQUEST['str']);

	$i=0;

	

	for($i=0;$i<count($cid);$i++)

	{

	$id=$cid[$i];	

	//echo "UPDATE ".$SUFFIX."".$table_name." set status='Block' WHERE ".$_REQUEST['id']."='$id'";exit;

	mysql_query("UPDATE ".$SUFFIX."".$table_name." set status='Block' WHERE ".$_REQUEST['id']."='$id'");

	header("location:".$page_name[0]."?res=".base64_encode("success"));

	}

	

	

}

if($_REQUEST['action']=='Delete')

{

	$cid=explode(",",$_REQUEST['str']);

	$i=0;

	

	for($i=0;$i<count($cid);$i++)

	{

	$id=$cid[$i];	

	//echo "delete from ".$SUFFIX."".$table_name." WHERE ".$_REQUEST['id']."='$id'";exit;

	mysql_query("delete from ".$SUFFIX."".$table_name." WHERE ".$_REQUEST['id']."='$id'");

	header("location:".$page_name[0]."?res=".base64_encode("success").'&ac=Delete&cui_id='.$_REQUEST['cui_id']."&page_id=".$_REQUEST['page_id']);

	}

}



if($_REQUEST['action']=='Delete_Image')

{

	$cid=explode(",",$_REQUEST['str']);

	$i=0;

	

	for($i=0;$i<count($cid);$i++)

	{

	$id=$cid[$i];	

	$sql="select *  from ".$SUFFIX."".$table_name." WHERE ".$_REQUEST['id']."='$id'";

	$data=mysql_query($sql);

	$res=mysql_fetch_array($data);

	$field=$_GET['field'];

	$image=$res[$field];

	

  $filename =  $file_path."img/".$_REQUEST['folder']."/".$image;

	if(file_exists($filename))

	{

	  unlink($filename);

	}

    mysql_query("delete from ".$SUFFIX."".$table_name." WHERE ".$_REQUEST['id']."='$id'");

    header("location:".$page_name[0]."?res=".base64_encode("success")."&cui_id=".$_REQUEST['cui_id']."&".$page_name[1]);

	}

}







if($_REQUEST['action']=='READ')

{

    $cid=explode(",",$_REQUEST['str']);

	$i=0;

	

	for($i=0;$i<count($cid);$i++)

	{

	$id=$cid[$i];	

	//echo "UPDATE ".$SUFFIX."".$table_name." set mess_status='READ' WHERE ".$_REQUEST['id']."='$id'";

	mysql_query("UPDATE ".$SUFFIX."".$table_name." set mess_status='READ' WHERE ".$_REQUEST['id']."='$id'");

    header("location:".$page_name[0]."?res=".base64_encode("success"));

	}

	

	

}

if($_REQUEST['action']=='UNREAD')

{

    $cid=explode(",",$_REQUEST['str']);

	$i=0;

	

	for($i=0;$i<count($cid);$i++)

	{

	$id=$cid[$i];	

	

	mysql_query("UPDATE ".$SUFFIX."".$table_name." set mess_status='UNREAD' WHERE ".$_REQUEST['id']."='$id'");

	header("location:".$page_name[0]."?res=".base64_encode("success"));

	}

}





/*Query For Blog Section Start */



if($_REQUEST['action']=='Published')

{

    $cid=explode(",",$_REQUEST['str']);

	$i=0;

	

	for($i=0;$i<count($cid);$i++)

	{

	$id=$cid[$i];	

	//echo "UPDATE ".$SUFFIX."".$table_name." set blog_type='Published' WHERE ".$_REQUEST['id']."='$id'";exit;

	mysql_query("UPDATE ".$SUFFIX."".$table_name." set blog_type='Published' WHERE ".$_REQUEST['id']."='$id'");

	header("location:".$page_name[0]."?res=".base64_encode("success"));

	}

}



if($_REQUEST['action']=='Draft')

{

    $cid=explode(",",$_REQUEST['str']);

	$i=0;

	

	for($i=0;$i<count($cid);$i++)

	{

	$id=$cid[$i];	

	//echo "UPDATE ".$SUFFIX."".$table_name." set blog_type='Published' WHERE ".$_REQUEST['id']."='$id'";exit;

	mysql_query("UPDATE ".$SUFFIX."".$table_name." set blog_type='Draft' WHERE ".$_REQUEST['id']."='$id'");

	header("location:".$page_name[0]."?res=".base64_encode("success"));

	}

}



if($_REQUEST['action']=='Trash')

{

    $cid=explode(",",$_REQUEST['str']);

	$i=0;

	

	for($i=0;$i<count($cid);$i++)

	{

	$id=$cid[$i];	

	//echo "UPDATE ".$SUFFIX."".$table_name." set blog_type='Published' WHERE ".$_REQUEST['id']."='$id'";exit;

	mysql_query("UPDATE ".$SUFFIX."".$table_name." set blog_type='Trash' WHERE ".$_REQUEST['id']."='$id'");

	header("location:".$page_name[0]."?res=".base64_encode("success"));

	}

}



/*Query For Blog Section End */











?>