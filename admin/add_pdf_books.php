<?php
ob_start();
session_start();
error_reporting(0);
require_once('../classess/connection.php');
require_once('../classess/function.php');
if(!isset($_SESSION['u_name']))
{
	header('location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Mangae Document</title>
	
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
			jQuery("#doc_form").validationEngine('attach', {bindMethod:"live"});
		});
	</script>
	<script src="js/script.js"></script>    
    
   


</head>
<body>

	<!-- TOP BAR -->
		
		<?php include('include/header.php');?>
	
	 <!-- end top-bar -->
	
	
	
	<!-- HEADER -->
    <?php include('include/header_with_tab.php');?>
	 <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<?php include('include/side_menu.php');?>
 <!-- end side-menu -->
			
			<div class="side-content fr">
            
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Add New Event Image</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					<?php
					if(isset($_REQUEST['id']))
					{
					 $sql=mysql_query("select * from ".$SUFFIX."books where bk_id='".$_REQUEST['id']."'");
					 $res=mysql_fetch_array($sql);
					}
					
                    ?>
					
					<div class="content-module-main cf">
				
						<div class="half-size-column fl">						    
							<form  method="post" name="doc_form" id="doc_form" enctype="multipart/form-data">
							
								<fieldset>
								
	
									<p>
										<label for="another-simple-input">Document Title</label>
										<input type="text" id="another-simple-input" name="title" class="round default-width-input validate[required] text-input " value="<?php echo $res['bk_title']?>"/>
										<em>Add Document Name</em>								
									</p>
                                    <p>
										<label for="another-simple-input">Document Description</label>
										<textarea name="desc" id="desc" rows="5" cols="40"><?php echo $res['bk_desc'];?></textarea>
										<em>Add Document Description</em>								
									</p>
                                   
                                     <p>
										<label for="another-simple-input">Choose Document File Image</label>
	
										<input  type="file" name="image" id="image" <?php if(!isset($_REQUEST['id'])){?> class="validate[required] text-input" <?php }?> />
                                        <em><a href="<?php echo $SITE_PATH;?>file_download/images/<?php echo $res['bk_image']?>" class="fancybox-effects-c" title="<?php echo shorter($res['bk_title'],80);?>"><img style="border-radius: 15px;"  src="<?php echo $SITE_PATH;?>file_download/images/<?php echo $res['bk_image']?>" height="80" width="150"/></a></em>		
									</p> 
                                    
                                     <p>
										<label for="another-simple-input">Choose Document File</label>
	
										<input  type="file" name="cat_image" id="cat_image" <?php if(!isset($_REQUEST['id'])){?> class="validate[required] text-input" <?php }?>/>
                                        <em>
                                        <?php if(isset($_GET['id']) && $res['bk_name']!=''){?>Preview Current File: <a  href="file_view.php?name=<?php echo base64_encode($res['bk_name']);?>" class="fancybox fancybox.iframe" title="Preview File"><img src="images/icons/table/view.png" height="17" width="17"/></a> &nbsp;&nbsp;&nbsp;<?php }else{ echo "No File Uploaded..!!!";}?></em>		
									</p>
                                    
                                    
                                    <p class="form-error-input">
										<label for="dropdown-actions">Document Status</label>
	
										<select id="dropdown-actions" name="status" class="validate[required] text-input">
                                        <option value="">----SELECT-----</option>
											<option value="Active"<?php if($res['status']=='Active'){?> selected="selected"<?php }?>>Active</option>
                                            <option value="Inactive" <?php if($res['status']=='Inactive'){?> selected="selected"<?php }?>>Inactive</option>
										</select>
									</p>
                                    
                                    
                                    
                                    
                                   
                                    <div class="stripe-separator"><!--  --></div>
                                   <center> <!--<a href="javascript:void(0);" class="button round blue image-right ic-add text-upper" onClick="javascript:validate();">Add Document</a>-->
                                   <?php if(isset($_REQUEST['id']) && !empty($_REQUEST['id']))
								   {?>
                                    <input type="submit" name="edit_doc" id="edit_doc" class="button round blue image-right ic-add text-upper" value="Edit Document"/>
                                     <input type="hidden" name="action" id="action"  value="Edit"/>
                                      <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id'];?>"/>
                                      <input type="hidden" name="prv_image" id="prv_image" value="<?php echo $res['bk_image'];?>"/>
                                      <input type="hidden" name="prv_file" id="prv_file" value="<?php echo $res['bk_name'];?>"/>
                                    <?php
								   }else{?>
                                    <input type="submit" name="add_doc" id="add_doc" class="button round blue image-right ic-add text-upper" value="Add Dcoument"/>
									 <input type="hidden" name="action" id="action"  value="Add"/>
									 <?php }?>
                                    </center>
                                    
                                    <div class="stripe-separator"><!--  --></div>
								</fieldset>
							
							</form>
                           
						
						</div> <!-- end half-size-column -->
						
						
				
					</div> <!-- end content-module-main -->
					
				</div> <!-- end content-module -->
	
				<?php
             
			 
			 
			      if($_REQUEST['action']=='Add')
					{
						         if(isset($_FILES['cat_image']['name']))
								 {
									$fileName = $_FILES["cat_image"]["name"];
									$fileTmpLoc = $_FILES["cat_image"]["tmp_name"];
									 
									$ext=explode('.',$fileName);
									$uploaded_file=$ext[0];
									$uploaded_file="indian_recipe_file".$uploaded_file."_".time();
									$db_name=$uploaded_file.".".$ext[1];
									$pathAndName="../file_download/".$uploaded_file.".".$ext[1];
									
									
									// Run the move_uploaded_file() function here
									$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
						  	
									}						
								 if(isset($_FILES['image']['name']))
								 {
										
										$image_path = "../images/icon_user.png";
										$demo_image= "";
										if(isset($_FILES['image']['name']))
										{ 
											$path = "../file_download/images/";
											 $name = $_FILES['image']['name'];
											if(strlen($name))
										   {
										   list($txt, $ext) = explode(".", $name);
										 
											$upload_status = move_uploaded_file($_FILES['image']['tmp_name'], $path.$_FILES['image']['name']);
												if($upload_status)
												{												
													$new_name = $path."Indian_recipe_file_image".time().".jpg";
													$db_name_image = "Indian_recipe_file_image".time().".jpg";
													$height="250";
													$width="200";
													if(watermark_image($path.$_FILES['image']['name'], $new_name,$height,$width))
													 $db_name_image;
												 }
											}
											
										}
									 
									}
									
									// Evaluate the value returned from the function if needed
									if ($moveResult == true)
									{							   
										 $sql="insert into ".$SUFFIX."books values('','".$_POST['title']."','".$_POST['desc']."','".$db_name_image."','".$db_name."','".date('Y-m-d H:i:s')."','".$_POST['status']."')";
									 $res=mysql_query($sql);
										 if($res==1)
										 {			
											  header('location:manage_file.php?res='.base64_encode("success"));
										 }
										 else
										 {
											 header('location:manage_file.php?res='.base64_encode("fail"));
										 }
						 
									} 
					}
					
				  if($_REQUEST['action']=='Edit')
					{
						    //print_r($_POST)  ;exit;
						         $old_image="";
								 $old_file="";
								 
								 if($_FILES['cat_image']['name']=='')
								 {
									 $old_file=$_REQUEST['prv_file'];
								 }
								 else
								 {
									 $filename =  $file_path.'file_download/'.$_REQUEST['prv_file'];
									if(file_exists($filename))
									{
									 unlink($filename);
									}
								   
									$fileName = $_FILES["cat_image"]["name"];
									$fileTmpLoc = $_FILES["cat_image"]["tmp_name"];
									 
									$ext=explode('.',$fileName);
									$uploaded_file=$ext[0];
									$uploaded_file="indian_recipe_file".$uploaded_file."_".time();
									$db_name=$uploaded_file.".".$ext[1];
									$pathAndName="../file_download/".$uploaded_file.".".$ext[1];
									$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
						  	        $old_file.=$db_name;
									}	
				
								 
								 if($_FILES['image']['name']=='')
								 {
									 $old_image=$_REQUEST['prv_image'];
								 }
								 else
								 {	
										    $filename =  $file_path.'file_download/images/'.$_REQUEST['prv_image'];
											if(file_exists($filename))
											{
											 unlink($filename);
											}
								            $image_path = "../images/icon_user.png";
											$demo_image= "";
											if(isset($_FILES['image']['name']))
											{ 
												$path = "../file_download/images/";
												 $name = $_FILES['image']['name'];
												if(strlen($name))
											   {
											   list($txt, $ext) = explode(".", $name);
											 
												$upload_status = move_uploaded_file($_FILES['image']['tmp_name'], $path.$_FILES['image']['name']);
													if($upload_status)
													{												
														$new_name = $path."Indian_recipe_file_image".time().".jpg";
														$db_name_image = "Indian_recipe_file_image".time().".jpg";
														$height="250";
														$width="200";
														if(watermark_image($path.$_FILES['image']['name'], $new_name,$height,$width))
														$old_image.=$db_name_image;
													 }
												}
												
											}
										 
										
								 }
								
						$sql="update ".$SUFFIX."books set bk_title='".$_POST['title']."',bk_desc='".$_POST['desc']."',bk_image='".$old_image."',bk_name='".$old_file."',status='".$_POST['status']."' where bk_id='".$_REQUEST['id']."'";
						$res=mysql_query($sql);
						 if($res==1)
						 {
							 header('location:manage_file.php?res='.base64_encode('success')."&ac=Edit");
						}
					}
				
				   
			 ?>

				
		
			</div > <!-- end side-content -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
    <?php include('include/footer.php');?>
	 <!-- end footer -->

</body>
</html>