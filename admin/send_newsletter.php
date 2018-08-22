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

        $sql_content="select * from ".$SUFFIX."mail where mail_id='".$_REQUEST['category']."'";
		$res_content=mysql_query($sql_content);
		$content_data=mysql_fetch_array($res_content);
		$content=$content_data['mail_content'];

 if(isset($_POST['send_all']))
 {
    $sql="select * from ".$SUFFIX."newsletter where status='Active'";
	$res=mysql_query($sql);
	while($data=mysql_fetch_array($res))
	{
		$email=array();
		$email=$data['email'];
		$subject="Rameshwar Decorators Weekly Newsletter";
	    $headers = "MIME-Version: 1.0\n"; 
		$headers .= "Content-type: text/html; charset=iso-8859-1\n"; 
		$headers .= "X-Priority: 3\n"; 
		$headers .= "X-MSMail-Priority: High\n"; 
		$headers .= "X-Mailer: php\n"; 
		$headers .= 'From: Rameshwar Decorators <admin@rameshwardecorators.com>' . "\r\n";
		$headers .= "Reply-To: $from\r\n";
		$headers .= "Return-Path: $from\r\n";
		$ok=mail($data['email'], $subject, $content, $headers);		
		$email.=$data['email']."&nbsp;,&nbsp;";
	    $message_all="<div class='confirmation-box round'>Newsleeter Send To All Subscriber Successfully...!!!</div>";
	}
	
	
		
 }
 if(isset($_POST['send_selected']))
 {
	if($_POST['checkalltabs']!='')
	{
		for($i=0;$i<count($_POST['checkalltabs']);$i++)
		{
			$sql="select * from ".$SUFFIX."newsletter where id='".$_POST['checkalltabs'][$i]."'";
			$res=mysql_query($sql);
			while($data=mysql_fetch_array($res))
			{
				
				$subject="Rameshwar Decorators Weekly Newsletter";
				$headers = "MIME-Version: 1.0\n"; 
				$headers .= "Content-type: text/html; charset=iso-8859-1\n"; 
				$headers .= "X-Priority: 3\n"; 
				$headers .= "X-MSMail-Priority: High\n"; 
				$headers .= "X-Mailer: php\n"; 
				$headers .= 'From: Rameshwar Decorators <admin@rameshwardecorators.com>' . "\r\n";
				$headers .= "Reply-To: $from\r\n";
				$headers .= "Return-Path: $from\r\n";
				$ok=mail($data['email'], $subject, $content, $headers);	
				$email.=$data['email']."&nbsp;,&nbsp;";
				$message_selected="<div class='confirmation-box round' style='text-align:center'>Newsletter Send to <br/>'".$email."' Successfully...!!!</div>";
			}
		}
	}
	else
	{
		$message_not_selected="<img src='images/arrow.gif' height='70' width='60' style='margin-left:-512px;'/><img src='images/error.png' height='60' width='400'/>";
	}
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Manage Mail Content</title>
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" href="images/logo_small.png"/>
	<link rel="stylesheet" href="css/pagination.css" media="all" />
	<!-- Optimize for mobile devices -->	
	<!-- jQuery & JS files -->
    
	<script src="js/jquery.min.js"></script>
     <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
    <script src="js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
      <script>
		jQuery(document).ready(function(){
			jQuery("#form_mail_content").validationEngine('attach', {bindMethod:"live"});
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
	
	function menu(menu)
	{
		
		var r=confirm('Are you sure you want to continue with selected mail content..?')
		if(r==true)		
		{
		window.location.href='send_newsletter.php?content_id='+menu;
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
					
						<h3 class="fl">Event Management</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">	
                    <p>
                    <?php
                      if(isset($message_all))
							{
								echo $message_all;
							}
							if(isset($message_selected))
							{
								echo $message_selected;
							}
							?>
                    </p>
                   
                    <div style="float:right;">
                               <form name="search" method="get" id="search-form"  class="fr" >
                                <fieldset>
                              <input type="text" id="search-keyword" name="search" class="round button dark ic-search image-right" placeholder="Search..." />                                    
                                </fieldset>
                            </form><br/><br/><br/></div>
                            
                    
                       <form name="form_mail_content" id="form_mail_content" method="post"/>
                       <div style="float:left;"> 
                       <div class="styled-select">                              
                              <select name="category" id="category" onChange="javascript:menu(this.value);" class="validate[required] text-input" >
                                <option value="">--CHOOSE MAIL CONTENT---</option>
                                <?php
                                
                               echo  $sql="select * from ".$SUFFIX."mail where status='Active'";		
								
                                $res=mysql_query($sql);
                                while($row1=mysql_fetch_array($res))
                                {
                                ?>
                                
                                    
                                        <option value="<?php echo $row1['mail_id'];?>"  <?php 
										if($row1['mail_id']==$_GET['content_id'])
										{?>selected="selected"<?php }?>
                                        ><?php echo shorter($row1['mail_title'],50);?></option>
                                      
                                <?php
                                }
                                ?>
                                </select>   
                             <br/><br/><br/><br/>
                            
                               
                               </div>
                               </div>
                               <br/><br/>
                            <br/><br/>  
                   
						<?php
						  
                           if(isset($message_not_selected))
                            {
                                echo $message_not_selected;
                            }
                    	?>			  
						<table id="tab1">
						
							<thead>
								<tr>
									<th><input type="checkbox" name="checkAll" id="checkAll"></th>	
									
									<th  style="width:300px;"><center>Name</center></th>
                                    <th style="width:100px;"><center>Mail Status</center></th>
									<th style="width:150px;"><center>Actions</center></th>
                                    
								</tr>
							
							</thead>
	
							
							
							<tbody>
                            <?php
							
						    $sql="select * from ".$SUFFIX."newsletter";
							if($_GET['search'])
							{							
							 $sql.=" where mail_title like'".$_GET['search']."%'";
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
					<td><input type="checkbox" name="checkalltabs[]" id="checkalltabs[]" value="<?php echo $data['id'];?>"></td>							
								    <td><center><a href="mailto:<?php echo $data['email'];?>"><?php echo $data['email'];?></a></center></td>
                                     
								<!--	<td><center> <?php echo strip_tags($data['mail_content']);?></center></td>    -->  
                                    <td><center>
									<?php
									if($data['status']=='Active')
									{
									//echo "<font color='green'>".$data['status']."</font>";
									echo "<div class='round' style='background-color:#006600; width:40%; height:17px;'><font color='#FFFFFF'>".$data['status']."</font></div>"; 
									}
									else
									{
										echo "<div class='round' style='background-color:#FF0000; width:40%; height:17px;'><font color='#FFFFFF'>".$data['status']."</font></div>"; 
									}?></center></td>
                                   
                                                        
                                    
									<td><center>
							<a href="edit_mail.php?id=<?php echo $data['mail_id']; ?>" class="table-actions-button ic-table-edit" title="Edit"></a>
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
                         <div style="margin-left:150px;">   
                               
                                <input type="submit" name="send_all" id="send_all" class="button round blue image-right ic-add text-upper" value="Send To All"/> 
                                
                                <input type="submit" name="send_selected" id="send_selected" class="button round blue image-right ic-add text-upper" value="Send To Selected"/> 
                         
                        <a href="javascript:void(0);" class="button round blue image-right ic-favorite text-upper" onClick="set_action('checkalltabs[]','Active', 'Are you sure, you want to change The Status of selected records...?','newsletter','id','<?php echo $page_name[2];?>');">Active</a>
                        <a href="javascript:void(0);" class="button round blue image-right ic-favorite text-upper" onClick="set_action('checkalltabs[]','Inactive', 'Are you sure, you want to change the Status of selected records..?','newsletter','id','<?php echo $page_name[2];?>');">Inactive</a>	
                        <a href="javascript:void(0);" class="button round blue image-right ic-delete text-upper" onClick="set_action('checkalltabs[]','Delete', 'Are you sure, you want to delete selected Messages..!!!','newsletter','id','<?php echo $page_name[2];?>');">Delete</a>
                       </center>
                               </div>
					
					</div> <!-- end content-module-main -->
				
				</div>
		
			</div> <!-- end side-content -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	  </form>
	
   
	<!-- FOOTER -->
    <?php include('include/footer.php');?>
	 <!-- end footer -->

</body>
</html>