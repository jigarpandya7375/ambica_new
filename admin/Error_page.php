<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="imagetoolbar" content="no" />
  <link rel="icon" type="image/x-icon" href="/images/favicon.ico" />
  <link rel="shortcut icon" type="image/x-icon" href="images/icon.png" />
  <meta name="robots" content="noindex,nofollow" />
  <title>JavaScript Enable Error |  404</title>

		<style>
		body {background: #f9fee8;margin: 0; padding: 20px; text-align:center; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#666666;}
		.error_page {width: 600px; padding: 50px; margin: auto;}
		.error_page h1 {margin: 20px 0 0;}
		.error_page p {margin: 10px 0; padding: 0;}		
		a {color: #9caa6d; text-decoration:none;}
		a:hover {color: #9caa6d; text-decoration:underline;}
		</style>

</head>

<body class="login">
  <div class="error_page">
    <img alt="Kidmondo_face_sad" src="images/kidmondo_face_sad.gif" />
    <?php 
	error_reporting(0);
	if($_GET['d']=='java')
	{
	?>
    <h1>We're sorry...</h1>
    <h4><p><font color="#FF0000">&quot;Please Enable Javascript in Your Browser to access Indian Recipe's Admin panel&quot;</font></p></h4>

    <p><a href="java_enable.php" onclick="window.open('java_enable.php','popup','width=800,height=700,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=50,top=0');  return false">Steps to enable JavaScript in Internet Explorer versions (6.0,7.0,8.0),Mozilla Firefox3.0, Google Chrome2.0</a></p>
    
    <?php
	}
	else
	{?>
    <h1>We're sorry...404 Page is not Found</h1>
    <p>The page or Recipe you are looking  cannot be found...page....</p>
    <?php
	}?>
  </div>
</body>
</html>