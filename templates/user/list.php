<?php $title = 'List of Users'; ?>
<?php ob_start(); ?>
<?php if ($deleteMessage) : ?>
    <div class=\"alert alert-success\">User №<?= $_GET['id'] ?> was successfully deleted. </div><br>
<?php endif; ?>

<h1>List of Users</h1>
<div class="container">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Title</th>
            <th>Delete user</th>
            <th>Edit user</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td>
                    <a href="/user/show?id=<?= $user['id'] ?>">
                        <?= $user['title'] . ' ' . $user['email'] ?>
                    </a>
                </td>
                <td><a href="/user/delete?id=<?= $user['id'] ?>"><span class="glyphicon glyphicon-remove"
                                                                       aria-hidden="true"></span></a>
                </td>
                <td><a href="/user/edit?id=<?= $user['id'] ?>"><span class="glyphicon glyphicon-edit"
                                                                     aria-hidden="true"></span></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>

<div><a class="btn btn-info" href="/user/add-new-user" role="button">
        <p>Add new user</p>
    </a></div>
<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>
