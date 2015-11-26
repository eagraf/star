<form action="group_finalize.php" method="post">
    <fieldset>
	
        <div class="form-group">
			<?php
				for($i = 0; $i < $size; $i++){
					$name = "name" . $i;
					$email = "email" . $i;
					print "<input class=\"form-control\" name=\"$name\" placeholder=\"Name\" type=\"text\"/>";
					print "<input class=\"form-control\" name=\"$email\" placeholder=\"Email\" type=\"email\"/>";
					print "<br>";
				}
			?>
        </div>
		
		<div class="form-group">
			<select class="form-control" name="type">
				<option disabled selected value="Users">Type</option>
					<option value='Users'>Users</option>
					<option value='Images'>Images</option>
					<option value='Users'>Audio</option>
					<option value='Users'>Documents</option>
			</select>
		</div>
		
		<div class="form-group">
			<?php
				for($i = 0; $i < $cat_num; $i++){
					$category = "category" . $i;
					print "<input class=\"form-control\" name=\"$category\" placeholder=\"Category\" type=\"text\"/>";
					print "<br>";
				}
			?>
        </div>
		
		
		<div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="group_name" placeholder="Group Name" type="text" required />
        </div>
		
		<div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="group_desc" placeholder="Group Description" type="text" required/>
        </div>
		
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                Finalize Group
            </button>
        </div>
		
    </fieldset>
</form>