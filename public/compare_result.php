<?php
	// configuration
    require("../includes/config.php"); 

	// ensure proper usage
    /*if (empty($_GET["comparees"]) || empty($_GET["winner_id"] || empty($_GET["loser_id"])
    {
        http_response_code(400);
        exit;
    }*/
	
	//increment the score of the winning user
	query("UPDATE compare_object_group SET comp_num = comp_num+1, score = score+1 WHERE id='" . $_GET["winner_id"] . "';");
	query("UPDATE compare_object_group SET comp_num = comp_num+1 WHERE id='" . $_GET["loser_id"] . "';");
?>