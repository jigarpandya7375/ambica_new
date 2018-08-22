<?php

ob_start();
session_start();
//error_reporting(0);
require_once('../classess/connection.php');
require_once ('include/imgMark.class.php');




				
	             $demo_image= "";
				    if($_POST['title'] && $_POST['cat_desc'])
					
					{
						//print_r($_POST);
						    if(isset($_FILES))
							{
								//print_r($_FILES);
								$file_name = "am_cat_".time(); // You can Set File Name
								$file_path = "../category_images/"; // Set Path to Store Watermarked and Resized Images
								$image = new imgMark(); // Create New Object of imgMark Class
								
								$image->font_path = "include/arial.ttf"; // Font file
								$image->font_size = 10; // in pixels
								$image->water_mark_text = "ambicacaterers.6te.net";  //WatermarkText
								$image->color = '000000'; //text Color
								$image->opacity =40; // Opacity of the Text
								$image->rotation = 0; // Text rotation (in Degree)
								$image->img_width = 100; // (Optional) If you want to resize image you can set maximum width
								$image->img_height = 100; // (Optional) If you want to resize image you can set maximum height
								// Here you have to user functins watermark_text or watermark_image
								if($image->convertImage('cat_image', $file_name, $file_path))
								 $demo_image = $image->img_path;		
								$Image_name=explode("/",$demo_image);
								 $Image_name[2];
								
			    $sql="insert into ".$SUFFIX."category values('','".$_POST['title']."','".$_POST['cat_desc']."','".$Image_name[2]."','".date("Y-m-d")."','".$_POST['status']."')";
				 $res=mysql_query($sql);
				
					  header('location:welcome.php');
				  
								
							}
						
					}
					
					
					 
                  ?>