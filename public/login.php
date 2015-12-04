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

		$row = query("SELECT * FROM users WHERE email = '" . $_POST['username'] . "' ;");

        if(!empty($row))
		{
			// remember that user's now logged in by storing user's ID in session
			if (password_verify($_POST["password"], $row[0]["hash"]))
            {
                $_SESSION["id"] = $row[0]["id"];
				$_SESSION["group_id"] = null;

				redirect("board.html");
            }

            

		}

        // else apologize
        error("Invalid username and/or password.");
    }

?>
