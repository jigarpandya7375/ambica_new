<?php
ob_start();
session_start();
error_reporting(0);
require_once('../classess/connection.php');

if(!isset($_SESSION['u_name']))
{
	header('location:index.php');
}

$sql="select * from ".$SUFFIX."sub_category where sub_cat_id='".$_GET['id']."'";
$res=mysql_query($sql);
$data=mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ambica Caterer's- Edit Sub Menu</title>
	
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
		alert('Please Insert Category Name');
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
							<form  method="post" name="form" id="form" enctype="multipart/form-data">
							
								<fieldset>
								
	
									<p>
										<label for="another-simple-input">Category Name</label>
										<input type="text" id="another-simple-input" value="<?php echo $data['sub_cat_name'];?>" name="title" class="round default-width-input"/>
										<em>Add Recipe Name</em>								
									</p>
                                    
                                    <p class="form-error-input">
										<label for="dropdown-actions">Category Status</label>
	
										<select id="dropdown-actions" name="status">
                                        <option value="0">----SELECT-----</option>
											<option value="ACTIVE" <?php if($data['sub_cat_status']=='ACTIVE'){ echo 'selected="selected"';} ?>>ACTIVE</option>
                                         <option value="INACTIVE"<?php if($data['sub_cat_status']=='INACTIVE'){ echo 'selected="selected"';} ?>>INACTIVE</option>
										</select>
									</p>
                                    
                                    
                                    
                                    
                                   
                                    <div class="stripe-separator"><!--  --></div>
                                   <center> <a href="javascript:void(0);" class="button round blue image-right ic-add text-upper" onClick="javascript:validate();">Edit <?php echo base64_decode($_GET['menu']);?> Menu</a></center>
                                    
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
							
						
						//echo $image;exit;
						echo  $sql="update ".$SUFFIX."sub_category set sub_cat_name='".$_POST['title']."',sub_cat_status='".$_POST['status']."' where sub_cat_id='".$_GET['id']."' and cat_name='".base64_decode($_GET['menu'])."'";
						$res=mysql_query($sql);
						
						 if($res==1)
							 {			
								  header('location:manage_sub_cat.php?res='.base64_encode("success").'&menu='.base64_decode($_GET['menu']));
							 }
							 else
							 {
								 header('location:manage_sub_cat.php?res='.base64_encode("fail").'&menu='.base64_decode($_GET['menu']));
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