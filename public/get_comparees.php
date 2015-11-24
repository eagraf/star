<?php
	// configuration
    require("../includes/config.php"); 
	
	//Get all relevant users.
	$group_users = query("SELECT * FROM group_member WHERE group_id = '" . $_SESSION['group_id'] . "';");
	
	//Get all relevant categories
	$group_categories = query("SELECT * FROM categories WHERE group_id = '" . $_SESSION['group_id'] . "';");
	
	//Size of group.
	$size = count($group_users);
	$key_a = 0;
	$key_b = 0;
	if($size < 2)
	{
		error("Not enough users to compare.");
	} 
	else
	{
		$key_a = array_rand($group_users);
		$key_c = array_rand($group_categories);
		
		do
		{
			$key_b = array_rand($group_users);
		}
		//Make sure different users are chosen.
		while($key_b == $key_a);
	}
	
	//Insert the two users.
	$people = ["user_a" => $group_users[$key_a], "user_b" => $group_users[$key_b], "category" => $group_categories[$key_c]];
	
	// Return people in JSON format which can be recieved by JavaScript.
    header("Content-type: application/json");
    print(json_encode($people, JSON_PRETTY_PRINT));
?>