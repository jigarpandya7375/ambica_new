<?php
ob_start();
session_start();
error_reporting(0);
require_once('../classess/connection.php');
require_once('../classess/function.php');


							if(isset($_REQUEST['id']))
							{
								$sql="select * from ".$SUFFIX."user_detail where id='".$_GET['id']."'";
								$res=mysql_query($sql);
								$data=mysql_fetch_array($res);
							}
                       
if(!isset($_SESSION['u_name']))
{
	header('location:index.php');
}

if($_REQUEST['action']=='Add')
{
			if($_POST['new_user'])
			{
					
				      				$image_path = "../images/user_icon.png";
									$demo_image= "";
									if(isset($_POST['new_user']))
									{ 
										$path = "../user_images/";
										$valid_formats = array("jpg","bmp","jpeg");
										$name = $_FILES['image']['name'];
										if(strlen($name))
									   {
									   list($txt, $ext) = explode(".", $name);
									 
										$upload_status = move_uploaded_file($_FILES['image']['tmp_name'], $path.$_FILES['image']['name']);
											if($upload_status)
											{
												$new_name = $path."Indian_recipe_blog_image".time().".jpg";
												$db_name = "Indian_recipe_blog_image".time().".jpg";
												$height="280";
												$width="267";
												if(watermark_image($path.$_FILES['image']['name'], $new_name,$height,$width))
												$demo_image = $new_name;
												
												 $sql="insert into ".$SUFFIX."user_detail (`id`,`email`,`password`,`fullname`,`gender`,`dob`,`profile_image`,`status`,`created_on`,`ip`)values('','".trim($_POST['email'])."','".base64_encode(trim($_POST['password']))."','".$_REQUEST['name']."','".$_REQUEST['gender']."','".$_POST['year']."-".$_POST['month']."-".$_POST['day']."','".$db_name."','".$_REQUEST['status']."','".date('Y-m-d H:i:s')."','".$_SERVER['REMOTE_ADDR']."')";
												 $res=mysql_query($sql);
												 if($res==1)
												 {
													 header('location:manage_user.php?res='.base64_encode('success'));
												 }
													
											 }
										}
										
									}
			  }
}

