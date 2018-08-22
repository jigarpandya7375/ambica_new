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
	<title>Soham-Mail Send</title>
	
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
function validate()
{
	if(document.getElementById('another-simple-input').value=='')
	{
		document.getElementById('another-simple-input').focus();
		alert('Please Insert Mail-ID');
		return false;
	}	
	
		if(document.getElementById('subject').value=='')
	{
		document.getElementById('subject').focus();
		alert('Please Insert Mail Subject');
		return false;
	}	
	
	
	
	document.forms["form"].submit();
}

function mail_content(name)
{
	//alert(name+id);
	window.location.href='mail_send1.php?name='+name;
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
          
			<?php include('include/side_menu.php');?> <!-- end side-menu -->
			
			<div class="side-content fr">
            
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">E-Mail Send</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf">
				
											    
							 <div class="confirmation-box round">E-Mail Send Successfully To All Addresses....</div>
                             
                             <?php
         //print_r($_POST);
		 $mail=explode(",",$_POST['title']);
		 
		
		 
		  foreach ($mail as $to) 
			{
			 $from = "Sohamtech.com";
			 $subject = $_POST['subject']; 
			   
		     $email_message="<table width='698' cellspacing='0' cellpadding='0' border='0' align='center' style='border:1px solid #ccc;padding-top:10px'>
				<tbody>
				<tr>
				<td width='700'>
				<table width='700' cellspacing='0' cellpadding='0' border='0'>
				<tbody>
				<tr>
				<td width='200' height='40' align='left'>
				<a target='_blank' href='http://www.sohtemtek.6te.net'><img width='250' height='70' border='0' style='display:block;padding-left:10px' src='http://sohamtek.6te.net/admin/images/logo.png' alt='Sohamtech.com'></a></td>
				<td align='right' style='font:12px Arial,Helvetica,sans-serif;color:#444;padding-right:10px'>
				<br>
				Email Us: <a target='_blank' href='mailto:bhaskarraval@yahoo.com'>bhaskarraval@yahoo.com</a></td>
				</tr>
				</tbody>
				</table>
				</td>
				</tr>
				<tr>
				<td>
				<table width='692' cellspacing='0' cellpadding='0' border='0' align='center'>
				<tbody>
				<tr>
				<td width='391' align='right' style='font:12px Arial,Helvetica,sans-serif'>&nbsp;
				</td>
				
				</tr>
				</tbody>
				</table>
				</td>
				</tr>
				<tr>
				<td>
				<a target='_blank' href='http://www.sohamtek.6te.net'><img width='698' height='187' border='0' style='display:block' src='http://sohamtek.6te.net/admin/images/header.jpg' alt='Sohamtech.com'/></a></td>
				</tr>
				
				<tr>
				<td>
				<img width='698' height='27' border='0' style='display:block' src='http://sohamtek.6te.net/admin/images/01102012-sleep-hdr-btm.jpg' alt='Sohamtech.com'></td>
				</tr>
				<tr>
				<td height='15'>&nbsp;
				</td>
				</tr>
				<tr>
				<td>
				<table width='698' cellspacing='0' cellpadding='0' border='0'>
				<tbody>
				<tr>
				<center>".$_POST['editor1']."</center>
				
				</tr>
				</tbody>
				</table>
				</td>
				</tr>
				<tr>
				<td height='15'>&nbsp;
				</td>
				</tr>
				<tr>
				<td>
				
				</td>
				</tr>
				
				<tr>
				<td height='5'>&nbsp;
				</td>
				</tr>
				<tr bgcolor='#eeeeee' align='center'>
				<td>
				<table width='0' cellspacing='0' cellpadding='0' border='0'>
				<tbody>
				<tr>
				<td width='636'>
				<table width='633' cellspacing='0' cellpadding='0' border='0' align='center' style='border-top:#666666 solid 2px'>
				<tbody>
				<tr>
				<td width='280'>&nbsp;
				</td>
				<td width='353'>&nbsp;
				</td>
				</tr>
				<tr>
				<td>
				<table width='200' cellspacing='0' cellpadding='0' border='0' style='border-bottom:#ccc solid 1px'>
				<tbody>
				<tr>
				<td style='padding:10px 10px 10px 0;border-right:#ccc solid 1px'>
				<a target='_blank' href='https://www.facebook.com/SohamTechnologies'><img width='102' height='26' border='0' style='display:block' src='http://sohamtek.6te.net/admin/images/010612_facebook.jpg' alt='fabebook'></a></td>
				<td style='padding:10px 10px'>
				<a target='_blank' href='https://twitter.com/SohamTechnolog'><img width='95' height='26' border='0' style='display:block' src='http://sohamtek.6te.net/admin/images/010612_twitter.jpg' alt='twitter'></a></td>
				</tr>
				</tbody>
				</table>
				</td>
				<td width='353' style='font-size:10px;color:#333;text-align:right'>
				Copyright &copy; 2013 Sohamtech.com &reg; All rights reserved.<br>
				</td>
				</tr>
				<tr>
				<td>&nbsp;
				</td>
				<td>&nbsp;
				</td>
				</tr>
				</tbody>
				</table>
				</td>
				</tr>
				</tbody>
				</table>
				</td>
				</tr>
				</tbody>
				</table>";

                $headers  = "From: $from\r\n";
				$headers .= "Content-type: text/html\r\n";
			   //echo $email_message;exit;
				//options to send to cc+bcc
				//$headers .= "Cc: [email]maa@p-i-s.cXom[/email]";
				//$headers .= "Bcc: [email]email@maaking.cXom[/email]";
				
				// now lets send the email.
				
		   
				//echo $to."<br/>";
			 mail($to, $subject, $email_message, $headers);			 
			}
			
			
?>
                           
						
						</div> <!-- end half-size-column -->
						
						
				
					</div> <!-- end content-module-main -->
					
				</div> <!-- end content-module -->
	
				
				
		
			</div> <!-- end side-content -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
    <?php include('include/footer.php');?>
	 <!-- end footer -->

</body>
</html>