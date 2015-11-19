<?php
	/**
     * upload_helper.php
     *
     * Upload files.
     */
	 
	 require_once("config.php");
	 
	 $target_base_dir = "uploads/";

	 
	 function upload($target_dir, $target_file, $type) {
		 // Check if file already exists
		if (file_exists($target_file)) {
			error("Sorry, file already exists.");
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			error("Sorry, your file is too large.");
			$uploadOk = 0;
		}
		 //Moves the uploaded file from temporary to permanent location.
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			query("INSERT INTO media (name, type, address, owner_id) VALUES ('" . $_FILES["fileToUpload"]["name"] . "', '" . $type . "', '" . $target_file . "', '" . $_SESSION['id'] . "');");
			error("The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.");
		} 
		else {
			error("Sorry, there was an error uploading your file.");
		} 
	 }
	 
	function startUpload() {
		global $target_base_dir;
		
		//Create user directory if it doesn't exist.
		if(!file_exists($target_base_dir . $_SESSION['id'])) {
			if(!mkdir($target_base_dir . $_SESSION['id'])) {
				//print($target_base_dir . $_SESSION['id']);
				return false;
			}
			return false;
		}
		
		$fileType = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
		
		//Choose different upload function depending on file extension.
		switch($fileType) {
			case "jpg":
			case "png":
			case "gif":
			case "jpeg":
				return uploadImage();
				break;
			case "wav":
			case "mp3":
			case "ogg":
				return uploadAudio();
				break;
			case "pdf":
				return uploadDocument();
				break;
			default:
				error("File upload failed.");
				break;
		}
	}
	 
	function uploadImage() {
		global $target_base_dir;
		
		//Target directory & file.
		$target_dir = $target_base_dir . $_SESSION['id'] . "/images/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		
		//Create target directory if it doesn't exist.
		if(!file_exists($target_dir)) {
			if(!mkdir($target_dir)) {
				return false;
			}
		}
		//Check that the image is actually an image.
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			//Check file types.
			$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
			if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif" ) {
				error("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
				return false;
			}
			else {
				//Actually upload the file.
				upload($target_dir, $target_file, "image");
				return true;
			}
		} 
		else {
			error("File is not an image.");
			return false;
		}
	 }
	 
	 function uploadAudio() {
		 global $target_base_dir;
		 
		 //Target directory & file.
		$target_dir = $target_base_dir . $_SESSION['id'] . "/audio/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		
		//Create target directory if it doesn't exist.
		if(!file_exists($target_dir)) {
			if(!mkdir($target_dir)) {
				return false;
			}
		}
		//Check file types.
		$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if($fileType != "mp3" && $fileType != "wav" && $fileType != ".ogg" ) {
			error("Sorry, only MP3, WAG, & OGG files are allowed.");
			return false;
		}
		else {
			//Actually upload the file.
			upload($target_dir, $target_file, "audio");
			return true;
		}
	 }
	 
	 function uploadDocument() {
		 global $target_base_dir;
		 
		 //Target directory & file.
		$target_dir = $target_base_dir . $_SESSION['id'] . "/documents/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		
		//Create target directory if it doesn't exist.
		if(!file_exists($target_dir)) {
			if(!mkdir($target_dir)) {
				return false;
			}
		}
		//Check file types.
		$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if($fileType != "doc" && $fileType != "pdf") {
			error("Sorry, PDF files are allowed.");
			return false;
		}
		else {
			//Actually upload the file.
			upload($target_dir, $target_file, "document");
			return true;
		}
	 }
	 
?>