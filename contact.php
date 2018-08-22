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
 
  <title>Contact Us Ambicacaterers | Live Help </title>
 
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  
  <meta name="description" content="Ambicacaterers contact details like address and email. Contact us for any support or for any Catering Services, Event Management. Ambicacaterers team will reply in maximum 24 to 48 hours.">
  
   <meta name="keywords" content="Top caterers | Top caterers in vadodara | Top caterers in baroda | Top Wedding caterers in vadodara | Top caterers in Gujarat | Top caterers in India | Famous caterers in vadodara | Best caterers in India | Food Caterers in vadodara | top caterers in vadodara gujarat">
  
  
  <link rel="shortcut icon" href="<?php echo $SITE_PATH;?>assets/images/small_ico.png" type="image/x-icon">
  
  <?php include('include/include_css.php');?>
  
  
</head>
<body>
  

 <?php include('include/header.php');?>
 
 
<section class="engine"></section><section class="header1 cid-qUVycMA0Lq mbr-parallax-background" id="header1-1c">

    

    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(0, 0, 0);">
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                <h1 class="mbr-section-title align-center mbr-bold pb-3 mbr-fonts-style display-1">
                    
                <div>Contact Us</div></h1>
                
                <p class="mbr-text align-center pb-3 mbr-fonts-style display-5">" Those who think they have no time for healthy eating, will sooner or later have to find time for illness. "</p>
                <div class="mbr-section-btn align-center">
                    <a class="btn btn-md btn-white-outline display-4" href="<?php echo $SITE_PATH;?>Download/<?php echo base64_encode("Menu.PDF");?>"><span class="mbr-iconfont mbri-download"></span>Download Our Full Menu</a></div>
            </div>
        </div>
    </div>

</section>
<section class="mbr-section content4 cid-qUWcfDzJ3I" id="content4-22">

    

    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2">CONTACT &nbsp;WITHOUT HESITATE</h2>
                
                
            </div>
        </div>
    </div>
</section>

<section class="mbr-section article content9 cid-qUVAiZet38" id="content9-1h">
    
     

    <div class="container">
        <div class="inner-container" style="width: 100%;">
            <hr class="line" style="width: 25%;">
            <div class="section-text align-center mbr-fonts-style display-5">
                   Send us a message and we’ll get back to you as soon as possible. You can also reach us by phone at +91 98240 17375 , 90990 27375. Looking forward to hearing from you.
                   
                </div>
            <hr class="line" style="width: 25%;">
        </div>
        </div>
</section>

<section class="mbr-section form4 cid-qUVArvepBm" id="form4-1i">

    

    
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="google-map">
                
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3691.037133411585!2d73.22423314999999!3d22.31443535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395fcf7986ae4611%3A0x1e12addefadaeccd!2sAmbica+Caterers%2C+vadodara%2Cgujarat%2Cindia!5e0!3m2!1sen!2s!4v1391162107557"  frameborder="0" ></iframe>
                
                </div>
          </div>
            <div class="col-md-6">
                <h2 class="pb-3 align-left mbr-fonts-style display-2">
                    Drop a Line
                    <br/>
                    <?php
                    if(isset($_REQUEST['new_category']))

						{
							
						
						 $sql="insert into ".$SUFFIX."message (`mess_id`,`mess_text`,`mess_email`,`mess_status`,`user_name`,`mess_phone`,`mess_ip`) values(null,'".$_REQUEST['message']."','".$_REQUEST['email']."','UNREAD','".$_REQUEST['name']."','".$_REQUEST['phone']."','".$_SERVER['REMOTE_ADDR']."')";
						 $res=mysql_query($sql);
								if($res==1)

								{

								?>

								<div class="success1" id="result"><h4 style="color:green;">Your Inquiry Send Successfully...!!!</h4></div>

								<?php

								}

								else

								{

								?>

								 <div class="error_msg" id="result"><h5 style="color:red;">Some Technical Error Found ;For Sending A Inquiry...Please Try After Some Time...!!!</h5></div>

								<?php	

								}

						}

?>
                    
                </h2>
                <div>
                    <div class="icon-block pb-3">
                        
                        
                    </div>
                    
                </div>
                <div data-form-type="formoid">
                    <div data-form-alert="" hidden="">
                        Thanks for filling out the form!
                        
                        
                        
                    </div>
                    <form class="block mbr-form" action="" method="post" data-form-title=" Form">
                    
                    
                        <div class="row">
                            <div class="col-md-6 multi-horizontal" data-for="name">
                                <input type="text" class="form-control input" name="name" data-form-field="Name" placeholder="Your Name" required="" id="name-form4-1i">
                            </div>
                            <div class="col-md-6 multi-horizontal" data-for="phone">
                                <input type="text" class="form-control input" name="phone" data-form-field="Phone" placeholder="Phone" required="" id="phone-form4-1i">
                            </div>
                            <div class="col-md-12" data-for="email">
                                <input type="text" class="form-control input" name="email" data-form-field="Email" placeholder="Email" required="" id="email-form4-1i">
                            </div>
                            <div class="col-md-12" data-for="message">
                                <textarea class="form-control input" name="message" rows="3" data-form-field="Message" placeholder="Your Reqirement" style="resize:none" id="message-form4-1i"></textarea>
                            </div>
                            <div class="input-group-btn col-md-12" style="margin-top: 10px;">
                                <button href="" type="submit" class="btn btn-primary btn-form display-4" name="new_category">SEND MESSAGE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="testimonials3 cid-qUVACkS9Oj" id="testimonials3-1j">

    

    

    <div class="container">
        <div class="media-container-row">
            <div class="media-content px-3 align-self-center mbr-white py-2">
            
            <p class="mbr-text testimonial-text mbr-fonts-style display-7">
                  <h1 style="color:#000;">Owner's Desk</h1>
                </p>
                
                <p class="mbr-text testimonial-text mbr-fonts-style display-7">
                   We Serves delicious Gujarati , Panjabi, Chinese, continental , European cuisine. The surroundings are created in a nice way to give a glimpse of Gujarat, a historically rich state in India.
                </p>
                <p class="mbr-author-name pt-4 mb-2 mbr-fonts-style display-7">
                   Raju Joshi (Tikubhai) (Caterers)
                </p>
                <p class="mbr-author-desc mbr-fonts-style display-7">
                    Mobile No:+91 98240 17375 , 90990 27375
                </p>
                
                <p class="mbr-author-name pt-4 mb-2 mbr-fonts-style display-7">
                   Hemang Joshi (Dipubhai) (Decorators)
                </p>
                <p class="mbr-author-desc mbr-fonts-style display-7">
                    Mobile :+91 98255 95315
                </p>
            </div>

            <div class="mbr-figure pl-lg-5" style="width: 50%;">
              <img src="<?php echo $SITE_PATH;?>assets/images/owner2-1-200x186.jpg" style="border-radius: 20px; border: inset 5px #333;" alt="" title="">
            </div>
        </div>
    </div>
</section>

<?php

if($_REQUEST['chat']=='support')

{

?>

<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?3m8NaZHPSBGPAR7NFrJwMocoHb12HIl6";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zopim Live Chat Script-->

<?php

}

?>

<?php include('include/footer2.php'); ?>



<?php include('include/include_js.php') ?>




 
  
  
 <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i></i></a></div>
    <input name="animation" type="hidden">
  </body>
</html>