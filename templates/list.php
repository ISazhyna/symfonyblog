<?php $title = 'List of Posts'; ?>
<?php ob_start() ?>
<h1>List of Posts</h1>
<ul>
    <?php foreach ($posts as $post): ?>
        <li>
            <a href="/show?id=<?= $post['id'] ?>">
                <?= $post['title'] . ' ' . $post['body'] ?>
            </a>
        </li>

    <?php endforeach; ?>
</ul>

<div><a href="/more3">
        <?= More3 ?>
    </a></div>

<div><a href="/less3">
        <?= Less ?>
    </a></div>
<?php $content = ob_get_clean() ?>
<?php include 'layout.php' ?>
