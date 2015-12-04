<?php
	/*
	 * Backend for leaderboard
	 * Ethan Graf 12/3/15
	 */
	// configuration
    require("../includes/config.php"); 
	
	//$_SESSION["group_id"] = 44;
	
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
		//$total_ratings = query("SELECT * FROM compare_object_group WHERE group_id='" . $_SESSION["group_id"] . "' ORDER BY rating DESC LIMIT 20);");
	}
	
	function getUsers() {
		$user_ratings = query("SELECT name, rating FROM group_member WHERE group_id='" . $_SESSION["group_id"] . "';");
		
		header("Content-type: application/json");
		print(json_encode($user_ratings, JSON_PRETTY_PRINT));
	}
	
	function getGroups() {
		$res = array();
		//get all groups the user is in, and print them
		$names = query("SELECT group_id FROM group_member WHERE user_id = '" . $_SESSION['id'] . "';");
		$groups = array();
		foreach ($names as $name)
		{
			$group= query("SELECT id, name FROM groups WHERE id =" . $name["group_id"] .";")[0];
			array_push($groups, $group);
			
		}
		$res["current"] = query("SELECT name FROM groups WHERE id='" . $_SESSION['id'] . "';");
		$res["groups"] = $groups;
		
		header("Content-type: application/json");
		print(json_encode($res, JSON_PRETTY_PRINT));
	}
?>