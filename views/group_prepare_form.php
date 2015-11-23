<form action="group_create.php" method="post">
    <fieldset>
        <div class="form-group">
            <input class="form-control" name="group_size" placeholder="Group Size" type="number" min="1" required />
        </div>
		<div class="form-group">
            <input class="form-control" name="cat_num" placeholder="# of categories" type="number" min="1" required />
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                Create
            </button>
        </div>
    </fieldset>
</form>