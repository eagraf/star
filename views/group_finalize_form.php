<form action="group_finalize.php" method="post">
    <fieldset>
		
		<div class="form-group">
			<select class="form-control" name="type">
				<option disabled selected value="Users">Type</option>
					<option value='Users'>Users</option>
					<option value='Images'>Images</option>
					<option value='Audio'>Audio</option>
					<option value='Documents'>Documents</option>
					<option value='All'>All Media</option>
			</select>
		</div>
		
		<div class="form-group">
			<select class="form-control" name="protection">
				<option disabled selected value="Users">Protection</option>
					<option value='public'>Public</option>
					<option value='private'>Private</option>
					<option value='unlisted'>Unlisted</option>
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