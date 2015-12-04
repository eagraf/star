<?php
	require("../includes/config.php");
	
	//Get lists of all images, audio and documents to display to user.
	$name = query("SELECT name FROM users WHERE id='" . $_SESSION['id'] . "';");
	$name = $name[0]['name'];
	
	$name = ["name" => $name];
	
	// Return media in JSON format which can be recieved by JavaScript.
    header("Content-type: application/json");
    print(json_encode($name, JSON_PRETTY_PRINT));
?>