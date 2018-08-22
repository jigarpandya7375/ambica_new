<?php


ob_start();


session_start();


error_reporting(0);


require_once('../classess/connection.php');


if(!isset($_SESSION['u_name']))


{


	header('location:index.php');


}





?>


<!DOCTYPE html>





<html lang="en">


<head>


	<meta charset="utf-8">


	<title>Soham-Message View </title>


	


	<!-- Stylesheets -->


	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>


	<link rel="stylesheet" href="css/style.css">


	


	<!-- Optimize for mobile devices -->


	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>


	


	<!-- jQuery & JS files -->


	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>


	<script src="js/script.js"></script>  


</head>


<body>





	<!-- TOP BAR -->


	


     <!-- end top-bar -->


	


	


	


	<!-- HEADER -->


	<?php //include('include/header_with_tab.php');    ?>


     <!-- end header -->


	


	


	


	<!-- MAIN CONTENT -->


	<div id="content">


		


		<div class="page-full-width cf">





			 <!-- end side-menu -->


			


			<div class="side-content fr">


			


				<div class="half-size-column fl" style="width:600px;">


				


					<div class="content-module">


					


						<div class="content-module-heading cf">


						    <?php


						    $sql="select * from ".$SUFFIX."message where mess_id='".base64_decode($_GET['id'])."'";


							$res=mysql_query($sql);


							$data=mysql_fetch_array($res);


							


                            ?>


							<h3 class="fl">Message</h3>


							<span class="fr expand-collapse-text">Click to collapse</span>


							<span class="fr expand-collapse-text initial-expand">Click to expand</span>


						


						</div> <!-- end content-module-heading -->


						


						


						<div class="content-module-main">


						


							<h1>Message From <?php echo $data['user_name'];?></a></h1>


                            


							<p>Mail To: <a href="mailto:<?php echo $data['mess_email'];?>"><?php echo $data['mess_email'];?></a></p>
                            
                            <p>Phone Number : <?php echo $data['mess_phone'];?></a></p>


							


							<div class="stripe-separator"><!-- --></div>


						


							<h2><?php echo $data['mess_text'];?></h2>			








							<div class="stripe-separator"><!-- --></div>


							


							<blockquote style="float:right;">Message Sender IP Address&nbsp;::&nbsp;<a href="#"><?php echo $data['mess_ip'];?></a></blockquote>


							<cite>- <?php echo $data['user_name'];?></cite>


							


                            <?php


						    $sql="update ".$SUFFIX."message set mess_status='READ' where mess_id='".base64_decode($_GET['id'])."'";


							mysql_query($sql);


                            ?>


						</div> <!-- end content-module-main -->


					


					</div> <!-- end content-module -->


				


				</div> <!--end half-size-column-->





				 


	


			</div> <!-- end side-content -->


		


		</div> <!-- end full-width -->


			


	</div> <!-- end content -->


	


	


	


	<!-- FOOTER -->


    <?php include('include/footer.php');?>


	 <!-- end footer -->





</body>


</html>