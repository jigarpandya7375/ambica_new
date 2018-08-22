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
if(isset($_POST['change_bg_image']))
{
    $sql="update ".$SUFFIX."site_setting set back_image='".$_REQUEST['texture_image']."'";
	$res=mysql_query($sql);
}

if(isset($_POST['change_color']))
{
	//print_r($_POST);exit;
   $sql="update ".$SUFFIX."site_setting set link_color='".$_REQUEST['link_color']."',font_color='".$_REQUEST['font_color']."',title_color='".$_REQUEST['title']."',title_desc='".$_REQUEST['title_desc']."' where site_id=1";
	$res=mysql_query($sql);
}

if(isset($_POST['Set_Default']))
{
     $sql="update ".$SUFFIX."site_setting set link_color='',font_color='',title_color='',title_desc='' where site_id=1";
	$res=mysql_query($sql);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Site Setting | Home </title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/logo_small.png"/>
	<link rel="stylesheet" href="css/pagination.css" media="all" />
    <link href="css/csschart.css" rel="stylesheet" type="text/css" media="screen" />
	<!-- Optimize for mobile devices -->	
	<!-- jQuery & JS files -->
	<script src="js/jquery.min.js"></script>
    <script src="js/script.js"></script>  
	 <script type="text/javascript" src="js/farbtastic.js"></script>
     <link rel="stylesheet" href="css/farbtastic.css" type="text/css" />
     <style type="text/css" media="screen">
       .colorwell {
         border: 2px solid #fff;
         width: 6em;
         text-align: center;
         cursor: pointer;
       }
       body .colorwell-selected {
         border: 2px solid #000;
         font-weight: bold;
       }
     </style>
    <script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
    $('#demo').hide();
    var f = $.farbtastic('#picker');
    var p = $('#picker').css('opacity', 0.25);
    var selected;
    $('.colorwell')
      .each(function () { f.linkTo(this); $(this).css('opacity', 0.75); })
      .focus(function() {
        if (selected) {
          $(selected).css('opacity', 0.75).removeClass('colorwell-selected');
        }
        f.linkTo(this);
        p.css('opacity', 1);
        $(selected = this).css('opacity', 1).addClass('colorwell-selected');
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
        <?php include('include/side_menu.php');?>

			 <!-- end side-menu -->
			
			<div class="side-content fr">
          
                <!--content Type 2 start-->
               
               
		        <div class="half-size-column fl">
	
					<div class="content-module">
					
						<div class="content-module-heading cf">
						
							<h3 class="fl">Choose Background Images</h3>
							<span class="fr expand-collapse-text">Click to collapse</span>
							<span class="fr expand-collapse-text initial-expand">Click to expand</span>
						
						</div> <!-- end content-module-heading -->
						
			<?php
			  $sql="select * from ".$SUFFIX."site_setting where site_id=1";
	          $res=mysql_query($sql);
			  $res1=mysql_fetch_array($res);
            ?>
			<div class="content-module-main">
			<form name="site_settings" id="site_settings" method="post">
            <div style="width:50%;">
			<a class="bg_t" href="javascript:void(0);" onClick="nil_texture_color('bg_1.jpg','bg_1.jpg');">
            <img alt="" src="<?php echo $SITE_PATH;?>images/bg/bg_1.jpg"style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;">
            </a>
            <a class="bg_t" href="javascript:void(0);" onClick="nil_texture_color('bg_2.jpg','bg_2.jpg');">
            <img alt="" src="<?php echo $SITE_PATH;?>images/bg/bg_2.jpg"style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;">
            </a>
            <a class="bg_t" href="javascript:void(0);" onClick="nil_texture_color('bg_3.jpg','bg_3.jpg');">
            <img alt="" src="<?php echo $SITE_PATH;?>images/bg/bg_3.jpg"style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;">
            </a>
            <a class="bg_t" href="javascript:void(0);" onClick="nil_texture_color('bg_4.jpg','bg_4.jpg');">
            <img alt="" src="<?php echo $SITE_PATH;?>images/bg/bg_4.jpg"style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;">
            </a>
            
            <a class="bg_t" href="javascript:void(0);" onClick="nil_texture_color('bg_5.jpg','bg_5.jpg');">
            <img alt="" src="<?php echo $SITE_PATH;?>images/bg/bg_5.jpg"style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;">
            </a>
            <br/>
            <a class="bg_t" href="javascript:void(0);" onClick="nil_texture_color('bg_6.jpg','bg_6.jpg');">
            <img alt="" src="<?php echo $SITE_PATH;?>images/bg/bg_6.jpg"style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;">
            </a>
            <a class="bg_t" href="javascript:void(0);" onClick="nil_texture_color('bg_7.jpg','bg_7.jpg');">
            <img alt="" src="<?php echo $SITE_PATH;?>images/bg/bg_7.jpg"style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;">
            </a>
            <a class="bg_t" href="javascript:void(0);" onClick="nil_texture_color('bg_8.jpg','bg_8.jpg');">
            <img alt="" src="<?php echo $SITE_PATH;?>images/bg/bg_8.jpg"style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;">
            </a>
           
            <a class="bg_t" href="javascript:void(0);" onClick="nil_texture_color('bg_9.jpg','bg_9.jpg');">
            <img alt="" src="<?php echo $SITE_PATH;?>images/bg/bg_9.jpg"style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;">
            </a>
            <a class="bg_t" href="javascript:void(0);" onClick="nil_texture_color('bg_10.jpg','bg_10.jpg');">
            <img alt="" src="<?php echo $SITE_PATH;?>images/bg/bg_10.jpg"style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;">
            </a>
             <br/>
             <a class="bg_t" href="javascript:void(0);" onClick="nil_texture_color('bg_11.jpg','bg_11.jpg');">
            <img alt="" src="<?php echo $SITE_PATH;?>images/bg/bg_11.jpg"style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;">
            </a>
            <a class="bg_t" href="javascript:void(0);" onClick="nil_texture_color('bg_12.jpg','bg_12.jpg');">
            <img alt="" src="<?php echo $SITE_PATH;?>images/bg/bg_12.jpg"style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;">
            </a>
           
            <a class="bg_t" href="javascript:void(0);" onClick="nil_texture_color('bg_13.jpg','bg_13.jpg');">
            <img alt="" src="<?php echo $SITE_PATH;?>images/bg/bg_13.jpg"style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;">
            </a>
             <a class="bg_t" href="javascript:void(0);" onClick="nil_texture_color('bg_14.jpg','bg_14.jpg');">
            <img alt="" src="<?php echo $SITE_PATH;?>images/bg/bg_14.jpg"style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;">
            </a>
             <a class="bg_t" href="javascript:void(0);" onClick="nil_texture_color('bg_15.jpg','bg_15.jpg');">
            <img alt="" src="<?php echo $SITE_PATH;?>images/bg/bg_15.jpg"style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;">
            </a>
             <br/>
             <a class="bg_t" href="javascript:void(0);" onClick="nil_texture_color('bg_16.jpg','bg_16.jpg');">
            <img alt="" src="<?php echo $SITE_PATH;?>images/bg/bg_16.jpg"style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;">
            </a> 
            
             <a class="bg_t" href="javascript:void(0);" onClick="nil_texture_color('bg_17.jpg','bg_17.jpg');">
            <img alt="" src="<?php echo $SITE_PATH;?>images/bg/bg_17.jpg"style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;">
            </a> 
            
             <a class="bg_t" href="javascript:void(0);" onClick="nil_texture_color('bg_18.jpg','bg_18.jpg');">
            <img alt="" src="<?php echo $SITE_PATH;?>images/bg/bg_18.jpg"style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;">
            </a> 
             <a class="bg_t" href="javascript:void(0);" onClick="nil_texture_color('bg_19.jpg','bg_19.jpg');">
            <img alt="" src="<?php echo $SITE_PATH;?>images/bg/bg_19.jpg"style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;">
            </a> 
             <a class="bg_t" href="javascript:void(0);" onClick="nil_texture_color('bg_20.jpg','bg_20.jpg');">
            <img alt="" src="<?php echo $SITE_PATH;?>images/bg/bg_20.jpg"style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;">
            </a> 
            <br/>
             <a class="bg_t" href="javascript:void(0);" onClick="nil_texture_color('bg_21.jpg','bg_21.jpg');">
            <img alt="" src="<?php echo $SITE_PATH;?>images/bg/bg_21.jpg"style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;">
            </a> 
             <a class="bg_t" href="javascript:void(0);" onClick="nil_texture_color('bg_22.jpg','bg_22.jpg');">
            <img alt="" src="<?php echo $SITE_PATH;?>images/bg/bg_22.jpg"style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;">
            </a> 
            
             <a class="bg_t" href="javascript:void(0);" onClick="nil_texture_color('bg_23.jpg','bg_23.jpg');">
            <img alt="" src="<?php echo $SITE_PATH;?>images/bg/bg_23.jpg"style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;">
            </a> 
            
             <a class="bg_t" href="javascript:void(0);" onClick="nil_texture_color('bg_24.jpg','bg_24.jpg');">
            <img alt="" src="<?php echo $SITE_PATH;?>images/bg/bg_24.jpg"style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;">
            </a> 
             <a class="bg_t" href="javascript:void(0);" onClick="nil_texture_color('bg_25.jpg','bg_25.jpg');">
            <img alt="" src="<?php echo $SITE_PATH;?>images/bg/bg_25.jpg"style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;">
            </a> 
            
            <br/> 
            
            <a class="bg_t" href="javascript:void(0);" onClick="nil_texture_color('bg_26.jpg','bg_26.jpg');">
            <img alt="" src="<?php echo $SITE_PATH;?>images/bg/bg_26.jpg"style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;">
            </a> 
             <a class="bg_t" href="javascript:void(0);" onClick="nil_texture_color('bg_27.jpg','bg_27.jpg');">
            <img alt="" src="<?php echo $SITE_PATH;?>images/bg/bg_27.jpg"style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;">
            </a> 
            
             <a class="bg_t" href="javascript:void(0);" onClick="nil_texture_color('bg_28.jpg','bg_28.jpg');">
            <img alt="" src="<?php echo $SITE_PATH;?>images/bg/bg_28.jpg"style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;">
            </a> 
            
             <a class="bg_t" href="javascript:void(0);" onClick="nil_texture_color('bg_29.jpg','bg_29.jpg');">
            <img alt="" src="<?php echo $SITE_PATH;?>images/bg/bg_29.jpg"style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;">
            </a> 
             <a class="bg_t" href="javascript:void(0);" onClick="nil_texture_color('bg_30.jpg','bg_30.jpg');">
            <img alt="" src="<?php echo $SITE_PATH;?>images/bg/bg_30.jpg"style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;">
            </a>
                   <input  type="hidden" id="texture_image" name="texture_image" value="<?php  echo $res1['back_image'];?>"/>                   
                   
                      <script>	
			 function nil_texture_color(mytexture,seltexture)
			 {
				 
				 var url_link='<?php echo $SITE_PATH;?>images/bg/'+seltexture;
				  //alert(url_link);
				 document.getElementById('sel_texture_color').src=url_link;
				 document.getElementById('texture_image').value=mytexture;
			 }
			 </script>
             </div>
             <div style="width:50%; float:right;margin-top:-35%;">
             <label><h2>Image Preview</h2></label><br/>
              <div style="margin-top:-8%;"><img src="<?php if($res1['back_image']!=''){ echo $SITE_PATH."images/bg/".$res1['back_image']; }else{ echo SERVER_URL."images/bg/bg_11.jpg";}?>" id="sel_texture_color" name="sel_texture_color"/></div>
              </div>
             <br/><br/><br/><br/>
						
                        <input type="submit" value="Change Backgound Images" class="button round blue image-right ic-add text-upper" id="change_bg_image" name="change_bg_image">
					</form>
						</div> <!-- end content-module-main -->
					
					</div> <!-- end content-module -->
	
				</div>
                
                <div class="half-size-column fr">

				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Change Website Color Settings</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf">
				
						
                <form name="color" id="color" method="post" style="width: 500px;">
  <div id="picker" style=" float:left;"></div>
  <div style="margin-left:50%;">
  <h1><FONT color="#0000FF">HEADER PART</FONT></h1>
   <div class="form-item"><label for="color3">Title Color:</label><input type="text" id="title" name="title" class="colorwell" value="<?php if($res1['title_color']!=''){ echo $res1['title_color'];}else{echo "#4c402b" ;}?>" /></div><br/>
  <div class="form-item"><label for="color4">Description Color:</label><input type="text" id="title_desc" name="title_desc" class="colorwell" value="<?php if($res1['title_desc']!=''){ echo $res1['title_desc'];}else{echo "#e8a900" ;}?>"></div>
  <br/><br/>
  
  
   <h1><FONT color="#0000FF">COMMON PART</FONT></h1>
  <div  class="form-item"><label for="color1">Web Font Color:</label><input type="text" id="font_color" name="font_color" class="colorwell" value="<?php if($res1['font_color']!=''){ echo $res1['font_color'];}else{echo "#48402c" ;}?>" /></div><br/>
  <div class="form-item"><label for="color2">Web Link Color:</label><input type="text" id="link_color" name="link_color" class="colorwell" value="<?php if($res1['link_color']!=''){ echo $res1['link_color'];}else{echo "#e8a900" ;}?>" /></div><br/>
 
 <!-- <div class="form-item"><label for="color5">Color 5:</label><input type="text" id="color5" name="color5" class="colorwell" value="#123456" /></div>
  <div class="form-item"><label for="color6">Color 6:</label><input type="text" id="color6" name="color6" class="colorwell" value="#123456" /></div>-->
  </div>
 <br/><br/>
  <center> <input type="submit" value="Change Color" class="button round blue image-right ic-edit text-upper" id="change_color" name="change_color">
   
    <input type="submit" value="Set Default" class="button round blue image-right ic-refresh text-upper" id="Set_Default" name="Set_Default"></center>
  
</form>
                
					</div> <!-- end content-module-main -->
				
				</div> <!-- end content-module -->

			</div>
          
                
              

			</div> <!-- end side-content -->
		  
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
    <?php include('include/footer.php');?>
	 <!-- end footer -->
</div>
</body>
</html>