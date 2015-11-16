<?php
	require("../includes/config.php");
	$user = query("SELECT * FROM `users` WHERE id =" . $_SESSION["id"] . ";");
	
	render("profile_view.php", ["user" => $user]);
?>