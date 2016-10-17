<?php $title = 'Form'; ?>
<?php ob_start() ?>
<form action="fdhdfhn" method="post">
Title: <input type="text" name="title"><br>
Text: <input type="text" name="body"><br>
Created at: <input type="time" name="created_at"><br>
<input type="submit">
</form>
<?php $content = ob_get_clean() ?>
<?php include 'layout.php' ?>