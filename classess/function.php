<?php
/*login Check Function To avoid SQl Injection
paramater:(Value to Check)
return:Pure String Without stripslashes
*/  
function check_input($value)
{
// Stripslashes
if (get_magic_quotes_gpc())
  {
  $value = stripslashes($value);
  }
// Quote if not a number
if (!is_numeric($value))
  {
  $value = "" . mysql_real_escape_string($value) . "";
  }
return $value;
}


/*Description Short Funtion
paramater:(TextValue,Character Limit in Number)
return:Define character text Value without HTML Tags	
*/
function shorter($text, $chars_limit)
{
	if (strlen($text) > $chars_limit) 
	   
    return substr($text, 0, strrpos(substr($text, 0, $chars_limit), " ")).'...';
	
    else return $text;
}

 /*@name:RedirectTo
 @para :url 
 @Usage:redirct url
*/
function RedirectTo($url) 
{

		$javascriptOff = false;
		
		echo "<div><b>Redirecting...</b></div>";
		if (headers_sent()) {//if header already sent then javascript refresh
			echo "<script>document.location.href='$url';</script>\n";
			$javascriptOff = true;
		} else {//header not sent then header redirection
			@ob_end_clean(); // clear output buffer
			header( 'HTTP/1.1 301 Moved Permanently' );
			header( "Location: ". $url );
		}
		if($javascriptOff){//if javascript is off then standard meta refresh
			//@ob_end_clean(); // clear output buffer
			echo "<meta http-equiv='refresh' content='0;url=".$url."'>";
		}
		//exit();//exit application if not redirected
	}
  
function format_date($date)
{

 $originalDate = $date;
 $newDate = date("dS, F Y", strtotime($originalDate));
 return $newDate;
	
}

function format_blog_date($date)
{

 $originalDate = $date;
 $newDate = date("d F , Y", strtotime($originalDate));
 return $newDate;
	
}

function format_date_time($datetime)
{

 $timezone = new DateTimeZone("Asia/Kolkata" );
$date = new datetime($datetime);
$date->setTimezone($timezone );
return  $date->format( 'D, M jS, Y  g:i:s A' );
	
}


function time_ago($ptime)
{
                      $ex_login=explode(' ',$ptime);
       
                      $log_date=$ex_login[0];
                      $log_time=$ex_login[1];
                       
                       $ex_log_time=explode(':',$log_time);
                       
                       
                       $log_today = date("Y-m-d");
                       $log_day_diff = abs(strtotime($log_today) - strtotime($log_date));
                       $log_day = floor($log_day_diff / (60*60*24));
                       
              			 $dDf=$log_day;

						$current_hour=date('H');                  $ref_hour=$ex_log_time[0];
						$current_min=date('i');                        $ref_min=$ex_log_time[1];
						$current_seconds=date('s');                $ref_seconds=$ex_log_time[2];
						
											   
						$hDf = $current_hour-$ref_hour;
						$mDf = $current_min-$ref_min;
						$sDf = $current_seconds-$ref_seconds;
						
						// Show time difference ex: 2 min 54 sec ago.
						if($dDf<1){
						if($hDf>0){
						if($mDf<0){
						$mDf = 60 + $mDf;
						$hDf = $hDf - 1;
						echo $mDf . ' min ago';
						} else {
						echo $hDf. ' hr ' . $mDf . ' min ago';
						}
						} else {
						if($mDf>0){
						echo $mDf . ' min ago';
						} else {
						echo $sDf . ' sec ago';
						}
						}
						} else {
						echo $dDf . ' days ';
						
						if($hDf>0){
						if($mDf<0){
						$mDf = 60 + $mDf;
						$hDf = $hDf - 1;
						echo $mDf . ' min ago';
						} else {
						echo $hDf. ' hr ' . $mDf . ' min';
						}
						} else {
						if($mDf>0){
						echo $mDf . ' min';
						} else {
						echo $sDf . ' sec ago';
						}
						}
						
						
						}
						
}


