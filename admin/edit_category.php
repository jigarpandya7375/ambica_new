<?php
ob_start();
session_start();
error_reporting(0);
require_once('../classess/connection.php');

if(!isset($_SESSION['u_name']))
{
	header('location:index.php');
}

$sql="select * from ".$SUFFIX."category where cat_id='".$_GET['id']."'";
$res=mysql_query($sql);
$data=mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Soham-Edit Page</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/logo_small.png"/>
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
		alert('Please Insert Module Name');
		return false;
	}	
	
	if(document.getElementById('cat_desc').value=='')
	{
		document.getElementById('cat_desc').focus();
		alert('Please Insert 100 Character Description');
		return false;
	}	
	
	if(document.getElementById('type').value=='0')
	{
		document.getElementById('Type').focus();
		alert('Please Select Module Type');
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
     <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">
          
			<?php include('include/side_menu.php');?> <!-- end side-menu -->
			
			<div class="side-content fr">
            
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Edit Traiing Module</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf">
				
						<div class="half-size-column fl">						    
							<form action="#" method="post" name="form" id="form" enctype="multipart/form-data">
							
								<fieldset>
								
	
									<p>
										<label for="another-simple-input">Module Name</label>
										<input type="text" id="another-simple-input" value="<?php echo $data['cat_name'];?>" name="title" class="round default-width-input"/>
										<em>Add Recipe Name</em>								
									</p>
                                    
                                    
									 <p>
										<label for="textarea">Module Description</label>
										<textarea id="cat_desc" name="cat_desc"  class="round full-width-textarea"><?php echo $data['cat_desc'];?></textarea>
									</p>
                                    
                                    
                                     <p>
										<label for="textarea">Moudle Duration</label>
									<input type="text" id="another-simple-input" name="duration"  value="<?php echo $data['cat_duration'];?>" class="round default-width-input"/>
									</p>
                                    
                                    
                                     <p>
										<label for="textarea">Moudle Faculties	</label>
									<input type="text" id="another-simple-input" name="faculties"  value="<?php echo $data['cat_faculties'];?>" class="round default-width-input"/>
									</p>
                                    
                                    
                                     <p>
										<label for="another-simple-input">Module Image</label>
	
										<input  type="file" name="cat_image" id="cat_image" size="40" /><br/><br/>
                                        <font color="#FF0000" size="-1"> [Please Leave It Blank If your don't want to change Image]</font><br/><br/>
                                        <img  style="border: inset 5px;" src="../training_images/<?php echo $data['cat_image'];?>" height="100" width="200"/>
									</p>
                                    
                                    
                                     <p class="form-error-input">
										<label for="dropdown-actions">Module Type</label>
	
										<select id="type" name="type">
                                        <option value="0">----SELECT-----</option>
											<option value="Services" <?php if($data['cat_type']=='Services'){ echo 'selected="selected"';} ?>>Services</option>
                                         <option value="Training"<?php if($data['cat_type']=='Training'){ echo 'selected="selected"';} ?>>Training</option>
										</select>
									</p>
                                    
                                    
                                    <p class="form-error-input">
										<label for="dropdown-actions">Module Status</label>
	
										<select id="dropdown-actions" name="status">
                                        <option value="0">----SELECT-----</option>
											<option value="ACTIVE" <?php if($data['cat_status']=='ACTIVE'){ echo 'selected="selected"';} ?>>ACTIVE</option>
                                         <option value="INACTIVE"<?php if($data['cat_status']=='INACTIVE'){ echo 'selected="selected"';} ?>>INACTIVE</option>
										</select>
									</p>
                                    
                                    
                                    
                                    
                                   
                                    <div class="stripe-separator"><!--  --></div>
                                   <center> <a href="javascript:void(0);" class="button round blue image-right ic-add text-upper" onClick="javascript:validate();">Edit Module Information</a></center>
                                    
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
							
			              $image.=$data['cat_image'];
			 
						}
						if($_FILES['cat_image']['name']!="")
						{
						
						  
						 // Example of accessing data for a newly uploaded file
						   $fileName = $_FILES["cat_image"]["name"];
							$fileTmpLoc = $_FILES["cat_image"]["tmp_name"];
							 
							$image=$fileName;
							$pathAndName="../training_images/".$fileName;
							
							
							// Run the move_uploaded_file() function here
							$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
				  
								
							
						}
						
						//echo $image;exit;
						
						$sql="update ".$SUFFIX."category set cat_name='".$_POST['title']."',cat_desc='".$_POST['cat_desc']."',cat_image='".$image."',cat_status='".$_POST['status']."',cat_duration='".$_POST['duration']."',cat_type='".$_POST['type']."',cat_faculties='".$_POST['faculties']."' where cat_id='".$_GET['id']."'";
						$res=mysql_query($sql);
						
						if($res==1 )
						{
							$succ=base64_encode("success");
							header('location:welcome.php?res='.$succ);
						}
						else
						{
							$succ=base64_encode("fail");
							header('location:welcome.php?res='.$succ);
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