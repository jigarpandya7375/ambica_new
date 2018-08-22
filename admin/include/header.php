<link  href="<?php echo $SITE_PATH;?>assets/images/small_logo.png" rel="shortcut icon" />


<?php





			   //echo "select * from ".$SUFFIX."admin where id='".$_SESSION['u_id']."'" ;


			   $sql=mysql_query("select * from ".$SUFFIX."admin where id='".$_SESSION['u_id']."'");


			   $res=mysql_fetch_array($sql);


			   $rites=$res['rites'];


			   


			  


               


?>


<div id="top-bar">


<div class="page-full-width cf">





			<ul id="nav" class="fl">


	


				<li class="v-sep"><a href="http://ambicacaterers.in"  target="_blank"  class="round button dark ic-left-arrow image-left">Go to website</a></li>


				<li class="v-sep"><a href="#" class="round button dark menu-user image-left">Welcome <strong><?php echo $_SESSION['u_name'];?></strong></a>


					<ul>


						<!--<li><a href="#">My Profile</a></li>


						<li><a href="#">User Settings</a></li>-->


                       


						<li><a href="change_password.php">Change Admin Password</a></li>


                       


						<!--<li><a href="logout.php">Log out</a></li>-->


					</ul> 


				</li>


			    <?php


				$sql="select * from ".$SUFFIX."message where mess_status='UNREAD'";


				$res=mysql_query($sql);


				$no=mysql_num_rows($res);


                ?>


				<li><a href="message.php" class="round button dark menu-email-special image-left"><?php echo $no;?> new messages</a></li>


				<li><a href="logout.php" class="round button dark menu-logoff image-left">Log out</a></li>


				


			</ul> <!-- end nav -->





			<div style="float:right;">	


			<img src="images/ambica.gif" height="46" width="50"/>


            </div>





		</div> <!-- end full-width -->	


        


   </div>