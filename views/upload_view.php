<form action="upload.php" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<input autocomplete="off" autofocus class="form-control" name="name" placeholder="Name" type="text" required />
	</div>
    Select File to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Submit" name="submit">
</form>