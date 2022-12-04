<?php
get_header();
?>
<div id="wp-content">
    <form action="" method="post">
        <div id="checkout">

            <div class="info-customer">
                <h2>Thông tin khách hàng</h2>

                <label for="">Họ và tên</label>
                <input type="text" name="fullname" value="<?php echo $info_user["hovaten"] ?>" placeholder="Họ và tên" id="">
                <?php if (isset($error["hovaten"])) echo  "<p style='color:red;margin-bottom:10px'>" . $error["hovaten"] . "</p" ?>

                <label for="">Email</label>
                <input type="text" name="email" readonly="readonly" value="<?php echo $info_user["email"] ?>" placeholder="Email" id="">


                <label for="">Số điện thoại liên lạc</label>
                <input type="text" name="phone" value="" placeholder="Số điện thoại" id="">
                <?php if (isset($error["phone"])) echo "<p style='color:red;margin-bottom:10px'>" . $error["phone"] . "</p" ?>

                <label for="">Địa chỉ giao hàng</label>
                <textarea name="address" placeholder="Địa chỉ giao hàng" id="" cols="30" rows="10"><?php echo $info_user["diachi"] ?></textarea>
                <?php if (isset($error["address"])) echo "<p style='color:red;margin-bottom:10px'>" . $error["address"] . "</p" ?>

                <label for="">Ghi chú</label>
                <textarea name="notes" placeholder="Ghi chú" id="" cols="30" rows="10"></textarea>

            </div>
            <div class="info-cart">
                <?php
                if (!empty($_SESSION["cart"]["list_cart"])) {
                ?>
                    <h2>Thông tin đơn hàng</h2>
                    <table>
                        <thead>
                            <tr>
                                <td>Sản phẩm</td>
                                <td>Tổng</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($_SESSION["cart"]["list_cart"]  as $item) {
                            ?>
                                <tr>
                                    <td><?php echo $item["tensanpham"] ?> <strong>x <span><?php echo $item["soluong"] ?> </span></strong></td>
                                    <td><strong><?php echo currency_format($item["soluong"] * $item["dongia"]) ?></strong> </td>
                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Tổng đơn hàng:</td>
                                <td><strong><?php echo currency_format($_SESSION["cart"]["info_cart"]["total"]) ?></strong></td>
                            </tr>
                        </tfoot>

                    </table>
                    <p>Hình thức thanh toán</p>
                    <select name="method" id="" style="padding: 10px;">
                        <option  value="">--Hình thức thanh toán--</option>
                        <option value="0">Thanh Toán Khi nhận hàng</option>
                        <option value="1">Thanh toán qua thẻ</option>
                    </select>
                    <?php if(isset($error["method"])) echo "<p style='color:red;margin-bottom:10px;margin-top:10px'>".$error["method"]."</p>" ?>


                    <input type="submit" name="btn-checkout" id="" value="Đặt hàng">

                <?php
                } else {
                ?>
                    <h3>Không có sản phẩm nào trong giỏ hàng</h3>
                <?php

                }
                ?>
            </div>

        </div>
    </form>
</div>
<?php
get_footer();
