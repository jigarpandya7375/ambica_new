<?php 
require_once("../pi_classes/Thumbnail.php");
require_once("../pi_classes/admin.php");
$ob_admin=new admin();
$thumb=new Thumbnail();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<script src="../ckeditor/sample.js" type="text/javascript"></script>
<link href="../ckeditor/sample.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript">

function validation()
{
	//alert('call');
	if(document.getElementById('Title').value=='')
		{
			alert('Please Insert Article Title....');
			document.getElementById('Title').focus();
			return false;
		}
		
		if(document.getElementById('Ar_image').value=='')
		{
			alert('Please Select Article Image....');
			document.getElementById('Ar_image').focus();
			return false;
		}
		
		/*if(document.getElementById('editor1').value=='')
		{
			alert('Please Insert Article Details');
			document.getElementById('editor1').focus();
			return false;
		}*/
		
		document.form1.submit();
		
}
</script>
</head>
<body>
 
     <?php 
        
		if($_FILES['Ar_image']['name']!="" && $_POST['Title']!='')
			{
				
				
				$filename=$_FILES['Ar_image']['name']; 
				$filesize=$_FILES['Ar_image']['size'];
				$tmpname=$_FILES['Ar_image']['tmp_name'];
				$filetype=$_FILES['Ar_image']['type'];
				
				define('UPL_FLD','../article_image/');
				
				$ext=explode('.',$filename);
				$uploaded_file=$ext[0];
				$uploaded_file="top_article_".time();
				 $upload_dir="../article_image/".$uploaded_file.".".$ext[1];
		
				move_uploaded_file($_FILES['Ar_image']['tmp_name'],UPL_FLD.$uploaded_file.".".$ext[1]);
				
				$new_name=explode("/",$upload_dir);
				//$ext=end(explode('.',$_FILES['spirit_label_img']['name']));
				$ext=explode('.',$_FILES['Ar_image']['name']);
									 
									$thumb->new_width=104;
									$thumb->new_height=77;
									$thumb->newfilename=$new_name[2]; 
									$thumb->source_path=$upload_dir;
									$thumb->destination_path="../article_image/";
									$thumb->ext=$ext[1];
									$thumb->createThumbImage($thumb->new_width,$thumb->new_height,$thumb->newfilename,$thumb->source_path,$thumb->destination_path,$thumb->ext);
									
				$Image_Path2=$uploaded_file.".".$ext[1];
			
		$ob_admin->InsertArticle($_POST['Title'],$_POST['editor1'],$Image_Path2);
		//echo "The=>".$result;exit;
		$s="success";
		$s=base64_encode($s);
		header('location:welcome.php?str='.$s);
     
		}
		
		
	?>

<?php include("a_header.php");?>
<!-- Container -->
<div id="container">
  <div class="shell">
    <!-- Small Nav -->
    <!--<div class="small-nav"> <a href="#">Dashboard</a> <span>&gt;</span> Current Articles </div>-->
    <!-- End Small Nav -->
    <!-- Message OK -->
    <!--<div class="msg msg-ok">
      <p><strong>Your file was uploaded succesifully!</strong></p>
      <a href="#" class="close">close</a> </div>-->
    <!-- End Message OK -->
    <!-- Message Error -->
    <!--<div class="msg msg-error">
      <p><strong>You must select a file to upload first!</strong></p>
      <a href="#" class="close">close</a> </div>-->
    <!-- End Message Error -->
    <br />
    <!-- Main -->
    <div id="main">
      <div class="cl">&nbsp;</div>
      <!-- Content -->
      <div id="content">
        <!-- Box -->
        
        <!-- End Box -->
        <!-- Box -->
       <div class="box">
          <!-- Box Head -->
          <div class="box-head">
            <h2>Add New Article</h2>
          </div>
          <!-- End Box Head--> 
          <form action="#" method="post" name="form1" id="form1" enctype="multipart/form-data">
		<p>
        <br/>
           &nbsp;&nbsp;&nbsp; ADD TITLE: <textarea cols="50" id="Title" name="Title" rows="2"></textarea><br/><br/><br/>
           &nbsp;&nbsp;&nbsp; ADD IMAGE: <input type="file" name="Ar_image" id="Ar_image" size="20" style="background-color:#CCC;"/><br/><br/><br/>
			
			&nbsp;&nbsp;&nbsp;ADD ARTICLE:<br/> </br><textarea cols="80" id="editor1" name="editor1" rows="10"></textarea>
            <script type="text/javascript">
			//<![CDATA[

				
				CKEDITOR.replace( 'editor1',
	            {
		            uiColor: '#BA4C32'
	             });
				
								/*CKEDITOR.replace( 'editor1',
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
						
					});	*/

			//]]>
			</script>
			
		</p>
		
			<!--<input type="button"  value="Submit" name="Submit1" onclick="javascript:validation();" />--></br>
            <a href="#" onclick="javascript:validation();"><img src="image/submitButton.png" width="103" height="42" style="margin-left:310px;"/></a>
		
	</form>
   
   
        </div>
        <!-- End Box -->
      </div>
      <!-- End Content -->
      <!-- Sidebar -->
      <div id="sidebar">
        <!-- Box -->
        <div class="box">
          <!-- Box Head -->
          <div class="box-head">
            <h2>Management</h2>
          </div>
          <!-- End Box Head-->
          <div class="box-content"> <a href="welcome.php" class="add-button"><span>Back To Dash-Board</span></a>
            <div class="cl">&nbsp;</div>
            <!--<p class="select-all">
              <input type="checkbox" class="checkbox" />
              <label>select all</label>
            </p>-->
            <!--<p><a href="#">Delete Selected</a></p>-->
            <!-- Sort -->
            <div class="sort">
              <label>IMAGE OF ADMIN </label></br></br>
              <!--<select class="field">
                <option value="">Title</option>
              </select>
              <select class="field">
                <option value="">Date</option>
              </select>
              <select class="field">
                <option value="">Author</option>
              </select>-->
              <img src="../images/PhotoFunia-3cc34c.jpg" height="330" width="203"/>
            </div>
            <!-- End Sort -->
          </div>
        </div>
        <!-- End Box -->
      </div>
      <!-- End Sidebar -->
      <div class="cl">&nbsp;</div>
    </div>
    <!-- Main -->
  </div>
</div>
<!-- End Container -->
<!-- Footer -->
<!--<div id="footer">
  <div class="shell"> <span class="left">&copy; 2010 - CompanyName</span> <span class="right"> Design by <a href="http://chocotemplates.com">Chocotemplates.com</a> </span> </div>
</div>-->
<?php include("a_footer.php");?>
<!-- End Footer -->
</body>
</html>
