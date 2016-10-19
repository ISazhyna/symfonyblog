<!-- templates/show.php -->
<?php $title = $post['title']; ?>
<?php ob_start(); ?>
<?php if ($showUpdateMessage) : ?>
    <div class="alert alert-success"> Old post "<?= $post['title']; ?>" was successfully updated </div><br>
<?php endif;?>
<h1 class="text-center"><?= $post['title'] ?></h1>
<div class="text-uppercase"><?= $post['created_at'] ?></div>
<div class="text-uppercase"><?= $post['body'] ?></div>
<?php $content = ob_get_clean() ?>
<?php include 'layout.php'; ?>

