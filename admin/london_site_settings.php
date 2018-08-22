<?php include_once 'includes/configure.php'; 
if($_SESSION['lang']=='en')
{
	include 'includes/lang_en.php';	
}
elseif($_SESSION['lang']=="sp")
{
	include 'includes/lang_sp.php';	
}
elseif($_SESSION['lang']=="fr")
{
	include 'includes/lang_fr.php';
}
elseif($_SESSION['lang']=="it")
{
	include 'includes/lang_it.php';
}

$sql1=mysql_query("select * from ".PREFIX."agent where agent_id='".$_SESSION['agent_id']."'");
$res1=mysql_fetch_array($sql1);

if($_POST['btnadd']==APPLY_SETTINGS)
	{
	  // print_r($_POST);
	   $ope=$_POST['opcity'];
	   $opacity="0.".$ope;
	   $package_id=$_REQUEST['package_display'];
	   $round_corner=$_REQUEST['left_top_rad']."px ".$_REQUEST['right_top_rad']."px ".$_REQUEST['right_bot_rad']."px ".$_REQUEST['left_bot_rad']."px ";
	   $texture_color=$_REQUEST['texture_color'];
	   $package_store=serialize($package_id);		  
	   if($_FILES['image']['name'])
	   {
	     if($_POST['previous']!='')
		 {
				  if(file_exists(HEADER_IMAGE_PATH.$_POST['previous']))
				  {
					unlink(HEADER_IMAGE_PATH.$_POST['previous']);
				  }
		 }
		$web_file=rand(0,100000).$_FILES['image']['name'];
		$temp_name=$_FILES['image']['tmp_name'];
		$target=HEADER_IMAGE_PATH.$web_file;
		copy($temp_name,$target);	
		}
		else
		{
		   $web_file.=$res1['header_image'];		
		}	
		
		
	   if($_FILES['back_image']['name'])
	   {
	     if($_POST['previous_image']!='')
		 {
				  if(file_exists(HEADER_IMAGE_PATH.$_POST['previous_image']))
				  {
					unlink(HEADER_IMAGE_PATH.$_POST['previous_image']);
				  }
		 }
		$back_image=rand(0,100000).$_FILES['back_image']['name'];
		$temp_name_image=$_FILES['back_image']['tmp_name'];
		$target_file=HEADER_IMAGE_PATH.$back_image;
		copy($temp_name_image,$target_file);	
		}
		else
		{
		   $back_image.=$res1['back_image'];		
		}	
		
		
	    $sql=mysql_query("update ".PREFIX."agent set body_font_color='".trim($_POST['fontcolor'])."',header_image='$web_file',backgound_color='".trim($_POST['bgcolor'])."',
		header_width='".trim($_POST['width'])."',header_margin='".trim($_POST['margin'])."',header_text_align='".trim($_POST['text-align'])."',header_padding='".trim($_POST['padding'])."',header_opecity='".trim($opacity)."',header_color='".trim($_POST['color'])."',header_backgound='".trim($_POST['headerbg'])."',menu_back_color='".trim($_POST['menucolor'])."',menu_font_color='".trim($_POST['menufontcolor'])."',footer_bg_color='".trim($_POST['footercolor'])."',footer_font_color='".trim($_POST['footerfontcolor'])."',body_link_color='".trim($_POST['bodylinkcolor'])."',menu_title='".trim($_POST['menutitle'])."',package='".trim($_POST['package'])."',information='".trim($_POST['information'])."',contact_us='".trim($_POST['contactus'])."',availability='".trim($_POST['availability'])."',blog='".trim($_POST['blog'])."',package_display='".trim($package_store)."',wildcard_status='".trim($_POST['wildweb'])."',round_corner='$round_corner', texture_color='$texture_color',back_image='$back_image' where agent_id='".$_SESSION['agent_id']."'");
		
		RedirectTo('site_settings.php');
		
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;  charset=iso-8859-1" />

<title>:: <?php echo SITE_SETTINGS; ?> ::</title>

<link href="ready4uk-base.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css1/lightbox/style.css" media="screen"/>

<!--top menu-->

<link rel="stylesheet" type="text/css" href="ddsmoothmenu.css" />
<script type="text/javascript" language="javascript">
var GB_URL = '<?php echo SERVER_URL; ?>';
</script>
<script type="text/javascript" src="js/jquery.min.js"></script>

<script type="text/javascript" src="ddsmoothmenu.js">

</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "smoothmenu1", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

ddsmoothmenu.init({
	mainmenuid: "smoothmenu2", //Menu DIV id
	orientation: 'v', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu-v', //class added to menu's outer DIV
	//customtheme: ["#804000", "#482400"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>
<!--top menu end-->



<!-- Beginning of compulsory code below -->

<link href="css/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/dropdown/themes/flickr.com/default.ultimate.css" media="screen" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js1/jquery-1.4.2.js"></script>
<script type="text/javascript" src="js1/jquery.fancybox-1.3.2.js"></script>



<link rel="stylesheet" href="css/ui.colorpicker.css"/>
<script type="text/javascript" language="javascript">
function menu_default(id,name)
{
 
 //alert(id+name);
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	 var result=xmlhttp.responseText.split(",");
	 //alert(result[0]);
	 if(result[0]=="Fail")
	 {
	    document.getElementById("update_client").innerHTML='<div style="color:#333;  clear:both; font-size:12px; text-decoration:blink; font-weight: normal; margin-top: 0px; padding-top: 6px; margin-left:10px; width:541px;font-family: "Myriad Pro Semibold", "Myriad Pro";" class="errormsgbox"> <a href="javascript:void(0);" style="color:red; font-size:14px; text-decoration:blink; font-weight: bold;"> Some Technical Error for Setting '+result[1]+' Default Setting .....!!!! </a></div>';
	 }
	 else
	 {
	  document.getElementById("update_client").innerHTML='<div style="color:#333; width:450px; clear:both; font-size:12px; text-decoration:blink; font-weight: normal; margin-top: 0px; padding-top: 6px; margin-left:10px; width:541px;font-family: "Myriad Pro Semibold", "Myriad Pro";" class="nowarningmsgbox"> <a href="javascript:void(0);" style="color:blue; font-size:14px; text-decoration:blink; font-weight: bold;"> Your default '+result[1]+' Setting set Successfully.....!!!! </a></div>';
			 if(name=='header')
			 {
				document.getElementById('image_header').src='<?php echo SERVER_URL.'images/header_bg.jpg';?>';
				document.getElementById("width").value='';
				document.getElementById("margin").value='';
				document.getElementById("text-align").value='0';
				document.getElementById("padding").value='';
				document.getElementById("opcity").value='';
				document.getElementById("color").value='';
				document.getElementById("headerbg").value=' ';
			 }
			 if(name=='body')
			 {
			   document.getElementById("fontcolor").value=' ';
			   document.getElementById("bgcolor").value=' ';
			 }
			 if(name=='menu')
			 {
			   document.getElementById("menucolor").value=' ';
			   document.getElementById("menufontcolor").value=' ';
			 }
			  if(name=='footer')
			 {
			   document.getElementById("footercolor").value=' ';
			   document.getElementById("footerfontcolor").value=' ';
			 }
	 
	 	  
	 }
	
	
    }
  }
  
xmlhttp.open("GET","update_site_settings.php?id="+id+"&name="+name,true);
xmlhttp.send();
}

function reset_col_bg(id,name)
{
 //alert(id+name);
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		if(xmlhttp.responseText=='done')
		{
			location.href='<?php echo SERVER_URL;?>site_settings.php';
		}
    }
  }
  
xmlhttp.open("GET","update_site_settings_background.php?id="+id+"&name="+name,true);
xmlhttp.send();
}


