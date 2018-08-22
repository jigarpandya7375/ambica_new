<?php
ob_start();
session_start();
error_reporting(0);
require_once('../classess/connection.php');
//echo "The=>".$_POST['id'];exit;
if($_POST['id'])
{
	$sql=mysql_query("SELECT b.sub_cui_id, b.sub_cui_name FROM ".$SUFFIX."main_cuisine a, ".$SUFFIX."sub_cuisine b WHERE a.cui_id = b.cui_id and b.cui_id=".$_POST['id']."");
	
	while($row=mysql_fetch_array($sql))
		{
				$id=$row['sub_cui_id'];
				$data=$row['sub_cui_name'];
				echo '<option value="'.$id.'">'.$data.'</option>';
		
		}
}
?>