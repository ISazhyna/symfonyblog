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
<!--    <div class=\"alert alert-success\">Post №--><?//= $_GET['id'] ?><!-- was successfully deleted. </div><br>-->
<?php endif; ?>
<div id="dlt_msg" class=\"alert alert-success\"></div><br>

<h1>List of Posts</h1>
<div class="container">
    <table id="lst_tbl" class="table table-bordered">
        <thead>
        <tr>
            <th>Title</th>
            <th>Delete post</th>
            <th>Edit post</th>
            <th>Show post(ajax)</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($posts as $post):  ?>
            <tr>
                <td>
                    <a href="/post/show?id=<?= $post['id'] ?>">
                        <?= $post['title'] ?>
                    </a>
                </td>
                <td><p class="p_id" post_id="<?= $post['id'] ?>"><span class="glyphicon glyphicon-remove"
                                                                       aria-hidden="true"></span></p>
                </td>
                <td><a href="/post/edit?id=<?= $post['id'] ?>"><span class="glyphicon glyphicon-edit"
                                                                     aria-hidden="true"></span></a>
                </td>
                <td>
                    <a class="ajax_post" data="<?= $post['id']?>"><span class="glyphicon glyphicon-folder-open"
                                                                     aria-hidden="true"></span></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div id="loader" style="display: none">
        <p>....LOADING....</p>
    </div>
    <div id="post_content">
    </div>
</div>

<?php  //http://stackoverflow.com/questions/5128292/using-a-html-select-element-to-add-get-parameters-to-url ?>
<form method="get">
    <p><select size="1" name="qnt">
            <?php  for($p=1;$p<=$count;$p++):?>
                <option value=<?= $p ?>> <?= $p ?></option>
            <?php endfor; ?>
        </select></p>
    <p><input type="submit" value="Choose quantity of posts displayed"></p>
</form>

<ul class="pagination">
    <?php
    for($i=1;$i<=$total;$i++): //get parameter $total from PostController listAction()
        ?>
    <li> <a href="?qnt=<?= $_GET['qnt']?>&page=<?= $i ?>"> <?= $i ?> </a></li>
    <?php endfor; ?>
</ul>


<div><a class="btn btn-info" href="/post/form" role="button">
        <p>Create new post</p>
    </a></div>
<?php $content = ob_get_clean(); ?>
<?php include '/../layout.php'; ?>
