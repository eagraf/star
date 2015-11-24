<?php
	require("../includes/config.php");
	
	//Get lists of all images, audio and documents to display to user.
	$images = query("SELECT * FROM media WHERE owner_id='" . $_SESSION['id'] . "' AND type='" . "image" . "';");
	$audio = query("SELECT * FROM media WHERE owner_id='" . $_SESSION['id'] . "' AND type='" . "audio" . "';");
	$documents = query("SELECT * FROM media WHERE owner_id='" . $_SESSION['id'] . "' AND type='" . "document" . "';");
	
	$media = ["images" => $images, "audio" => $audio, "documents" => $documents];
	
	// Return media in JSON format which can be recieved by JavaScript.
    header("Content-type: application/json");
    print(json_encode($media, JSON_PRETTY_PRINT));
?>