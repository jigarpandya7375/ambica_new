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
	<title>Mail Send</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/logo_small.png"/>
	<link rel="stylesheet" href="css/pagination.css" media="all" />
     <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
	<!-- Optimize for mobile devices -->	
	<!-- jQuery & JS files -->
	<script src="js/jquery.min.js"></script>
     <script src="js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8">	</script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">	</script>
    
     <script>
		jQuery(document).ready(function(){
			jQuery("#form_email").validationEngine('attach', {bindMethod:"live"});
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
					
						<h3 class="fl">E-Mail Send</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf">
				
											    
							<form action="email_all.php" method="post" name="form_email" id="form_email">
							
								<fieldset>
								
                                <p>
                                <label for="another-simple-input">Select Mail Content:</label>
                                   <select name="category" id="category" onChange="javascript:mail_content(this.value);" >
                                <option value="0">---Select Mail Content---</option>
                                <?php
                                
                                $sql="select * from ".$SUFFIX."mail where status='Active'";
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
										<input type="text" id="another-simple-input"  name="title" class="round default-width-input validate[required] text-input" />	
                                    
                                        
                                   
                                        
                                        <em>Note:<font color="#FF0000">You Can Add More Than One E-mail ID Using comma [&nbsp;,&nbsp;]&nbsp; <font color="#333333"> E.g. abc@gmail.com &nbsp;<font size="+1"> , </font>&nbsp; xyz@yahoo.com</font>&nbsp;&nbsp;&nbsp;</font></em>															
									</p>
                                    <br/><br/>
                                    
                                    <p>
										<label for="another-simple-input">Subject:</label>
										<input type="text" id="subject"  name="subject" class="round default-width-input validate[required] text-input" />																
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
                                </script>
									</p>
                                    
                                    
                                     
                                    
                                    
                                    
                                    
                                   
                                    <div class="stripe-separator"><!--  --></div>
                                   <center> <!--<a href="javascript:void(0);" class="button round blue image-right ic-add text-upper" onClick="javascript:validate();">Send Mail</a>-->
                                   <input type="submit" name="new_blog" id="new_blog" class="button round blue image-right ic-add text-upper" value="Send E-Mail"/>
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