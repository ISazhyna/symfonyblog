<?php $title = 'List of Posts';?>
<?php
if (isset($_COOKIE['test'])) $cnt=$_COOKIE['test']+1;
else $cnt=1;
setcookie("test",$cnt,0x6FFFFFFF);
echo "<p>Вы посещали эту страницу <b>".$_COOKIE['test']."</b> раз</p>";
//SetCookie("test","");
?>
<?php ob_start(); ?>
<?php if ($deleteMessage) : ?>
    <div class=\"alert alert-success\">Post №<?= $_GET['id'] ?> was successfully deleted. </div><br>
<?php endif; ?>

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
        <tbody>
        <?php foreach ($posts as $post): ?>
            <tr>
                <td>
                    <a href="/post/show?id=<?= $post['id'] ?>">
                        <?= $post['title'] ?>
                    </a>
                </td>
                <td><a href="/post/delete?id=<?= $post['id'] ?>"><span class="glyphicon glyphicon-remove"
                                                                       aria-hidden="true"></span></a>
                </td>
                <td><a href="/post/edit?id=<?= $post['id'] ?>"><span class="glyphicon glyphicon-edit"
                                                                     aria-hidden="true"></span></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>
<div><a class="btn btn-primary" href="/post/more3" role="button">
        <p>More 3 </p>
    </a></div>

<div><a class="btn btn-success" href="/post/less3" role="button">
        <p>Less 3</p>
    </a></div>
<div><a class="btn btn-info" href="/post/form" role="button">
        <p>Create new post</p>
    </a></div>
<?php $content = ob_get_clean(); ?>
<?php include '/../layout.php'; ?>
