<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="public/fontawesome/fontawesome/css/all.css" />
    <link rel="stylesheet" href="public/css/header.css" />
    <link rel="stylesheet" href="public/css/wp-content.css" />
    <link rel="stylesheet" href="public/css/footer.css" />
    <link rel="stylesheet" href="public/css/login-reg.css" />
    <link rel="stylesheet" href="public/css/detailproduct.css">
    <link rel="stylesheet" href="public/css/cart.css">
    <link rel="stylesheet" href="public/css/checkout.css">
    <link rel="stylesheet" href="public/css/history_cart.css">
    <link rel="stylesheet" href="public/css/yourinfo.css">
    <link rel="stylesheet" href="public/css/pagging.css">
    <link rel="stylesheet" href="public/css/product_conditions.css">

    <link rel="stylesheet" href="public/css/responsive.css">


    <link rel="stylesheet" href="public/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="public/owlcarousel/assets/owl.theme.default.min.css">

    <!-- <link rel="stylesheet" href="public/js/main.js"> -->
    <script src="public/js/jquery-3.5.1.js"></script>
    <script src="public/js/main.js"></script>
    <script src="public/js/ajax.js"></script>


    <!-- <script src="jquery.min.js"></script> -->
    <script src="public/owlcarousel/owl.carousel.min.js"></script>
    <title>Document</title>
</head>


<style>
    #alert {
        position: fixed;
        top: 0px;
        left: 0px;
        right: 0px;
        bottom: 0px;
        display: none;
        background: rgba(0, 0, 0, 0.53);
    }

    #alert .alert {
        width: 30%;
        padding: 20px;
        background-color: white;
        margin: 0px auto;
        margin-top: 10%;
        z-index: 1000;
    }

    .show {
        display: block !important;
    }

    #alert .alert a {
        display: inline-block;
        text-decoration: none;
        padding: 10px;
        width: 20%;
        margin-top: 20px;
        background-color: blue;
        color: white;

        border: none;
    }

    #alert .alert #ok {
        margin-right: 50%;
    }

    #alert .alert a:hover {
        background-color: red;
        cursor: pointer;
    }
</style>



