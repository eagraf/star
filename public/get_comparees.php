<?php
	// configuration
    require("../includes/config.php"); 
	
	//Get all relevant users.
	$group_type = query("SELECT type FROM groups WHERE name = '". $_SESSION['group_id'] . "';");
	if($group_type[0]['type'] != "Users"){
		$group_object = query("SELECT * FROM compare_object_group WHERE group_id = '" . $_SESSION['group_id'] . "';");
	}else{
		$group_object = query("SELECT * FROM group_member WHERE group_id = '" . $_SESSION['group_id'] . "';");
	}
	
	
	//Get all relevant categories
	$group_categories = query("SELECT * FROM categories WHERE group_id = '" . $_SESSION['group_id'] . "';");
	
	
	//Size of group.
	$size = count($group_object);
	$key_a = 0;
	$key_b = 0;
	if($size < 2)
	{
		error("Not enough users to compare.");
	} 
	else
	{
		$key_a = array_rand($group_object);
		$key_c = array_rand($group_categories);
		
		do
		{
			$key_b = array_rand($group_object);
		}
		//Make sure different users are chosen.
		while($key_b == $key_a);
	}
	
	if($group_type[0]['type'] != "Users"){
		$user_a = query("SELECT * FROM users WHERE id='" . $group_object[$key_a]["owner_id"] . "';")[0];
		$user_b = query("SELECT * FROM users WHERE id='" . $group_object[$key_b]["owner_id"] . "';")[0];
	
		$media_a = query("SELECT * FROM media WHERE id='" . $group_object[$key_a]["object_id"] . "' AND type = " . $group_type[0]['type'] . ";")[0];
		$media_b = query("SELECT * FROM media WHERE id='" . $group_object[$key_b]["object_id"] . "' AND type = " . $group_type[0]['type'] . ";")[0];
	
		$object_a = $group_object[$key_a];
		$object_b = $group_object[$key_b];
	
	
		$object_a["name"] = $user_a["name"];
		$object_a["address"] = $media_a["address"];
		$object_a["type"] = $media_a["type"];
		$object_b["name"] = $user_b["name"];
		$object_b["address"] = $media_b["address"];
		$object_b["type"] = $media_b["type"];
	}else{
		$user_a = $group_object[$key_a]['name'];
		$user_b = $group_object[$key_b]['name'];
	
	
		$object_a = $group_object[$key_a];
		$object_b = $group_object[$key_b];
	
	
		$object_a["name"] = $user_a;
		$object_a["address"] = "";
		$object_a["type"] = "Users";
		$object_b["name"] = $user_b;
		$object_b["address"] = "";
		$object_b["type"] = "Users";
		
	}
	
	
	
	//Insert the two users.
	$people = ["object_a" => $object_a, "object_b" => $object_b, "category" => $group_categories[$key_c]];
	
	
	
	
	// Return people in JSON format which can be recieved by JavaScript.
    header("Content-type: application/json");
    print(json_encode($people, JSON_PRETTY_PRINT));
?>