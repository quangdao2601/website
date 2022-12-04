
<?php
function construct()
{
    load_model("index");
    load("helper", "url_image");
    load("helper", "format");
}
function forgetpassAction()
{
    $error = [];


    if (isset($_POST["btn-reset-pass"])) {

        if ($_POST["email"] == "") {
            $error["email"] = "Nhập email để lấy lại mật khẩu";
        } else {
            if (check_email_to_resset_pass($_POST["email"]) != 1) {
                $error["email"] = "Email không tồn tại trên hệ thống";
            }
            if (empty($error)) {
                $update = array(
                    "code_reg" => md5($_POST["email"])
                );
                update_code_forget($update, $_POST["email"]);
                $code = md5($_POST["email"]);
                send_mail($_POST["email"], "", "Xác nhận tài khoản từ hệ thống", "Xin chào hãy nhập mã sau vào hệ thống để tạo mật khẩu mới : {$code}");
                header("location:?mod=login&action=confimpass_forgetpass");
            }
        }
    }
    $data["error"] = $error;
    load_view("forgetpass", $data);
}
function confimpass_forgetpassAction()
{
    $data = [];
    if (isset($_POST["btn-confirm"])) {
        $error = [];
        if ($_POST["confirm_code"] == "") {
            $error["confirm_code"] = "Nhập mã để xác nhận tài khoản";
        }
        $data['error'] = $error;
        if (empty($error)) {
            if (check_code_confirm($_POST["confirm_code"]) != 1) {
                $data["fail"] = "Mã xác thực không chính xác";
            } else {
                $code = $_POST["confirm_code"];
                header("location:?mod=login&action=createnewpass&id=$code");
            }
        }
    }
    load_view("confimpass_forgetpass", $data);
}

