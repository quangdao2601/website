<?php
function get_permission_member($username)
{
    return db_fetch_array("select danhsachquyen.duongdan from nguoidung,danhsachquyen,phanquyenkhachhang where nguoidung.id_user=phanquyenkhachhang.user_id AND phanquyenkhachhang.id_quyen=danhsachquyen.id_quyen AND nguoidung.tendangnhap='{$username}'");
}
