<?php
	/*
	 * config.php Basic configurations for every page.
	 */
	 
	 // requirements
    require("helpers.php");
	
	// enable sessions
    session_start();
	
	// require authentication for all pages except /login.php, /logout.php, and /register.php
    if (!in_array($_SERVER["PHP_SELF"], ["/account/login.php", "/index.php", "/board/","/account/register.php"]))

    {
		//Otherwise redirect to login.
        if (empty($_SESSION['id']))
        {
            redirect("/account/login.php");
        }
    }
?>