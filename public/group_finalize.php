<?php
    // configuration
    require("../includes/config.php");

    // ensure user reached this page via POST (as by submitting a form via POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {	
		
		//add the group to the group table, do not insert size as 0
		$query = "INSERT INTO  groups (name, size, type, description, status) 
		VALUES (\"" . $_POST['group_name'] . "\",\"" . 1 . "\",\"" . $_POST['type'] . "\",\"" . $_POST['group_desc'] . "\",\"" . $_POST['protection'] . "\");";
		$reference = query($query);
		
		//get the id for the group just entered
		$group_id = query("SELECT id FROM `groups` ORDER BY id DESC LIMIT 1");
		
		//add the user making to the group to the group
		$queryt = "SELECT name FROM `users` WHERE id = '" . $_SESSION['id'] . "';";
		print $queryt;
		$user = query($queryt);
		$loggedInName = $user[0]['name'];
		$result = query("INSERT INTO group_member (user_id, name, group_id) VALUES (\"" . $_SESSION['id'] . "\",\"" . $loggedInName . "\",\"" . $group_id[0]['id'] . "\");");
		
		//iterate though each category entered by the user, check if they exist, and record them if they don't already
		$i = 0;
		$categoryindex = "category" . "$i";
		
		while(!empty($_POST[$categoryindex])){
			$cate = "SELECT id FROM `categories` WHERE category = \"" . $_POST[$categoryindex] . "\" AND group_id = '" . $group_id[0]['id'] . "' ;";
			$reference = query($cate);
			if($reference[0]['id'] == null){
				$result = query("INSERT INTO categories (category, group_id) VALUES (\"" . $_POST[$categoryindex] . "\",\"" . $group_id[0]['id'] . "\");");
			}
			
			$i++;
			$categoryindex = "category" . "$i";
		}

		
		if(empty($_SESSION['id'])){
			redirect("login.php");
		}else{
			$_SESSION['group_id'] = $_POST['group_name'];
			redirect("board.html");
		}
		
		
    }
?>