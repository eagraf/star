<?php
	require("../includes/config.php");
	
	//delete user's entry in group_member
	$query = "DELETE FROM `group_member` WHERE group_id = '". $_SESSION['group_id'] . "' and user_id = " . $_SESSION["id"] . ";";
	$result = query($query);
	
	//unselect the group
	$_SESSION['group_id'] = null;

	redirect("board.php");
?>