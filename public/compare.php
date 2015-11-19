<?php

    // configuration
    require("../includes/config.php"); 
	require("compare_helper.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
		$people = pick(0);
		//query("UPDATE users SET comp_num = comp_num+1 WHERE id ='".$people['user_a']['id']."';");
		//query("UPDATE users SET comp_num = comp_num+1 WHERE id ='".$people['user_b']['id']."';");
		
        // else render form
        render("compare_view.php", ["title" => "Compare", "people" => $people]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		if(isset($_POST['skip']))
		{
			//Record that they were skipped. Implement this later.
		}
		else if(isset($_POST['a']))
		{
			$id = $_POST['a'];
			query("UPDATE group_member SET score = score+1 WHERE id ='".$id."';");
		}
		else if(isset($_POST['b']))
		{
			$id = $_POST['b'];
			query("UPDATE group_member SET score = score+1 WHERE id ='".$id."';");
		}
		

		$people = pick(0);
		query("UPDATE group_member SET comp_num = comp_num+1 WHERE id ='".$people['user_a']['id']."';");
		query("UPDATE group_member SET comp_num = comp_num+1 WHERE id ='".$people['user_b']['id']."';");
	
		render("compare_view.php", ["title" => "Compare", "people" => $people]);
    }
?>