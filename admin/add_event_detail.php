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
		alert('Please Insert Event Name');
		return false;
	}	
	
	if(document.getElementById('eve_desc').value=='')
	{
		document.getElementById('eve_desc').focus();
		alert('Please Insert Event Description');
		return false;
	}	
	
	if(document.getElementById('venue').value=='')
	{
		document.getElementById('venue').focus();
		alert('Please Insert Venu of the Event');
		return false;
	}	
	
	if(document.getElementById('date').value=='')
	{
		document.getElementById('date').focus();
		alert('Please Insert Event Date');
		return false;
	}	
	
	if(document.getElementById('dropdown-actions').value=='0')
	{
		document.getElementById('dropdown-actions').focus();
		alert('Please Select Status for Event');
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
					
						<h3 class="fl">Add Event Details</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf">
				
						<div class="half-size-column fl">						    
							<form action="#" method="post" name="form" id="form" enctype="multipart/form-data">
							
								<fieldset>
								
	
									<p>
										<label for="another-simple-input">Event Name</label>
										<input type="text" id="another-simple-input" name="ename"  class="round default-width-input"/>
										<em>Add Recipe Name</em>								
									</p>
                                    
                                    
									 <p>
										<label for="textarea">Event Description</label>
										<textarea id="eve_desc" name="eve_desc" class="round full-width-textarea"></textarea>
									</p>
                                    
                                     <p>
										<label for="textarea">Event Venue</label>
									<input type="text" id="venue" name="venue" class="round default-width-input"/>
									</p>
                                    
                                    
                                     <p>
										<label for="textarea">Event Date</label>
									<input type="text" id="date" name="date" class="round default-width-input"/>
									</p>
                                    
                                    <p class="form-error-input">
										<label for="dropdown-actions">Event Status</label>
	
										<select id="dropdown-actions" name="status">
                                        <option value="0">----SELECT-----</option>
											<option value="ACTIVE">ACTIVE</option>
                                            <option value="INACTIVE">INACTIVE</option>
										</select>
									</p>
                                    
                                    
                                    
                                    
                                   
                                    <div class="stripe-separator"><!--  --></div>
                                   <center> <a href="javascript:void(0);" class="button round blue image-right ic-add text-upper" onClick="javascript:validate();">Add Event Details</a></center>
                                    
                                    <div class="stripe-separator"><!--  --></div>
								</fieldset>
							
							</form>
                           
						
						</div> <!-- end half-size-column -->
						
						
				
					</div> <!-- end content-module-main -->
					
				</div> <!-- end content-module -->
	
				<?php  
				
				    if($_POST['ename'] && $_POST['eve_desc'])
					
					{
						
					 $sql="insert into ".$SUFFIX."event values('','".$_POST['ename']."','".$_POST['eve_desc']."','".$_POST['venue']."','".$_POST['date']."','".$_POST['status']."')";
							 $res=mysql_query($sql);
							 if($res==1)
							 {			
								 header('location:manage_event.php?res='.base64_encode("success"));
								 
							 }
							 else
							 {
								 
								 header('location:manage_event.php?res='.base64_encode("fail"));
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