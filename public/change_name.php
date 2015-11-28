<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("change_name_form.php", ["title" => "Change Name"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
		
		//try to insert user into array
		$res = "UPDATE `users` SET name = '" . $_POST['name'] . "' WHERE `id` = '" . $_SESSION['id'] . "'";
        $res2 = "UPDATE group_member SET name = '" . $_POST['name'] . "' WHERE `user_id` = '" . $_SESSION['id'] . "'";
		//print $res;
		$result = query($res);
		$result = query($res2);
        
		success("Name successfully changed!");
        
    }

?>