<?php
get_header();
// get_sidebar();
?>
<div id="wp-content">

    <div id="form-reg">
        <div class="form-reg">

            <h2>Lấy lại mật khẩu</h2>
            <form action="" method="POST">
                <label for="">Email</label>
                <input type="text" name="email" id="" placeholder="Email">
                <?php if (isset($error["email"])) echo "<p style='color:red;width:640.768px;margin:10px auto'>" . $error["email"] . "</p>" ?>
                <!-- <p>Sau khi xác nhận thành công mật khẩu sẽ được </p> -->
                <input type="submit" name="btn-reset-pass" id="" value="Lấy mã xác nhận">
            </form>
        </div>
    </div>
</div>

<?php
get_footer();
