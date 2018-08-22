<?php
ob_start();
session_start();
error_reporting(0);
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
	<title>Soham-Add Page </title>
	
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
		alert('Please Insert Moudle Name');
		return false;
	}	
	
	if(document.getElementById('cat_desc').value=='')
	{
		document.getElementById('cat_desc').focus();
		alert('Please Insert 100 Character Description');
		return false;
	}	
	
	
	if(document.getElementById('duration').value=='')
	{
		document.getElementById('duration').focus();
		alert('Please Insert Duration OF Moudle');
		return false;
	}	
	
	if(document.getElementById('faculties').value=='')
	{
		document.getElementById('faculties').focus();
		alert('Please Insert faculties Name');
		return false;
	}	
	
	
	
	
	if(document.getElementById('cat_img').value=='')
	{
		document.getElementById('cat_img').focus();
		alert('Please Select Moudle Image');
		return false;
	}	
	
    if(document.getElementById('type').value=='0')
	{
		document.getElementById('type').focus();
		alert('Please Select Module Type');
		return false;
	}	
	
	if(document.getElementById('dropdown-actions').value=='0')
	{
		document.getElementById('dropdown-actions').focus();
		alert('Please Select Status for Module');
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

			<?php include('include/side_menu.php');?>
 <!-- end side-menu -->
			
			<div class="side-content fr">
            
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Add New Training Category</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf">
				
						<div class="half-size-column fl">						    
							<form action="#" method="post" name="form" id="form" enctype="multipart/form-data">
							
								<fieldset>
								
	
									<p>
										<label for="another-simple-input">Moudle Name</label>
										<input type="text" id="another-simple-input" name="title" class="round default-width-input"/>
										<em>Add Recipe Name</em>								
									</p>
                                    
                                    
									 <p>
										<label for="textarea">Module Description</label>
										<textarea id="cat_desc" name="cat_desc" class="round full-width-textarea"></textarea>
									</p>
                                    
                                     <p>
										<label for="textarea">Moudle Duration</label>
									<input type="text" id="duration" name="duration" class="round default-width-input"/>
									</p>
                                    
                                    
                                     <p>
										<label for="textarea">Moudle Faculties	</label>
									<input type="text" id="faculties" name="faculties" class="round default-width-input"/>
									</p>
                                    
                                    
                                     <p>
										<label for="another-simple-input">Module Name</label>
	
										<input  type="file" name="cat_image" id="cat_img" size="40" />
									</p>
                                    
                                     <p class="form-error-input">
										<label for="dropdown-actions">Module Type</label>
	
										<select id="type" name="type" >
                                        <option value="0">----SELECT-----</option>
											<option value="Services">Services</option>
                                            <option value="Training">Training</option>
										</select>
									</p>
                                    
                                    <p class="form-error-input">
										<label for="dropdown-actions">Moudle Status</label>
	
										<select id="dropdown-actions" name="status">
                                        <option value="0">----SELECT-----</option>
											<option value="ACTIVE">ACTIVE</option>
                                            <option value="INACTIVE">INACTIVE</option>
										</select>
									</p>
                                    
                                    
                                    
                                    
                                   
                                    <div class="stripe-separator"><!--  --></div>
                                   <center> <a href="javascript:void(0);" class="button round blue image-right ic-add text-upper" onClick="javascript:validate();">Add Moudle</a></center>
                                    
                                    <div class="stripe-separator"><!--  --></div>
								</fieldset>
							
							</form>
                           
						
						</div> <!-- end half-size-column -->
						
						
				
					</div> <!-- end content-module-main -->
					
				</div> <!-- end content-module -->
	
				<?php            
				    if($_POST['title'] && $_POST['cat_desc'])
					
					{
						//print_r($_POST);exit;
						    if(isset($_FILES))
							{
											
						// Example of accessing data for a newly uploaded file
					   $fileName = $_FILES["cat_image"]["name"];
						$fileTmpLoc = $_FILES["cat_image"]["tmp_name"];
						 
						
						$pathAndName="../training_images/".$fileName;
						
						
						// Run the move_uploaded_file() function here
						$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
						// Evaluate the value returned from the function if needed
						if ($moveResult == true)
						{				
								
							  $sql="insert into ".$SUFFIX."category values('','".$_POST['title']."','".$_POST['cat_desc']."','".$fileName."','".$_POST['duration']."','".$_POST['faculties']."','--ADD DESCTIPTION HERE---','".$_POST['type']."','".date("Y-m-d")."','".$_POST['status']."')";
							 $res=mysql_query($sql);
							 if($res==1)
							 {			
								 header('location:welcome.php?res='.base64_encode("success"));
								 
							 }
							 else
							 {
								 
								 header('location:welcome.php?res='.base64_encode("fail"));
							 }
							 
						}
						else
						{
							echo "ERROR: File not moved correctly";
						}
						exit;
								
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