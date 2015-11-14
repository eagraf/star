<div>
    <table class="table ">

        <thead>
            <tr>
                <th>Name:</th>
                <th>Stars:</th>
            </tr>
        </thead>

        <tbody>
		
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
</div>