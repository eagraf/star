<div>
    <table class="table ">
        <thead>
            <tr>
                <th>Stars:</th>
				<th>Name:</th>
            </tr>
        </thead>

        <tbody>
			
            <?php
			
			
			$i = 0;
            foreach ($ranks as $rank)
            {
				
				if($i < 10){
                print("<tr>");
				print("<td><img alt=\"Star\" src=\"/img/staricon.png\"/>{$rank["score"]}</td>");
                print("<td>{$rank["name"]}</td>");
                print("</tr>");
				}
				$i++;
				
            
			}
            ?>

        </tbody>

    </table>
	
	<div class="profile">
		<a href="add_users.php" class="btn btn-default" role="button">+ Add</a>
		<a href="insert.html" class="btn btn-default" role="button">Insert</a>
	</div>
	<div>
		<a href="leave.php" class="btn btn-default" role="button">Leave Group</a>
	</div>
</div>