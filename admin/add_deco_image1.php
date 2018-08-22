<?php
ob_start();
session_start();
error_reporting(E_ALL);
require_once('../classess/connection.php');

if(!isset($_COOKIE['username']) || !isset($_SESSION['username']))
{
	header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ambica Caterer's - Decorator Image </title>
	
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
					
						<h3 class="fl">Add New Decorators Image</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf">
				
						<div class="half-size-column fl">						    
							<form  method="post" name="form" id="form" enctype="multipart/form-data">
							
								<fieldset>
								
	
									<p>
										<label for="another-simple-input">Decotrator Title</label>
										<input type="text" id="another-simple-input" name="title" class="round default-width-input"/>
										<em>Add Recipe Name</em>								
									</p>
                                    
                                    
									 <p>
										<label for="textarea">Decotrator Image Description</label>
										<textarea id="cat_desc" name="cat_desc" class="round full-width-textarea"></textarea>
									</p>
                                    
                                    
                                     <p>
										<label for="another-simple-input">Decotrator Image</label>
	
										<input  type="file" name="cat_image" id="cat_img" size="40" />
									</p>
                                    
                                    
                                    <p class="form-error-input">
										<label for="dropdown-actions">Decotrator Status</label>
	
										<select id="dropdown-actions" name="status">
                                        <option value="0">----SELECT-----</option>
											<option value="ACTIVE">ACTIVE</option>
                                            <option value="INACTIVE">INACTIVE</option>
										</select>
									</p>
                                    
                                    
                                    
                                    
                                   
                                    <div class="stripe-separator"><!--  --></div>
                                   <center> <a href="javascript:void(0);" class="button round blue image-right ic-add text-upper" onClick="javascript:validate();">Add Decorators Image</a></center>
                                    
                                    <div class="stripe-separator"><!--  --></div>
								</fieldset>
							
							</form>
                           
						
						</div> <!-- end half-size-column -->
						
						
				
					</div> <!-- end content-module-main -->
					
				</div> <!-- end content-module -->
	
				<?php
                
				    if($_POST['title'] && $_POST['cat_desc'])
					
					{
						//print_r($_POST);
						    if(isset($_FILES))
							{
								
						// Example of accessing data for a newly uploaded file
						 $fileName = $_FILES["cat_image"]["name"];
						 $fileTmpLoc = $_FILES["cat_image"]["tmp_name"];
						 
						$ext=explode('.',$fileName);
						$uploaded_file=$ext[0];
						$uploaded_file="ambica_farakhana_".time();
						$db_name=$uploaded_file.".".$ext[1];
						$pathAndName="../faraskhana_images/".$uploaded_file.".".$ext[1];
						
						
						// Run the move_uploaded_file() function here
						$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
						// Evaluate the value returned from the function if needed
						if ($moveResult == true)
						{							   
						 $sql="insert into ".$SUFFIX."faraskhana values('','".$_POST['title']."','".$_POST['cat_desc']."','".$db_name."','".$_POST['status']."','".date("Y-m-d")."')";
					 $res=mysql_query($sql);
						 if($res==1)
						 {			
							  header('location:decorators.php?res='.base64_encode("success"));
						 }
						 else
						 {
							 header('location:decorators.php?res='.base64_encode("fail"));
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

				
		
			</div > <!-- end side-content -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
    <?php include('include/footer.php');?>
	 <!-- end footer -->

</body>
</html>