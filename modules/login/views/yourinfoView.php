<?php
get_header();
?>

<div id="wp-content">

    <div id="yourinfo">
        <div class="left">
            <div class="avata">
                <?php if ($info["anhdaidien"] != "") {
                ?>
                    <img src="<?php echo "public/images/images/".$info["anhdaidien"]  ?>" alt="">
                <?php
                } else {
                ?>
                    <img src="public/images/images/avata.png" alt="">
                <?php
                } ?>
                <p><strong><?php echo $info["tendangnhap"] ?></strong></p>
            </div>

            <div class="menu">
                <!-- <p><i class="fa-solid fa-user"> </i>Tài khoản của tôi</p> -->
                <ul>
                    <a href="?mod=login&action=yourinfo" <?php if($type=="yourinfo") echo "style='color:red'" ?>>
                        <li>Hồ sơ</li>
                    </a>
                    <a href="?mod=login&action=changepass">
                        <li>Đổi mật khẩu</li>
                    </a>
                </ul>
            </div>
         
        </div>
        <div class="right">
            <h3>Hồ sơ của tôi</h3>
            <p>Quản lý thông tin để bảo mật tài khoản</p>

            <form action="" method="POST" enctype="multipart/form-data">
                <label for="">Tên đăng nhập</label>
                <input type="text" name="username" readonly="readonly" value="<?php echo $info["tendangnhap"] ?>" id="">
                <label for="">Họ và tên</label>
                <input type="text" name="fullname" value="<?php echo $info["hovaten"] ?>" id="">
                <?php if (isset($error["fullname"])) echo "<p style='color:red'>" . $error["fullname"] . "</p>" ?>
                <label for="">Emai</label>
                <input type="text" name="email" readonly="readonly" value="<?php echo $info["email"] ?>" id="">
                <label for="">Địa chỉ</label>
                <textarea name="address" id="" cols="30" rows="10"><?php echo $info["diachi"] ?></textarea>
                <?php if (isset($error["address"])) echo "<p style='color:red'>" . $error["address"] . "</p>" ?>

                <label for="">Ảnh đại diện</label>
                <input type="file" name="avata">
                <input type="submit" name="btn-save" value="Lưu thông tin">
            </form>
        </div>
    </div>
</div>
<?php
get_footer();
