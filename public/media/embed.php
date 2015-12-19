<?php
	// configuration
    require("../../includes/config.php"); 
	
	query("INSERT INTO media (name, type, address, owner_id) VALUES ('" .$_POST["name"] . "', 'embed', '" .  $_POST["embed"] . "', '" . $_SESSION['id'] . "');");
	
	success("Succesfully posted!");
?>

