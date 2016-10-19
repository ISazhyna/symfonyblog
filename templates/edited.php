<?php $title = 'Edition succeed'; ?>
<?php ob_start() ?>
    <html>
    <body>
    <?php
    var_dump($_POST["title"]);
    var_dump($_POST["body"]);
    var_dump($_POST["created_at"]);
    var_dump($_POST["getparam"]);
    ?>

    <div class="alert alert-success"> Old post <?php echo $_POST["title"]; ?> was successfully updated </div><br>

    </body>
    </html>
<?php $content = ob_get_clean() ?>
<?php include 'layout.php' ?>