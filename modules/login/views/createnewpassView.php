<?php
get_header();
// get_sidebar();
?>
<div id="wp-content">

    <div id="form-reg">
        <div class="form-reg">

            <h2>Tạo mật khẩu mới</h2>
            <form action="" method="POST">
       
                <label for="">Nhập mật mới</label>
                <input type="password" name="new_pass" placeholder="Nhập mật khẩu mới" id="">
                <?php if (isset($error["new_pass"])) echo "<p style='color:red;width: 640px;0px;margin:10px auto'>" . $error["new_pass"] . "</p>" ?>

                <label for="">Nhập lại mật khẩu</label>
                <input type="password" name="re_pass" placeholder="Nhập mật khẩu mới" id="">
                <?php if (isset($error["re_pass"])) echo "<p style='color:red;width:640px;margin:10px auto'>" . $error["re_pass"] . "</p>" ?>
                <input type="submit" name="btn-update-pass" value="Đổi mật khẩu">
            </form>
        </div>
    </div>
</div>

<?php
get_footer();
