<?php

// lấy danh sách quyền 
function get_list_permission()
{
    $sql = "select *from danhsachquyen ORDER BY duongdan ASC";
    $list_permission = db_fetch_array($sql);
    return $list_permission;
}

// thêm thành viên
function add_member($data)
{
    db_insert("nguoidung", $data);
}


// thêm quyền thành viên
function add_permission($id, $id_quyen)
{
    $sql = "INSERT INTO phanquyenkhachhang (`user_id`,`id_quyen`) VALUES ('$id','$id_quyen')";
    db_insert_one_row($sql);
}

// lay ds thanh vien
function get_list_member()
{
    $list_member = db_fetch_array("select *from nguoidung");
    return $list_member;
}
// lay danh sach theo yeu cau
function get_status_member($status)
{
    return db_fetch_array("select *from nguoidung,trangthainguoidung where nguoidung.tinhtrang=trangthainguoidung.id AND nguoidung.tinhtrang='{$status}'");
}

// lay thong tin thanh vien
function get_user_by_id($id)
{
    $sql = "select *from nguoidung WHERE `id_user`={$id}";
    return db_fetch_row($sql);
}
// cap nhat thong tin thanh vien
function update_member($data, $id)
{
    db_update("nguoidung", $data, "`id_user`={$id}");
}

// xoa thanh vien
function delete_member($id, $data)
{
    db_update('nguoidung', $data, "`id_user`={$id}");
    // db_delete("nguoidung", "`id_user`={$id}");
}
// lay ds quyen thanh vien
function get_list_permission_member($id)
{
    return db_fetch_array("SELECT danhsachquyen.tenquyen,danhsachquyen.duongdan,danhsachquyen.id_quyen from nguoidung,danhsachquyen,phanquyenkhachhang WHERE phanquyenkhachhang.user_id=nguoidung.id_user AND phanquyenkhachhang.id_quyen=danhsachquyen.id_quyen AND nguoidung.id_user={$id}");
}

// LAY ID BY USERNAME
function get_id_by_user($username)
{
    return db_fetch_row("select id_user from nguoidung where `tendangnhap`='{$username}'");
}

// xoa quyen thanh vien
function delete_permission_member($id_quyen, $id)
{
    db_delete("phanquyenkhachhang", "`user_id`={$id} AND `id_quyen`={$id_quyen}");
}


// tim kiem nguoi dung
function get_list_search_member($str)
{
    return db_fetch_array("select *from nguoidung,trangthainguoidung where nguoidung.tinhtrang=trangthainguoidung.id AND nguoidung.tendangnhap LIKE '%$str%'");
}

// lay so nguoi dung theo dieu kien
function get_nums_member($where)
{
    return db_num_rows("select * from nguoidung  where $where");
}

// lay nguoi dung theo phan trang
function get_list_member_pagination($where)
{
    return db_fetch_array("select *from nguoidung,trangthainguoidung where $where");
}
