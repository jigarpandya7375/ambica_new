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

	<title>Manage Sub-Cuisine</title>

	

	

	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>

	<link rel="stylesheet" href="css/style.css">

       <link rel="shortcut icon" href="images/logo_small.png"/>

	<link rel="stylesheet" href="css/pagination.css" media="all" />

	

	<script src="js/jquery.min.js"></script>

	<script src="js/script.js"></script>  

    <script type="text/javascript" language="javascript">	

	function menu(menu)

	{

		

		var r=confirm(' Are You Sure You want To Change Main Cuisine...?')

		if(r==true)		

		{

		window.location.href='manage_sub_cat.php?cui_id='+menu;

		}

		else

		{

			return false;

		}

	}

	

	function set_action(page_id,element,action,msg,table,id,page,field,folder)

		{

			

			var cui_id=document.getElementById('cuisine').value;

			//alert(page_id);

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

				

		document.location.href='action.php?str='+val+'&action='+action+'&table='+table+'&id='+id+'&page='+page+'&field='+field+'&folder='+folder+'&cui_id='+cui_id+'&page_id='+page_id;

				}

				

			}

         

		}

	

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

    

    <style>

    .styled-select select {

   background: transparent;

   width: 500px;

   padding: 5px;

   font-size: 20px;

   border: 1px solid #000;

   height: 50px;

   background-color:#FFF;

  

   font-family:"Comic Sans MS", cursive;

}

    

    </style>

	

	

    

    

</head>

<body>



	<!-- TOP BAR -->

		

		<?php include('include/header.php');?>

	

	 <!-- end top-bar -->

	

	

	

	<!-- HEADER -->

    

    <?php include('include/header_with_tab.php');?>

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

					

						<h3 class="fl">Training Sub Module Management</h3>

						<span class="fr expand-collapse-text">Click to collapse</span>

						<span class="fr expand-collapse-text initial-expand">Click to expand</span>

					

					</div> <!-- end content-module-heading -->

					

					

					<div class="content-module-main">	

                    

                    <div style="float:right;">

                               <form name="search" method="get" id="search-form" class="fr" >

                                <fieldset>

                              <input type="text" id="search-keyword" name="search" class="round button dark ic-search image-right" placeholder="Search..." />  

                              <input type="hidden" id="search-keyword" name="cui_id" class="round button dark ic-search image-right" placeholder="Search..."  value="<?php echo $_GET['cui_id'];?>"/>   

                              

                                                           

                                </fieldset>

                            </form></div>

                   

                    <div style="float:left;"> 

                    <div class="styled-select">                              

                              <select name="category" id="category" onChange="javascript:menu(this.value);" >

                                <option value="0">--CHANGE MAIN CUISINE MODULE---</option>

                                <?php

                                

                                $sql="select * from ".$SUFFIX."category where status='ACTIVE'";		

								

                                $res=mysql_query($sql);

                                while($row=mysql_fetch_array($res))

                                {

                                ?>

                                

                                    

                                        <option value="<?php echo $row['cat_id'];?>"

                                        <?php 

										if($row['cat_id']==$_GET['cui_id'])

										{?>selected="selected"<?php }?>

                                        

                                        

                                        ><?php echo shorter($row['cat_name'],50);?></option>

                                      

                                <?php

                                }

                                ?>

                                </select>                                

                               </div>

                               </div>

                            <br/><br/>  <br/><br/>                    

                     <p>

                    <?php

					if(base64_decode($_GET['res'])=='success')

					{

					?>

                    <div class="confirmation-box round">Your Menu Transaction Will Be Complated Successfully....</div>

							

							

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

									<!--<th>Sr. No</th>-->

									<th><input type="checkbox" name="checkAll" id="checkAll"></th>

									<th  style="width:150px;"><center>Menu Name</center></th>

									                              

									<th style="width:150px;"><center>Status</center></th>

									<th style="width:150px;"><center>Actions</center></th>

                                    

								</tr>

							

							</thead>

	

							

							

							<tbody>

                            <?php

							

						    $sql="select * from ".$SUFFIX."sub_category where cat_id='".$_GET['cui_id']."'";

							

							if($_GET['search'])

							{							

							 $sql.="and sub_cat_name like'".$_GET['search']."%'";

							 $pg_param = "&search=".$_GET['search']."&id=".$_GET['cui_id']."&page_id=".$_GET['page_id'];

							 

							 echo "<center><font size='+2'>RESULT FOR SEARCH <font color='red'>'".$_GET['search']."'</font></font></h1/></center><br/>";

							}

							

							$num_results_per_page = 20;

							$num_page_links_per_page = 4;

							$pg_param = "&cui_id=".$_GET['cui_id']; // Ex: &q=value

							

							

							

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

									<!--<td><?php echo $i;?></td>-->

									

								     <td><input type="checkbox" name="checkalltabs[]" id="checkalltabs[]" value="<?php echo $data['sub_cat_id'];?>"></td>

                                     

                                      

									<td><center><?php echo $data['sub_cat_name'];?></center></td>

                                    <td><center> <?php 

									if($data['status']=='ACTIVE')

									{

									    echo "<center>

                                    <div class='round' style='background-color:#060; width:20%; height:17px;'><font color='#FFFFFF'>".$data['status']."</font></div></center>";

									}

									if($data['status']=='INACTIVE')

									{

									    echo "<center>

                                    <div class='round' style='background-color:#FF0000; width:25%; height:17px;'><font color='#FFFFFF'>".$data['status']."</font></div></center>";

									}

									?></center></td>

									<td><center>

										<a href="sub_cuisine.php?id=<?php echo $data['sub_cat_id']; ?>&cui_id=<?php echo $_GET['cui_id'];?><?php if(isset($_GET['page_id'])){ echo "&page_id=".$_GET['page_id']; } ?>" class="table-actions-button ic-table-edit" title="Edit"></a>

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

                         <a href="sub_cuisine.php?cui_id=<?php echo $_GET['cui_id'];?>&page_id=<?php if(!$_REQUEST['page_id']){echo "0";}else{echo $_REQUEST['page_id'];}?>" class="button round blue image-right ic-add text-upper">Add New Menu Item</a>    

                         <input type="hidden" name="cuisin" id="cuisine" value="<?php echo $_REQUEST['cui_id']?>"/>

                         

                         

                        <a href="javascript:void(0);" class="button round blue image-right ic-favorite text-upper" onClick="set_action('<?php echo $_GET['page_id'];?>','checkalltabs[]','Active', 'Are you sure, you want to change The Status of selected records...?','sub_category','sub_cat_id','<?php echo $page_name[2];?>','<?php echo $_REQUEST['page_id']?>');">Active</a>

                        

                        

                        <a href="javascript:void(0);" class="button round blue image-right ic-favorite text-upper" onClick="set_action('<?php echo $_GET['page_id'];?>','checkalltabs[]','Inactive', 'Are you sure, you want to change the Status of selected records..?','sub_category','sub_cat_id','<?php echo $page_name[2];?>');">Inactive</a>	

                        

                         <a href="javascript:void(0);" class="button round blue image-right ic-delete text-upper" onClick="set_action('<?php echo $_GET['page_id'];?>','checkalltabs[]','Delete', 'Are you sure, you want to delete selected Items..!!!','sub_category','sub_cat_id','<?php echo $page_name[2];?>','sub_cat_image','sub_cat_image');">Delete</a>

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