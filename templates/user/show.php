<!-- templates/show.php -->
<?php $title = $user['username']; ?>
<?php ob_start(); ?>
<?php switch ($showMessage):
    case 0:
        break;
    case 1: ?>
        <div class="alert alert-success"> Old user "<?= $user['username']; ?>" was successfully updated</div><br>
        <?php
        break;
    case 2: ?>
        <div class="alert alert-success"> New user <?php echo $user['username']; ?> was successfully added</div><br>
        <?php
        break;
endswitch;

?>

<h1 class="text-center text-uppercase">Welcome</h1>
<div class="text-uppercase"><?= $user['username'] ?></div>
<div><?= $user['email'] ?></div>
<?php $content = ob_get_clean() ?>
<?php include '/../layout.php'; ?>








