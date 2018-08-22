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

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Add Page </title>
	
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
	if(document.getElementById('title').value=='')
	{
		document.getElementById('title').focus();
		alert('Please Insert E-Mail Title');
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
							<form action="#" method="post" name="form" id="form" enctype="multipart/form-data">
							
								<fieldset>
								
                                <p>
										<label for="another-simple-input">Mail Title:</label>
										<input type="text" id="title"  name="title" class="round default-width-input"/>																
									</p>
                                    <br/><br/><br/>
	
									<p>
                                    <label for="another-simple-input">Mail Content:</label>
										<textarea id="mail_content" name="mail_content" class="round full-width-textarea"><?php echo $row1['cat_content'];?></textarea>
									</p>
                                    
								<script type="text/javascript">
                                //<![CDATA[
                    
                                    
                                   CKEDITOR.replace( 'mail_content',
                                    {
                                        uiColor: '#3F4551'
                                     });
                                </script>
																
									</p>
                                    
                                    
									
                                    
                                    
                                    
                                   
                                    <div class="stripe-separator"><!--  --></div>
                                   <center> <a href="javascript:void(0);" class="button round blue image-right ic-add text-upper" onClick="javascript:validate();">Add Email Content</a></center>
                                    
                                    <div class="stripe-separator"><!--  --></div>
								</fieldset>
							
							</form>
                           
						
					
						
						
				
					</div> <!-- end content-module-main -->
					
				</div> <!-- end content-module -->
	
				<?php            
				    if($_POST['title'])
					
					{
							 $sql="insert into ".$SUFFIX."mail values('','".$_POST['title']."','".$_POST['mail_content']."','Active')";
							 $res=mysql_query($sql);
							 if($res==1)
							 {			
								 header('location:manage_mail_content.php?res='.base64_encode("success"));
								 
							 }
							 else
							 {
								 
								 header('location:manage_mail_content.php?res='.base64_encode("fail"));
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