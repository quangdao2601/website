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
                    <a href="?mod=login&action=changepass" <?php   if($type=="changepass") echo "style='color:red'" ?>>
                        <li>Đổi mật khẩu</li>
                    </a>
                </ul>
            </div>
            
        </div>
        <div class="right">
            <h3>Hồ sơ của tôi</h3>
            <p>Quản lý thông tin để bảo mật tài khoản</p>
            <form action="" method="post">
                <label for="">Nhập mật khẩu cũ</label>
                <input type="password" name="old_pass" placeholder="Nhập mật khẩu cũ" id="">
                <?php if(isset($error["old_pass"])) echo "<p style='color:red'>".$error["old_pass"]."</p>" ?>
                <label for="">Nhập mật mới</label>
                <input type="password" name="new_pass" placeholder="Nhập mật khẩu mới" id="">
                <?php if(isset($error["new_pass"])) echo "<p style='color:red'>".$error["new_pass"]."</p>" ?>

                <label for="">Nhập lại mật khẩu</label>
                <input type="password" name="re_pass" placeholder="Nhập mật khẩu mới" id="">
                <?php if(isset($error["re_pass"])) echo "<p style='color:red'>".$error["re_pass"]."</p>" ?>


                <input type="submit" name="btn-update-pass" value="Đổi mật khẩu">
            </form>
            
        </div>
    </div>
</div>
<?php
get_footer();
