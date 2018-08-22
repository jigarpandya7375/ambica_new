<?php
include_once 'includes/configure.php';
$id=$_REQUEST['id'];
$feild=$_REQUEST['name'];
$value=$_REQUEST['val'];
if($feild=='bookstatus')
{
$name='status';
}
if($feild=='payment')
{
$name='payment';
}

$book=mysql_query("select * from ".PREFIX."booking_aloja where book_id='$id'");
if(mysql_num_rows($book)>0)
{
	if($value=='accept')
	{
	$book_detail=mysql_fetch_array($book);	
	$add_cl=mysql_query("insert into ".PREFIX."clients(`name`,`last_name`,`gender`,`email`,`password`,`spanish_phone`,`nationality`,`birthdate`,`abroad_address`,`date_arrival`,`dateadded`,`web_id`,`city_id`)values('".$book_detail['name']."','".$book_detail['last_name']."','".$book_detail['gender']."','".$book_detail['email']."','".$book_detail['password']."','".$book_detail['phone']."','".$book_detail['nationality']."','".$book_detail['birth']."','".$book_detail['address']."','".$book_detail['arrival_date']."','".date('Y-m-d')."','".$book_detail['web_id']."','".$book_detail['city']."')");
	$last_id=mysql_insert_id();
	$updateclient=mysql_query("UPDATE ".PREFIX."booking_aloja SET ".$name."= '$value',client_id='$last_id' WHERE book_id ='$id' ");
	
	
	echo $link="<a href='#' onclick='alloc(".$book_detail['bid'].",".$book_detail['room_id'].",".$last_id.")' style='color:red;'>Allocate</a>";
	}
	else
	{
	$updateclient=mysql_query("UPDATE ".PREFIX."booking_aloja SET ".$name."= '$value' WHERE book_id ='$id' ");
	}
}
exit();
?>
 