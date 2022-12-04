<?php
function construct()
{
    load_model("index");
    load("helper", "format");
}
function listorderAction()
{
    $listorder = get_list_order();
    // print_r($listorder);
    $data["listorder"] = $listorder;
    load_view("listorder", $data);
}


function updateorderAction()
{
    $id = $_GET['id'];
    if (isset($_POST["btn-update-order"])) {
        $address = $_POST["address"];
        $notes = $_POST["notes"];
        $trangthai = $_POST["trangthai"];
        if ($trangthai == 4) {
            $nguoihoanthanh = $_SESSION["user_login"];
        } else {
            $nguoihoanthanh = "";
        }
        $error = [];
        if ($address == "") {
            $error["address"] = "không bỏ trống địa chỉ giao hàng";
        }
        $data["error"] = $error;
        if (empty($error)) {
            $info_update = array(
                "diachigiaohang" => $address,
                "ghichu" => $notes,
                "trangthai" => $trangthai,
                "nguoihoanthanh" => $nguoihoanthanh
            );
            update_order($info_update, $id);
            header("location:?mod=order&action=listorder");
        }
    }
    $detail_order = get_list_detail($id);
    // print_r($detail_order);

    $data["detail_order"] = $detail_order;
    // print_r($detail_order);
    load_view("updateorder", $data);
}
