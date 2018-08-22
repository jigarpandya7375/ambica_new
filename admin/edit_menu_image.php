<?php
ob_start();
session_start();
error_reporting(0);
require_once('../classess/connection.php');
if(!isset($_SESSION['u_name']))
{
	header('location:index.php');
}

$sql="select * from ".$SUFFIX."menu_image where menu_id='".$_GET['id']."'";
$res=mysql_query($sql);
$data=mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ambica Caterer's - Edit Menu Image </title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/icon.png"/>
	<link rel="stylesheet" href="css/pagination.css" media="all" />
	<!-- Optimize for mobile devices -->	
	<!-- jQuery & JS files -->
	<script src="js/jquery.min.js"></script>
	<script src="js/script.js"></script>  
    
    
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>

<script type="text/javascript" language="javascript">
function validate()
{
	if(document.getElementById('another-simple-input').value=='')
	{
		document.getElementById('another-simple-input').focus();
		alert('Please Insert Category Name');
		return false;
	}	
	
	if(document.getElementById('cat_desc').value=='')
	{
		document.getElementById('cat_desc').focus();
		alert('Please Insert 100 Character Description');
		return false;
	}	
	if(document.getElementById('dropdown-actions').value=='0')
	{
		document.getElementById('dropdown-actions').focus();
		alert('Please Select Status for Category');
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
	<?php include('include/header_with_tab.php');    ?>
     <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<?php include('include/side_menu.php');?>
             <!-- end side-menu -->
			
			<div class="side-content fr">
            
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Edit Menu Images</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf">
				
						<div class="half-size-column fl">						    
							<form action="#" method="post" name="form" id="form" enctype="multipart/form-data">
							
								<fieldset>
								
	
									<p>
										<label for="another-simple-input">Category Name</label>
										<input type="text" id="another-simple-input" value="<?php echo $data['menu_title'];?>" name="title" class="round default-width-input"/>
										<em>Add Recipe Name</em>								
									</p>
                                    
                                    
									 <p>
										<label for="textarea">Category Description</label>
										<textarea id="cat_desc" name="cat_desc"  class="round full-width-textarea"><?php echo $data['menu_desc'];?></textarea>
									</p>
                                    
                                    
                                     <p>
										<label for="another-simple-input">Category Image</label>
	
										<input  type="file" name="cat_image" id="cat_image" size="40" /><br/><br/>
                                        <font color="#FF0000" size="-1"> [Please Leave It Blank If your don't want to change Image]</font><br/><br/>
                                        <img src="../menu_images/<?php echo $data['menu_image'];?>" height="100" width="200"/>
									</p>
                                    
                                    
                                    <p class="form-error-input">
										<label for="dropdown-actions">Category Status</label>
	
										<select id="dropdown-actions" name="status">
                                        <option value="0">----SELECT-----</option>
											<option value="ACTIVE" <?php if($data['menu_status']=='ACTIVE'){ echo 'selected="selected"';} ?>>ACTIVE</option>
                                         <option value="INACTIVE"<?php if($data['menu_status']=='INACTIVE'){ echo 'selected="selected"';} ?>>INACTIVE</option>
										</select>
									</p>
                                    
                                    
                                    
                                    
                                   
                                    <div class="stripe-separator"><!--  --></div>
                                   <center> <a href="javascript:void(0);" class="button round blue image-right ic-add text-upper" onClick="javascript:validate();">Edit Menu Image</a></center>
                                    
                                    <div class="stripe-separator"><!--  --></div>
								</fieldset>
							
							</form>
                           
						
						</div> <!-- end half-size-column -->
						
						
				
					</div> <!-- end content-module-main -->
					
				</div> <!-- end content-module -->
	
				<?php
                 require_once ('include/imgMark.class.php');
	             $demo_image= "";
				// $image= "";
				   if($_POST['title'])
				   {
							
						if($_FILES['cat_image']['name']=="")
						{
							
			              $image.=$data['fk_image'];
			 
						}
						if($_FILES['cat_image']['name']!="")
						{
						
						  
							//print_r($_FILES);exit;
								$file_name = "am_menu_".time(); // You can Set File Name
								$file_path = "../menu_images/"; // Set Path to Store Watermarked and Resized Images
								$image = new imgMark(); // Create New Object of imgMark Class
								
								$image->font_path = "include/arial.ttf"; // Font file
								$image->font_size = 20; // in pixels
								$image->water_mark_text = "ambicacaterers.6te.net";  //WatermarkText
								$image->color = 'FFFFFF'; //text Color
								$image->opacity =80; // Opacity of the Text
								$image->rotation = 0; // Text rotation (in Degree)
								$image->img_width = 430; // (Optional) If you want to resize image you can set maximum width
								$image->img_height = 322; // (Optional) If you want to resize image you can set maximum height
								// Here you have to user functins watermark_text or watermark_image
								if($image->convertImage('cat_image', $file_name, $file_path))
								 $demo_image = $image->img_path;		
								$Image_name=explode("/",$demo_image);
								 $image=$Image_name[2];
								
				  
								
							
						}
						//echo $image;exit;
						  $sql="update ".$SUFFIX."menu_image set menu_title='".$_POST['title']."',menu_desc='".$_POST['cat_desc']."',menu_image='".$image."',menu_status='".$_POST['status']."' where menu_id='".$_GET['id']."'";
						$res=mysql_query($sql);
						
						if($res==1)
						{
							$succ=base64_encode("success");
							header('location:menu_image.php?res='.$succ);
						}
						else
						{
							$succ=base64_encode("fail");
							header('location:menu_image.php?res='.$succ);
						}
					
					
				   }
					 
                  ?>

				
		
			</div> <!-- end side-content -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
    <?php include('include/footer.php');?>
	 <!-- end footer -->

</body>
</html>