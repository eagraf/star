<?php
	
	require("../includes/config.php");
	require("uploader.php");
	
	// if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
		render("upload_view.php", ['title' => 'Upload']);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		startUpload();
    }
	
?>