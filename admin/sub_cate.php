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

	<title>Choose Images Category</title>

	

	<!-- Stylesheets -->

	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>

	<link rel="stylesheet" href="css/style.css">

    <link rel="shortcut icon" href="images/logo_small.png"/>

	<link rel="stylesheet" href="css/pagination.css" media="all" />

	<!-- Optimize for mobile devices -->	

	<!-- jQuery & JS files -->

	<script src="js/jquery.min.js"></script>

	<script src="js/script.js"></script>  

    <script type="text/javascript" language="javascript">

	function menu(menu)

	{

		

		var r=confirm(' Are You Sure You want Go Manage Photo Sub category Page...?')

		if(r==true)		

		{

		window.location.href='manage_sub_cat.php?cui_id='+menu;

		}

		else

		{

			return false;

		}

	}

    </script>

	<style>

.styled-select select {

   background: transparent;

   width: 600px;

   padding: 5px;

   font-size: 25px;

   border: 1px solid #000;

   height: 50px;

   background-color:#FFF;

   margin-top:70px;

   font-family:"Comic Sans MS", cursive;

}

</style>

    

</head>

<body>



	<!-- TOP BAR -->

		

		<?php include('include/header.php');?>

	

	 <!-- end top-bar -->

	

	

	

	<!-- HEADER -->

	<?php include('include/header_with_tab.php');    ?>

    <!-- end header -->

	

	

	

	<!-- MAIN CONTENT -->

	<div id="content">

		

		<div class="page-full-width cf">

        <?php include('include/side_menu.php');?>



			 <!-- end side-menu -->

			

			<div class="side-content fr">

                <!--content Type 2 start-->

               <div class="content-module">

				

					<div class="content-module-heading cf">

					

						<h3 class="fl">Choose Photo Category</h3>

						<span class="fr expand-collapse-text">Click to collapse</span>

						<span class="fr expand-collapse-text initial-expand">Click to expand</span>

					

					</div> <!-- end content-module-heading -->

					

					

					<div class="content-module-main">	

                    <center>

                    			  

						<div class="styled-select">

                                <select name="category" id="category" onChange="javascript:menu(this.value);" >

                                <option value="0">--PLEASE SELECT MAIN MENU GATEGORY---</option>

                                <?php

                                

                                $sql="select * from ".$SUFFIX."category where status='ACTIVE'";

                                $res=mysql_query($sql);

                                while($row=mysql_fetch_array($res))

                                {

								//echo $image=$SITE_PATH."/category_images/".$row['cat_image'];exit;

                                ?>

                                    

                                        <option value="<?php echo $row['cat_id'];?>"><?php echo shorter($row['cat_name'],40);?></option>

                                      

                                <?php

                                }

                                ?>

                                </select>

                                </div>

                                

                          </center>

					

					</div> <!-- end content-module-main -->

				

				</div>

		

			</div> <!-- end side-content -->

		

		</div> <!-- end full-width -->

			

	</div> <!-- end content -->

	

	

	

	<!-- FOOTER -->

    <?php include('include/footer.php');?>

	 <!-- end footer -->



</body>

</html>