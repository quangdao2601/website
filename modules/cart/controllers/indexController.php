<?php
function construct()
{
    load_model("index");
    load("helper", "cart");
    load("helper", "url_image");
    load("helper", "format");
}
function listcartAction()
{
    if (isset($_POST["btn-update-cart"]) && !empty($_SESSION["cart"]["list_cart"])) {
        foreach ($_POST["list_order"] as $key => $item) {
            $_SESSION["cart"]["list_cart"][$key]["soluong"] = $item;
        }
        update_info_cart();
    }

    load_view("listcart");
}
function checkoutAction()
{
    // unset($_SESSION['cart']);
    if (isset($_SESSION["user_login"])) {
        $info_user = get_info_user_by_username($_SESSION["user_login"]);
        $data["info_user"] = $info_user;
        if (isset($_POST["btn-checkout"])) {
            $fullname = $_POST["fullname"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $address = $_POST["address"];
            $notes = $_POST["notes"];
            // $method = $_POST["method"];

            $error = [];
            if ($_POST["method"] == "") {
                $error["method"] = 'Vui lòng chọn hình thức thanh toán';
            }
            if ($fullname == "") {
                $error["hovaten"] = "không bỏ trống họ và tên";
            }
            if ($phone == "") {
                $error["phone"] = "Vui lòng nhập số điện thoại để liên lạc";
            }
            if ($address == "") {
                $error["address"] = "Vui lòng nhập địa chỉ giao hàng";
            }
            $data["error"] = $error;
            if (empty($error)) {
                $info_order = array(
                    "hovaten" => $fullname,
                    "username" => $_SESSION["user_login"],
                    "lienlac" => $phone,
                    "tongtien" => $_SESSION["cart"]["info_cart"]["total"],
                    "soluongdonhang" => $_SESSION["cart"]["info_cart"]["num_order"],
                    "diachigiaohang" => $address,
                    "ghichu" => $notes,
                    "trangthai" => "0"
                );
                add_order($info_order);
                header("location:?mod=cart&action=add_detail");
            }
        }
        load_view("checkout", $data);
    } else {
        header("location:?mod=login&action=login");
    }
}
function add_detailAction()
{
    $id = get_id_max();
    $id = $id["max(id)"];
    foreach ($_SESSION["cart"]["list_cart"] as $item) {
        $data = array(
            "id_sanpham" => $item["id"],
            "id_donhang" => $id,
            "soluong" => $item["soluong"],
            "dongia" => $item["dongia"]
        );
        inser_detail_order($id, $data);
        $pr = get_product_to_update_number($item["id"]);
        $cl = $pr["soluong"];
        $daban = $pr["soluongdaban"];
        $cl = $cl - $item["soluong"];
        $daban = $daban + $item["soluong"];
        $info_up = array(
            "soluong" => $cl,
            "soluongdaban" => $daban
        );
        update_num_product($info_up, $item["id"]);
    }
    unset($_SESSION["cart"]);
    header("location:?mod=home&action=home");
}

function historyAction()
{
    $list_history = get_list_order_history($_SESSION["user_login"]);
    $list_product = [];
    foreach ($list_history as $item) {
        $list_product[$item["id"]] = get_list_product_order($item["id"]);
    }

    $data["list_product"] = $list_product;
    $data["list_history"] = $list_history;
    // echo "<pre>";
    // print_r($list_product);
    // echo "</pre>";
    load_view("history", $data);
}

function cancelAction()
{
    $id = $_GET["id"];
    $list_product = get_list_product_order($id);
    foreach ($list_product as $item) {
        $info_update = array(
            "soluong" => $item["soluong"] + $item["soluongsanpham"],
            "soluongdaban" => $item["soluongdaban"] - $item["soluongsanpham"]
        );
        update_num_product($info_update, $item["id_sanpham"]);
    }
    $data["trangthai"] = 5;
    update_order($data, $id);
    header("location:?mod=cart&action=history");
}

function addtocartAction()
{
    $id = $_GET["id"];
    $info_product = get_info_product_by_id($id);
    add_to_cart($id, $info_product);
    update_info_cart();
    echo "<pre>";
    print_r($_SESSION['cart']);
    echo "</pre>";
    header("location:?mod=home&action=detailproduct&id=$id");
    // unset($_SESSION["cart"]);

}

function deletecartAction()
{
    unset($_SESSION["cart"]);
    header("location:?mod=cart&action=listcart");
}
function deleteproductcartAction()
{
    $id = $_GET["id"];
    delete_product_cart($id);
    header("location:?mod=cart&action=listcart");
}
function resloveajaxAction()
{
    $id = $_POST["id"];
    $num_order = $_POST["num_order"];


    $_SESSION["cart"]["list_cart"][$id]["soluong"] = $num_order;
    update_info_cart();
    $data = array(
        "id" => $id,
        "sub_total" => currency_format($_SESSION["cart"]["info_cart"]["total"]),
        "total" => currency_format($_SESSION["cart"]["list_cart"][$id]["soluong"] * $_SESSION["cart"]["list_cart"][$id]["dongia"])
    );
    echo json_encode($data);
}
