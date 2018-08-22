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



if(isset($_REQUEST['id']))

{

								$sql="select * from ".$SUFFIX."faraskhana where fk_id='".$_REQUEST['id']."'";

								$res=mysql_query($sql);

								$data=mysql_fetch_array($res);

}?>

<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8">

	<title>Add Page </title>

	

	<!-- Stylesheets -->

	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>

	<link rel="stylesheet" href="css/style.css">

    <link rel="shortcut icon" href="images/logo_small.png"/>

	<link rel="stylesheet" href="css/pagination.css" media="all" />

     <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>

	<!-- Optimize for mobile devices -->	

	<!-- jQuery & JS files -->

	<script src="js/jquery.min.js"></script>

	<script src="js/script.js"></script>  

    <script src="js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>

	<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

    <script type="text/javascript" src="js/jquery.fancybox.js"></script>

    <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen" />

    

    <script type="text/javascript">

		$(document).ready(function() {

			$('.fancybox').fancybox();

				$(".fancybox-effects-c").fancybox({

				wrapCSS    : 'fancybox-custom',

				closeClick : true,



				openEffect : 'none',



				helpers : {

					title : {

						type : 'inside'

					},

					overlay : {

						css : {

							'background' : 'rgba(238,238,238,0.85)'

						}

					}

				}

			});

		});

	</script>

    

     <script>

		jQuery(document).ready(function(){

			jQuery("#form_category").validationEngine('attach', {bindMethod:"live"});

		});

	</script>

    

    

    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>





</head>

<body>

<?php    



if($_REQUEST['action']=='Add')

{

	

						if($_POST['new_category'])

						{

							

							        $image_path = "../images/logoa.png";

									$demo_image= "../images/logoa.png";

									if(isset($_POST['new_category']))

									{ 

									   

										$path = "../faraskhana_images/";

										$valid_formats = array("jpg","jpeg","JPG","JPEG");

										$name = $_FILES['image']['name'];

										if(strlen($name))

									   {

									        list($txt, $ext) = explode(".", $name);

											if(!in_array($ext,$valid_formats) ) 

											{

												$file_error="Error: Invalid File Extension: Allow only jpg or jpeg file..";

											}

											else

											{	

											$upload_status = move_uploaded_file($_FILES['image']['tmp_name'], $path.$_FILES['image']['name']);

											//echo "innder";exit;

											 if($upload_status)

												{

													

												

													$new_name = $path."am_main_".time().".jpg";

													$db_name = "am_main_".time().".jpg";

													$height="500";

													$width="955";

													if(watermark_image($path.$_FILES['image']['name'], $new_name,$height,$width))

													 $demo_image = $new_name;

													 $sql="insert into ".$SUFFIX."faraskhana values(null,'".$_POST['title']."','".$_POST['desc']."','".$db_name."','".$_POST['status']."','".date("Y-m-d H:i:s")."')";

													 $res=mysql_query($sql);

													 if($res==1)

													 {

														 header('location:manage_photo.php?res='.base64_encode('success')."&page_id=".$_REQUEST['page_id']);

													 }

														

												 

												}

											}

										}

										

									}

			              }

         }

                

				

if($_REQUEST['action']=='Edit')

