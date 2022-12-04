<?php
get_header();
get_sidebar();
?>
<style>
    .card .card-body table thead tr th {
        width: 6%;
    }

    .card .card-body table thead tr th:nth-child(1) {
        width: 3%;
    }

    .card .card-body table thead tr th:nth-child(4) {
        width: 18%;
    }

    .card .card-body table tbody tr td img {
        width: 100%;
        height: auto;
    }

    #content .card .card-body .list_choose a {
        display: inline-block;
        margin-right: 10px;
        padding: 10px;
        color: black;
        background-color: #ddd;
        margin-bottom: 20px;
        font-weight: bold;
        text-decoration: none;
    }

    .card .card-body .pagging {
        margin: 0px auto;
        justify-content: center;
    }
</style>
<div id="wp-content">
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách sản phẩm</h5>
                <div class="form-search form-inline">
                    <form action="" style="display: flex;" method="POST">
                        <input type="text" name="q" class="form-control form-search" placeholder="Tìm kiếm">
                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="list_choose">
                    <a href="?mod=products&controller=product&action=listproduct&type=0" <?php if ($type == 0) echo "style='background:red;color:white'" ?>>Sản phẩm đang bán</a>
                    <a href="?mod=products&controller=product&action=listproduct&type=1" <?php if ($type == 1) echo "style='background:red;color:white'" ?>>Đang đợi duyệt</a>
                    <a href="?mod=products&controller=product&action=listproduct&type=2" <?php if ($type == 2) echo "style='background:red;color:white'" ?>>Đã xóa</a>
                </div>

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
                            <th scope="col">Danh mục</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Người tạo</th>
                            <th scope="col">Trạng thái</th>

                            <th scope="col">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($list)) {
                            $count = 0;
                            foreach ($list as $item) {

                        ?>
                                <tr class="">
                                    <td><?php echo $count;
                                        $count++; ?></td>
                                    <td><img src="public/images/<?php echo $item["hinhanh"] ?>" alt=""></td>
                                    <td><?php echo $item["masanpham"] ?></td>
                                    <td><a href="#"><?php echo $item["tensanpham"] ?></a></td>
                                    <td><?php echo $item["dongia"] ?></td>
                                    <td><?php echo $item["soluong"] ?></td>
                                    <td><?php echo $item["ten_theloai"] ?></td>
                                    <td><?php echo $item["ngayphathanh"] ?></td>
                                    <td><?php echo $item["nguoithem"] ?></td>
                                    <td><span><?php echo $item["tentrangthai"] ?></span></td>
                                    <td>
                                        <?php
                                        if ($type != 2) { ?>
                                            <a href="?mod=products&controller=product&action=updateproduct&id=<?php echo $item["id"] ?>" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if ($type != 2) {
                                        ?>
                                            <a href="?mod=products&controller=product&action=deleteproduct&id=<?php echo $item["id"] ?>" id="<?php echo $item["id"] ?>" onclick='showformconfirm2(this);return false' class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="?mod=products&controller=product&action=restoreproduct&id=<?php echo $item["id"] ?>" id="<?php echo $item["id"] ?>" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa-solid fa-trash-arrow-up"></i></a>

                                        <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>




                    </tbody>
                </table>
                <?php
                echo $pagging;
                ?>

            </div>
        </div>
    </div>
</div>
<?php
get_footer();
