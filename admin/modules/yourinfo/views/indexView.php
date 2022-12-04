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
                        Thông tin cá nhân
                    </div>
                    <div class="card-body">

                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="name">Họ và tên</label>
                                <input class="form-control" type="text" name="fullname" value="<?php echo $info_user["hovaten"] ?>" id="name">
                                <?php if (isset($error["fullname"])) echo "<p style='color:red'>" . $error["fullname"] . "</p>" ?>
                            </div>
                            <div class="form-group">
                                <label for="email">Tên đăng nhập</label>
                                <input class="form-control" type="text" name="username" value="<?php echo $info_user["tendangnhap"] ?>" readonly="readonly" id="email">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" type="text" name="email" value="<?php echo $info_user["email"] ?>" readonly="readonly" id="email">
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <textarea name="address" class="form-control" id="" cols="30" rows="5"><?php echo $info_user["diachi"] ?></textarea>
                                <?php if (isset($error["address"])) echo "<p style='color:red'>" . $error["address"] . "</p>" ?>
                            </div>



                            <input type="submit" class="btn btn-primary" name="btn-update" value="Cập nhật" id="">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
