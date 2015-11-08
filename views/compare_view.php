<form action="compare.php" method="post">
	</div>
		<h1 style="display: inline;"><?= $people["user_a"]["name"]?></h1>
		<h1 style="display: inline;"><?= $people["user_b"]["name"]?></h1>
		
	<div>
	<div class="form-group">
		<button class="btn btn-default" type="submit"  name="a" value=<?=$people["user_a"]["id"]?>>
			Vote A
		</button>
		<button class="btn btn-default" type="submit" name="skip">
			Skip
		</button>
		<button class="btn btn-default" type="submit" name="b" value=<?=$people["user_b"]["id"]?>>
			Vote B
		</button>
	</div>
	
</form>