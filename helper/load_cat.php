<?php
function load_cate()
{
    return db_fetch_array("select *from theloai where danhmuccha=0 AND trangthai=0");
}



