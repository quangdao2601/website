<?php
function get_List_id_category()
{
    return db_fetch_array("select theloai.danhmuccha,theloai.id_theloai ,theloai.ten_theloai from theloai,trangthaidanhmuc where theloai.trangthai=trangthaidanhmuc.id_trangthai AND theloai.trangthai='0' ");
}
