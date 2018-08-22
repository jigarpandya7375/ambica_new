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
	<title>Soham Tec - Menage Sub Traing Moudle </title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" href="images/logo_small.png"/>
	<link rel="stylesheet" href="css/pagination.css" media="all" />
	<!-- Optimize for mobile devices -->	
	<!-- jQuery & JS files -->
	<script src="js/jquery.min.js"></script>
	<script src="js/script.js"></script>  
    
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
    <script type="text/javascript" language="javascript">
	
	
	function menu(menu)
	{
		var r=confirm('Are You Sure You want to Change Training Module...?')
		if(r==true)		
		{
		window.location.href='mange_content.php?menu='+menu;
		}
		else
		{
			return false;
		}
	}
	
	function form_submit()
	{
		document.forms["module-form"].submit();
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
                    
                    
                   
                    <div style="float:left;"> 
                    <div class="styled-select">    
                 
                               
                              <select name="category" id="category" onChange="javascript:menu(this.value);" >
                                <option value="0">--CHANGE SUB TRAINING MODULE---</option>
                                <?php
                               
                               $sql="select * from ".$SUFFIX."category where cat_status='ACTIVE'";		
								
                                $res=mysql_query($sql);
                                while($row=mysql_fetch_array($res))
                                {
                                ?>
                                
                                    
                                        <option value="<?php echo base64_encode($row['cat_name']);?>"
                                        <?php 
										if($row['cat_name']== base64_decode($_GET['menu']))
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
                    <div class="confirmation-box round">Your  Transaction Will Be Complated Successfully....</div>
							
							
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
                            
                            
                            
                            <form name="search" action="<?php $_SERVER['PHP_SELF'];?>" method="post" id="module-form" class="fr" >          
                            
                            
							 <p>
										<!--<label for="textarea">Add Sub Content Module</label>-->
                                        
                              <?php 
							   $sql="select * from ".$SUFFIX."category where cat_name='".base64_decode($_GET['menu'])."' and cat_status='ACTIVE'";		
								
                                $res=mysql_query($sql);
								$row1=mysql_fetch_array($res);
								?>          
					<textarea id="editor1" name="editor1" class="round full-width-textarea"><?php echo $row1['cat_content'];?></textarea>
									</p>
                                    
								<script type="text/javascript">
                                //<![CDATA[
                    
                                    
                                   CKEDITOR.replace( 'editor1',
                                    {
                                        uiColor: '#3F4551'
                                     });
                                    
                                       /* CKEDITOR.replace( 'editor1',
                                        {
                                            extraPlugins : 'bbcode',
                                            toolbar :
                                            [
                                                ['Source', '-', 'Save','NewPage','-','Undo','Redo'],
                                                ['Find','Replace','-','SelectAll','RemoveFormat'],
                                                ['Link', 'Unlink', 'Image'],
                                                '/',
                                                ['FontSize', 'Bold', 'Italic','Underline'],
                                                ['NumberedList','BulletedList','-','Blockquote'],
                                                ['TextColor', '-', 'Smiley','SpecialChar', '-', 'Maximize']
                                            ],
                                            
                                        });*/
                    
                                //]]>
                                </script>
							
							</thead>
	
							<input type="hidden" value="<?php echo base64_decode($_GET['menu']);?>" name="menu"/>
							  <?php
							//print_r($_POST);exit;
						
							if($_POST['editor1'])
							{
							  $sql="update ".$SUFFIX."category set cat_content='".$_POST['editor1']."' where cat_name='".$_POST['menu']."'";
                              $res=mysql_query($sql);
							  if($res==1)
							 {			
						        header('location:mange_content.php?res='.base64_encode("success").'&menu='.base64_encode($_POST['menu']));
								 
							 }
							 else
							 {
								 
								 header('location:mange_content.php?res='.base64_encode("fail").'&menu='.base64_encode($_POST['menu']));
							 }
							}
							
							?>
                                       
                       
                         <center><ul><li><a href="javascript:void(0);" onClick="javascript:form_submit();" class="button round blue image-right ic-add text-upper">Update <?php echo shorter(base64_decode($_GET['menu']),30);?> Sub Training Moudle Content</a></li></ul></center>
							
                            </table>
                            
                            
                          
                      
                        </div>
					
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