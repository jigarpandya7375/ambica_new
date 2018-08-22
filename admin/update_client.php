<?php
include_once 'includes/configure.php';
$id=$_REQUEST['id'];
$feild=$_REQUEST['name'];
$value=$_REQUEST['val'];
echo $sql="UPDATE ".PREFIX."clients SET ".$feild."= '$value' WHERE client_id ='$id' ";
$updateclient=mysql_query("UPDATE ".PREFIX."clients SET ".$feild."= '$value' WHERE client_id ='$id' ");
exit();
?>
 
      