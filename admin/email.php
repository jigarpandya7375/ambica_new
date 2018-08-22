<?php
//print_r($_POST);exit;

             $to = $_POST['title'];
			 $from = "Sohamtech.net";
			 $subject = $_POST['subject']; 
			   
		     $email_message="<table width='698' cellspacing='0' cellpadding='0' border='0' align='center' style='border:1px solid #ccc;padding-top:10px'>
				<tbody>
				<tr>
				<td width='700'>
				<table width='700' cellspacing='0' cellpadding='0' border='0'>
				<tbody>
				<tr>
				<td width='200' height='40' align='left'>
				<a target='_blank' href='http://www.sohamtech.net'><img width='250' height='70' border='0' style='display:block;padding-left:10px' src='http://sohamtech.net/admin/images/logo.png' alt='Sohamtech.com'></a></td>
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
				<a target='_blank' href='http://www.sohamtech.net'><img width='698' height='187' border='0' style='display:block' src='http://sohamtech.net/admin/images/header.jpg' alt='Sohamtech.net'/></a></td>
				</tr>
				
				<tr>
				<td>
				<img width='698' height='27' border='0' style='display:block' src='http://sohamtech.net/admin/images/01102012-sleep-hdr-btm.jpg' alt='Sohamtech.net'></td>
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
				<a target='_blank' href='https://www.facebook.com/SohamTechnologies'><img width='102' height='26' border='0' style='display:block' src='http://sohamtech.net/admin/images/010612_facebook.jpg' alt='fabebook'></a></td>
				<td style='padding:10px 10px'>
				<a target='_blank' href='https://twitter.com/SohamTechnolog'><img width='95' height='26' border='0' style='display:block' src='http://sohamtech.net/admin/images/010612_twitter.jpg' alt='twitter'></a></td>
				</tr>
				</tbody>
				</table>
				</td>
				<td width='353' style='font-size:10px;color:#333;text-align:right'>
				Copyright &copy; 2013 Sohamtech.net &reg; All rights reserved.<br>
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
			if(mail($to, $subject, $email_message, $headers))
			{
				header('location:message.php?res='.base64_encode("success"));
			}
			else
			{
				 header('location:message.php?res='.base64_encode("fail"));
			}
?>