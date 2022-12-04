<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
/*
 * --------------------------------------------------------------------
 * app path
 * --------------------------------------------------------------------
 */

$app_path = dirname(__FILE__);
define('APPPATH', $app_path);
/*
 * --------------------------------------------------------------------
 * core path
 * --------------------------------------------------------------------
 */
$core_folder = 'core';
define('COREPATH', APPPATH . DIRECTORY_SEPARATOR . $core_folder);
if (!isset($_SESSION["role_user"]) || $_SESSION['role_user'] != 0) {
    header("location:http://localhost:8080/unitop.vn/project/");
}
/*
 * --------------------------------------------------------------------
 * modules path
 * --------------------------------------------------------------------
 */
$modules_folder = 'modules';
define('MODULESPATH', APPPATH . DIRECTORY_SEPARATOR . $modules_folder);


/*
 * --------------------------------------------------------------------
 * helper path
 * --------------------------------------------------------------------
 */

$helper_folder = 'helper';
define('HELPERPATH', APPPATH . DIRECTORY_SEPARATOR . $helper_folder);


/*
 * --------------------------------------------------------------------
 * library path
 * --------------------------------------------------------------------
 */
$lib_folder = 'libraries';
define('LIBPATH', APPPATH . DIRECTORY_SEPARATOR . $lib_folder);


/*
 * --------------------------------------------------------------------
 * layout path
 * --------------------------------------------------------------------
 */
$layout_folder = 'layout';
define('LAYOUTPATH', APPPATH . DIRECTORY_SEPARATOR . $layout_folder);

/*
 * --------------------------------------------------------------------
 * config path
 * --------------------------------------------------------------------
 */
$config_folder = 'config';
define('CONFIGPATH', APPPATH . DIRECTORY_SEPARATOR . $config_folder);

require COREPATH . DIRECTORY_SEPARATOR . 'appload.php';
// if (isset($_POST["confirm"])) {
//     $_SESSION["confirm"] = $_POST["confirm"];
// }
// echo $_SESSION["confirm"];
?>
<style>
    #form-confirm {
        position: fixed;
        top: 0px;
        bottom: 0px;
        right: 0px;
        left: 0px;
        background: rgba(0, 0, 0, 0.53);
        display: none;
    }

    #form-confirm .confirm {
        width: 30%;

        margin: 0px auto;
        margin-top: 3%;
        background-color: white;
        padding: 15px;
    }

    #form-confirm .confirm .form {
        margin-top: 20px;
        display: flex;
    }

    #form-confirm .confirm .form input:first-child {
        margin-right: 370px;
    }

    #form-confirm .confirm .form input {
        padding: 10px;
        color: white;
        border: none;
        background-color: #007bff;

    }

    #form-confirm .confirm .form  input:hover {
        background-color: red;
    }

    .show {
        display: block !important;
    }
</style>
<div id="form-confirm">
    <div class="confirm">
        <h3>Bạn xác nhận muốn thực hiện thao tác này ?</h3>

        <div class="form">
            <a href="" id="user_id"> <input type="submit" name="confirm" value="Xác nhận"></a>
            <a href=""> <input type="submit" name="confirm" value="Hủy thao tác"></a>
        </div>

    </div>
</div>