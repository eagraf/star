<div>
    <table class="table ">

        <thead>
            <tr>
                <th>Name:</th>
                <th>type:</th>
				<th>address:</th>
				<th>View:</th>
            </tr>
        </thead>

        <tbody>
			
            <?php
			//For right now the different media types are separated for future expandability.
            foreach ($images as $image)
            {	
                print("<tr>");
                print("<td>{$image["name"]}</td>");
				print("<td>{$image["type"]}</td>");
                print("<td>{$image["address"]}</td>");
				print("<td><form action=\"view_media.php\" method=\"post\">
							<div class=\"form-group\">
								<button class=\"btn btn-default\" type=\"submit\" name=\"media_id\" value=" . $image['id'] . ">
									View
								</button>
							</div>
						</form></td>");
                print("</tr>");

			}
			
			foreach ($audio as $audio_file)
            {	
                print("<tr>");
                print("<td>{$audio_file["name"]}</td>");
				print("<td>{$audio_file["type"]}</td>"); 
                print("<td>{$audio_file["address"]}</td>");
				print("<td><form action=\"view_media.php\" method=\"post\">
							<div class=\"form-group\">
								<button class=\"btn btn-default\" type=\"submit\" name=\"media_id\" value=" . $audio_file['id'] . ">
									View
								</button>
							</div>
						</form></td>");
                print("</tr>");
				

			}
			
			foreach ($documents as $document)
            {	
                print("<tr>");
                print("<td>{$document["name"]}</td>");
				print("<td>{$document["type"]}</td>");
                print("<td>{$document["address"]}</td>");
				print("<td><form action=\"view_media.php\" method=\"post\">
							<div class=\"form-group\">
								<button class=\"btn btn-default\" type=\"submit\" name=\"media_id\" value=" . $document['id'] . ">
									View
								</button>
							</div>
						</form></td>");
                print("</tr>");
			}
            ?>

        </tbody>

    </table>
</div>