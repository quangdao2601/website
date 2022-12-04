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
                        Thêm danh mục
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Tên danh mục</label>
                                <input class="form-control" type="text" name="name_category" id="name">
                                <?php if (isset($error["name_category"])) echo "<p style='color:red'>" . $error["name_category"] . "</p>" ?>
                            </div>
                            <div class="form-group">
                                <label for="">Danh mục cha</label>
                                <select class="form-control" name="cat_parent" id="">
                                    <option value="0">Trống</option>
                                    <?php
                                    if (!empty($list)) {
                                        foreach ($list as $item) {
                                    ?>
                                            <option value="<?php echo $item['id_theloai'] ?>"><?php echo str_repeat("__", $item["level"]) . $item["ten_theloai"] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Ảnh danh mục</label>
                                <input type="file" style="display: block;" name="image">
                                <?php if (isset($error["image"])) echo "<p style='color:red'>" . $error["image"] . "</p>" ?>

                            </div>
                            <div class="form-group">
                                <select class="form-control" name="status" id="">
                                    <option value="1">Chờ Duyệt</option>
                                </select>
                            </div>



                            <button type="submit" name="btn-add-category" class="btn btn-primary">Thêm dnah mục</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<?php
get_footer();
