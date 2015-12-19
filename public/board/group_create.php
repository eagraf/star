<?php

    // configuration
    require("../../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("group_prepare_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {	
		//ensure the user entered an appropriate group size
		if (empty($_POST["cat_num"]))
        {
            error("You must specify the number of categories.");
        }
		
		$cat_num = $_POST['cat_num'];
		
		render("group_finalize_form.php", ["title" => "Register", "cat_num" => $cat_num]);
		
    }

?>