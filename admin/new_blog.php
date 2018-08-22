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

if($_REQUEST['action']=='Add')
{
			if($_POST['new_blog'])
			{
					if($_POST['blog_desc']=='')
					{
						$error= "Blog Description Value Cant Be Blank...!!!!";
						$code= "1" ;
					}
					else
					{
							
							$image_path = "../images/logo.png";
									$demo_image= "";
									if(isset($_POST['new_blog']) and $_POST['new_blog'] == "Published")
									{ 
										$path = "../img/blog/";
										$valid_formats = array("jpg","bmp","jpeg");
										$name = $_FILES['blog_image']['name'];
										if(strlen($name))
									   {
										   
									   list($txt, $ext) = explode(".", $name);
									 
										$upload_status = move_uploaded_file($_FILES['blog_image']['tmp_name'], $path.$_FILES['blog_image']['name']);
											if($upload_status)
											{
												$new_name = $path."rd_blog_".time().".jpg";
												$db_name = "rd_blog_".time().".jpg";
												$height="400";
												$width="1024";
												if(watermark_image($path.$_FILES['blog_image']['name'], $new_name,$height,$width))
												$demo_image = $new_name;
												
													$sql="insert into ".$SUFFIX."blog values('','".trim($_POST['title'])."','".trim($_POST['blog_desc'])."','Admin','".date('Y-m-d H:i:s')."','".trim($_POST['cuisine'])."','".$db_name."','".$_POST['status']."','".trim($_POST['tags'])."','','')";
												 $res=mysql_query($sql);
												 if($res==1)
												 {
													 header('location:manage_blog.php?res='.base64_encode('success'));
												 }
													
											 }
										}
										/*else
										$msg="<font color='red'> Error:File size Max 256 KB or Invalid file format supports .jpg and .bmp</font>";
										}*/
									}
									
									
					}
					
			  }
}

if($_REQUEST['action']=='Edit')
{
	//print_r($_POST);exit;
	$db_image_name="";
	if($_FILES['blog_image']['name']=='')
	{
		$db_image_name=$data['blog_image'];
	}
	else
	{
	//echo getcwd();exit;
		$filename =  $file_path.'img/blog/'.$_REQUEST['prv_image'];
		
		 unlink($filename);
		
									$image_path = "../images/logo.png";
									$demo_image= "";
									if(isset($_POST['edit_blog']) && $_POST['edit_blog'] == "Edit Blog")
									{ 
									   
										$path = "../img/blog/";
										$valid_formats = array("jpg","bmp","jpeg");
										$name = $_FILES['blog_image']['name'];
										if(strlen($name))
									   {
										   //echo "innder";exit;
									  list($txt, $ext) = explode(".", $name);
									/*  if(in_array($ext,$valid_formats) && $_FILES['blog_image']['size'] <= 256*1024)
										{*/
											
										$upload_status = move_uploaded_file($_FILES['blog_image']['tmp_name'], $path.$_FILES['blog_image']['name']);
											if($upload_status)
											{
												$new_name = $path."rd_blog_".time().".jpg";
												$db_name = "rd_blog_".time().".jpg";
												$height="400";
											    $width="1024";
												if(watermark_image($path.$_FILES['blog_image']['name'], $new_name,$height,$width))
												$demo_image = $new_name;
												$db_image_name=$db_name;
				
											 }
										}
										/*else
										{
										
										echo $msg="<font color='red'> Error:File size Max 256 KB or Invalid file format supports .jpg and .bmp</font>"; exit;}
										
										}*/
									}
									
									
					
	}
	
	
	//echo $db_image_name;exit;
									
				echo  $sql="update ".$SUFFIX."blog set blog_title='".$_POST['title']."',blog_desc='".trim($_POST['blog_desc'])."',cat_id='".trim($_POST['cuisine'])."',blog_type='".$_POST['status']."',blog_tags='".$_POST['tags']."',blog_image='".$db_image_name."' where blog_id='".$_REQUEST['id']."'";				
												
												
												$res=mysql_query($sql);
												 if($res==1)
												 {
													 header('location:manage_blog.php?res='.base64_encode('success'));
												 }
													
	}
									
//echo $db_image_name;exit;
	
	
                                 	




?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Add / Edit Blog</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/logo_small.png"/>
	<link rel="stylesheet" href="css/pagination.css" media="all" />
    <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
	<!-- Optimize for mobile devices -->	
	<!-- jQuery & JS files -->
	<script src="js/jquery.min.js"></script>
    <script src="js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8">
	</script>
	<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
	</script>
    <script type="text/javascript" src="js/jquery.fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen" />
    
    <script type="text/javascript">
		$(document).ready(function() {
			$('.fancybox').fancybox();
				$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});
		});
	</script>
    
     <script>
		jQuery(document).ready(function(){
			jQuery("#new_blog").validationEngine('attach', {bindMethod:"live"});
		});
	</script>
    
	<script src="js/script.js"></script>  
	   <!--<script type="text/javascript">
        $(document).ready(function()
        {
        $(".cuisine").change(function()
        {
        var id=$(this).val();
        var dataString = 'id='+ id;
       // alert(dataString);
        $.ajax
        ({
        type: "POST",
        url: "ajax_sub_cuisine.php",
        data: dataString,
        cache: false,
        success: function(html)
        {
			//alert(html);
        $(".sub_cuisine").html(html);
        } 
        });
        
        });
        });
        </script>-->
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>

