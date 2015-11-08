<?php
	require("../includes/config.php");
	$user = 'root';
	$pass = '';
	$db = 'star';
	
	$name = "Sam Rackey";
	$email = "SamRCR71@gmail.com";
	$hash = password_hash("goat", PASSWORD_DEFAULT);
	
	$query = "INSERT INTO users (name, email, hash) VALUES ('" . $name . "', '" . $email . "', '" . $hash . "');";
	$db = new mysqli('localhost', 'root', '', 'star') or die("unable to connect");
	$result = mysqli_query($db, $query);
	render("index_view.php", ["title" => "Welcome"]); 
?>