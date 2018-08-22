<?php
ob_start();
session_start();
error_reporting(0);
require_once('../classess/connection.php');
require_once('../classess/function.php');


							if(isset($_REQUEST['id']))
							{
								$sql="select * from ".$SUFFIX."blog where blog_id='".$_GET['id']."'";
								$res=mysql_query($sql);
								$data=mysql_fetch_array($res);
							}
                       
if(!isset($_SESSION['u_name']))
{
	header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Manage Comment</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/logo_small.png"/>
	<link rel="stylesheet" href="css/pagination.css" media="all" />
    <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
	<!-- Optimize for mobile devices -->	
	<!-- jQuery & JS files -->
	<script src="js/jquery.min.js"></script>
    <script src="js/script.js"></script>  
   <script>
	function show_hide(id)
	{
		// alert('maincontent_name'+id);
	    if(document.getElementById('maincontent_name'+id).style.display='block')
		{
		document.getElementById('maincontent_name'+id).style.display = 'none'
		document.getElementById('inline_name_'+id).style.display = 'block';
		}
	}
	
	function edit_comment(comment_id,action)
	{
	
		$(function() {
			
			$(".update_comment").click(function() {
				var comment=document.getElementById('name'+comment_id).value;
				var dataString = 'id='+ comment_id + '&value=' + comment + '&action='+action;
				  if (comment == "") {
						alert("Pleas Enter Comment Content");
						document.getElementById('name'+comment_id).focus();
						return false;
					}
					
				else
				{
						
						$("#flash").show();
						$("#flash").fadeIn(4000).html('<img src="http://rameshwar.ambicacaterers.in/images/ajax-loader.gif">&nbsp;<span class="loading">Loading Please Wait...</span>');
					$.ajax({
					  type: "POST",
					  url: "update_comment.php",
					  data: dataString,
					  cache: false,
					  success: function(html)
					  {
					   var response=html;	  
					   if(response==1)
					   {
						    document.getElementById('box_'+comment_id).style.display = 'none';
							document.getElementById('flash').style.display = 'none';
					   }
					   else
					   {
					   document.getElementById('maincontent_name'+comment_id).innerHTML="";
					   $('#maincontent_name'+comment_id).append(html);
					   document.getElementById('maincontent_name'+comment_id).style.display='block';
					   document.getElementById('inline_name_'+comment_id).style.display = 'none';
					   $("#flash").hide();
					   }
					  }
					 });
			
			    }
			return false;
				});
			
			
			
			});
	}
    </script>
    
     <script type="text/javascript" src="js/ajax_comment.js"></script>
    
	
    
	
<style type="text/css">

	.comment_box
	{
	background-color:#D3E7F5; border-bottom:#ffffff solid 1px; padding-top:3px
	}

	ol.timeline
	{list-style:none;font-size:1.2em;}
	ol.timeline li{ display:none;position:relative;padding:.7em 0 .6em 0;}ol.timeline li:first-child{}
	
	#main
	{
	width:500px; margin-top:20px; margin-left:100px;
	font-family:"Trebuchet MS";
	}
	#flash
	{
	margin-left:100px;
	
	}
	.box
	{
	height:150px;
	border-bottom:#dedede dashed 1px;
	margin-bottom:20px;
	width:60%;
	float:right;
	list-style:none;
	}
	input
	{
	color:#000000;
	font-size:14px;
	border:#666666 solid 2px;
	height:24px;
	margin-bottom:10px;
	width:200px;
	
	
	}
	textarea
	{
	color:#000000;
	font-size:14px;
	border:#666666 solid 2px;
	height:124px;
	margin-bottom:10px;
		width:200px;
	
	}
	.titles{
	font-size:13px;
	padding-left:10px;
	
	
	}
	.star
	{
	color:#FF0000; font-size:16px; font-weight:bold;
	padding-left:5px;
	}
	
	.com_img
	{
	float: left; width: 80px; height: 80px; margin-right: 20px;
	}
	.com_name
	{
	font-size: 16px; color: rgb(102, 51, 153); font-weight: bold;
	}
	
	
</style>
</head>
<body>

	<!-- TOP BAR -->
		
		<?php include('include/header.php');?>
	
	 <!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<?php include('include/header_with_tab.php');    ?>
     <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">
          
			<?php include('include/side_menu.php');?> <!-- end side-menu -->
			
			<div class="side-content fr">
            
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Add Comment</h3>
						<!--<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>-->
					
					</div> <!-- end content-module-heading -->
					
					<div id="flash" align="center"></div>
					<div class="content-module-main cf">
				
							
                        	   
                      			    
						
                           <ol  id="update">

					<?php
					$sql="select * from rm_comment where blog_id='".$_GET['id']."'";
					if(isset($_REQUEST['c_id']))
					{
						$sql.="and comment_id='".$_REQUEST['c_id']."'";
					}
                    $sql_comment=mysql_query($sql);
                    if($no=mysql_num_rows($sql_comment)>0)
                    {
                        while($row1=mysql_fetch_array($sql_comment))
                        {
                        $name=$row1['name'];
                        $email=$row1['email'];
                        $comment_dis=$row1['content'];
                        
                        $lowercase = strtolower($email);
                        
                        ?>
                        
                        
                        <li class="box" id="box_<?php echo $row1['comment_id'];?>">
                        <img src="<?php echo $SITE_PATH;?>images/comment.png" height="60" width="60" class="com_img">
                        <span class="com_name"> <?php echo $name; ?></span> <br />
                         <div style="float:right;"><a href="javascript:void(0);" class="update_comment" onClick="javascript:edit_comment(<?php echo $row1['comment_id'];?>,'Delete')"><img src="images/DeleteRed.png" height="50" width="50"/></a></div>
                        <a href="mailto:<?php echo $email;?>"><?php echo $email;?></a><br/>
                        
                       <div id="maincontent_name<?php echo $row1['comment_id']?>" style="display:block;" onClick="javascript:show_hide(<?php echo $row1['comment_id'];?>);"><?php echo strip_tags(shorter($comment_dis,90));?></div>
                       
                       
                       <div id="inline_name_<?php echo $row1['comment_id']?>" style="display:none;">
                              <textarea style="height:50px; width:300px;" name="name<?php echo $row1['comment_id']?>" id="name<?php echo $row1['comment_id']?>"><?php echo $row1['content']?> </textarea><br/>
                              
                              <div style="margin-left:40%;"><a href="javascript:void(0);" class="update_comment" onClick="javascript:edit_comment(<?php echo $row1['comment_id'];?>,'Edit')">Save Changes</a>
                              
                              </div>
                             
                             
                       </div>
				   
                        </li>
                        
                        <?php
                        }
                    }
                    ?>
                    </ol>

                      
                        <div>
                        <form action="javascript:void(0);" method="post" name="comment_form" id="comment_form">
                        <span class="titles">Note:</span><span class="star">*</span> All fields are mandatory...<br/><br/>
                        <input type="hidden" name="post_id" id="post_id"  value="<?php echo $_REQUEST['id']; ?>"/>
                        <span class="titles">Name</span><span class="star">*</span><br/><br/><input class="input" type="text" name="title" id="name"/><br />
                        
                        <span class="titles">Email</span><span class="star">*</span><br/><br/><input class="input" type="text" name="email" id="email"/><br />
                        
                        <span class="titles">Comment</span><span class="star">*</span><br/><br/><textarea  name="comment" id="comment"></textarea><br />
                        
                        <input style="height:40px;width:220px;cursor:pointer;" type="submit" class="submit button round blue image-right ic-add text-upper" value="Add New Comment " />
                        </form>
                        </div>

 <!-- end half-size-column -->
						
						
				
					</div> <!-- end content-module-main -->
					
				</div> <!-- end content-module -->
	
		
			</div> <!-- end side-content -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
    <?php include('include/footer.php');?>
	 <!-- end footer -->

</body>
</html>