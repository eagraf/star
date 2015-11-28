<?php
    // configuration
    require("../includes/config.php");
    // if user reached page via GET (as by clicking a link or via redirect)
    //to do:
	//make sure that the user enters a thing in all forms
	//if user email already exists, go it it and update the group id
    // else if user reached page via POST (as by submitting a form via POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {	
		//$db = new mysqli('localhost', 'root', '', 'star') or die("unable to connect");

		$i = 0;
		$nameindex = "name" . "$i";
		$emailindex = "email" . "$i";
		
		while(!empty($_POST[$nameindex])){
			$i++;
			$nameindex = "name" . "$i";
		}
		$size = $i + 1;
		
		$query = "INSERT INTO  groups (name, size, type, description) 
		VALUES (\"" . $_POST['group_name'] . "\",\"" . 0 . "\",\"" . $_POST['type'] . "\",\"" . $_POST['group_desc'] . "\");";
		$reference = query($query);
		
		$group_id = query("SELECT id FROM `groups` ORDER BY id DESC LIMIT 1");
			
		$queryt = "SELECT name FROM `users` WHERE id = '" . $_SESSION['id'] . "';";
		print $queryt;
		$user = query($queryt);
		$loggedInName = $user[0]['name'];
		$result = query("INSERT INTO group_member (user_id, name, group_id) VALUES (\"" . $_SESSION['id'] . "\",\"" . $loggedInName . "\",\"" . $group_id[0]['id'] . "\");");
		
		
		$i = 0;
		$nameindex = "name" . "$i";
		$emailindex = "email" . "$i";
		
		while(!empty($_POST[$nameindex])){
			$user = "SELECT id FROM `users` WHERE email = \"" . $_POST[$emailindex] . "\";";
			$reference = query($user);
			if($reference[0]['id'] == null){
				$rand_str = password_hash("sg39d9dhj9n2",  PASSWORD_DEFAULT);
				$rand_str = substr($rand_str, -10);
				
				
				$result = query("INSERT INTO users (name, email, hash) VALUES (\"" . $_POST[$nameindex] . "\",\"" . $_POST[$emailindex] . "\",\"" . password_hash("goat",  PASSWORD_DEFAULT) . "\");");

				$userref = "SELECT id FROM `users` WHERE email = \"" . $_POST[$emailindex] . "\";";
				$ref = query($userref);
				$result = query("INSERT INTO group_member (user_id, name, group_id) VALUES (\"" . $ref[0]['id'] . "\",\"" . $_POST[$nameindex] . "\",\"" . $group_id[0]['id'] . "\");");
				
				//mail($_POST[$emailindex], "You've been invited to a StarBoard group!", "To check out the group: " . $_POST['group_name']  . ", You can log in with your email and the password: " . $rand_str);
			}else{
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