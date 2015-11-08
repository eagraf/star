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
		//Get all relevant users.
        $group_users = query("SELECT * FROM users WHERE group_id = 'Hebert-D';");
		
		//Size of group.
		$size = count($group_users);
		if($size < 2)
		{
			error("Not enough users to compare.");
		}
		else
		{
			do
			{
				$key_a = array_rand($group_users);
				do
				{
					$key_b = array_rand($group_users);
				}
				//Make sure different users are chosen.
				while($key_b == $key_a);
			}
			while(!checkScores($user_a, $user_b) && !checkComps($user_a, $user_b));
		}
		$people = ["user_a" => $group_users[$key_a], "user_b" => $group_users[$key_b]];
		return $people;
    }
	
	/**
	* Make sure that two scores are close enough to be accurately compared.
	*/
	function checkScores($user_a, $user_b)
	{
		//Absolute value of the quotient of the scores of a and b.
		$quotient = abs($user_a['score']/$user_b['score']);
		
		//The quotient has to be sufficiently small in order for true to be returned.
		if($quotient <= 0.3)
		{
			return true;
		}
		return false;
	}
	
	/**
	* Make sure that two scores are close enough to be accurately compared.
	*/
	function checkComps($user_a, $user_b)
	{
		//Absolute value of the quotient of the scores of a and b.
		$quotient = abs($user_a['comp_num']/$user_b['comp_num']);
		
		//The quotient has to be sufficiently small in order for true to be returned.
		if($quotient <= 0.3)
		{
			return true;
		}
		return false;
	}
	
?>