</script>
<script type="text/javascript">
function div_dis()
{
  
   if (document.getElementById('wildweb').checked==true)
   { 
    document.getElementById('hide_div').style.display = "block"; // show body div tag
    //alert('if');
   }
   else
   {
	document.getElementById('hide_div').style.display = "hidden"; // hide body div tag
	document.getElementById('hide_div').style.display = "none"; // hide body div tag
   // document.getElementById('hide_div').innerHTML = "If you can see this, JavaScript function worked"; // display text if JavaScript worked
	//alert('else');
   } 
}
</script>
<script type="text/javascript" src="js/jscolor.js"></script>



<style>
.button
{
border: none;
width: 95px;
height: 27px;
cursor: pointer;
background: url(images/submitwhite.jpg) no-repeat;
color: white;
font-size: 12px;
font-weight: bold;
}

.textfield-box {
    float: left;
    height: 24px;
    margin-bottom: 5px;
    margin-left: 15px;
    margin-top: 5px;
    width: 240px;
}
.button_anchor
{

margin-left: 241px;
float: right;
padding: 4px 16px;
background-color:#FC0;
color:#FFFFFF;
font-size:12px;
font-weight:normal;
margin-top:-2px;
}

.stCols, .stBgs{ width:140px;}
.stCols span.current {
    border: 1px solid #B7B7B7;
    height: 14px;
    width: 18px;
}
.stCols span, .stBgs a {
    cursor: pointer;
    float: left;
    height: 16px;
    margin: 0 2px 2px 0;
    padding: 0;
    text-decoration: none;
    width: 20px;
}

.stBgs a img {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
    border: 0 none;
    height: 16px;
    padding: 0;
    width: 20px;
}

.stBgs a.bg_t img {
    border: 1px solid #B7B7B7;
    height: 14px;
    width: 18px;
}

.stColor {
    background: url("images/bgs/picker.jpg") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
    margin:10px 0;
}
</style>
</head><body bgcolor="#330808">
<?php include('includes/header.php'); ?>

<?php include('includes/navigation.php'); ?>

<div id="main-wrapper">