function createnewpassAction()
{
    $data = [];
    $id = $_GET["id"];
    if (isset($_POST["btn-update-pass"])) {
        $error = [];


        if ($_POST["new_pass"] == "") {
            $error["new_pass"] = "Không được bỏ trống mật khẩu mới";
        } else {
            $pattern = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){8,32}$/";
            $subject = $_POST["new_pass"];
            if (!preg_match($pattern, $subject)) {
                $error["new_pass"] = "Mật khẩu từ 8 tới 32 ký tự , ký tự đầu viết hoa,bao gồm chữ cái,số,ký tự đặc biệt,dấu chấm";
            } else {
                if ($_POST["re_pass"] == "") {
                    $error["re_pass"] = "Không được bỏ trống mật khẩu xác nhận";
                } else {
                    if ($_POST["new_pass"] != $_POST["re_pass"]) {
                        $error["re_pass"] = "Mật khẩu xác nhận không chính xác";
                    }
                }
            }
        }


        $data["error"] = $error;
        if (empty($error)) {
            $info_update["matkhau"] = md5($_POST["new_pass"]);
            create_new_pass($info_update, $id);
            header("location:?mod=login&action=login");
        }
    }
    load_view("createnewpass", $data);
}
function loginAction()
{
    $data = [];
    if (isset($_POST["btn-login"])) {
        $username = $_POST["username"];
        $password = $_POST["psssword"];
        $error = [];
        

        // kiểm tra xem tk mk có đúng k
        if (check_user_login($username, md5($password)) != 1) {
            $error["checklogin"] = "Thông tin tài khoản hoặc mật khẩu không chính xác";
        } else {

            // nếu đúng tk mk thì cấp quyền
            $info_user = get_info_by_username($username);
            $_SESSION["user_login"] = $username;
            // $_SESSION["id_user"] = $info_user["id_user"];

            // role = 0 là admin 1 là user
            $_SESSION["role_user"] = $info_user["role"];

            // đăng nhập xog thì chuyển hướng về trang chủ
            header("location:?mod=home");
        
        }
        $data["error"] = $error;
    }
    load_view("login", $data);
}
function logoutAction()
{
    unset($_SESSION["user_login"]);
    unset($_SESSION["role_user"]);
    header("location:?mod=home");
}
function resloveregAction()
{
    if ($_POST["fullname"] == "") {
        $err_fullname = "<p>Không được bỏ trống họ và tên</p>";
    } else {
        $fullname = $_POST["fullname"];
        $err_fullname = "";
    }

    if (isset($_POST["username"])) {
        if ($_POST["username"] == "") {
            $err_username = "<p>Không được bỏ trống tên đăng nhập</p>";
        } else {
            $pattern = "/^[A-Za-z0-9_\.]{8,32}$/";
            $subject = $_POST["username"];
            if (!preg_match($pattern, $subject)) {
                $err_username = "<p>Tên đăng nhập không đúng định dạng , độ dài từ 8 tới 32 ký tự</p>";
            } else {
                if (check_username($_POST["username"]) == 1) {
                    $err_username = "<p>Username đã tồn tại<p>";
                } else {
                    $err_username = "";
                    $username = $_POST["username"];
                }
            }
        }
    }
    if (isset($_POST["email"])) {
        if ($_POST["email"] == "") {
            $err_email = "<p>Không được bỏ trống email</p>";
        } else {
            $pattern = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
            $subject = $_POST["email"];
            if (!preg_match($pattern, $subject)) {
                $err_email = "<p> Email không đúng định dạng </p>";
            } else {
                if (check_mail($_POST["email"]) == 1) {
                    $err_email =  "<p>Email đã được sử dụng</p>";
                } else {
                    $err_email = "";
                    $email = $_POST["email"];
                }
            }
        }
    }
    if ($_POST["password"] == "") {
        $err_password = "<p>Không được bỏ trống mật khẩu</p>";
    } else {
        $pattern = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){8,32}$/";
        $subject = $_POST["password"];
        if (!preg_match($pattern, $subject))
            $err_password = "<p>Mật khẩu từ 8 tới 32 ký tự , ký tự đầu viết hoa,bao gồm chữ cái,số,ký tự đặc biệt,dấu chấm</p>";
        else {
            $err_password = "";
            $password = $_POST["password"];
        }
    }

    if ($_POST["re_password"] == "") {
        $err_re_password = "<p>Không được bỏ trống mật khẩu xác nhận</p>";
    } else {
        if ($password != $_POST["re_password"]) {
            $err_re_password =  "<p>Mật khẩu xác nhận không chính xác<p>";
        } else {
            $err_re_password = "";
        }
    }
    if ($_POST["address"] == "") {
        $err_address = "<p>Không được bỏ trống địa chỉ liên lạc</p>";
    } else {
        $err_address = "";
        $address = $_POST["address"];
    }
    $data = array(
        "err_fullname" => $err_fullname,
        "err_username" => $err_username,
        "err_email" => $err_email,
        "err_password" => $err_password,
        "err_re_password" => $err_re_password,
        "err_address" => $err_address,
    );
    echo json_encode($data);
}
function regAction()
{
    if (isset($_POST["btn-reg"])) {
        $info_user = array(
            "hovaten" => $_POST["fullname"],
            "tendangnhap" => $_POST["username"],
            "matkhau" => md5($_POST["password"]),
            "email" => $_POST["email"],
            "diachi" => $_POST["address"],
            "role" => "1",
            "tinhtrang" => "0",
            // "nguoithem" => $_SESSION["user_login"],
            "code_reg" => md5($_POST["username"]),
            "active" => 1
        );
        add_user_reg($info_user);

        // $title = "Xác thực tài khoản đăng ký thành viên từ QUANGDAO'STORE";
        // $code = md5($_POST["username"]);
        // $fullname = $_POST['fullname'];
        // $content = "<p>Xin chào:{$fullname}</p>
        //     <p>Bạn vừa đăng ký tài khoản từ trang chủ cửa hàng nếu đúng là bạn hãy nhập đoạn code sau trên trang chủ để xác thực </p>
        //     <strong>$code</strong>
        //     </p>Nếu không phải bạn hãy bỏ qua Email này.
        //     <p>Xin cảm ơn;</p>";
        // send_mail($_POST["email"], $_POST["fullname"], $title, $content);
        // header("location:?mod=login&action=confirm");
        header("location:?mod=login&action=login");
    }
    load_view("reg");
}
function resloveloginAction()
{
    if ($_POST["usernamelogin"] == "") {
        $err_usernamelogin = "<p>Không được bỏ trống tên đăng nhập</p>";
    } else {
        $err_usernamelogin = "";
    }
    if ($_POST["passwordlogin"] == "") {
        $err_passwordlogin = "<p>Không được bỏ trống mật khẩu</p>";
    } else {
        $err_passwordlogin = "";
    }
    $data = array(
        "err_usernamelogin" => $err_usernamelogin,
        "err_passwordlogin" => $err_passwordlogin
    );
    echo json_encode($data);
}
function confirmAction()
{
    $data = [];
    if (isset($_POST["btn-confirm"])) {
        $error = [];
        if ($_POST["confirm_code"] == "") {
            $error["confirm_code"] = "Nhập mã để xác nhận tài khoản";
        }
        $data['error'] = $error;
        if (empty($error)) {
            if (check_code_confirm($_POST["confirm_code"]) != 1) {
                $data["fail"] = "Mã xác thực không chính xác";
            } else {
                $update_actice = array("active" => 0);
                update_active($update_actice, $_POST["confirm_code"]);
                header("location:?mod=login&action=login");
            }
        }
    }
    load_view("confirm", $data);
}
function yourinfoAction()
{
    if (isset($_SESSION["user_login"])) {
        $info = get_info_by_username($_SESSION["user_login"]);
        $data["info"] = $info;
        if (isset($_POST["btn-save"])) {
            $fullname = $_POST["fullname"];
            $address = $_POST["address"];
            $error = [];
            if ($fullname == "") {
                $error["fullname"] = "Không được bỏ trống họ và tên";
            }
            if ($address == "") {
                $error["address"] = "Không được bỏ trống họ và tên";
            }
            $data["error"] = $error;
            if ($_FILES["avata"]["name"] != "") {
                $dir = "public/images/images/" . $_FILES["avata"]["name"];
                move_uploaded_file($_FILES["avata"]["tmp_name"], $dir);
            } else {
                $_FILES["avata"]["name"] = "";
            }
            $info_update = array("hovaten" => $fullname, "diachi" => $address, "anhdaidien" => $_FILES["avata"]["name"]);
            update_information_by_username($info_update, $_SESSION["user_login"]);
            header("location:?mod=login&action=yourinfo");
        }
        $data["type"] = "yourinfo";
        load_view("yourinfo", $data);
    } else {
        header("location:?mod=login&action=login");
    }
}

