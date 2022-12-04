<?php
get_header();
// get_sidebar();
?>
<div id="wp-content">

    <div id="form-reg">
        <div class="form-reg">

            <h2>Xác thực tài khoản</h2>
            <form action="" method="POST">
                <label for="">Nhập mã từ Email để xác nhận</label>
                <input type="text" name="confirm_code" id="" placeholder="Mã xác nhận">
                <?php if (isset($error["confirm_code"])) echo "<p style='color:red;width:650.768px;margin:0px auto'>" . $error["confirm_code"] . "</p>" ?>

                <input type="submit" name="btn-confirm" id="" value="Xác Thực">
                <?php if (isset($fail)) echo "<p style='color:red;width:650.768px;margin:0px auto'>" . $fail . "</p>" ?>


            </form>
        </div>
    </div>
</div>

<?php
get_footer();