<style>
        .error {
            border:1px solid #DB4A39 !Important;
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
					
						<h3 class="fl">Add New Blog</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf">
				
							
                        	   
                      			    
						
                           <form  method="post" name="new_blog" id="new_blog" enctype="multipart/form-data">
							
								<fieldset>
								
	
									<p>
										<label for="another-simple-input">Blog Title</label>
	     <input type="text" id="title"  value="<?php echo $data['blog_title'];?>"  name="title" class="round default-width-input  validate[required] text-input"/>
										<em>Blog Title</em>								
									</p>
                                    
                                    <p>
										<label for="another-simple-input">Blog Tags</label>
	     <input type="text" id="tags"  value="<?php echo $data['blog_tags'];?>"  name="tags" class="round default-width-input  validate[required] text-input"/>
										<em>Blog Title</em>								
									</p>
                                    
                                    <p>
										<label for="another-simple-input">Blog Category</label>
                                        <select name="cuisine" id="cuisine" class="cuisine validate[required]">
                                        <option value="">---Select Type---</option>
                                        <?php
										
										$sql=mysql_query("select * from ".$SUFFIX."category where status='Active'");
										while($res=mysql_fetch_array($sql))
										{
										
                                        ?>
										<option value="<?php echo $res['cat_id'];?>" <?php if($res['cat_id']==$data['cat_id']){?> selected="selected"<?php }?>><?php echo $res['cat_name'];?></option>
                                        <?php
										
										}
										
										?>
                                        </select>
										<em>Enter Password</em>								
									</p>
                                    
                                     <p>
                                        <label for="another-simple-input">Blog Status</label>
										<select id="status" name="status" class= "status validate[required]">
                                        <option value="">---Select Status---</option>
                                        <option value="Published"<?php if($data['blog_type']=="Published"){?> selected="selected"<?php }?>>Published</option>
                                        <option value="Draft" <?php if($data['blog_type']=="Draft"){?> selected="selected"<?php }?>>Draft</option>
                                        <option value="Trash" <?php if($data['blog_type']=="Trash"){?> selected="selected"<?php }?>>Trash</option>
                                        </select>
																
                                    </p>
                                    
									<p>
										<label for="another-simple-input">Blog Images</label>
										<input type="file" id="blog_image" value="" name="blog_image" <?php if(!isset($_REQUEST['id'])){?> class="validate[required] text-input"<?php }?>/><?php if(isset($_REQUEST['id'])){ echo "&nbsp;&nbsp;<font color='#FF0000'>Please Leave It blank If You Don't Want to Chnage Images</font>";};?>                    <br/><br/>
                                        <?php if(isset($_REQUEST['id']))
										{?>
                                        <a href="<?php echo $SITE_PATH;?>img/blog/<?php echo $data['blog_image']?>" class="fancybox-effects-c" title="<?php echo shorter($data['blog_title'],80);?>"><img src="<?php echo $SITE_PATH;?>img/blog/<?php echo $data['blog_image']?>" height="60" width="150"/></a>
                                        <?php
										}?>
																
                                    </p>
                                    
                                 
                                    <p>
                                     
										<label for="another-simple-input">Blog Description</label>
                                        
                                 <?php echo "<font color='#FF0000' style='font-size:14	px'>".$error."</font>";?>
										<div class="<?php if(isset($code) && $code == 1){echo "error" ;}?>"><textarea id="blog_desc" name="blog_desc"><?php echo $data['blog_desc'];?></textarea>
                                  <script type="text/javascript">
                                   CKEDITOR.replace( 'blog_desc',
                                    {
                                        uiColor: '#EEEFEF',																		
										height: 180
										
                                     });
                                </script>
                                </div>						
									</p>
                                    
                                    <div class="stripe-separator"><!--  --></div>
                                    
                                    <?php if(isset($_REQUEST['id']) && !empty($_REQUEST['id']))
									{
									?>
                                     <input type="submit" name="edit_blog" id="edit_blog" class="button round blue image-right ic-add text-upper" value="Edit Blog"/>
                                     <input type="hidden" name="action" id="action" value="Edit"/>
                                    <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']?>"/> 
                                    <input type="hidden" name="prv_image" id="prv_image" value="<?php echo $data['blog_image'];?>"/> 
                                    <?php
                                    }else
									{?>
                                   <input type="submit" name="new_blog" id="new_blog" class="button round blue image-right ic-add text-upper" value="Published"/>
                                   
                                   <input type="hidden" name="action" id="action" value="Add"/>
                                   <?php } ?>
                                    
                                    <div class="stripe-separator"><!--  --></div>
								</fieldset>
							
							</form>
						
						</div> <!-- end half-size-column -->
						
						
				
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