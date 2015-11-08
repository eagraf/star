<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    //to do:
	//make sure that the user enters a thing in all forms
	//if user email already exists, go it it and update the group id

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {	
		$i = 0;
		$nameindex = "name" . "$i";
		$emailindex = "email" . "$i";
		$db = new mysqli('localhost', 'root', '', 'star') or die("unable to connect");
		while(!empty($_POST[$nameindex])){
			$ayy = $_POST[$nameindex];
			
			$query = "INSERT INTO users (name, email, hash, group_id) VALUES (\"" . $_POST[$nameindex] . "\",\"" . $_POST[$emailindex] . "\",\"" . $_POST[$nameindex] . "\",\"" . $_POST['group_name'] . "\");";
			$result = mysqli_query($db, $query);
			//print $query;
			$i++;
			$nameindex = "name" . "$i";
			$emailindex = "email" . "$i";
		}
		//print "success?";
		redirect("login.php");
		
    }

?>