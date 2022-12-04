<?php
function construct()
{
    load_model("product");
    load("helper", "data_tree");
}
function listproductAction()
{
    $str = !empty($_GET["str"]) ? $_GET["str"] : " ";
    if (isset($_POST["btn-search"])) {
        $str = $_POST["q"];
    }
    $type = !empty($_GET["type"]) ? $_GET["type"] : 0;
    $list_category = get_List_id_category();
    $list_category = data_tree($list_category, 0);
    $id = [];
    foreach ($list_category as $item) {
        $id[] = $item["id_theloai"];
    }
    $listpr = array();
    foreach ($id as $item2) {
        $listpr[] = get_list_product_by_cateory($item2, $type, $str);
    }
    $total_product = 0;
    $list = [];
    $count = 0;
    foreach ($listpr as $item) {
        if (!empty($item)) {
            foreach ($item as $item2) {
                $total_product++;
                $list[$count] = $item2;
                $count++;
            }
        }
    }
    $num_product = 10;
    $num_pages = $total_product / $num_product;
    $num_pages = ceil($num_pages);
    $page = !empty($_GET["page"]) ? $_GET["page"] : 1;
    $start = ($page - 1) * $num_product;
    $list_load = array();
    $check = 0;
    while ($check != $num_product) {
        if (!empty($list[$start])) {
            $list_load[] = $list[$start];
        }
        $start++;
        $check++;
    }

    // foreach ($list as $key => $item2) {
    //     // echo $key;
    //     if ($start == $key) {
    //         $check+1;
    //         $list_load[] = $item2;

    //         if ($check == $num_product) {
    //             break;
    //         }
    //     }
    // }
    $data["type"] = $type;
    $data["list"] = $list_load;

    $pagging = "<ul class='pagging' style='display:flex;list-style:none'>";
    for ($i = 1; $i <= $num_pages; $i++) {
        $check = "";
        if ($page == $i) {
            $check = "background:red";
        }
        $pagging .= "<a style='display:inline-block;padding:10px;margin-right:10px;background:#007bff;color:white;text-decoration:none;" . $check . "' href='?mod=products&controller=product&action=listproduct&type=" . $type . "&page=" . $i . "&str=" . $str . "'><li>" . $i . "</li></a>";
    }
    $pagging .= "</ul>";
    $data["pagging"] = $pagging;
    load_view("index", $data);
}

function addproductAction()
{
    $data = [];
    if (isset($_POST["btn-add-product"])) {
        $error = [];
        if ($_POST["name"] == "") {
            $error["name"] = "Không được bỏ trống tên sản phẩm";
        }
        if ($_POST["price"] == "") {
            $error["price"] = "Không được bỏ trống giá sản phẩm";
        }
        if ($_POST["code"] == "") {
            $error["code"] = "Không được bỏ trống mã sản phẩm";
        } else {
            if (check_code($_POST["code"]) == 1) {
                $error["code"] = "Sản phẩm đã tồn tại trên hệ thống";
            }
        }
        if ($_POST["num"] == "") {
            $error["num"] = "Không được bỏ trống số lượng sản phẩm";
        }
        if ($_POST["desc"] == "") {
            $error["desc"] = "Không được bỏ trống mô tả ngắn";
        }
        if ($_POST["content"] == "") {
            $error["content"] = "Không được bỏ trống mô tả ngắn";
        }
        if ($_FILES["image"]["name"] == "") {
            $error["image"] = "Không được bỏ trống ảnh sản phẩm";
        }

        $date = getdate(time());
        $mday = $date['mday'];
        $mon = $date['mon'];
        $year = $date['year'];
        $hour = $date['hours'];
        $minute = $date['minutes'];
        $second = $date['seconds'];
        $time = $mday . "/" . $mon . "/" . $year . "-" . $hour . ":" . $minute . ":" . $second;
        if (empty($error)) {
            $info_product = array(
                "masanpham" => $_POST["code"],
                "tensanpham" => $_POST["name"],
                "soluong" => $_POST["num"],
                "dongia" => $_POST["price"],
                "hinhanh" => $_FILES["image"]["name"],
                "motangan" => $_POST["desc"],
                "chitietsanpham" => $_POST["content"],
                "tinhtrang" => $_POST["status"],
                "id_theloai" => $_POST["category"],
                "ngayphathanh" => $time,
                "nguoithem" => $_SESSION["user_login"]
            );
            $dir = "public/images/" . $_FILES["image"]["name"];
            move_uploaded_file($_FILES["image"]["tmp_name"], $dir);
            add_product($info_product);
        }
        $data["error"] = $error;
    }
    $list = get_List_category();
    $list = data_tree($list, 0);
    $data["list"] = $list;
    load_view("addproduct", $data);
}
function updateproductAction()
{
    $id = $_GET["id"];
    if (isset($_POST["btn-update-product"])) {
        $error = [];
        if ($_POST["name"] == "") {
            $error["name"] = "Không được bỏ trống tên sản phẩm";
        }
        if ($_POST["price"] == "") {
            $error["price"] = "Không được bỏ trống giá sản phẩm";
        }
        if ($_POST["num"] == "") {
            $error["num"] = "Không được bỏ trống số lượng sản phẩm";
        }
        if ($_POST["desc"] == "") {
            $error["desc"] = "Không được bỏ trống mô tả ngắn";
        }
        if ($_POST["content"] == "") {
            $error["content"] = "Không được bỏ trống mô tả ngắn";
        }

        if (empty($error)) {
            $info_product = array(
                "tensanpham" => $_POST["name"],
                "soluong" => $_POST["num"],
                "dongia" => $_POST["price"],
                "motangan" => $_POST["desc"],
                "chitietsanpham" => $_POST["content"],
                "tinhtrang" => $_POST["status"],
                "id_theloai" => $_POST["category"],
            );
            update_product($info_product, $id);
            header("location:?mod=products&controller=product&action=listproduct");
        }
        $data["error"] = $error;
    }

    $product = get_list_product($id);
    $data["product"] = $product;
    $list_category = get_List_category();
    $list_category = data_tree($list_category, 0);
    $data["list"] = $list_category;
    load_view("updateproduct", $data);
}
function deleteproductAction()
{
    $id = $_GET["id"];
    $data["tinhtrang"] = 2;
    update_product($data, $id);
    header("location:?mod=products&controller=product&action=listproduct");
}

function restoreproductAction()
{
    $id = $_GET["id"];
    $data["tinhtrang"] = 0;
    update_product($data, $id);
    header("location:?mod=products&controller=product&action=listproduct");
}
