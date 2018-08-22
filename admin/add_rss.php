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

if($_REQUEST['action']=='Add')
{
		
		
				 $sql="insert into ".$SUFFIX."rss values('','".trim( str_replace("'", " ",$_REQUEST['title']))."','".trim( str_replace("'", " ",$_REQUEST['link']))."','".trim( str_replace("'", " ",$_REQUEST['rss_desc']))."','".trim($_REQUEST['status'])."')";
				$res=mysql_query($sql);
			
				if($res=='1')
				{
					header('location:manage_rss.php?res='.base64_encode('success'));
				}

}
if($_REQUEST['action']=='Edit')
{
		
	
		
			echo $sql="update ".$SUFFIX."rss set title='".trim( str_replace("'", " ",$_REQUEST['title']))."',link='".trim( str_replace("'", " ",$_REQUEST['link']))."',description='".trim( str_replace("'", " ",$_REQUEST['rss_desc']))."',status='".trim($_REQUEST['status'])."' where id='".$_REQUEST['rss_id']."'";
				$res=mysql_query($sql);
			
				if($res=='1')
				{
					header('location:manage_rss.php?res='.base64_encode('success'));
				}

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Rss Feed</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/logo_small.png"/>
	<link rel="stylesheet" href="css/pagination.css" media="all" />
    <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
	<!-- Optimize for mobile devices -->	
	<!-- jQuery & JS files -->
	<script src="js/jquery.min.js"></script>
    <script src="js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8">
	</script>
	<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
	</script>
    
     <script>
		jQuery(document).ready(function(){
			jQuery("#new_rss").validationEngine('attach', {bindMethod:"live"});
		});
	</script>
    
	<script src="js/script.js"></script>  	 
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>

<style>
        .error {
            border:1px solid #DB4A39 !Important;
        }
			
       
        </style>
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
					
						<h3 class="fl">Add / Edit RSS Feeds </h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf">
				
					<?php
					           if(isset($_REQUEST['id']))
							   {
                        	    $sql=mysql_query("select * from ".$SUFFIX."rss where id='".$_REQUEST['id']."'");
								$res=mysql_fetch_array($sql);
							   }
								
					?>
                      			    
							
                           <form  method="post" name="new_rss" id="new_rss" enctype="multipart/form-data">
							
								<fieldset>
								
	
									<p>
										<label for="another-simple-input">Rss Title</label>
	     <input type="text" id="title"  value="<?php echo str_replace("'", " ", $res['title']);?>"  name="title" class="round default-width-input  validate[required] text-input"/>
										<em>RSS Title</em>								
									</p>
                                    
                                    <p>
										<label for="another-simple-input">Rss Link</label>
	     <input type="text" id="link"  value="<?php echo str_replace("'", " ",$res['link']);?>"  name="link" class="round default-width-input  validate[required,custom[url]] text-input"/>
										<em>Rss Link</em>								
									</p>
                                    
                                    <p>
										<label for="another-simple-input">Rss Description</label>
	                <textarea   name="rss_desc"  id="rss_desc" class="validate[required]" rows="7" cols="50"><?php echo str_replace("'", " ",$res['description']);?></textarea>
										<em>Rss Description</em>								
									</p>
                                    
                                     <p>
										<label for="another-simple-input">Rss Status</label>
                                        <select name="status" id="status" class="validate[required]">
                                         <option value="">--Select RSS Status--</option>
                                         
                                        <option value="Active" <?php if($res['status']=='Active'){?> selected="selected" <?php }?>>Active</option>
                                        <option value="Inactive" <?php if($res['status']=='Inactive'){?> selected="selected" <?php }?>>Inactive</option>
                                        </select>
	    
										<em>Rss Status</em>								
									</p>
                                    
                                    
                                    
                                    
                                    
									
                                    
                                 
                                    
                                    <div class="stripe-separator"><!--  --></div>
                                   <?php 
								   if(isset($_REQUEST['id']) && !empty($_REQUEST['id']))
								   {
								   ?>
                                   <input type="submit" name="new_blog" id="new_blog" class="button round blue image-right ic-add text-upper" value="Edit RSS Details"/>  
                                    <input type="hidden" name="action" id="action" value="Edit"/>
                                     <input type="hidden" name="rss_id" id="rss_id" value="<?php echo $_GET['id']?>"/>   
                                   <?php
								   }
                                   else
								   {?>
                                   <input type="submit" name="new_blog" id="new_blog" class="button round blue image-right ic-add text-upper" value="Add New RSS"/> 
                                   <input type="hidden" name="action" id="action" value="Add"/> 
                                     <?php
								   }?>
                                   
                                    
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