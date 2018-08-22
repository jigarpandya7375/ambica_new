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

$sql="select * from ".$SUFFIX."message where mess_id='".$_GET['id']."'";
$res=mysql_query($sql);
$data=mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Soham-Mail Send</title>
	
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
		alert('Please Insert Mail-ID');
		return false;
	}	
	
		if(document.getElementById('subject').value=='')
	{
		document.getElementById('subject').focus();
		alert('Please Insert Mail Subject');
		return false;
	}	
	
	
	
	document.forms["form"].submit();
}

function mail_content(name,id)
{
	//alert(name+id);
	window.location.href='mail_send.php?name='+name+'&id='+id;
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
					
						<h3 class="fl">E-Mail Send</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf">
				
											    
							<form action="email.php" method="post" name="form" id="form">
							
								<fieldset>
								
                                <p>
                                <label for="another-simple-input">Select Mail Content:</label>
                                   <select name="category" id="category" onChange="javascript:mail_content(this.value,'<?php echo $_GET['id']?>');" >
                                <option value="0">---Select Mail Content---</option>
                                <?php
                                
                                $sql="select * from ".$SUFFIX."mail";
                                $res=mysql_query($sql);
                                while($row=mysql_fetch_array($res))
                                {
								//echo $image=$SITE_PATH."/category_images/".$row['cat_image'];exit;
                                ?>
                                    
                                        <option value="<?php echo base64_encode($row['mail_title']);?>"
                                        <?php 
										if($row['mail_title']== base64_decode($_GET['name']))
										{?>selected="selected"<?php }?>><?php echo shorter($row['mail_title'],40);?></option>
                                      
                                <?php
                                }
                                ?>
                                </select>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FF0000">[ &nbsp;&nbsp;&nbsp;Please Do Not Choose If you Don't Won't Add Mail Content&nbsp;&nbsp;&nbsp;]</font>
                               
                                </p>
	
									<p>
										<label for="another-simple-input">To:</label>
										<input type="text" id="another-simple-input" value="<?php echo $data['mess_email'];?>" name="title" class="round default-width-input" readonly/>																
									</p>
                                    <br/><br/>
                                    
                                    <p>
										<label for="another-simple-input">Subject:</label>
										<input type="text" id="subject"  name="subject" class="round default-width-input" />																
									</p>
                                    <br/><br/>
                                    
                                    
									 <p>
                                      <?php
									  if(isset($_GET['name']))
									  {
                                
										$sql="select * from ".$SUFFIX."mail where mail_title='".base64_decode($_GET['name'])."'";
										$res=mysql_query($sql);
										$data=mysql_fetch_array($res);
									  }
										?>
                                     <label for="another-simple-input">E-Mail Content</label>
										<textarea id="editor1" name="editor1" class="round full-width-textarea"><?php echo $data['mail_content'];?></textarea>
									</p>
                                    
								<script type="text/javascript">
                                //<![CDATA[
                    
                                    
                                   CKEDITOR.replace( 'editor1',
                                    {
                                        uiColor: '#3F4551'
                                     });
                                    
                                       /* CKEDITOR.replace( 'editor1',
                                        {
                                            extraPlugins : 'bbcode',
                                            toolbar :
                                            [
                                                ['Source', '-', 'Save','NewPage','-','Undo','Redo'],
                                                ['Find','Replace','-','SelectAll','RemoveFormat'],
                                                ['Link', 'Unlink', 'Image'],
                                                '/',
                                                ['FontSize', 'Bold', 'Italic','Underline'],
                                                ['NumberedList','BulletedList','-','Blockquote'],
                                                ['TextColor', '-', 'Smiley','SpecialChar', '-', 'Maximize']
                                            ],
                                            
                                        });*/
                    
                                //]]>
                                </script>
									</p>
                                    
                                    
                                     
                                    
                                    
                                    
                                    
                                   
                                    <div class="stripe-separator"><!--  --></div>
                                   <center> <a href="javascript:void(0);" class="button round blue image-right ic-add text-upper" onClick="javascript:validate();">Send Mail</a></center>
                                    
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