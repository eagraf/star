<?php
	/**
     * helpers.php
     *
     * Helper functions for compare.
     */
	 
	 require_once("config.php");
	 
	 /**
     * Picks two users to compare.
     */
    function pick($group_id)
    {
        $group_users = query("SELECT * FROM users WHERE group_id = '0';");
	
		$size = count($group_users);
		if($size < 2)
		{
			error("Not enough users to compare.");
		}
		else
		{
			$key_a = array_rand($group_users);
			do
			{
				$key_b = array_rand($group_users);
			}
			while($key_b == $key_a);
		}
		$people = ["user_a" => $group_users[$key_a], "user_b" => $group_users[$key_b]];
		return $people;
    }
	
?>