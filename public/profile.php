<?php
	require("../includes/config.php");
	//get current user
	$user = query("SELECT * FROM `users` WHERE id =" . $_SESSION["id"] . ";");
	
	//get all groups the user is in, and print them
	$names = query("SELECT * FROM group_member WHERE user_id = '" . $_SESSION['id'] . "';");
	$groups = [];
	foreach ($names as $name)
    {
		$group_name = query("SELECT name FROM groups WHERE id =" . $name["group_id"] .";");
		$groups[] = [
			"group" => $group_name[0]['name'],
		];
        
    }
	
	render("profile_view.php", ["user" => $user, "groups" => $groups]);
?>