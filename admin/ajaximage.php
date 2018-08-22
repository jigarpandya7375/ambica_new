<?php
include_once 'includes/configure.php';
$path = UPLOAD_PATH.'images/blog/';

	$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","JPG","JPEG");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			
			if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats))
					{
					if($size<(1024*1024))
						{
							//$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
							$actual_image_name =rand(0,100000).$name;
							$tmp = $_FILES['photoimg']['tmp_name'];
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{
								
									echo '<table id="clip_to_copy" class="yui-grid"><tr><td style="display:none;">'.UPLOAD_URL.'blog/'.$actual_image_name.'</td><td>
									<input type="hidden" name="feat_image" id="feat_image" value="'.$actual_image_name.'"/></td>
									<td><input type="button" name="copy_to_clipboard_here" value="Copy this link" /></td>
                					</tr>
        							</table>
								   <script type="text/javascript">
									var $ctc=jQuery.noConflict();
										$(function() {
											 $ctc("#clip_to_copy tbody td:last-child").each(function() {
												var clip = new ZeroClipboard.Client();
								
												var lastTd = $ctc(this);
												var parentRow = lastTd.parent("tr");
								
												clip.glue(lastTd[0]);
								
												var txt = $ctc.trim($ctc("td:first-child", parentRow).text());
												clip.setText(txt);
								
												clip.addEventListener("complete", function(client, text) {
												});
											});
										});                               
									</script>
									';
								}
								
							else
								echo "failed";
						}
						else
						echo "Image file size max 1 MB";					
						}
						else
						echo "Invalid file format..";	
				}
				
			else
				echo "Please select image..!";
				
			exit;
		}
?>