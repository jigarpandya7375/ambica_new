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
//echo getcwd();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin Panel | Home </title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/logo_small.png"/>
	<link rel="stylesheet" href="css/home_screen.css"/>
	<!-- Optimize for mobile devices -->	
	<!-- jQuery & JS files -->

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
        <?php //include('include/side_menu.php');?>

			 <!-- end side-menu -->
              <center><font   style="font-size:70px;color:#666;text-shadow: 5px 5px 0px #eee, 7px 7px 0px #707070;"><b>Welcome To Admin Panel</b></font></center><Br/><Br/><Br/><Br/>
               <div style="float:left;margin:-60px 0 0 200px;">   	<img class="fr" src="images/vector.png" height="350"/></div>
             <ul class="starbursts" >
	<!--<li>
		<a href="#" class="starburst1"><span><br />Go<br />To <br/>Dashboard</span></a>
	</li>
    
    <li>
		<a href="#" class="starburst1"><span><br />Manage<br />Admin<br />Rites!</span></a>
	</li>
    
	<li>
		<a href="#" class="starburst2"><span><span><span><br />Manage<br />Photo Gallery</span></span></span></a>
	</li>
	<li>
		<a href="#" class="starburst3"><span><span><span><span><span><span><span><span><br />Manage<br/>All<br />Menu</span></span></span></span></span></span></span></span></a>
	</li>
	<li>
		<a href="#" class="starburst4"><span><span><span><span><br />Manage<br/>All<br />Message!</span></span></span></span></a>
	</li>
	<li>
		<a href="#" class="starburst5"><span><span><span><span><span><span><span><br />Manage<br />All<br />Newsletter</span></span></span></span></span></span></span></a>
	</li>
	<li>
		<a href="#" class="starburst6"><span><span><span><span>Check<br/>Your<br />Mail!</span></span></span></span></a>
	</li>-->
    
	<li>
		<a href="welcome.php" class="starburst7"><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span>Go To <br />Admin Panel!</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></a>
	</li>
</ul>
			  <!--<img src="images/welcome.jpg" height="300px" style="border-radius:20px;" width="100%"/>-->
              
              
			<div class="side-content fr">
          
                <!--content Type 2 start-->
               
       
               
		        
                
                <div class="half-size-column fr">

				 <!-- end content-module -->

			</div>
          
                
              

			</div> <!-- end side-content -->
		  
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
    <?php include('include/footer.php');?>
	 <!-- end footer -->
</div>
</body>
</html>