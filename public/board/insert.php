<?php
	// configuration
    require("../../includes/config.php"); 
	//check if the media to be added has already been added
	$media = query("SELECT * FROM media WHERE id='" . $_GET["media_id"] . "';")[0];
	
	$insertcheck = query("SELECT * FROM compare_object_group WHERE object_id =" . $media['id'] . " AND group_id =" . $_SESSION['group_id'] . ";");
	
	$categories = query("SELECT * FROM categories WHERE group_id='" . $_SESSION['group_id'] . "';");
	
	//if media is not already in group, add it
	if($insertcheck[0]['id'] == null){
		//Insert into the compare_object_group junction table.
		query("INSERT INTO compare_object_group(object_id, group_id, type, owner_id, time_posted) 
		VALUES(\"" . $media["id"] . "\", \"" . $_SESSION['group_id'] . "\", \"". $media["type"] . "\", \"" . $media["owner_id"] . "\", Now());");
		
		//Insert each of the new objects into the object_category junction table.
		foreach($categories as $category) {
			query("INSERT INTO object_category (object_id, category_id) VALUES('" . $media["id"] . "', '" . $category['id'] . "');");
		}
	}
	
	
?>