<?php $title = 'Form'; ?>
<?php ob_start() ?>
<form action="fdhdfhn" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
Age: <input type="text" name="age"><br>
<input type="submit">
</form>
<?php $content = ob_get_clean() ?>
<?php include 'layout.php' ?>