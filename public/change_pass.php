<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("change_pass_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        //check if passwords match
        if($_POST["password"] != $_POST["confirmation"]){
            error("Passwords must match.");
        }
		
		//try to insert user into array
		
        $res = "UPDATE `users` SET `hash` = '" . password_hash($_POST['password'], PASSWORD_DEFAULT) . "' WHERE `id` = '" . $_SESSION['id'] . "'";
		//print $res;
		$result = query($res);
        
		success("Password successfully changed!");
        
    }

?>