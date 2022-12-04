<?php
get_header();
get_sidebar();
?>
<style>
    table tbody tr td {
        text-align: center;
    }

    table thead tr th {
        width: 12%;
        text-align: center;
    }

    table thead tr th:first-child {
        width: 5%;
    }

    table tbody tr td img {
        width: 70%;
        height: auto;
    }
</style>
<div id="wp-content">
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Cập nhật đơn hàng đơn hàng
            </div>
            <div class="card-body">
                <table class="table table-striped table-checkall">
                    <thead>
                        <tr>
                            <!-- <th scope="col">
                                <input name="checkall" type="checkbox">
                            </th> -->
                            <th scope="col">STT</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Mã sản phẩm</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($detail_order)) {
                            $count = 0;
                            foreach ($detail_order as $item) {

                        ?>
                                <tr class="">
                                    <td><?php echo $count;
                                        $count++; ?></td>
                                    <td><img src="public/images/<?php echo $item["hinhanh"] ?>" alt=""></td>
                                    <td><?php echo $item["masanpham"] ?></td>
                                    <td><a href="#"><?php echo $item["tensanpham"] ?></a></td>
                                    <td><?php echo currency_format($item["dongia"]) ?></td>
                                    <td><?php echo $item["soluong"] ?></td>
                                    <td><?php echo currency_format($item['dongia'] * $item["soluong"]) ?></td>
                                </tr>
                                <?php $address = $item["diachigiaohang"];
                                if (isset($item["ghichu"])) {
                                    $ghichu = $item["ghichu"];
                                } else {
                                    $ghichu = "";
                                }
                                $status = $item["trangthai"]; ?>
                        <?php
                            }
                        }
                        ?>




                    </tbody>
                </table>
                <form action="" method="POST">
                    <label class="form-control" for="">Địa chỉ giao hàng</label>
                    <textarea name="address" id="" cols="20" class="form-control" rows="4"><?php echo $address ?></textarea>
                    <?php if (isset($error["address"])) echo "<p style='color:red'>" . $error["address"] . "</p>" ?>
                    <label class="form-control" for="">Ghi chú</label>
                    <textarea name="notes" id="" cols="20" class="form-control" rows="4"><?php echo $ghichu ?></textarea>
                    <select name="trangthai" class="form-control" style="margin: 10px 0px;" id="">
  <?php
                        if ($status == 4) {
                        ?>
                            <option value="4" <?php if ($status == 4) echo "selected='selected'" ?>>Đã hoàn thành</option>
                        <?php
                        } else {
                        ?>
                            <option value="0" <?php if ($status == 0) echo "selected='selected'" ?>>Đã đặt hàng</option>
                            <option value="1" <?php if ($status == 1) echo "selected='selected'" ?>>Xác nhận đơn hàng</option>

                            <option value="2" <?php if ($status == 2) echo "selected='selected'" ?>>Đã lấy hàng</option>

                            <option value="3" <?php if ($status == 3) echo "selected='selected'" ?>>Đang giao</option>

                            <option value="4" <?php if ($status == 4) echo "selected='selected'" ?>>Đã hoàn thành</option>
                            <option value="5" <?php if ($status == 5) echo "selected='selected'" ?>>Hủy</option>
                        <?php
                        }
                        ?>

                    </select>
                    <?php
                    if($status!=4){
                        ?>
                                            <input type="submit" name="btn-update-order" value="Cập nhật trạng thái đơn hàng" class="btn btn-primary">
                        <?php
                    }
                    ?>
                </form>

            </div>
        </div>
    </div>
</div>
<?php
get_footer();
