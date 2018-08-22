<?php
session_start();
error_reporting(0);
ob_start();
include('../classess/connection.php');
//print_r($_POST);exit;
$pass=base64_encode($_POST['password']);

if($_POST['name'] && $_POST['password']!='')
{
    $sql="select * from ".$SUFFIX."admin where username='".$_POST['name']."' and password='".$pass."'";
	$res=mysql_query($sql);
	if(mysql_num_rows($res)>0)
	{
			$row=mysql_fetch_array($res);
			if($_POST['cookie']=='true')
			{
				setcookie("username", $row[1], time()+3600);  
				setcookie("pass", $row[3], time()+3600);  
				$_SESSION['u_name']=$row[1];
				echo "yes";
			}
			else
			{
			    $_SESSION['u_name']=$row[1];
				echo "yes";
			}
	}
	else
	{
		echo "no";
	}
}


?>