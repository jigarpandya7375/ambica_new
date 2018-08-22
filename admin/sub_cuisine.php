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







           	if($_REQUEST['action']=='Add')

			{		

	

				 $sql="insert into ".$SUFFIX."sub_category values('','".$_REQUEST['sub_cui_name']."','','".$_REQUEST['cui_id']."','".$_REQUEST['status']."')";

												

					$res=mysql_query($sql);

						if($res==1)

						{

							if($_REQUEST['page_id']!='')

							{

								$page_id=$_REQUEST['page_id'];

								

							}

							else

							{

								$page_id.=1;

							}

							header('location:manage_sub_cat.php?res='.base64_encode('success')."&cui_id=".$_REQUEST['cui_id']."&page_id=".$page_id);

						}

					

			}



		

			

			if($_REQUEST['action']=='Edit')

			{		

	

				 $sql="update ".$SUFFIX."sub_category set sub_cat_name='".$_POST['sub_cui_name']."',status='".$_POST['status']."' where sub_cat_id='".$_REQUEST['id']."'";

												

					$res=mysql_query($sql);

						if($res==1)

						{

							if($_REQUEST['page_id']!='')

							{

								$page_id=$_REQUEST['page_id'];

								

							}

							else

							{

								$page_id.=1;

							}

							header('location:manage_sub_cat.php?res='.base64_encode('success')."&cui_id=".$_REQUEST['cui_id']."&page_id=".$page_id);

						}

					

			}



?>

<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8">

	<title><?php if($_GET['id']){ echo "Edit";}else{echo "Add New";}?> Page</title>

	

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

    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>

     



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

					

						<h3 class="fl"><?php if($_GET['id']){ echo "Edit";}else{echo "Add New";}?> FAQ</h3>

						<span class="fr expand-collapse-text">Click to collapse</span>

						<span class="fr expand-collapse-text initial-expand">Click to expand</span>

					

					</div> <!-- end content-module-heading -->

					

					

					<div class="content-module-main cf">

				

							<?php

							   $sql=mysql_query("SELECT * from ".$SUFFIX."sub_category where sub_cat_id='".$_REQUEST['id']."'");

							   $res=mysql_fetch_array($sql);

							

							///echo "SELECT * FROM ".$SUFFIX."category WHERE cat_id='".$_REQUEST['cui_id']."'" ;

							 $sql_name=mysql_query("SELECT * FROM ".$SUFFIX."category WHERE cat_id='".$_REQUEST['cui_id']."'");

							 $res_name=mysql_fetch_array($sql_name);

							 

						

							

							 

							?>			    

							<form  method="post" name="form_faq" id="form_faq" enctype="multipart/form-data">

							

								<fieldset>

								

                                

									<?php if($_REQUEST['id'] && $_REQUEST['cui_id'])

									{?>

									<p>

										<label for="another-simple-input">Cuisine Name:</label>

										<textarea id="cui_name"  name="cui_name" readonly="readonly" class="round default-width-input validate[required] text-input"/><?php echo $res_name['cat_name'];?></textarea>

                                        <em>Main Photo Gallry Name</em>															

									</p>

                                    <?php

									}else

									{?>

                                    <p>

										<label for="another-simple-input">Main Menu Name :</label>

										<textarea id="cui_name"  name="cui_name" readonly="readonly" class="round default-width-input validate[required] text-input"/><?php echo $res_name['cat_name'];?></textarea>

                                        <em>Main Photo Gallry Name</em>															

									</p>

									<?php

									}?>

    

									<p>

                                 

                                    

										<label for="another-simple-input">Item Name:</label>

										<textarea id="sub_cui_name"  name="sub_cui_name" class="round default-width-input validate[required] text-input"/><?php echo $res['sub_cat_name'];?></textarea>

                                        <em>Menu Item Name</em>														

									</p>

                                    

                                   

                                    

                                    <p>

                                  

										<label for="another-simple-input">Menu Item Status:</label>

										<select name="status" class="validate[required] text-input">

                                        <option value="">---Select Menu Item Status---</option>

                                        <option value="Active"<?php if($res['status']=='ACTIVE'){?> selected='selected' <?php }?>>ACTIVE</option>

                                        <option value="Inactive"<?php if($res['status']=='INACTIVE'){?> selected='selected' <?php }?>>INACTIVE</option>

                                        </select>

                                        <em>Menu Item Status</em>															

									</p>

                                    

                                  

                                    

                                     

                                    

                                    

                                    

                                    

                                   

                                    <div class="stripe-separator"><!--  --></div>

                                   <center> 

                                   

                                   <?php

								   if(isset($_REQUEST['id']) && !empty($_REQUEST['id']))

								   {

                                   ?>

                                   <input type="submit" name="edit_sub_category" id="edit_sub_category" class="button round blue image-right ic-add text-upper" value="Edit Content"/>

                                   <input type="hidden" name="action" id="action" value="Edit"/>

                                   <input type="hidden" name="id" id="id" value="<?php echo $_GET['id'];?>"/>

                                   <?php

								   }

								   else

								   {?>

                                   <input type="submit" name="new_photo" id="new_photo" class="button round blue image-right ic-add text-upper" value="Add New Menu Item"/>

                                   <input type="hidden" name="cui_id" id="cui_id" value="<?php echo $_REQUEST['cui_id'];?>"/>

                                   <input type="hidden" name="action" id="action" value="Add"/>

                                   <?php

								   }?>

                                   </center>

                                    

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