/*create watermark image 
input:old image Name, new image name
output:ture Or False
*/
function watermark_image($oldimage_name, $new_image_name,$height,$width)
{

							global $image_path;
							list($owidth,$oheight) = getimagesize($oldimage_name);
							
							 $width = $width;
							 $height =$height;							
							$im = imagecreatetruecolor($width, $height);
							$img_src = imagecreatefromjpeg($oldimage_name);
							imagecopyresampled($im, $img_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
							$watermark = imagecreatefrompng($image_path);
							list($w_width, $w_height) = getimagesize($image_path);        
							$pos_x = $width - $w_width; 
							$pos_y = $height - $w_height;
							imagecopy($im, $watermark, $pos_x, $pos_y, 0, 0, $w_width, $w_height);
							imagejpeg($im, $new_image_name, 100);
							imagedestroy($im);
							unlink($oldimage_name);
							return true;
}

/*URL CHECK FUNCTION
input:URL You what to checl
output:ture Or False
*/
function urlExist($url)
{
                $handle   = curl_init($url);
                if (false === $handle)
                {
                        return false;
                }
                curl_setopt($handle, CURLOPT_HEADER, false);
                curl_setopt($handle, CURLOPT_FAILONERROR, true);  // this works
                curl_setopt($handle, CURLOPT_HTTPHEADER, Array("User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.15) Gecko/20080623 Firefox/2.0.0.15") ); // request as if Firefox
                curl_setopt($handle, CURLOPT_NOBODY, true);
                curl_setopt($handle, CURLOPT_RETURNTRANSFER, false);
                $connectable = curl_exec($handle);
                ##print $connectable;
                curl_close($handle);
                return $connectable;
}

function breadcrumbs($separator = ' &raquo; ', $home = 'Home') {
    // This gets the REQUEST_URI (/path/to/file.php), splits the string (using '/') into an array, and then filters out any empty values
    $path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));

    // This will build our "base URL" ... Also accounts for HTTPS :)
    $base = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

    // Initialize a temporary array with our breadcrumbs. (starting with our home page, which I'm assuming will be the base URL)
    $breadcrumbs = Array("<a  href=\"$base\">$home</a>");

    // Find out the index for the last value in our path array
    $last = end(array_keys($path));

    // Build the rest of the breadcrumbs
    foreach ($path AS $x => $crumb) {
        // Our "title" is the text that will be displayed (strip out .php and turn '_' into a space)
        $title = ucwords(str_replace(Array('.php','.html', '_'), Array('', ' '), $crumb));

        // If we are not on the last index, then display an <a> tag
        if ($x != $last)
            $breadcrumbs[] = "<a  href=\"$base$crumb\">$title</a>";
        // Otherwise, just display the title (minus)
        else
            $breadcrumbs[] = $title;
    }

    // Build our temporary array (pieces of bread) into one big string :)
    return implode($separator, $breadcrumbs);
}

function browser() {
    $ua = strtolower($_SERVER['HTTP_USER_AGENT']);
    // you can add different browsers with the same way ..
    if(preg_match('/(chromium)[ \/]([\w.]+)/', $ua))
            $browser = 'chromium';
    elseif(preg_match('/(chrome)[ \/]([\w.]+)/', $ua))
            $browser = 'chrome';
    elseif(preg_match('/(safari)[ \/]([\w.]+)/', $ua))
            $browser = 'safari';
    elseif(preg_match('/(opera)[ \/]([\w.]+)/', $ua))
            $browser = 'opera';
    elseif(preg_match('/(msie)[ \/]([\w.]+)/', $ua))
            $browser = 'Internet Explorer';
    elseif(preg_match('/(mozilla)[ \/]([\w.]+)/', $ua))
            $browser = 'mozilla';

    preg_match('/('.$browser.')[ \/]([\w]+)/', $ua, $version);

    return array($browser,$version[2], 'name'=>$browser,'version'=>$version[2]);
}


function menu_seo_url($title,$id)
{	
	if(URL_REWRITE == '1')
	{			
		return "./rd-".$title."-".$id.".html";
	}
	else
	{
		return "./gallery.php?category=".$title."&id=".$id;
	}		
}

function blog_seo_url($title,$id)
{	
	if(URL_REWRITE == '1')
	{			
		return "./blog-".$title."-".$id.".html";
	}
	else
	{
		
		return "./blog.php?title=".$title."&id=".$id;
	}		
}

function owner_seo_url($title,$id)
{	
	if(URL_REWRITE == '1')
	{			
		return "./owner-".$id.".html";
	}
	else
	{
		
		return "./owner.php?&id=".$id;
	}		
}

function chat_seo_url($title,$id)
{	
	if(URL_REWRITE == '1')
	{			
		return "./chat-".$id.".html";
	}
	else
	{
		
		return "./contact.php?&id=".$id;
	}		
}

function tag_seo_url($title,$id)
{	
	if(URL_REWRITE == '1')
	{			
		return "./blog-".$title."-".$id.".html";
	}
	else
	{
		
		return "./blog.php?tags=".$title."&id=".$id;
	}		
}


function mail_simple($mailto, $from_mail, $from_name, $replyto, $subject, $message){
	
		
		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		// Additional headers
		$headers .= 'From: '.$from_name." <".$from_mail. ">\r\n";
		$headers .= 'Reply-To: '.$replyto."\r\n";
	
		// Mail it
		//$mailto = 'rekha.rockersinfo@gmail.com';
		mail($mailto, $subject, $message, $headers);
	
	}
	
	function mail_attachment($filename, $path, $mailto, $from_mail, $from_name, $replyto, $subject, $message) {
	
	
		$file = $path;
		$file_size = filesize($file);
		$handle = fopen($file, "r");
		$content = fread($handle, $file_size);
		fclose($handle);
		$content = chunk_split(base64_encode($content));
		$uid = md5(uniqid(time()));
		$name = basename($file);
		$header = "From: ".$from_name." <".$from_mail.">\r\n";
		$header .= "Reply-To: ".$replyto."\r\n";
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
		$header .= "This is a multi-part message in MIME format.\r\n";
		$header .= "--".$uid."\r\n";
		$header .= "Content-type:text/html; charset=iso-8859-1\r\n";
		$header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
		$header .= $message."\r\n\r\n";
		$header .= "--".$uid."\r\n";
		$header .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; // use different content types here
		$header .= "Content-Transfer-Encoding: base64\r\n";
		$header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
		$header .= $content."\r\n\r\n";
		$header .= "--".$uid."--";
		
		//$mailto = 'rekha.rockersinfo@gmail.com';
		mail($mailto, $subject, $message, $header);
	}

 ?>