<!--*****************left-wrapper**********************-->

  <div id="left-wrapper">
    <div class="main-titel-1">
      <div class="addnew-property-titel-bullet1"><img src="images/icon-user.gif" alt="" width="26" height="25" /></div>
	        
      <div class="addnew-property-titel"><?php echo SITE_SETTINGS; ?><a href="http://<?php echo $res1['name'];?>.londonandyou.com" target="_blank"  class="button_anchor" style=" text-decoration:none;"><?php echo SITE_PREVIEW;?></a></div>
    </div>
    <!--////////////////deta-contain-box////////////////-->
    <form id="bg" action="site_settings.php" name="bg" method="post" enctype="multipart/form-data">
    <div class="deta-contain-box">
      <div class="deta-contain-box-indent">
		<div id="update_client"></div>
        
     
     
     <div class="name-area-row1">
          <div class="name-box"><?php echo MENU_TITLE;?> :</div>
          
            <div class="textfield-box">
			<div class="fields">
			    <input style="height:20px;"  type="text" id="menutitle" name="menutitle" <?php if($res1==''){?>value=""<?php }else{?> value="<?php echo $res1['menu_title'];}?>"/>
			</div>
          </div>
          
          
        </div>
        
     
        
         <div class="name-area-row1">
          <div class="name-box" style="width:176px;"><?php echo EN_DS_SITE;?> </div>
          
            <div class="textfield-box">
			<div class="fields">
           
             <input  type="checkbox" name="wildweb" id="wildweb" onclick="javascript:div_dis();" value="1" <?php if($res1['wildcard_status']=='1') {echo "checked='checked'";}?>  />
			</div>
          </div>
          
          
        </div>
        <div id="hide_div" <?php if($res1['wildcard_status']=='1'){?> style="display:block;" <?php } else{?>style="display:none;"<?php }?>>    
	    <div class="name-area-row1">
        <div class="name-box" style="width:700px;"><F2><?php echo HEADER_SECTION; ?></F2><a href="javascript:void(0);"  class="button_anchor" onclick="javascript:menu_default('<?php echo $_SESSION['agent_id']?>','header')" style="text-decoration:none;margin-right:90px;"><?php echo SET_DEFAULT;?></a></div>          
    </div>
				
	 	<div class="name-area-row1" style="height:80px;">
          <div class="name-box" style="height:70px;"><?php echo HEADER_IMAGE; ?> :</div>
          
          <div class="textfield-box" style="width:400px; height:70px;">
           
            <div><input name="image" type="file"  id="image"  class="form-field" /> </div>
            <div style="margin-top: 10px;"><img src="<?php 
		  if($res1['header_image']!=''){ echo HEADER_IMAGE_URL.$res1['header_image'];}else{ echo HEADER_IMAGE_URL.'images/header_bg.jpg'; }?>" height="30" width="129" style=" border:1px #999999 solid; margin-top:-4px; float:none;" id="image_header"/>
		  </div>
            
          </div>
        </div>
		
		
		<div class="name-area-row1" style="height:130px;">
          <div class="name-box" style="height:130px;"><?php echo ROUND_IMAGE_CORNER;?> :</div>
          <div class="textfield-box" style="height:130px; width:400px;">
          <?php $corner=explode('px ',$res1['round_corner']);?>
         <div style="margin-bottom:10px;"><input style="height:15px;"  type="text" id="left_top_rad" name="left_top_rad" value="<?php echo $corner[0];?>"/>Px  (<?php echo LEFT_TOP_CORNER;?>)</div>
		 <div style="margin-bottom:10px;"><input style="height:15px;"  type="text" id="right_top_rad" name="right_top_rad" value="<?php echo $corner[1];?>"/>Px  (<?php echo RIGHT_TOP_CORNER;?>)</div>
		 <div style="margin-bottom:10px;"><input style="height:15px;"  type="text" id="left_bot_rad" name="left_bot_rad" value="<?php echo $corner[2];?>"/>Px  (<?php echo LEFT_BOTTOM_CORNER;?>)</div>
         <div style="margin-bottom:10px;"><input style="height:15px;"  type="text" id="right_bot_rad" name="right_bot_rad" value="<?php echo $corner[3];?>"/>Px  (<?php echo RIGHT_BOTTOM_CORNER;?>)</div>
         </div>
        </div>
        
        <h3 style="border-bottom:1px dashed; font-size:24px; margin-top: 20px;"><?php echo HEADER_INFO;?></h3>
        
        <div class="name-area-row1">
          <div class="name-box"><?php echo WIDTH;?> :</div>
          
            <div class="textfield-box">
			<div class="fields">
			    <input style="height:20px;"  type="text" id="width" name="width" <?php if($res1==''){?>value=""<?php }else{?> value="<?php echo $res1['header_width'];}?>"/>              &nbsp;&nbsp;&nbsp;Px
			</div>
          </div>
        </div>
        
        <div class="name-area-row1">
          <div class="name-box"><?php echo MARGIN;?> :</div>
          
            <div class="textfield-box">
			<div class="fields">
			    <input style="height:20px;"  type="text" id="margin" name="margin" <?php if($res1==''){?>value=""<?php }else{?> value="<?php echo $res1['header_margin'];}?>"/>
                &nbsp;&nbsp;&nbsp;Px
			</div>
          </div>
        </div>
        
        <div class="name-area-row1">
          <div class="name-box"><?php echo TEXT_ALIGN;?> :</div>
          
            <div class="textfield-box">
			<div class="fields">
			    <select name="text-align" id="text-align">
                <option value="0">---Select Option---</option>
                <option value="left" <?php if($res1['header_text_align']=='left'){?>selected="selected"<?php }?>>left</option>
                <option value="right" <?php if($res1['header_text_align']=='right'){?>selected="selected"<?php }?>>right</option>
                
                </select>
			</div>
          </div>
        </div>
        
        <div class="name-area-row1">
          <div class="name-box"><?php echo PEDDING;?> :</div>
          
            <div class="textfield-box">
			<div class="fields">
			    <input style="height:20px;"  type="text" id="padding" name="padding" <?php if($res1==''){?>value=""<?php }else{?> value="<?php echo $res1['header_padding'];}?>"/>
                &nbsp;&nbsp;&nbsp;Px
			</div>
          </div>
        </div>
        
        <div class="name-area-row1">
          <div class="name-box"><?php echo OPCITY;?> :</div>
          
            <div class="textfield-box">
			<div class="fields">
			   
                 <?php 
				 $value=$res1['header_opecity'];
				 $opacity=explode(".",$value);
				 ?>
                <font color="#000000">0.</font><input type="button" id="minus" value="-" 
    onClick="opcity.value = (opcity.value-1)">
    <input type="text" maxlength="3" size="1" id="opcity" name="opcity" <?php if($value[0]==''){?>value="0"<?php }else{?> value="<?php echo $opacity[1];}?>"/>
    <input type="button" value="+" 
    onClick="opcity.value = (+opcity.value+1)">
            </span>
			</div>
          </div>
        </div>
        
        <div class="name-area-row1">
          <div class="name-box"><?php echo COLOR;?> :</div>
          
            <div class="textfield-box">
			<div class="fields">
			    <input style="height:20px;" class="color" type="text" id="color" name="color" <?php if($res1==''){?>value=""<?php }else{?> value="<?php echo $res1['header_color'];}?>"/>
			</div>
          </div>
        </div>
        
        <div class="name-area-row1">
          <div class="name-box"><?php echo BACKGROUND;?> :</div>
          
            <div class="textfield-box">
			<div class="fields">
			    <input style="height:20px;" class="color"  type="text" id="headerbg" name="headerbg" <?php if($res1==''){?>value=""<?php }else{?> value="<?php echo $res1['header_backgound'];}?>"/>
			</div>
          </div>
        </div>
        
        
        
		<div class="name-area-row1">
        <div class="name-box" style="width:624px;"><f2><?php echo BODY_SECTION; ?></f2><a href="javascript:void(0);" class="button_anchor" onclick="javascript:menu_default('<?php echo $_SESSION['agent_id']?>','body')" style="text-decoration:none;"><?php echo SET_DEFAULT;?></a></div>          
        </div>
		<?php echo $res['body_font_color'];?>
		<div class="name-area-row1">
          <div class="name-box"><?php echo FONT_COLOR;?> :</div>
          
            <div class="textfield-box">
			<div class="fields">
			    <input style="height:20px;" class="color" type="text" id="fontcolor" name="fontcolor" <?php if($res1==''){?>value=""<?php }else{?> value="<?php echo $res1['body_font_color'];}?>"/>
			</div>
          </div>
        </div>
		
		
		<div class="name-area-row1" style="height:130px;">
          <div class="name-box" style="height:120px;"><?php echo BACKGROUND_COLOR;?> :</div>
          
            <div class="textfield-box" style="height:120px; width:400px;">
            <div class="stCols" style="float:left;">
            <div style="margin-bottom:5px;">(<?php echo BACKGROUND_COLOR;?>)</div>
            <span title="433834" style="background-color:#433834; cursor:pointer;" onclick="pick_color('433834');"> </span>
            <span title="483e37" style="background-color:#483e37; cursor:pointer;" onclick="pick_color('483e37');"> </span>
            <span title="403b38" style="background-color:#403b38; cursor:pointer;" onclick="pick_color('403b38');"> </span>
            <span title="444444" style="background-color:#444444; cursor:pointer;" onclick="pick_color('444444');"> </span>
            <span title="7a6e61" style="background-color:#7a6e61; cursor:pointer;" onclick="pick_color('7a6e61');"> </span>
            <span title="606060" style="background-color:#606060; cursor:pointer;" onclick="pick_color('606060');"> </span>
            <span title="640226" style="background-color:#640226; cursor:pointer;" onclick="pick_color('640226');"> </span>
            <span title="830226" style="background-color:#830226; cursor:pointer;" onclick="pick_color('830226');"> </span>
            <span title="8f1318" style="background-color:#8f1318; cursor:pointer;" onclick="pick_color('8f1318');"> </span>
            <span title="992e20" style="background-color:#992e20; cursor:pointer;" onclick="pick_color('992e20');"> </span>
           <!-- <span class="current" title="8f3713" style="background-color:#8f3713; cursor:pointer;" onclick="pick_color('8f3713');"> </span>-->
            <span title="8f3713" style="background-color:#8f3713; cursor:pointer;" onclick="pick_color('8f3713');"> </span>
            <span title="994c26" style="background-color:#994c26; cursor:pointer;" onclick="pick_color('994c26');"> </span>
            <span title="2e2b4d" style="background-color:#2e2b4d; cursor:pointer;" onclick="pick_color('2e2b4d');"> </span>
            <span title="003567" style="background-color:#003567; cursor:pointer;" onclick="pick_color('003567');"> </span>
            <span title="063e8e" style="background-color:#063e8e; cursor:pointer;" onclick="pick_color('063e8e');"> </span>
            <span title="004772" style="background-color:#004772; cursor:pointer;" onclick="pick_color('004772');"> </span>
            <span title="32617f" style="background-color:#32617f; cursor:pointer;" onclick="pick_color('32617f');"> </span>
            <span title="006b8f" style="background-color:#006b8f; cursor:pointer;" onclick="pick_color('006b8f');"> </span>
            <span title="004541" style="background-color:#004541; cursor:pointer;" onclick="pick_color('004541');"> </span>
            <span title="006734" style="background-color:#006734; cursor:pointer;" onclick="pick_color('006734');"> </span>
            <span title="007d2f" style="background-color:#007d2f; cursor:pointer;" onclick="pick_color('007d2f');"> </span>
            <span title="177d00" style="background-color:#177d00; cursor:pointer;" onclick="pick_color('177d00');"> </span>
            <span title="406a12" style="background-color:#406a12; cursor:pointer;" onclick="pick_color('406a12');"> </span>
            <span title="567726" style="background-color:#567726; cursor:pointer;" onclick="pick_color('567726');"> </span>
            <span title="503a65" style="background-color:#503a65; cursor:pointer;" onclick="pick_color('503a65');"> </span>
            <span title="811780" style="background-color:#811780; cursor:pointer;" onclick="pick_color('811780');"> </span>
            <span title="904266" style="background-color:#904266; cursor:pointer;" onclick="pick_color('904266');"> </span>
            <span title="985256" style="background-color:#985256; cursor:pointer;" onclick="pick_color('985256');"> </span>
            <span title="91412f" style="background-color:#91412f; cursor:pointer;" onclick="pick_color('91412f');"> </span>
            <span title="987752" style="background-color:#987752; cursor:pointer;" onclick="pick_color('987752');"> </span>
            <div class="cleaner"></div>
			</div>
			<div class="fields" style="float:right; width:250px; text-align:right;">
			 <div> <?php echo SELECTED_COLOR;?>:<input style="height:20px; background:#<?php if($res1['backgound_color']!=''){ echo $res1['backgound_color']; }else{ echo "FFFFFF;";}?>;" type="text" id="select_color" name="select_color" />
             
             <input  type="hidden" id="bgcolor" name="bgcolor" value="<?php if($res1['backgound_color']!=''){ echo $res1['backgound_color']; }else{ echo "FFFFFF;";}?>"/>
             </div>
             <div> <?php echo CUSTOM_COLOR;?>:<input style="height: 20px; margin-top:20px;" class="color"  type="text" id="custcolor" name="custcolor" onchange="pick_color(this.value)"/>
             </div>
             
             <script>
			 function pick_color(mycolor)
			 {
				 document.getElementById('select_color').style.background='#'+mycolor;
				 document.getElementById('bgcolor').value=mycolor;
			 }
			 </script>
             
			</div>
            <div class="cleaner"></div>
          </div>
        </div>
        
        <div class="name-area-row1" style="height:130px;">
          <div class="name-box" style="height:120px;"><?php echo BACKGROUND_TEXTURE;?> :</div>
          
            <div class="textfield-box" style="height:120px; width:400px;">
            
            <div class="stBgs" style="float:left;">
            <div style="margin-bottom:5px;">(<?php echo BACKGROUND_TEXTURE;?>)</div>
            <a class="bg_t" href="javascript:void(0);" onclick="nil_texture_color('bg_t_1.png','bg_t_1_tumb.jpg');">
            <img alt="" src="<?php echo SERVER_URL;?>images/bgs/bg_t_1_tumb.jpg">
            </a>
            
            <a class="bg_t" href="javascript:void(0);" onclick="nil_texture_color('bg_t_2.png','bg_t_2_tumb.jpg');">
            <img alt="" src="<?php echo SERVER_URL;?>images/bgs/bg_t_2_tumb.jpg">
            </a>
            
            <a class="bg_t" href="javascript:void(0);" onclick="nil_texture_color('bg_t_3.png','bg_t_3_tumb.jpg');">
            <img alt="" src="<?php echo SERVER_URL;?>images/bgs/bg_t_3_tumb.jpg">
            </a>
            
            <a class="bg_t" href="javascript:void(0);" onclick="nil_texture_color('bg_t_4.png','bg_t_4_tumb.jpg');">
            <img alt="" src="<?php echo SERVER_URL;?>images/bgs/bg_t_4_tumb.jpg">
            </a>
            
            <a class="bg_t" href="javascript:void(0);" onclick="nil_texture_color('bg_t_5.png','bg_t_5_tumb.jpg');">
            <img alt="" src="<?php echo SERVER_URL;?>images/bgs/bg_t_5_tumb.jpg">
            </a>
            
            <a class="bg_t" href="javascript:void(0);" onclick="nil_texture_color('bg_t_6.png','bg_t_6_tumb.jpg');">
            <img alt="" src="<?php echo SERVER_URL;?>images/bgs/bg_t_6_tumb.jpg">
            </a>
            
            <a class="bg_t" href="javascript:void(0);" onclick="nil_texture_color('bg_t_7.png','bg_t_7_tumb.jpg');">
            <img alt="" src="<?php echo SERVER_URL;?>images/bgs/bg_t_7_tumb.jpg">
            </a>
            
            <a class="bg_t" href="javascript:void(0);" onclick="nil_texture_color('bg_t_8.png','bg_t_8_tumb.jpg');">
            <img alt="" src="<?php echo SERVER_URL;?>images/bgs/bg_t_8_tumb.jpg">
            </a>
            
            <a class="bg_t" href="javascript:void(0);" onclick="nil_texture_color('bg_t_9.png','bg_t_9_tumb.jpg');">
            <img alt="" src="<?php echo SERVER_URL;?>images/bgs/bg_t_9_tumb.jpg">
            </a>
            
            <a class="bg_t" href="javascript:void(0);" onclick="nil_texture_color('bg_t_10.png','bg_t_10_tumb.jpg');">
            <img alt="" src="<?php echo SERVER_URL;?>images/bgs/bg_t_10_tumb.jpg">
            </a>
            
            <a class="bg_t" href="javascript:void(0);" onclick="nil_texture_color('bg_t_11.png','bg_t_11_tumb.jpg');">
            <img alt="" src="<?php echo SERVER_URL;?>images/bgs/bg_t_11_tumb.jpg">
            </a>
            
            <a class="bg_t" href="javascript:void(0);" onclick="nil_texture_color('bg_t_12.png','bg_t_12_tumb.jpg');">
            <img alt="" src="<?php echo SERVER_URL;?>images/bgs/bg_t_12_tumb.jpg">
            </a>
            
            
            <a class="bg_t" href="javascript:void(0);" onclick="nil_texture_color('bg_t_i_1.png','bg_t_i_1_thumb.jpg');">
            <img alt="" src="<?php echo SERVER_URL;?>images/bgs/bg_t_i_1_thumb.jpg">
            </a>
            
            <a class="bg_t" href="javascript:void(0);" onclick="nil_texture_color('bg_t_i_2.png','bg_t_i_2_thumb.jpg');">
            <img alt="" src="<?php echo SERVER_URL;?>images/bgs/bg_t_i_2_thumb.jpg">
            </a>
            
            <a class="bg_t" href="javascript:void(0);" onclick="nil_texture_color('bg_t_i_3.png','bg_t_i_3_thumb.jpg');">
            <img alt="" src="<?php echo SERVER_URL;?>images/bgs/bg_t_i_3_thumb.jpg">
            </a>
            
            <a class="bg_t" href="javascript:void(0);" onclick="nil_texture_color('bg_t_i_4.png','bg_t_i_4_thumb.jpg');">
            <img alt="" src="<?php echo SERVER_URL;?>images/bgs/bg_t_i_4_thumb.jpg">
            </a>
            
            <a class="bg_t" href="javascript:void(0);" onclick="nil_texture_color('bg_t_i_5.png','bg_t_i_5_thumb.jpg');">
            <img alt="" src="<?php echo SERVER_URL;?>images/bgs/bg_t_i_5_thumb.jpg">
            </a>
            
            <a class="bg_t" href="javascript:void(0);" onclick="nil_texture_color('bg_t_i_6.png','bg_t_i_6_thumb.jpg');">
            <img alt="" src="<?php echo SERVER_URL;?>images/bgs/bg_t_i_6_thumb.jpg">
            </a>
            
             <a class="bg_t" href="javascript:void(0);" onclick="nil_texture_color('bg_i_1.jpg','bg_i_1_thumb.jpg');">
            <img alt="" src="<?php echo SERVER_URL;?>images/bgs/bg_i_1_thumb.jpg">
            </a>
            
            <a class="bg_t" href="javascript:void(0);" onclick="nil_texture_color('bg_i_2.jpg','bg_i_2_thumb.jpg');">
            <img alt="" src="<?php echo SERVER_URL;?>images/bgs/bg_i_2_thumb.jpg">
            </a>
            
            <a class="bg_t" href="javascript:void(0);" onclick="nil_texture_color('bg_i_3.jpg','bg_i_3_thumb.jpg');">
            <img alt="" src="<?php echo SERVER_URL;?>images/bgs/bg_i_3_thumb.jpg">
            </a>
            
            <a class="bg_t" href="javascript:void(0);" onclick="nil_texture_color('bg_i_4.jpg','bg_i_4_thumb.jpg');">
            <img alt="" src="<?php echo SERVER_URL;?>images/bgs/bg_i_4_thumb.jpg">
            </a>
            
            <a class="bg_t" href="javascript:void(0);" onclick="nil_texture_color('bg_i_5.jpg','bg_i_5_thumb.jpg');">
            <img alt="" src="<?php echo SERVER_URL;?>images/bgs/bg_i_5_thumb.jpg">
            </a>
            
            <a class="bg_t" href="javascript:void(0);" onclick="nil_texture_color('bg_i_6.jpg','bg_i_6_thumb.jpg');">
            <img alt="" src="<?php echo SERVER_URL;?>images/bgs/bg_i_6_thumb.jpg">
            </a>
            
             <a class="bg_t" href="javascript:void(0);" onclick="nil_texture_color('bg_i_7.jpg','bg_i_7_thumb.jpg');">
            <img alt="" src="<?php echo SERVER_URL;?>images/bgs/bg_i_7_thumb.jpg">
            </a>
            
            <a class="bg_t" href="javascript:void(0);" onclick="nil_texture_color('bg_i_8.jpg','bg_i_8_thumb.jpg');">
            <img alt="" src="<?php echo SERVER_URL;?>images/bgs/bg_i_8_thumb.jpg">
            </a>
            
            <a class="bg_t" href="javascript:void(0);" onclick="nil_texture_color('bg_i_9.jpg','bg_i_9_thumb.jpg');">
            <img alt="" src="<?php echo SERVER_URL;?>images/bgs/bg_i_9_thumb.jpg">
            </a>
            
            <a class="bg_t" href="javascript:void(0);" onclick="nil_texture_color('bg_i_10.jpg','bg_i_10_thumb.jpg');">
            <img alt="" src="<?php echo SERVER_URL;?>images/bgs/bg_i_10_thumb.jpg">
            </a>
            
            <a class="bg_t" href="javascript:void(0);" onclick="nil_texture_color('bg_i_11.jpg','bg_i_11_thumb.jpg');">
            <img alt="" src="<?php echo SERVER_URL;?>images/bgs/bg_i_11_thumb.jpg">
            </a>
            
            <a class="bg_t" href="javascript:void(0);" onclick="nil_texture_color('bg_i_12.jpg','bg_i_12_thumb.jpg');">
            <img alt="" src="<?php echo SERVER_URL;?>images/bgs/bg_i_12_thumb.jpg">
            </a>
            
            <div class="cleaner"></div>
			</div>
			<div class="fields" style="float:right; width:250px; text-align:right;">
			 <div> <?php echo SELECTED_TEXTURE;?>:<img src="<?php if($res1['texture_color']!=''){ echo SERVER_URL."images/bgs/".$res1['texture_color']; }else{ echo SERVER_URL."images/bgs/bg_t_6.png";}?>" id="sel_texture_color" name="sel_texture_color" style="width:20px; height:20px; float:none; border:1px solid #CCCCCC;"/>
             
             <input  type="hidden" id="texture_color" name="texture_color" value="<?php  echo $res1['texture_color'];?>"/>
             </div>
             
             <?php if($res1['texture_color']!=''){?>
             <div style="margin-top:10px;"> 
              <input type="button" name="remove_texture" id="remove_texture" onclick="reset_col_bg(<?php echo $_SESSION['agent_id'];?>,'texture_color');" value="<?php echo RESET;?>" />
              <?php }?>
             </div>
                          
             </div>
             <script>	
			 function nil_texture_color(mytexture,seltexture)
			 {
				// alert("Hello");
				 var url_link='<?php echo SERVER_URL;?>images/bgs/'+seltexture;
				 document.getElementById('sel_texture_color').src=url_link;
				 document.getElementById('texture_color').value=mytexture;
			 }
			 </script>
             
			</div>
            <div class="cleaner"></div>
          </div>
        </div>
        
        <div class="name-area-row1" style="height:80px;">
          <div class="name-box" style="height:70px;"><?php echo BACKIMAGE; ?> :</div>
          
          <div class="textfield-box" style="width:450px; height:70px;">
           
            <div><input name="back_image" type="file"  id="back_image"  class="form-field" /></div>
            <div style="margin-top:10px;"> <?php if($res1['back_image']!=''){?><img src="<?php 
		  if($res1['back_image']!=''){ echo HEADER_IMAGE_URL.$res1['back_image'];}else{ echo "";}?>" height="30" width="129" style=" <?php if($res1['back_image']!=''){?>border:1px #999999 solid; <?php }?> margin-top:-4px; float:none;" id="image_header"/><?php }?>
		 
             <?php if($res1['back_image']!=''){?> <input type="button" name="remove_bg" id="remove_bg" onclick="reset_col_bg(<?php echo $_SESSION['agent_id'];?>,'back_image');" value="<?php echo RESET;?>" /><?php }?></div>
           
            
          </div>
        </div>
        
        <div class="name-area-row1">
          <div class="name-box"><?php echo LINK_COLOR;?> :</div>
          
            <div class="textfield-box">
			<div class="fields">
			    <input style="height:20px;" class="color"  type="text" id="bodylinkcolor" name="bodylinkcolor" <?php if($res1==''){?>value=""<?php }else{?> value="<?php echo $res1['body_link_color'];}?>"/>
			</div>
          </div>
        </div>
        
        
		
		<div class="name-area-row1">
        <div class="name-box" style="width:624px;"><f2><?php echo MENU_SECTION; ?></f2><a href="javascript:void(0)" class="button_anchor" onclick="javascript:menu_default('<?php echo $_SESSION['agent_id']?>','menu')" style="padding:text-decoration:none;"><?php echo SET_DEFAULT;?></a></div>          
        </div>
		
		<div class="name-area-row1">
          <div class="name-box"><?php echo MENU_COLOR;?> :</div>
          
            <div class="textfield-box">
			<div class="fields">
			    <input type="text" style="height:20px;" class="color" id="menucolor" name="menucolor"  <?php if($res1==''){?>value=""<?php }else{?> value="<?php echo $res1['menu_back_color'];}?>"/>
			</div>
          </div>
        </div>
        
        <div class="name-area-row1">
          <div class="name-box"><?php echo MENU_FONT_COLOR;?> :</div>
          
            <div class="textfield-box">
			<div class="fields">
			    <input type="text" style="height:20px;" class="color" id="menufontcolor" name="menufontcolor" <?php if($res1==''){?>value=""<?php }else{?> value="<?php echo $res1['menu_font_color'];}?>"/>
			</div>
          </div>
        </div>
		
		
		<div class="name-area-row1">

        <div class="name-box" style="width:624px;"><f2><?php echo FOOTER_SECTION; ?></f2><a href="javascript:void(0);" class="button_anchor" onclick="javascript:menu_default('<?php echo $_SESSION['agent_id']?>','footer');" style="text-decoration:none;"><?php echo SET_DEFAULT;?></a></div>          
        </div>
		
		
		<div class="name-area-row1">
          <div class="name-box"><?php echo FOOTER_BACKGROUND_COLOR;?> :</div>
           
          
            <div class="textfield-box">
			<div class="fields">
           
			    <input type="text" style="height:20px;" class="color" id="footercolor" name="footercolor" <?php if($res1!=''){?>value="<?php echo $res1['footer_bg_color'];}?>"/>
			</div>
          </div>
        </div>
		
		<div class="name-area-row1">
          <div class="name-box"><?php echo FOOTER_FONT_COLOR;?> :</div>
          
            <div class="textfield-box">
			<div class="fields">
			    <input type="text" style="height:20px;" class="color" id="footerfontcolor" name="footerfontcolor" <?php if($res1==''){?>value=""<?php }else{?> value="<?php echo $res1['footer_font_color'];}?>"/>
			</div>
          </div>
        </div>
        
        <div class="name-area-row1">
        <div class="name-box" style="width:624px;"><f2><?php echo MENU_SETTINGS; ?></f2><!--<a href="javascript:void(0);" class="button themed" onclick="javascript:menu_default('<?php echo $_SESSION['agent_id']?>','footer');" style="padding: 6px 23px 6px 10px; text-decoration:none; margin-left:407px;">Set Default</a>--></div>          
        </div>
        
        <div class="name-area-row1">
          <div class="name-box" style="height: 40px;"><?php echo MENU_DISPLAY;?> :</div>
          
            <div class="textfield-box">
			<div class="fields" style="width:400px;">
            
			   <input type="checkbox" name="package" id="package" <?php if($res1['package']==1){?> checked="checked"<?php }?> value="1"/><?php echo PACKAGE;?>
             
                <input type="checkbox" name="information" id="information" <?php if($res1['information']==1){?>checked="checked"<?php }?> value="1"/><?php echo INFORMATION;?>
                 <input type="checkbox" name="contactus" id="contactus" <?php if($res1['contact_us']==1){?> checked="checked"<?php }?> value="1"/><?php echo CONTACT_US;?>
                  <input type="checkbox" name="availability" id="availability" <?php if($res1['availability']==1){?>checked="checked"<?php }?> value="1"/><?php echo AVAILABILITY_AGENT;?>
              <input type="checkbox" name="blog" id="blog" <?php if($res1['blog']==1){?>checked="checked"<?php }?> value="1"/><?php echo BLOG_AGENT;?>
			</div>
          </div>
        </div>
        
        
        <div class="name-area-row1">
        <div class="name-box" style="width:624px;"><f2><?php echo PACKAGE_SETTINGS; ?></f2><!--<a href="javascript:void(0);" class="button themed" onclick="javascript:menu_default('<?php echo $_SESSION['agent_id']?>','footer');" style="padding: 6px 23px 6px 10px; text-decoration:none; margin-left:407px;">Set Default</a>--></div>          
        </div>
        <div class="name-area-row1">
          <div class="name-box" style="height:79px;"><?php echo PACKAGE_DISPLAY;?> :</div>
          
            <div class="textfield-box">
			<div class="fields" style="width:400px;">
            <?php
			 $i=0;	
			$query=mysql_query("select * from ".PREFIX."package where web_id='".WEB_ID."'");
			while($res=mysql_fetch_array($query))
			{
			  
			   $package=mysql_query("select package_display from ".PREFIX."agent where agent_id='".$_SESSION['agent_id']."'"); 
			   $package1=mysql_fetch_array($package);
			   $array=unserialize($package1['package_display']);
			   ?>
			   <input type="checkbox" name="package_display[]" id="package_display" onblur="javascript:div_dis();" value="<?php echo $res['package_id'];?>"<?php if($package1['package_display']!='N;'){if(in_array($res['package_id'],$array,true))
			   {?> checked="checked"
			   <?php }
			   }?> /><?php echo $res['package_name'];?>
             <?php
			 $i++;
             }?>
                
			</div>
          </div>
           
        </div>
		<input type="hidden" name="previous" id="previous" value="<?php echo $res1['header_image'];?>"/>
        <input type="hidden" name="previous_image" id="previous_image" value="<?php echo $res1['back_image'];?>"/>
         
        </div>
      <div class="deta-contain-box" style="width:630px;">  
      <div class="deta-contain-box-indent">
        <div class="add-user-contain-bottom-banner-box">
          <div class="p1 fl" style="margin-top:10px; margin-left:10px;"></div>
          <div class="p1 fl" style="margin-top:10px; margin-left:5px;">
            <label>
            <br/>
           <input name="btnadd" class="button themed" type="submit" value="<?php echo APPLY_SETTINGS; ?>" />
            </label>
          </div>
          <div class="p1 fl" style="margin-top:10px; margin-left:5px;">
          
        <br/>
       
        <input type="hidden" name="hidbrand" onclick="javascript:document.forms['bg'].image.value = this.value;"/>
          </div>
          
          <div class="p1 fl" style="margin-top:30px; margin-left:20px;">Or</div>
          <div class="p1 fl" style="margin-top:25px; margin-left:20px; ">
            <label>
            <input type="button" name="button" id="button" value="<?php echo CANCEL; ?>" onClick="window.location.href='dashboard.php'" />
            </label>
          </div>
		  
        </div>
      </div>  
      </div>
    </div>
	
	</form>
	</div>
    <!--////////////////deta-contain-box end////////////////-->
    
   <?php include('right.php'); ?> 

	<div class="cleaner"></div>
    <!--////////////////deta-contain-box end////////////////-->
  </div>
  
  
    

<?php include('includes/footer.php'); ?>

<script>
function closefancy()
{
 jQuery.fancybox.close();
}


</script>

</body>
</html>
