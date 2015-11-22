<?php
	// configuration
    require("../includes/config.php"); 

	// ensure proper usage
    /*if (empty($_GET["comparees"]) || empty($_GET["winner_id"] || empty($_GET["loser_id"])
    {
        http_response_code(400);
        exit;
    }*/
	
	query("UPDATE group_member SET comp_num = comp_num+1, score = score+1 WHERE user_id='" . $_GET["winner_id"] . "';");
	query("UPDATE group_member SET comp_num = comp_num+1 WHERE user_id='" . $_GET["loser_id"] . "';");
?>