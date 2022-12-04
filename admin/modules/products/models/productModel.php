<?php
function get_List_category()
{
    return db_fetch_array("select *from theloai,trangthaidanhmuc where theloai.trangthai=trangthaidanhmuc.id_trangthai AND theloai.trangthai='0' ");
}
function get_List_id_category()
{
    return db_fetch_array("select theloai.danhmuccha,theloai.id_theloai from theloai,trangthaidanhmuc where theloai.trangthai=trangthaidanhmuc.id_trangthai AND theloai.trangthai='0' ");
}



// kiem tra xem sp da co trong db chuwa
function check_code($code)
{
    return db_num_rows("select *from sanpham where masanpham='{$code}'");
}


function add_product($data)
{
    db_insert("sanpham", $data);
}
//


function get_list_product_by_cateory($id, $type, $str)
{
    return db_fetch_array("SELECT *from sanpham,trangthaisanpham,theloai WHERE sanpham.tinhtrang=trangthaisanpham.id_trangthainguoidung AND sanpham.id_theloai=theloai.id_theloai AND sanpham.id_theloai='{$id}' AND sanpham.tinhtrang='{$type}' AND sanpham.tensanpham LIKE '%{$str}%'");
}


function get_list_product($id)
{
    return db_fetch_row("SELECT *from sanpham,trangthaisanpham,theloai WHERE sanpham.tinhtrang=trangthaisanpham.id_trangthainguoidung AND sanpham.id_theloai=theloai.id_theloai AND sanpham.id='{$id}'");
}


function update_product($data, $id)
{
    db_update("sanpham", $data, "id='{$id}'");
}