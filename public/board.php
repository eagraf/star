<?php
	//this'll all be rewritten, so whatev
	
	require("../includes/config.php");
	//$result = query("UPDATE `group_member` SET score = (score / comp_num) * 20 WHERE group_id = ". $_SESSION['group_id'] ." and user_id = " . $_SESSION["id"] . ";");
	$rows = query("Select name, rating, deviation FROM group_member WHERE `group_id` = \"" . $_SESSION['group_id'] . "\" ORDER BY `group_member`.`rating` DESC");
	//$result = query("UPDATE `group_member` SET score = (score * comp_num) / 20 WHERE group_id = ". $_SESSION['group_id'] ." and user_id = " . $_SESSION["id"] . ";");
	
	$names = query("SELECT * FROM group_member WHERE user_id = '" . $_SESSION['id'] . "';");
	
	$ranks = [];
	$i = 0;
    foreach ($rows as $row)
    {
		$ranks[] = [
			"name" => $row["name"],
			"score" => $row["rating"]
		];
        
    }
	
	$groups = [];
	foreach ($names as $name)
    {
		$group_name = query("SELECT name FROM groups WHERE id =" . $name["group_id"] .";");
		$groups[] = [
			"group" => $group_name[0]["name"],
			"group_id" => $name["group_id"]
		];
        
    }
	
	$group_name = query("SELECT name FROM groups WHERE id =" . $_SESSION['group_id'] .";");
	$group_id = $group_name[0]['name'];
	
	render("board_view.php", ["ranks" => $ranks, "groups" => $groups, "title" => "Board", 'group_id' => $group_id]);
?>