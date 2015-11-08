<form action="compare.php" method="post">

	<div class="form-group">
		<button class="btn btn-default" type="submit"  name="a" value=<?=$people["user_a"]["id"]?>>
			<h1><?=$people["user_a"]["name"]?></h1>
		</button>
		
		<button class="btn btn-default" type="submit" name="b" value=<?=$people["user_b"]["id"]?>>
			<h1><?=$people["user_b"]["name"]?></h1>
		</button>
	</div>
	<div>
		<button class="btn btn-default" type="submit" name="skip">
			<h2>Skip</h2>
		</button>
	</div>
	
</form>