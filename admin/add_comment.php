<?php


ob_start();


session_start();


error_reporting(0);


require_once('../classess/connection.php');


require_once('../classess/function.php');








							if(isset($_REQUEST['id']))


							{


								$sql="select * from ".$SUFFIX."blog where blog_id='".$_GET['id']."'";


								$res=mysql_query($sql);


								$data=mysql_fetch_array($res);


							}


                       


if(!isset($_SESSION['u_name']))


{


	header('location:index.php');


}





if($_REQUEST['action']=='Add')


{


							    $sql="insert into ".$SUFFIX."comment values('','".trim($_POST['name'])."','".trim($_POST['email'])."','','".trim($_POST['comment'])."','".trim($_GET['id'])."','".date('Y-m-d H:i:s')."','".trim($_POST['status'])."')";


												 $res=mysql_query($sql);


												 if($res==1)


												 {


													 header('location:manage_blog.php?res='.base64_encode('success'));


												 }										


}








?>


<!DOCTYPE html>


<html lang="en">


<head>


	<meta charset="utf-8">


	<title>Add Comment</title>


	


	<!-- Stylesheets -->


	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>


	<link rel="stylesheet" href="css/style.css">


    <link rel="shortcut icon" href="images/logo_small.png"/>


	<link rel="stylesheet" href="css/pagination.css" media="all" />


    <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>


	<!-- Optimize for mobile devices -->	


	<!-- jQuery & JS files -->


	<script src="js/jquery.min.js"></script>


    <script src="js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8">


	</script>


	<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">


	</script>


  


    


     <script>


		jQuery(document).ready(function(){


			jQuery("#new_comment").validationEngine('attach', {bindMethod:"live"});


		});


	</script>


    


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


          


			<?php include('include/side_menu.php');?> <!-- end side-menu -->


			


			<div class="side-content fr">


            


				<div class="content-module">


				


					<div class="content-module-heading cf">


					


						<h3 class="fl">Add Comment</h3>


						<span class="fr expand-collapse-text">Click to collapse</span>


						<span class="fr expand-collapse-text initial-expand">Click to expand</span>


					


					</div> <!-- end content-module-heading -->


					


					


					<div class="content-module-main cf">


				


							


                        	   


                      			    


						


                           <form  method="post" name="new_comment" id="new_comment" enctype="multipart/form-data">


							


								<fieldset>


								


	


									<p>


										<label for="another-simple-input">Name</label>


	     <input type="text" id="name"   name="name" class="round default-width-input  validate[required] text-input"/>


																


									</p>


                                    


                                    <p>


										<label for="another-simple-input">E-Mail</label>


	     <input type="text" id="email"   name="email" class="round default-width-input  default-width-input  validate[required,custom[email]] text-input"/>


										


									</p>


                                    


                                 


                                    <p>


                                     


										<label for="another-simple-input">Comment</label>


                                        


                                         <textarea id="comment" name="comment"  rows="7" cols="50"class=" validate[required] text-input"></textarea>


                                  


                              			


									</p>


                                    


                                     


                                     <p>


                                        <label for="another-simple-input">Comment Status</label>


										<select id="status" name="status" class= "status validate[required]">


                                        <option value="">---Select Status---</option>


                                        <option value="Approved">Approved</option>


                                        <option value="Pending">Pending</option>


                                        </select>


																


                                    </p>


                                    


                                    <div class="stripe-separator"><!--  --></div>


                                    


                                   


                                   <input type="submit" name="new_comment" id="new_comment" class="button round blue image-right ic-add text-upper" value="Add Comment"/>


                                   


                                   <input type="hidden" name="action" id="action" value="Add"/>


                                  


                                    


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