<?php

    // configuration
    require("../includes/config.php"); 
	require("show.php");

    // else if user reached page via POST (as by submitting a form via POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		//Retrieve the media that was posted.
		if(isset($_POST['media_id']))
		{
			$media = query("SELECT * FROM media WHERE id='" . $_POST['media_id'] . "';")[0];
			
			render("view_media_view.php", ["title" => "View Media", "media" => $media]);
		}
	
		error("No media found.");
    }
?>