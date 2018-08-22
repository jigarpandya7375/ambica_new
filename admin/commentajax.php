<?php

error_reporting(0);
session_start();
require_once('../classess/connection.php');
require_once('../classess/function.php');
if($_POST)
{
$name=$_POST['name'];
$email=$_POST['email'];
$comment_dis=$_POST['comment'];
$website=$_POST['website'];
$post_id=$_POST['post_id'];

$lowercase = strtolower($email);
  
  //echo "insert into ".$SUFFIX."comment(name,email,content,blog_id,date,comment_status)values('$name','$email','$comment_dis','$post_id','".date('Y-m-d H:i:s')."','Pending')";exit;
  mysql_query("insert into ".$SUFFIX."comment(name,email,content,blog_id,date,comment_status)values('$name','$email','$comment_dis','$post_id','".date('Y-m-d H:i:s')."','Active')");
  
  $id = mysql_insert_id();
  

}

else { }

?>
 <li class="box" id="box_<?php echo $id;?>">
                        <img src="<?php echo $SITE_PATH;?>images/comment.png" height="60" width="60" class="com_img">
                        <span class="com_name"> <?php echo $name; ?></span> <br />
                         <div style="float:right;"><a href="javascript:void(0);" class="update_comment" onClick="javascript:edit_comment(<?php echo $id;?>,'Delete')"><img src="images/DeleteRed.png" height="50" width="50"/></a></div>
                        <a href="mailto:<?php echo $email;?>"><?php echo $email;?></a><br/>
                        
                       <div id="maincontent_name<?php echo $id;?>" style="display:block;" onClick="javascript:show_hide(<?php echo $id;?>);"><?php if($row1['comment_status']!='Pending'){echo strip_tags(shorter($comment_dis,90));}else{echo "<br/>Status:<font color='red'>Pending...</font>";}?></div>
                       
                       
                       <div id="inline_name_<?php echo $id;?>" style="display:none;">
                              <textarea style="height:50px; width:300px;" name="name<?php echo $id;?>" id="name<?php echo $id;?>"><?php echo $comment_dis;?> </textarea><br/>
                              
                              <div style="margin-left:40%;"><a href="javascript:void(0);" class="update_comment" onClick="javascript:edit_comment(<?php echo $id;?>,'Edit')">Save Changes</a>
                              
                              </div>
                             
                             
                       </div>
				   
                        </li>