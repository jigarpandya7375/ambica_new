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


		if($_REQUEST['action']=='Edit')
		{
			
			$link=$_REQUEST['rss_url'];
			if($res=urlExist($link)==1)
			{
			$display_no=$_REQUEST['news'];
			
				$res=mysql_query("update ".$SUFFIX."news_rss set rss_link='".$link."',news_item='".$display_no."'");
				if($res==1)
				{
					$msg="<font color='green'>Successfully Updated RSS Fedd Link....!!!</font>";
				}
			}
			else
			{
				$msg.="<font color='red'>Url Not Exists Pls Check URL..!!!!</font>";
			}
			
		}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>RSS | URL</title>
	
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
      <script type="text/javascript" src="js/jquery.fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen" />
    
    <script type="text/javascript">
		$(document).ready(function() {
			$('.fancybox').fancybox();
				$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});
		});
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
					
						<h3 class="fl">RSS | URL</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf">
				
							<?php
                            $sql=mysql_query("select * from ".$SUFFIX."news_rss");
							$res=mysql_fetch_array($sql);
							?>			    
							<form  method="post" name="form_faq" id="form_faq">
							
								<fieldset>
								
                                
	                                <center><?php echo $msg;?></center>
									<p>
										<label for="another-simple-input">RSS URL</label>
										<input type="text" id="rss_url"  name="rss_url" value="<?php echo $res['rss_link']?>" class="round default-width-input validate[required,custom[url]]"/>
                                        <em>Add RSS URL</em>															
                                       
									</p>
                                    
                                    <p>
										<label for="another-simple-input">No of News Item Display</label>
										
                                        <input id="minus" type="button" onclick="news.value = (news.value-1)" maxlength="" value="-">
                                        <input id="news" type="text" value="<?php echo $res['news_item']?>" name="news"  maxlength="3">
                                        <input type="button" onclick="news.value = (+news.value+1)" value="+">
                                        <em>No of Items Display</em>															
                                       
									</p> 
                                    
                                   
                                    <div class="stripe-separator"><!--  --></div>
                                  
                                 
                                   <input type="submit" name="rss_feed" id="rss_feed" class="button round blue image-right ic-add text-upper" value="Update RSS URL"/>
                                   <input type="hidden" name="action" id="action" value="Edit"/>
                                   
                                  <a href="<?php echo $SITE_PATH;?>rss_preview.php?id=<?php echo $res['rss_link_id'];?>" 
                            class="button round blue image-right ic-add text-upper fancybox fancybox.iframe"  title="Live News Preview">Preview</a>
                                   
                                    
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