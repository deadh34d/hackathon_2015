<?php include('view/header.php'); ?>
<?php $numLoginAttemptsRemaining = 2;
//TODO: Send invalid login email, and count number of login attempts
?>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            <div class="panel-title">Administrator Login</div>
        </div>
        <div class="panel-body">
            <?php if (isset($_SESSION['error'])) { ?>
            <div class="panel panel-danger">
                <div class="panel-heading text-center">
                    <span class="panel-title">Invalid Login Attempt</div>
            </div>
            <div class="panel-body text-center">Your login attempt has failed. The administrator has been notified of
                this,
                and you have <?php echo $numLoginAttemptsRemaining; ?> attempts remaining before you will be unable to
                log
                in.
            </div>
        </div>
        <?php } ?>
        <div class="panel-body">
            <form class="form-horizontal" action="." method="post">
                <div class="form-group">
                    <label for="username" class="col-sm-2 control-label">Username</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="login" placeholder="Username">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3" name="password"
                               placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="rememberMe"> Remember me
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Sign in</button>
                    </div>
                </div>
                <input type="hidden" name="action" value="doAdminLogin"/>
            </form>
        </div>
    </div>
</div>


<?php include('view/footer.php'); ?>

