<?php
	require_once("config.php");
	
	/*
	 * Returns a line of HTML that displays the media inputed, whether it be audio, images, or video.
	 */
	function showMedia($media) 
	{
		if($media['type'] == "image")
		{
			print("<img src=\"" . $media['address'] . "\" alt=\"hi\">");
		}
		else if($media['type'] == "audio")
		{
			print("<audio controls>
					  <source src=\"" . $media['address'] . "\">
					</audio>");
		}
		else if($media['type'] == "document")
		{
			print("<embed src=\"" .$media['address'] . "\" width=\"600\" height=\"500\" alt=\"pdf\" pluginspage=\"http://www.adobe.com/products/acrobat/readstep2.html\">");
		}
	}
?>