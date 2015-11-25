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
						<select class="form-control" name="group" onchange='this.form.submit()'>
							<?php
							print("<option disabled selected value=\"\">{$group_id}</option>");
							
							foreach ($groups as $group)
							{
								print("<option value='{$group["group"]}'>{$group["group"]}</option>");
							}

							?>
						</select>
					</div>
					<div class="form-group">
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
	<div>
		<a href="leave.php" class="btn btn-default" role="button">Leave Group</a>
	</div>
</div>