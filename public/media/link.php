<?php
	// configuration
    require("../../includes/config.php"); 
	
	query("INSERT INTO media (name, type, address, owner_id) VALUES ('" .$_POST["name"] . "', 'link', '" .  $_POST["link"] . "', '" . $_SESSION['id'] . "');");
	
	success("Succesfully posted!");
?>

