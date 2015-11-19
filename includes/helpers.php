<?php
	/**
     * helpers.php
     *
     * Helper functions.
     */
	 
	 require_once("config.php");
	 
	 /**
     * Renders view, passing in values.
     */
    function render($view, $values = [])
    {
        // if view exists, render it
        if (file_exists("../views/{$view}"))
        {
            // extract variables into local scope
            extract($values);

            // render view (between header and footer)
            require("../views/header.php");
            require("../views/{$view}");
            require("../views/footer.php");
            exit;
        }

        // else err
        else
        {
            trigger_error("Invalid view: {$view}", E_USER_ERROR);
        }
    }
	
	/**
     * Redirects user to location, which can be a URL or
     * a relative path on the local host.
     *
     * http://stackoverflow.com/a/25643550/5156190
     *
     * Because this function outputs an HTTP header, it
     * must be called before caller outputs any HTML.
     */
    function redirect($location)
    {
        if (headers_sent($file, $line))
        {
            trigger_error("HTTP headers already sent at {$file}:{$line}", E_USER_ERROR);
        }
        header("Location: {$location}");
        exit;
    }
	
	/**
     * Logs out current user, if any.  Based on Example #1 at
     * http://us.php.net/manual/en/function.session-destroy.php.
     */
    function logout()
    {
        // unset any session variables
        $_SESSION = [];

        // expire cookie
        if (!empty($_COOKIE[session_name()]))
        {
            setcookie(session_name(), "", time() - 42000);
        }

        // destroy session
        session_destroy();
    }
	
	/**
     * Tell the user they have done something wrong.
     */
    function error($message)
    {
        render("error.php", ["message" => $message]);
    }
	
	/**
     * Query helper function.
     */
    function query($sql)
    {
        $user = 'root';
		$pass = '';
		$db = 'star';
		
		$db = new mysqli('localhost', $user, $pass, $db) or die ("unable to connect");
        // query database for user
        $result = mysqli_query($db, $sql);
		if(gettype($result) != "boolean")
		{
			while($row = $result->fetch_assoc()) {
				$rows[] = $row;
			}
			return $rows;
		}
		
    }
	
	function QueryWhereGroupId($sql,$group_id){ //need to comment
		
		//$oquery = "SELECT user_id FROM group_member WHERE group_id ='" . $group_id . "';";
		//print $oquery;
		
		$results = query("SELECT user_id FROM group_member WHERE group_id ='" . $group_id . "';");
		$query = $sql . " WHERE id = ";
		foreach($results as $result){
			$query .= $result["user_id"];
			$query .= " or id = ";
		}
		$query .= "null;";
		$final_result = query($query);
		
		//print $query;
		return $final_result;
	}
	
	
?>