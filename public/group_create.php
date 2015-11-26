<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("group_prepare_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {	
		if (empty($_POST["group_size"]))
        {
            error("You must specify the size of the group.");
        }
		
		$size = $_POST['group_size'];
		$cat_num = $_POST['cat_num'];
		
		render("group_finalize_form.php", ["title" => "Register", "size" => $size, "cat_num" => $cat_num]);
		
    }

?>