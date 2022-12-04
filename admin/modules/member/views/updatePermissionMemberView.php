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
                        <form method="POST">

                            <?php
                            if (!empty($list_permission)) {
                                foreach ($list_permission as $item) {
                                    $check = "";
                                    if (!empty($list_permission_member)) {
                                        foreach ($list_permission_member as $item2) {

                                            if ($item2["id_quyen"] == $item["id_quyen"]) {
                                                $check = "checked='checked'";
                                                break;
                                            }
                                        }
                                    }

                            ?>
                                    <div class="form-group">
                                        <input type="checkbox" <?php echo $check  ?> style="margin-right:20px;" id="<?php echo $item["duongdan"] ?>" name=<?php echo "permission[" . $item['id_quyen'] . "]" ?> value="<?php echo $item["id_quyen"] ?>">
                                        <label for="<?php echo $item["duongdan"] ?>" style="margin-right: 5PX;"><?php echo $item["tenquyen"] ?></label>
                                    </div>
                            <?php

                                }
                            }
                            ?>



                            <?php

                            ?>
                            <input type="submit" class="btn btn-primary" name="btn-update-permission" value="Cập nhật">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
