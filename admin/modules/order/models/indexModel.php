<?php
function get_list_order()
{
    return db_fetch_array("select *from donhang,trangthaidonhang where donhang.trangthai=trangthaidonhang.id_trangthai");
}



function get_list_detail($id)
{
    return db_fetch_array("select *from sanpham,chitietdonhang,donhang  where sanpham.id=chitietdonhang.id_sanpham AND chitietdonhang.id_donhang=donhang.id  AND chitietdonhang.id_donhang='{$id}'");
}

function update_order($data,$id){
    db_update("donhang",$data,"`id`='{$id}'");
}