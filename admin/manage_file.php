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
	<title>Document Management </title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" href="images/logo_small.png"/>
	<link rel="stylesheet" href="css/pagination.css" media="all" />
	<!-- Optimize for mobile devices -->	
	<!-- jQuery & JS files -->
	<script src="js/jquery.min.js"></script>
   
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
	
 
	
	function delete_deco(id,image,image1)
	{
		//alert(id+image+'demo'+image1);
		var r=confirm('Are u Sure...!!!\r\n You Want To Delete Books....?')
		if(r==true)		
		{
			
			window.location.href='delete_book.php?id='+id+'&image='+image+'&image_file='+image1;
			
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
			//alert(element+action+msg+table+id+page);
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
                <!--content Type 2 start-->
               <div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Manage Docuement</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
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
                    <div class="confirmation-box round">Your <?php echo $_GET['ac'];?> Action Is Complated Successfully....</div>
							
							
                    <?php
					}
					if(base64_decode($_GET['res'])=='fail')
					{
                    ?>
                    <div class="error-box round">Your <?php echo $_GET['ac'];?>Status Action Is Complated UnSuccessfully....Pls Try again..!!!</div>
					<?php
					}
					?>
                    </p>
                    				  
						<table id="tab1">
						
							<thead>
                            
                            
                            
                            
                            
                            
								<tr>
									<th><input type="checkbox" name="checkAll" id="checkAll"></th>							
                                    <th  style="width:150px;"><center>Image</center></th>
									<th  style="width:150px;"><center>Document Title</center></th>
                                    <th  style="width:300px;"><center>Document Description</center></th>
                                    <th  style="width:150px;"><center>Added Date</center></th>
									<th style="width:150px;"><center>Status</center></th>
                                    <th style="width:150px;"><center>Download Counter</center></th>
									<th style="width:300px;"><center>Action</center></th>
                                    
								</tr>
							
							</thead>
	
							
							
							<tbody>
                            <?php
							
						    $sql="select * from ".$SUFFIX."books";
							if($_GET['search'])
							{							
							 $sql.=" where bk_title like'".$_GET['search']."%'";
							 $pg_param = "&search=".$_GET['search']; // Ex: &q=value
							 
							 echo "<center><font size='+2'>RESULT FOR SEARCH <font color='red'>'".$_GET['search']."'</font></font></h1/></center><br/>";
							}
							$num_results_per_page = 10;
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
								<td><input type="checkbox" name="checkalltabs[]" id="checkalltabs[]" value="<?php echo $data['bk_id'];?>"></td>
									<td><center><a href="<?php echo $SITE_PATH;?>file_download/images/<?php echo $data['bk_image']?>" class="fancybox-effects-c" title="<?php echo shorter($data['fullname'],80);?>"><img style="border-radius: 15px;"  src="<?php echo $SITE_PATH;?>file_download/images/<?php echo $data['bk_image']?>" height="60" width="80"/></a></center></td>
								    <td><center><?php echo $data['bk_title'];?></center></td>				
                                     <td><center><?php echo shorter($data['bk_desc'],100);?></center></td>									
                                    <td><center><?php 	echo format_date_time($data['bk_date']);	?>
                                    </center></td>
                                    <td><center><a href="javascript:void(0);">
                                    
                                    <?php
									if($data['status']=='Active')
									{
									echo "<font color='green'>".$data['status']."</font>";
									}
									else
									{
										echo "<font color='red'>".$data['status']."</font>";
									}?>
                                    
                                    </a></center></td>
                                   
                                        <td><center> <div id="counter" name="counter"><?php echo $data['bk_count']?></div></center></td> 
									<td><center>
                                    
                                        <a  href="file_view.php?name=<?php echo base64_encode($data['bk_name']);?>" class="fancybox fancybox.iframe" title="Preview File"><img src="images/icons/table/view.png" height="17" width="17"/></a> &nbsp;&nbsp;&nbsp;
                                    
                                  <a href="download.php?filename=<?php echo $data['bk_name']."&table=books&id=".$data['bk_id']."&counter=".$data['bk_count'];?>"  onClick="javascript:counter_count();" title="Download"> <img src="images/icons/table/download.png" height="17" width="17"/></a>&nbsp;&nbsp;&nbsp;
                                        	<a  href="javascript:void(0);" onClick="javascript:delete_deco('<?php echo $data['bk_id'];?>','<?php echo $data['bk_name'];?>','<?php echo $data['bk_image'];?>');" class="table-actions-button ic-table-delete" title="Delete"></a> &nbsp;&nbsp;&nbsp;
                                            
                                            	<a href="add_pdf_books.php?id=<?php echo $data['bk_id']; ?>" class="table-actions-button ic-table-edit" title="Edit"></a> &nbsp;&nbsp;&nbsp;
                                        </center>
									</td>
								</tr>
                            
                            <?php
							 //$i++;
                                    }		
                                   
                                }
                                else
                                {
                                    echo 'no results found';
                                }
                            }
                            else
                            {
                                echo $pg_error; //display any errors, you can remove this if you want.	
                            }
                            ?>
                            
                            
	
								
	                         
							
							</tbody>
                            
                            
                            
                            <!--<tfoot>
							
							<tr>
								
									<td colspan="5" class="table-footer">
									
										<label for="table-select-actions">With selected:</label>
	
										<select id="table-select-actions">
											<option value="option1">Delete</option>
											<option value="option2">Export</option>
											<option value="option3">Archive</option>
										</select>
										
										<a href="#" class="round button blue text-upper small-button">Apply to selected</a>	
	
									</td>
									
								</tr>
                                
							
							</tfoot>-->
							
						</table>
                        <div style="float:right;"><?php echo $pagination_output; ?></div>
                         <center>  
                         <a href="add_pdf_books.php" class="button round blue image-right ic-add text-upper">Add New Document</a>                     
                        <a href="javascript:void(0);" class="button round blue image-right ic-favorite text-upper" onClick="set_action('checkalltabs[]','Active', 'Are you sure, you want to change The Status of selected records...?','books','bk_id','<?php echo $page_name[3];?>');">Active</a>
                        <a href="javascript:void(0);" class="button round blue image-right ic-favorite text-upper" onClick="set_action('checkalltabs[]','Inactive', 'Are you sure, you want to change the Status of selected records..?','books','bk_id','<?php echo $page_name[3];?>');">Inactive</a>	
                        
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