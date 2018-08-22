<?php
ob_start();
session_start();
error_reporting(0);
require_once('classess/connection.php');
require_once('classess/function.php');

$sql = "SELECT * from ".$SUFFIX."category where cat_id='".$_GET['id']."' and status='Active'";

$res1=mysql_query($sql);

$data1=mysql_fetch_array($res1);
?>
<!DOCTYPE html>
<html >
<head>
 
  <title>Top caterers | Top caterers in vadodara | Top caterers in baroda | Top Wedding caterers in vadodara | Top caterers in Gujarat | Top caterers in India  </title>
 
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  
  <meta name="description" content="Top caterers | Top Wedding caterers in vadodara | Best Wedding Catering Services in India | Birthday Party Celebration | Private Party, Corporate Party catering service in vadodara | Top catering Service at Affordable Price">
  
   <meta name="keywords" content="Top caterers | Top caterers in vadodara | Top caterers in baroda | Top Wedding caterers in vadodara | Top caterers in Gujarat | Top caterers in India | Famous caterers in vadodara | Best caterers in India | Food Caterers in vadodara | top caterers in vadodara gujarat">
  
  
  <link rel="shortcut icon" href="<?php echo $SITE_PATH;?>assets/images/small_ico.png" type="image/x-icon">
  <style>
.pagination1 {
    display: inline-block;
}

.pagination1  a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
}

.pagination1 .current {
    background-color: #3498db;
    color: white;
    border-radius: 5px;
}

.pagination1 :hover:not(.current) {
    background-color: #ddd;
    border-radius: 5px;
}
</style>
  <?php include('include/include_css.php');?>
  
  
</head>
<body>
  

 <?php include('include/header.php');?>
 
<section class="engine"></section><section class="header1 cid-qUVycMA0Lq mbr-parallax-background" id="header1-1c">

    

    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(0, 0, 0);">
    </div>
    
     


    <div class="container">
        <div class="inner-container" style="width: 100%;">
            <hr class="line" style="width: 25%;">
            <div class="section-text align-center mbr-fonts-style display-2" style="color:#FFF;">OUR MENU ITEMS</div>
            <hr class="line" style="width: 25%;">
        </div>
        </div>
</section>

<section class="mbr-section info2 cid-qUW7Rh1Tar" id="info2-1y">

    

    

    <div class="container">
        <div class="row main justify-content-center">
            <div class="media-container-column col-12 col-lg-3 col-md-4">
                
            </div>
            <div class="media-container-column title col-12 col-lg-7 col-md-6">
                <h2 class="align-right mbr-bold mbr-white pb-3 mbr-fonts-style display-2"><p>&nbsp; &nbsp;<?php echo $data1['cat_name'];?> 
                </p></h2>
                <h3 class="mbr-section-subtitle align-right mbr-light mbr-white mbr-fonts-style display-5">
                    <?php echo $data1['cat_name'];?> FULL MENU LIST
                </h3>
            </div>
        </div>
    </div>
</section>

<section class="testimonials3 cid-qUVACkS9Oj" id="testimonials3-1j">   

    <div class="container">
        <div class="media-container-row">
            <div class="media-content px-3 align-self-center mbr-white py-2">
                
                <p class="mbr-text testimonial-text mbr-fonts-style display-7">
                
                               <?php

								$sql = "SELECT * from ".$SUFFIX."sub_category where cat_id='".$_GET['id']."' and status='ACTIVE'";

								$num_results_per_page = 12;

								$num_page_links_per_page = 4;

								$pg_param = "&id=".$_GET['id'].""; // Ex: &q=value

								include('include/pagination_inc.php');								

								pagination($sql, $num_results_per_page, $num_page_links_per_page, $pg_param);

								$res=mysql_query($sql);

								if($pg_error == '')

								{

									if(mysql_num_rows($pg_result) > 0)

									{										

										while($data = mysql_fetch_assoc($pg_result))

										{							  

								?>
                
                  
                  <li style="color:#000; display:block;text-align:justify;"><img src="<?php echo $SITE_PATH;?>assets/images/marker-1.png"/></span>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $data['sub_cat_name'];?></li>
                   
                   
                   
                   
                                     <?php	

										}		

										

									}

									else

									{

									?>

                                    <img src="<?php echo $SITE_PATH;?>images/No_item.png"/>

                                    <?php

									}

								}

								else

								{

									echo $pg_error; //display any errors, you can remove this if you want.	

								}

                               ?> 
                               <BR/>
                               <div><?php  echo $pagination_output;?></div>
                </p>
            </div>
             <?php

				  $sql="select cat_image from ".$SUFFIX."category where cat_id='".$_GET['id']."'" ;
				  $res=mysql_query($sql);
				  $data=mysql_fetch_array($res);

                  ?>

            <div class="mbr-figure pl-lg-5" style="width: 50%;">
              <img src="<?php echo $SITE_PATH;?>category_images/<?php echo $data['cat_image'];?>" alt="" style="border-radius: 20px; border: inset 5px #333;" title="">
            </div>
        </div>
    </div>
    
</section>



<?php include('include/footer2.php'); ?>



<?php include('include/include_js.php') ?>




 
  
  
 <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i></i></a></div>
    <input name="animation" type="hidden">
  </body>
</html>