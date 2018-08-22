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
	<title>Ambica Caterer's - Menage Sub Menu </title>
	
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
	function menu(menu)
	{
		var r=confirm('Your Select "'+menu+'" \r\n Are You Sure You want Go Manage Sub-Menu Page...?')
		if(r==true)		
		{
		window.location.href='manage_sub_cat.php?menu='+menu;
		}
		else
		{
			return false;
		}
	}
	
	
	
	function delete_sub_cat(id,menu)
	{
		//alert(id+name+menu);
		
		
		var r=confirm('Are You Sure...!!!\r\n You Want To  Delete Sub-Menu Item.......?')
		if(r==true)		
		{
			
			window.location.href='delete_sub_cat.php?id='+id+'&menu='+menu;
			
		}
		else
		{
			return false;
		}
	}
	
	function sub_cat_status(id,status,menu)
	{
		//alert(id+status+menu);
		
		var r=confirm('Are u Sure...!!!\r\n You Want To Change Status of Sub-Menu...!!')
		if(r==true)		
		{
			
			window.location.href='change_sub_cat_status.php?id='+id+'&status='+status+'&menu='+menu;
			
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
   width: 250px;
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
					
						<h3 class="fl">Sub-Menu Management</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">	
                    
                    <div style="float:right;">
                               <form name="search" method="get" id="search-form" class="fr" >
                                <fieldset>
                              <input type="text" id="search-keyword" name="search" class="round button dark ic-search image-right" placeholder="Search..." />  
                              <input type="hidden" id="search-keyword" name="menu" class="round button dark ic-search image-right" placeholder="Search..."  value="<?php echo $_GET['menu'];?>"/>   
                              
                                                           
                                </fieldset>
                            </form></div>
                   
                    <div style="float:left;"> 
                    <div class="styled-select">                              
                              <select name="category" id="category" onChange="javascript:menu(this.value);" >
                                <option value="0">--CHANGE MENU---</option>
                                <?php
                                
                                $sql="select * from ".$SUFFIX."category where cat_status='ACTIVE'";		
								
                                $res=mysql_query($sql);
                                while($row=mysql_fetch_array($res))
                                {
                                ?>
                                
                                    
                                        <option value="<?php echo $row['cat_name'];?>"
                                        <?php 
										if($row['cat_name']==$_GET['menu'])
										{?>selected="selected"<?php }?>
                                        
                                        
                                        ><?php echo $row['cat_name'];?></option>
                                      
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
                    				  
						<table>
						
							<thead>
                            
                            
                            
                            
                            
                            
								<tr>
									<!--<th>Sr. No</th>-->
									
									<th  style="width:150px;"><center>Sub Menu Name</center></th>
									<th style="width:300px;"><center>Sub Menu name</center></th>                                    
									<th style="width:150px;"><center>Status</center></th>
									<th style="width:150px;"><center>Actions</center></th>
                                    
								</tr>
							
							</thead>
	
							
							
							<tbody>
                            <?php
							
						    $sql="select * from ".$SUFFIX."sub_category where cat_name='".$_GET['menu']."'";
							
							if($_GET['search'])
							{							
							 $sql.="and sub_cat_name like'".$_GET['search']."%'";
							 $pg_param = "&search=".$_GET['search']."&menu=".$_GET['menu'];
							 
							 echo "<center><font size='+2'>RESULT FOR SEARCH <font color='red'>'".$_GET['search']."'</font></font></h1/></center><br/>";
							}
							
							$num_results_per_page = 20;
							$num_page_links_per_page = 4;
							$pg_param = "&menu=".$_GET['menu']; // Ex: &q=value
							
							
							
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
									
								    <td><center><?php echo $data['sub_cat_name'];?></center></td>
									<td><center><?php echo $data['cat_name'];?></center></td>
                                    <td><center><a href="javascript:void(0);"  onClick="javascript:sub_cat_status('<?php echo $data['sub_cat_id']?>','<?php echo $data['sub_cat_status']?>','<?php echo $_GET['menu']?>');"><?php echo $data['sub_cat_status'];?></a></center></td>
									<td><center>
										<a href="edit_sub_category.php?id=<?php echo $data['sub_cat_id']; ?>&menu=<?php echo base64_encode($_GET['menu']);?>" class="table-actions-button ic-table-edit" title="Edit"></a>
                                        
										<a style="margin-left:15px;" href="javascript:void(0);" onClick="javascript:delete_sub_cat('<?php echo $data['sub_cat_id'];?>','<?php echo $_GET['menu'];?>');" class="table-actions-button ic-table-delete" title="Delete"></a></center>
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
                        <ul><li><a href="add_sub_cat.php?menu=<?php echo base64_encode($_GET['menu']);?>" class="button round blue image-right ic-add text-upper">Add New <?php echo $_GET['menu']?> Sub Menu</a></li></ul>
                        
                        
					
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