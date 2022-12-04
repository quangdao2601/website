<?php
// kiem tra thong tin login
function check_user_login($username, $password)
{
    return db_num_rows("select *from nguoidung where nguoidung.tendangnhap='{$username}' AND nguoidung.matkhau='{$password}' AND nguoidung.tinhtrang='0' AND nguoidung.active='0' ");
}

// lay thong tin bang username
function get_info_by_username($username)
{
    return db_fetch_row("select *from nguoidung where tendangnhap='{$username}'");
}


function update_information_by_username($data, $username)
{
    db_update("nguoidung", $data, "`tendangnhap`='{$username}'");
}


function check_old_pass_login($pass, $username)
{
    return db_num_rows("select *from nguoidung where `matkhau`='{$pass}' AND `tendangnhap`='{$username}'");
}

function updata_new_pass($data, $username)
{
    db_update("nguoidung", $data, "`tendangnhap`='{$username}'");
}


function check_username($username)
{
    return db_num_rows("select *from nguoidung where `tendangnhap`='{$username}' AND `active`='0'");
}

function check_mail($e)
{
    return db_num_rows("select *from nguoidung where `email`='{$e}'");
}
function add_user_reg($data)
{
    db_insert("nguoidung", $data);
}


function check_code_confirm($code)
{
    return db_num_rows("select *from nguoidung where `code_reg`='{$code}'");
}

function update_active($data, $code)
{
    db_update("nguoidung", $data, "`code_reg`='{$code}'");
}

function check_email_to_resset_pass($email)
{
    return db_num_rows("select *from nguoidung where `email`='{$email}' AND `active`='0'");
}

function update_code_forget($data, $email)
{
    db_update("nguoidung", $data, "`email`='{$email}'");
}


function create_new_pass($data,$id){
    db_update("nguoidung",$data,"`code_reg`='{$id}'");
}