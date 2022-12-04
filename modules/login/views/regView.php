<?php
get_header();
// get_sidebar();
?>
<style>
    #form-reg .form-reg form .username p,
    #form-reg .form-reg form .fullname p,
    #form-reg .form-reg form .email p,
    #form-reg .form-reg form .password p,
    #form-reg .form-reg form .re_password p,
    #form-reg .form-reg form .addresss p {
        width: 656px;
        margin: 10px auto;
        color: red;
    }
    
</style>
<div id="wp-content">

    <div id="form-reg">
        <div class="form-reg">

            <h2>Đăng ký thành viên</h2>
            <form action="" method="POST" id="form">
                <label for="">Tên đăng nhập</label>
                <input type="text" name="username" id="username" placeholder="Tên đăng nhập">
                <div class="username"></div>

                <label for="">Họ và tên</label>
                <input type="text" name="fullname" id="fullname" placeholder="Họ và tên">
                <div class="fullname"></div>

                <label for="">Email</label>
                <input type="text" name="email" id="email" placeholder="Email">
                <div class="email"></div>


                <label for="">Mật khẩu</label>
                <input type="password" name="password" id="password" placeholder="Mật khẩu">
                <div class="password"></div>

                <label for="">Nhập lại mật khẩu</label>
                <input type="password" name="re_password" id="re_password" placeholder="Nhập lại mật khẩu">
                <div class="re_password"></div>

                <label for="">Địa chỉ liên lạc</label>
                <textarea name="address" id="address" cols="30" rows="10" placeholder="Địa chỉ liên lạc"></textarea>
                <div class="addresss"></div>

                <input type="submit" id="inputsubmit"  disabled  name="btn-reg"  value="Đăng ký">
            </form>
        </div>
    </div>
</div>

<?php
get_footer();
