$(document).ready(function() 
{
	var oldText, newText;
  	$(".editable").hover(
		function()
		{
			$(this).addClass("editHover");
		}, 
		function()
		{
			$(this).removeClass("editHover");
		}
	);
  
  	$(".editable").bind("dblclick", replaceHTML);
	 
	 
	$(".btnSave").live("click", 
					function()
					{
						newText = $(this).siblings("form")
										 .children(".editBox")
										 .val().replace(/"/g, "&quot;");
										 
						$(this).parent()
							   .html(newText)
							   .removeClass("noPad")
							   .bind("dblclick", replaceHTML);
					}
					); 
	
	$(".btnDiscard").live("click", 
					function()
					{
						$(this).parent()
							   .html(oldText)
							   .removeClass("noPad")
							   .bind("dblclick", replaceHTML);
					}
					); 
	
	function replaceHTML()
					{
						oldText = $(this).html()
										 .replace(/"/g, "&quot;");
						$(this).addClass("noPad")
							   .html("")
							   .html("<form><input type=\"text\" style='height:20px; width:400px;' class=\"editBox\" value=\"" + oldText + "\" /> </form><a  style='margin-left:30%;margin-top:-200px;' href=\"javascript:void(0);\" class=\"btnDiscard\">Discard changes</a>")
							   .unbind('dblclick', replaceHTML);
			
					}
}
); 

