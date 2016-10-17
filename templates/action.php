<?php $title = 'Welcome'; ?>
<?php ob_start() ?>
<html>
<body>
<?php
var_dump($_POST['title']);
Model::add_new_post();
?>

New post <?php echo $_POST["title"]; ?> was successfully added <br>

</body>
</html>
<?php $content = ob_get_clean() ?>
<?php include 'layout.php' ?>