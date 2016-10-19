<?php $title = 'List of Posts'; ?>
<?php ob_start() ?>
<h1>List of Posts</h1>
<div class="container">
<table class="table table-bordered">
    <thead>
    <tr>
        <th>Title</th>
        <th>Delete post</th>
        <th>Edit post</th>
    </tr>
    </thead>
<!--    </table>-->

<!--        <table class="table table-bordered">-->
    <tbody>
    <?php foreach ($posts as $post): ?>
        <tr>
        <td>
                <a href="/show?id=<?= $post['id'] ?>">
                        <?= $post['title'] . ' ' . $post['body'] ?>
                    </a>
        </td>
        <td><a  href="/delete?id=<?= $post['id'] ?>" ><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
        </td>
        <td><a  href="/edit?id=<?= $post['id'] ?>" ><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
        </td>
       </tr>
    <?php endforeach; ?>
    </tbody>
        </table>

</div>
<div><a  class="btn btn-primary" href="/more3" role="button">
        <p>More 3 </p>
    </a></div>

<div><a  class="btn btn-success" href="/less3" role="button">
        <p>Less 3</p>
    </a></div>
<div><a  class="btn btn-info" href="/form" role="button">
        <p>Create new post</p>
    </a></div>
<?php $content = ob_get_clean() ?>
<?php include 'layout.php' ?>
