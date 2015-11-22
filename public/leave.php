<?php
	require("../includes/config.php");
	$query = "DELETE FROM `group_member` WHERE group_id = '". $_SESSION['group_id'] . "' and user_id = " . $_SESSION["id"] . ";";
	
	print $query;
	 
	$result = query($query);
	
	$_SESSION['group_id'] = null;

	redirect("board.php");
?>