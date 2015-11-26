<form action="register.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="name" placeholder="Name" type="text" required/>
            <input autocomplete="off" autofocus class="form-control" name="email" placeholder="Email" type="email" required/>
        </div>
        <div class="form-group">
            <input class="form-control" name="password" placeholder="Password" type="password" required/>
        </div>
        <div class="form-group">
            <input class="form-control" name="confirmation" placeholder="confirmation" type="password" required/>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">Register</button>
        </div>
    </fieldset>
</form>
<div>
    or <a href="login.php">Log In</a>
</div>
