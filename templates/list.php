<?php $title = 'List of Posts'; ?>
<?php ob_start() ?>
<h1>List of Posts</h1>
<ul>
    <?php foreach ($posts as $post): ?>
        <li>

            <a href="/show?id=<?= $post['id'] ?>">
                <?= $post['title'] . ' ' . $post['body'] ?>
            </a>
            <a href="/delete?id=<?= $post['id'] ?>" style=" float: right; width: 90%;">X</a>
        </li>

    <?php endforeach; ?>
</ul>

<div><a href="/more3">
        <p>More 3 </p>
    </a></div>

<div><a href="/less3">
        <p>Less 3</p>
    </a></div>
<div><a href="/form">
        <p>Create new post</p>
    </a></div>
<?php $content = ob_get_clean() ?>
<?php include 'layout.php' ?>
