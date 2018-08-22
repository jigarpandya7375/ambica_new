<?php
#####################################
#  Session Setting					#
#####################################
session_start();

// display all errors except notices //must be disable in new version in php
error_reporting(E_ALL^E_NOTICE^E_DEPRECATED); 
#####################################
#  Database Configration			#
#####################################
/*define(DB_SERVER,'75.126.127.141');
define(DB_USERNAME,'rony');
define(DB_PASSWORD,'rony123');
define(DB_DATABASE,'rony');
define(PREFIX,'olivetree_');
*/

/*define(DB_SERVER,'localhost');
define(DB_USERNAME,'ready4uk_rockers');
define(DB_PASSWORD,'07850040139');
define(DB_DATABASE,'ready4uk_rockers');*/
define(DB_SERVER,'localhost');
define(DB_USERNAME,'destino');
define(DB_PASSWORD,'65796579ab');
define(DB_DATABASE,'destino_rockers');
define(PREFIX,'ready_');


define(WEB_ID,'5');

#####################################
#  Site Configration				#
#####################################
define('SERVER_URL','http://www.londonandyou.com/intranet/');
//define('SERVER_PATH','/home/ready4uk/public_html/www.destinolondres.es/intranet/');
define('SERVER_PATH','/home/andyou/public_html/intranet/');
define('EDITOR_PATH','/home/andyou/public_html/intranet/');

//define('EDITOR_PATH','/home/ready4uk/public_html/www.trabajoenlondres.eu/');
define('HTTP_URL','http://www.londonandyou.com/intranet/');
define('HTTPS_URL','http://www.londonandyou.com/intranet/');
define('ADMIN_URL','http://www.londonandyou.com/intranet/');
define('ADMIN_PATH',SERVER_PATH.'xadmin/');
define('INCLUDES_PATH',SERVER_PATH.'includes/');
define('INCLUDES_URL',SERVER_URL.'includes/');
define('FUNCTION_PATH',INCLUDES_PATH.'function/');
define('CLASS_PATH',INCLUDES_PATH.'class/');
define('IMAGE_PATH',SERVER_PATH.'images/');
define('IMAGE_URL',SERVER_URL.'images/');
define('CSV_PATH','/home/andyou/public_html/csv/');
define('CSV_URL','http://www.londonandyou.com/csv/');
define('UPLOAD_PATH','/home/andyou/public_html/');
define('UPLOAD_URL','http://www.londonandyou.com/images/');
//define('UPLOAD_URL','http://www.destinolondres.es/images/');
define('PACKAGE_URL','http://www.londonandyou.com/');
define('BLOG_URL',SERVER_URL.'blog/');
define('UPLOAD_BANNER_URL',UPLOAD_URL.'banner/');
define('UPLOAD_BANNER_PATH',UPLOAD_PATH.'banner/');
define('UPLOAD_THUMB_URL',UPLOAD_BANNER_URL.'thumb/');
define('UPLOAD_THUMB_PATH',UPLOAD_BANNER_PATH.'thumb/');
define('ALOJA_PATH','/home/aloja/public_html/');
define("ADMIN_IMAGE_PATH", ADMIN_PATH.'images/');
define("ADMIN_IMAGE_URL", ADMIN_URL.'images/');

define('URL_REWRITE','1');
//define('WEB_URL','http://destinolondres.es/images/');
define('WEB_URL','http://www.londonandyou.com/images/');

######################################
# SMPT Configration(For Mail Feature)#
######################################
//define("SMTPUSER","hitesh@rockersinfo.com");//SMTP USER MAIL ADDRESSS LIKE info@cms.com
define("SMTPHOST","mail.rockersinfo.com");//SMTP HOST Name LIKE mail.cms.com
define("SMTPPASSWORD","hitesh123");//SMTP USER MAIL PASSWORD
define("SMTPMAINUSER","notifications@Londonhousing.com");//SMTP USER MAIL ADDRESSS LIKE info@cms.com

define("SMTPUSER",$_SESSION['sess_adminemail']);//SMTP USER MAIL ADDRESSS LIKE info@cms.com



 
 
#####################################
# Extra Configration				#
#####################################

define('SEPARATOR',',+,');
define('CURRENCY_SYMBOLE','&pound;');

#####################################
#  Configure Paging Variables		#
#####################################
define('RECORDSPAERPAGE',30);
define('MAXPAGEDISPLAY',3);// maximum page numbers to display at once, must be an odd number

$record_limit=30; // for paging
$pg_limit=5;  // for paging  
define('PAGE_COMBO',$record_limit);

#####################################
#  Database Settings 			    #
#####################################
include_once CLASS_PATH.'dbclass.php';
$dbobj = new dbclass;

#####################################
#  Include File Settings			#
#####################################
include_once FUNCTION_PATH.'general.php';


#####################################
#  File Settings					#
#####################################
define('INDEX_FILE','index.php?file=');

#####################################
#  General Setting					#
#####################################

@ini_set('display_errors', '1'); // display all errors
@ini_set('register_globals', 'Off'); // make globals off runtime
define('CHARSET', 'iso-8859-1');
getconfigure();

$languages = array(
	'en' => 'english',
	'sp' => 'spanish'
);

if($_SESSION['language']=="")
{
	$_SESSION['language'] = "english";
}

if(isset($_REQUEST['language']) && $_REQUEST['language']!="")
{
	$_SESSION['language'] = $languages[$_REQUEST['language']];
}

if(isset($_REQUEST['action']) && $_REQUEST['action']=="logout")
{
	if($_SESSION['type']=="agent")
	{
		$_SESSION['agent_id'] = "";
		$_SESSION['type'] = "";
		echo "<script>window.location.href='index.html'</script>";
	}
	if($_SESSION['type']=="client")
	{
		$_SESSION['client_id'] = "";
		$_SESSION['type'] = "";
		echo "<script>window.location.href='index.html'</script>";
	}
}

if(isset($_REQUEST['username']) && isset($_REQUEST['password']))
{
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	
	$sql_a = "select * from ".PREFIX."agent where agent_name = '".$username."' and password = '".$password."' and status = 'active'";
	$res_a = mysql_query($sql_a);
	if(mysql_num_rows($res_a)>0)
	{
		$row_a = mysql_fetch_array($res_a);
		$_SESSION['agent_id'] = $row_a['agent_id'];
		$_SESSION['type'] = "agent";
		echo "<script>window.location.href='client_information.php'</script>";
	}
	$sql_c = "select * from ".PREFIX."clients where email = '".$username."' and password = '".$password."' and status = 'active'";
	$res_c = mysql_query($sql_c);
	if(mysql_num_rows($res_c)>0)
	{
		$row_c = mysql_fetch_array($res_c);
		$_SESSION['client_id'] = $row_c['client_id'];
		$_SESSION['type'] = "client";
		echo "<script>window.location.href='message.php'</script>";		
	}
}
if($_POST['newsletter'])
{

$news=mysql_query("insert into ".PREFIX."newsletter (name,email,date)values('".$_REQUEST['news_name']."','".$_REQUEST['news_email']."','".date('Y-m-d')."')");

}

$metadetail=mysql_fetch_array(mysql_query("select * from ".PREFIX."configure where con_id='1'"));

 $metatitle=$metadetail['metatitle'];
 $metadesc=$metadetail['metadesc'];
 $metakeyword=$metadetail['metakeyword'];
?>