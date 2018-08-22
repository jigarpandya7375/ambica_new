<?php
ob_start();
session_start();
//error_reporting(0);
require_once('../classess/connection.php');
/*if(!isset($_COOKIE['username']) || !isset($_SESSION['username']))
{
	header('location:index.php');
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Indian Recipe's - Add Recipe</title>
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/logo_small.png"/>
	<link rel="stylesheet" href="css/pagination.css" media="all" />
    <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
	<!-- Optimize for mobile devices -->	
	<!-- jQuery & JS files -->
	<script src="js/jquery.min.js"></script>
    <script src="js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8">
	</script>
	<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
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
    
     <script>
		jQuery(document).ready(function(){
			jQuery("#form_recipe").validationEngine('attach', {bindMethod:"live"});
		});
	</script>
    
    <script type="text/javascript">
	function check_editor()
	{
		if ( CKEDITOR.instances.editor1.getData() == '' )
		{
		//alert( 'Recipe Ingredients Cant Be Blank' );
		document.getElementById('error_editor1').innerHTML='<font color="red">Recipe Ingredients Information Can Not Be Blank</font>';
		document.getElementById('error_editor1').focus();
		return false;
	
	   }
	   if ( CKEDITOR.instances.editor2.getData() == '' )
		{
		document.getElementById('error_editor2').innerHTML='<font color="red">Recipe Method Information Can Not Be Blank</font>';
		document.getElementById('error_editor2').focus();
	    return false;
	   }
	   else
	   {
		   alert('else');
		   document.forms["form_recipe"].submit();
		   return true;
		   
	   }
		   
	}
	</script>
	<script src="js/script.js"></script>  
	   <script type="text/javascript">
        $(document).ready(function()
        {
        $(".cuisine").change(function()
        {
        var id=$(this).val();
        var dataString = 'id='+ id;
       // alert(dataString);
        $.ajax
        ({
        type: "POST",
        url: "ajax_sub_cuisine.php",
        data: dataString,
        cache: false,
        success: function(html)
        {
			//alert(html);
        $(".sub_cuisine").html(html);
        } 
        });
        
        });
        });
        </script>
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
    
   
</head>
<body>

	<!-- TOP BAR -->
		
		<?php include('include/header.php');?>
	
	 <!-- end top-bar -->
	
	
	
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			  
			<?php include('include/side_menu.php');?>  <!-- end side-menu -->
			
			<div class="side-content fr">
            
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">ADD RECIPE</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf">
				
						<div class="half-size-column fl">
						    <div class="stripe-separator"><!--  --></div>
                                   <h1><font color="#FF0033">Quick Look</font></h1>
                             <div class="stripe-separator"><!--  --></div>
							<form method="post" name="form_recipe" id="form_recipe">
							
								<fieldset>
	
									<p>
										<label for="another-simple-input">Recipe Name</label>
										<input type="text"  name="rec_name" id="rec_name" class="round default-width-input validate[required] text-input"/>
										<em>Add Recipe Name</em>								
									</p>
                                    
                                    <p>
										<label for="another-simple-input">Main Ingredients</label>
										<input type="text"  name="main_ing" id="main_ing" class="round default-width-input validate[required] text-input"/>
										<em>Add Ingredients</em>								
									</p>
                                    
                                   
                                    
                                    <p class="form-error-input">
										<label for="dropdown-actions">Level of Cooking</label>
	
										<select  name="recipe_level" id="recipe_level" class="validate[required]">
                                            <option value="">--SELECT---</option>
                                            <option value="Indian Recipe">Bigginer</option>
                                            <option value="option1">Medium</option>
                                            <option value="option1">Expert</option>
										</select>
									</p>
                                    <div class="stripe-separator"><!--  --></div>
                                   <h1><font color="#FF0033">Recipe Time & Servings</font></h1>
                                    <div class="stripe-separator"><!--  --></div>
                                    
                                    
                                    <p>
										<label for="another-simple-input">Cooking Time</label>
										<input type="text" id="cook_time" name="cook_time" class="round default-width-input validate[required] text-input"/>
										<em>E.g....[10-15 minutes]</em>								
									</p>
                                    
                                    <p>
										<label for="another-simple-input">Preparation Time</label>
										<input type="text" id="pre_time" name="pre_time" class="round default-width-input validate[required] text-input"/>
										<em>E.g....[10-15 minutes]</em>									
									</p>
                                    
                                    <p>
										<label for="another-simple-input">Servings</label>
										<input type="text" id="servings" name="servings" class="round default-width-input validate[required] text-input"/>
										<em>E.g. Servring People No..like 1,2,3,4</em>								
									</p>
                                    
                                     <p class="form-error-input">
										<label for="dropdown-actions">Category</label>
	
										<select id="rec_category" name="rec_category">
                                            <option value="" class="validate[required]">--SELECT CATEGORY---</option>
                                            <option value="Veg">Vag</option>
                                            <option value="Non-Veg">Non-Veg</option>
                                            
										</select>
									</p>
                                  <div class="stripe-separator"><!--  --></div>
                                   <h1><font color="#FF0033">Recipe information</font></h1>
                                    <div class="stripe-separator"><!--  --></div>
                                    
                                     <p class="form-error-input">
										<label for="dropdown-actions">Recipe Image</label>
	
										<input  type="file" name="rec_image" id="rec_img" size="40" class="validate[required] text-input"/>
									</p>
                                    
                                     <p>
										<label for="another-simple-input">Cuisine Type</label>
                                        <select name="cuisine" id="cuisine" class="cuisine validate[required]">
                                        <option value="">---Select Type---</option>
                                        <?php
										
										$sql=mysql_query("select * from ".$SUFFIX."main_cuisine where status='Active'");
										while($res=mysql_fetch_array($sql))
										{
										
                                        ?>
										<option value="<?php echo $res['cui_id'];?>" <?php if($res['cui_id']==$data['cui_id']){?> selected="selected"<?php }?>><?php echo $res['cui_name'];?></option>
                                        <?php
										
										}
										
										?>
                                        </select>
										<em>Main Cuisine</em>								
									</p>
                                    
                                    <p>
										<label for="another-simple-input">Sub-Cuisine Type</label>
                                        <select name="subcuisine" id="sub_cuisine" class="sub_cuisine  validate[required]">
                                       <option selected="selected" value="">--Select Sub Category Cuisine--</option>
                                       
                                        <?php
										if(isset($_REQUEST['id']))
										{
												$sql=mysql_query("select * from ".$SUFFIX."sub_cuisine where sub_cui_status='Active'");
												while($res=mysql_fetch_array($sql))
												{
												
												?>
												<option value="<?php echo $res['sub_cui_id'];?>" <?php if($res['sub_cui_id']==$data['sub_cui_id']){?> selected="selected"<?php }?>><?php echo $res['sub_cui_name'];?></option>
												<?php
												
												}
										}
										?>
                                        </select>
										<em>Select Sub-Cuisine Title</em>								
									</p>
                                    
                                    
                                    <p class="form-error-input">
										<label for="dropdown-actions">Recipe Status</label>
	
										<select id="status" name="status" class="validate[required]">
                                        <option value="">---Select Status---</option>
											<option value="ACTIVE">ACTIVE</option>
                                            <option value="INACTIVE">INACTIVE</option>
										</select>
									</p>
                                    
                                    
	
									<!--<p class="form-error">
										<label for="error-input">Recipe Title</label>
										<input type="text" id="error-input" class="round default-width-input error-input"/>
										<em>This is an optional error description that can be associated with an input.</em>								
									</p>-->
									
                                   <div class="stripe-separator"><!--  --></div>
                                   <h1><font color="#FF0033">Nutritional information [Information per Serve]</font></h1>
                                    <div class="stripe-separator"><!--  --></div>
                                    
                                    <p>
										<label for="another-simple-input"> Protein</label>
										<input type="text" id="Protein" name="Protein" size="5" class="round default-width-input validate[required,custom[number]] text-input"/> g
										<em>Protein in g</em>									
									</p>
                                    
                                    <p>
										<label for="another-simple-input"> Dietary Fibre</label>
										<input type="text" id="fiber" name="fiber" size="5" class="round default-width-input validate[required,custom[number]] text-input"/> g
										<em>Dietary Fibre in g</em>									
									</p>
                                    
                                    <p>
										<label for="another-simple-input"> Fat Total</label>
										<input type="text" id="fat" name="fat" size="5" class="round default-width-input validate[required,custom[number]] text-input"/> g
										<em>Fat Total in g</em>									
									</p>
                                    
                                    <p>
										<label for="another-simple-input">Energy</label>
										<input type="text" id="Energy" name="Energy" size="5" class="round default-width-input validate[required,custom[number]] text-input"/> Kj
										<em>Energy in Kj</em>									
									</p>
                                    
                                    
                                    
                                    
                                     <p>
										<label for="another-simple-input"> Sodium</label>
										<input type="text" id="Sodium" name="Sodium" size="5" class="round default-width-input validate[required,custom[number]] text-input"/> g
										<em>Sodium in g</em>									
									</p>
                                    
                                    <p>
										<label for="another-simple-input">Carbohydrate</label>
										<input type="text" id="Carbohydrate" name="Carbohydrate" size="5" class="round default-width-input validate[required,custom[number]] text-input"/> g
										<em>Carbohydrate in g</em>									
									</p>
                                    
                                    <p>
										<label for="another-simple-input"> Cholesteroll</label>
										<input type="text" id="Cholesterol" name="Cholesterol" size="5" class="round default-width-input validate[required,custom[number]] text-input"/> g
										<em>Cholesterol in g</em>									
									</p>
							
						</div> <!-- end half-size-column -->
						
						<div class="half-size-column fr">
                      
						<div class="stripe-separator"><!--  --></div>
                                   <h1><font color="#FF0033">Ingredients</font></h1>
                                    <div class="stripe-separator"><!--  --></div>
							
				                     
								
									 <p>
									    <label id="error_editor1" ></label>
										<textarea id="editor1" name="editor1" class="round full-width-textarea validate[required] text-input"></textarea>
									</p>
                                    
								<script type="text/javascript">
                                //<![CDATA[
                    
                                    
                                    CKEDITOR.replace( 'editor1',
                                    {
                                        //uiColor: '#FFFFFF'
										  height: 670,
       									
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
                                                ['NumberedList','BulletedList','-','Blockquote','-', 'Center'],
                                                ['TextColor', '-', 'Smiley','SpecialChar', '-', 'Maximize','-', 'Font','-', 'Styles']
                                            ],
                                            
                                        });*/
                    
                                //]]>
                                </script>
								
									<div class="stripe-separator"><!--  --></div>
                                   <h1><font color="#FF0033">Recipe Cooking Methods</font></h1>
                                    <div class="stripe-separator"><!--  --></div>
							
	
									 <p>
										<label id="error_editor2" ></label>
										<textarea id="editor2" name="editor2" class="round full-width-textarea"></textarea>
									</p>
                                    
								<script type="text/javascript">
                                //<![CDATA[
                    
                                    
                                    CKEDITOR.replace( 'editor2',
                                    {
                                        //uiColor: '#3F4551'
										 height: 670,
                                     });
                                    
                                      /*   CKEDITOR.replace( 'editor2',
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
                                            
                                        });	
                    */
                                //]]>
                                </script>
	                                 
									</br></br>
	
									
                                   
	 <input type="submit" name="new_blog" id="new_blog" class="button round blue image-right ic-add text-upper" onClick="javascript:check_editor();" value="Published"/>
     
								
								</fieldset>
							
							</form>
							
						</div>
				
					</div> <!-- end content-module-main -->
					
				</div> <!-- end content-module -->
	
				 <?php
				 /*if($_POST['title'] && $_POST['editor1'])
					$sql="insert into ".$SUFFIX."recipe values('','".$_POST['title']."','".$_POST['editor1']."','".$_POST['recipe_type']."','".$_POST['status']."')";
				   $res=mysql_query($sql);
				   if($res==1)
				   {
					   header('location:welcome.php');
				   }*/
                  ?>

				
		
			</div> <!-- end side-content -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
    <?php include('include/footer.php');?>
	 <!-- end footer -->

</body>
</html>