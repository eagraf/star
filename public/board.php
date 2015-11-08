<?php
	require("../includes/config.php");
	$result = query("UPDATE `users` SET score = (score / comp_num) * 20;");
	$rows = query("Select name, score, comp_num FROM users WHERE `group_id` = \"Codeday\" ORDER BY `users`.`score` DESC");
	$result = query("UPDATE `users` SET score = (score * comp_num) / 20;");
	
	$ranks = [];
	$i = 0;
    foreach ($rows as $row)
    {
		$ranks[] = [
				"name" => $row["name"],
				"score" => $row["score"]
			];
        
    }
	render("board_view.php", ["ranks" => $ranks, "title" => "Board"]);
?>