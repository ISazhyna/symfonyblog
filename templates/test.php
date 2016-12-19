<?php ob_start(); ?>

<p id="test"><?php echo $json['quotes']['USDUAH']?><p>
    <form>
    <input type="text" id="inp1" name="txt1">
    <input type="text" id="inp2" name="txt2">
    <button type="submit">Submit</button>
    </form>
    <div id="container"><div>

<?php $content = ob_get_clean(); ?>
<?php include '/layout.php'; ?>