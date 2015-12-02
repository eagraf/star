<?php
    // configuration
    require("../includes/config.php");

    // ensure user reached this page via POST (as by submitting a form via POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {	
		
		//get the size of the group
		$i = 0;
		$nameindex = "name" . "$i";
		
		while(!empty($_POST[$nameindex])){
			$i++;
			$nameindex = "name" . "$i";
		}
		$size = $i + 1;
		
		
		//add the group to the group table, do not insert size yet
		$query = "INSERT INTO  groups (name, size, type, description) 
		VALUES (\"" . $_POST['group_name'] . "\",\"" . 0 . "\",\"" . $_POST['type'] . "\",\"" . $_POST['group_desc'] . "\");";
		$reference = query($query);
		
		//get the id for the group just entered
		$group_id = query("SELECT id FROM `groups` ORDER BY id DESC LIMIT 1");
		
		//add the user making to the group to the group
		$queryt = "SELECT name FROM `users` WHERE id = '" . $_SESSION['id'] . "';";
		print $queryt;
		$user = query($queryt);
		$loggedInName = $user[0]['name'];
		$result = query("INSERT INTO group_member (user_id, name, group_id) VALUES (\"" . $_SESSION['id'] . "\",\"" . $loggedInName . "\",\"" . $group_id[0]['id'] . "\");");
		
		
		//iterate through each nmae and email in the form
		$i = 0;
		$nameindex = "name" . "$i";
		$emailindex = "email" . "$i";
		
		while(!empty($_POST[$nameindex])){
			//see if user already is registered
			$user = "SELECT id FROM `users` WHERE email = \"" . $_POST[$emailindex] . "\";";
			$reference = query($user);
			
			//if the user is not registered, register them, email them to notify, and add them to the group
			if($reference[0]['id'] == null){
				//create a random password
				$rand_str = password_hash("sg39d9dhj9n2",  PASSWORD_DEFAULT);
				$rand_str = substr($rand_str, -10);
				
				$result = query("INSERT INTO users (name, email, hash) VALUES (\"" . $_POST[$nameindex] . "\",\"" . $_POST[$emailindex] . "\",\"" . password_hash("goat",  PASSWORD_DEFAULT) . "\");");

				$userref = "SELECT id FROM `users` WHERE email = \"" . $_POST[$emailindex] . "\";";
				$ref = query($userref);
				$result = query("INSERT INTO group_member (user_id, name, group_id) VALUES (\"" . $ref[0]['id'] . "\",\"" . $_POST[$nameindex] . "\",\"" . $group_id[0]['id'] . "\");");
				
				
				//send the email
				//mail($_POST[$emailindex], "You've been invited to a StarBoard group!", "To check out the group: " . $_POST['group_name']  . ", You can log in with your email and the password: " . $rand_str);
			}else{
				//if the user is registered and not already in the group, add them to it
				if($reference[0]['id'] != $_SESSION['id']){
					$result = query("INSERT INTO group_member (user_id, name, group_id) VALUES (\"" . $reference[0]['id'] . "\",\"" . $_POST[$nameindex] . "\",\"" . $group_id[0]['id'] . "\");");
				}else{
					$size--;
				}
			}
			
			$i++;
			$nameindex = "name" . "$i";
			$emailindex = "email" . "$i";
		}
		
		
		
		
		//iterate though each category entered by the user, check if they exist, and record them if they dodnt already
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
			redirect("board.php");
		}
		
		
    }
?>