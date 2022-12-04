<?php
get_header();
get_sidebar();

?>
<div id="wp-content">
    <div id="content" class="container-fluid">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        Danh sách quyền thành viên
                    </div>
                    <div class="card-body">
                        <form>

                            <?php
                            if (!empty($list_permission)) {
                                foreach ($list_permission as $item) {
                            ?>
                                    <div class="form-group">
                                        <input type="checkbox" style="margin-right:20px;" id="<?php echo $item["duongdan"] ?>" name="permission" value="<?php echo $item["duongdan"] ?>">
                                        <label for="<?php echo $item["duongdan"] ?>" style="margin-right: 5PX;"><?php echo $item["tenquyen"] ?></label>

                                    </div>
                            <?php
                                }
                            }
                            ?>



                            <?php

                            ?>
                            <!-- <button type="submit" class="btn btn-primary">Thêm mới</button> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
