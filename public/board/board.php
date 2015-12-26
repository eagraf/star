<?php
	/*
	 * Backend for leaderboard
	 * Ethan Graf 12/3/15
	 */
	// configuration
    require("../../includes/config.php"); 
	
	if($_GET["type"] == "total") {
		getTotal();
	}
	else if($_GET["type"] == "categories") {
		getCategory();
	}
	else if($_GET["type"] == "users") {
		getUsers();
	}
	else if($_GET["type"] == "groups") {
		getGroups();
	}
	
	function getTotal() {
		$res = array();
		$total_ratings = query("SELECT rating, object_id, type FROM compare_object_group WHERE group_id='" . $_SESSION["group_id"] . "' ORDER BY rating DESC LIMIT 20;");
		foreach($total_ratings as $rating) {
			$object = query("SELECT name, address FROM media WHERE id='" . $rating["object_id"] . "';")[0];
			
			array_push($res, array_merge($rating, $object));
		}
		
		header("Content-type: application/json");
		print(json_encode($res, JSON_PRETTY_PRINT));
	}
	
	function getCategory() {
		$categories = query("SELECT id, category FROM categories WHERE group_id='" . $_SESSION['group_id'] . "';");
		$category_objects = array();
		foreach($categories as $category) {
			$category_object['name'] = $category['category'];
			
			$res = array();
			$objects = query("SELECT object_id, rating FROM object_category WHERE category_id='". $category['id'] . "' ORDER BY rating DESC LIMIT 20;");
			foreach($objects as $object) {
				$media = query("SELECT name, address, type FROM media WHERE id='" . $object['object_id'] . "';")[0];
				$res_object = array_merge($object, $media);
				array_push($res, $res_object);
			}
			$category_object['objects'] = $res;
			array_push($category_objects, $category_object);
		}
		
		header("Content-type: application/json");
		print(json_encode($category_objects, JSON_PRETTY_PRINT));
	}
	
	function getUsers() {
		$user_ratings = query("SELECT name, rating FROM group_member WHERE group_id='" . $_SESSION["group_id"] . "';");
		
		header("Content-type: application/json");
		print(json_encode($user_ratings, JSON_PRETTY_PRINT));
	}
	
	function getGroups() {
		$res = array();
		//get all groups the user is in, and print them
		$groups = array();
		//make sure we only try to get the user's groups if they are logged in
		if(!empty($_SESSION['id'])){
			$names = query("SELECT group_id FROM group_member WHERE user_id = '" . $_SESSION['id'] . "';");
			foreach ($names as $name)
			{
				$group= query("SELECT id, name FROM groups WHERE id =" . $name["group_id"] .";")[0];
				array_push($groups, $group);
			
			}
		}
		$result = query("SELECT id, name FROM groups WHERE id='" . $_SESSION['group_id'] . "';");
		if(!empty($result)){
			$res["current"] = $result[0];
		}else{
			$res["current"] = array();
		}
		$res["groups"] = $groups;
		
		header("Content-type: application/json");
		print(json_encode($res, JSON_PRETTY_PRINT));
	}
?>