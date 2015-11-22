<form action="add_finalize.php" method="post">
    <fieldset>
	
        <div class="form-group">
			<?php
				for($i = 0; $i < $size; $i++){
					$name = "name" . $i;
					$email = "email" . $i;
					print "<input class=\"form-control\" name=\"$name\" placeholder=\"Name\" type=\"text\"/>";
					print "<input class=\"form-control\" name=\"$email\" placeholder=\"Email\" type=\"text\"/>";
					print "<br>";
				}
			?>
        </div>
		
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                Add Users
            </button>
        </div>
		
    </fieldset>
</form>