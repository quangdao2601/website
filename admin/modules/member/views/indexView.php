<?php
get_header();
get_sidebar();
?>
<style>
    .form-choose a {
        display: inline-block;
        margin-right: 10px;
        /* border: 1px solid black; */
        padding: 10px;
        text-decoration: none;
        color: black;
        background-color: #ddd;
        font-weight: bold;
    }
</style>

<div id="wp-content">
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách thành viên</h5>
                <div class="form-search form-inline">
                    <form action="?mod=member&action=index" method="POST" style="display: flex;">
                        <input type="text" name="q" class="form-control form-search" placeholder="Tìm kiếm">
                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="card-body">

                <div class="form-action form-inline py-3">
                    <!-- <form action="" method="POST">
                        <select class="form-control mr-1" id="" name="choose">
                            <option value="">Tất cả thành viên</option>
                            <option value="0">Đang hoạt động</option>
                            <option value="1">Đã khóa</option>
                            <option value="2">Đã xóa </option>
                        </select>
                        <input type="submit" name="btn-choose" value="Áp dụng" class="btn btn-primary">
                    </form> -->

                    <div class="form-choose">
                        <a href="?mod=member&action=listmember&type=all" <?php if ($type == "all") echo "style=background:red;color:white" ?>>Tất cả thành viên</a>
                        <a href="?mod=member&action=listmember&type=0" <?php if ($type == '0') echo "style=background:red;color:white" ?>>Đang hoạt động</a>
                        <a href="?mod=member&action=listmember&type=1" <?php if ($type == "1") echo "style=background:red;color:white" ?>>Đã khóa</a>
                        <a href="?mod=member&action=listmember&type=2" <?php if ($type == "2") echo "style=background:red;color:white" ?>>Đã xóa</a>
                    </div>
                </div>
                <table class="table table-striped table-checkall">
                    <thead>
                        <tr>
                            <!-- <th>
                                <input type="checkbox" name="checkall">
                            </th> -->
                            <th scope="col">Stt</th>
                            <th scope="col">Họ tên</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Nguời tạo</th>
                            <th scope="col">Quyền</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php


                        if (!empty($list_member)) {
                            $count = 0;
                            foreach ($list_member as $item) {
                        ?> <tr>
                                    <!-- <td>
                                        <input type="checkbox">
                                    </td> -->
                                    <th scope="row"><?php echo $count;
                                                    $count++ ?></th>
                                    <td><?php echo $item["hovaten"] ?></td>
                                    <td><?php echo $item["tendangnhap"] ?></td>
                                    <td><?php echo $item["email"] ?></td>
                                    <td><?php echo $item["nguoithem"] ?></td>
                                    <td><a href="?mod=member&action=update_permission_member&id=<?php echo $item["id_user"] ?>">Quyền thành viên</a></td>
                                    <td><?php echo $item["ngayhoatdong"] ?></td>
                                    <td><?php echo $item["tentrangthai"] ?></td>
                                    <td>
                                        <a href="?mod=member&controller=index&action=updatemember&id=<?php echo $item["id_user"] ?>" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                        <?php
                                        if ($item["tinhtrang"]!='2') {
                                            echo "                                            <a href='' id='<?php echo " . $item['id_user'] . "?>' onclick='showformconfirm(this);return false' class='btn btn-danger btn-sm rounded-0 text-white' type='button' data-toggle='tooltip' data-placement='top' title='Delete'><i class='fa fa-trash'></i></a>";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <!-- href="?mod=member&controller=index&action=deletemember&id=<?php echo $item["id_user"] ?>"  -->
                            <?php
                            }
                        } else { ?>
                            <tr>
                                <td colspan="9">Không có thành viên nào trong danh sách </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <?php

                    echo pagging($num_pages, $type, $page, $str);
                    ?>
                </nav>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
