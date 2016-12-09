<?php $title = 'Add new user'; ?>
<?php ob_start() ?>
    <div class="form_box">
        <form class="form-horizontal rf" action="save-new-user" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control rfield" id="usr_name" name="username" placeholder="write name">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">E-mail:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control rfield" id="eml" name="email" placeholder="write e-mail here">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Password:</label>
                <div class="col-sm-10">
                    <input type="password"class="form-control rfield" id="pswrd" name="password" placeholder="type password">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit"  class="btn btn-default">Сохранить</button>
                </div>
            </div>
                    <button type="submit" class="btn btn-default btn_submit" disabled>Сохранить Ajax</button>
            <div id="save_user" display></div>
        </form>
    </div>
<?php $content = ob_get_clean() ?>
<?php include '/../layout.php' ?>


<!--disabled="disabled"-->
