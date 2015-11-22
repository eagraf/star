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
		$size = $i;
		
		if(!empty($_SESSION['id'])){
			$size++;
		}
			
			
		if(!empty($_SESSION['id'])){
			$user = query("SELECT name FROM `users` WHERE id = \"" . $_SESSION['id'] . "\";");
			$loggedInName = $user[0]['name'];
			$result = query("INSERT INTO group_member (user_id, name, group_id) VALUES (\"" . $_SESSION['id'] . "\",\"" . $loggedInName . "\",\"" . $_POST['group_name'] . "\");");
		}
		
		
		$i = 0;
		$nameindex = "name" . "$i";
		$emailindex = "email" . "$i";
		
		while(!empty($_POST[$nameindex])){
			$user = "SELECT id FROM `users` WHERE email = \"" . $_POST[$emailindex] . "\";";
			$reference = query($user);
			if($reference[0]['id'] == null){
				$result = query("INSERT INTO users (name, email, hash) VALUES (\"" . $_POST[$nameindex] . "\",\"" . $_POST[$emailindex] . "\",\"" . "goat" . "\");");
				$userref = "SELECT id FROM `users` WHERE email = \"" . $_POST[$emailindex] . "\";";
				$ref = query($userref);
				$result = query("INSERT INTO group_member (user_id, name, group_id) VALUES (\"" . $ref[0]['id'] . "\",\"" . $_POST[$nameindex] . "\",\"" . $_POST['group_name'] . "\");");
			}else{
				if($reference[0]['id'] != $_SESSION['id']){
					$result = query("INSERT INTO group_member (user_id, name, group_id) VALUES (\"" . $reference[0]['id'] . "\",\"" . $_POST[$nameindex] . "\",\"" . $_POST['group_name'] . "\");");
				}else{
					$size--;
				}
			}
			
			
			$i++;
			$nameindex = "name" . "$i";
			$emailindex = "email" . "$i";
		}
		
		$query = "INSERT INTO  groups (name, size, type, description) 
		VALUES (\"" . $_POST['group_name'] . "\",\"" . $size . "\",\"" . $_POST['type'] . "\",\"" . $_POST['group_desc'] . "\");";
		$reference = query($query);

		//$query = "UPDATE `groups` SET `size` = " .  . "WHERE `id` = " .  . ";";
		//$result = mysqli_query($db, $query);
		if(empty($_SESSION['id'])){
			redirect("login.php");
		}else{
			$_SESSION['group_id'] = $_POST['group_name'];
			redirect("board.php");
		}
		
		
    }
?>