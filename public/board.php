<?php
	require("../includes/config.php");
	
	$rows = query("Select name, score FROM users WHERE `group_id` = \"Hebert-D\" ORDER BY `users`.`score` DESC");
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