<?php
ob_start();
session_start();
//error_reporting(0);
require_once('../classess/connection.php');
if(!isset($_SESSION['u_name']))
{
	header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ambica Caterer's - Menu Image </title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/icon.png"/>
	<link rel="stylesheet" href="css/pagination.css" media="all" />
	<!-- Optimize for mobile devices -->	
	<!-- jQuery & JS files -->
	<script src="js/jquery.min.js"></script>
	<script src="js/script.js"></script>    
    
   

<script type="text/javascript" language="javascript">
function validate()
{
	if(document.getElementById('another-simple-input').value=='')
	{
		document.getElementById('another-simple-input').focus();
		alert('Please Insert Decorator Title');
		return false;
	}	
	
	if(document.getElementById('cat_desc').value=='')
	{
		document.getElementById('cat_desc').focus();
		alert('Please Insert 100 Character Docoration Description');
		return false;
	}	
	
	
	if(document.getElementById('cat_img').value=='')
	{
		document.getElementById('cat_img').focus();
		alert('Please Select Decoration Image');
		return false;
	}	
	
	if(document.getElementById('dropdown-actions').value=='0')
	{
		document.getElementById('dropdown-actions').focus();
		alert('Please Select Status for Decoration Image');
		return false;
	}	
	
	document.forms["form"].submit();
}
</script>
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
					
						<h3 class="fl">Add New Menu Image</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf">
				
						<div class="half-size-column fl">						    
							<form action="#" method="post" name="form" id="form" enctype="multipart/form-data">
							
								<fieldset>
								
	
									<p>
										<label for="another-simple-input">Menu Image Title</label>
										<input type="text" id="another-simple-input" name="title" class="round default-width-input"/>
										<em>Add Recipe Name</em>								
									</p>
                                    
                                    
									 <p>
										<label for="textarea">Menu Image Description</label>
										<textarea id="cat_desc" name="cat_desc" class="round full-width-textarea"></textarea>
									</p>
                                    
                                    
                                     <p>
										<label for="another-simple-input">Menu Image</label>
	
										<input  type="file" name="cat_image" id="cat_img" size="40" />
									</p>
                                    
                                    
                                    <p class="form-error-input">
										<label for="dropdown-actions">Menu Status</label>
	
										<select id="dropdown-actions" name="status">
                                        <option value="0">----SELECT-----</option>
											<option value="ACTIVE">ACTIVE</option>
                                            <option value="INACTIVE">INACTIVE</option>
										</select>
									</p>
                                    
                                    
                                    
                                    
                                   
                                    <div class="stripe-separator"><!--  --></div>
                                   <center> <a href="javascript:void(0);" class="button round blue image-right ic-add text-upper" onClick="javascript:validate();">Add Menu Image</a></center>
                                    
                                    <div class="stripe-separator"><!--  --></div>
								</fieldset>
							
							</form>
                           
						
						</div> <!-- end half-size-column -->
						
						
				
					</div> <!-- end content-module-main -->
					
				</div> <!-- end content-module -->
	
				<?php
                 require_once ('include/imgMark.class.php');
	             $demo_image= "";
				    if($_POST['title'] && $_POST['cat_desc'])
					
					{
						//print_r($_POST);
						    if(isset($_FILES))
							{
								//print_r($_FILES);
								$file_name = "am_menu_".time(); // You can Set File Name
								$file_path = "../menu_images/"; // Set Path to Store Watermarked and Resized Images
								$image = new imgMark(); // Create New Object of imgMark Class
								
								$image->font_path = "include/arial.ttf"; // Font file
								$image->font_size = 30; // in pixels
								$image->water_mark_text = "ambicacaterers.6te.net";  //WatermarkText
								$image->color = 'FFFFFF'; //text Color
								$image->opacity =80; // Opacity of the Text
								$image->rotation = 0; // Text rotation (in Degree)
								$image->img_width = 965; // (Optional) If you want to resize image you can set maximum width
								$image->img_height = 350; // (Optional) If you want to resize image you can set maximum height
								// Here you have to user functins watermark_text or watermark_image
								if($image->convertImage('cat_image', $file_name, $file_path))
								 $demo_image = $image->img_path;		
								$Image_name=explode("/",$demo_image);
								 $Image_name[2];
								
			     $sql="insert into ".$SUFFIX."menu_image values('','".$_POST['title']."','".$_POST['cat_desc']."','".$Image_name[2]."','".$_POST['status']."','".date("Y-m-d")."')";
				 $res=mysql_query($sql);
				 if($res==1)
				 {			
					  header('location:menu_image.php?res='.base64_encode("success"));
				 }
				 else
				 {
					 header('location:menu_image.php?res='.base64_encode("fail"));
				 }
				 
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