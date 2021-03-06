<!-- templates/show.php -->
<?php $title = $post['title']; ?>
<?php ob_start(); ?>
<?php switch ($showMessage):
    case 0:
        break;
    case 1: ?>
        <div class="alert alert-success"> Old post "<?= $post['title']; ?>" was successfully updated</div><br>
        <?php
        break;
    case 2: ?>
        <div class="alert alert-success"> New post <?php echo $post['title']; ?> was successfully added</div><br>
        <?php
        break;
endswitch;

?>

<h1 class="text-center"><?= $post['title'] ?></h1>
<div class="text-uppercase"><?= $post['created_at'] ?></div>
<div class="text-uppercase"><?= $post['body'] ?></div>
<?php $content = ob_get_clean() ?>
<?php include '/../layout.php'; ?>








