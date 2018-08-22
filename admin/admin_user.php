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
	<title>Mangae Admin User </title>
	
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
	
	
	function delete_cat(id)
	{
		//alert(name);
		
		
		var r=confirm('Are u Sure...!!!\r\n You Want To Delete This Moudle........?')
		if(r==true)		
		{
			
			window.location.href='delete_admin.php?id='+id;
			
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
					
						<h3 class="fl">Manage Admin User</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					<div class="content-module-main">	
                 <div style="float:left;"><a href="new_admin.php" class="button round blue image-right ic-add text-upper">Add New Admin</a></div>
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
                    <div class="confirmation-box round">Admin User Created Successfully...!!!</div>
							
							
                    <?php
					}
					if(base64_decode($_GET['res'])=='success|Delete')
					{
                    ?>
                     <div class="confirmation-box round">Admin Deleted Successfully...!!!</div>
					<?php
					}
					?>
                    </p>
                    				  
						<table>
						
							<thead>
                           	<tr>
									<!--<th>Sr. No</th>-->
									<th style="width:150px;"><center>UserName</center></th>
									<th  style="width:250px;"><center>Email</center></th>
									<th style="width:100px;"><center>Last Login</center></th>                                   
                                    <th  style="width:100px;"><center>Last Updated</center></th>
									<th style="width:150px;"><center>Actions</center></th>
                                    
								</tr>
							
							</thead>
	
							
							
							<tbody>
                            <?php
							
						    $sql="select * from ".$SUFFIX."admin";
							if($_GET['search'])
							{							
							 $sql.=" where username like'".$_GET['search']."%'";
							 $pg_param = "&search=".$_GET['search']; // Ex: &q=value
							 
							  echo "<div class='information-box round'><center><font>RESULT FOR SEARCH <font color='red'>'".$_GET['search']."'</font></font></h1/></center></div>";
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
								
									
                                    <td><center><?php echo $data['username'];?></center></td>
                                    <td><center><a href="mailto:<?php echo $data['email'];?>"><?php echo $data['email'];?></a></center></td>
                                    <td>
                                    <center>
                                    <center><?php echo format_date_time($data['last_logged']);?></center>
                                    </center>
                                    </td>
                                    
                                    <td><center><center><?php echo format_date_time($data['last_updated']);?></center></center></td>
									<td><center>
										
                                        
                                        <?php 
										if($data['id']!='1')
										{?>
                                        <a href="edit_admin.php?id=<?php echo $data['id']; ?>" class="table-actions-button ic-table-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="admin_rites.php?id=<?php echo base64_encode($data['id']);?>"><img src="images/icons/table/key.png" height="15" width="15" title="Assign Rites"></a>
										<a style="margin-left:15px;" href="javascript:void(0);" onClick="javascript:delete_cat('<?php echo $data['id'];?>');" class="table-actions-button ic-table-delete" title="Delete"></a>
                                        <?php
										}?></center>
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