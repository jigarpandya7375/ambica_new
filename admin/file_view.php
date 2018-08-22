<?php
error_reporting(0);
require_once('../classess/connection.php');
$path=$SITE_PATH."file_download/".base64_decode($_GET['name']);
?>
 <iframe src="http://docs.google.com/gview?url=<?php echo $path;?>&amp;embedded=true" style="width:100%; height:500px;" frameborder="10px"></iframe>