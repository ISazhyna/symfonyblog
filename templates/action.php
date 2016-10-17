<?php $title = 'Welcome'; ?>
<?php ob_start() ?>
<html>
<body>
<?php
var_dump($_POST);

?>

Welcome <?php echo $_POST["name"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?><br>
Age: <?php echo $_POST["age"]; ?>

</body>
</html>
<?php $content = ob_get_clean() ?>
<?php include 'layout.php' ?>