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

if(isset($_POST['new_admin']) || isset($_POST['edit_admin']))
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
	  else
	  {
		
		 //print_r($_POST);
	     $rite_string=$_REQUEST['Dashboard'].$_REQUEST['rites'].$_REQUEST['photo'].$_REQUEST['menu'].$_REQUEST['Message'].$_REQUEST['mail'].$_REQUEST['cmail'].$_REQUEST['rss'];
	   
		 
	       $sql="update ".$SUFFIX."admin set email='".$_REQUEST['email']."',password='".base64_encode($_REQUEST['pass'])."',rites='".$rite_string."',last_updated='".date('Y-m-d H:i:s')."' where id='".$_REQUEST['id']."'";
			$res=mysql_query($sql);
			unset($_SESSION['captcha']);
			if($res=='1')
			{
				header('location:admin_user.php?res='.base64_encode('success'));
			}
		
	  }
	}
	

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Manage Admin</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/logo_small.png"/>
	<link rel="stylesheet" href="css/pagination.css" media="all" />
    <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
	<!-- Optimize for mobile devices -->	
	<!-- jQuery & JS files -->
	<script src="js/jquery.min.js"></script>
	<script src="js/script.js"></script>  
    <script src="js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8">
	</script>
	<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
	</script>
     <script>
		jQuery(document).ready(function(){
			jQuery("#form_admin").validationEngine('attach', {bindMethod:"live"});
		});
	</script>
    

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
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Edit Admin User</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf">
				            <?php
							if(isset($_REQUEST['id']))
							{
								$sql=mysql_query("select * from ".$SUFFIX."admin where id='".$_GET['id']."'");
								$data=mysql_fetch_array($sql);
							}
                            ?>
							 <?php echo "<p class='message'>" .$error. "</p>" ; ?>			    
							
                           <form  method="post" name="form_admin" id="form_admin" enctype="multipart/form-data">
							
								<fieldset>
								
	
									<p>
										<label for="another-simple-input">Admin-Name</label>
	     <input type="text" id="name"  value="<?php echo $data['username'];?>"  name="name" class="round default-width-input  <?php if(isset($code) && $code == 1 || $code == 8){?>error<?php }?> validate[required] text-input" readonly/>
										<em>Admin User Name</em>								
									</p>
                                    
                                    <p>
										<label for="another-simple-input">Admin Mail ID</label>
										<input type="text" id="email" value="<?php echo $data['email'];?>" name="email" class="round default-width-input <?php if(isset($code) && $code == 2 ){?>error<?php }?> validate[required,custom[email]] text-input"/>
										<em>Admin Mail Id</em>								
									</p>
                                    
                                    <p>
										<label for="another-simple-input">Password</label>
										<input type="password" id="pass" value="<?php echo base64_decode($data['password']);?>" name="pass" class="round default-width-input <?php if(isset($code) && $code == 3  || $code == 5){?>error<?php }?> validate[required] text-input"/>
										<em>Enter Password</em>								
									</p>
                                    
									<p>
										<label for="another-simple-input">Retype-Password</label>
										<input type="password" id="re_pass" value="<?php echo base64_decode($data['password']);?>" name="re_type" class="round default-width-input <?php if(isset($code) && $code == 4 || $code == 5){?>error<?php }?> validate[required,equals[pass]] text-input"/>
										<em>Enter password Again</font></em>								
									</em>
                                    
                                    
                                    </p>
                                    <p>
                                    <h1><font color="#0000FF">ASSIGN MENU RITES</font></h1>
                                      <?php $rites=$data['rites'];?>
                                      
                                      <em>Dashboard:</em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="Dashboard" value="1" <?php if($rites[0]=='1'){?> checked="checked"<?php }?> id="Dashboard"/>Yes &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"  name="Dashboard"  <?php if($rites[0]=='0'){?> checked="checked"<?php }?> value="0" id="Dashboard"/>No</br></br>
                                    
										
                                     <em>Manage Rites:</em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="rites" value="1" <?php if($rites[1]=='1'){?> checked="checked"<?php }?> id="rites"/>Yes &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"  name="rites"  <?php if($rites[1]=='0'){?> checked="checked"<?php }?> value="0" id="rites"/>No</br></br>
                                    
                                    <em>Manage Photo Gallery:</em>&nbsp;&nbsp;&nbsp;<input type="radio" name="photo" value="1" <?php if($rites[2]=='1'){?> checked="checked"<?php }?> id="photo"/>Yes &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" <?php if($rites[2]=='0'){?> checked="checked"<?php }?> name="photo" value="0" id="message"/>No</br></br>
                                     
                                    <em>Manage menu:</em>&nbsp;&nbsp;&nbsp;<input type="radio" name="menu" value="1" <?php if($rites[3]=='1'){?> checked="checked"<?php }?> id="menu"/>Yes &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" <?php if($rites[3]=='0'){?> checked="checked"<?php }?> name="menu" value="0" id="menu"/>No</br></br>
                                       
                                    <em>Manage Message:</em>&nbsp;&nbsp;&nbsp;<input type="radio" name="Message" value="1" <?php if($rites[4]=='1'){?> checked="checked"<?php }?> id="Message"/>Yes &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" <?php if($rites[4]=='0'){?> checked="checked"<?php }?> name="Message" value="0" id="Message"/>No</br></br>
                                    
                                             
                                      <em>Mail Management:</em>&nbsp;&nbsp;&nbsp;<input type="radio" name="mail" value="1" <?php if($rites[5]=='1'){?> checked="checked"<?php }?> id="mail"/>Yes &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="mail" <?php if($rites[5]=='0'){?> checked="checked"<?php }?> value="0" id="mail"/>No</br></br>
                                               
                                       <em>Check Your Mail:</em>&nbsp;&nbsp;&nbsp;<input type="radio" name="cmail" value="1" <?php if($rites[6]=='1'){?> checked="checked"<?php }?> id="cmail"/>Yes &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" <?php if($rites[6]=='0'){?> checked="checked"<?php }?> name="cmail" value="0" id="cmail"/>No</br></br>
                                       
                                        <em>Manage RSS:</em>&nbsp;&nbsp;&nbsp;<input type="radio" name="rss" value="1" <?php if($rites[7]=='1'){?> checked="checked"<?php }?> id="rss"/>Yes &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" <?php if($rites[7]=='0'){?> checked="checked"<?php }?> name="rss" value="0" id="rss"/>No</br></br>
                                    
                                    </p>
                                    
                                   <p>
                                    <img src="captcha.php" id="captcha" /><br/>
                                    <a href="javascript:void(0);" onClick="
                                        document.getElementById('captcha').src='captcha.php?'+Math.random();
                                        document.getElementById('captcha-form').focus();"
                                        id="change-image">Not readable? Change text.</a><br/><br/>
                                        <b>Type The Word Diplay in Image</b><br/>
                                        <input type="text" name="captcha" value="<?php if(isset($captcha)){echo $captcha;}?>" id="captcha-form" class="round default-width-input <?php if(isset($code) && $code == 6 || $code == 7){?>error<?php }?> validate[required] text-input" /><br/>
                                   </p>
                                    
                                   
                                    <div class="stripe-separator"><!--  --></div>
                                   
                                    <input type="submit" name="edit_admin" id="edit_admin" class="button round blue image-right ic-add text-upper" value="Edit Admin"/>
                                    <input type="hidden" name="id" id="id"  value="<?php echo $_REQUEST['id'];?>"/>
                                   
                                    	
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