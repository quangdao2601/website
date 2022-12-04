<?php
function construct()
{
    load_model("index");
}

function listpermissionAction()
{
    $list_premission = get_list_permission();
    $data["list_permission"] = $list_premission;
    load_view("index", $data);
}
function addpermissionAction()
{
    $data = [];
    if (isset($_POST["btn-add-permission"])) {
        $error = [];
        $namepermission = $_POST["tenquyen"];
        $addresspermission = $_POST["duongdan"];
        if ($namepermission == "") {
            $error["namepermission"] = "Không được bỏ trống tên quyền";
        }
        if ($addresspermission == "") {
            $error["addresspermission"] = "Không được bỏ trống đường dẫn";
        }
        if (empty($error)) {
            add_permission($namepermission, $addresspermission);
            echo "<script type='text/javascript'>alert('Đã thêm thành công');</script>";
            // header("location:?mod=permission");
        }
        $data["error"] = $error;
    }

    load_view("addpermission", $data);
}
function deletepermissionAction()
{
}
