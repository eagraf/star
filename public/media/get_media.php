<?php
	require("../../includes/config.php");
	
	//Get lists of all images, audio and documents to display to user.
	$media = query("SELECT * FROM media WHERE owner_id='" . $_SESSION['id'] . "';");
	
	// Return media in JSON format which can be recieved by JavaScript.
    header("Content-type: application/json");
    print(json_encode($media, JSON_PRETTY_PRINT));
?>