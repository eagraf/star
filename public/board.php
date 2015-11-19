<?php
	require("../includes/config.php");
	$result = query("UPDATE `group_member` SET score = (score / comp_num) * 20 WHERE group_id = ". $_SESSION['group_id'] ." and user_id = " . $_SESSION["id"] . ";");
	$rows = query("Select name, score, comp_num FROM group_member WHERE `group_id` = \"" . $_SESSION['group_id'] . "\" ORDER BY `group_member`.`score` DESC");
	$result = query("UPDATE `group_member` SET score = (score * comp_num) / 20 WHERE group_id = ". $_SESSION['group_id'] ." and user_id = " . $_SESSION["id"] . ";");
	
	$names = query("SELECT * FROM group_member WHERE user_id = '" . $_SESSION['id'] . "';");
	
	$ranks = [];
	$i = 0;
    foreach ($rows as $row)
    {
		$ranks[] = [
			"name" => $row["name"],
			"score" => $row["score"]
		];
        
    }
	
	$groups = [];
	foreach ($names as $name)
    {
		$groups[] = [
			"group" => $name["group_id"],
		];
        
    }

	render("board_view.php", ["ranks" => $ranks, "groups" => $groups, "title" => "Board"]);
?>