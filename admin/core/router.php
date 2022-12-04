<?php
//Triệu gọi đến file xử lý thông qua request

$request_path = MODULESPATH . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . get_controller() . 'Controller.php';

if (file_exists($request_path)) {
    require $request_path;
} else {
    echo "Không tìm thấy:$request_path ";
}
load("helper", "get_permission_member");

$action_name = get_action();
$list = get_permission_member($_SESSION["user_login"]);
$list2 = array(
    array("duongdan" => "dashboard"),
    array("duongdan" => "logout"),
    array("duongdan" => "logout"),
    array("duongdan" => "info"),
    array("duongdan" => "resetpass")
);
$list3 = array_merge($list, $list2);
foreach ($list3 as $item) {
    $check = 0;
    if ($item["duongdan"] == $action_name) {
        $check = 1;
        break;
    }
}
if ($_SESSION["user_login"] != 'root') {
    if ($check == 1) {
        $action_name = $action_name . 'Action';
        call_function(array('construct', $action_name));
    } else {
        header("location:?mod=index");
    }
} else {
    $action_name = $action_name . 'Action';
    call_function(array('construct', $action_name));
}
