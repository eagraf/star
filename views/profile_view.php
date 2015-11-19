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
	</div>
</div>