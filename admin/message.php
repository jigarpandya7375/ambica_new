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

	<title> &nbsp;Messages | Home</title>

	

	<!-- Stylesheets -->

	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>

	<link rel="stylesheet" href="css/style.css">

	<link rel="stylesheet" href="css/pagination.css" media="all" />

    <link rel="stylesheet" href="css/reveal.css">	

    <link rel="shortcut icon" href="../images/icon.png"/>

	

	

	<!-- jQuery & JS files -->

	<script src="js/jquery.min.js"></script>

    <!--To add Fancy Box code Start-->

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

    <!--To add Fancy Box code End-->

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

	</script>

	<script src="js/script.js"></script> 

    <script type="text/javascript" language="javascript">

	function delete_msg(id,status)

	{		

		var r=confirm('Your Message Status is\r\n"'+status+'"\r\n Still you want to delete This Message....?')

		if(r==true)		

		{

			

			//alert(id);

			window.location.href='delete_msg.php?id='+id;

			

		}

		else

		{

			return false;

		}

	}

	

		function set_action(element,action,msg,table,id,page)

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

				

				document.location.href='action.php?str='+val+'&action='+action+'&table='+table+'&id='+id+'&page='+page;

				}

				

			}

         

		}

	

	

	

	</script>

    

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

			  <div class="content-module">

				<div class="content-module-heading cf">

				

					<h3 class="fl">Manage Messages</h3>

					<span class="fr expand-collapse-text">Click to collapse</span>

					<span class="fr expand-collapse-text initial-expand">Click to expand</span>

				

				</div> <!-- end content-module-heading -->

				

				

				<div class="content-module-main">

				

					<p ></font></p>

                    <div class="information-box round">Click Message To Read The Full Message...Once You Read The whole Message Your message Status Change To Unread to Read...</div>

					

					<p>

                    <?php

					if(base64_decode($_GET['res'])=='success')

					{

					?>

                    <div class="confirmation-box round">Your Transaction Complated Successfully....</div>

							

							

                    <?php

					}

					if(base64_decode($_GET['res'])=='fail')

					{

                    ?>

                    <div class="error-box round">Some Technical Error Found To Send A Mail....Please Try After Some Time....!!!</div>

					<?php

					}

					?>

                    </p>

					<table id="tab1">

					

						<thead>

					

							<tr>

							    <th><input type="checkbox" name="checkAll" id="checkAll"></th>								

								<th style="width:120px;"><center>Username</center></th>

                                <th style="width:120px;"><center>Phone No</center></th>

                                <th style="width:170px;"><center>E-mail</center></th>

								<th><center>Message</center></th> 

                                <th style="width:120px;"><center>Message Status</center></th>                                

							
							</tr>

						

						</thead>

						

						

						<tbody>

                         

                          <?php

						    $sql="select * from ".$SUFFIX."message order by mess_status='UNREAD' desc";						 

							$num_results_per_page = 10;

							$num_page_links_per_page = 3;

							//$pg_param = "&q=value"; // Ex: &q=value

							

							//include the pagination function file

							include('include/pagination_inc.php');

							

							pagination($sql, $num_results_per_page, $num_page_links_per_page, $pg_param);

							 if($pg_error == '')

                            {

                                if(mysql_num_rows($pg_result) > 0)

                                {

                                    while($data = mysql_fetch_assoc($pg_result))

                                    {

                                        

									

                          ?>

                                 



							<tr>

					<td><input type="checkbox" name="checkalltabs[]" id="checkalltabs[]" value="<?php echo $data['mess_id'];?>"></td>							

								

								<td><center><?php echo $data['user_name']?></center></td>

                                <td><center><?php echo $data['mess_phone']?></center></td>

                                <td><center><?php echo $data['mess_email']?></center></td>

								<td>                                

                                <a href="message_view.php?id=<?php echo base64_encode($data['mess_id']);?>" class="fancybox fancybox.iframe"><?php echo shorter($data['mess_text'],100);?></a>

                                </td>

                                <td><center>

                                <?php

									if($data['mess_status']=='READ')

									{	

									 echo "<center>

                                    <div class='round' style='background-color:#060; width:40%; height:17px;'><font color='#FFFFFF'>".$data['mess_status']."</font></div></center>";

									}

									else

									{

										  echo "<center>

                                    <div class='round' style='background-color:#FF0000; width:50%; height:17px;'><font color='#FFFFFF'>".$data['mess_status']."</font></div></center>";

									}?>

                                

                                </center></td>

							

							</tr>

                               <?php

                                    }		

                                    

                                }

                                else

                                {

                                    echo '<h1>No Message IN Our Database</h1>';

                                }

                            }

                            else

                            {

                                echo $pg_error; //display any errors, you can remove this if you want.	

                            }

                            ?>

							

						

						</tbody>

						

					</table>

					

					<div style="float:right;"><?php  echo $pagination_output;?></div>

					 <center>                       

                        <a href="javascript:void(0);" class="button round blue image-right ic-favorite text-upper" onClick="set_action('checkalltabs[]','READ', 'Are you sure, you want to change The Status of selected records...?','message','mess_id','<?php echo $page_name[2];?>');">Mark As Read</a>

                        <a href="javascript:void(0);" class="button round blue image-right ic-favorite text-upper" onClick="set_action('checkalltabs[]','UNREAD', 'Are you sure, you want to change the Status of selected records..?','message','mess_id','<?php echo $page_name[2];?>');">Mark As Undread</a>	

                        <a href="javascript:void(0);" class="button round blue image-right ic-delete text-upper" onClick="set_action('checkalltabs[]','Delete', 'Are you sure, you want to delete selected Messages..!!!','message','mess_id','<?php echo $page_name[2];?>');">Delete</a>

                       </center>

					<!--<p>When you resize the page, all the elements inside the page will resize as well, this being a liquid or fluid layout.</p>-->

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