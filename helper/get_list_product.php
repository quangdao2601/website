<?php
function get_list_products($list_category, $theloai,$str)
{
    // $list_category = data_tree($list_category, $theloai);

    $id = [];
    $id[] = $theloai;
    foreach ($list_category as $item) {
        $id[] = $item["id_theloai"];
    }
    // print_r($id);
    $listpr = array();
    foreach ($id as $item2) {
        $listpr[] = get_list_product_by_cateory($item2, 0, $str);
    }
    // $total_product = 0;
    $list = [];
    $count = 0;
    foreach ($listpr as $item) {
        if (!empty($item)) {
            foreach ($item as $item2) {
                // echo $item2["id_theloai"];
                // print_r($item2);
                // $total_product++;
                $list[$count] = $item2;
                $count++;
            }
        }
    }
    return $list;
}


