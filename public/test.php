<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // Render test selection page.
        render("test_view.php", ["title" => "Tests"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {	
		//Redirect to test page.
		if(!empty($_POST['test_button']))
		{
			redirect($_POST['test_button']);
		}
    }

?>