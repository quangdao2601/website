<?php
get_header();
get_sidebar();
?>
<style>
    .tk a {
        text-decoration: none;
    }

    .tk a:hover {
        cursor: pointer;
    }

    .tk a {
        padding: 10px;
        margin-right: 10px;
        color: black;
        background-color: #ddd;
        font-weight: bold;
    }

    .cat {
        list-style: none;
        display: flex;
        flex-wrap: wrap;
        padding: 0px;
        margin-top: 40px;
    }

    .cat a {
        text-align: center;
        width: 10%;
        text-decoration: none;
        color: black;
    }

    .cat a li img {
        width: 50%;
        height: auto;
    }

    #tbl_product thead tr th {
        width: 20%;
    }
</style>
<div id="wp-content">
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Thống Kê Doanh Thu
            </div>
            <div class="card-body">
                <ul class="tk" style="list-style:none;padding:0px;display:flex">
                    <a href="?mod=index&action=turnover&id=tk_order" <?php if ($id == "tk_order") echo "style='background:red;color:white'" ?>>
                        <li>Thống kê đơn hàng</li>
                    </a>
                    <a href="?mod=index&action=turnover&id=tk_product" <?php if ($id == "tk_product") echo "style='background:red;color:white'" ?>>
                        <li>Thống kê sản phẩm</li>
                    </a>
                    <a href="?mod=index&action=turnover&id=tk_nhanvien" <?php if ($id == "tk_nhanvien") echo "style='background:red;color:white'" ?>>
                        <li>Thống kê nhân viên</li>
                    </a>
                </ul>
                <form action="" method="POST" style="margin-bottom: 20px;">
                    <label for="">Thống kê theo khoảng thời gian</label><br>
                    <label for="">Ngày bắt đầu</label>
                    <input type="date" name="ngaybatdau" style="width: 174px" value="<?php if (isset($start)) echo $start ?>" style="margin-right: 20px;">
                    <label for="">Ngày kết thúc</label>
                    <input type="date" name="ngayketthuc" value="<?php if (isset($end)) echo $end ?>" id="">
                    <?php
                    if ($id == "tk_product") {
                    ?>
                        <select name="id_theloai" id="" style="margin-left:10px;padding:5px">
                            <?php
                            foreach ($category as $item) {
                            ?>
                                <option value="<?php echo $item["id_theloai"] ?>" <?php if (isset($id_theloai) && $id_theloai == $item["id_theloai"]) echo "selected='selected'" ?>><?php echo $item["ten_theloai"] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    <?php
                    }
                    ?>
                    <input style="margin-left:20px;border:none;background:red;color:white;padding:4px" type="submit" name="loadturnover" value="Thống Kê">
                    <?php
                    if ($id == "tk_order") {
                    ?>

                </form>
                <label for="">Số đơn hàng đã hoàn thành : <strong><?php echo $num_order["sodonhang"] ?></strong></label> <br>
                <label for="">Số lượng sản phẩm đã bán : <strong><?php echo $soluongdaban["soluongdaban"] ?></strong></label> <br>
                <label for="">Doanh Thu : <strong><?php echo currency_format($turnover["doanhthu"]) ?></strong></label>
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

                            <th scope="col">Chi tiết đơn hàng </th>
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
                                    <td><a href="?mod=order&action=updateorder&id=<?php echo $item["id"] ?>">Xem đơn hàng</a></td>
                                </tr>
                        <?php
                                $count++;
                            }
                        }

                        ?>
                    </tbody>
                </table>
                <?php
                    } else {
                        if ($id == "tk_product") {
                ?>
                    <ul class="cat">
                        <?php
                            foreach ($category as $cat) {
                        ?>

                            <a href="?mod=index&action=turnover&id=tk_product&cat=<?php echo $cat["id_theloai"] ?>">
                                <li>
                                    <p><?php echo $cat["ten_theloai"] ?></p>
                                    <img src="public/images/<?php echo $cat["anhdanhmuc"] ?>" alt="">
                                </li>
                            </a>
                        <?php
                            }
                        ?>
                    </ul>


                    <?php
                            if (isset($tk_proudct_by_cat)) {
                    ?>
                        <div class="" style="margin-left:40px;margin-top:40px">
                            <p>Số lượng sản phẩm đã bán: <strong><?php echo $tk_proudct_by_cat["soluong"] ?></strong></p>
                            <p>Doanh Thu: <strong><?php echo currency_format($tk_proudct_by_cat["tongtien"]) ?></strong></p>

                            <p>Sản phẩm bán chạy nhất</p>
                            <table id="tbl_product" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Mã sản phẩm</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Ảnh sản phẩm</th>
                                        <th scope="col">Số lượng đã bán</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $top_product["masanpham"] ?></td>
                                        <td><?php echo $top_product["tensanpham"] ?></td>
                                        <td><img style="width:20%;height:auto" src="public/images/<?php echo $top_product["hinhanh"] ?>" alt=""></td>
                                        <td><?php echo $tk_proudct_by_cat["max"] ?></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    <?php
                            }
                    ?>
                <?php
                        } else {
                ?>

                    <table style="margin-top: 20px" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Stt</th>
                                <th scope="col">Tên đăng nhập</th>
                                <th scope="col">Đơn hàng hoàn thành</th>
                                <th scope="col">Số lượng sản phẩm đã bán</th>
                                <th scope="col">Doanh thu</th>
                            </tr>
                        </thead>
                        <?php
                            $count = 0;

                            foreach ($turnover_user_admin as $item) {
                        ?>
                            <tr>
                                <td><?php echo $count ?></td>
                                <td><?php echo $item["nguoihoanthanh"] ?></td>

                                <td><?php echo $item["sodonhang"] ?></td>
                                <td><?php echo $item["soluongsanpham"] ?></td>
                                <td><?php echo currency_format($item["doanhthu"]) ?></td>

                            </tr>
                        <?php
                                $count++;
                            }
                        ?>
                        <tbody>

                        </tbody>
                    </table>
            <?php
                        }
                    }
            ?>

            </div>
        </div>
    </div>
</div>
<?php
get_footer();
