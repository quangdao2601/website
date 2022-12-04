<?php
get_header();
get_sidebar();
?>
<div id="wp-content">
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Thêm người dùng
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <label for="fullname">Họ và tên</label>
                        <input class="form-control" type="text" name="fullname" id="name">
                        <?php if (isset($error["fullname"])) echo "<p style='color:red' >" . $error["fullname"] . "</p>" ?>
                    </div>
                    <div class="form-group">
                        <label for="userna">Tên đăng nhập</label>
                        <input class="form-control" type="text" name="username" id="name">
                        <?php if (isset($error["username"])) echo "<p style='color:red' >" . $error["username"] . "</p>" ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="text" name="email" id="email">
                        <?php if (isset($error["email"])) echo "<p style='color:red' >" . $error["email"] . "</p>" ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Mật khẩu</label>
                        <input class="form-control" type="text" name="password" id="email">
                        <?php if (isset($error["password"])) echo "<p style='color:red' >" . $error["password"] . "</p>" ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Nhập lại mật khẩu</label>
                        <input class="form-control" type="text" name="re_password" id="email">
                        <?php if (isset($error["re_password"])) echo "<p style='color:red' >" . $error["re_password"] . "</p>" ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Địa chỉ</label>
                        <textarea name="address" class="form-control" id="" cols="30" rows="5"></textarea>
                        <?php if (isset($error["address"])) echo "<p style='color:red' >" . $error["address"] . "</p>" ?>
                    </div>


                    <label for="">Quyền thành viên</label>
                    <?php
                    if (!empty($list_permission)) {
                        foreach ($list_permission as $item) {
                    ?>
                            <div class="form-group">
                                <input type="checkbox" style="margin-right:20px;" id="<?php echo $item["duongdan"] ?>" name=permission[] value="<?php echo $item['id_quyen'] ?>">
                                <label for="<?php echo $item["duongdan"] ?>" style="margin-right: 5PX;"><?php echo $item["tenquyen"] ?></label>

                            </div>
                    <?php
                        }
                    }
                    ?>



                    <?php

                    ?>
                    <?php if (isset($error["permission"])) echo "<p style='color:red' >" . $error["permission"] . "</p>" ?>

                    <input type="submit" name="btn-add-member" class="btn btn-primary" value="Thêm thành viên">
                </form>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
