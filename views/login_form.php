<form action="login.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="username" placeholder="Username" type="text"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="password" placeholder="Password" type="password"/>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                LOG IN
            </button>
        </div>
    </fieldset>
    <div>
    <a href="password.php">Forgot your password?</a> 
    </div>
    <div>
        or <a href="register.php">register</a> for an account
    </div>
</form>