<?php
get_header();
get_sidebar();
?>
<div id="wp-content">
    <div id="content" class="container-fluid">
        <div class="row">
            <div class="col-7">


                <div class="card">
                    <div class="card-header font-weight-bold">
                        Đổi mật khẩu
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="name">Mật khẩu cũ</label>
                                <input class="form-control" type="text" name="old_pass" id="name">
                                <?php
                                if (isset($error["old_pass"])) echo "<p style='color:red'>" . $error['old_pass'] . "</p>"
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="email">Mật khẩu mới</label>
                                <input class="form-control" type="text" name="new_pass" id="email">
                                <?php
                                if (isset($error["new_pass"])) echo "<p style='color:red'>" . $error['new_pass'] . "</p>"
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="email">Xác nhận mật khẩu</label>
                                <input class="form-control" type="text" name="re_pass" id="email">
                                <?php
                                if (isset($error["re_pass"])) echo "<p style='color:red'>" . $error['re_pass'] . "</p>"
                                ?>
                            </div>
                            <!-- onclick="showformconfirm();return false" -->


                            <input type="submit"  class="btn btn-primary" name="btn_change_pass" value="Đổi mật khẩu">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
