<?php
ob_start();
session_start();
error_reporting(0);
require_once('../classess/connection.php');

if(!isset($_SESSION['u_name']))
{
	header('location:index.php');
}

if(isset($_POST['new_admin']))
{
	
$name=trim($_POST["name"]);
$email=trim($_POST["email"]);
$pass=trim($_POST["pass"]);
$re_pass=trim($_POST["re_type"]);
$captcha=trim($_POST["captcha"]);


if($name == "" ) 
{
$error= "error : You did not enter a name.";
$code= "1" ;
}
elseif($email == "" ) {
$error= "error : You did not enter a email.";
$code= "2";
} //check for valid email
elseif(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {
$error= 'error : You did not enter a valid email.';
$code= "2";
}
elseif($pass == "" ) 
{
$error= "Please Enter A Password..!!!.";
$code= "3" ;
}
elseif($re_pass == "" ) 
{
$error= "Please Type Same Password Again..!!!.";
$code= "4" ;
}
elseif($pass!=$re_pass ) 
{
$error= "Do Not match Both Password..!!!.";
$code= "5" ;
}
elseif($captcha=="") 
{ 
	$error= "Please Enter The Text Display In Image...!!!";
    $code= "6" ;
}

elseif (!empty($captcha)) 
{
  if (empty($_SESSION['captcha']) || trim(strtolower($_REQUEST['captcha'])) != $_SESSION['captcha']) 
  {
	$error= "Wrong Text Input Please Try Again..!!!";
    $code= "7" ;
  }
}
else
{
	echo "successfully admin Created...!!!"
}



}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Soham-Change Admin Password</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
     <link rel="shortcut icon" href="images/logo_small.png"/>
	<link rel="stylesheet" href="css/pagination.css" media="all" />
	<!-- Optimize for mobile devices -->	
	<!-- jQuery & JS files -->
	<script src="js/jquery.min.js"></script>
	<script src="js/script.js"></script>     
   
		<style>
        .error {
            border:1px solid #DB4A39 !Important;
        }
        .message {
            color: #DB4A39;
            font-weight:bold;
        }
        </style>

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
				
                    
                    </p>
					<div class="content-module-heading cf">
					
						<h3 class="fl">Change Passowrd</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					 <p>
                    <?php
					if($_GET['res']=='succ')
					{
					?>
                    <div class="confirmation-box round">Your Password Will Be Changed  Successfully....</div>
							
							
                    <?php
					}
					if($_GET['res']=='fail')
					{
                    ?>
                    <div class="error-box round">Some Technical Error Found To Perform These Task...Please Enter a Valid Old Password...!!!!</div>
					<?php
					}
					?>
                   
					<div class="content-module-main cf">
				 <?php echo "<p class='message'>" .$error. "</p>" ; ?>
						<div class="half-size-column fl">						    
							<form action="#" method="post" name="form" id="form" enctype="multipart/form-data">
							
								<fieldset>
								
	
									<p>
										<label for="another-simple-input">Admin-Name</label>
	     <input type="text" id="name"  value="<?php if(isset($name)){echo $name;} ?>"  name="name" class="round default-width-input  <?php if(isset($code) && $code == 1){?>error<?php }?>"/>
										<em>Admin User Name</em>								
									</p>
                                    
                                    <p>
										<label for="another-simple-input">Admin Mail ID</label>
										<input type="text" id="email" value="<?php if(isset($email)){echo $email; }?>" name="email" class="round default-width-input <?php if(isset($code) && $code == 2){?>error<?php }?>"/>
										<em>Admin Mail Id</em>								
									</p>
                                    
                                    <p>
										<label for="another-simple-input">Password</label>
										<input type="text" id="pass" value="<?php if(isset($pass)){echo $pass; }?>" name="pass" class="round default-width-input <?php if(isset($code) && $code == 3  || $code == 5){?>error<?php }?>"/>
										<em>Enter Password</em>								
									</p>
                                    
									<p>
										<label for="another-simple-input">Retype-Password</label>
										<input type="text" id="re_pass" value="<?php if(isset($re_pass)){echo $re_pass;}?>" name="re_type" class="round default-width-input <?php if(isset($code) && $code == 4 || $code == 5){?>error<?php }?>"/>
										<em>Enter password Again</font></em>								
									</p>
                                    
                                   <p>
                                    <img src="captcha.php" id="captcha" /><br/>
                                    <a href="javascript:void(0);" onclick="
                                        document.getElementById('captcha').src='captcha.php?'+Math.random();
                                        document.getElementById('captcha-form').focus();"
                                        id="change-image">Not readable? Change text.</a><br/><br/>
                                        <b>Type The Word Diplay in Image</b><br/>
                                        <input type="text" name="captcha" value="<?php if(isset($captcha)){echo $captcha;}?>" id="captcha-form" class="round default-width-input <?php if(isset($code) && $code == 6 || $code == 7){?>error<?php }?>" /><br/>
                                   </p>
                                    
                                   
                                    <div class="stripe-separator"><!--  --></div>
                                   <center> <input type="submit" name="new_admin" id="new_admin" class="button round blue image-right ic-add text-upper" value="Add New Admin"/></center>
                                    
                                    <div class="stripe-separator"><!--  --></div>
								</fieldset>
							
							</form>
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