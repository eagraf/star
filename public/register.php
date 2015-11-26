<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        //check if passwords match
        if($_POST["password"] != $_POST["confirmation"]){
            error("Passwords must match.");
        }
		
		//try to insert user into array
        $res = "INSERT IGNORE INTO users (name, email, hash) VALUES('". $_POST['name'] . "' , '" . $_POST['email'] . "' , '" . password_hash($_POST['password'], PASSWORD_DEFAULT) ."')";
		//print $res;
		$result = query($res);
        
        //apologize if it fails (i.e. username taken)
        if($result = false){
            error("User already registered with this email");
        }else{
			success("You have successfully registered!");
            redirect("/");
        }
        
    }

?>