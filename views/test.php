<?php
	require("../includes/config.php");
	$user = 'root';
	$pass = '';
	$db = 'star';
	$query = "INSERT INTO users ('name, 'email', 'hash') VALUES (" . "Sam Rackey," . "samrcr71@gmail.com," . password_hash("goat", PASSWORD_DEFAULT) . ");"
	$db = new mysqli('localhost', 'root', '', 'star') or die("unable to connect");
	$result = mysqli_query($db, $query);
	render("index_view.php", ["title" => "Welcome"]);
?>