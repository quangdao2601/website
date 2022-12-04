<?php
get_header();
get_sidebar();
?>
<div id="wp-content">
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Danh sách đơn hàng
            </div>
            <div class="card-body">
                <div class="form-action form-inline py-3">

                </div>
                <table class="table table-striped table-checkall">
                    <thead>
                        <tr>
                            <!-- <th>
                                <input type="checkbox" name="checkall">
                            </th> -->
                            <th scope="col">Stt</th>
                            <th scope="col">Mã đơn hàng</th>
                            <th scope="col">Họ tên khách hàng</th>
                            <th scope="col">Liên lạc</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col">Số lượng san pham</th>
                            <th scope="col">Thời gian đặt hàng</th>

                            <th scope="col">Trạng thái</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (!empty($listorder)) {
                            $count = 0;
                            foreach ($listorder as $item) {
                        ?> <tr>
                                    <th scope="row"><?php echo $count;
                                                    $count++ ?></th>
                                    <td><?php echo "ĐH" . $item["id"] ?></td>
                                    <td><?php echo $item["username"] ?></td>
                                    <td><?php echo $item["lienlac"] ?></td>
                                    <td><?php echo currency_format($item["tongtien"]) ?></td>
                                    <td><?php echo $item["soluongdonhang"] ?></td>
                                    <td><?php echo $item["thoigiandathang"] ?></td>
                                    <td><?php echo $item["ten_trangthai"] ?></td>

                                    <td><a href="?mod=order&action=updateorder&id=<?php echo $item["id"] ?>"><i class="fa fa-edit"></i></a></td>

                                </tr>
                            <?php
                            }
                        } else { ?>
                            <tr>
                                <td colspan="9">Không có đơn hàng nào trong hệ thống </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
