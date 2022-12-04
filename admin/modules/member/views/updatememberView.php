<?php
get_header();
get_sidebar();
?>
<div id="wp-content">
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Cập nhật thông tin thành viên
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <label for="name">Họ và tên</label>
                        <input class="form-control" type="text" name="fullname" value="<?php echo $info_user["hovaten"] ?>" id="name">
                        <?php if (isset($error["fullname"])) echo "<p style='color:red'>" . $error["fullname"] . "</p>" ?>
                    </div>
                    <div class="form-group">
                        <label for="name">Tên đăng nhập</label>
                        <input class="form-control" type="text" readonly="readonly" value="<?php echo $info_user["tendangnhap"] ?>" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="text" readonly="readonly" value="<?php echo $info_user["email"] ?>" name="email" id="email">
                    </div>
                   
                    <div class="form-group">
                        <label for="email">Địa chỉ</label>
                        <textarea name="address" class="form-control" id="" cols="30" rows="5"><?php echo $info_user["diachi"] ?></textarea>
                        <?php if (isset($error["address"])) echo "<p style='color:red' >" . $error["address"] . "</p>" ?>
                    </div>
                    <div class="form-group">
                        <label for="">Trạng thái</label>
                        <select class="form-control" name="status" id="">
                            <option value="0" <?php if ($info_user["tinhtrang"] == 0) echo "selected='selected'" ?>>Đang hoạt động</option>
                            <option value="1" <?php if ($info_user["tinhtrang"] == 1) echo "selected='selected'" ?>>Đã khóa</option>
                            <option value="2" <?php if ($info_user["tinhtrang"] == 2) echo "selected='selected'" ?>>Đã xóa</option>
                        </select>

                    </div>
                    <input type="submit" class="btn btn-primary" value="Cập nhật thông tin" name="btn-update">
                </form>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
