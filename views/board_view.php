<div>
    <table class="table ">

        <thead>
            <tr>
                <th>Name</th>
                <th>Score</th>
            </tr>
        </thead>

        <tbody>
		
            <?php

            foreach ($ranks as $rank)
            {
				
                print("<tr>");
                print("<td>{$rank["name"]}</td>");
                print("<td>{$rank["score"]}</td>");
                print("</tr>");
            }

            ?>

        </tbody>

    </table>
</div>