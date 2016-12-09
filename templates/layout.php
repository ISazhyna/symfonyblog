<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="/templates/post/ajaxpost.js"></script>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>

<?php if (isset($_SESSION['login_user'])) : ?>
<div class="alert alert-success">
    <p>You logged in as <?php echo $_SESSION['login_user'] ?></p>
</div>
<a href="/logout-action">Logout</a>
<?php endif; ?>
<?= $content?>
<?php //var_dump( $_COOKIE['username'])?>
<?php //var_dump( $_SESSION['login_user'])?>
<?php //var_dump($_SERVER['HTTP_REFERER'])?>
</body>
</html>


