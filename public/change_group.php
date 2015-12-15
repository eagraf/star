<?php

    // configuration
    require("../includes/config.php"); 

    //if the user selected a group to change, change it
	$status = query("SELECT `status` from groups WHERE id = '" . $_GET['group'] . "';");
	if(!empty($status)){
		if($status[0]["status"] == "public" || $status[0]["status"] == "unlisted"){
			$_SESSION['group_id'] = $_GET['group'];
			redirect("board.html");
		}else{
			$verif = query("SELECT * FROM group_member WHERE group_id = '" . $_GET['group'] . "' AND user_id = '" . $_SESSION['id'] . "';");
			if(!empty($verif)){
				$_SESSION['group_id'] = $_GET['group'];
				redirect("board.html");
			}else{
				error("You don't belong to this group!");
			}
		}
	}else{
		error("This group doesnt exist!");
	}

?>
