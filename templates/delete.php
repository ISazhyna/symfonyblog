<?php $title = 'Delete'; ?>
<?php  Model::delete_post(); ?>
<?php ob_start() ?>
    <html>
    <body>

    <div class="alert alert-success">Post was successfully deleted. </div><br>

    </body>
    </html>
<?php $content = ob_get_clean() ?>
<?php include 'layout.php' ?>