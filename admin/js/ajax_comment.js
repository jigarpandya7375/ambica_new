$(function() {

$(".submit").click(function() {

var name = $("#name").val();
var email = $("#email").val();

var comment = $("#comment").val();
var post_id = $("#post_id").val();
    var dataString = 'name='+ name + '&email=' + email + '&comment=' + comment + '&post_id=' + post_id;
	
	/*if(name=='' || email=='' || comment=='')
     {
       alert('Please Give Fill All the Details...');
     }*/
	  if (name == "") {
            alert("Pleas Enter your name");
            document.getElementById("name").focus();
            return false;
        }
	   if (email == "") {
            alert("Enter your email id");
            document.getElementById("email").focus();
            return false;
        }
        if (email.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) == -1) {
            alert("Enter a valid email address")
            document.getElementById("email").focus();
            return false;
        }
		
		 if (comment == "") {
            alert("Pleas Enter Your Comment");
            document.getElementById("comment").focus();
            return false;
        }
	 
	else
	{
	$("#flash").show();
	$("#flash").fadeIn(400).html('<img src="http://rameshwar.ambicacaterers.in/images/ajax-loader.gif" align="absmiddle">&nbsp;<span class="loading">Loading Please Wait....</span>');
$.ajax({
	   
		type: "POST",
  url: "commentajax.php",
   data: dataString,
  cache: false,
  success: function(html){
	  alert(html);
  $("ol#update").append(html);
  $("ol#update li:last").fadeIn("slow");
  document.getElementById('email').value='';
   document.getElementById('name').value='';
    document.getElementById('comment').value=''; 
  $("#flash").hide();
	
  }
 });
}
return false;
	});



});

