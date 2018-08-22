<?php
ob_start();
session_start();
error_reporting(E_ALL);
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
	<title>Soham Tech - Event Image </title>
	
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
		alert('Please Insert Event Title');
		return false;
	}	
	
	if(document.getElementById('cat_desc').value=='')
	{
		document.getElementById('cat_desc').focus();
		alert('Please Insert 100 Character Event Description');
		return false;
	}	
	
	
	if(document.getElementById('cat_img').value=='')
	{
		document.getElementById('cat_img').focus();
		alert('Please Select Event Image');
		return false;
	}	
	
	if(document.getElementById('dropdown-actions').value=='0')
	{
		document.getElementById('dropdown-actions').focus();
		alert('Please Select Status for Event Image');
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
					
						<h3 class="fl">Add New Event Image</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf">
				
						<div class="half-size-column fl">						    
                       <?php
					   error_reporting(0);
						include('../classess/uploadclass.php');
						
						if (isset($_POST['Submit']) && ($_POST['Submit'] == 'Submit')) {
							//print_r($_POST);
						$images = new get_thumbnail;
						$images ->thisimage = 'manish';
						$images-> create_thumb(); 
						// $filename;
						echo "Thumbnails has been created.";
						} else {
						?>
						<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">

                                    <fieldset>
								
	
									<p>
										<label for="another-simple-input">Event Title</label>
										<input type="text" id="another-simple-input" name="title" class="round default-width-input"/>
										<em>Add Recipe Name</em>								
									</p>
                                    
                                    
									 <p>
										<label for="textarea">Event Image Description</label>
										<textarea id="cat_desc" name="cat_desc" class="round full-width-textarea"></textarea>
									</p>
                                     <p>
										<label for="another-simple-input">Event Image</label>
	

  										<input name="manish" type="file" id="manish" />
                                     </p>
                                     
                                     <p class="form-error-input">
										<label for="dropdown-actions">Event Image Status</label>
	
										<select id="dropdown-actions" name="status">
                                        <option value="0">----SELECT-----</option>
											<option value="ACTIVE">ACTIVE</option>
                                            <option value="INACTIVE">INACTIVE</option>
										</select>
									</p>
                                                                         
                                      <input type="submit" name="Submit" value="Submit" />
                                    </form>
                                    <?php
                                    }
                                    ?>
						
						</div> <!-- end half-size-column -->
						
						
				
					</div> <!-- end content-module-main -->
					
				</div> <!-- end content-module -->
	
				
		
			</div > <!-- end side-content -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
    <?php include('include/footer.php');?>
	 <!-- end footer -->

</body>
</html>