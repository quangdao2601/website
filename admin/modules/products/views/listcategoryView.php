<?php
get_header();
get_sidebar();
?>
<div id="wp-content">
    <div id="content" class="container-fluid">
        <div class="row">
            <div class="col-7">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        Danh sách danh mục sản phẩm
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-checkall">
                            <thead>
                                <tr>

                                    <th scope="col">STT</th>
                                    <th scope="col">Tên danh mục</th>
                                    <th scope="col">ID danh mục</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($list)) {
                                    $count = 0;
                                    foreach ($list as $item) {
                                ?>
                                        <tr class="">
                                            <td><?php echo $count;$count++ ?></td>

                                            <td><?php echo str_repeat("__", $item["level"]) . $item["ten_theloai"]  ?></td>
                                            <td><?php echo $item["id_theloai"] ?></td>
                                            <td><?php echo $item["tentrangthai"] ?></td>
                                            <td>
                                                <a href="?mod=products&controller=category&action=updatecategory&id=<?php echo $item["id_theloai"] ?>" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<?php
get_footer();
