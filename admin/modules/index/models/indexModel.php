<?php

function load_num_order_for_type($where)
{
    return db_num_rows("select *from donhang where {$where}");
}

function get_list_order_for_type($where)
{
    return db_fetch_array("select *from donhang,trangthaidonhang where donhang.trangthai=trangthaidonhang.id_trangthai AND {$where}");
}


function get_turnover()
{
    return db_fetch_row("select sum(tongtien) as doanhthu from donhang where trangthai=4");
}


function get_num_order()
{
    return db_fetch_row("select count(id) as sodonhang from donhang where trangthai=4");
}


function get_num_product_order()
{
    return db_fetch_row("select sum(soluongdonhang) as soluongdaban from donhang  where trangthai=4");
}


function get_list_order_for_date($start, $end)
{
    return db_fetch_array("select *from donhang,trangthaidonhang where donhang.trangthai=4 AND donhang.thoigiandathang >= '$start' AND donhang.thoigiandathang <= '$end' AND donhang.trangthai=trangthaidonhang.id_trangthai");
}

function get_turnover_for_date($start, $end)
{
    return db_fetch_row("select sum(tongtien) as doanhthu  from donhang where trangthai=4 AND thoigiandathang >= '$start' AND thoigiandathang <= '$end' ");
}


function get_num_order_for_date($start, $end)
{
    return db_fetch_row("select count(id) as sodonhang from donhang where trangthai=4 AND thoigiandathang >= '$start' AND thoigiandathang <= '$end' ");
}

function get_num_product_order_for_date($start, $end)
{
    return db_fetch_row("select sum(soluongdonhang) as soluongdaban from donhang where trangthai=4 AND thoigiandathang >= '$start' AND thoigiandathang <= '$end'");
}

function list_category()
{
    return db_fetch_array("select * from theloai where  theloai.trangthai='0' AND danhmuccha='0' ");
}

function get_list_category()
{
    return db_fetch_array("select * from theloai where  theloai.trangthai='0' ");
}

function get_list_product_from_order($id)
{
    return db_fetch_array("select chitietdonhang.id_sanpham,chitietdonhang.soluong,chitietdonhang.dongia from chitietdonhang,sanpham,donhang  where donhang.id=chitietdonhang.id_donhang  AND donhang.trangthai='4' AND  chitietdonhang.id_sanpham=sanpham.id AND  sanpham.id_theloai='{$id}' ");
}

function get_top_product($id)
{
    return db_fetch_row("select *from sanpham where `id`='{$id}'");
}



function get_list_product_from_order_for_time($id, $start, $end)
{
    return db_fetch_array("select chitietdonhang.id_sanpham,chitietdonhang.soluong,chitietdonhang.dongia from chitietdonhang,sanpham,donhang  where donhang.thoigiandathang<= '$end' AND donhang.thoigiandathang >= '$start' AND donhang.id=chitietdonhang.id_donhang  AND donhang.trangthai='4' AND  chitietdonhang.id_sanpham=sanpham.id AND  sanpham.id_theloai='{$id}' ");
}


function get_turnover_user()
{
    return db_fetch_array("SELECT nguoihoanthanh,hovaten,COUNT(id) as sodonhang,SUM(tongtien) as doanhthu ,SUM(soluongdonhang) as soluongsanpham from donhang GROUP BY nguoihoanthanh");
}

function get_turnover_user_by_time($start,$end){
    return db_fetch_array("SELECT nguoihoanthanh,hovaten,COUNT(id) as sodonhang,SUM(tongtien) as doanhthu ,SUM(soluongdonhang) as soluongsanpham from donhang where `thoigiandathang`>='$start' AND `thoigiandathang`<='$end'  GROUP BY nguoihoanthanh");

}
