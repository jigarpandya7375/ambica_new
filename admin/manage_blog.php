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
	<title>Manage Blog</title>
	
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
	
	
	function set_action(element,action,msg,table,id,page,field,folder)
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
				
		document.location.href='action.php?str='+val+'&action='+action+'&table='+table+'&id='+id+'&page='+page+'&field='+field+'&folder='+folder;
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
                   <div style="font-size:12px; float:left;"> 
                   <a href="manage_blog.php?type=All">All &nbsp;(<?php $all=mysql_query("select * from ".$SUFFIX."blog");echo mysql_num_rows($all);?>)</a> 
                  |
                   <a href="manage_blog.php?type=Published">Published&nbsp;(<?php $all=mysql_query("select * from ".$SUFFIX."blog where blog_type='Published'");echo mysql_num_rows($all);?>)</a> 
                   | 
                   <a href="manage_blog.php?type=Draft">Draft&nbsp;(<?php $all=mysql_query("select * from ".$SUFFIX."blog where blog_type='Draft'");echo mysql_num_rows($all);?>)</a>
                   | 
                    <a href="manage_blog.php?type=Trash">Trash&nbsp;(<?php $all=mysql_query("select * from ".$SUFFIX."blog where blog_type='Trash'");echo mysql_num_rows($all);?>)</a></div>
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
                    <div class="confirmation-box round">Your Transaction Complated Successfully....</div>
							
							
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
									<th style="width:100px;"><center>Image</center></th>
									<th style="width:100px;"><center>Title</center></th>
									<th><center>Blog Description</center></th>
                                    <th style="width:100px;"><center>Author</center></th>
                                    <th style="width:100px;"><center>Added Date</center></th>
                                    <th style="width:100px;"><center>Like / Unlike</center></th>                                     
									<th><center>Actions</center></th>
                                    
								</tr>	
							
							</thead>
	
							
							
							<tbody>
                            <?php
							
						    $sql="select * from ".$SUFFIX."blog";
							if(isset($_GET['search']))
							{							
							 $sql.="where blog_title like'".$_GET['search']."%'";
							 $pg_param = "&search=".$_GET['search']; // Ex: &q=value
							  echo "<div class='information-box round'><center><font>RESULT FOR SEARCH <font color='red'>'".$_GET['search']."'</font></font></h1/></center></div>";
							}
							if(isset($_REQUEST['type']))
							{
								if($_REQUEST['type']=='Published')
								{
						     	 $sql.=" where blog_type='".$_GET['type']."'";
								}
								if($_REQUEST['type']=='Draft')
								{
									 $sql.=" where blog_type='".$_GET['type']."'";
								}
								if($_REQUEST['type']=='Trash')
								{
									 $sql.=" where blog_type='".$_GET['type']."'";
								}
								if($_REQUEST['type']=='All')
								{
									 $sql.=" ";
								}
							 //$pg_param = "&search=".$_GET['search']; // Ex: &q=value
							
							}
							//echo $sql;exit;
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
										$i=0;
						    ?>
                            <tr>
	                 <td><input type="checkbox" name="checkalltabs[]" id="checkalltabs[]" value="<?php echo $data['blog_id'];?>"></td>
                                 <td><center><a href="<?php echo $SITE_PATH;?>img/blog/<?php echo $data['blog_image']?>" class="fancybox-effects-c" title="<?php echo shorter($data['blog_title'],80);?>"><img style="border-radius: 15px;" src="<?php echo $SITE_PATH;?>img/blog/<?php echo $data['blog_image']?>" height="60" width="80"/></a></center></td>							
								    <td><center><?php echo shorter($data['blog_title'],40);?></br>
                                    </center></div>
                                  
                                    </center></td>
                                      
									<td><center> <?php echo shorter($data['blog_desc'],200);?></center></td>      
                                    <td><center><?php echo $data['blog_by'];?></center></td>
                                     
									<td><center><?php echo  time_ago($data['blog_date']);?><br/>
                                    -----------<br/>
                                    <?php 
									if($data['blog_type']=='Published')
									{
										  echo "<center>
                                    <div class='round' style='background-color:#006; width:60%; height:17px;'><font color='#FFFFFF'>".$data['blog_type']."</font></div></center>";
									   
									}
									if($data['blog_type']=='Draft')
									{
									  echo "<center>
                                    <div class='round' style='background-color:#060; width:60%; height:17px;'><font color='#FFFFFF'>".$data['blog_type']."</font></div></center>";
									}
									if($data['blog_type']=='Trash')
									{
									  echo "<center>
                                    <div class='round' style='background-color:#F00; width:60%; height:17px;'><font color='#FFFFFF'>".$data['blog_type']."</font></div></center>";
									}
									?>
                                    </center></td>      
                                   
                                   
                                    <td style="font-size:14px;"><center><?php echo "<font color='blue'><img src='../images/likebig.png'></br>".$data['up']."</img></font><br/><font color='red'><img src='../images/dislike.png'/></br>".$data['down']."</font>";?></center></td>                            
                                    
									<td><center>
                                    
                                  <!--  <a href="<?php echo $SITE_PATH;?>blog.php?p=<?php echo $data['blog_id'];?>" 
                            class="fancybox fancybox.iframe" title="Live Blog Preview"><img src="images/icons/table/view.png" height="17" width="15"/></a>&nbsp;&nbsp;&nbsp;-->
                            
                           
							<a href="new_blog.php?id=<?php echo $data['blog_id']; ?>" class="table-actions-button ic-table-edit" title="Edit Blog"></a>&nbsp;&nbsp;&nbsp;
                           <!-- <a href="add_comment.php?id=<?php echo $data['blog_id']; ?>"  title="Add Comment"><img src="images/Small-Comment.png" height="20" width="20"/></a> <br/>-->
                            
                            <a href="manage_comment.php?id=<?php echo $data['blog_id']; ?>"  title="Manage Comment"><img src="images/comment1.png" height="20" width="20"/></a> 
                            
                            			</center>
									</td>
								</tr>
                          
                            <?php
							
							 $i++;
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
                         <a href="new_blog.php" class="button round blue image-right ic-add text-upper">Add New Blog</a>                   
                        <a href="javascript:void(0);" class="button round blue image-right ic-favorite text-upper" onClick="set_action('checkalltabs[]','Published', 'Are you sure, you want to change The Status of selected records...?','blog','blog_id','<?php echo $page_name[2];?>');">Published</a>
                        <a href="javascript:void(0);" class="button round blue image-right ic-favorite text-upper" onClick="set_action('checkalltabs[]','Draft', 'Are you sure, you want to change the Status of selected records..?','blog','blog_id','<?php echo $page_name[2];?>');">Move To Draft</a>	
                        
                        <a href="javascript:void(0);" class="button round blue image-right ic-favorite text-upper" onClick="set_action('checkalltabs[]','Trash', 'Are you sure, you want to change the Status of selected records..?','blog','blog_id','<?php echo $page_name[2];?>');">Move To  Trash</a>	
                        
                        
                        
                        <a href="javascript:void(0);" class="button round blue image-right ic-delete text-upper" onClick="set_action('checkalltabs[]','Delete_Image', 'Are you sure, you want to delete selected Blog..!!!','blog','blog_id','<?php echo $page_name[2];?>','blog_image','blog');">Delete</a>
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