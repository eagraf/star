<form action="test.php" method="post">
	<?php
		//A list of the test pages, bad practice but it works for now.
		$tests = [
			'upload_test' => ['path' => 'upload_test.php', 'name' => 'Upload Test']
			];
		
		//Print a list of buttons that link to each test page.
		foreach($tests as $test)
		{
			print('<div class="form-group">
				<button class="btn btn-default" type="submit"  name="test_button" value='.$test["path"].'>
					<p>'.$test["name"].'</p>
				</button>
				<div>');
		} 
	?>
</form>