<?php
get_header();
get_sidebar();
?>
<div id="wp-content">
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Thêm quyền thành viên
            </div>
            <div class="card-body">
                <div class="col-7">
                    <form method="POST">
                        <div class="form-group">
                            <label for="namepermission">Tên quyền</label>
                            <input type="text" class="form-control" name="tenquyen" id="namepermission">
                            <?php if (isset($error["namepermission"])) echo "<p  style='color:red;'>" . $error["namepermission"] . "</p>" ?>
                            <label for="addresspermiss">Đường dẫn</label>
                            <input type="text" class="form-control" name="duongdan" id="addresspermiss">
                            <?php if (isset($error["addresspermission"])) echo "<p  style='color:red'>" . $error["addresspermission"] . "</p>" ?>
                        </div>
                        <input type="submit" name="btn-add-permission" value="Thêm quyền" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
