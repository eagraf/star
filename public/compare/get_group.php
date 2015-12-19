<?php
	// configuration
    require("../../includes/config.php");
	
	//Get the group type
	$group_type = query("SELECT type FROM groups WHERE id = '". $_SESSION['group_id'] . "';");
	//Get all relevant users
	if($group_type[0]['type'] != "Users"){
		//determine which media to get off group type
		switch($group_type[0]['type']){
			case "Images":
				$group_object = query("SELECT * FROM compare_object_group WHERE group_id = '" . $_SESSION['group_id'] . "' AND type = 'image';");
				break;
			case "Audio":
				$group_object = query("SELECT * FROM compare_object_group WHERE group_id = '" . $_SESSION['group_id'] . "' AND type = 'audio';");
				break;
			case "Documents":
				$group_object = query("SELECT * FROM compare_object_group WHERE group_id = '" . $_SESSION['group_id'] . "' AND type = 'document';");
				break;
			default:
				$group_object = query("SELECT * FROM compare_object_group WHERE group_id = '" . $_SESSION['group_id'] . "';");
				break;
		}
		
	}else{
		$group_object = query("SELECT * FROM group_member WHERE group_id = '" . $_SESSION['group_id'] . "';");
	}
	
	
	//Get all relevant categories
	$categories = query("SELECT * FROM categories WHERE group_id = '" . $_SESSION['group_id'] . "';");
	
	//Get current user.
	$user = query("SELECT * FROM users WHERE id='" . $_SESSION["id"] . "';")[0];
	$name = query("SELECT name FROM groups WHERE id='" . $_SESSION["group_id"] . "';");
	$name = $name[0]["name"];
	
	$objects = array();
	$group = ["objects" => $objects, "categories" => $categories, "user" => $user, "name" => $name];
	
	foreach($group_object as $object) {
		if($group_type[0]['type'] != "Users"){
			$user = query("SELECT * FROM users WHERE id='" . $object["owner_id"] . "';")[0];
			$media = query("SELECT * FROM media WHERE id='" . $object["object_id"] . "';")[0];
		
			$object["user_name"] = $user["name"];
			$object["name"] = $media["name"];
			$object["address"] = $media["address"];
			$object["type"] = $media["type"];
		}else{
			$user = query("SELECT * FROM users WHERE id='" . $object["user_id"] . "';")[0];
		
			$object["name"] = $user["name"];
			$object["address"] = "";
			$object["type"] = "User";
		}
		
		array_push($group["objects"], $object);
	}
	
	// Return all the objects in JSON format which can be recieved by JavaScript.
    header("Content-type: application/json");
    print(json_encode($group, JSON_PRETTY_PRINT));
?>