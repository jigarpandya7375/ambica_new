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

	<title> Mail ID/Password </title>

	

	<!-- Stylesheets -->

	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>

	<link rel="stylesheet" href="css/style.css">

    <link rel="shortcut icon" href="images/logo_small.png"/>

	<link rel="stylesheet" href="css/pagination.css" media="all" />

	<!-- Optimize for mobile devices -->	

	<!-- jQuery & JS files -->

	<script src="js/jquery.min.js"></script>

	<script src="js/script.js"></script>  

    

    

   

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

					

						<h3 class="fl">Ambica caterers  Mail ID/ Password</h3>

						<span class="fr expand-collapse-text">Click to collapse</span>

						<span class="fr expand-collapse-text initial-expand">Click to expand</span>

					

					</div> <!-- end content-module-heading -->

					

					

					<div class="content-module-main cf">

				

						<div class="half-size-column fl">

                        <h1> Webmail Login Information</h1>	

                          <div class="stripe-separator"><!--  --></div>					    

							<form action="#" method="post" name="form" id="form" enctype="multipart/form-data">

							

								<fieldset>

								

	

									<p>

										<label for="another-simple-input">Email-Address</label>

						<input type="text" id="another-simple-input" name="title" class="round default-width-input" value="info@ambicacaterers.in" readonly/>

																	

									</p>

                                    

                                    

									 

                                    

                                     <p>

										<label for="textarea">Password</label>

									<input type="text" id="duration" name="duration" class="round default-width-input" value="admin1234" readonly/>

									</p>

                                    <br/>

                                     <div class="stripe-separator"><!--  --></div>

                                     <p>

										   <center> <a href="http://webmail.ambicacaterers.in" target="_blank" class="button round blue image-right ic-add text-upper">Click Here To Check Mail</a></center>

									

									</p>

                                    

                                    <div class="stripe-separator"><!--  --></div>

								</fieldset>

							

							</form>

                           

						

						</div> <!-- end half-size-column -->

						

						<div class="half-size-column fl">

                        <h1> Live Chat Login Information</h1>	

                          <div class="stripe-separator"><!--  --></div>					    

							<form action="#" method="post" name="form" id="form" enctype="multipart/form-data">

							

								<fieldset>

								

	

									<p>

										<label for="another-simple-input">Email-Address</label>

						<input type="text" id="another-simple-input" name="title" class="round default-width-input" value="info@ambicacaterers.in" readonly/>

										<em>Add Recipe Name</em>								

									</p>

                                    

                                    

									 

                                    

                                     <p>

										<label for="textarea">Password</label>

									<input type="text" id="duration" name="duration" class="round default-width-input" value="admin1234" readonly/>

									</p>

                                    <br/>

                                     <div class="stripe-separator"><!--  --></div>

                                     <p>

										   <center> <a href="https://dashboard.zopim.com/?lang=en-us" target="_blank" class="button round blue image-right ic-add text-upper">Click Here To Live Chat</a></center>

									

									</p>

                                    

                                    <div class="stripe-separator"><!--  --></div>

								</fieldset>

							

							</form>

                           

						

						</div>

				

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