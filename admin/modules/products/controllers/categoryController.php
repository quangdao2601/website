<?php
function construct()
{
    load_model("index");
    load("helper", "data_tree");
}
function addcategoryAction()
{
    if (isset($_POST["btn-add-category"])) {
        $error = [];
        if (empty($_POST["name_category"])) {
            $error["name_category"] = "Không được bỏ trống tên danh mục";
        }
        if ($_FILES["image"]["name"] == "") {
            $error["image"] = "Không được bỏ trống ảnh danh mục";
        }
        if (empty($error)) {
            $info_category = array(
                "ten_theloai" => $_POST["name_category"],
                "danhmuccha" => $_POST["cat_parent"],
                "trangthai" => $_POST["status"],
                "anhdanhmuc" => $_FILES["image"]["name"]
            );
            insert_category($info_category);
            $dir = "public/images/" . $_FILES["image"]["name"];
            move_uploaded_file($_FILES["image"]["tmp_name"], $dir);
            header("location:?mod=products&controller=category&action=addcategory");
        }
        $data["error"] = $error;
    }
    $list = get_list_catrgory();
    $list = data_tree($list, 0);
    $data["list"] = $list;
    load_view("addcategory", $data);
}
function listcategoryAction()
{

    $list = get_list_catrgory();
    $list = data_tree($list, 0);
    // print_r($list);
    $data["list"] = $list;
    load_view("listcategory", $data);
}

function updatecategoryAction()
{

    $list = get_list_catrgory();
    $list = data_tree($list, 0);
    $data["list"] = $list;
    $id = $_GET["id"];
    $info_category = get_category($id);
    $data["info_category"] = $info_category;
    if (isset($_POST["btn-update-category"])) {
        $error = [];
        if ($_POST["name_category"] == "") {
            $error["name_category"] = "Không được bỏ trống tên danh mục";
        }
        $data["error"] = $error;
        if (empty($error)) {
            $info_update = array(
                "ten_theloai" => $_POST["name_category"],
                "danhmuccha" => $_POST["cat_parent"],
                "trangthai" => $_POST["status"]
            );
            updatecategory($info_update, $id);
            header("location:?mod=products&controller=category&action=listcategory");
        }
    }
    load_view("updatecategory", $data);
}
