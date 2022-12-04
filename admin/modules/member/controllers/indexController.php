<?php
function construct()
{
    load_model("index");
}
function listmemberAction()
{
    load("helper", "pagging");
    $data = [];

    // lấy type từ url
    $type = isset($_GET["type"]) ? $_GET["type"] : "all";
    $where = "1"; // điều kiện nếu type khác all 
    if ($type != "all") {
        // điều kiện nếu type khác all
        $where = "nguoidung.tinhtrang='{$type}'";
    }
    $str = isset($_GET["str"]) ? $_GET["str"] : "";

    // nếu tồn tại nút tìm kiếm
    if (isset($_POST["btn-search"])) {
        $str = $_POST['q'];
        $type = "search";
        $where = "nguoidung.tendangnhap like '%$str%'";
    }
    if ($type == "search") {
        // không tồn tại nút tiềm kiếm nhưng lưu lịch sử tìm kiếm
        $where = "nguoidung.tendangnhap like '%$str%'";
    }
    // lấy tổng số tho điều kiện
    $total_member = get_nums_member($where);
    // echo $total_member;
    $num_member = 4; // số người 1 trang
    $num_pages = $total_member / $num_member; // số trang
    $num_pages = ceil($num_pages);
    $page = !empty($_GET["page"]) ? $_GET["page"] : 1;
    $start = ($page - 1) * $num_member; // điểm bắt đầu

    if ($type == "all") {
        $where = "nguoidung.tinhtrang=trangthainguoidung.id  LIMIT $start,$num_member";
    } else {
        if ($type == "search") {
            $where = "nguoidung.tinhtrang=trangthainguoidung.id  AND  nguoidung.tendangnhap like '%$str%' LIMIT $start,$num_member";
        } else {
            $where = "nguoidung.tinhtrang=trangthainguoidung.id  AND  nguoidung.tinhtrang='{$type}' LIMIT $start,$num_member";
        }
    }

    $list_member = get_list_member_pagination($where);
    $data["list_member"] = $list_member;
    $data["num_pages"] = $num_pages;
    $data["type"] = $type;
    $data["page"] = $page;
    $data["str"] = $str;
    load_view("index", $data);
}
function addmemberAction()
{
    $data = [];
    if (isset($_POST["btn-add-member"])) {
        $error = [];
        if ($_POST["fullname"] == "") {
            $error["fullname"] = "Không được bỏ trống họ và tên ";
        }

        if ($_POST["username"] == "") {
            $error["username"] = "Không được bỏ trống tên đăng nhập ";
        } else {

            $pattern = "/^[A-Za-z0-9_\.]{8,32}$/";
            $subject = $_POST["username"];
            if (!preg_match($pattern, $subject))
                $error["username"] = "Tên đăng nhập không đúng định dạng , độ dài từ 8 tới 32 ký tự";
        }
        if ($_POST["email"] == "") {
            $error["email"] = "Không được bỏ trống email";
        } else {
            $pattern = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
            $subject = $_POST["email"];
            if (!preg_match($pattern, $subject))
                $error["email"] = "Email không đúng định dạng";
        }
        if ($_POST["password"] == "") {
            $error["password"] = "Không được bỏ trống mật khẩu";
        } else {
            $pattern = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){8,32}$/";
            $subject = $_POST["password"];
            if (!preg_match($pattern, $subject))
                $error["password"] = "Mật khẩu từ 8 tới 32 ký tự , ký tự đầu viết hoa,bao gồm chữ cái,số,ký tự đặc biệt,dấu chấm";
        }
        if ($_POST["re_password"] == "") {
            $error["re_password"] = "Không được bỏ trống mật khẩu xác nhận";
        } else {
            if ($_POST["password"] != $_POST["re_password"]) {
                $error["re_password"] = "Mật khẩu xác nhận không chính xác";
            }
        }
        if ($_POST["address"] == "") {
            $error["address"] = "Không được bỏ trống địa chỉ liên lạc";
        }
        if (empty($_POST["permission"])) {
            $error["permission"] = "Không được bỏ trống quyền thành viên";
        }
        $data["error"] = $error;
        $date = getdate(time());
        $mday = $date['mday'];
        $mon = $date['mon'];
        $year = $date['year'];
        $hour = $date['hours'];
        $minute = $date['minutes'];
        $second = $date['seconds'];
        $time = $mday . "/" . $mon . "/" . $year . "-" . $hour . ":" . $minute . ":" . $second;
        if (empty($error)) {
            $info_user = array(
                "hovaten" => $_POST["fullname"],
                "tendangnhap" => $_POST["username"],
                "matkhau" => md5($_POST["password"]),
                "email" => $_POST["email"],
                "diachi" => $_POST["address"],
                "role" => "0",
                "tinhtrang" => "0",
                // "ngayhoatdong" => $time,
                "nguoithem" => $_SESSION["user_login"],
                "active"=>0

            );
            add_member($info_user);
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["permission"] = $_POST["permission"];
            header("location:?mod=member&action=addpermission");
        }
    }
    $list_permission = get_list_permission();
    $data["list_permission"] = $list_permission;
    load_view("addmember", $data);
}
function updatememberAction()
{
    $id = $_GET["id"];
    $data = [];
    $info_user = get_user_by_id($id);
    $data['info_user'] = $info_user;
    if (isset($_POST["btn-update"])) {
        $error = [];
        if ($_POST["fullname"] == "") {
            $error["fullname"] = "Không được bỏ trống họ và tên ";
        }

        if ($_POST["address"] == "") {
            $error["address"] = "Không được bỏ trống địa chỉ liên lạc";
        }
        $data["error"] = $error;
        if (empty($error)) {
            $info_update["tinhtrang"] = $_POST["status"];
            $info_update["hovaten"] = $_POST["fullname"];
            $info_update["diachi"] = $_POST["address"];
            update_member($info_update, $id);
            header("location:?mod=member&action=listmember");
        }
    }
    load_view("updatemember", $data);
}
function deletememberAction()
{
    // echo "<script>confirm('Ban xác nhận xóa ??')</script>";
    // $check="echo confirm('Bạn xác nhận muốn xóa ??')";
    // if("<script>confirm('Ban xác nhận xóa ??')</script>"==false){
    //     echo "ok";
    // }


    $id = $_GET["id"];
    $data["tinhtrang"] = '2';
    delete_member($id, $data);
    header("location:?mod=member&action=listmember  ");
}
function addpermissionAction()
{
    $result = get_id_by_user($_SESSION["username"]);
    $id = $result["id_user"];
    foreach ($_SESSION["permission"] as $item) {
        add_permission($id, $item);
    }
    unset($_SESSION["permission"]);
    unset($_SESSION["username"]);
    header("location:?mod=member&action=addmember");
}
function update_permission_memberAction()
{
    $id = $_GET["id"];
    $list_permission = get_list_permission_member($id);

    if (isset($_POST["btn-update-permission"])) {
        //   print_r($_POST["permission"]);
        $list = $_POST["permission"];
        foreach ($list_permission as $key => $item) {
            if (!array_key_exists($item["id_quyen"], $list)) {
                delete_permission_member($item["id_quyen"], $id);
            }
        }
        $list_permission = get_list_permission_member($id);
        foreach ($list as $item2) {
            $check = 0;
            foreach ($list_permission as $item3) {
                if ($item2 == $item3["id_quyen"]) {
                    $check = 1;
                }
            }
            if ($check == 0) {
                add_permission($id, $item2);
            }
        }
        header("location:?mod=member&action=listmember");
    }
    $list_permission_member = get_list_permission_member($id);
    $list_permission = get_list_permission();
    $data["list_permission_member"] = $list_permission_member;
    $data["list_permission"] = $list_permission;
    load_view("updatePermissionMember", $data);
}
