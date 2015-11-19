<?php
	require("../includes/config.php");
	
	//Get lists of all images, audio and documents to display to user.
	$images = query("SELECT * FROM media WHERE owner_id='" . $_SESSION['id'] . "' AND type='" . "image" . "';");
	$audio = query("SELECT * FROM media WHERE owner_id='" . $_SESSION['id'] . "' AND type='" . "audio" . "';");
	$documents = query("SELECT * FROM media WHERE owner_id='" . $_SESSION['id'] . "' AND type='" . "document" . "';");
	
	render("media_view.php", ["images" => $images, "audio"=>$audio, "documents"=>$documents, "title" => "Media"]);
?>