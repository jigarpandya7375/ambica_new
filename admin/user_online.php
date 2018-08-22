<?php
session_start();
error_reporting(0);	
require_once('../classess/connection.php');
require_once('../classess/function.php');

?>
<div id="reload_online_user">
<table id="table_user">
						
							<thead>
                           	<tr>
									<!--<th>Sr. No</th>-->
									<th style="width:150px;"><center>User Profile Image</center></th>
									<th  style="width:250px;"><center>Name</center></th>
									<th style="width:300px;"><center>Date Of Birth</center></th>
                                   
                                    <th  style="width:150px;"><center>Created Date</center></th>
                                    <th  style="width:150px;"><center>IP Address</center></th>
                                    <th style="width:150px;"><center>Status</center></th>
									
                                    
								</tr>
							
							</thead>
	
							
							
							<tbody>
                            <?php
							
						   echo $sql="select * from ".$SUFFIX."user_detail where user_online_status='Online'";
							if($_GET['search'])
							{							
							 $sql.=" and fullname like'%".$_GET['search']."%'";
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
									<td><center> <img style="border-radius: 15px;" src="<?php echo $SITE_PATH;?>admin/images/<?php echo $data['profile_image']?>" height="70" width="80"/></center></td>
								    <td><center><?php echo shorter($data['fullname'],50);?></center></td>
									<td><center><?php echo shorter($data['dob'],50);?></center></td>
                                    <td><center><?php echo $data['created_on'];?></center></td>
                                    <td><center><?php echo $data['ip'];?></center></td>
                                    <td><center><?php echo $data['status'];?></center></td>
								</tr>
                            
                            <?php
							 //$i++;
                                    }		
                                   
                                }
                                else
                                {
                                    echo "<div class='information-box round'><center><font>Right Now No User is Online...!!!</font></h1/></center></div>";
									echo " <script>document.getElementById('table_user').style.display='none';
				</script>";
                                }
                            }
                            else
                            {
                                echo $pg_error; //display any errors, you can remove this if you want.	
                            }
                            ?>
							
							</tbody>                           
						</table>
 </div>