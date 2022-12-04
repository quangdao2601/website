<?php




function get_List_id_category()
{
    return db_fetch_array("select theloai.danhmuccha,theloai.id_theloai ,theloai.ten_theloai from theloai,trangthaidanhmuc where theloai.trangthai=trangthaidanhmuc.id_trangthai AND theloai.trangthai='0' ");
}

function get_list_product_by_cateory($id, $type, $str)
{
    return db_fetch_array("SELECT *from sanpham,trangthaisanpham,theloai WHERE sanpham.tinhtrang=trangthaisanpham.id_trangthainguoidung AND sanpham.id_theloai=theloai.id_theloai AND sanpham.id_theloai='{$id}' AND sanpham.tinhtrang='{$type}' AND sanpham.soluong > 0 AND  sanpham.tensanpham LIKE '%{$str}%'");
}

function get_info_product($id)
{
    return db_fetch_row("select *from sanpham where id='{$id}'");
}


function get_dongia_max()
{
    return db_fetch_row("select max(dongia) as max from sanpham");
}



function get_list_product_by_conditions($min, $max, $name, $id)
{
    return db_fetch_array("select *from sanpham,theloai where sanpham.id_theloai=theloai.id_theloai AND sanpham.tinhtrang='0' AND sanpham.dongia >= '{$min}' AND sanpham.dongia <= '{$max}' AND sanpham.id_theloai='{$id}' AND sanpham.tensanpham LIKE '%{$name}%'");
}


function get_idthloai($id)
{
    return db_fetch_row("select id_theloai from sanpham where id='{$id}'");
}


function get_list_same_category($id)
{
    return db_fetch_array("select *from sanpham where id_theloai='{$id}' AND  tinhtrang='0'");
}


function get_list_product_by_name($id,$name){
    return db_fetch_array("select *from sanpham,theloai where sanpham.id_theloai=theloai.id_theloai AND sanpham.tinhtrang='0'  AND sanpham.id_theloai='{$id}' AND sanpham.tensanpham LIKE '%{$name}%'");

}