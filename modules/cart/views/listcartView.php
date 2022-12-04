<?php
get_header();
?>
<div id="wp-content">
    <div id="cart">
        <div class="list-product-cart">
            <form action="" method="POST">
                <?php
                if (!empty($_SESSION["cart"]["list_cart"])) { ?>
                    <table id="listcart_replace">

                        <thead>
                            <tr>
                             
                                <td>Ảnh sản phẩm</td>
                                <td>Tên sản phẩm</td>
                                <td>Giá sản phẩm</td>
                                <td>Xóa khỏi giỏ hàng</td>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $count = 0;
                            foreach ($_SESSION["cart"]["list_cart"] as $item) {
                            ?>
                                <tr>
                                   
                                 
                                    <td><a href="?mod=home&action=detailproduct&id=<?php echo $item["id"] ?>"><img src="<?php echo url_img() . $item["hinhanh"] ?>" alt=""></a></td>
                                    <td><?php echo $item["tensanpham"] ?> <strong>X <?php echo $item["soluong"] ?></strong></td>

                                    <td><?php echo currency_format($item["dongia"]) ?></td>       
                                    <td><a href="" onclick="showconfirm(this);return false" target="?mod=cart&action=deleteproductcart&id=<?php echo $item["id"] ?>" id=<?php echo $item["id"] ?>><i class="fa-solid fa-trash"></i></a></td>
                                </tr>
                            <?php
                            }
                            ?>

                            <?php


                            ?>






                        </tbody>
                    </table>
                    <table id="listcart_max">

                        <thead>
                            <tr>
                                <td>Stt</td>
                                <td>Mã sản phẩm</td>
                                <td>Ảnh sản phẩm</td>
                                <td>Tên sản phẩm</td>
                                <td>Giá sản phẩm</td>
                                <td>Số lượng</td>
                                <td>Thành tiền</td>
                                <td>Xóa khỏi giỏ hàng</td>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $count = 0;
                            foreach ($_SESSION["cart"]["list_cart"] as $item) {
                            ?>
                                <tr>
                                    <td><?php echo $count;
                                        $count++ ?></td>
                                    <td><?php echo $item["masanpham"] ?></td>
                                    <td><a href="?mod=home&action=detailproduct&id=<?php echo $item["id"] ?>"><img src="<?php echo url_img() . $item["hinhanh"] ?>" alt=""></a></td>
                                    <td><?php echo $item["tensanpham"] ?></td>

                                    <td><?php echo currency_format($item["dongia"]) ?></td>
                                    <td><input type="number" name=list_order[<?php echo $item["id"] ?>] class="num_order" data-id=<?php echo $item["id"] ?> value="<?php echo $item["soluong"] ?>" min="1" max="<?php echo $item["soluongconlai"] ?>"></td>
                                    <td><span class=thanhtien<?php echo $item["id"] ?>><?php echo currency_format($item["soluong"] * $item["dongia"]) ?></span></td>
                                    <td><a href="" onclick="showconfirm(this);return false" target="?mod=cart&action=deleteproductcart&id=<?php echo $item["id"] ?>" id=<?php echo $item["id"] ?>><i class="fa-solid fa-trash"></i></a></td>
                                </tr>
                            <?php
                            }
                            ?>

                            <?php


                            ?>






                        </tbody>
                    </table>

                <?php } else {
                ?>
                    <h3>Không có sản phẩm nào trong giỏ hàng</h3>
                <?php
                }
                ?>
                <p id="total_cart">Thành tiền : <strong><?php
                                                        if (isset($_SESSION["cart"]["list_cart"])) {
                                                            echo  currency_format($_SESSION["cart"]["info_cart"]["total"]);
                                                        } else {
                                                            echo currency_format(0);
                                                        }
                                                        ?></strong></p>
                <div class="update-checkout">
                    <input type="submit" name="btn-update-cart" id="" value="Cập nhật giỏ hàng" class="update-cart">
                    <a href="?mod=cart&action=checkout" class="checkout">Thanh toán</a>
                </div>
                <span>Click vào <strong>"Cập nhật giỏ hàng"</strong>để cập nhật số lượng,Click thanh toán để hoàn thành đơn hàng</span><br>
                <a href="?mod=home&action=home">Mua tiếp</a>
                <a href="?mod=cart&action=deletecart">Xóa giỏ hàng</a>
            </form>
        </div>

    </div>
</div>
</div>
<?php
get_footer();
