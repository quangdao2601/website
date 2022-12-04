<?php
function get_info_by_username($username)
{
    return db_fetch_row("select *from nguoidung where tendangnhap='{$username}'");
}


// lay quyen thanh vien
function get_list_permission($id)
{
    return db_fetch_array("select *from nguoidung,danhsachquyen,phanquyenkhachhang where nguoidung.id_user=phanquyenkhachhang.user_id  AND phanquyenkhachhang.id_quyen=danhsachquyen.id_quyen AND id_user='{$id}'");
}


function update_info($data, $id)
{
    db_update("nguoidung", $data, "id_user='{$id}'");
}

function check_old_pass($old_pass, $username)
{
    return db_num_rows("select *from nguoidung where tendangnhap='{$username}' AND matkhau='{$old_pass}'");
}

function updata_pass($new_pass, $username)
{
    db_update("nguoidung", $new_pass, "tendangnhap='{$username}'");
}
