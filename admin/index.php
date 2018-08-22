<?php


session_start();


error_reporting(0);


ob_start();


include('../classess/connection.php');


include('../classess/function.php');





if(isset($_SESSION['u_name']))


{


	header('location:welcome.php');


}


if(isset($_POST['b_submit']))


{


$name=trim($_POST["username"]);


$password=trim($_POST["password"]);








if($name == "" ) {


$error= "Please enter Username..!!";


$code= "1" ;


}


elseif($password == "" ) {


$error= "Please enter password..!!";


$code= "2";


}


else


{


	


$pass=base64_encode($password);


if($_POST['username']!='' && $_POST['password']!='')


{


	$user = check_input($_POST['username']);


    $pwd = check_input($_POST['password']);


    $sql="select * from ".$SUFFIX."admin where username='".$user."' and password='".base64_encode($pwd)."'";


	$res=mysql_query($sql);


	if(mysql_num_rows($res)>0)


	{


		


			$row=mysql_fetch_array($res);


			


			if($_POST['remember']=='1')


			{


				setcookie("username", $row[1], time()+3600);  


				$_SESSION['u_name']=$row[1];


				$_SESSION['u_id']=$row[1];


				header('location:home.php');


				


			}


			else


			{


			    $_SESSION['u_name']=$row[1];


				 $_SESSION['u_id']=$row[0];


				header('location:home.php');


			}


			


			mysql_query("update ".$SUFFIX."admin set last_logged='".date('Y-m-d H:i:s')."' where id='".$row[0]."'");


	}


	else


	{


		$error= "Wrong Username Or Passowrd...Try Again...!!!";


        $code= "3";


	}


}





//final code will execute here.


}





}


?>


<!DOCTYPE html>


<html lang="en">


<head>


	<meta charset="utf-8">


	<title>&nbsp;Ambicacaterers | Admin | Login</title>


	


	<!-- Stylesheets -->


	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>


	<link rel="stylesheet" href="css/style.css">


    <link rel="shortcut icon" href="../images/icon.png"/>


	<!-- Optimize for mobile devices -->


	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>  


    <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>


    <noscript><meta http-equiv="refresh" content="1;url=Error_page.php?d=java"></noscript>


    <script type="text/javascript" language="javascript" src="js/jquery.js"></script>


    <script src="js/jquery.min.js"></script>


    <script src="js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>


	<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>


    <script type="text/javascript" language="javascript" src="../classess/right_click_disable.js"></script>


   <script>


		jQuery(document).ready(function(){


			jQuery("#login-form").validationEngine('attach', {bindMethod:"live"});


		});


	</script>


	


    <style>


	.error 


	{


	  border:1px solid #DB4A39 !Important;


	}


	.message 


	{


	color: #DB4A39;	


	font-size:12px;


	}


	</style>


</head>


<body onkeypress="return disableCtrlKeyCombination(event);" onkeydown="return disableCtrlKeyCombination(event);">





	<!-- TOP BAR -->


	<div id="top-bar">


		


		<div class="page-full-width">


		


			<a href="javascript:void(0);"  target="_blank" class="round button dark ic-left-arrow image-left ">Return to website</a>





		</div> <!-- end full-width -->	


	


	</div> <!-- end top-bar -->


	


	


	


	<!-- HEADER -->


	<div id="header">


		


		<div class="page-full-width cf">


	


			<div id="login-intro" class="fl">


			


				<h1>Admin Login</h1>


				<h5>Ambica caterers's | Admin Login </h5>


			    


			</div> <!-- login-intro -->


			


				<img class="fr" src="<?php echo $SITE_PATH;?>assets/images/logo.png" alt="Ambicacaterers.in" height="60" width="200" />


		</div> <!-- end full-width -->	





	</div> <!-- end header -->


	


	


	


	<!-- MAIN CONTENT -->


	<div id="content">


	   <div style="float:left;margin:-50px 0 0 120px;">   	<img class="fr" src="images/vector.png" height="350"/></div>


		<form method="POST" id="login-form" name="login-form" >


		


			<fieldset>





				<p>


					<label for="login-username">username</label>


					<input type="text" name="username" id="username" class="round full-width-input <?php if(isset($code) && $code == 1){echo "error" ;} ?> validate[required] text-input" value="<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username'];}else{if(isset($name)){echo $name;}}?>"  autocomplete="off"/>


				</p>





				<p>


					<label for="login-password">password</label>


					<input type="password" id="password" name="password" value="<?php if(isset($password)){echo $password;} ?>" class="round full-width-input <?php if(isset($code) && $code == 2){echo "error" ;} ?> validate[required] text-input" autocomplete="off" />


				</p>


				


				<p><input type="checkbox" name="remember" value="1" id="remember">Remember Me With Only Username..</p>


				


				<!--<a href="javascript:void(0);" class="button round blue image-right ic-right-arrow" onKeyDown="var e=(event)?event.keyCode:window.event.keyCode;if(e=='13'){}" onClick="javascript:login();">LOG IN</a>


                


-->


            <input type="submit" id="b_submit" name="b_submit" class="button round blue image-right ic-right-arrow" value="Login"/>


			</fieldset>





		<br/><div class="information-box round" id="error"><center><?php if(isset($_POST['b_submit'])){?><?php echo "<font class='message'>".$error;"</font>"?><?php }else


		{?>IP Logged:<?php echo $_SERVER['REMOTE_ADDR'];}?></center></div>      





		</form>


		


	</div> <!-- end content -->	


	<!-- FOOTER -->


	<div id="footer">


		<p>&copy; Copyright 2013 <a href="javascript:void(0);">Ambicacaterers</a>&nbsp;&nbsp;All rights reserved.</p>


		<p><strong>Design &</strong> Develop  by Jigar Pandya</p>


        <p><a href="java_enable.php" onClick="window.open('java_enable.php','popup','width=600,height=300,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=50,top=0');  return false">Steps to enable JavaScript in Internet Explorer versions (6.0,7.0,8.0),Mozilla Firefox3.0, Google Chrome2.0</a></p>


	


	</div> <!-- end footer -->





</body>


</html>