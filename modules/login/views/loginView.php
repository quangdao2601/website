<?php
get_header();

?>
<style>
    #form .form-login .err_usernamelogin p , #form .form-login .err_passwordlogin p {
        color: red;
        margin: 10px auto;
        width: 50%;
    }
</style>
<div id="wp-content">
    <div id="form">
        <div class="form-login">
            <h2>Xin chào,Đăng nhập tài khoản</h2>
            <form action="" id="btnlogin" method="post">
                <label for="">Tên đăng nhập</label>
                <input type="text" name="username" id="usernamelogin" value="" placeholder="Tên đăng nhập" />
                <div class="err_usernamelogin"></div>
                <label for="">Mật khẩu</label>
                <input type="password" id="passwordlogin" placeholder="Mật khẩu" value="" name="psssword" />
                <div class="err_passwordlogin"></div>
                <input type="submit" name="btn-login" id="" value="Đăng nhập" />
                <?php if (isset($error['checklogin'])) echo "<p style='color:red;width:50%;margin:10px auto' >" . $error['checklogin'] . "</p>" ?>
            </form>
            <a href="?mod=login&action=forgetpass">Quên mật khẩu ?</a><br />
            <span>Hoặc tiếp tục bằng</span>
            <ul>
                <li><img src="public/images/images/facebook.png" alt="" /></li>
                <li><img src="public/images/images/gg.png" alt="" /></li>
                <li><img src="public/images/images/zl.png" alt="" /></li>
            </ul>
        </div>
    </div>
</div>

<?php
get_footer();