function changepassAction()
{
    $info = get_info_by_username($_SESSION["user_login"]);
    $data["info"] = $info;
    $data["type"] = "changepass";
    if (isset($_POST["btn-update-pass"])) {
        $error = [];
        if ($_POST["old_pass"] == "") {
            $error["old_pass"] = "Không được bỏ trống mật khẩu";
        } else {
            if (check_old_pass_login(md5($_POST["old_pass"]), $_SESSION["user_login"]) != 1) {
                // echo md5($_POST["old_pass"]);
                $error["old_pass"] = "Mật khẩu không chính xác";
            } else {
                if ($_POST["new_pass"] == "") {
                    $error["new_pass"] = "Không được bỏ trống mật khẩu mới";
                } else {
                    $pattern = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){8,32}$/";
                    $subject = $_POST["new_pass"];
                    if (!preg_match($pattern, $subject)) {
                        $error["new_pass"] = "Mật khẩu từ 8 tới 32 ký tự , ký tự đầu viết hoa,bao gồm chữ cái,số,ký tự đặc biệt,dấu chấm";
                    } else {
                        if ($_POST["re_pass"] == "") {
                            $error["re_pass"] = "Không được bỏ trống mật khẩu xác nhận";
                        } else {
                            if ($_POST["new_pass"] != $_POST["re_pass"]) {
                                $error["re_pass"] = "Mật khẩu xác nhận không chính xác";
                            }
                        }
                    }
                }
            }
        }
        $data["error"] = $error;
        if (empty($error)) {
            $info_update["matkhau"] = md5($_POST["new_pass"]);
            updata_new_pass($info_update, $_SESSION["user_login"]);
        }
    }
    load_view("changepass", $data);
}
