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

//echo getcwd();

?>

<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8">

	<title>Admin Panel | Home </title>

	

	<!-- Stylesheets -->

	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>

	<link rel="stylesheet" href="css/style.css">

    <link rel="shortcut icon" href="img/logo_small.png"/>

	<link rel="stylesheet" href="css/pagination.css" media="all" />

    <link href="css/csschart.css" rel="stylesheet" type="text/css" media="screen" />

	<!-- Optimize for mobile devices -->	

	<!-- jQuery & JS files -->

	<script src="js/jquery.min.js"></script>

    <script type="text/javascript" src="js/wz_jsgraphics.js"></script>

<script type="text/javascript" src="js/pie.js">



<!-- Pie Graph script-By Balamurugan S http://www.sbmkpm.com/ //-->

<!-- Script featured/ available at Dynamic Drive code: http://www.dynamicdrive.com //-->



</script>

	<script src="js/script.js"></script>  

    <script type="text/javascript" language="javascript">

	function search_data()

	{

		//alert('call');

		if(document.getElementById('search-form').value=='')

		{

			//document.getElementById('search').focus();

			alert('Enter Some  Search Value...');

			return false;

		}

		else

		{

			document.forms["search-form"].submit();

		}

	}

	

	

	 function change_status(id,status,page)

	{

	//alert(id+status+page);

		

		

		var r=confirm('Are u Sure...!!!\r\n You Want To Change Comment Status...?')

		if(r==true)		

		{

			

			window.location.href='change_comment_status.php?id='+id+'&status='+status+'&page='+page;

			

		}

		else

		{

			return false;

		}

	}

	

	 function change_newsletter_status(id,status,page)

	{

	//alert(id+status+page);

		

		

		var r=confirm('Are u Sure...!!!\r\n You Want To Change E-Mail Subscription Status...?')

		if(r==true)		

		{

			

			window.location.href='change_emailsub_status.php?id='+id+'&status='+status+'&page='+page;

			

		}

		else

		{

			return false;

		}

	}

		

	

</script>

    <style>

