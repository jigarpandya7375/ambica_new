<?php 
//include(ADMIN_PATH."language/".$_SESSION['language']."/clients_listing.php");
$action = $_REQUEST['action'];
if(isset($action) && !empty($action)) {	

	$msg='';
	$msg=$obj->funoperation(PREFIX.'clients','client_id');	
}
if(isset($_REQUEST['msgtextclients']) && !empty($_REQUEST['msgtextclients'])) {
	$msg=$_REQUEST['msgtextclients'];
}
//include(FUNCTION_PATH."paging.php");
$tab=$_REQUEST['tab'];
?>
 

<script>
/////////////////// delete comment or add comment or edit comment////////////////////
function addcomment(id,tab)
{
	document.getElementById('add_comment_client_id').value=id;
	document.getElementById('tab').value=tab;
	document.frmclients.submit();
}
function edit_client_comment(id,tab)
{
	document.getElementById('add_comment_client_id').value=id;
	document.getElementById('tab').value=tab;
	document.frmclients.submit();
}
function delete_rec(id)
	{
		var ans = confirm("Are you sure to delete comment?");
		if(ans)
		{
			location.href = "client_delete_comment.php?id="+id;
		}else{
			return false;
		}
	}
	function edit_rec(id,tab)
	{
		 document.getElementById('edit_cm_'+tab+'_'+id).style.display = "block";	 
	}

//////////////////////////////////////////////////////////////////////
/////////////////// for inline editing ///////////////
function editname(theID)
{
	if(document.getElementById('maincontent_name'+theID).style.display = 'block')
	{
	document.getElementById('maincontent_name'+theID).style.display = 'none'
	document.getElementById('inline_name_'+theID).style.display = 'block';
	}
}
function editweb_id(theID)
{
	if(document.getElementById('maincontent_web_id'+theID).style.display = 'block')
	{
	document.getElementById('maincontent_web_id'+theID).style.display = 'none'
	document.getElementById('inline_web_id_'+theID).style.display = 'block';
	}
}
function editemail(theID)
{
	if(document.getElementById('maincontent_email'+theID).style.display = 'block')
	{
	document.getElementById('maincontent_email'+theID).style.display = 'none'
	document.getElementById('inline_email_'+theID).style.display = 'block';
	}
}
function editnationality(theID)
{
	if(document.getElementById('maincontent_nationality'+theID).style.display = 'block')
	{
	document.getElementById('maincontent_nationality'+theID).style.display = 'none'
	document.getElementById('inline_nationality_'+theID).style.display = 'block';
	}
}

function editdate_arrival(theID)
{
	if(document.getElementById('maincontent_date_arrival'+theID).style.display = 'block')
	{
	document.getElementById('maincontent_date_arrival'+theID).style.display = 'none'
	document.getElementById('inline_date_arrival_'+theID).style.display = 'block';
	}
}
//////////////////////////////  Ajax For Inline Editing /////////////////////
function getfooter(id,name)
{
 var value;

 var obj =document.getElementById(name+id);

 value=obj.value;
if (value=="")
  {
 alert("Please enter "+name);
  return false;
  } 
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
  	//alert(xmlhttp.responseText);
	
		document.getElementById("maincontent_"+name+id).innerHTML=value;
		document.getElementById("maincontent_"+name+id).style.display="block";
		document.getElementById("inline_"+name+"_"+id).style.display="none";
	
	 //alert(xmlhttp.responseText);
 document.getElementById("update_client").innerHTML=xmlhttp.responseText;
    }
  }
  
  
  //alert("update_client.php?id="+id+"&name="+name+"&val="+value);

xmlhttp.open("GET","update_client.php?id="+id+"&name="+name+"&val="+value,true);
xmlhttp.send();
}
/////////////////// Edit clients/////////////////////////////////
/*function status_edit(v_value) {
	//alert(v_value)
	document.location.href="index.php?file=clients_detail&txtclientsid="+v_value;
}*/
//selected  //tab ui-state-default ui-corner-top ui-tabs-selected ui-state-active
//tab first ui-state-default ui-corner-top
 
function runScript(e,tab)
{
	if (e.keyCode == 13 || e.which == 13)
	{
	search_content(tab)
	}
	else
	{
	
	}
}


 
function search_content(tab)
{
	//alert(tab);
	document.getElementById('tab').value=tab;
	if(document.getElementById('keyword'+tab).value=="")
	{
		alert("please enter keywords to search");
		return false;
	}
	else
	{
	//return true;
	document.frmclients.submit();
	}
}
/////////////////////////////////////////

function notify(element,msg)
        {
       	var chks=document.getElementsByName(element);
        var hasChecked = false;
		var val='';
        // Get the checkbox array length and iterate it to see if any of them is selected
        for (var i = 0; i < chks.length; i++)
        {
                if (chks[i].checked)
                {
                        hasChecked = true;
						if(val=='')
							{
							val=chks[i].value;
							}
						else
							{
							val=val+','+chks[i].value;
							}
                }
        }
		//alert(val);
			// if ishasChecked is false then throw the error message
			if (!hasChecked)
			{
					alert("Please select records.");
					return false;
			}
			else
			{
			
				if (confirm(msg))
				{
				document.location.href='add_workplacement.php?str='+val;
				}
				
			}
               
        }
		
		function set_action(element,action,msg,table,id)
		{
			var chks=document.getElementsByName(element);
			var hasChecked = false;
			var val='';
        // Get the checkbox array length and iterate it to see if any of them is selected
        for (var i = 0; i < chks.length; i++)
        {
                if (chks[i].checked)
                {
                        hasChecked = true;
						if(val=='')
							{
							val=chks[i].value;
							}
						else
							{
							val=val+','+chks[i].value;
							}
                }
        }
		//alert(val);
			// if ishasChecked is false then throw the error message
			if (!hasChecked)
			{
					alert("Please select records.");
					return false;
			}
			else
			{
				if (confirm(msg))
				{
				//alert(val);
				document.location.href='action.php?str='+val+'&action='+action+'&table='+table+'&id='+id;
				}
				
			}
         
		}
		
		
		
function send_mail(element,msg)
 {
       	var chks=document.getElementsByName(element);
        var hasChecked = false;
		var val='';
        // Get the checkbox array length and iterate it to see if any of them is selected
        for (var i = 0; i < chks.length; i++)
        {
                if (chks[i].checked)
                {
                        hasChecked = true;
						if(val=='')
							{
							val=chks[i].value;
							}
						else
							{
							val=val+','+chks[i].value;
							}
                }
        }
		//alert(val);
			// if ishasChecked is false then throw the error message
			if (!hasChecked)
			{
					alert("Please select records.");
					return false;
			}
			else
			{
			
			
				if (confirm(msg))
				{
				location.href='send_authemail.php?id='+val;	   
				
				}
			}
               
 }	
///////////// open new client form////////////
$(document).ready(function() {
$("#new").fancybox({
				'width'				: '80%',
				'height'			: '100%',
				'autoScale'			: true,
				'transitionIn'		: 'elastic',
				'transitionOut'		: 'elastic',
				'type'				: 'iframe',
				'scrolling'			: 'none'
			});
});

$(document).ready(function() {
$("#new1").fancybox({
				'width'				: '80%',
				'height'			: '100%',
				'autoScale'			: true,
				'transitionIn'		: 'elastic',
				'transitionOut'		: 'elastic',
				'type'				: 'iframe',
				'scrolling'			: 'none'
			});
});

$(document).ready(function() {
$("#new2").fancybox({
				'width'				: '80%',
				'height'			: '100%',
				'autoScale'			: true,
				'transitionIn'		: 'elastic',
				'transitionOut'		: 'elastic',
				'type'				: 'iframe',
				'scrolling'			: 'none'
			});
});

$(document).ready(function() {
$("#new3").fancybox({
				'width'				: '80%',
				'height'			: '100%',
				'autoScale'			: true,
				'transitionIn'		: 'elastic',
				'transitionOut'		: 'elastic',
				'type'				: 'iframe',
				'scrolling'			: 'none'
			});
});
///////////// end open new client form////////////
///////////// open client notification form////////////

$(document).ready(function() {
$("#notify").fancybox({
				'width'				: '80%',
				'height'			: '100%',
				'autoScale'			: true,
				'transitionIn'		: 'elastic',
				'transitionOut'		: 'elastic',
				'type'				: 'iframe',
				'scrolling'			: 'none'
			});
});
$(document).ready(function() {
$("#notify1").fancybox({
				'width'				: '80%',
				'height'			: '100%',
				'autoScale'			: true,
				'transitionIn'		: 'elastic',
				'transitionOut'		: 'elastic',
				'type'				: 'iframe',
				'scrolling'			: 'none'
			});
});
$(document).ready(function() {
$("#notify2").fancybox({
				'width'				: '80%',
				'height'			: '100%',
				'autoScale'			: true,
				'transitionIn'		: 'elastic',
				'transitionOut'		: 'elastic',
				'type'				: 'iframe',
				'scrolling'			: 'none'
			});
});
$(document).ready(function() {
$("#notify3").fancybox({
				'width'				: '80%',
				'height'			: '100%',
				'autoScale'			: true,
				'transitionIn'		: 'elastic',
				'transitionOut'		: 'elastic',
				'type'				: 'iframe',
				'scrolling'			: 'none'
			});
});

function force(id,tab)
{
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
  	//alert(xmlhttp.responseText);
	
		document.getElementById("force"+tab+id).innerHTML=xmlhttp.responseText;
	 //alert(xmlhttp.responseText);
    }
  }
  
  //alert("force_client.php?id="+id);

xmlhttp.open("GET","force_client.php?id="+id,true);
xmlhttp.send();

}

function high_light(id,tab)
{
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
		if(xmlhttp.responseText>0)
		{
		var str='<span class="bullet bullet-yellow"></span>';
		document.getElementById("user_count").innerHTML=xmlhttp.responseText;
		document.getElementById("high_light"+tab+id).innerHTML=str;
		}
    }
  }
  
  //alert("force_client.php?id="+id);

