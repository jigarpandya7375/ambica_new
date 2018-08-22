<?php
ob_start();
session_start();
error_reporting(0);
require_once('classess/connection.php');
require_once('classess/function.php');
?>
<!DOCTYPE html>
<html >
<head>
 
  <title>See Our Full Catering Menu | Download Our Full Catering Menu </title>
 
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  
  <meta name="description" content="Download and watch Online our full Catering Menu we provide with great service. | Our Menu Download in (.PDF) Format">
  
   <meta name="keywords" content="Top caterers | Top caterers in vadodara | Top caterers in baroda | Top Wedding caterers in vadodara | Top caterers in Gujarat | Top caterers in India | Famous caterers in vadodara | Best caterers in India | Food Caterers in vadodara | top caterers in vadodara gujarat">
  
  
  <link rel="shortcut icon" href="<?php echo $SITE_PATH;?>assets/images/small_ico.png" type="image/x-icon">
  
  <?php include('include/include_css.php');?>
  
  
</head>
<body>
  

 <?php include('include/header.php');?>
 
 
<section class="engine"><a href="https://mobirise.me/e">how to make a site for free</a></section><section class="header1 cid-qUVycMA0Lq mbr-parallax-background" id="header1-1c">

    

    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(0, 0, 0);">
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                <h1 class="mbr-section-title align-center mbr-bold pb-3 mbr-fonts-style display-1">
                    
                <div>Eat healthy live longer.</div></h1>
                
                <p class="mbr-text align-center pb-3 mbr-fonts-style display-5">" Those who think they have no time for healthy eating, will sooner or later have to find time for illness. "</p>
                <div class="mbr-section-btn align-center">
                    <a class="btn btn-md btn-white-outline display-4" href="<?php echo $SITE_PATH;?>Download/<?php echo base64_encode("Menu.PDF");?>"><span class="mbr-iconfont mbri-download"></span> Download Our Full Menu</a></div>
            </div>
        </div>
    </div>

</section>

<section class="mbr-section article content9 cid-qUVfUK6KHC" id="content9-l">
    
     

    <div class="container">
        <div class="inner-container" style="width: 100%;">
            <hr class="line" style="width: 25%;">
            <div class="section-text align-center mbr-fonts-style display-1">Our Special Menu</div>
            <hr class="line" style="width: 25%;">
        </div>
        </div>
</section>

<section class="mbr-gallery mbr-slider-carousel cid-qUVyjHZK4W" id="gallery1-1d">

    <div class="container">
        <div><!-- Filter --><!-- Gallery --><div class="mbr-gallery-row"><div class="mbr-gallery-layout-default"><div><div>
        
                    <?php

				    $sql = "select * from ".$SUFFIX."category where status='ACTIVE'";

					$res=mysql_query($sql);							

					while($data = mysql_fetch_assoc($res))

					{							  

					?>
        
        <div class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false" data-tags="Awesome"><div href="#" data-slide-to="0" data-toggle="modal"><img src="<?php echo $SITE_PATH;?>category_images/<?php echo $data['cat_image'];?>" height="200" alt="" title=""><span class="icon-focus"></span><span class="mbr-gallery-title mbr-fonts-style display-7"><a href="<?php echo $SITE_PATH;?>Details/<?php echo $data['cat_id'];?>" style="color:#FFF;"><?php echo $data['cat_name'];?></a></span></div></div>
        
           <?php

             }		                                 

            ?>

        
        </div></div><div class="clearfix"></div></div></div><!-- Lightbox -->
        
        <div data-app-prevent-settings="" class="mbr-slider modal fade carousel slide" tabindex="-1" data-keyboard="true" data-interval="false" id="lb-gallery1-1d"><div class="modal-dialog"><div class="modal-content"><div class="modal-body"><div class="carousel-inner"><div class="carousel-item active"><img src="assets/images/gallery00.jpg" alt="" title=""></div><div class="carousel-item"><img src="assets/images/gallery01.jpg" alt="" title=""></div><div class="carousel-item"><img src="assets/images/gallery02.jpg" alt="" title=""></div><div class="carousel-item"><img src="assets/images/gallery03.jpg" alt="" title=""></div><div class="carousel-item"><img src="assets/images/gallery04.jpg" alt="" title=""></div><div class="carousel-item"><img src="assets/images/gallery05.jpg" alt="" title=""></div><div class="carousel-item"><img src="assets/images/gallery06.jpg" alt="" title=""></div><div class="carousel-item"><img src="assets/images/gallery07.jpg" alt="" title=""></div></div><a class="carousel-control carousel-control-prev" role="button" data-slide="prev" href="#lb-gallery1-1d"><span class="mbri-left mbr-iconfont" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control carousel-control-next" role="button" data-slide="next" href="#lb-gallery1-1d"><span class="mbri-right mbr-iconfont" aria-hidden="true"></span><span class="sr-only">Next</span></a><a class="close" href="#" role="button" data-dismiss="modal"><span class="sr-only">Close</span></a></div></div></div></div></div>
    </div>
    

</section>



<?php include('include/footer2.php'); ?>



<?php include('include/include_js.php') ?>




 
  
  
 <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i></i></a></div>
    <input name="animation" type="hidden">
  </body>
</html>