.ui-widget-header {

    background: #FFF; /* default */

    background: -moz-linear-gradient(top center, #FFFFFF, #3f4551);

    background: -webkit-gradient(linear, left top, left bottom, color-stop(0.00, #FFFFFF), color-stop(1.00, #3f4551));

    background: -ms-linear-gradient(top center, #FFFFFF, #003366);

  filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#ffffff', endColorstr='#3f4551'); /* For IE6 & IE7 */

-ms-filter: "progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#ffffff', endColorstr='#3f4551')"; /* for IE8 */

  height:200px;

  width:450px;

  float:right;

  border-bottom:double 5px;

  

}





</style>



<script type="text/javascript" src="js/jquery.min.js"></script>



<script src="js/snow.js"></script>



<script>



var mysticky=new stickynote({

	content:{divid:'stickynote1', source:'inline'},

	showfrequency:'always',

	pos:['right', 'top'],

	hidebox:50

})

</script>

    

</head>

<body>

   

   <div id="stickynote1" class="ui-widget-header">

<a href="javascript:void(0);" style="float:right;" onClick="mysticky.showhidenote('hide');return false"><img src="images/cross-lines.png" height="30" width="30" /></a>

<center>

<h1>Welcome To Admin panel</h1><br/>

 <font color="#FFFFFF">&quot;<?php echo $_SESSION['u_name'];?>&quot;</font><br/><br/><h3>Your Have Some New Notification</h3><br/>

 <div class="wrapper">

	<ul class="menu non-html5">

       
		

         <?php 

		 $sql_message="select * from ".$SUFFIX."message where mess_status='UNREAD'";

		 $no_message=mysql_num_rows(mysql_query($sql_message));

		?>

		<li><a href="message.php">New Message<span class="yellow"><?php echo $no_message;?></span></a></li>

       

	</ul>

</div>

</center>

</div>

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

               <div class="content-module">

				

					<div class="content-module-heading cf">

					

						<h3 class="fl">Welcome to Ambicacaterers.in Admin Panel</h3>

						<span class="fr expand-collapse-text">Click to collapse</span>

						<span class="fr expand-collapse-text initial-expand">Click to expand</span>

					

					</div> <!-- end content-module-heading -->

					

					<div class="content-module-main">	
                    
                     <?php 

					  $sql="select * from ".$SUFFIX."category where status='ACTIVE'";
					  $cat_item=mysql_num_rows(mysql_query($sql));
					  
					    $sql_sub="select * from ".$SUFFIX."sub_category where status='ACTIVE'";
					    $sub_cat_item=mysql_num_rows(mysql_query($sql_sub));
			
					?>


                            <table id="table_user">
							<thead>
                            
                            <div class="plans">
    <div class="plan">
      <h3 class="plan-title">Menu  Item</h3>
      <p class="plan-price"> <?php echo $cat_item?> <span class="plan-unit">Main Course Item</span></p>
      <ul class="plan-features">
        <li class="plan-feature"><?php echo $cat_item?> <span class="plan-feature-name">Main Course</span></li>
        <li class="plan-feature"><?php echo $sub_cat_item?><span class="plan-feature-unit"></span> <span class="plan-feature-name">Total Items</span></li>
        
      </ul>
      <a href="<?php echo $SITE_PATH;?>admin/manage_category.php" class="plan-button">Go to Main Course</a>
    </div>
    
    
                    <?php 

						  $sql_inquiry="select * from ".$SUFFIX."message";
						  $total_inquiry=mysql_num_rows(mysql_query($sql_inquiry));
					  
							$sql_read_inquiry="select * from ".$SUFFIX."message where mess_status='READ'";
							$read_inquiry=mysql_num_rows(mysql_query($sql_read_inquiry));
			
					?>
    
    <div class="plan plan-highlight">
      <p class="plan-recommended">Manage Inquiry</p>
      <h3 class="plan-title">Inquiry</h3>
      <p class="plan-price"><?php echo $total_inquiry;?> <span class="plan-unit">Total Inquiry</span></p>
      <ul class="plan-features">
        <li class="plan-feature"><?php echo $no_message;?> <span class="plan-feature-name">New Inquiry</span></li>
        <li class="plan-feature"><?php echo $read_inquiry;?> <span class="plan-feature-unit"></span> <span class="plan-feature-name">Old Inquiry</span></li>
        
      </ul>
      <a href="message.php" class="plan-button">Go to Inquiry Page</a>
    </div>
    
    
       <?php 

						  $sql_news="select * from ".$SUFFIX."faraskhana";
						  $total_news=mysql_num_rows(mysql_query($sql_news));
					  
							$sql_read_news="select * from ".$SUFFIX."faraskhana where status='ACTIVE'";
							$read_news=mysql_num_rows(mysql_query($sql_read_news));
							
							 $sql_photo="select * from ".$SUFFIX."faraskhana where status='INACTIVE'";
							$read_photo=mysql_num_rows(mysql_query($sql_photo));
			
					?>
    
    <div class="plan">
      <h3 class="plan-title">Photos </h3>
      <p class="plan-price"><?php echo  $total_news;?> <span class="plan-unit">Total  banner Photo</span></p>
      <ul class="plan-features">
        <li class="plan-feature"><?php echo  $read_photo;?> <span class="plan-feature-name">Inactive Photo</span></li>
        <li class="plan-feature"><?php echo  $read_news;?><span class="plan-feature-unit"></span> <span class="plan-feature-name">Active Photo</span></li>
        
      </ul>
      <a href="manage_photo.php" class="plan-button">Manage Gallery</a>
    </div>
    
    
    <div class="plan">
      <h3 class="plan-title">Mail / Chat</h3>
      <p class="plan-price">2 <span class="plan-unit">Mail ID / Password Info</span></p>
      <ul class="plan-features">
        <li class="plan-feature">@<span class="plan-feature-name"><a href="mailto:info@ambicacaterers.in">Send Mail</a></span></li>
        <li class="plan-feature"> <span class="plan-feature-name">Live Chat Info</span></li>
       
      </ul>
      <a href="<?php echo $SITE_PATH;?>admin/mail_id.php" class="plan-button">Go To Info</a>
    </div>
  </div>

                          

							

							</thead>             

						</table>
                        

					

					</div> <!-- end content-module-main -->

				

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