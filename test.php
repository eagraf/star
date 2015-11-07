<?php
	$user = 'root';
	$pass = '';
	$db = 'startest';
	
	$db = new mysqli('localhost', $user, $pass, $db) or die("unable to connect");
	$result = mysqli_query($db, "SELECT name FROM `users` where `id` = 3;");
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	print $row['name'];
?>