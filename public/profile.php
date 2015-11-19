<?php
	require("../includes/config.php");
	$user = query("SELECT * FROM `users` WHERE id =" . $_SESSION["id"] . ";");
	
	$names = query("SELECT * FROM group_member WHERE user_id = '" . $_SESSION['id'] . "';");
	$groups = [];
	foreach ($names as $name)
    {
		$groups[] = [
			"group" => $name["group_id"],
		];
        
    }
	
	render("profile_view.php", ["user" => $user, "groups" => $groups]);
?>