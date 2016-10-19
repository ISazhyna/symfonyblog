<?php $title = 'Welcome'; ?>
<?php ob_start() ?>
    <html>
    <body>
    <div class="alert alert-success"> New post <?php echo $_POST["title"]; ?> was successfully added </div><br>
    </body>
    </html>
<?php $content = ob_get_clean() ?>
<?php include 'layout.php' ?>