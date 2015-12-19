<?php
	require("../../includes/config.php");
	
	//Get lists of all images, audio and documents to display to user.
	$names = query("SELECT * FROM group_member WHERE user_id = '" . $_SESSION['id'] . "';");
	$groups = [];
	foreach ($names as $name)
    {
		$group_name = query("SELECT name,description FROM groups WHERE id =" . $name["group_id"] .";");
		$groups[] = [
			"group" => $group_name[0]['name'],
			"desc" => $group_name[0]['description']
		];
        
    }
	
	$groups = ["groups" => $groups];
	
	// Return media in JSON format which can be recieved by JavaScript.
    header("Content-type: application/json");
    print(json_encode($groups, JSON_PRETTY_PRINT));
?>