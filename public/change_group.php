<?php

    // configuration
    require("../includes/config.php"); 

    //get status of group users is attempting to access
	$status = query("SELECT `status` from groups WHERE id = '" . $_GET['group'] . "';");
	if(!empty($status)){
		if($status[0]["status"] == "public" || $status[0]["status"] == "unlisted"){
			$_SESSION['group_id'] = $_GET['group'];
			redirect("board.html");
		//if group is private
		}else{
			//if the user is logged in
			if(!empty($_SESSION['id'])){
				//check if user belongs to group they're trying to access
				$verif = query("SELECT * FROM group_member WHERE group_id = '" . $_GET['group'] . "' AND user_id = '" . $_SESSION['id'] . "';");
				if(!empty($verif)){
					$_SESSION['group_id'] = $_GET['group'];
					redirect("board.html");
				}else{
					error("You don't belong to this group!");
				}
			//
			}else{
				error("Log in to view private group!");
			}
		}
	}else{
		error("This group doesnt exist!");
	}

?>
