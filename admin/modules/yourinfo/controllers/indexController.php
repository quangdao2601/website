<?php
function construct()
{
    load_model("index");
}
function infoAction()
{
    $info_user = get_info_by_username($_SESSION["user_login"]);
    if (isset($_POST["btn-update"])) {
        $error = [];
        if ($_POST["fullname"] == "") {
            $error["fullname"] = "Không được bỏ trống họ và tên";
        }
        if ($_POST["address"] == "") {
            $error["address"] = "Không được bỏ trống địa chỉ";
        }

        $data["error"] = $error;
        if (empty($error)) {
            $info_update["hovaten"] = $_POST["fullname"];
            $info_update["diachi"] = $_POST["address"];
            update_info($info_update, $info_user["id_user"]);
        }
    }
    $info_user = get_info_by_username($_SESSION["user_login"]);
    $data["info_user"] = $info_user;
    load_view("index", $data);
}
function resetpassAction()
{
    $data = [];
  
    if (isset($_POST["btn_change_pass"])) {
        $error = [];
        if ($_POST["old_pass"] == "") {
            $error["old_pass"] = "Không được bỏ trống mật khẩu";
        } else {
            if (check_old_pass(md5($_POST["old_pass"]), $_SESSION["user_login"]) != 1) {
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
        if (empty($error)) {
            $info_update["matkhau"] = md5($_POST["new_pass"]);
            updata_pass($info_update, $_SESSION["user_login"]);
        }

        $data["error"] = $error;
    }
    load_view("resetpass", $data);
}
