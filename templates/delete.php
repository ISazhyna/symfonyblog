<?php $title = 'Delete'; ?>
<?php  Model::delete_post(); ?>
<?php ob_start() ?>
    <html>
    <body>

   <p>Post was successfully deleted. </p><br>

    </body>
    </html>
<?php $content = ob_get_clean() ?>
<?php include 'layout.php' ?>