<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("login_form.php", ["title" => "Log In"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["username"]))
        {
            error("You must provide your username.");
        }
        else if (empty($_POST["password"]))
        {
            error("You must provide your password.");
        }

		$row = query("SELECT * FROM users WHERE email = '" . $_POST['username'] . "' AND HASH = '" . $_POST['password'] . "' ;");

        if(!empty($row))
		{
			// remember that user's now logged in by storing user's ID in session
            $_SESSION["id"] = $row[0]["id"];
			$_SESSION["group_id"] = $row[0]["group_id"];
			redirect("home.php");
		}
	
        

        // else apologize
        error("Invalid username and/or password.");
    }

?>