<body>

    <div id="alert">
        <div class="alert">
            <p>Xác nhận thao tác</p>
            <a href="" id="ok">Xác nhận</a>
            <a href="" id="cancel">Hủy thao tác</a>
        </div>
    </div>
    <div id="wrapper">
        <div id="header">
            <div class="head-top">
                <div class="information">
                    <div class="address">
                        <p>
                            <i class="fas fa-map-marker-alt"></i> 143-An Dương Vương Quận 5 Tp HCM
                        </p>
                    </div>
                    <div class="phone">
                        <p><i class="fas fa-phone-alt"></i> 0961256443</p>
                    </div>
                </div>
            </div>
            <div class="head-content">
                <div class="content">
                    <div class="icon" id="load_menu">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                    <div class="logo">
                        <a href="?mod=home&action=home">Vsmart</a>
                    </div>
                    <!-- <form action="" forget></form> -->
                    <div class="search">
                        <form action="" method="POST">
                            <input type="text" name="q" id="search" value="" placeholder="Tìm kiếm ......" />
                            <input type="submit" name="btn-search" value="Tìm kiếm">
                            <div id="list_search"></div>
                        </form>
                    </div>
                    <?php
                    if (!isset($_SESSION["user_login"])) {
                    ?>
                        <div class="gointo">
                            <div class="user">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="form">
                                <span>Đăng nhập /</span><span> Đăng ký</span>
                                <br />
                                <input type="submit" value="Tài khoản"> <i class="fa-solid fa-caret-down"></i>
                                <div class="choose-form">
                                    <a href="?mod=login&action=login">Đăng nhập</a>
                                    <a href="?mod=login&action=reg">Đăng ký</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    } else {
                        if ($_SESSION["role_user"] == 1) {
                            echo "<div class='user_login'>" . "<p>" . $_SESSION['fullname'] . "</p>                <div class='logout'> <a href='?mod=cart&action=history'>Lịch sử đơn hàng</a> <a href='?mod=login&action=yourinfo'>Xem Thông tin cá nhân</a><a href='?mod=login&action=logout'>Đăng xuất</a></div></div>";
                        } else {
                            echo "<div class='user_login'>" . "<p>" . $_SESSION['fullname'] . "</p> </a>           <div class='logout'> <a href='?mod=cart&action=history'>Lịch sử đơn hàng</a> <a href='?mod=login&action=yourinfo'>Xem Thông tin cá nhân</a><a href='?mod=login&action=logout'>Đăng xuất</a><a href='http://localhost/Cuahangdienthoai/website/admin/'>Admin</a> </div></div>";
                        }
                    }
                    ?>
                    <div class="cart">
                        <span><?php if (!empty($_SESSION["cart"]["list_cart"]))  echo $_SESSION["cart"]["info_cart"]["num_order"] ?></span>
                        <div class="icon-cart">
                            <i class="fa-solid fa-cart-arrow-down"></i>
                        </div>
                        <div class="list-cart">
                            <?php

                            if (!empty($_SESSION["cart"]["list_cart"])) {
                            ?>
                                <p>Có <strong class="num-order"><?php echo $_SESSION["cart"]["info_cart"]["num_order"] ?> </strong>trong giỏ hàng </p>
                                <ul>
                                    <?php
                                    foreach ($_SESSION["cart"]["list_cart"] as $product) {
                                    ?>
                                        <li>
                                            <div class="item">
                                                <div class="img-product">
                                                    <a href="?mod=home&action=detailproduct&id=<?php echo $product["id"] ?>"><img src="<?php echo url_img() . $product["hinhanh"] ?>" alt=""></a>
                                                </div>
                                                <div class="info">
                                                    <p class="name"><?php echo $product["tensanpham"] ?></p>
                                                    <p class="price"><?php echo currency_format($product["dongia"]) ?></p>
                                                    <p class="num-order">Số lượng:<?php echo $product["soluong"] ?></p>
                                                </div>
                                            </div>
                                        </li>
                                    <?php
                                    }
                                    ?>


                                </ul>
                                <p class="total">Tổng tiền:<strong class="sub-total"><?php echo currency_format($_SESSION["cart"]["info_cart"]["total"]) ?></strong></p>
                            <?php
                            } else {
                            ?>
                                <p>Không có sản phẩm nào trong giỏ hàng</p>
                            <?php

                            }
                            ?>
                            <a href="?mod=cart&action=listcart" class="cart">Giỏ hàng</a>
                            <a href="?mod=cart&action=checkout" class="checkout">Thanh toán</a>
                        </div>
                    </div>


                </div>


            </div>
            <!-- <div class="head-footer">
                <div class="main-menu">
                    <ul class="menu">
                        <a href="?mod=home&action=home">
                            <li>Trang chủ</li>
                        </a>
                        <a href="?mod=store&controler=index&action=introduce">
                            <li>Giới Thiệu</li>
                        </a>
                        <a href="">
                            <li>Sản phẩm</li>
                        </a>
                        <a href="">
                            <li>Blogs</li>
                        </a>
                        <a href="">
                            <li>Liên hệ</li>
                        </a>
                    </ul>
                </div>
            </div> -->
            <div id="menu_replace">

                <div class="menu">
                    <div class="hide" id="hide">
                        <i class="fa-solid fa-rectangle-xmark"></i>
                    </div>
                    <ul>

                        <a href="">
                            <li>Trang Chủ</li>
                        </a>
                        <a href="?mod=cart&action=listcart">
                            <li>Giỏ hàng</li>
                        </a>
                        <?php
                        if (isset($_SESSION["user_login"])) {
                        ?>
                            <a href="?mod=cart&action=history">
                                <li>Lịch sử đơn hàng</li>
                            </a>
                        <?php } else {
                        ?> <a href="?mod=login&action=login">
                                <li>Lịch sử đơn hàng</li>
                            </a>
                        <?php
                        }

                        ?>
                        <?php
                        if (isset($_SESSION["user_login"])) {
                        ?>
                            <a href="?mod=login&action=yourinfo">
                                <li>Thông tin cá nhân</li>
                            </a>
                        <?php
                        } else { ?>
                            <a href="?mod=login&action=login">
                                <li>Thông tin cá nhân</li>
                            </a>
                        <?php

                        }
                        ?>

                        <?php if (!isset($_SESSION["user_login"])) {
                        ?>
                            <a href="?mod=login&action=login">
                                <li>Đăng nhập</li>
                            </a>
                            <a href="?mod=login&action=reg">
                                <li>Đăng ký</li>
                            </a>
                        <?php

                        } else {
                        ?> <a href="?mod=login&action=logout">
                                <li>Đăng xuất</li>
                            </a>
                        <?php
                        } ?>

                    </ul>
                </div>
            </div>

        </div>