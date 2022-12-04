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
                        Cập nhật thông tin danh mục
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="name">Tên danh mục</label>
                                <input class="form-control" type="text" name="name_category" value="<?php echo $info_category["ten_theloai"] ?>" id="name">
                                <?php if (isset($error["name_category"])) echo "<p style='color:red'>" . $error["name_category"] . "</p>" ?>
                            </div>
                            <div class="form-group">
                                <label for="">Danh mục cha</label>
                                <select class="form-control" name="cat_parent" id="">
                                    <option value="0" <?php if ($info_category["danhmuccha"] == 0) echo "selected='selected'" ?>>Trống</option>
                                    <?php
                                    if (!empty($list)) {

                                        foreach ($list as $item) {
                                    ?>
                                            <option <?php if ($item["id_theloai"] == $info_category["danhmuccha"]) echo "selected='selected'"; ?> value="<?php echo $item['id_theloai'] ?>"><?php echo str_repeat("__", $item["level"]) . $item["ten_theloai"] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="status" id="">
                                    <option value="0" <?php if ($info_category["trangthai"] == "0") echo "selected='selected'" ?>>Đã duyệt</option>
                                    <option value="1" <?php if ($info_category["trangthai"] == "1") echo "selected='selected'" ?>>Chờ Duyệt</option>

                                </select>
                            </div>



                            <button type="submit" name="btn-update-category" class="btn btn-primary">Cập nhật thông tin danh mục</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<?php
get_footer();
