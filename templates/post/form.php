<?php $title = 'Form'; ?>
<?php ob_start() ?>
    <div class="container">
<!--        <form class="form-horizontal" action="save-new-post" method="post">-->
<!--        <form class="form-horizontal" action="add_new_post_ajax" method="post">-->
        <form class="form-horizontal" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Title:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" placeholder="write title here">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Text:</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" name="body" placeholder="write content here"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Сохранить</button>
                </div>
                <div class="col-sm-offset-2 col-sm-10">
                    <button id="subm_ajax" class="btn btn-default">Сохранить Ajax</button>
                </div>
                <div id="save_post"></div>
            </div>
        </form>
    </div>
<?php $content = ob_get_clean() ?>
<?php include '/../layout.php' ?>