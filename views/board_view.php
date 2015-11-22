<div>
    <table class="table ">

        <thead>
            <tr>
                <th>Name:</th>
                <th>Stars:</th>
            </tr>
        </thead>

        <tbody>
			<form action="change_group.php" method="post">
				<fieldset>
					<div class="form-group">
						<select class="form-control" name="group">
							<option disabled selected value="">Group</option>
							<?php
        
							foreach ($groups as $group)
							{
								print("<option value='{$group["group"]}'>{$group["group"]}</option>");
							}

							?>
						</select>
					</div>
					<div class="form-group">
						<button class="btn btn-default" type="submit">Change Group</button>
						<a href="group_create.php" class="btn btn-default" role="button">New Group</a>
					</div>
				</fieldset>
			<form action="sell.php" method="post">
            <?php
			
			
			$i = 0;
            foreach ($ranks as $rank)
            {
				
				if($i < 10){
                print("<tr>");
                print("<td>{$rank["name"]}</td>");
                print("<td>{$rank["score"]}</td>");
                print("</tr>");
				}
				$i++;
				
            
			}
            ?>

        </tbody>

    </table>
	
	<div class="profile">
		<a href="add_users.php" class="btn btn-default" role="button">+ Add</a>
	</div>
</div>