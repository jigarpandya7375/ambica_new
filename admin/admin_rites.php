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
$sql="select * from ".$SUFFIX."admin where id='".base64_decode($_GET['id'])."'";
$res=mysql_query($sql);
$data=mysql_fetch_array($res);


	
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Edit Admin Rites</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/logo_small.png"/>
	<link rel="stylesheet" href="css/pagination.css" media="all" />
	<!-- Optimize for mobile devices -->	
	<!-- jQuery & JS files -->
	<script src="js/jquery.min.js"></script>    
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
        <?php include('include/side_menu.php');?>

			 <!-- end side-menu -->
			
			<div class="side-content fr">
                <!--content Type 2 start-->
               <div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl"><?php echo $data['username']?>&nbsp;&nbsp;Display Rites</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					<div class="content-module-main">	
                    <?php
						if($_POST['rites_submit'])
						{
								if(base64_decode($_GET['id'])!='1')
								{
								// print_r($_POST);
								 $rite_string=$_REQUEST['dashboard'].$_REQUEST['rites'].$_REQUEST['photo'].$_REQUEST['menu'].$_REQUEST['message'].$_REQUEST['mail'].$_REQUEST['cmail'].$_REQUEST['rss'];
								
								 $sql="update ".$SUFFIX."admin set rites='".$rite_string."',last_updated='".date('Y-m-d H:i:s')."' where id='".base64_decode($_GET['id'])."'";
								 $res=mysql_query($sql);
								 if($res=='1')
								 {
									 $id=base64_decode($_GET['id']);
									 header('location:admin_rites.php?id='.base64_encode($id)."&res=".base64_encode("success"));
									  
								 }
								 
								
								}
								else
								{
									 echo "<div class='error-box round'><center><font>You Do Not Change the 'RITES' of Super Admin</font></font></h1/></center></div>";
								}
						
						}
                    ?>
                     <p>
                    <?php
					if(base64_decode($_GET['res'])=='success')
					{
					?>
                    <div class="confirmation-box round">Menu Rites Set To Admin Successfully...!!! Go to Manage Admin User <a href="admin_user.php">Click here</a></div>
							
							
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
                    	<form method="post" name="rite_form" id="rite_form">			  
						<table>
						
							<thead>
                           	<tr>
									<!--<th>Sr. No</th>-->
									<th style="width:10%"><center>Ser. No</center></th>
                                    <th style="width:40%"><center>Menu Name</center></th>
									<th style="width:50%; height:50px;"><center>Display Option</center></th>
									
									
                                    
								</tr>
							
							</thead>
	
							
							
							<tbody>
                            <?php
							
						    $rites=$data['rites'];
						    ?>
                            
                             <tr style="height:50px;">	
                            <td><center>1</center></td>
                            <td><center>Dashboard</center></td>
                          <td><center><input type="radio" name="dashboard" value="1" <?php if($rites[0]=='1'){?> checked="checked"<?php }?> id="dashboard"/>Yes &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"  name="dashboard" <?php if($rites[0]=='0'){?> checked="checked"<?php }?> value="0" id="dashboard"/>No</center></td>
                            </tr>
                            
                            <tr style="height:50px;">	
                            <td><center>2</center></td>
                            <td><center>Manage Admin Rites</center></td>
                          <td><center><input type="radio" name="rites" value="1" <?php if($rites[1]=='1'){?> checked="checked"<?php }?> id="rites"/>Yes &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"  name="rites" <?php if($rites[1]=='0'){?> checked="checked"<?php }?> value="0" id="rites"/>No</center></td>
                            </tr>
                            
                            
                             <tr style="height:50px;">	
                            <td><center>3</center></td>
                            <td><center>Manage Photo Gallery</center></td>
                          <td><center><input type="radio" name="photo" value="1" <?php if($rites[2]=='1'){?> checked="checked"<?php }?> id="photo"/>Yes &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" <?php if($rites[2]=='0'){?> checked="checked"<?php }?> name="photo" value="0" id="message"/>No</center></td>
                            </tr>
                            
                            <tr style="height:50px;">	
                            <td><center>4</center></td>
                            <td><center>Manage Menu</center></td>
                          <td><center><input type="radio" name="menu" value="1" <?php if($rites[3]=='1'){?> checked="checked"<?php }?> id="menu"/>Yes &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" <?php if($rites[3]=='0'){?> checked="checked"<?php }?> name="menu" value="0" id="menu"/>No</center></td>
                            </tr>
                            
                            <tr style="height:50px;">	
                            <td><center>5</center></td>
                            <td><center>Manage Message</center></td>
                          <td><center><input type="radio" name="message" value="1" <?php if($rites[4]=='1'){?> checked="checked"<?php }?> id="message"/>Yes &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" <?php if($rites[4]=='0'){?> checked="checked"<?php }?> name="message" value="0" id="message"/>No</center></td>
                            </tr>
                            
                             
                              
                            <tr style="height:50px;">	
                            <td><center>6</center></td>
                            <td><center>Mail Management</center></td>
                          <td><center><input type="radio" name="mail" value="1" <?php if($rites[5]=='1'){?> checked="checked"<?php }?> id="mail"/>Yes &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="mail" <?php if($rites[5]=='0'){?> checked="checked"<?php }?> value="0" id="mail"/>No</center></td>
                            </tr> 
                            
                             <tr style="height:50px;">	
                            <td><center>7</center></td>
                            <td><center>Check Your Mail</center></td>
                          <td><center><input type="radio" name="cmail" value="1" <?php if($rites[6]=='1'){?> checked="checked"<?php }?> id="cmail"/>Yes &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" <?php if($rites[6]=='0'){?> checked="checked"<?php }?> name="cmail" value="0" id="cmail"/>No</center></td>
                            </tr> 
                            
                             
                            
                             <tr style="height:50px;">	
                            <td><center>8</center></td>
                            <td><center>Manage RSS</center></td>
                          <td><center><input type="radio" name="rss" value="1" <?php if($rites[7]=='1'){?> checked="checked"<?php }?> id="rss"/>Yes &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" <?php if($rites[7]=='0'){?> checked="checked"<?php }?> name="rss" value="0" id="rss"/>No</center></td>
                            </tr> 
                          
	                        
                            
	                         
							
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
                        <center><div><input type="submit" name="rites_submit" class="button round blue image-right ic-add text-upper" value="Assign Rites"/></div></center>
                        </form>
                        
                       
                       
					
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