<?php
ob_start();
session_start();
error_reporting(0);
require_once('../classess/connection.php');
require_once('../classess/function.php');

if(!isset($_COOKIE['username']) || !isset($_SESSION['username']))
{
	header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ambica Caterer's - Menu Image </title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/icon.png"/>
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
	
	
	function delete_deco(id)
	{
		
		var r=confirm('Are u Sure...!!!\r\n You Want To Delete Menu Images....?')
		if(r==true)		
		{
			
			window.location.href='delete_menu.php?id='+id;
			
		}
		else
		{
			return false;
		}
	}
	
	function deco_status(id,status)
	{
		
		var r=confirm('Are u Sure...!!!\r\n You Want To Change Status ...!!')
		if(r==true)		
		{
			
			window.location.href='change_menu_status.php?id='+id+'&status='+status;
			
		}
		else
		{
			return false;
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
					
						<h3 class="fl">Manage Menu Images</h3>
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
                    				  
						<table>
						
							<thead>
                            
                            
                            
                            
                            
                            
								<tr>
									<!--<th>Sr. No</th>-->
									<th style="width:150px;"><center>Image</center></th>
									<th  style="width:150px;"><center>Menu Name</center></th>
									<th style="width:300px;"><center>Menu Description</center></th>                                    <th  style="width:150px;"><center>Added Date</center></th>
									<th style="width:150px;"><center>Status</center></th>
									<th style="width:150px;"><center>Actions</center></th>
                                    
								</tr>
							
							</thead>
	
							
							
							<tbody>
                            <?php
							
						    $sql="select * from ".$SUFFIX."menu_image";
							if($_GET['search'])
							{							
							 $sql.=" where menu_title like'".$_GET['search']."%'";
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
									<!--<td><?php echo $i;?></td>-->
									<td><center> <img style="border:inset 5px;" src="<?php echo $SITE_PATH;?>menu_images/<?php echo $data['menu_image']?>" height="60" width="100"/></center></td>
								    <td><center><?php echo $data['menu_title'];?></center></td>
									<td><center><?php echo shorter($data['menu_desc'],50);?></center></td>
                                    <td><center>
									<?php 
									$date=explode("-",$data['menu_date']);
									echo $date[2]."-".$date[1]."-".$date[0];
									?>
                                    </center></td>
                                    <td><center><a href="javascript:void(0);"  onClick="javascript:deco_status('<?php echo $data['menu_id']?>','<?php echo $data['menu_status']?>');"><?php echo $data['menu_status'];?></a></center></td>
									<td><center>
										<a href="edit_menu_image.php?id=<?php echo $data['menu_id']; ?>" class="table-actions-button ic-table-edit" title="Edit"></a>
                                        
										<a style="margin-left:15px;" href="javascript:void(0);" onClick="javascript:delete_deco('<?php echo $data['menu_id'];?>');" class="table-actions-button ic-table-delete" title="Delete"></a></center>
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
                        <ul><li><a href="add_menu_image.php" class="button round blue image-right ic-add text-upper">Add New Menu Image</a></li></ul>
                        
                        
					
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