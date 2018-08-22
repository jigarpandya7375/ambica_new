<?php
/*
 * Author: Sharp Coders
 */
class ImgMark{
	var $WATERMARK_MARGIN_ADJUST = 5;
	public $font_path; // Font file
	public $font_size; // in pixels
	public $water_mark_text; 
	public $color;
	public $opacity;
	public $rotation;
	public $img_path = null;
	public $img_width=0;
	public $img_height=0;
	
	function imagettfbbox_fixed( $size, $rotation, $font, $text )
	{
		$bb = imagettfbbox( $size, 0, $font, $text );
		$aa = deg2rad( $rotation );
		$cc = cos( $aa );
		$ss = sin( $aa );
		$rr = array( );
		for( $i = 0; $i < 7; $i += 2 )
		{
		  $rr[ $i + 0 ] = round( $bb[ $i + 0 ] * $cc + $bb[ $i + 1 ] * $ss );
		  $rr[ $i + 1 ] = round( $bb[ $i + 1 ] * $cc - $bb[ $i + 0 ] * $ss );
		}
		return $rr;
	}
	function convertImage($img,$filen, $path){
		
		$file = $_FILES[$img]['name'];
		if ($file != ""){
			$path_parts = pathinfo($file);
			$extension=$path_parts['extension'];
			$filename_path=$path.$filen.".".$extension;
			$this->img_path = $filename_path;
			
			if(strtolower($extension)=="jpg" || strtolower($extension)=="jpeg")
			{
			$uploadedfile = $_FILES[$img]['tmp_name'];
			$src = imagecreatefromjpeg($uploadedfile);
			}
			else if(strtolower($extension) == "png")
			{
			$uploadedfile = $_FILES[$img]['tmp_name'];
			$src = imagecreatefrompng($uploadedfile);
			}
			else 
			{
			$src = imagecreatefromgif($uploadedfile);
			}
			list($width,$height)=getimagesize($uploadedfile);

			$newwidth = $this->img_width;
			$newheight = $this->img_height;
			if (($width <= $newwidth && $height<= $newheight) || ($this->img_width == 0 && $this->img_height == 0))
			{
				$newwidth=$width;
				$newheight=$height;
				$tmp=imagecreatetruecolor($width,$height);
			}
			else
			{
				if ($width > $height)
				{
					$newheight=($height/$width)*$newwidth;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
				}else{
					$newwidth=($width/$height)*$newheight;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
				}
			}
			
			$bb = $this->imagettfbbox_fixed( $this->font_size, $this->rotation, $this->font_path, $this->water_mark_text );
	  
			$x0 = min( $bb[ 0 ], $bb[ 2 ], $bb[ 4 ], $bb[ 6 ] ) - $this->WATERMARK_MARGIN_ADJUST;
			$x1 = max( $bb[ 0 ], $bb[ 2 ], $bb[ 4 ], $bb[ 6 ] ) + $this->WATERMARK_MARGIN_ADJUST;
			$y0 = min( $bb[ 1 ], $bb[ 3 ], $bb[ 5 ], $bb[ 7 ] ) - $this->WATERMARK_MARGIN_ADJUST;
			$y1 = max( $bb[ 1 ], $bb[ 3 ], $bb[ 5 ], $bb[ 7 ] ) + $this->WATERMARK_MARGIN_ADJUST;
			$bb_width = abs( $x1 - $x0 );
			$bb_height = abs( $y1 - $y0 );
			$bpy = $newheight / 2 - $bb_height / 2 - $y0;
			$bpx = $newwidth / 2 - $bb_width / 2 - $x0;
			$font_color = imagecolorallocatealpha(
			  $tmp,
			  hexdec( substr( $this->color, 0, 2 ) ),
			  hexdec( substr( $this->color, 2, 2 ) ),
			  hexdec( substr( $this->color, 4, 2 ) ),
			  127 * ( 100 - $this->opacity ) / 100
			);
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
			imagettftext($tmp, $this->font_size, $this->rotation, $bpx, $bpy, $font_color, $this->font_path, $this->water_mark_text);
			imagejpeg($tmp, $this->img_path, 100);
			
			imagedestroy($src);
			imagedestroy($tmp);
			
			//ob_end_flush();
		return true;
		}
	}
}
?>