{		

	$db_image_name="";

	if($_FILES['image']['name']=='')

	{

		$db_image_name=$_REQUEST['prv_image'];

	}

	else

	{

				  $valid_formats = array("jpg","jpeg","JPG","JPEG");

				  $name = $_FILES['image']['name'];

				  list($txt, $ext) = explode(".", $name);

										

				  if(!in_array($ext,$valid_formats)) 

				  {

					 $file_error="Error: Invalid File Extension: Allow only jpg or jpeg file..";

				  }

				  else

				  {

	

									$filename = $file_path.'faraskhana_images/'.$_REQUEST['prv_image'];

									if(file_exists($filename))

									{

									 unlink($filename);

									}

		

									$image_path = "../images/logoa.png";

									$demo_image= "../images/logoa.png";

									if(isset($_POST['edit_category']))

									{ 

									   

										$path = "../faraskhana_images/";

										$valid_formats = array("jpg","jpeg","JPG","JPEG");

										$name = $_FILES['image']['name'];

										list($txt, $ext) = explode(".", $name);

											

											   $upload_status = move_uploaded_file($_FILES['image']['tmp_name'], $path.$_FILES['image']['name']);

												if($upload_status)

												{

													$new_name = $path."am_main_".time().".jpg";

													$db_name = "am_main_".time().".jpg";

													$height="500";

													$width="955";

													if(watermark_image($path.$_FILES['image']['name'], $new_name,$height,$width))

													$demo_image = $new_name;

													$db_image_name=$db_name;

					

												 }

											

										

										   

								   }

										

			       }

	 }

	

	

	

				if(!isset($file_error))			

				{

				

				/*if($_POST['title']!=$_REQUEST['prv_dir_name'])

				{

					/*echo $target = file_path.$_POST['prv_dir_name']; 

					echo $newName = file_path.$_POST['title']; 

					echo $renameResult = rename($target, $newName);

					

					echo rename("../img/category_image/".$_POST['prv_dir_name'],"../img/category_image/".$_POST['title']);exit;

					//mkdir("../img/category_image/".$_POST['title'], 0777, true);

				}*/

				

					 $sql="update ".$SUFFIX."faraskhana set fk_title='".$_POST['title']."',fk_desc='".$_POST['desc']."',fk_image='".$db_image_name."',status='".$_POST['status']."' where fk_id='".$_REQUEST['id']."'";
												

				$res=mysql_query($sql);

				if($res==1)

				{

					header('location:manage_photo.php?res='.base64_encode('success')."&page_id=".$_REQUEST['page_id']);

				}

			   }

													

	}

 ?>

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

					

						<h3 class="fl">Add Page</h3>

						<span class="fr expand-collapse-text">Click to collapse</span>

						<span class="fr expand-collapse-text initial-expand">Click to expand</span>

					

					</div> <!-- end content-module-heading -->

					

					<?php

					

                    ?>

					<div class="content-module-main cf">

				

						<div class="half-size-column fl">						    

							<form  method="post" name="form_category" id="form_category" enctype="multipart/form-data">

							

								<fieldset>

								

	

									<p>

										<label for="another-simple-input">Photo Title : </label>

										<input type="text" id="another-simple-input" name="title" class="round default-width-input validate[required] text-input" value="<?php echo $data['fk_title'];?>" <?php //if($_REQUEST['id']){echo "readonly='readonly'";};?>/>

																

									</p>

                                    

                                    <p>

										<label for="another-simple-input">Photo Description</label>

										<textarea  name="desc"  class="round default-width-input validate[required] text-input"><?php echo $data['fk_desc'];?></textarea>

																

									</p>

                                    

                                    

                                     <p>

										<label for="another-simple-input">Choose Photo</label>

	

										<input  type="file" class="<?php if(!isset($_REQUEST['id'])){?>validate[required] text-input<?php }?>" name="image" id="image" size="40" />

                                        <em><?php if(isset($file_error)){echo "<font color='red'>".$file_error."</font>";}else{ echo "<font color='green'>Valid File Format: jpg or jpeg only..</font>";}?></em>

                                        <?php 

										if(isset($_REQUEST['id']))

										{

											?>

                                        <em> <a  href="<?php echo $SITE_PATH;?>faraskhana_images/<?php echo $data['fk_image']?>" class="fancybox-effects-c" title="<?php echo shorter($data['fullname'],80);?>"><img src="<?php echo $SITE_PATH;?>faraskhana_images/<?php echo $data['fk_image'];?>" height="100" width="150" style="border-radius: 15px;"/></a></center>

                                        <?php } ?>

                                        </em>

									</p>

                                    

                                   

                                    

                                   

                                    <p class="form-error-input">

										<label for="dropdown-actions">Photo Status</label>

	

										<select id="dropdown-actions" name="status" class="validate[required] text-input">

                                        <option value="">----SELECT-----</option>

											<option value="Active" <?php if($data['status']=='ACTIVE'){?> selected="selected"<?php }?>>ACTIVE</option>

                                            <option value="Inactive" <?php if($data['status']=='INACTIVE'){?> selected="selected"<?php }?>>INACTIVE</option>

										</select>

									</p>

                                    

                                    

                                    

                                    

                                   

                                    <div class="stripe-separator"><!--  --></div>

                                      <?php if(isset($_REQUEST['id']) && !empty($_REQUEST['id']))

									{

									?>

                                     <input type="submit" name="edit_category" id="edit_category" class="button round blue image-right ic-add text-upper" value="Edit Photo Detail"/>

                                     <input type="hidden" name="action" id="action" value="Edit"/>

                                    <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']?>"/> 

                                    <input type="hidden" name="prv_image" id="prv_image" value="<?php echo $data['fk_image'];?>"/>

                                 <input type="hidden" name="prv_dir_name" id="prv_dir_name" value="<?php echo $data['fk_name'];?>"/>

                                    <?php

                                    }else

									{?>

                                   <input type="submit" name="new_category" id="new_category" class="button round blue image-right ic-add text-upper" value="Add New category"/>

                                   

                                   <input type="hidden" name="action" id="action" value="Add"/>

                                   <?php } ?>

                                    

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