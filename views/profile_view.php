<div>
	<div class = "profile">

    <?php
		print "<p><h1>" . $user[0]["name"] . ":</h1></p>";
		print "<p><h4>In the following groups:</h4></p>";
        
		foreach ($groups as $group)
		{
			print("<p><h6>{$group["group"]}</h6></p>");
		}

		
    ?>
	<p><a href="media.html">My Media</a></p>
	
	<h3><p><a href="change_pass.php">Change Password</a></p></h3>
	</div>
	
	
</div>