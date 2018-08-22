<?php

$p_name=$_SERVER['REQUEST_URI'];

$page_name=explode("/",$p_name);

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

	<title>Main Cateogory | Page </title>

	

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

	

	

	

	

	</script>

    

      <script>	

	$(function () {

		$("#tab1 #checkAll").click(function () {

			if ($("#tab1 #checkAll").is(':checked')) {

				$("#tab1 input[type=checkbox]").each(function () {

					$(this).prop("checked", true);

				});

	

			} else {

				$("#tab1 input[type=checkbox]").each(function () {

					$(this).prop("checked", false);

				});

			}

		});

	});

		

		

		

	function set_action(page_id,element,action,msg,table,id,page,field,folder)

		{

			var chks=document.getElementsByName(element);

			var hasChecked = false;

			var val='';

        // Get the checkbox array length and iterate it to see if any of them is selected

        for (var i = 0; i < chks.length; i++)

        {

                if (chks[i].checked)

                {

                        hasChecked = true;

						if(val=='')

							{

							val=chks[i].value;

							}

						else

							{

							val=val+','+chks[i].value;

							}

                }

        }

		//alert(val);

			// if ishasChecked is false then throw the error message

			if (!hasChecked)

			{

					alert("Please select records.");

					return false;

			}

			else

			{

				if (confirm(msg))

				{

				

	document.location.href='action.php?str='+val+'&action='+action+'&table='+table+'&id='+id+'&page='+page+'&field='+field+'&folder='+folder+'&page_id='+page_id;

				}

				

			}

         

		}

	

		

    function delete_cat(id,name,image,page_id)

	{

		//alert(page_id);

		

		

		var r=confirm('Are u Sure...!!!\r\n You Want To Delete This Photo....?')

		if(r==true)		

		{

			

			window.location.href='delete_photo.php?id='+id+'&name='+name+'&image='+image+'&page_id='+page_id;

			

		}

		else

		{

			return false;

		}

	}

		

		

	</script>

    

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

                <!--content Type 2 start-->

               <div class="content-module">

				

					<div class="content-module-heading cf">

					

						<h3 class="fl">Template Category  Management</h3>

						<span class="fr expand-collapse-text">Click to collapse</span>

						<span class="fr expand-collapse-text initial-expand">Click to expand</span>

					

					</div> <!-- end content-module-heading -->

					

                    <?php

					

					if($_GET['cat_type'] && base64_decode($_GET['id']))

					{

					    $sql="update ".$SUFFIX."category set cat_type='".$_GET['cat_type']."' where cat_id='".base64_decode($_GET['id'])."'";

						$res=mysql_query($sql);

					}

                    ?>

					

					<div class="content-module-main">	

                   

                    <div style="float:right;">

                               <form name="search" method="get" id="search-form" class="fr" >

                                <fieldset>

                              <input type="text" id="search-keyword" name="search" class="round button dark ic-search image-right" placeholder="Search..." />                                    

                                </fieldset>

                            </form><br/><br/><br/></div><br/><br/><br/>

                    

                     <p>

                    <?php

					if(base64_decode($_GET['res'])=='success')

					{

					?>

                    <div class="confirmation-box round">Your Module Transaction Will Be Complated Successfully....</div>

							

							

                    <?php

					}

					if(base64_decode($_GET['res'])=='fail')

					{

                    ?>

                    <div class="error-box round">Some Technical Error Found To Perform These Task...Please Try Again Letter...!!!!</div>

					<?php

					}

					?>

                    </p>

                    				  

						<table id="tab1">

						

							<thead>

                            

                            

                            

                            

                            

                            

								<tr>

								   <th><input type="checkbox" name="checkAll" id="checkAll"></th>	

                                    <th><center>Photo Gallery</center></th>

									<th  ><center>Photo Title</center></th>

                                    <th  ><center>Photo Description</center></th>

                                    <th  ><center>Photo Added Date</center></th>

									<th><center>Status</center></th>

									<th ><center>Actions</center></th>

                                    

								</tr>

							

							</thead>

	

							

							

							<tbody>

                            <?php

							

						     $sql="select * from ".$SUFFIX."faraskhana";

							if($_GET['search'])

							{							

							 $sql.=" where fk_title like'".$_GET['search']."%'";

							 $pg_param = "&search=".$_GET['search']; // Ex: &q=value

							 

							 echo "<center><font size='+2'>RESULT FOR SEARCH <font color='red'>'".$_GET['search']."'</font></font></h1/></center><br/>";

							}

							$num_results_per_page = 5;

							$num_page_links_per_page = 4;

							

							

							

							//include the pagination function file

							include('include/pagination_inc.php');

							

							pagination($sql, $num_results_per_page, $num_page_links_per_page, $pg_param);						

							//$i=1;

                            if($pg_error == '')

                            {

                                if(mysql_num_rows($pg_result) > 0)

                                {

                                    while($data = mysql_fetch_assoc($pg_result))

                                    {

                                        

										

						    ?>

                            <tr>

									 <td><input type="checkbox" name="checkalltabs[]" id="checkalltabs[]" value="<?php echo $data['fk_id'];?>"></td>

									<td><center>

                                      <a  href="<?php echo $SITE_PATH;?>faraskhana_images/<?php echo $data['fk_image']?>" class="fancybox-effects-c" title="<?php echo shorter($data['fullname'],80);?>"><img src="<?php echo $SITE_PATH;?>faraskhana_images/<?php echo $data['fk_image']?>" height="60" width="80" style="border-radius: 15px;"/></a></center></td>

								    <td><center><?php echo shorter($data['fk_title'],50);?></center></td>

                                    <td><center><?php echo shorter($data['fk_desc'],50);?></center></td>

                                    <td><center><?php echo format_date_time($data['fk_date']);?></center></td>

                                     <td><center> <?php 

									if($data['status']=='ACTIVE')

									{

									    echo "<center>

                                    <div class='round' style='background-color:#060; width:90%; height:17px;'><font color='#FFFFFF'>".$data['status']."</font></div></center>";

									}

									if($data['status']=='INACTIVE')

									{

									    echo "<center>

                                    <div class='round' style='background-color:#FF0000; width:100%; height:17px;'><font color='#FFFFFF'>".$data['status']."</font></div></center>";

									}

									?></center></td>

									<td><center>

										<a href="new_photo.php?id=<?php echo $data['fk_id']; ?>&page_id=<?php echo $_REQUEST['page_id'];?>" class="table-actions-button ic-table-edit" title="Edit"></a> &nbsp;&nbsp;

                                        

                                     <a style="margin-left:15px;" href="javascript:void(0);" onClick="javascript:delete_cat('<?php echo $data['fk_id'];?>','<?php echo $data['fk_title'];?>','<?php echo $data['fk_image'];?>','<?php if($_REQUEST['page_id']){echo $_REQUEST['page_id'];}else{echo "1";};?>');" class="table-actions-button ic-table-delete" title="Delete"></a>

										</center>

									</td>

								</tr>

                            

                            <?php

							 //$i++;

                                    }		

                                   

                                }

                                else

                                {

                                    echo '<font size="-1" color="red"><h1>No Rcords Is Availbe in Our Database...Please Try Again Letter...</h1></font>';

                                }

                            }

                            else

                            {

                                echo $pg_error; //display any errors, you can remove this if you want.	

                            }

                            ?>

							</tbody>

                            

							

						</table>

                        <div style="float:right;"><?php echo $pagination_output; ?></div>

                        <center>    

                         <a href="new_photo.php?page_id=<?php if($_REQUEST['page_id']){echo $_REQUEST['page_id'];}else{echo "1";}?>" class="button round blue image-right ic-add text-upper">Add New Photo</a>                   

                        <a href="javascript:void(0);" class="button round blue image-right ic-favorite text-upper" onClick="set_action('<?php echo $_GET['page_id'];?>','checkalltabs[]','Active', 'Are you sure, you want to change The Status of selected records...?','faraskhana','fk_id','<?php echo $page_name[2];?>');">Active</a>

                        

                        

                        <a href="javascript:void(0);" class="button round blue image-right ic-favorite text-upper" onClick="set_action('<?php echo $_GET['page_id'];?>','checkalltabs[]','Inactive', 'Are you sure, you want to change the Status of selected records..?','faraskhana','fk_id','<?php echo $page_name[2];?>');">Inactive</a>	

                        

                        

                        

                       <!-- <a href="javascript:void(0);" class="button round blue image-right ic-delete text-upper" onClick="set_action('checkalltabs[]','Delete_Image', 'Are you sure, you want to delete selected User..!!!','category','cat_id','<?php echo $page_name[3];?>','cat_image','category_image');">Delete</a>-->

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