<?php $title = 'Login form'; ?>
<?php ob_start() ?>

<?php if ($error) :?>
    <div class="alert alert-danger">
        <p><?php echo $error; ?></p>
    </div>
<?php endif; ?>

    <div class="container">
        <form class="form-horizontal" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2">User:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Password:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" value="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="submit" class="btn btn-default">Login</button>
                </div>
            </div>
        </form>
    </div>
<?php $content = ob_get_clean() ?>
<?php include '/../layout.php' ?>