<?php $title = 'Form'; ?>
<?php ob_start() ?>
    <div class="container">
        <form class="form-horizontal" action="add_new_post_ajax_validation" method="post">
            <p><span style="color: red">* required field.</span></p>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Title, не более 30 символов</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" placeholder="write title here"> <span class="error title">* <?php echo $titleErr;?></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Text, не более 100 символов:</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" name="body" placeholder="write content here"></textarea><span class="error body">* <?php echo $textErr;?></span>
                </div>
            </div>
                      <div class="form-group">
                <div id="save_post"></div>
            </div>
            <div class="col-sm-offset-2 col-sm-10">

            </div>
        </form>
        <button id="subm_ajax"  type="submit" class="btn btn-default">Сохранить Ajax</button>
    </div>
<?php $content = ob_get_clean() ?>
<?php include '/../layout.php' ?>

