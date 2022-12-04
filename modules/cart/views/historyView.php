<?php
get_header();
?>

<div id="wp-content">
    <div id="history_replace">
        <h2>Lịch sử đơn hàng </h2>
        <ul>
            <?php

            if (!empty($list_history)) {
                foreach ($list_history as $item) {
                    $count = 0;
            ?>

                    <li>
                        <p class="tiem-order">Thời gian đặt hàng : <strong><?php echo $item["thoigiandathang"] ?></strong></p>
                        <p>Mã đơn hàng: <strong><?php echo "ĐH" . $item["id"] ?></strong></p>
                        <table>
                            <thead>
                                <tr>
                                    <td>Stt</td>
                                    <td>Ảnh sản phẩm</td>
                                    <td>Tên sản phẩm</td>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($list_product as $key => $p1) {
                                    if ($key == $item["id"]) {

                                        foreach ($p1 as $p) { ?>
                                            <tr>
                                                <td><?php echo $count;
                                                    $count++; ?></td>
                                                <td><img src="<?php echo url_img() . $p["hinhanh"] ?>" alt=""></td>
                                                <td><?php echo $p["tensanpham"] ?> x <?php echo $p["soluongsanpham"] ?></td>

                                            </tr>
                                <?php }
                                    }
                                }
                                ?>

                            </tbody>
                        </table>
                        <div class="subtotal">
                            <h3>Tổng tiền:</h3>
                            <span><strong><?php echo currency_format($item["tongtien"]) ?></strong></span>
                        </div>
                        <div class="status">
                            <h3>Trạng thái :</h3>
                            <p><strong><?php echo $item["ten_trangthai"] ?></strong></p>
                        </div>
                        <div class="method">
                            <!-- <h3>Hủy đơn hàng</h3> -->

                            <a <?php if ($item["id_trangthai"] != 0 &&  $item["id_trangthai"] != 1) echo "style='display:none'" ?> target="?mod=cart&action=cancel&id=<?php echo $item["id"] ?>" id="<?php echo $item["id"] ?>" onclick="showconfirm(this);return false" type="submit" name="cancel">Hủy đơn hàng </a>
                            <!-- </form> -->
                        </div>
                    </li>
            <?php
                }
            }
            ?>



        </ul>
    </div>
    <div id="history-cart">
        <h2>Lịch sử đơn hàng</h2>
        <ul>
            <?php

            if (!empty($list_history)) {
                foreach ($list_history as $item) {
                    $count = 0;
            ?>

                    <li>
                        <p class="tiem-order">Thời gian đặt hàng : <strong><?php echo $item["thoigiandathang"] ?></strong></p>
                        <p>Mã đơn hàng: <strong><?php echo "ĐH" . $item["id"] ?></strong></p>
                        <table>
                            <thead>
                                <tr>
                                    <td>Stt</td>
                                    <td>Ảnh sản phẩm</td>
                                    <td>Tên sản phẩm</td>
                                    <td>Số lượng</td>
                                    <td>Đơn giá</td>
                                    <td>Thành tiền</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($list_product as $key => $p1) {
                                    if ($key == $item["id"]) {

                                        foreach ($p1 as $p) { ?>
                                            <tr>
                                                <td><?php echo $count;
                                                    $count++; ?></td>
                                                <td><img src="<?php echo url_img() . $p["hinhanh"] ?>" alt=""></td>
                                                <td><?php echo $p["tensanpham"] ?></td>
                                                <td><?php echo $p["soluongsanpham"] ?></td>
                                                <td><?php echo currency_format($p["dongia"]) ?></td>
                                                <td><?php echo currency_format($p["soluongsanpham"] * $p["dongia"]) ?></td>
                                            </tr>
                                <?php }
                                    }
                                }
                                ?>

                            </tbody>
                        </table>
                        <div class="subtotal">
                            <h3>Tổng tiền:</h3>
                            <span><strong><?php echo currency_format($item["tongtien"]) ?></strong></span>
                        </div>
                        <div class="status">
                            <h3>Trạng thái :</h3>
                            <p><strong><?php echo $item["ten_trangthai"] ?></strong></p>
                        </div>
                        <div class="method">
                            <!-- <h3>Hủy đơn hàng</h3> -->

                            <a <?php if ($item["id_trangthai"] != 0 &&  $item["id_trangthai"] != 1) echo "style='display:none'" ?> target="?mod=cart&action=cancel&id=<?php echo $item["id"] ?>" id="<?php echo $item["id"] ?>" onclick="showconfirm(this);return false" type="submit" name="cancel">Hủy đơn hàng </a>
                            <!-- </form> -->
                        </div>
                    </li>
            <?php
                }
            }
            ?>



        </ul>
    </div>
</div>
<?php
get_footer();
