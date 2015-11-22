<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("add_prepare_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {	
		if (empty($_POST["add_num"]))
        {
            error("You must specify the number of users to add.");
        }
		
		$size = $_POST['add_num'];

		render("add_finalize_form.php", ["title" => "Add", "size" => $size]);
		
    }

?>