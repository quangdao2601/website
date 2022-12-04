<?php
function get_list_catrgory()
{
    return db_fetch_array("select *from theloai,trangthaidanhmuc where theloai.trangthai=trangthaidanhmuc.id_trangthai");
}

function insert_category($data)
{
    db_insert("theloai", $data);
}

function get_category($id)
{
    return   db_fetch_row("select *from theloai,trangthaidanhmuc where theloai.trangthai=trangthaidanhmuc.id_trangthai AND theloai.id_theloai='{$id}' ");
}
function updatecategory($data, $id)
{
    db_update("theloai", $data, "`id_theloai`='{$id}'");
}
