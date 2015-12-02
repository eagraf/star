<?php
    // configuration
    require("../includes/config.php");
    
	//only make an action if page was reached by POST
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {	


		//get the umber of users entered
		$i = 0;
		$nameindex = "name" . "$i";
		
		while(!empty($_POST[$nameindex])){
			$i++;
			$nameindex = "name" . "$i";
		}
		$size = $i;
		
		
		//iterate through each user entered. If they are registered, add this group to their account,
		//if not registered, register the user and email them
		//assure that the user added was not a user already in the group
		$i = 0;
		$nameindex = "name" . "$i";
		$emailindex = "email" . "$i";
		
		while(!empty($_POST[$nameindex])){
			
			//get user info (empty if not registered)
			$user = "SELECT id FROM `users` WHERE email = \"" . $_POST[$emailindex] . "\";";
			$reference = query($user);
			
			//check if an entry exists for this user (empty if not registered)
			$query = "SELECT * FROM group_member WHERE user_id =" . $reference[0]['id'] . " AND group_id = '" . $_SESSION['group_id'] . "';";
			$check = query($query);
			
			
			//if user is not registered, register and email them
			if($reference[0]['id'] == null){
				//generate a random temporary password
				$rand_str = password_hash("sg39d9dhj9n2",  PASSWORD_DEFAULT);
				$rand_str = substr($rand_str, -10);
				
				
				$result = query("INSERT INTO users (name, email, hash) VALUES (\"" . $_POST[$nameindex] . "\",\"" . $_POST[$emailindex] . "\",\"" . password_hash("goat",  PASSWORD_DEFAULT) . "\");");
				
				$userref = "SELECT id FROM `users` WHERE email = \"" . $_POST[$emailindex] . "\";";
				$ref = query($userref);
				$result = query("INSERT INTO group_member (user_id, name, group_id) VALUES (\"" . $ref[0]['id'] . "\",\"" . $_POST[$nameindex] . "\",\"" . $_SESSION['group_id'] . "\");");
				
				//email the user at their email with the random password
				//mail($_POST[$emailindex], "You've been invited to a StarBoard group!", "To check out the group: " . $_SESSION['group_id']  . ", You can log in with your email and the password: " . $rand_str);
			}else{
				//if the user is registered and not in the group, add them to it
				if($reference[0]['id'] != $_SESSION['id'] AND $check[0]['id'] == null){
					$result = query("INSERT INTO group_member (user_id, name, group_id) VALUES (\"" . $reference[0]['id'] . "\",\"" . $_POST[$nameindex] . "\",\"" . $_SESSION['group_id'] . "\");");
				}else{
					$size--;
				}
			}
			
			
			$i++;
			$nameindex = "name" . "$i";
			$emailindex = "email" . "$i";
		}
		
		//change size of group in table
		$query = "UPDATE groups SET size = size + " . $size . " WHERE name = '" . $_SESSION['group_id'] . "';";
		//print $query;
		$reference = query($query);
		

		redirect("board.php");
		
		
    }
?>