xmlhttp.open("GET","high_light.php?id="+id,true);
xmlhttp.send();

}
///////////// end open client notification form////////////
</script>
<style>
.box-content .bullet {
margin: 0px 0px 0px 0px;
}
</style>
<div id="content">
	<div class="clear"></div>
    <?php if($msg!='')
	{ ?>
    <div class="column full">
    <span class="message information"><strong><?php echo $msg;?></strong></span>
    </div>
    <?php }?>
	<div class="column full">
    <!-- form-->
    <form id="frmclients" name="frmclients" method="post" action="index.php?file=client_listing">
	<div class="box tabs themed_box">
		
		<h2 class="box-header">	<strong>Clients listing</strong> </h2>
        <ul class="tabs-nav">
		<li class="tab first"><a href="#tabs-1" >Contracted clients</a></li>
		<li class="tab"><a href="#tabs-2" >Tennant clients</a></li>
        <li class="tab"><a href="#tabs-3" >Uncontracted clients</a></li>
        <li class="tab"><a href="#tabs-4" >Booked clients</a></li>
		</ul>
			<div class="box-content box-table">
            <div id="tabs-1">
     		     <?php
					$n=$_REQUEST['n'];
					$sorton=$_REQUEST['sorton'];
					$sorttype=$_REQUEST['sorttype'];
					$option=$_REQUEST['option0'];
					$keyword=$_REQUEST['keyword0'];
					if($option=='' && $$keyword=='')
					 {
					$extra_search_cond= "CURDATE( ) BETWEEN date_arrival AND (date_arrival + INTERVAL 1 YEAR) ";
					}
					$num_totrec = $obj->count_common_detail($option, $keyword,PREFIX.'clients',$extra_search_cond);
					$var_extra = $var_extra . "&num_totrec=" . $num_totrec;
					$var_extra = $var_extra . "&n=" . $n;
					$var_extra = $var_extra . "&tab=0";
					include(FUNCTION_PATH."paging.php");
					if (!isset($sorton)) $sorton = "name";
					if (!isset($sorttype)) $sorttype = "ASC";
					if($option=='wed_id' )
					{
						$get_site=mysql_query("select * from ".PREFIX."website we, ".PREFIX."clients cl where cl.web_id=we.web_id and CURDATE( ) BETWEEN cl.date_arrival AND (cl.date_arrival + INTERVAL 1 YEAR) and  we.website_name like '%".$keyword."%' ");
						$count=0;
						while($result=mysql_fetch_array($get_site))
						{
						  $db_res[$count]= $result;
						  $count++;
						 }
					}
					else{
					$db_res = $obj->get_common_detail($sorton, $sorttype, $option, $keyword, $var_limit,PREFIX.'clients',$extra_search_cond);
					 }
			//}
			?>
            <?php if (count($db_res)) { ?>
			<table class="tablebox">
        <div id="topbar" style="border:#CCC solid 1px;" >
       	<strong>Show</strong><?php echo createpagecombo1('0');?><strong>rows </strong>
            <div style="float:right;">
            <strong>Search</strong>
            <select name="option0" class="textfield" >
			<option value='name' <?php echo $option == 'name' ?'selected':''?>><?php echo "Name"; ?></option>
            <option value='last_name' <?php echo $option == 'last_name' ?'selected':''?>><?php echo "Last Name"; ?></option>
            <option value='email' <?php echo $option == 'email' ?'selected':''?>><?php echo "Email"; ?></option>
            <option value='wed_id' <?php echo $option == 'wed_id' ?'selected':''?>><?php echo "Website"; ?></option>
            <option value='nationality' <?php echo $option == 'nationality' ?'selected':''?>><?php echo "Nationality"; ?></option>	
            <option value='date_arrival' <?php echo $option == 'date_arrival' ?'selected':''?>><?php echo "Date Arrival"; ?></option>
            <option value='status' <?php echo $option == 'status' ?'selected':''?>><?php echo "Status"; ?></option>
            </select>
     <input type="text" size="30" name="keyword0"  value="<?php echo $keyword;?>" class="textfield" id="keyword0" onkeypress="runScript(event,'0')">
             
             &nbsp;<img name="Hasta_icono0" id="Hasta_icono0" src="gfx/datepicker.png" onclick="$('#keyword0').datepicker();" />
             <a class="button themed" href="#" onclick="search_content('0')"><strong>search </strong></a>
            </div>
        </div>
				<thead class="table-header">
					<tr>
                    	<th class="tc"></th>
                      	<th class="first tc"><input type="checkbox" id="checkboxalltabs"/> </th>
						<th>Agent</th>
						<th><a href=index.php?file=client_listing&sorton=name&sorttype=ASC&n=<?php echo $n ?>&tab=0><img src="images1/down.gif" border="0" /></a>&nbsp;<?php echo "Name"; ?>&nbsp;<a href=index.php?file=client_listing&sorton=name&sorttype=DESC&n=<?php echo $n ?>&tab=0><img src="images1/up.gif" border="0" /></a></th>
                           <th><?php echo "Last Name"; ?></th>
                        <th><a href=index.php?file=client_listing&sorton=web_id&sorttype=ASC&n=<?php echo $n ?>&tab=0><img src="images1/down.gif" border="0" /></a>&nbsp;<?php echo "Website"; ?>&nbsp;<a href=index.php?file=client_listing&sorton=web_id&sorttype=DESC&n=<?php echo $n ?>&tab=0><img src="images1/up.gif" border="0" /></a></th>
                        <th><a href=index.php?file=client_listing&sorton=email&sorttype=ASC&n=<?php echo $n ?>&tab=0><img src="images1/down.gif" border="0" /></a>&nbsp;<?php echo "Email"; ?>&nbsp;<a href=index.php?file=client_listing&sorton=email&sorttype=DESC&n=<?php echo $n ?>&tab=0><img src="images1/up.gif" border="0" /></a></th>
                        <th><?php echo "Phone"; ?></th>
                       <th><a href=index.php?file=client_listing&sorton=nationality&sorttype=ASC&n=<?php echo $n ?>&tab=0><img src="images1/down.gif" border="0" /></a>&nbsp;<?php echo "Natio"; ?>&nbsp;<a href=index.php?file=client_listing&sorton=nationality&sorttype=DESC&n=<?php echo $n ?>&tab=0><img src="images1/up.gif" border="0" /></a></th>
                        <th><?php echo "Force"; ?></th>
                        <th><?php echo "High Light"; ?></th>
                        
                        <th><?php echo "Todo"; ?></th>
                        
                        <th><?php echo "Inv."; ?></th>
                        <th><?php echo "Contract."; ?></th>
                        <th><?php echo "NIN"; ?></th>
                        <th><a href=index.php?file=client_listing&sorton=date_arrival&sorttype=ASC&n=<?php echo $n ?>&tab=0><img src="images1/down.gif" border="0" /></a>&nbsp;<?php echo "Arrival"; ?>&nbsp;<a href=index.php?file=client_listing&sorton=date_arrival&sorttype=DESC&n=<?php echo $n ?>&tab=0><img src="images1/up.gif" border="0" /></a></th>
						<th><a href=index.php?file=client_listing&sorton=status&sorttype=ASC&n=<?php echo $n ?>&tab=0><img src="images1/down.gif" border="0" /></a>&nbsp;<?php echo "Status"; ?>&nbsp;<a href=index.php?file=client_listing&sorton=status&sorttype=DESC&n=<?php echo $n ?>&tab=0><img src="images1/up.gif" border="0" /></a></th>
                        <th><?php echo "Edit"; ?></th>
					</tr>
				</thead>
			
          <?php for($i = 0;$i < count($db_res);$i++) { 
		  $k=$i+1;
		  if($k%2==0)
		  {
			  $fc="even";
		  }
		  else
		  {
			  $fc="odd";
		  }

		  ?>	
					<tr class="<?php echo $fc;?>">
                    
                        <td class="tc"><a class="button themed openable"><span class="icon_single extend"></span></a></td>	
                        <td class=" first tc"><input type="checkbox" name="checkalltabs[]" value="<?php echo $db_res[$i]["client_id"];?>" /> </td>
                            <td>
							<?php
								$sql_ag = "select * from ".PREFIX."agent where agent_id = '".$db_res[$i]['agent_id']."'";
								$res_ag = mysql_query($sql_ag);
								$row_ag = mysql_fetch_array($res_ag);
								echo $row_ag['agent_name'];
								//echo $db_res[$i]['agent_id'];
							?>
                            </td>
                            
                           <td align="center" onclick="editname(<?php echo $db_res[$i]['client_id'];?>)" style="cursor:pointer;">
                            <div id="maincontent_name<?php echo $db_res[$i]["client_id"];?>" style="display:block;">
                            <?php echo stripslashes($db_res[$i]['name']); ?></div>
                            <?php 
                             $get_web=mysql_fetch_array(mysql_query("select * from ".PREFIX."website where web_id='".$db_res[$i]['web_id']."'")); 
                            ?>
                            <div id="inline_name_<?php echo $db_res[$i]["client_id"];?>" style="display:none;">
                              <input type="text" name="name<?php echo $db_res[$i]["client_id"];?>" id="name<?php echo $db_res[$i]["client_id"];?>" value="<?php echo stripslashes($db_res[$i]['name']);?>" />
                              <input type="button" name="submit<?php echo $db_res[$i]["client_id"];?>"  value="Save" onclick="getfooter(<?php echo $db_res[$i]["client_id"];?>,'name')"/>
                             
                              </div>
                            </td>
                            
                            <td align="center"><?php echo stripslashes($db_res[$i]['last_name']); ?> </td>
                            
                            
                            <td align="center" title="<?php echo $get_web['website_name'];?>" onclick="editweb_id(<?php echo $db_res[$i]['client_id'];?>)" style="cursor:pointer;">
                            <div id="maincontent_web_id<?php echo $db_res[$i]["client_id"];?>" style="display:block;">
                            <?php echo $db_res[$i]['web_id'];?>
                            </div>
                             <div id="inline_web_id_<?php echo $db_res[$i]["client_id"];?>" style="display:none;">
                                  <input type="text" name="web_id<?php echo $db_res[$i]["client_id"];?>" id="web_id<?php echo $db_res[$i]["client_id"];?>" value="<?php echo stripslashes($db_res[$i]['web_id']);?>" />
                                  <input type="button" name="submit<?php echo $db_res[$i]["client_id"];?>"  value="Save" onclick="getfooter(<?php echo $db_res[$i]["client_id"];?>,'web_id')"/>
                                 
                                  </div>
                            </td>
                            
                            
                          <td align="center" onclick="editemail(<?php echo $db_res[$i]["client_id"];?>)" style="cursor:pointer;">
       <div id="maincontent_email<?php echo $db_res[$i]["client_id"];?>" style="display:block;" title="<?php echo $db_res[$i]['email'];?>"><?php echo substr($db_res[$i]['email'],0,20);?> </div>
                        <div id="inline_email_<?php echo $db_res[$i]["client_id"];?>" style="display:none;">
                            
                              <input type="text" name="email<?php echo $db_res[$i]["client_id"];?>" id="email<?php echo $db_res[$i]["client_id"];?>" value="<?php echo $db_res[$i]['email'];?>" />
                              <input type="button" name="submit<?php echo $db_res[$i]["client_id"];?>"  value="Save" onclick="getfooter(<?php echo $db_res[$i]["client_id"];?>,'email')" />
                             
                              </div>
                        </td>
                        
                            
					<?php
                    $admin_detail=mysql_fetch_array(mysql_query("select * from ".PREFIX."configure where con_id='".$_SESSION['sess_adminid']."'")); 
					$webdetails = mysql_fetch_array(mysql_query("select *  from ".PREFIX."website where web_id = '".$db_res[$i]["web_id"]."'"));
                    ?>
                    
                     <td align="center">
                     <table cellpadding="0" cellspacing="0" style="display: inline-block;">
						<tr>
                        <td align="center" style=" background-color:#F4F4F4; border:1px solid #D6D6D6;">Phne</td>
						<td align="center" style=" background-color:#F4F4F4; border:1px solid #D6D6D6;">Mob</td>
						<td align="center" style=" background-color:#F4F4F4; border:1px solid #D6D6D6;">Disct</td>
						</tr>
								
						<tr>
						<td align="center" style="border:1px solid #D6D6D6;">
                        	<?php if($db_res[$i]['landline_number']!=''){?>
                     <img src="images1/landline.png" width="20" height="20" onclick="connect_phone('<?php echo $admin_detail['ip_address'];?>','<?php echo $webdetails["prefix"]; ?><?php echo $db_res[$i]['landline_number'];?>','<?php echo $admin_detail['uri'];?>','')" style="cursor:pointer;"/>
                     <?php }else{?>
                     N/A
                     <?php }?>
                        </td>
						<td align="center" style="border:1px solid #D6D6D6;">
						<?php if($db_res[$i]['english_phone']!=''){?>
                     <img src="images1/mobile.png" width="20" height="20" onclick="connect_phone('<?php echo $admin_detail['ip_address'];?>','<?php echo $webdetails["prefix"]; ?><?php echo $db_res[$i]['english_phone'];?>','<?php echo $admin_detail['uri'];?>','')" style="cursor:pointer;"/>
                     <?php }else{?>
                     N/A
                     <?php }?>
                        
                        </td>
						<td align="center" style="border:1px solid #D6D6D6;"><img src="images1/off.png" width="20" height="20" onclick="connect_phone('<?php echo $admin_detail['ip_address'];?>','','','ONHOOK')" style="cursor:pointer;"/></td>
						</tr>
			    	</table>
                     </td>
                   
                            
                           <td align="center" onclick="editnationality(<?php echo $db_res[$i]["client_id"];?>)" style="cursor:pointer;">
               <div id="maincontent_nationality<?php echo $db_res[$i]["client_id"];?>" style="display:block;">
				<?php echo $db_res[$i]['nationality'];?>
                </div>
                <div id="inline_nationality_<?php echo $db_res[$i]["client_id"];?>" style="display:none;">
                  <select name="nationality<?php echo $db_res[$i]["client_id"];?>" id="nationality<?php echo $db_res[$i]["client_id"];?>" class="textfield">
		<option value="">--Select Nationality--</option>
         <?php echo  $db_res[$i]['nationality']=="albania" ? '<option value="albania" selected="selected">Albania</option>' : '<option value="albania">Albania</option>'; ?>
		<?php echo $db_res[$i]['nationality']=="austria" ? '<option value="austria" selected="selected">Austria</option>' : '<option value="austria">Austria</option>'; ?>
      <?php echo $db_res[$i]['nationality']=="azerbaijan" ? '<option value="azerbaijan" selected="selected">Azerbaijan</option>' : '<option value="azerbaijan">Azerbaijan</option>';?>   <?php echo $db_res[$i]['nationality']=="belarus" ? '<option value="belarus" selected="selected">Belarus</option>' : '<option value="belarus">Belarus</option>'; ?>      
  <?php echo $db_res[$i]['nationality']=="belgium" ? '<option value="belgium" selected="selected">Belgium</option>' : '<option value="belgium">Belgium</option>'; ?>
   <?php echo $db_res[$i]['nationality']=="basonia & herzegorina" ? '<option value="basonia & herzegorina" selected="selected">Basonia & Herzegorina</option>' : '<option value="basonia & herzegorina">Basonia & Herzegorina</option>'; ?>
	 <?php echo $db_res[$i]['nationality']=="bulgaria" ? '<option value="bulgaria" selected="selected">Bulgaria</option>' : '<option value="bulgaria">Bulgaria</option>'; ?>      
     <?php echo $db_res[$i]['nationality']=="croatia" ? '<option value="croatia" selected="selected">Croatia</option>' : '<option value="croatia">Croatia</option>'; ?>    
     <?php echo $db_res[$i]['nationality']=="cyprus" ? '<option value="cyprus" selected="selected">Cyprus</option>' : '<option value="cyprus">Cyprus</option>'; ?>     
     <?php echo $db_res[$i]['nationality']=="czech republic" ? '<option value="czech republic" selected="selected">Czech Republic</option>' : '<option value="czech republic">Czech Republic</option>'; ?>
     <?php echo $db_res[$i]['nationality']=="denmark" ? '<option value="denmark" selected="selected">Denmark</option>' : '<option value="denmark">Denmark</option>'; ?>      
     <?php echo $db_res[$i]['nationality']=="estonia" ? '<option value="estonia" selected="selected">Estonia</option>' : '<option value="estonia">Estonia</option>'; ?>    
     <?php echo $db_res[$i]['nationality']=="finland" ? '<option value="finland" selected="selected">Finland</option>' : '<option value="finland">Finland</option>'; ?>     
     <?php echo $db_res[$i]['nationality']=="france" ? '<option value="france" selected="selected">France</option>' : '<option value="france">France</option>'; ?>
     
     <?php echo $db_res[$i]['nationality']=="georgia" ? '<option value="georgia" selected="selected">Georgia</option>' : '<option value="georgia">Georgia</option>'; ?>      
     <?php echo $db_res[$i]['nationality']=="germany" ? '<option value="germany" selected="selected">Germany</option>' : '<option value="germany">Germany</option>'; ?>    
     <?php echo $db_res[$i]['nationality']=="greece" ? '<option value="greece" selected="selected">Greece</option>' : '<option value="greece">Greece</option>'; ?>     
     <?php echo $db_res[$i]['nationality']=="hungary" ? '<option value="hungary" selected="selected">Hungary</option>' : '<option value="hungary">Hungary</option>'; ?>
     <?php echo $db_res[$i]['nationality']=="iceland" ? '<option value="iceland" selected="selected">Iceland</option>' : '<option value="iceland">Iceland</option>'; ?>      
     <?php echo $db_res[$i]['nationality']=="ireland" ? '<option value="ireland" selected="selected">Ireland</option>' : '<option value="ireland">Ireland</option>'; ?>    
     <?php echo $db_res[$i]['nationality']=="itlay" ? '<option value="itlay" selected="selected">Itlay</option>' : '<option value="itlay">Itlay</option>'; ?>     
     <?php echo $db_res[$i]['nationality']=="kosovo" ? '<option value="kosovo" selected="selected">Kosovo</option>' : '<option value="kosovo">Kosovo</option>'; ?>
     <?php echo $db_res[$i]['nationality']=="lativa" ? '<option value="lativa" selected="selected">Lativa</option>' : '<option value="lativa">Lativa</option>'; ?>      
     <?php echo $db_res[$i]['nationality']=="liechtenstein" ? '<option value="liechtenstein" selected="selected">Liechtenstein</option>' : '<option value="liechtenstein">Liechtenstein</option>'; ?>    
     <?php echo $db_res[$i]['nationality']=="lithuania" ? '<option value="lithuania" selected="selected">Lithuania</option>' : '<option value="lithuania">Lithuania</option>'; ?>     
     <?php echo $db_res[$i]['nationality']=="luxemberg" ? '<option value="luxemberg" selected="selected">Luxemberg</option>' : '<option value="luxemberg">Luxemberg</option>'; ?>
     
     <?php echo $db_res[$i]['nationality']=="macedonia" ? '<option value="macedonia" selected="selected">Macedonia</option>' : '<option value="macedonia">Macedonia</option>'; ?>
     <?php echo $db_res[$i]['nationality']=="malta" ? '<option value="malta" selected="selected">Malta</option>' : '<option value="malta">Malta</option>'; ?>
     <?php echo $db_res[$i]['nationality']=="moldova" ? '<option value="moldova" selected="selected">Moldova</option>' : '<option value="moldova">Moldova</option>'; ?>
     <?php echo $db_res[$i]['nationality']=="monaco" ? '<option value="monaco" selected="selected">Monaco</option>' : '<option value="monaco">Monaco</option>'; ?>
     <?php echo $db_res[$i]['nationality']=="montenegro" ? '<option value="montenegro" selected="selected">Montenegro</option>' : '<option value="montenegro">Montenegro</option>'; ?>
     <?php echo $db_res[$i]['nationality']=="netherlands" ? '<option value="netherlands" selected="selected">Netherlands</option>' : '<option value="netherlands">Netherlands</option>'; ?>
     <?php echo $db_res[$i]['nationality']=="norway" ? '<option value="norway" selected="selected">Norway</option>' : '<option value="norway">Norway</option>'; ?>
     <?php echo $db_res[$i]['nationality']=="poland" ? '<option value="poland" selected="selected">Poland</option>' : '<option value="poland">Poland</option>'; ?>
     <?php echo $db_res[$i]['nationality']=="portugal" ? '<option value="portugal" selected="selected">Portugal</option>' : '<option value="portugal">Portugal</option>'; ?>
     <?php echo $db_res[$i]['nationality']=="romania" ? '<option value="romania" selected="selected">Romania</option>' : '<option value="romania">Romania</option>'; ?>
     <?php echo $db_res[$i]['nationality']=="russia" ? '<option value="russia" selected="selected">Russia</option>' : '<option value="russia">Russia</option>'; ?>
     <?php echo $db_res[$i]['nationality']=="san marino" ? '<option value="san marino" selected="selected">San Marino</option>' : '<option value="san marino">San Marino</option>'; ?>
     
      <?php echo $db_res[$i]['nationality']=="spain" ? '<option value="spain" selected="selected">Spain</option>' : '<option value="spain">Spain</option>'; ?>
     <?php echo $db_res[$i]['nationality']=="serbia" ? '<option value="serbia" selected="selected">Serbia</option>' : '<option value="serbia">Serbia</option>'; ?>
     <?php echo $db_res[$i]['nationality']=="slovakia" ? '<option value="slovakia" selected="selected">Slovakia</option>' : '<option value="slovakia">Slovakia</option>'; ?>
     <?php echo $db_res[$i]['nationality']=="slovenia" ? '<option value="slovenia" selected="selected">Slovenia</option>' : '<option value="slovenia">Slovenia</option>'; ?>
     <?php echo $db_res[$i]['nationality']=="sweden" ? '<option value="sweden" selected="selected">Sweden</option>' : '<option value="sweden">Sweden</option>'; ?>
     <?php echo $db_res[$i]['nationality']=="switzerland" ? '<option value="switzerland" selected="selected">Switzerland</option>' : '<option value="switzerland">Switzerland</option>'; ?>
     <?php echo $db_res[$i]['nationality']=="turkey" ? '<option value="turkey" selected="selected">Turkey</option>' : '<option value="turkey">Turkey</option>'; ?>
     <?php echo $db_res[$i]['nationality']=="ukraine" ? '<option value="ukraine" selected="selected">Ukraine</option>' : '<option value="ukraine">Ukraine</option>'; ?>
     <?php echo $db_res[$i]['nationality']=="united kingdom" ? '<option value="united kingdom" selected="selected">United Kingdom</option>' : '<option value="united kingdom">United Kingdom</option>'; ?>
     <?php echo $db_res[$i]['nationality']=="vatican city" ? '<option value="vatican city" selected="selected">Vatican City</option>' : '<option value="vatican city">Vatican City</option>'; ?>
          </select>
                  
                  <input type="button" name="submit<?php echo $db_res[$i]["client_id"];?>" value="Save" onclick="getfooter(<?php echo $db_res[$i]["client_id"];?>,'nationality')"/>
                 
                  </div></td>
                  
                            
                            
                             <td id="force1<?php echo $db_res[$i]["client_id"];?>">
                            <?php if($db_res[$i]["forced"]==1)
							{
							?>
                            <span class="bullet bullet-yellow"></span>
                            <?php }else{?>
                            
                            <span class="bullet bullet-blue" style="cursor:pointer;" onclick="force(<?php echo $db_res[$i]["client_id"];?>,1)"></span>
                            <?php }?>
                            </td>
                            
                             <td id="high_light1<?php echo $db_res[$i]["client_id"];?>">
                            <?php if($db_res[$i]["high_light"]==1)
							{
							?>
                            <span class="bullet bullet-yellow"></span>
                            <?php }else{?>
                            
                            <span class="bullet bullet-blue" style="cursor:pointer;" onclick="high_light(<?php echo $db_res[$i]["client_id"];?>,1)"></span>
                            <?php }?>
                            </td>
                            
                             <td>
                            <a href="reminder_detail.php?cid=<?php echo $db_res[$i]['client_id']; ?>" id="todo1_<?php echo $db_res[$i]['client_id'];?>">
                            <img src="images1/todo.png" border="0" height="17" width="16"  />
                            </a>
                             <script>
							$(document).ready(function() {
								$("#todo1_<?php echo $db_res[$i]['client_id'];?>").fancybox({
												'width'				: '80%',
												'height'			: '100%',
												'autoScale'			: true,
												'transitionIn'		: 'elastic',
												'transitionOut'		: 'elastic',
												'type'				: 'iframe',
												'scrolling'			: 'none'
											});
								});

							</script> 
                            </td>
                            
                            <td>
                            <a href="payment_report_client.php?cid=<?php echo $db_res[$i]['client_id']; ?>" id="invoice1_<?php echo $db_res[$i]['client_id'];?>">
                            <img src="images1/invoice.jpg" border="0" height="17" width="13"  />
                            </a>
                             <script>
							$(document).ready(function() {
								$("#invoice1_<?php echo $db_res[$i]['client_id'];?>").fancybox({
												'width'				: '80%',
												'height'			: '100%',
												'autoScale'			: true,
												'transitionIn'		: 'elastic',
												'transitionOut'		: 'elastic',
												'type'				: 'iframe',
												'scrolling'			: 'none'
											});
								});

							</script> 
                            </td>
                            <td>
                            <?php $get_alloc_cont=mysql_query("select * from ".PREFIX."allocate where client_id='".$db_res[$i]['client_id']."' order by allocate_id desc limit 1");
								if(mysql_num_rows($get_alloc_cont)>0)
								{
								$get_allocate_id=mysql_fetch_array($get_alloc_cont);
								//$link=$get_allocate_id['allocate_id'];
								
							?>
							<a href="print_contract.php?a=<?php echo base64_encode($get_allocate_id['allocate_id']);?>" id="contract_1_<?php echo $db_res[$i]['client_id'];?>"><img src="images1/pdf.jpg" border="0" height="30" width="30" /></a>
							<!--<a href="print_contract.php?a=<?php //echo $get_allocate_id['allocate_id']; ?>" id="contract_1_<?php //echo $db_res[$i]['client_id'];?>"><img src="images1/pdf.jpg" border="0" height="30" width="30" /></a>-->
                            <script>
							$(document).ready(function() {
								$("#contract_1_<?php echo $db_res[$i]['client_id'];?>").fancybox({
												'width'				: '80%',
												'height'			: '100%',
												'autoScale'			: true,
												'transitionIn'		: 'elastic',
												'transitionOut'		: 'elastic',
												'type'				: 'iframe',
												'scrolling'			: 'none'
											});
								});

							</script> 
							<?php  } else { echo "N/A"; }  ?>
                            
                            </td>
                            <td>
							<?php $get_nin=mysql_query("select * from ".PREFIX."nin where client_id='".$db_res[$i]['client_id']."'");
                            if(mysql_num_rows($get_nin)>0)
                            {
                            $nin=mysql_fetch_array($get_nin);
                            ?>
							<a href="print_nin.php?a=<?php echo $nin['nin_id']; ?>" id="nin1_<?php echo $db_res[$i]['client_id'];?>"><img src="images1/todo.jpg" border="0" height="20" width="20" /></a>
                             <script>
							$(document).ready(function() {
								$("#nin1_<?php echo $db_res[$i]['client_id'];?>").fancybox({
												'width'				: '80%',
												'height'			: '100%',
												'autoScale'			: true,
												'transitionIn'		: 'elastic',
												'transitionOut'		: 'elastic',
												'type'				: 'iframe',
												'scrolling'			: 'none'
											});
								});

							</script> 
							<?php    } else { ?>
							<a href="nin_detail.php?client_id2=<?php echo $db_res[$i]['client_id'];?>" id="nin_detail1_<?php echo $db_res[$i]['client_id'];?>">Add</a>
                             <script>
							$(document).ready(function() {
								$("#nin_detail1_<?php echo $db_res[$i]['client_id'];?>").fancybox({
												'width'				: '80%',
												'height'			: '100%',
												'autoScale'			: true,
												'transitionIn'		: 'elastic',
												'transitionOut'		: 'elastic',
												'type'				: 'iframe',
												'scrolling'			: 'none'
											});
								});

							</script> 
							<?php }  ?>
                            </td>
                            <td align="center" onclick="editdate_arrival(<?php echo $db_res[$i]["client_id"];?>)" style="cursor:pointer;">
                            <div id="maincontent_date_arrival<?php echo $db_res[$i]["client_id"];?>" style="display:block;">
                            <?php echo convert_date_ddmmyy($db_res[$i]['date_arrival']);?>
                            </div>
                             <div id="inline_date_arrival_<?php echo $db_res[$i]["client_id"];?>" style="display:none;">
                                
                                  <input type="text" name="date_arrival<?php echo $db_res[$i]["client_id"];?>" id="date_arrival<?php echo $db_res[$i]["client_id"];?>" value="<?php echo $db_res[$i]['date_arrival'];?>" />
                                  <input type="button" name="submit<?php echo $db_res[$i]["client_id"];?>"  value="Save" onclick="getfooter(<?php echo $db_res[$i]["client_id"];?>,'date_arrival')" />
                                 
                                  </div>
                            </td>
                            
                                            
                          	<?php
							if($db_res[$i]['status']=='Inactive'||$db_res[$i]['status']=='inactive' ||$db_res[$i]['status']=='InActive'){
							?>
							 <td class="tc"><span class="bullet bullet-red"></span></td>
							<?php
							}elseif($db_res[$i]['status']=='active'||$db_res[$i]['status']=='Active'){
							?>
							 <td class="tc"><span class="bullet bullet-green"></span></td>
							<?php
							}else{
							?>
							 <td align="center"></td>
							<?php
							}
							?>
                            <td><a class="button white" href="clients_detail.php?txtclientsid=<?php echo $db_res[$i]['client_id'];?>"  id="new<?php echo $db_res[$i]['client_id'];?>"><span class="icon_single edit"></span></a></td>
                            
                            <script>
							$(document).ready(function() {
								$("#new<?php echo $db_res[$i]['client_id'];?>").fancybox({
												'width'				: '80%',
												'height'			: '100%',
												'autoScale'			: true,
												'transitionIn'		: 'elastic',
												'transitionOut'		: 'elastic',
												'type'				: 'iframe',
												'scrolling'			: 'none'
											});
								});

							</script>
          
					</tr>
					
                    <tr class="<?php echo $fc;?> openable-tr" >
						<td colspan="17">
                        <div class="fl typo" style="width:98%;">
               <table  border="1" cellspacing="0" cellpadding="0" bordercolor="#ccc" style="display:block;">
                    <tr>
                        <th  valign="top" width="425">Client&nbsp;Profile</th>
                        <th  valign="top" width="425">Print doc</th>
                        <th  valign="top" width="425">Client&nbsp;document</th>
                        <th  valign="top" width="425">New&nbsp;Message</th>
                     </tr>
                    <tr>
                    
                 
                  	<td width="425">
					 <a href="client_profile.php?c=<?php echo $db_res[$i]["client_id"];?>" id="cl_profile2<?php echo $db_res[$i]["client_id"];?>">
				<img src="images1/client.jpg" border="0" style="cursor:pointer;" />                			</a>
                            <script>
							$(document).ready(function() {
								$("#cl_profile2<?php echo $db_res[$i]['client_id'];?>").fancybox({
												'width'				: '80%',
												'height'			: '100%',
												'autoScale'			: true,
												'transitionIn'		: 'elastic',
												'transitionOut'		: 'elastic',
												'type'				: 'iframe',
												'scrolling'			: 'none'
											});
								});

							</script>					</td>
                            
                            
					<td width="425"><img src="images1/printdoc.png" border="0" style="cursor:pointer;" onclick="print_all(<?php echo $db_res[$i]["client_id"];?>)"/></td>
                     <script>
                     function print_all(id)
                     {
                     location.href='index.php?file=print_all_doc&id='+id;
                     }
                     </script>
					
					<td width="425">
					<a href="document_listing.php?i=<?php echo $db_res[$i]['client_id'];?>" id="doc3_<?php echo $db_res[$i]['client_id'];?>">
							<img src="images1/doc.jpg" border="0" width="25" height="20" style="cursor:pointer;"  /></a>
                            <script>
							$(document).ready(function() {
								$("#doc3_<?php echo $db_res[$i]['client_id'];?>").fancybox({
												'width'				: '80%',
												'height'			: '100%',
												'autoScale'			: true,
												'transitionIn'		: 'elastic',
												'transitionOut'		: 'elastic',
												'type'				: 'iframe',
												'scrolling'			: 'none'
											});
								});

							</script>
                            </td>
					
					<td width="425">
					 <a href="message_detail_que.php?c=<?php echo $db_res[$i]["client_id"];?>" id="message_detail_que2<?php echo $db_res[$i]["client_id"];?>">
				<img src="images1/read_message.png" border="0" style="cursor:pointer;" />                			</a>
                            <script>
							$(document).ready(function() {
								$("#message_detail_que2<?php echo $db_res[$i]['client_id'];?>").fancybox({
												'width'				: '80%',
												'height'			: '100%',
												'autoScale'			: true,
												'transitionIn'		: 'elastic',
												'transitionOut'		: 'elastic',
												'type'				: 'iframe',
												'scrolling'			: 'none'
											});
								});

							</script>					</td>
					
					
							
					
                    
               </table>
         </div>
         
         
							<div class="fl typo" style="width:98%;">
                             <!--<form name="add_comment_<?php //echo $db_res[$i]["client_id"];?>" id="add_comment_<?php //echo $db_res[$i]["client_id"];?>" action="" method="post">-->
                             <table width="98%" cellspacing="2" cellpadding="2" border="0">
							<tr><td align="left" valign="top" style="padding:5px;"><strong>Comment: </strong></td>
							<td align="left" valign="top" style="padding:5px;">
							<div class="fl typo">
                            <textarea name="comment_1_<?php echo $db_res[$i]["client_id"];?>" id="comment_1_<?php echo $db_res[$i]["client_id"];?>"  rows="4" cols="160"></textarea>
                            </div>
							</td></tr>
                            <tr>
                            <td align="left" valign="top" style="padding:5px;"></td>
                            <td style="text-align:left; padding:5px;"> <a onclick="addcomment(<?php echo $db_res[$i]["client_id"];?>,1)" class="button white" href="#"><span class="icon_text addnew"></span>add comment</a></td>
                           <!-- <input type="hidden" name="client_id" id="client_id" value="<?php //echo $db_res[$i]["client_id"];?>" />-->
                            </tr>
                            </table>
                             <!--</form>-->
							</div>
                            <!-- dnfjdnsjf==============================================-->
							<?php 
							if(trim($db_res[$i]["agent_comment"])!=''){
							$get_agent_detail=mysql_fetch_array(mysql_query("select * from ".PREFIX."agent where agent_id='".$db_res[$i]['agent_id']."'"));
							?>
							<div class="fl typo" style="width:98%; margin-left:2px;">
                            <table width="98%"  cellspacing="2" cellpadding="2" border="0">
                             <tr>
                             <td style="text-align:left">
                             <div class="fl typo">
								<b>Published by: </b>
								<a href="#"><?php echo $get_agent_detail['agent_name'];?></a> 
							</div>
							
							<div class="fl typo">
								<b>Package Name: </b>
								<a href="#"><?php 
					$pkg=mysql_fetch_array(mysql_query("select * from ".PREFIX."package where package_id=".$db_res[$i]['pkg'].""));
					if($pkg['package_name']!=''){echo $pkg['package_name'];}else{echo "N/A";}
					?></a> 
							</div>
                            </td>		
                             </tr>
                             <tr><td align="left" valign="top" style="text-align:justify;" colspan="2"><strong>Comment :: </strong> <?php echo $db_res[$i]["agent_comment"]; ?></td></tr>
							 </table>
                            </div>
                           <?php }?>       	
	<?php 
$get_inq_con=mysql_query("select * from ".PREFIX."client_inquire where client_id='".$db_res[$i]["client_id"]."' order by inq_id desc");
if(mysql_num_rows($get_inq_con)>0){
while($row=mysql_fetch_array($get_inq_con))
{
	if($row['con_id']!=0)
	{
	$get_con=mysql_fetch_array(mysql_query("select * from ".PREFIX."configure where con_id='".$row['con_id']."'"));
		$admin_name=$get_con['firstname'].' '.$get_con['lastname']."(Admin)";
	}
	else
	{
		$admin_name="N/A(Admin)";
	}
?>
                            <div class="fl typo" style="width:98%; margin-left:2px;">
                            <table width="98%"  cellspacing="2" cellpadding="2" border="0">
                             <tr>
                             <td style="text-align:left">
                             <div class="fl typo">
								<b>Published by: </b>
								<a href="#"><?php echo $admin_name;?></a> 
							</div>
                            <div class="fl typo">
								<b>Published date: </b>
								<a href="#"><?php echo date('d M, Y',strtotime($row['last_date'])); ?></a> 
							</div>
							
							<div class="fl typo">
								<b>Published Time: </b>
								<a href="#"><?php echo $row['pub_time']; ?></a> 
							</div>
                            </td>		
                             <td style="text-align:right">
                              <?php if($_SESSION['sess_admintype']=='superadmin')	{ ?>
		 						  <a class="button white" href="#" onclick="edit_rec('<?php echo $row['inq_id'];?>',1)"><span class="icon_text edit"></span>edit</a>
                                  <?php } ?>	 
		 
		 						 <a class="button white" href="#" onclick="delete_rec('<?php echo $row['inq_id'];?>')"><span class="icon_text cancel"></span>delete</a>
		
                                  </td></tr>
                             <tr><td align="left" valign="top" style="text-align:justify;" colspan="2"><strong>Topic :: </strong> <?php echo $row['comment']; ?></td></tr>
							 </table>
                            <!-- <form name="edit_comment" id="edit_comment" action="" method="post">-->
                            <table id="edit_cm_1_<?php echo $row['inq_id'];?>" width="98%" cellspacing="2" cellpadding="2" border="0" style="display:none;">
							<tr><td align="left" valign="top" style="padding:5px;"><strong>Comment: </strong></td>
							<td align="left" valign="top" style="padding:5px;">
							<div class="fl typo">
                            <textarea name="edit_comment_1_<?php echo $row['inq_id'];?>" id="edit_comment_1_<?php echo $row['inq_id'];?>"  rows="4" cols="160"><?php echo $row['comment'];?></textarea>
                            </div>
							</td></tr>
                            <tr>
                            <td align="left" valign="top" style="padding:5px;"></td>
                            <td style="text-align:left; padding:5px;"> 
                            <a class="button white" href="#" onclick="edit_client_comment(<?php echo $row['inq_id'];?>,1)"><span class="icon_text edit"></span>edit</a></td>
                            </tr>
                            </table>
                            <!-- </form>-->
                            </div>
		<?php
		}
	}
	else
	{
	?>
    <div class="fl typo" style="width:98%; margin-left:2px;">
		<table border="0" cellpadding="2" cellspacing="2" style="font-size:13px; width:100%;">
		<tr><td align="center" valign="middle" width="100%"><b>No Conversion have been added yet, Add Now.</b></td></tr>
		</table>
		</div>
    <?php
	
	}
	
	
	?>                       
  <!-- dnfjdnsjf==============================================-->
						<div class="clear"></div>
						</td>
					</tr>
               <?php }?>
			</table>
            <ul class="pagination">
      <li style="padding:3px; float:left;"><a class="button themed" href="clients_detail.php" id="new"><strong>New </strong>client</a></li>
      <li style="padding:3px; float:left;"><a class="button themed" href="notification.php" id="notify"><strong>notification </strong></a></li>
        <li style="padding:3px; float:left;"><a class="button themed" href="#" onclick="notify('checkalltabs[]','Are you sure, you want to add selected records in workplacement')"><strong>add in </strong>workplacement</a></li>
		
		 <li style="padding:3px; float:left;"><a class="button themed" href="#" onclick="send_mail('checkalltabs[]','Are you sure, you want to sent email?')"><strong>Authentication </strong>Mail</a></li>
		 
         <li style="padding:3px; float:left;"><a class="button themed" href="#" onclick="set_action('checkalltabs[]','active', 'Are you sure, you want to active selected records?','clients','client_id')"><span class="icon_text accept"></span>active</a></li>
        <li style="padding:3px; float:left;"><a class="button themed" href="#" onclick="set_action('checkalltabs[]','inactive', 'Are you sure, you want to inactive selected records?','clients','client_id')"><span class="icon_text cancel"></span>inactive</a></li>
        <li style="padding:3px; float:left;"><a class="button themed" href="#" onclick="set_action('checkalltabs[]','delete', 'Are you sure, you want to delete selected records?','clients','client_id')"><span class="icon_text cancel"></span>delete</a></li> 
             
				<li><strong><?php echo"Total Records".' '.$num_totrec;?></strong></li>
                <li> <?php echo $page_link;?></li>
				</ul> 
                 <?php }else{?>
				 <div id="topbar" style="border:#CCC solid 1px;" >
       	<strong>Show</strong><?php echo createpagecombo1('0');?><strong>rows </strong>
            <div style="float:right;">
            <strong>Search</strong>
            <select name="option0" class="textfield" >
			<option value='name' <?php echo $option == 'name' ?'selected':''?>><?php echo "Name"; ?></option>
            <option value='last_name' <?php echo $option == 'last_name' ?'selected':''?>><?php echo "Last Name"; ?></option>
            <option value='email' <?php echo $option == 'email' ?'selected':''?>><?php echo "Email"; ?></option>
            <option value='wed_id' <?php echo $option == 'wed_id' ?'selected':''?>><?php echo "Website"; ?></option>
            <option value='nationality' <?php echo $option == 'nationality' ?'selected':''?>><?php echo "Nationality"; ?></option>	
            <option value='date_arrival' <?php echo $option == 'date_arrival' ?'selected':''?>><?php echo "Date Arrival"; ?></option>
            <option value='status' <?php echo $option == 'status' ?'selected':''?>><?php echo "Status"; ?></option>
            </select>
             <input type="text" size="30" name="keyword0"  value="<?php echo $keyword;?>" class="textfield" id="keyword0">&nbsp;<img name="Hasta_icono0" id="Hasta_icono0" src="gfx/datepicker.png" onclick="$('#keyword0').datepicker();" />
             <a class="button themed" href="#" onclick="search_content('0')"><strong>search </strong></a>
            </div>
        </div>
              	<div class="column full">
    			<span class="message information"><strong>No Records Found</strong></span>
    			</div>
				<ul class="pagination">
      			<li style="padding:3px; float:left;"><a class="button themed" href="clients_detail.php" id="new"><strong>New </strong>client</a></li>
				</ul> 
             <?php }?>
      
            </div>
            
             <div id="tabs-2">
             <?php
					$n=$_REQUEST['n'];
					$sorton=$_REQUEST['sorton'];
					$sorttype=$_REQUEST['sorttype'];
					$option=$_REQUEST['option1'];
					$keyword=$_REQUEST['keyword1'];
					$num_totrec =  $obj->tennant_total($option, $keyword);
					$var_extra= $var_extra . "&num_totrec1=" . $num_totrec;
					$var_extra = $var_extra . "&n1=" . $n;
					$var_extra = $var_extra . "&tab=1";
					include(FUNCTION_PATH."paging1.php");
					if (!isset($sorton)) $sorton = "name";
					if (!isset($sorttype)) $sorttype = "ASC";
					
					$db_res2=$obj->tennant_query($sorton, $sorttype, $option, $keyword, $var_limit);
			 ?>
            <?php if (count($db_res2)) { ?> 
			<table class="tablebox">
            <div id="topbar" style="border:#CCC solid 1px;">
       		<strong>Show</strong><?php echo createpagecombo2('1');?><strong>rows </strong>
       		<div style="float:right;">
            <strong>Search</strong>
            <select name="option1" class="textfield" >
           	<option value='name' <?php echo $option == 'name' ?'selected':''?>><?php echo "Name"; ?></option>
			<option value='last_name' <?php echo $option == 'last_name' ?'selected':''?>><?php echo "Last Name"; ?></option>
			<option value='nationality' <?php echo $option == 'nationality' ?'selected':''?>><?php echo "Nationality"; ?></option>		
			<option value='room_title' <?php echo $option == 'room_title' ?'selected':''?>><?php echo "Room Title"; ?></option>		
			<option value='house_title' <?php echo $option == 'house_title' ?'selected':''?>><?php echo "House Title"; ?></option>	
			<option value='date_arrival' <?php echo $option == 'date_arrival' ?'selected':''?>><?php echo "Date Arrival"; ?></option>
			<option value='status' <?php echo $option == 'status' ?'selected':''?>><?php echo "Status"; ?></option>
            </select>
             <input type="text" size="30" name="keyword1"  value="<?php echo $keyword;?>" class="textfield" id="keyword1" onkeypress="runScript(event,'1')">&nbsp;<img id="Hasta_icono0" src="gfx/datepicker.png" />
             <a class="button themed" href="#" onclick="search_content('1')"><strong>search </strong></a>
            </div>
        </div>
					<thead class="table-header">
					<tr>
                    	<th class="tc"></th>
                      	<th class="first tc"><input type="checkbox" id="checkboxalltabs1"/> </th>
						<th>Agent</th>
						<th><a href=index.php?file=client_listing&sorton=name&sorttype=ASC&n=<?php echo $n ?>&tab=1><img src="images1/down.gif" border="0" /></a>&nbsp;<?php echo "Name"; ?>&nbsp;<a href=index.php?file=client_listing&sorton=name&sorttype=DESC&n=<?php echo $n ?>&tab=1><img src="images1/up.gif" border="0" /></a></th>
                        <th><a href=index.php?file=client_listing&sorton=email&sorttype=ASC&n=<?php echo $n ?>&tab=1><img src="images1/down.gif" border="0" /></a>&nbsp;<?php echo "Email"; ?>&nbsp;<a href=index.php?file=client_listing&sorton=email&sorttype=DESC&n=<?php echo $n ?>&tab=1><img src="images1/up.gif" border="0" /></a></th>
						<th><?php echo "House."; ?></th>
                        <th><?php echo "Room"; ?></th>
                        <th><?php echo "Inv."; ?></th>
                        <th><?php echo "Contract."; ?></th>
                        <th><?php echo "Phone"; ?></th>
                        <th><?php echo "Force"; ?></th>
                        <th><?php echo "High Light"; ?></th>
                        <th><?php echo "NIN"; ?></th>
                        <th><a href=index.php?file=client_listing&sorton=date_arrival&sorttype=ASC&n=<?php echo $n ?>&tab=1><img src="images1/down.gif" border="0" /></a>&nbsp;<?php echo "Arrival"; ?>&nbsp;<a href=index.php?file=client_listing&sorton=date_arrival&sorttype=DESC&n=<?php echo $n ?>&tab=1><img src="images1/up.gif" border="0" /></a></th>
						<th><?php echo "Status"; ?></th>
					</tr>
				</thead>
			
          <?php for($i = 0;$i < count($db_res2);$i++) { 
		  $k=$i+1;
		  if($k%2==0)
		  {
			  $fc="even";
		  }
		  else
		  {
			  $fc="odd";
		  }

		  ?>	
          				<tr class="<?php echo $fc;?>">
                        <td class="tc"><a class="button themed openable"><span class="icon_single extend"></span></a></td>	
                        <td class=" first tc"><input type="checkbox" name="checkalltabs1[]" value="<?php echo $db_res2[$i]["client_id"];?>" /> </td>
                            <td>
							<?php
								$sql_ag = "select * from ".PREFIX."agent where agent_id = '".$db_res2[$i]['agent_id']."'";
								$res_ag = mysql_query($sql_ag);
								$row_ag = mysql_fetch_array($res_ag);
								echo $row_ag['agent_name'];
								//echo $db_res[$i]['agent_id'];
							?>
                            </td>
                            
                          <td align="center" onclick="status_edit(<?php echo $db_res2[$i]['client_id'];?>)" style="cursor:pointer;">
				<?php echo stripslashes($db_res2[$i]['name']);?></td>
			<td align="center"><?php echo $db_res2[$i]['email'];?></td>
			
					<td align="center"><?php 
					$sql_house = "select * from ".PREFIX."house where house_id = '".$db_res2[$i]['house_id']."'";
					$res_house = mysql_query($sql_house);
					$row_house = mysql_fetch_array($res_house);
					echo $row_house['title'];
					?></td>
					
					<td align="center"><?php 
					$sql_room = "select * from ".PREFIX."room where room_id = '".$db_res2[$i]['room_id']."'";
					$res_room = mysql_query($sql_room);
					$row_room = mysql_fetch_array($res_room);
					echo $row_room['room_title'];
					?></td>
               
			<td>
             <a href="payment_report_client.php?cid=<?php echo $db_res2[$i]['client_id']; ?>" id="invoice2_<?php echo $db_res2[$i]['client_id'];?>">
             <img src="images1/invoice.jpg" border="0" height="17" width="13"  />
            </a>
                             <script>
							$(document).ready(function() {
								$("#invoice2_<?php echo $db_res2[$i]['client_id'];?>").fancybox({
												'width'				: '80%',
												'height'			: '100%',
												'autoScale'			: true,
												'transitionIn'		: 'elastic',
												'transitionOut'		: 'elastic',
												'type'				: 'iframe',
												'scrolling'			: 'none'
											});
								});

							</script> 
                            </td>
                  
                            <!--<td><?php //echo "Pkg."; ?></td>-->
           <td align="center">
			<?php $get_alloc_cont=mysql_query("select * from ".PREFIX."allocate where client_id='".$db_res2[$i]['client_id']."' order by allocate_id desc limit 1");
			if(mysql_num_rows($get_alloc_cont)>0)
			{
			$get_allocate_id=mysql_fetch_array($get_alloc_cont);
			?>
			<a href="print_contract.php?a=<?php echo $get_allocate_id['allocate_id']; ?>"id="contract_2_<?php echo $db_res2[$i]['client_id'];?>"><img src="images1/pdf.jpg" border="0" height="30" width="30" /></a>
             <script>
							$(document).ready(function() {
								$("#contract_2_<?php echo $db_res2[$i]['client_id'];?>").fancybox({
												'width'				: '80%',
												'height'			: '100%',
												'autoScale'			: true,
												'transitionIn'		: 'elastic',
												'transitionOut'		: 'elastic',
												'type'				: 'iframe',
												'scrolling'			: 'none'
											});
								});

							</script> 
			
			<?php  } else { echo "N/A"; }  ?>
			</td>
            
            <?php
                    $admin_detail2=mysql_fetch_array(mysql_query("select * from ".PREFIX."configure where con_id='".$_SESSION['sess_adminid']."'")); 
					$webdetails2 = mysql_fetch_array(mysql_query("select *  from ".PREFIX."website where web_id = '".$db_res2[$i]["web_id"]."'"));
                    ?>
                    
                     <td align="center">
                     <table cellpadding="0" cellspacing="0" style="display: inline-block;">
						<tr>
                        <td align="center" style=" background-color:#F4F4F4; border:1px solid #D6D6D6;">Phne</td>
						<td align="center" style=" background-color:#F4F4F4; border:1px solid #D6D6D6;">Mob</td>
						<td align="center" style=" background-color:#F4F4F4; border:1px solid #D6D6D6;">Disct</td>
						</tr>
								
						<tr>
						<td align="center" style="border:1px solid #D6D6D6;">
                        	<?php if($db_res2[$i]['landline_number']!=''){?>
                     <img src="images1/landline.png" width="20" height="20" onclick="connect_phone('<?php echo $admin_detail2['ip_address'];?>','<?php echo $webdetails2["prefix"]; ?><?php echo $db_res2[$i]['landline_number'];?>','<?php echo $admin_detail2['uri'];?>','')" style="cursor:pointer;"/>
                     <?php }else{?>
                     N/A
                     <?php }?>
                        </td>
						<td align="center" style="border:1px solid #D6D6D6;">
						<?php if($db_res2[$i]['english_phone']!=''){?>
                     <img src="images1/mobile.png" width="20" height="20" onclick="connect_phone('<?php echo $admin_detail2['ip_address'];?>','<?php echo $webdetails2["prefix"]; ?><?php echo $db_res2[$i]['english_phone'];?>','<?php echo $admin_detail2['uri'];?>','')" style="cursor:pointer;"/>
                     <?php }else{?>
                     N/A
                     <?php }?>
                        
                        </td>
						<td align="center" style="border:1px solid #D6D6D6;"><img src="images1/off.png" width="20" height="20" onclick="connect_phone('<?php echo $admin_detail2['ip_address'];?>','','','ONHOOK')" style="cursor:pointer;"/></td>
						</tr>
			    	</table>
                     </td>
                     
                     
                       <td id="force2<?php echo $db_res2[$i]["client_id"];?>">
                            <?php if($db_res2[$i]["forced"]==1)
							{
							?>
                            <span class="bullet bullet-yellow"></span>
                            <?php }else{?>
                            
                            <span class="bullet bullet-blue" style="cursor:pointer;" onclick="force(<?php echo $db_res2[$i]["client_id"];?>,2)"></span>
                            <?php }?>
                            </td>
                            
                             <td id="high_light2<?php echo $db_res2[$i]["client_id"];?>"> 
                            <?php
							 if($db_res2[$i]["high_light"]==1)
							{
							?>
                            <span class="bullet bullet-yellow"></span>
                            <?php }else{?>
                            
                            <span class="bullet bullet-blue" style="cursor:pointer;" onclick="high_light(<?php echo $db_res2[$i]["client_id"];?>,2)"></span>
                            <?php }?>
                            </td>
                            
                     
			<td align="center">
			<?php $get_nin=mysql_query("select * from ".PREFIX."nin where client_id='".$db_res2[$i]['client_id']."'");
			if(mysql_num_rows($get_nin)>0)
			{
			$nin=mysql_fetch_array($get_nin);
			?>
			<a href="print_nin.php?a=<?php echo $nin['nin_id']; ?>" id="nin2_<?php echo $db_res2[$i]['client_id'];?>"><img src="images1/todo.jpg" border="0" height="20" width="20" /></a>
             <script>
							$(document).ready(function() {
								$("#nin2_<?php echo $db_res2[$i]['client_id'];?>").fancybox({
												'width'				: '80%',
												'height'			: '100%',
												'autoScale'			: true,
												'transitionIn'		: 'elastic',
												'transitionOut'		: 'elastic',
												'type'				: 'iframe',
												'scrolling'			: 'none'
											});
								});

							</script> 
			<?php    } else { ?>
			<a href="nin_detail.php?client_id2=<?php echo $db_res[$i]['client_id'];?>" id="nin_detail2_<?php echo $db_res2[$i]['client_id'];?>">Add</a>
             <script>
							$(document).ready(function() {
								$("#nin_detail2_<?php echo $db_res2[$i]['client_id'];?>").fancybox({
												'width'				: '80%',
												'height'			: '100%',
												'autoScale'			: true,
												'transitionIn'		: 'elastic',
												'transitionOut'		: 'elastic',
												'type'				: 'iframe',
												'scrolling'			: 'none'
											});
								});

							</script> 
			<?php }  ?>
			</td>
			<td align="center"><?php echo convert_date_ddmmyy($db_res2[$i]['date_arrival']);?></td>
			<?php
			if($db_res2[$i]['status']=='Inactive'||$db_res2[$i]['status']=='inactive' ||$db_res2[$i]['status']=='InActive'){
			?>
			<td class="tc"><span class="bullet bullet-red"></span></td>
			<?php
			}elseif($db_res2[$i]['status']=='active'||$db_res2[$i]['status']=='Active'){
			?>
			<td class="tc"><span class="bullet bullet-green"></span></td>
			<?php
			}else{
			?>
			<td align="center"></td>
			<?php
			}
			?>           
		</tr>
        
        				<tr class="<?php echo $fc;?> openable-tr" >
                        <td colspan="12">
                        
                        <div class="fl typo" style="width:98%;">
                       <table  border="1" cellspacing="0" cellpadding="0" bordercolor="#ccc" style="display:block;">
                            <tr>
                                <th  valign="top" width="425">Interview</th>
                                <th  valign="top" width="425">Print document</th>
                                 <th  valign="top" width="425">Client document</th>
                                <th  valign="top" width="425">New&nbsp;Message</th>
                             </tr>
                            <tr>
                                       
                         
                            <td width="425">
                             <a href="all_interview.php?q=<?php echo $db_res2[$i]['client_id'];?>" id="all_int<?php echo $db_res2[$i]['client_id'];?>">
                        
                        <img src="images1/client.jpg" border="0" style="cursor:pointer;" /></a>
                    
                                 <script>
                                    $(document).ready(function() {
                                        $("#all_int<?php echo $db_res2[$i]['client_id'];?>").fancybox({
                                                        'width'				: '80%',
                                                        'height'			: '100%',
                                                        'autoScale'			: true,
                                                        'transitionIn'		: 'elastic',
                                                        'transitionOut'		: 'elastic',
                                                        'type'				: 'iframe',
                                                        'scrolling'			: 'none'
                                                    });
                                        });
        
                                    </script> 					</td>
                            
                            <td width="425">
                            <img src="images1/printdoc.png" border="0" style="cursor:pointer;" onclick="print_all(<?php echo $db_res2[$i]["client_id"];?>)"/>
                                    </td>
                                    
                            <td width="425">
                                <a href="document_listing.php?i=<?php echo $db_res2[$i]['client_id'];?>" id="doc2_<?php echo $db_res2[$i]['client_id'];?>">
                                    <img src="images1/doc.jpg" border="0" width="25" height="20" style="cursor:pointer;"  />
                                    </a>
                                    <script>
                                    $(document).ready(function() {
                                        $("#doc2_<?php echo $db_res2[$i]['client_id'];?>").fancybox({
                                                        'width'				: '80%',
                                                        'height'			: '100%',
                                                        'autoScale'			: true,
                                                        'transitionIn'		: 'elastic',
                                                        'transitionOut'		: 'elastic',
                                                        'type'				: 'iframe',
                                                        'scrolling'			: 'none'
                                                    });
                                        });
        
                                    </script>                             </td>
                            
                            <td width="425">
                             <a href="message_detail_que.php?c=<?php echo $db_res2[$i]["client_id"];?>" id="message_detail_que_2<?php echo $db_res2[$i]["client_id"];?>">
                        <img src="images1/read_message.png" border="0" style="cursor:pointer;" />                			</a>
                                    <script>
                                    $(document).ready(function() {
                                        $("#message_detail_que_2<?php echo $db_res2[$i]['client_id'];?>").fancybox({
                                                        'width'				: '80%',
                                                        'height'			: '100%',
                                                        'autoScale'			: true,
                                                        'transitionIn'		: 'elastic',
                                                        'transitionOut'		: 'elastic',
                                                        'type'				: 'iframe',
                                                        'scrolling'			: 'none'
                                                    });
                                        });
        
                                    </script>					</td>
                            
                            
                                    
                            
                            
                       </table>
        			 </div>
         
         
							<div class="fl typo" style="width:98%;">
                             <!--<form name="add_comment_<?php //echo $db_res[$i]["client_id"];?>" id="add_comment_<?php //echo $db_res[$i]["client_id"];?>" action="" method="post">-->
                             <table width="98%" cellspacing="2" cellpadding="2" border="0">
							<tr><td align="left" valign="top" style="padding:5px;"><strong>Comment: </strong></td>
							<td align="left" valign="top" style="padding:5px;">
							<div class="fl typo">
                            <textarea name="comment_2_<?php echo $db_res2[$i]["client_id"];?>" id="comment_2_<?php echo $db_res2[$i]["client_id"];?>"  rows="4" cols="160"></textarea>
                            </div>
							</td></tr>
                            <tr>
                            <td align="left" valign="top" style="padding:5px;"></td>
                            <td style="text-align:left; padding:5px;"> <a onclick="addcomment(<?php echo $db_res2[$i]["client_id"];?>,2)" class="button white" href="#"><span class="icon_text addnew"></span>add comment</a></td>
                           <!-- <input type="hidden" name="client_id" id="client_id" value="<?php //echo $db_res[$i]["client_id"];?>" />-->
                            </tr>
                            </table>
                             <!--</form>-->
							</div>
                            <!-- dnfjdnsjf==============================================-->
							<?php 
							if(trim($db_res2[$i]["agent_comment"])!=''){
							$get_agent_detail2=mysql_fetch_array(mysql_query("select * from ".PREFIX."agent where agent_id='".$db_res2[$i]['agent_id']."'"));
							?>
							<div class="fl typo" style="width:98%; margin-left:2px;">
                            <table width="98%"  cellspacing="2" cellpadding="2" border="0">
                             <tr>
                             <td style="text-align:left">
                             <div class="fl typo">
								<b>Published by: </b>
								<a href="#"><?php echo $get_agent_detail2['agent_name'];?></a> 
							</div>
							
							<div class="fl typo">
								<b>Package Name: </b>
								<a href="#"><?php 
					$pkg2=mysql_fetch_array(mysql_query("select * from ".PREFIX."package where package_id=".$db_res2[$i]['pkg'].""));
					if($pkg2['package_name']!=''){echo $pkg2['package_name'];}else{echo "N/A";}
					?></a> 
							</div>
                            </td>		
                             </tr>
                             <tr><td align="left" valign="top" style="text-align:justify;" colspan="2"><strong>Comment :: </strong> <?php echo $db_res2[$i]["agent_comment"]; ?></td></tr>
							 </table>
                            </div>
                           <?php }?>       	
	<?php 
$get_inq_con2=mysql_query("select * from ".PREFIX."client_inquire where client_id='".$db_res2[$i]["client_id"]."' order by inq_id desc");
if(mysql_num_rows($get_inq_con2)>0){
while($row2=mysql_fetch_array($get_inq_con2))
{
	if($row2['con_id']!=0)
	{
	$get_con2=mysql_fetch_array(mysql_query("select * from ".PREFIX."configure where con_id='".$row2['con_id']."'"));
		$admin_name2=$get_con2['firstname'].' '.$get_con2['lastname']."(Admin)";
	}
	else
	{
		$admin_name2="N/A(Admin)";
	}
?>
                            <div class="fl typo" style="width:98%; margin-left:2px;">
                            <table width="98%"  cellspacing="2" cellpadding="2" border="0">
                             <tr>
                             <td style="text-align:left">
                             <div class="fl typo">
								<b>Published by: </b>
								<a href="#"><?php echo $admin_name2;?></a> 
							</div>
                            <div class="fl typo">
								<b>Published date: </b>
								<a href="#"><?php echo date('d M, Y',strtotime($row2['last_date'])); ?></a> 
							</div>
							
							<div class="fl typo">
								<b>Published Time: </b>
								<a href="#"><?php echo $row2['pub_time']; ?></a> 
							</div>
                            </td>		
                             <td style="text-align:right">
                              <?php if($_SESSION['sess_admintype']=='superadmin')	{ ?>
		 						  <a class="button white" href="#" onclick="edit_rec('<?php echo $row2['inq_id'];?>',2)"><span class="icon_text edit"></span>edit</a>
                                  <?php } ?>	 
		 
		 						 <a class="button white" href="#" onclick="delete_rec('<?php echo $row2['inq_id'];?>')"><span class="icon_text cancel"></span>delete</a>
		
                                  </td></tr>
                             <tr><td align="left" valign="top" style="text-align:justify;" colspan="2"><strong>Topic :: </strong> <?php echo $row2['comment']; ?></td></tr>
							 </table>
                            <!-- <form name="edit_comment" id="edit_comment" action="" method="post">-->
                            <table id="edit_cm_2_<?php echo $row2['inq_id'];?>" width="98%" cellspacing="2" cellpadding="2" border="0" style="display:none;">
							<tr><td align="left" valign="top" style="padding:5px;"><strong>Comment: </strong></td>
							<td align="left" valign="top" style="padding:5px;">
							<div class="fl typo">
                            <textarea name="edit_comment_2_<?php echo $row2['inq_id'];?>" id="edit_comment_2_<?php echo $row2['inq_id'];?>"  rows="4" cols="160"><?php echo $row2['comment'];?></textarea>
                            </div>
							</td></tr>
                            <tr>
                            <td align="left" valign="top" style="padding:5px;"></td>
                            <td style="text-align:left; padding:5px;"> 
                            <a class="button white" href="#" onclick="edit_client_comment(<?php echo $row2['inq_id'];?>,2)"><span class="icon_text edit"></span>edit</a></td>
                            </tr>
                            </table>
                            <!-- </form>-->
                            </div>
		<?php
		}
	}
	else
	{
	?>
    <div class="fl typo" style="width:98%; margin-left:2px;">
		<table border="0" cellpadding="2" cellspacing="2" style="font-size:13px; width:100%;">
		<tr><td align="center" valign="middle" width="100%"><b>No Conversion have been added yet, Add Now.</b></td></tr>
		</table>
		</div>
    <?php
	
	}
	
	
	?>                       
  <!-- dnfjdnsjf==============================================-->
						<div class="clear"></div>
						</td>
                        </tr>
               
			   <?php }?>
			</table>
            <ul class="pagination">
      <li style="padding:3px; float:left;"><a class="button themed" href="clients_detail.php" id="new1"><strong>New </strong>client</a></li>
         <li style="padding:3px; float:left;"><a class="button themed" href="notification.php" id="notify1"><strong>notification </strong></a></li>
        <li style="padding:3px; float:left;"><a class="button themed" href="#" onclick="notify('checkalltabs1[]','Are you sure, you want to add selected records in workplacement')"><strong>add in </strong>workplacement</a></li>
		
		 <li style="padding:3px; float:left;"><a class="button themed" href="#" onclick="send_mail('checkalltabs1[]','Are you sure, you want to sent email?')"><strong>Authentication </strong>Mail</a></li>
		 
         <li style="padding:3px; float:left;"><a class="button themed" href="#" onclick="set_action('checkalltabs1[]','active', 'Are you sure, you want to active selected records?','clients','client_id')"><span class="icon_text accept"></span>active</a></li>
        <li style="padding:3px; float:left;"><a class="button themed" href="#" onclick="set_action('checkalltabs1[]','inactive', 'Are you sure, you want to inactive selected records?','clients','client_id')"><span class="icon_text cancel"></span>inactive</a></li>
        <li style="padding:3px; float:left;"><a class="button themed" href="#" onclick="set_action('checkalltabs1[]','delete', 'Are you sure, you want to delete selected records?','clients','client_id')"><span class="icon_text cancel"></span>delete</a></li>  
     
				<li><strong><?php echo "Total Records".' '.$num_totrec;?></strong></li>
                <li> <?php echo $page_link;?></li>
				</ul>
                 <?php }else{?>
				 <div id="topbar" style="border:#CCC solid 1px;">
       		<strong>Show</strong><?php echo createpagecombo2('1');?><strong>rows </strong>
       		<div style="float:right;">
            <strong>Search</strong>
            <select name="option1" class="textfield" >
           	<option value='name' <?php echo $option == 'name' ?'selected':''?>><?php echo "Name"; ?></option>
			<option value='last_name' <?php echo $option == 'last_name' ?'selected':''?>><?php echo "Last Name"; ?></option>
			<option value='nationality' <?php echo $option == 'nationality' ?'selected':''?>><?php echo "Nationality"; ?></option>		
			<option value='room_title' <?php echo $option == 'room_title' ?'selected':''?>><?php echo "Room Title"; ?></option>		
			<option value='house_title' <?php echo $option == 'house_title' ?'selected':''?>><?php echo "House Title"; ?></option>	
			<option value='date_arrival' <?php echo $option == 'date_arrival' ?'selected':''?>><?php echo "Date Arrival"; ?></option>
			<option value='status' <?php echo $option == 'status' ?'selected':''?>><?php echo "Status"; ?></option>
            </select>
             <input type="text" size="30" name="keyword1"  value="<?php echo $keyword;?>" class="textfield" id="keyword1">&nbsp;<img id="Hasta_icono0" src="gfx/datepicker.png" />
             <a class="button themed" href="#" onclick="search_content('1')"><strong>search </strong></a>
            </div>
        </div>
              	<div class="column full">
    			<span class="message information"><strong>No Records Found</strong></span>
    			</div>
				 <ul class="pagination">
      <li style="padding:3px; float:left;"><a class="button themed" href="clients_detail.php" id="new1"><strong>New </strong>client</a></li>
	  </ul>
             <?php }?> 
            </div>
            
             <div id="tabs-3">
             <?php
			$n=$_REQUEST['n'];
			$sorton=$_REQUEST['sorton'];
			$sorttype=$_REQUEST['sorttype'];
			$option=$_REQUEST['option2'];
			$keyword=$_REQUEST['keyword2'];
			 if($option=='' && $$keyword=='')
			 {
			$y= date('Y-m-d',mktime(0,0,0,date('m'),date('d'),date('Y')-1));
			$extra_search_cond= "date_arrival<='".$y."'";
			}
			$num_totrec = $obj->count_common_detail($option, $keyword,PREFIX.'clients',$extra_search_cond);
			$var_extra= $var_extra . "&num_totrec2=" . $num_totrec;
			$var_extra = $var_extra . "&n2=" . $n;
			$var_extra = $var_extra . "&tab=2";
			include(FUNCTION_PATH."paging2.php");
			if (!isset($sorton)) $sorton = "name";
			if (!isset($sorttype)) $sorttype = "ASC";
			$db_res3 = $obj->get_common_detail($sorton, $sorttype, $option, $keyword, $var_limit,PREFIX.'clients',$extra_search_cond);
			 ?>
            <?php if (count($db_res3)) { ?> 
			<table class="tablebox">
            <div id="topbar" style="border:#CCC solid 1px;">
       		<strong>Show</strong><?php echo createpagecombo3('2');?><strong>rows </strong>
            <div style="float:right;">
            <strong>Search</strong>
            <select name="option2" class="textfield" >
           	<option value='name' <?php echo $option == 'name' ?'selected':''?>><?php echo "Name"; ?></option>
			<option value='last_name' <?php echo $option == 'last_name' ?'selected':''?>><?php echo "Last Name"; ?></option>
			<option value='email' <?php echo $option == 'email' ?'selected':''?>><?php echo "Email"; ?></option>
			<option value='nationality' <?php echo $option == 'nationality' ?'selected':''?>><?php echo "Nationality"; ?></option>	
			<option value='date_arrival' <?php echo $option == 'date_arrival' ?'selected':''?>><?php echo "Date Arrival"; ?></option>
			<option value='status' <?php echo $option == 'status' ?'selected':''?>><?php echo "Status"; ?></option>
            </select>
             <input type="text" size="30" name="keyword2"  value="<?php echo $keyword;?>" class="textfield" id="keyword2" onkeypress="runScript(event,'2')">&nbsp;<img id="Hasta_icono0" src="gfx/datepicker.png" />
             <a class="button themed" href="#" onclick="search_content('2')"><strong>search </strong></a>
            </div>
        	</div>
					<thead class="table-header">
					<tr>
                      	<th class="first tc"><input type="checkbox" id="checkboxalltabs2"/> </th>
						<th>Agent</th>
						<th><a href=index.php?file=client_listing&sorton=name&sorttype=ASC&n=<?php echo $n ?>&tab=2><img src="images1/down.gif" border="0" /></a>&nbsp;<?php echo "Name"; ?>&nbsp;<a href=index.php?file=client_listing&sorton=name&sorttype=DESC&n=<?php echo $n ?>&tab=2><img src="images1/up.gif" border="0" /></a></th>
                        <th><a href=index.php?file=client_listing&sorton=email&sorttype=ASC&n=<?php echo $n ?>&tab=2><img src="images1/down.gif" border="0" /></a>&nbsp;<?php echo "Email"; ?>&nbsp;<a href=index.php?file=client_listing&sorton=email&sorttype=DESC&n=<?php echo $n ?>&tab=2><img src="images1/up.gif" border="0" /></a></th>
                        <th><a href=index.php?file=client_listing&sorton=nationality&sorttype=ASC&n=<?php echo $n ?>&tab=2><img src="images1/down.gif" border="0" /></a>&nbsp;<?php echo "Nationality"; ?>&nbsp;<a href=index.php?file=client_listing&sorton=nationality&sorttype=DESC&n=<?php echo $n ?>&tab=2><img src="images1/up.gif" border="0" /></a></th>
						<!--<th><?php //echo "Pkg."; ?></th>-->
                        <th><?php echo "Interview"; ?></th>
						<th>Print.Doc</th>
                         <th><?php echo "Interview Status"; ?></th>
				
                        <th><?php echo "Doc."; ?></th>
                        <th><?php echo "Inv."; ?></th>
                        <th><?php echo "Contract."; ?></th>
                        <th><?php echo "NIN"; ?></th>
                        <th><a href=index.php?file=client_listing&sorton=date_arrival&sorttype=ASC&n=<?php echo $n ?>&tab=2><img src="images1/down.gif" border="0" /></a>&nbsp;<?php echo "Arrival"; ?>&nbsp;<a href=index.php?file=client_listing&sorton=date_arrival&sorttype=DESC&n=<?php echo $n ?>&tab=2><img src="images1/up.gif" border="0" /></a></th>
						<th><a href=index.php?file=client_listing&sorton=status&sorttype=ASC&n=<?php echo $n ?>&tab=2><img src="images1/down.gif" border="0" /></a>&nbsp;<?php echo "Status"; ?>&nbsp;<a href=index.php?file=client_listing&sorton=status&sorttype=DESC&n=<?php echo $n ?>&tab=2><img src="images1/up.gif" border="0" /></a></th>
				</thead>
			
          <?php for($i = 0;$i < count($db_res3);$i++) { 
		  $k=$i+1;
		  if($k%2==0)
		  {
			  $fc="even";
		  }
		  else
		  {
			  $fc="odd";
		  }

		  ?>	
					<tr class="<?php echo $fc;?>">
                        <td class=" first tc"><input type="checkbox" name="checkalltabs2[]" value="<?php echo $db_res3[$i]["client_id"];?>" /> </td>
                            <td>
							<?php
								$sql_ag = "select * from ".PREFIX."agent where agent_id = '".$db_res3[$i]['agent_id']."'";
								$res_ag = mysql_query($sql_ag);
								$row_ag = mysql_fetch_array($res_ag);
								echo $row_ag['agent_name'];
								//echo $db_res[$i]['agent_id'];
							?>
                            </td>
                            
                          <td align="center" onclick="status_edit(<?php echo $db_res3[$i]['client_id'];?>)" style="cursor:pointer;">
				<?php echo stripslashes($db_res3[$i]['name']);?></td>
			<td align="center"><?php echo $db_res3[$i]['email'];?></td>
			<td align="center"><?php echo $db_res3[$i]['nationality'];?></td>
			
            <td align="center">
				<a href="all_interview.php?q=<?php echo $db_res3[$i]['client_id'];?>" id="all_int1<?php echo $db_res3[$i]['client_id'];?>">
				
				<img src="images1/client.jpg" border="0" style="cursor:pointer;" /></a>
			
            			 <script>
							$(document).ready(function() {
								$("#all_int1<?php echo $db_res3[$i]['client_id'];?>").fancybox({
												'width'				: '80%',
												'height'			: '100%',
												'autoScale'			: true,
												'transitionIn'		: 'elastic',
												'transitionOut'		: 'elastic',
												'type'				: 'iframe',
												'scrolling'			: 'none'
											});
								});

							</script> 
			</td>
			
			<td><img src="images1/printdoc.png" border="0" style="cursor:pointer;" onclick="print_all(<?php echo $db_res3[$i]["client_id"];?>)"/></td>

            
            <td align="center">
            <?php
          			$sql_istatus = "select * from ".PREFIX."clients where client_id = '".$db_res3[$i]['client_id']."'";
					$res_istatus = mysql_query($sql_istatus);
					$row_istatus = mysql_fetch_array($res_istatus);
					echo $row_istatus['istatus'];
			?>
            </td>
            
			<td align="center">
			<a href="document_listing.php?i=<?php echo $db_res3[$i]['client_id'];?>" id="doc3_<?php echo $db_res3[$i]['client_id'];?>">
							<img src="images1/doc.jpg" border="0" width="25" height="20" style="cursor:pointer;"  />
							</a>
                            <script>
							$(document).ready(function() {
								$("#doc3_<?php echo $db_res3[$i]['client_id'];?>").fancybox({
												'width'				: '80%',
												'height'			: '100%',
												'autoScale'			: true,
												'transitionIn'		: 'elastic',
												'transitionOut'		: 'elastic',
												'type'				: 'iframe',
												'scrolling'			: 'none'
											});
								});

							</script> 
			</td>
            
			<td>
             <a href="payment_report_client.php?cid=<?php echo $db_res3[$i]['client_id']; ?>" id="invoice3_<?php echo $db_res3[$i]['client_id'];?>">
             <img src="images1/invoice.jpg" border="0" height="17" width="13"  />
            </a>
                             <script>
							$(document).ready(function() {
								$("#invoice3_<?php echo $db_res3[$i]['client_id'];?>").fancybox({
												'width'				: '80%',
												'height'			: '100%',
												'autoScale'			: true,
												'transitionIn'		: 'elastic',
												'transitionOut'		: 'elastic',
												'type'				: 'iframe',
												'scrolling'			: 'none'
											});
								});

							</script> 
                            </td>
                  
                            <!--<td><?php //echo "Pkg."; ?></td>-->
          <td align="center">
			<?php $get_alloc_cont=mysql_query("select * from ".PREFIX."allocate where client_id='".$db_res3[$i]['client_id']."' order by allocate_id desc limit 1");
			if(mysql_num_rows($get_alloc_cont)>0)
			{
			$get_allocate_id=mysql_fetch_array($get_alloc_cont);
			?>
			<a href="print_contract.php?a=<?php echo $get_allocate_id['allocate_id']; ?>" id="contract_3_<?php echo $db_res3[$i]['client_id'];?>"><img src="images1/pdf.jpg" border="0" height="30" width="30" /></a>
             <script>
							$(document).ready(function() {
								$("#contract_3_<?php echo $db_res3[$i]['client_id'];?>").fancybox({
												'width'				: '80%',
												'height'			: '100%',
												'autoScale'			: true,
												'transitionIn'		: 'elastic',
												'transitionOut'		: 'elastic',
												'type'				: 'iframe',
												'scrolling'			: 'none'
											});
								});

							</script> 
			<?php  } else { echo "N/A"; }  ?>
			</td>
            
			<td align="center">
			<?php $get_nin=mysql_query("select * from ".PREFIX."nin where client_id='".$db_res3[$i]['client_id']."'");
			if(mysql_num_rows($get_nin)>0)
			{
			$nin=mysql_fetch_array($get_nin);
			?>
			<a href="print_nin.php?a=<?php echo $nin['nin_id']; ?>" id="nin3_<?php echo $db_res3[$i]['client_id'];?>"><img src="images1/todo.jpg" border="0" height="20" width="20" /></a>
             <script>
							$(document).ready(function() {
								$("#nin3_<?php echo $db_res3[$i]['client_id'];?>").fancybox({
												'width'				: '80%',
												'height'			: '100%',
												'autoScale'			: true,
												'transitionIn'		: 'elastic',
												'transitionOut'		: 'elastic',
												'type'				: 'iframe',
												'scrolling'			: 'none'
											});
								});

							</script> 
			<?php    } else { ?>
			<a href="nin_detail.php?client_id2=<?php echo $db_res[$i]['client_id'];?>" id="nin_detail3_<?php echo $db_res3[$i]['client_id'];?>">Add</a>
             <script>
							$(document).ready(function() {
								$("#nin_detail3_<?php echo $db_res3[$i]['client_id'];?>").fancybox({
												'width'				: '80%',
												'height'			: '100%',
												'autoScale'			: true,
												'transitionIn'		: 'elastic',
												'transitionOut'		: 'elastic',
												'type'				: 'iframe',
												'scrolling'			: 'none'
											});
								});

							</script> 
			<?php }  ?>
			</td>
			<td align="center"><?php echo convert_date_ddmmyy($db_res3[$i]['date_arrival']);?></td>
			<?php
			if($db_res3[$i]['status']=='Inactive'||$db_res3[$i]['status']=='inactive' ||$db_res3[$i]['status']=='InActive'){
			?>
			<td class="tc"><span class="bullet bullet-red"></span></td>
			<?php
			}elseif($db_res3[$i]['status']=='active'||$db_res3[$i]['status']=='Active'){
			?>
			<td class="tc"><span class="bullet bullet-green"></span></td>
			<?php
			}else{
			?>
			<td align="center"></td>
			<?php
			}
			?>           
		</tr>
               
			<?php }?>
			</table>
            <ul class="pagination">
     <li style="padding:3px; float:left;"><a class="button themed" href="clients_detail.php" id="new2"><strong>New </strong>client</a></li>
       <li style="padding:3px; float:left;"><a class="button themed" href="notification.php" id="notify2"><strong>notification </strong></a></li>
        <li style="padding:3px; float:left;"><a class="button themed" href="#" onclick="notify('checkalltabs2[]','Are you sure, you want to add selected records in workplacement')"><strong>add in </strong>workplacement</a></li>
		
		 <li style="padding:3px; float:left;"><a class="button themed" href="#" onclick="send_mail('checkalltabs2[]','Are you sure, you want to sent email?')"><strong>Authentication </strong>Mail</a></li>
		 
         <li style="padding:3px; float:left;"><a class="button themed" href="#" onclick="set_action('checkalltabs2[]','active', 'Are you sure, you want to active selected records?','clients','client_id')"><span class="icon_text accept"></span>active</a></li>
        <li style="padding:3px; float:left;"><a class="button themed" href="#" onclick="set_action('checkalltabs2[]','inactive', 'Are you sure, you want to inactive selected records?','clients','client_id')"><span class="icon_text cancel"></span>inactive</a></li>
        <li style="padding:3px; float:left;"><a class="button themed" href="#" onclick="set_action('checkalltabs2[]','delete', 'Are you sure, you want to delete selected records?','clients','client_id')"><span class="icon_text cancel"></span>delete</a></li>  
            
				<li><strong><?php echo "Total Records".' '.$num_totrec;?></strong></li>
                <li> <?php echo $page_link;?></li>
				</ul> 
                 <?php }else{?>
				 <div id="topbar" style="border:#CCC solid 1px;">
       		<strong>Show</strong><?php echo createpagecombo3('2');?><strong>rows </strong>
            <div style="float:right;">
            <strong>Search</strong>
            <select name="option2" class="textfield" >
           	<option value='name' <?php echo $option == 'name' ?'selected':''?>><?php echo "Name"; ?></option>
			<option value='last_name' <?php echo $option == 'last_name' ?'selected':''?>><?php echo "Last Name"; ?></option>
			<option value='email' <?php echo $option == 'email' ?'selected':''?>><?php echo "Email"; ?></option>
			<option value='nationality' <?php echo $option == 'nationality' ?'selected':''?>><?php echo "Nationality"; ?></option>	
			<option value='date_arrival' <?php echo $option == 'date_arrival' ?'selected':''?>><?php echo "Date Arrival"; ?></option>
			<option value='status' <?php echo $option == 'status' ?'selected':''?>><?php echo "Status"; ?></option>
            </select>
             <input type="text" size="30" name="keyword2"  value="<?php echo $keyword;?>" class="textfield" id="keyword2">&nbsp;<img id="Hasta_icono0" src="gfx/datepicker.png" />
             <a class="button themed" href="#" onclick="search_content('2')"><strong>search </strong></a>
            </div>
        	</div>
              	<div class="column full">
    			<span class="message information"><strong>No Records Found</strong></span>
    			</div>
				 <ul class="pagination">
     <li style="padding:3px; float:left;"><a class="button themed" href="clients_detail.php" id="new2"><strong>New </strong>client</a></li></ul>
             <?php }?> 
   
            </div>
            
             <div id="tabs-4">
            <?php
			$n=$_REQUEST['n'];
			$sorton=$_REQUEST['sorton'];
			$sorttype=$_REQUEST['sorttype'];
			$option=$_REQUEST['option3'];
			$keyword=$_REQUEST['keyword3'];
			 if($option=='' && $$keyword=='')
			 {
		 	$z=date('Y-m-d');		 
			$extra_search_cond= "date_arrival>='".$z."'";
			}
			$num_totrec = $obj->booked_total($option, $keyword,PREFIX.'clients',$extra_search_cond);
			$var_extra= $var_extra . "&num_totrec3=" . $num_totrec;
			$var_extra = $var_extra . "&n3=" . $n;
			$var_extra = $var_extra . "&tab=3";
			include(FUNCTION_PATH."paging3.php");
			if (!isset($sorton)) $sorton = "name";
			if (!isset($sorttype)) $sorttype = "ASC";
			$db_res4 = $obj->booked_query($sorton, $sorttype, $option, $keyword, $var_limit,PREFIX.'clients',$extra_search_cond);
			 ?>
            <?php if (count($db_res4)) { ?> 
			<table class="tablebox">
            <div id="topbar" style="border:#CCC solid 1px;">
       		<strong>Show</strong><?php echo createpagecombo4('3');?><strong>rows </strong>
             <div style="float:right;">
            <strong>Search</strong>
            <select name="option3" class="textfield" >
           	<option value='name' <?php echo $option == 'name' ?'selected':''?>><?php echo "Name"; ?></option>
			<option value='last_name' <?php echo $option == 'last_name' ?'selected':''?>><?php echo "Last Name"; ?></option>
			<option value='email' <?php echo $option == 'email' ?'selected':''?>><?php echo "Email"; ?></option>
			<option value='nationality' <?php echo $option == 'nationality' ?'selected':''?>><?php echo "Nationality"; ?></option>	
			<option value='date_arrival' <?php echo $option == 'date_arrival' ?'selected':''?>><?php echo "Date Arrival"; ?></option>
			<option value='status' <?php echo $option == 'status' ?'selected':''?>><?php echo "Status"; ?></option>
            </select>
             <input type="text" size="30" name="keyword3"  value="<?php echo $keyword;?>" class="textfield" id="keyword3" onkeypress="runScript(event,'3')">&nbsp;<img id="Hasta_icono0" src="gfx/datepicker.png" />
             <a class="button themed" href="#" onclick="search_content('3')"><strong>search </strong></a>
            </div>
        	</div>
					<thead class="table-header">
					<tr>
                      	<th class="first tc"><input type="checkbox" id="checkboxalltabs3"/> </th>
						<th>Agent</th>
						<th><a href=index.php?file=client_listing&sorton=name&sorttype=ASC&n=<?php echo $n ?>&tab=3><img src="images1/down.gif" border="0" /></a>&nbsp;<?php echo "Name"; ?>&nbsp;<a href=index.php?file=client_listing&sorton=name&sorttype=DESC&n=<?php echo $n ?>&tab=3><img src="images1/up.gif" border="0" /></a></th>
                        <th><a href=index.php?file=client_listing&sorton=email&sorttype=ASC&n=<?php echo $n ?>&tab=3><img src="images1/down.gif" border="0" /></a>&nbsp;<?php echo "Email"; ?>&nbsp;<a href=index.php?file=client_listing&sorton=email&sorttype=DESC&n=<?php echo $n ?>&tab=3><img src="images1/up.gif" border="0" /></a></th>
                        <th><a href=index.php?file=client_listing&sorton=nationality&sorttype=ASC&n=<?php echo $n ?>&tab=3><img src="images1/down.gif" border="0" /></a>&nbsp;<?php echo "Nationality"; ?>&nbsp;<a href=index.php?file=client_listing&sorton=nationality&sorttype=DESC&n=<?php echo $n ?>&tab=3><img src="images1/up.gif" border="0" /></a></th>
						<!--<th><?php //echo "Pkg."; ?></th>-->
                        <th><?php echo "Interview"; ?></th>
						<th>Print.Doc</th>
                         <th><?php echo "Interview Status"; ?></th>
                        <th><?php echo "Doc."; ?></th>
                        <th><?php echo "Inv."; ?></th>
                        <th><?php echo "Contract."; ?></th>
                        <th><?php echo "NIN"; ?></th>
                        <th><a href=index.php?file=client_listing&sorton=date_arrival&sorttype=ASC&n=<?php echo $n ?>&tab=3><img src="images1/down.gif" border="0" /></a>&nbsp;<?php echo "Arrival"; ?>&nbsp;<a href=index.php?file=client_listing&sorton=date_arrival&sorttype=DESC&n=<?php echo $n ?>&tab=3><img src="images1/up.gif" border="0" /></a></th>
						<th><a href=index.php?file=client_listing&sorton=status&sorttype=ASC&n=<?php echo $n ?>&tab=3><img src="images1/down.gif" border="0" /></a>&nbsp;<?php echo "Status"; ?>&nbsp;<a href=index.php?file=client_listing&sorton=status&sorttype=DESC&n=<?php echo $n ?>&tab=3><img src="images1/up.gif" border="0" /></a></th>
				</thead>
			
          <?php for($i = 0;$i < count($db_res4);$i++) { 
		  $k=$i+1;
		  if($k%2==0)
		  {
			  $fc="even";
		  }
		  else
		  {
			  $fc="odd";
		  }

		  ?>	
					<tr class="<?php echo $fc;?>">
                        <td class=" first tc"><input type="checkbox" name="checkalltabs3[]" value="<?php echo $db_res4[$i]["client_id"];?>" /> </td>
                            <td>
							<?php
								$sql_ag = "select * from ".PREFIX."agent where agent_id = '".$db_res4[$i]['agent_id']."'";
								$res_ag = mysql_query($sql_ag);
								$row_ag = mysql_fetch_array($res_ag);
								echo $row_ag['agent_name'];
								//echo $db_res[$i]['agent_id'];
							?>
                            </td>
                            
                          <td align="center" onclick="status_edit(<?php echo $db_res4[$i]['client_id'];?>)" style="cursor:pointer;">
				<?php echo stripslashes($db_res4[$i]['name']);?></td>
			<td align="center"><?php echo $db_res4[$i]['email'];?></td>
			<td align="center"><?php echo $db_res4[$i]['nationality'];?></td>
			
            <td align="center">
				<a href="all_interview.php?q=<?php echo $db_res4[$i]['client_id'];?>" id="all_int2<?php echo $db_res4[$i]['client_id'];?>">
				
				<img src="images1/client.jpg" border="0" style="cursor:pointer;" /></a>
			
            			 <script>
							$(document).ready(function() {
								$("#all_int2<?php echo $db_res4[$i]['client_id'];?>").fancybox({
												'width'				: '80%',
												'height'			: '100%',
												'autoScale'			: true,
												'transitionIn'		: 'elastic',
												'transitionOut'		: 'elastic',
												'type'				: 'iframe',
												'scrolling'			: 'none'
											});
								});

							</script> 
			</td>
          <td><img src="images1/printdoc.png" border="0" style="cursor:pointer;" onclick="print_all(<?php echo $db_res4[$i]["client_id"];?>)"/></td>

            <td align="center">
            <?php
          			$sql_istatus = "select * from ".PREFIX."clients where client_id = '".$db_res4[$i]['client_id']."'";
					$res_istatus = mysql_query($sql_istatus);
					$row_istatus = mysql_fetch_array($res_istatus);
					echo $row_istatus['istatus'];
			?>
            </td>
            
			<td align="center">
			<a href="document_listing.php?i=<?php echo $db_res4[$i]['client_id'];?>" id="doc4_<?php echo $db_res4[$i]['client_id'];?>">
							<img src="images1/doc.jpg" border="0" width="25" height="20" style="cursor:pointer;"  />
							</a>
                            <script>
							$(document).ready(function() {
								$("#doc4_<?php echo $db_res4[$i]['client_id'];?>").fancybox({
												'width'				: '80%',
												'height'			: '100%',
												'autoScale'			: true,
												'transitionIn'		: 'elastic',
												'transitionOut'		: 'elastic',
												'type'				: 'iframe',
												'scrolling'			: 'none'
											});
								});

							</script> 
			</td>
            
			<td>
             <a href="payment_report_client.php?cid=<?php echo $db_res4[$i]['client_id']; ?>" id="invoice4_<?php echo $db_res4[$i]['client_id'];?>">
             <img src="images1/invoice.jpg" border="0" height="17" width="13"  />
            </a>
                             <script>
							$(document).ready(function() {
								$("#invoice4_<?php echo $db_res4[$i]['client_id'];?>").fancybox({
												'width'				: '80%',
												'height'			: '100%',
												'autoScale'			: true,
												'transitionIn'		: 'elastic',
												'transitionOut'		: 'elastic',
												'type'				: 'iframe',
												'scrolling'			: 'none'
											});
								});

							</script> 
                            </td>
                  
                            <!--<td><?php //echo "Pkg."; ?></td>-->
          <td align="center">
			<?php $get_alloc_cont=mysql_query("select * from ".PREFIX."allocate where client_id='".$db_res4[$i]['client_id']."' order by allocate_id desc limit 1");
			if(mysql_num_rows($get_alloc_cont)>0)
			{
			$get_allocate_id=mysql_fetch_array($get_alloc_cont);
			?>
			<a href="print_contract.php?a=<?php echo $get_allocate_id['allocate_id']; ?>" id="contract_4_<?php echo $db_res4[$i]['client_id'];?>"><img src="images1/pdf.jpg" border="0" height="30" width="30" /></a>
            <script>
							$(document).ready(function() {
								$("#contract_4_<?php echo $db_res4[$i]['client_id'];?>").fancybox({
												'width'				: '80%',
												'height'			: '100%',
												'autoScale'			: true,
												'transitionIn'		: 'elastic',
												'transitionOut'		: 'elastic',
												'type'				: 'iframe',
												'scrolling'			: 'none'
											});
								});

							</script> 
			<?php  } else { echo "N/A"; }  ?>
			</td>
            
			<td align="center">
			<?php $get_nin=mysql_query("select * from ".PREFIX."nin where client_id='".$db_res4[$i]['client_id']."'");
			if(mysql_num_rows($get_nin)>0)
			{
			$nin=mysql_fetch_array($get_nin);
			?>
			<a href="print_nin.php?a=<?php echo $nin['nin_id']; ?>" id="nin4_<?php echo $db_res4[$i]['client_id'];?>"><img src="images1/todo.jpg" border="0" height="20" width="20" /></a>
             <script>
							$(document).ready(function() {
								$("#nin4_<?php echo $db_res4[$i]['client_id'];?>").fancybox({
												'width'				: '80%',
												'height'			: '100%',
												'autoScale'			: true,
												'transitionIn'		: 'elastic',
												'transitionOut'		: 'elastic',
												'type'				: 'iframe',
												'scrolling'			: 'none'
											});
								});

							</script> 
			<?php    } else { ?>
			<a href="nin_detail.php?client_id2=<?php echo $db_res[$i]['client_id'];?>" id="nin_detail4_<?php echo $db_res4[$i]['client_id'];?>">Add</a>
             <script>
							$(document).ready(function() {
								$("#nin_detail4_<?php echo $db_res4[$i]['client_id'];?>").fancybox({
												'width'				: '80%',
												'height'			: '100%',
												'autoScale'			: true,
												'transitionIn'		: 'elastic',
												'transitionOut'		: 'elastic',
												'type'				: 'iframe',
												'scrolling'			: 'none'
											});
								});

							</script> 
			<?php }  ?>
			</td>
			<td align="center"><?php echo convert_date_ddmmyy($db_res4[$i]['date_arrival']);?></td>
			<?php
			if($db_res4[$i]['status']=='Inactive'||$db_res4[$i]['status']=='inactive' ||$db_res4[$i]['status']=='InActive'){
			?>
			<td class="tc"><span class="bullet bullet-red"></span></td>
			<?php
			}elseif($db_res4[$i]['status']=='active'||$db_res4[$i]['status']=='Active'){
			?>
			<td class="tc"><span class="bullet bullet-green"></span></td>
			<?php
			}else{
			?>
			<td align="center"></td>
			<?php
			}
			?>           
		</tr>
               
			<?php }?>
			</table>
            <ul class="pagination">
    	<li style="padding:3px; float:left;"><a class="button themed" href="clients_detail.php" id="new3"><strong>New </strong>client</a></li>
         <li style="padding:3px; float:left;"><a class="button themed" href="notification.php" id="notify3"><strong>notification </strong></a></li>
        <li style="padding:3px; float:left;"><a class="button themed" href="#" onclick="notify('checkalltabs3[]','Are you sure, you want to add selected records in workplacement')"><strong>add in </strong>workplacement</a></li>
		 <li style="padding:3px; float:left;"><a class="button themed" href="#" onclick="send_mail('checkalltabs3[]','Are you sure, you want to sent email?')"><strong>Authentication </strong>Mail</a></li>
		
        <li style="padding:3px; float:left;"><a class="button themed" href="#" onclick="set_action('checkalltabs3[]','active', 'Are you sure, you want to active selected records?','clients','client_id')"><span class="icon_text accept"></span>active</a></li>
        <li style="padding:3px; float:left;"><a class="button themed" href="#" onclick="set_action('checkalltabs3[]','inactive', 'Are you sure, you want to inactive selected records?','clients','client_id')"><span class="icon_text cancel"></span>inactive</a></li>
        <li style="padding:3px; float:left;"><a class="button themed" href="#" onclick="set_action('checkalltabs3[]','delete', 'Are you sure, you want to delete selected records?','clients','client_id')"><span class="icon_text cancel"></span>delete</a></li>
            
				<li><strong><?php echo "Total Records".' '.$num_totrec;?></strong></li>
                <li> <?php echo $page_link;?></li>
				</ul>
             <?php }else{?>
			 <div id="topbar" style="border:#CCC solid 1px;">
       		<strong>Show</strong><?php echo createpagecombo4('3');?><strong>rows </strong>
             <div style="float:right;">
            <strong>Search</strong>
            <select name="option3" class="textfield" >
           	<option value='name' <?php echo $option == 'name' ?'selected':''?>><?php echo "Name"; ?></option>
			<option value='last_name' <?php echo $option == 'last_name' ?'selected':''?>><?php echo "Last Name"; ?></option>
			<option value='email' <?php echo $option == 'email' ?'selected':''?>><?php echo "Email"; ?></option>
			<option value='nationality' <?php echo $option == 'nationality' ?'selected':''?>><?php echo "Nationality"; ?></option>	
			<option value='date_arrival' <?php echo $option == 'date_arrival' ?'selected':''?>><?php echo "Date Arrival"; ?></option>
			<option value='status' <?php echo $option == 'status' ?'selected':''?>><?php echo "Status"; ?></option>
            </select>
             <input type="text" size="30" name="keyword3"  value="<?php echo $keyword;?>" class="textfield" id="keyword3">&nbsp;<img id="Hasta_icono0" src="gfx/datepicker.png" />
             <a class="button themed" href="#" onclick="search_content('3')"><strong>search </strong></a>
            </div>
        	</div>
              	<div class="column full" style="margin-top:5px;">
    			<span class="message information"><strong>No Records Found</strong></span>
    			</div>
				 <ul class="pagination">
    	<li style="padding:3px; float:left;"><a class="button themed" href="clients_detail.php" id="new3"><strong>New </strong>client</a></li></ul>
             <?php }?>
   
            </div>
			</div>
		</div>
    
            
