<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
    load("helper", "data_tree");
    load("helper", "url_image");
    load("helper", "format");
    load("helper", "get_list_product");
    load("helper", "pagging");
}

function homeAction()
{
    $pagging = "";
    $str = !empty($_GET["str"]) ? $_GET["str"] : "";
    if (isset($_POST["btn-search"])) {
        $str = $_POST["q"];
    }
    $num_product = 10;
    $list_category = get_List_id_category();
    $theloai = !empty($_GET["id"]) ? $_GET["id"] : 0;
    $page = !empty($_GET["pages"]) ? $_GET["pages"] : 1;


    $list_category = data_tree($list_category, $theloai);
    $list = get_list_products($list_category, $theloai, $str);
    $total = get_num_product($list);
    $pagging = get_pagging($num_product, $total, $page, $theloai, $str);
    $list = get_list_product_pagging($num_product, $page, $list);


    $list_category = get_List_id_category();
    $list_category = data_tree($list_category, 0);
    $top_product = get_list_products($list_category, 0, "");
    $count = get_num_product($top_product);
    for ($i = 0; $i < $count; $i++) {
        for ($j = 0; $j < $count; $j++) {
            if ($top_product[$i]["soluongdaban"] > $top_product[$j]["soluongdaban"]) {
                $tam = $top_product[$i];
                $top_product[$i] = $top_product[$j];
                $top_product[$j] = $tam;
            }
        }
    }

    $data["top_product"] = $top_product;


    // print_r($top_product);
    $data["list"] = $list;
    $data["pagging"] = $pagging;
    load_view("home", $data);
}

function detailproductAction()
{
    $id = $_GET["id"];
    $id_thloai = get_idthloai($id);
    // print_r($id_thloai);
    $id_thloai = $id_thloai["id_theloai"];
    $data["id_thloai"] = $id_thloai;
    $same_category = get_list_same_category($id_thloai);
    $info_product = get_info_product($id);
    $data["info_product"] = $info_product;
    $data["same_category"] = $same_category;
    // echo "<pre>";
    // print_r($info_product);
    // echo "</pre>";
    load_view("detailproduct", $data);
}

function resloveconditonsAction()
{
    if ($_POST["name_conditions"] != "") {
        $num_product = 10;
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $cate = $_POST["cate_conditions"];
        $name = $_POST["name_conditions"];
        if ($num1 == "") {
            $num1 = 0;
        }
        if ($num2 == "") {
            $num2 = get_dongia_max();
            $num2 = $num2["max"];
        }

        $ids = [];
        $list_category = get_List_id_category();
        $categorys = data_tree($list_category, $cate);
        if (!empty($categorys)) {
            foreach ($categorys as $cat) {
                $ids[] = $cat["id_theloai"];
            }
            $ids[] = $cate;
        } else {
            $ids[] = $cate;
        }

        $lp = [];
        foreach ($ids as $id) {
            $lp[] = get_list_product_by_conditions($num1, $num2, $name, $id);
        }
        $list = [];
        $count = 0;
        foreach ($lp as $p) {
            if (!empty($p)) {
                foreach ($p as $p2) {
                    $list[$count] = $p2;
                    $count++;
                }
            }
        }
        $str = "<ul>";

        if (!empty($list)) {
            foreach ($list as $item) {

                $str .= " <a href='?mod=home&action=detailproduct&id=" . $item['id'] . "'><li><div class='img'> <img src='" . url_img() . $item["hinhanh"] . " ' alt='' /></div> <div class='info'> <p class='name-product'> " . $item["tensanpham"] . "</p><p class='price'><strong> " . currency_format($item["dongia"]) . " ?></strong> <p><div class='rate'> <i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star-half-stroke'></i></div></div></li></a>";
            }
        }
        $str .= "</ul>";
        echo $str;
    }
}

function paggingajaxAction()
{
    $num_product = 10;
    $list_category = get_List_id_category();
    $list_category = data_tree($list_category, $_POST["cate"]);
    $list = get_list_products($list_category, $_POST["cate"], $_POST["str"]);
    $total = get_num_product($list);
    $list = get_list_product_pagging($num_product, $_POST["pages"], $list);
    $str = "<ul>";
    foreach ($list as $item) {
        $str .= "   <a href='?mod=home&action=detailproduct&id=" . $item["id"] . "'><li><div class='img'> <img src='    " . url_img() . $item["hinhanh"] . "' alt='' /></div> <div class='info'><p class='name-product'>" . $item["tensanpham"] . "</p><p class='price'><strong>" . currency_format($item["dongia"]) . "</strong><p><div class='rate'><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star-half-stroke'></i> </div> </div></li> </a>";
    }
    $str .= "</ul>";
    echo $str;
}


function searchAction()
{
    $query = $_POST["query"];
    $ids = [];
    $list_category = get_List_id_category();
    $categorys = data_tree($list_category, 0);

    foreach ($categorys as $cat) {
        $ids[] = $cat["id_theloai"];
    }

    $lp = [];
    foreach ($ids as $id) {
        $lp[] = get_list_product_by_name($id,$query);
    }
    $list = [];
    foreach ($lp as $p) {
        if (!empty($p)) {
            foreach ($p as $p2) {
                $list[] = $p2;
            }
        }
    }
   $str="";
    if($query != ""){
        $str = "<ul style='min-height:800px; overflow:scroll'>";
        foreach ($list as $item) {
            $str .= "   <a style='text-decoration:none' href='?mod=home&action=detailproduct&id=" . $item["id"] . "'><li style='padding:10px 0px' ><div class='img'> <img style='width:100%;height:auto' src='    " . url_img() . $item["hinhanh"] . "' alt='' /></div> <div class='info' style='color:black'><p class='name-product'>" . $item["tensanpham"] . "</p><p class='price'><strong>" . currency_format($item["dongia"]) . "</strong><p><div class='rate' style='color:gold'><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star-half-stroke'></i> </div> </div></li> </a>";
        }
        $str .= "</ul>";
    }
    echo $str;

}
