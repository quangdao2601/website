<?php
function construct()
{
    load_model("index");
    load("helper", "format");
    load("helper", "data_tree");
    load("helper", "tk_prdocuct");
}

function dashboardAction()
{
    $list = [];
    $turnover = get_turnover();
    $data["turnover"] = $turnover;
    $success_order = load_num_order_for_type("`trangthai`=4");
    $cancel_order = load_num_order_for_type("`trangthai`=5");
    $resloving = load_num_order_for_type("`trangthai` != 4 AND `trangthai` != 5");

    $type = !empty($_GET["type"]) ? $_GET["type"] : 4;

    $list = get_list_order_for_type("`trangthai` = {$type}");
    if ($type != 4 && $type != 5) {
        $list = get_list_order_for_type("`trangthai`!= 4 AND `trangthai` != 5");
    }

    $data["list"] = $list;
    $data["success_order"] = $success_order;
    $data["cancel_order"] = $cancel_order;
    $data["resloving"] = $resloving;
    load_view("index", $data);
}
function logoutAction()
{
    unset($_SESSION["user_login"]);
    unset($_SESSION["role_user"]);
    header("location:http://localhost:8080/unitop.vn/project/");
}


function turnoverAction()
{
    $turnover_user = get_turnover_user();
    $id = !empty($_GET["id"]) ? $_GET["id"] : "tk_order";
    $data["id"] = $id;

    // thong ke don hang
    $type = !empty($_GET["type"]) ? $_GET["type"] : 4;
    $list = get_list_order_for_type("`trangthai` = {$type}");
    $turnover = get_turnover();
    $num_order = get_num_order();
    $soluongdaban = get_num_product_order();

    $turnover_user_admin = get_turnover_user();
    $data["turnover_user_admin"] = $turnover_user_admin;

    // thong ke san pham
    $category = list_category();
    $category = data_tree($category, 0,);
    $data["category"] = $category;
    if (isset($_GET["cat"])) {
        $cat = $_GET["cat"];
        $category = get_list_category();
        $category = data_tree($category, $cat);

        $id = [];
        foreach ($category as $item) {
            $id[] = $item["id_theloai"];
        }
        $id[] = $cat;
        $listpr = array();
        foreach ($id as $item) {
            $listpr[] = get_list_product_from_order($item);
        }
        $list = [];
        $count = 0;
        foreach ($listpr as $item3) {
            if (!empty($item3)) {
                foreach ($item3 as $item2) {
                    $list[] = $item2;
                }
            }
        }
        if (!empty($list)) {
            $tk_proudct_by_cat = tk_product($list);
            $top_product = get_top_product($tk_proudct_by_cat["id"]);
            $data["top_product"] = $top_product;
            $data["tk_proudct_by_cat"] = $tk_proudct_by_cat;
        }
    }


    if (isset($_POST["loadturnover"])) {
        if ($id == "tk_order") {
            $start = $_POST["ngaybatdau"];
            $ngayketthuc = $_POST["ngayketthuc"];
            $data["start"] = $start;
            $data["end"] = $ngayketthuc;
            $list = get_list_order_for_date($start, $ngayketthuc);
            $turnover = get_turnover_for_date($start, $ngayketthuc);
            $num_order = get_num_order_for_date($start, $ngayketthuc);
            $soluongdaban = get_num_product_order_for_date($start, $ngayketthuc);
        } else {
            if ($id == "tk_product") {
                $start = $_POST["ngaybatdau"];
                $ngayketthuc = $_POST["ngayketthuc"];
                $data["start"] = $start;
                $data["end"] = $ngayketthuc;
                $id_theloai = $_POST["id_theloai"];
                $data["id_theloai"] = $id_theloai;

                $category = get_list_category();
                $category = data_tree($category, $id_theloai);

                $id = [];
                foreach ($category as $item) {
                    $id[] = $item["id_theloai"];
                }
                $id[] = $id_theloai;
                $listpr = array();
                foreach ($id as $item) {
                    $listpr[] = get_list_product_from_order_for_time($item, $start, $ngayketthuc);
                }
                $list = [];
                $count = 0;
                foreach ($listpr as $item3) {
                    if (!empty($item3)) {
                        foreach ($item3 as $item2) {
                            $list[] = $item2;
                        }
                    }
                }
                if (!empty($list)) {
                    $tk_proudct_by_cat = tk_product($list);
                    $top_product = get_top_product($tk_proudct_by_cat["id"]);
                    $data["top_product"] = $top_product;
                    $data["tk_proudct_by_cat"] = $tk_proudct_by_cat;
                }
            } else {
                $start = $_POST["ngaybatdau"];
                $ngayketthuc = $_POST["ngayketthuc"];
                $data["start"] = $start;
                $data["end"] = $ngayketthuc;
                $turnover_user_admin = get_turnover_user_by_time($start,$ngayketthuc);
                $data["turnover_user_admin"]=$turnover_user_admin;
            }
        }
    }

    $data["soluongdaban"] = $soluongdaban;
    $data["num_order"] = $num_order;
    $data["turnover"] = $turnover;
    $data["list"] = $list;
    load_view("turnover", $data);
}