if($_REQUEST['action']=='Edit')
{
		//print_r($_POST);exit;
	$db_image_name="";
	if($_FILES['image']['name']=='')
	{
		$db_image_name=$_REQUEST['prv_image'];
	}
	else
	{
	//echo getcwd();exit;
		$filename =  $file_path.'user_images/'.$_REQUEST['prv_image'];
		if(file_exists($filename))
		{
		 unlink($filename);
		}
		
									$image_path = "../images/icon_user.png";
									$demo_image= "";
									if(isset($_POST['edit_user']))
									{ 
									   
										$path = "../user_images/";
										$valid_formats = array("jpg","bmp","jpeg");
										$name = $_FILES['image']['name'];
										if(strlen($name))
									   {
										  
									  list($txt, $ext) = explode(".", $name);
								
											
								$upload_status = move_uploaded_file($_FILES['image']['tmp_name'], $path.$_FILES['image']['name']);
											if($upload_status)
											{
												$new_name = $path."Indian_recipe_blog_image".time().".jpg";
												$db_name = "Indian_recipe_blog_image".time().".jpg";
												$height="280";
											    $width="267";
												if(watermark_image($path.$_FILES['image']['name'], $new_name,$height,$width))
												$demo_image = $new_name;
												$db_image_name=$db_name;
				
											 }
										}
										
									}
									
									
					
	}
	
	
	//echo "The=>".$db_image_name;exit;
									
				$sql="update ".$SUFFIX."user_detail set fullname='".$_POST['name']."',email='".trim($_POST['email'])."',password='".base64_encode(trim($_POST['password']))."',gender='".trim($_POST['gender'])."',dob='".$_POST['year']."-".$_POST['month']."-".$_POST['day']."',profile_image='".$db_image_name."',status='".$_POST['status']."' where id='".$_REQUEST['id']."'";			
												
												
												$res=mysql_query($sql);
												 if($res==1)
												 {
													 header('location:manage_user.php?res='.base64_encode('success'));
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
	   <script type="text/javascript">
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
        </script>
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
										<label for="another-simple-input">UserName</label>
	     <input type="text" id="name"  value="<?php echo $data['fullname'];?>"  name="name" class="round default-width-input  validate[required] text-input"/>
										<em>User-Name</em>								
									</p>
                                    <p>
										<label for="another-simple-input">E-Mail</label>
	     <input type="text" id="email"  value="<?php echo $data['email'];?>"  name="email" class="round default-width-input  <?php  if(!isset($_REQUEST['id'])){?>validate[required,custom[email]],maxSize[30],ajax[ajaxUserCallPhp1]] text-input<?php }?>"/>
										<em>User Email</em>								
									</p>
                                    
                                    <p>
										<label for="another-simple-input">Passoword</label>
	     <input type="password" id="password"  value="<?php echo base64_decode($data['password']);?>"  name="password" class="round default-width-input  validate[required] text-input"/>
										<em>Password</em>								
									</p>
                                    
                                      <p>
										<label for="another-simple-input">Gender</label>
	    <input type="radio" name="gender" id="gender" <?php if($data['gender']=='male'){?> checked="checked" <?php }?> class="validate[required] radio" value="male">Male &nbsp;&nbsp;<input type="radio" <?php if($data['gender']=='female'){?> checked="checked" <?php }?> name="gender" id="gender" class="validate[required] radio" value="female">Female
																		
									</p>
                                    
                                     <p>
                                     <?php
									 $date=explode("-",$data['dob']);
                                     ?>
										<label for="another-simple-input">Date Of Birth</label>
                                        <select name="year" id="year" class="validate[required] text-input">
                                        <option value="">Year</option>
                                        <?php
										for($i=1950; $i<=date('Y');$i++)
										{
                                        ?>
                                        <option value="<?php echo $i;?>" <?php if($date[0]==$i){?> selected="selected"<?php }?>><?php echo $i;?></option>
                                        <?php }?>
                                        </select>
                                        
                                         <select name="month" id="month" class="validate[required] text-input">
                                        <option value="">Month</option>
                                        <?php
										for($i=1; $i<=12;$i++)
										{
                                        ?>
                                        <option value="<?php echo $i;?>" <?php if($date[1]==$i){?> selected="selected"<?php }?>><?php echo $i;?></option>
                                        <?php }?>
                                        </select>
                                        
                                         <select name="day" id="day" class="validate[required] text-input">
                                        <option value="">Day</option>
                                        <?php
										for($i=1; $i<=31;$i++)
										{
                                        ?>
                                        <option value="<?php echo $i;?>" <?php if($date[2]==$i){?> selected="selected"<?php }?>><?php echo $i;?></option>
                                        <?php }?>
                                        </select>
	  						  
									</p>
                                    
                                      <p>
										<label for="another-simple-input">User Status</label>
                                        <select name="status" id="status" class="validate[required] text-input">
                                        <option value="">---Select Status---</option>
                                        <option value="Active" <?php if($data['status']=='Active'){?> selected="selected"<?php }?> >Active</option>
                                        <option value="Inactive" <?php if($data['status']=='Inactive'){?> selected="selected"<?php }?>>Inactive</option>
                                        <option value="Block" <?php if($data['status']=='Block'){?> selected="selected"<?php }?>>Block</option>
                                        </select>
	 
     
																		
									</p>
                                    
									<p>
										<label for="another-simple-input">User Image</label>
										<input type="file" id="image" value="" name="image" <?php if(!isset($_REQUEST['id'])){?> class="validate[required] text-input"<?php }?>/><?php if(isset($_REQUEST['id'])){ echo "&nbsp;&nbsp;<font color='#FF0000'>Please Leave It blank If You Don't Want to Chnage Images</font>";};?>                    <br/><br/>
                                        <?php if(isset($_REQUEST['id']))
										{?>
                                        <a href="<?php echo $SITE_PATH;?>user_images/<?php echo $data['profile_image']?>" class="fancybox-effects-c" title="<?php echo shorter($data['fullname'],80);?>"><img src="<?php echo $SITE_PATH;?>user_images/<?php echo $data['profile_image']?>" height="60" width="150"/></a>
                                        <?php
										}?>
																
                                    </p>
                                    
                                 
                                    
                                    <div class="stripe-separator"><!--  --></div>
                                    
                                    <?php if(isset($_REQUEST['id']) && !empty($_REQUEST['id']))
									{
									?>
                                     <input type="submit" name="edit_user" id="edit_user" class="button round blue image-right ic-add text-upper" value="Edit User Detail"/>
                                     <input type="hidden" name="action" id="action" value="Edit"/>
                                    <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']?>"/> 
                                    <input type="hidden" name="prv_image" size="200" id="prv_image" value="<?php echo $data['profile_image'];?>"/> 
                                    <?php
                                    }else
									{?>
                                   <input type="submit" name="new_user" id="new_user" class="button round blue image-right ic-add text-upper" value="Add New User"/>
                                   
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