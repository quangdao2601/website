<?php
function get_info_product_by_id($id)
{
    return db_fetch_row("select *from sanpham where `id`='{$id}'");
}


function get_info_user_by_username($username)
{
    return db_fetch_row("select *from nguoidung where `tendangnhap`='{$username}'");
}


function add_order($data)
{
    db_insert("donhang", $data);
}

function get_id_max()
{
    return db_fetch_row("select max(id) from donhang");
}

function inser_detail_order($id_order, $data)
{
    db_insert("chitietdonhang", $data);
}


function get_product_to_update_number($id)
{
    return db_fetch_row("select *from sanpham where `id`='{$id}'");
}

function update_num_product($data, $id)
{
    db_update("sanpham", $data, "`id`='{$id}'");
}

function get_list_order_history($username)
{
    return db_fetch_array("select *from donhang,trangthaidonhang where donhang.username='{$username}' AND donhang.trangthai=trangthaidonhang.id_trangthai ORDER BY donhang.id DESC");
}

function get_list_product_order($id)
{
    return db_fetch_array("select * , chitietdonhang.soluong as soluongsanpham from chitietdonhang,sanpham where chitietdonhang.id_donhang='{$id}' AND sanpham.id=chitietdonhang.id_sanpham");
}


function update_order($data,$id){
    db_update("donhang",$data,"`id`='{$id}'");
}