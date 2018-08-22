<?php
require_once('../classess/connection.php');
$res=mysql_query("UPDATE ck_user_detail SET  user_online_status = 'Offline' WHERE (CURRENT_TIMESTAMP() - TIMESTAMP(last_login)) > 14400");
echo $res;
?>