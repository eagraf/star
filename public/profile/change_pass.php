<?php

    // configuration
    require("../../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("change_pass_form.php", ["title" => "Change Pass"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        //check if passwords match
        if($_POST["password"] != $_POST["confirmation"]){
            error("Passwords must match.");
        }
		
		//change user's password, salt it accordingly
		
        $res = "UPDATE `users` SET `hash` = '" . password_hash($_POST['password'], PASSWORD_DEFAULT) . "' WHERE `id` = '" . $_SESSION['id'] . "'";
		$result = query($res);
        
		success("Password successfully changed!");
        
    }

?>