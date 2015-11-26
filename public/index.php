<?php
	// configuration
	require("../includes/config.php"); 

	//render("login.php", ["title" => "Login", "db" => $db]);
	//if(_SESSION['id'])
	
	//Testing.
	//redirect("test.php");
	
	if(empty($_SESSION['id']))
		redirect("/login.php");
	else
		redirect("/board.php");
	
	
	
	
	
?>
Something is wrong with the XAMPP installation :-(
