<?php
get_header();
get_sidebar();
?>
<div id="wp-content">
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Thêm sản phẩm
            </div>
            <div class="card-body">
                <form action="" method="POST">

                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="name">Tên sản phẩm</label>
                                <input class="form-control" type="text" value="<?php echo $product["tensanpham"] ?>" name="name" id="name">
                                <?php if (isset($error["name"])) echo "<p style='color:red'>" . $error["name"] . "</p>" ?>
                            </div>
                            <div class="form-group">
                                <label for="name">Giá</label>
                                <input class="form-control" type="number" name="price" value="<?php echo $product["dongia"] ?>" id="name">
                                <?php if (isset($error["price"])) echo "<p style='color:red'>" . $error["price"] . "</p>" ?>
                            </div>
                            <div class="form-group">
                                <label for="name">Mã sản phẩm</label>
                                <input class="form-control" readonly="readonly" type="text" value="<?php echo $product["masanpham"] ?>" name="code" id="name">

                            </div>
                            <div class="form-group">
                                <label for="name">Số lượng</label>
                                <input class="form-control" type="number" value="<?php echo $product["soluong"] ?>" name="num" id="name">
                                <?php if (isset($error["num"])) echo "<p style='color:red'>" . $error["num"] . "</p>" ?>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label for="intro">Mô tả sản phẩm</label>
                                <textarea name="desc" class="ckeditor form-control" id="intro" cols="30" rows="12"><?php echo $product["motangan"] ?></textarea>
                                <?php if (isset($error["desc"])) echo "<p style='color:red'>" . $error["desc"] . "</p>" ?>
                            </div>

                            <div class="form-group">
                                <label for="intro">Chi tiết sản phẩm</label>
                                <textarea name="content" class="ckeditor form-control" id="intro" cols="30" rows="5"><?php echo $product["chitietsanpham"] ?></textarea>
                                <?php if (isset($error["content"])) echo "<p style='color:red'>" . $error["content"] . "</p>" ?>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label for="">Danh mục</label>
                                <select class="form-control" name="category" id="">
                                    <?php
                                    if (!empty($list)) {
                                        foreach ($list as $item) {
                                    ?>
                                            <option <?php if ($product["id_theloai"] == $item["id_theloai"]) echo "selected='selected'" ?> value="<?php echo $item['id_theloai'] ?>"><?php echo str_repeat("__", $item["level"]) . $item["ten_theloai"] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <select name="status" class="form-control" id="">
                                    <option <?php if ($product["tinhtrang"] == 0) echo "selected='selected'" ?> value="0">Đang bán</option>
                                    <option <?php if ($product["tinhtrang"] == 1) echo "selected='selected'" ?> value="1">Chờ duyệt</option>
                                
                                </select>
                            </div>
                        </div>
                    </div>








                    <input type="submit" class="btn btn-primary" name="btn-update-product" value="Cập nhật sản phẩm">
                </form>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
