<?php
	
	require("../../includes/config.php");
	
	// if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
		render("upload_view.php", ['title' => 'Upload']);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		upload();
    }
	
	 

	 function upload() {
		$fileType = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
		$type;
		switch($fileType) {
			case "jpg":
			case "png":
			case "gif":
			case "jpeg":
				$type = "image";
				break;
			case "wav":
			case "mp3":
			case "ogg":
				$type = "audio";
				break;
			case "pdf":
				$type = "document";
				break;
			default:
				error("File upload failed.");
				break;
		}
		
		$target_file = "../uploads/" . uniqid() . "." . $fileType;
		 
		 // Check if file already exists
		if (file_exists($target_file)) {
			error("Sorry, file ". $target_file ." already exists." );
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 50000000) {
			error("Sorry, your file is too large.");
		}
		 //Moves the uploaded file from temporary to permanent location.
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			query("INSERT INTO media (name, type, address, owner_id) VALUES ('" . $_POST["name"] . "', '" . $type . "', '" . $target_file . "', '" . $_SESSION['id'] . "');");
			success("The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.");
		} 
		else {
			error("Sorry, there was an error uploading your file.");
		} 
	 }
?>