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


		if($_REQUEST['action']=='Add' || $_REQUEST['action']=='Edit')
		{
			
			$name=$_REQUEST['cui_name'];
			$status=$_REQUEST['status'];
			if($_REQUEST['action']=='Add')
			{
				$res=mysql_query("insert into ".$SUFFIX."main_cuisine values('','".$name."','".$status."','".date('Y-m-d H:i:s')."')");
				if($res==1)
				{
					RedirectTo('manage_cuisine.php?res='.base64_encode('success'));
				}
			}
			if($_REQUEST['action']=='Edit')
			{
				$res=mysql_query("update ".$SUFFIX."main_cuisine set cui_name='".$name."',status='".$status."' where cui_id='".$_REQUEST['id']."'");
				if($res==1)
				{
					RedirectTo('manage_cuisine.php?res='.base64_encode('success'));
				}
			}
			
		}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php if($_GET['id']){ echo "Edit";}else{echo "Add New";}?> FAQ</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/logo_small.png"/>
	<link rel="stylesheet" href="css/pagination.css" media="all" />
     <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
     <link rel="shortcut icon" href="../images/icon.png"/>
	<!-- Optimize for mobile devices -->	
	<!-- jQuery & JS files -->
	<script src="js/jquery.min.js"></script>
     <script src="js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8">	</script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">	</script>
    
     <script>
		jQuery(document).ready(function(){
			jQuery("#form_faq").validationEngine('attach', {bindMethod:"live"});
		});
	</script>
	<script src="js/script.js"></script>  
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
     

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
					
						<h3 class="fl"><?php if($_GET['id']){ echo "Edit";}else{echo "Add New";}?> FAQ</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf">
				
							<?php
                            $sql=mysql_query("select * from ".$SUFFIX."main_cuisine where cui_id='".$_REQUEST['id']."'");
							$res=mysql_fetch_array($sql);
							?>			    
							<form  method="post" name="form_faq" id="form_faq">
							
								<fieldset>
								
                                
	
									<p>
										<label for="another-simple-input">Cuisine Name:</label>
										<textarea id="cui_name"  name="cui_name" class="round default-width-input validate[required] text-input"/><?php echo $res['cui_name'];?></textarea>
                                        <em>Add Cuisine Title</em>															
									</p>
                                    
                                    <p>
										<label for="another-simple-input">Cuisine Status:</label>
										<select name="status" class="validate[required] text-input">
                                        <option value="">---Select Cuisine Status---</option>
                                        <option value="Active"<?php if($res['status']=='Active'){?> selected='selected' <?php }?>>Active</option>
                                        <option value="Inactive"<?php if($res['status']=='Inactive'){?> selected='selected' <?php }?>>Inactive</option>
                                        </select>
                                        <em>Cuisine Status</em>															
									</p>
                                    
                                  
                                    
                                     
                                    
                                    
                                    
                                    
                                   
                                    <div class="stripe-separator"><!--  --></div>
                                   <center> 
                                   
                                   <?php
								   if(isset($_REQUEST['id']) && !empty($_REQUEST['id']))
								   {
                                   ?>
                                   <input type="submit" name="edit_cuisine" id="edit_cuisine" class="button round blue image-right ic-add text-upper" value="Edit Cuisine"/>
                                   <input type="hidden" name="action" id="action" value="Edit"/>
                                   <input type="hidden" name="id" id="id" value="<?php echo $_GET['id'];?>"/>
                                   <?php
								   }
								   else
								   {?>
                                   <input type="submit" name="new_cuisine" id="new_cuisine" class="button round blue image-right ic-add text-upper" value="Add Cuisine"/>
                                   <input type="hidden" name="action" id="action" value="Add"/>
                                   <?php
								   }?>
                                   </center>
                                    
                                    <div class="stripe-separator"><!--  --></div>
								</fieldset>
							
							</form>
                           
						
						</div> <!-- end half-size-column -->
						
						
				
					</div> <!-- end content-module-main -->
					
				</div> <!-- end content-module -->
	
				
				
		
			</div> <!-- end side-content -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
    <?php include('include/footer.php');?>
	 <!-- end footer -->

</body>
</html>