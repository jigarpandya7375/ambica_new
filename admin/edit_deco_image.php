<?php
ob_start();
session_start();
error_reporting(0);
require_once('../classess/connection.php');
if(!isset($_SESSION['u_name']))
{
	header('location:index.php');
}

$sql="select * from ".$SUFFIX."faraskhana where fk_id='".$_GET['id']."'";
$res=mysql_query($sql);
$data=mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Soham-Edit page </title>
	
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
					
						<h3 class="fl">Add New Category</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf">
				
						<div class="half-size-column fl">						    
							<form action="#" method="post" name="form" id="form" enctype="multipart/form-data">
							
								<fieldset>
								
	
									<p>
										<label for="another-simple-input">Category Name</label>
										<input type="text" id="another-simple-input" value="<?php echo $data['fk_title'];?>" name="title" class="round default-width-input"/>
										<em>Add Recipe Name</em>								
									</p>
                                    
                                    
									 <p>
										<label for="textarea">Category Description</label>
										<textarea id="cat_desc" name="cat_desc"  class="round full-width-textarea"><?php echo $data['fk_desc'];?></textarea>
									</p>
                                    
                                    
                                     <p>
										<label for="another-simple-input">Category Image</label>
	
										<input  type="file" name="cat_image" id="cat_image" size="40" /><br/><br/>
                                        <font color="#FF0000" size="-1"> [Please Leave It Blank If your don't want to change Image]</font><br/><br/>
                                       
                                        <img src="<?php echo $SITE_PATH;?>event_images/<?php echo $data['fk_image'];?>" height="100" width="200"/>
									</p>
                                    
                                    
                                    <p class="form-error-input">
										<label for="dropdown-actions">Category Status</label>
	
										<select id="dropdown-actions" name="status">
                                        <option value="0">----SELECT-----</option>
											<option value="ACTIVE" <?php if($data['fk_status']=='ACTIVE'){ echo 'selected="selected"';} ?>>ACTIVE</option>
                                         <option value="INACTIVE"<?php if($data['fk_status']=='INACTIVE'){ echo 'selected="selected"';} ?>>INACTIVE</option>
										</select>
									</p>
                                    
                                    
                                    
                                    
                                   
                                    <div class="stripe-separator"><!--  --></div>
                                   <center> <a href="javascript:void(0);" class="button round blue image-right ic-add text-upper" onClick="javascript:validate();">Edit Event Image</a></center>
                                    
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
						
						  
							// Example of accessing data for a newly uploaded file
						 $fileName = $_FILES["cat_image"]["name"];
						 $fileTmpLoc = $_FILES["cat_image"]["tmp_name"];
						 
						$ext=explode('.',$fileName);
						$uploaded_file=$ext[0];
						$uploaded_file="soham_event_".time();
						$image.=$uploaded_file.".".$ext[1];
						$pathAndName="../event_images/".$uploaded_file.".".$ext[1];
						
						
						// Run the move_uploaded_file() function here
						$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
						// Evaluate the value returned from the function if needed
											   
				  
								
							
						}
						
							
						//echo $image;exit;
						 echo $sql="update ".$SUFFIX."faraskhana set fk_title='".$_POST['title']."',fk_desc='".$_POST['cat_desc']."',fk_image='".$image."',fk_status='".$_POST['status']."' where fk_id='".$_GET['id']."'";
						$res=mysql_query($sql);
						
						if($res==1)
						{
							$succ=base64_encode("success");
							header('location:decorators.php?res='.$succ);
						}
						else
						{
							$succ=base64_encode("fail");
							header('location:decorators.php?res='.$succ);
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