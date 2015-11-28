<?php
	// configuration
    require("../includes/config.php"); 
	
	//Get all relevant users.
	$group_object = query("SELECT * FROM compare_object_group WHERE group_id = '" . $_SESSION['group_id'] . "';");
	
	//Get all relevant categories
	$categories = query("SELECT * FROM categories WHERE group_id = '" . $_SESSION['group_id'] . "';");
	
	//Get current user.
	$user = query("SELECT * FROM users WHERE id='" . $_SESSION["id"] . "';")[0];
	
	$objects = array();
	$group = ["objects" => $objects, "categories" => $categories, "user" => $user];
	
	foreach($group_object as $object) {
		$user = query("SELECT * FROM users WHERE id='" . $object["owner_id"] . "';")[0];
	
		$media = query("SELECT * FROM media WHERE id='" . $object["object_id"] . "';")[0];
	
	
		$object["name"] = $user["name"];
		$object["address"] = $media["address"];
		$object["type"] = $media["type"];
		
		array_push($group["objects"], $object);
	}
	
	// Return all the objects in JSON format which can be recieved by JavaScript.
    header("Content-type: application/json");
    print(json_encode($group, JSON_PRETTY_PRINT));
?>