<?php


// lấy danh sách quyền 
function get_list_permission()
{
    $sql = "select *from danhsachquyen ORDER BY duongdan ASC";
    $list_permission = db_fetch_array($sql);
    return $list_permission;
}

// thêm quyền
function add_permission($tenquyen, $duongdan)
{
    $data["tenquyen"] = $tenquyen;
    $data["duongdan"] = $duongdan;
    db_insert("danhsachquyen", $data);
}
