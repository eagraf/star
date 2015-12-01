<?php
	// configuration
    require("../includes/config.php"); 
	//check if the media to be added has already been added
	$media = query("SELECT * FROM media WHERE id='" . $_GET["media_id"] . "';")[0];
	
	$insertcheck = query("SELECT * FROM compare_object_group WHERE object_id =" . $media['id'] . " AND group_id =" . $_SESSION[group_id] . ";");
	
	//if media is not already in group, add it
	if($insertcheck[0]['id'] == null){
		query("INSERT INTO compare_object_group(object_id, group_id, type, owner_id) 
		VALUES(\"" . $media["id"] . "\", \"" . $_SESSION[group_id] . "\", \"". $media["type"] . "\", \"" . $media["owner_id"] . "\");");
	}
	
	
?>