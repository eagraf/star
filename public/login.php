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

		$user = 'root';
		$pass = '';
		$db = 'star';
		
		$db = new mysqli('localhost', $user, $pass, $db) or die ("unable to connect");
        // query database for user
        $result = mysqli_query($db, "SELECT * FROM users WHERE name = 'Sam Rackey';");
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	
		$row = query("SELECT * FROM users WHERE username = 'ethan';");

        if(!empty($row))
		{
			// remember that user's now logged in by storing user's ID in session
            $_SESSION["id"] = $row["id"];
			redirect("home.php");
		}
	
        

        // else apologize
        error("Invalid username and/or password.");
    }

?>
