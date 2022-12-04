<?php
get_header();
get_sidebar();
?>
<div id="wp-content">
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col">
                <a href="?mod=index&action=dashboard&type=4" style="text-decoration: none;">
                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header">ĐƠN HÀNG THÀNH CÔNG</div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $success_order ?></h5>
                            <p class="card-text">Đơn hàng giao dịch thành công</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="?mod=index&action=dashboard&type=2"  style="text-decoration: none;">
                    <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                        <div class="card-header">ĐANG XỬ LÝ</div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $resloving ?></h5>
                            <p class="card-text">Số lượng đơn hàng đang xử lý</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="?mod=index&action=turnover"  style="text-decoration: none;">
                    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                        <div class="card-header">DOANH SỐ</div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo currency_format($turnover["doanhthu"]) ?></h5>
                            <p class="card-text">Doanh số hệ thống</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="?mod=index&action=dashboard&type=5"  style="text-decoration: none;">
                    <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                        <div class="card-header">ĐƠN HÀNG HỦY</div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $cancel_order ?></h5>
                            <p class="card-text">Số đơn bị hủy trong hệ thống</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- end analytic  -->
        <div class="card">
            <div class="card-header font-weight-bold">
                ĐƠN HÀNG MỚI
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Stt</th>
                            <th scope="col">Mã Đơn Hàng</th>
                            <th scope="col">Khách hàng</th>
                            <th scope="col">Số điện thoại liên lạc</th>
                            <th scope="col">Giá trị</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thời gian</th>
                            <th scope="col">Trạng thái</th>
                            <!-- <th scope="col">Tác vụ</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($list)) {
                            $count = 0;
                            foreach ($list as $item) {
                        ?>
                                <tr>
                                    <th scope="row"><?php echo $count ?></th>
                                    <td><?php echo "ĐH" . $item["id"] ?></td>
                                    <td>
                                        <?php echo $item["hovaten"] ?>
                                    </td>
                                    <td><?php echo $item["lienlac"] ?></td>
                                    <td><?php echo currency_format($item["tongtien"]) ?></td>
                                    <td><?php echo $item["soluongdonhang"] ?></td>
                                    <td><?php echo $item["thoigiandathang"] ?></td>
                                    <td><span class="badge badge-warning"><?php echo $item["ten_trangthai"] ?></span></td>
                                </tr>
                        <?php
                                $count++;
                            }
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