<?php 
if($tab!='')
{
?>
<script>
	$(".tabs").tabs({ selected: <?php echo $tab;?> });
</script>
<?php
}
else
{
?>
<script>
	$(".tabs").tabs({ selected: 0 });
//datepicker	
	//$("#keyword0").datepicker();
  	$("#Hasta_icono0").click(function() { 
  	$("#keyword0").datepicker( "show" );
 	 });
  //
</script>
<?php
}
?>
				<input type="hidden" name="tab" id="tab" />
                 <input type="hidden" name="add_comment_client_id" id="add_comment_client_id" />  
                <input type="hidden" name="clientid_string" id="clientid_string" /> 
            	<input type="hidden" name="action" id="action" /> 
           </form>
    <!-- form-->           
 </div>
 </div>
<?php
//////////////=========add======
if($_REQUEST['add_comment_client_id'])
	{
		//echo $_REQUEST['add_comment_client_id'];
		if($_REQUEST['comment_'.$_REQUEST['tab'].'_'.$_REQUEST['add_comment_client_id']]!='')
		{
		$insert_com=mysql_query("insert into ".PREFIX."client_inquire(`client_id`,`comment`,`last_date`,`pub_time`,con_id)values('".$_REQUEST['add_comment_client_id']."','".$_REQUEST['comment_'.$_REQUEST['tab'].'_'.$_REQUEST['add_comment_client_id']]."','".date('Y-m-d')."','".date("h:i:s a", time())."',".$_SESSION['sess_adminid'].")");
		 echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php?file=client_listing&msgtextclients=Records added successfully\">";
		}
	}
//////////////========= end === add======
/////===============edit comment=========
if($_REQUEST['add_comment_client_id'])
	{
		if($_REQUEST['edit_comment_'.$_REQUEST['tab'].'_'.$_REQUEST['add_comment_client_id']]!='')
		{
		$insert_com=mysql_query("update ".PREFIX."client_inquire set `comment`='".$_REQUEST['edit_comment_'.$_REQUEST['tab'].'_'.$_REQUEST['add_comment_client_id']]."' where `inq_id`='".$_REQUEST['add_comment_client_id']."'");
		 echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php?file=client_listing&msgtextclients=Records updated successfully\">";
		}
	}
/////=============end==edit comment=========

?> 
