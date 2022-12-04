<?php
function add_to_cart($id, $info_product)
{
    if (array_key_exists($id, $_SESSION["cart"]["list_cart"])) {
        $_SESSION["cart"]["list_cart"][$id]["soluong"] += 1;
    } else {
        $_SESSION["cart"]["list_cart"][$id] = array(
            "id" => $id,
            "soluongconlai" => $info_product["soluong"],
            "tensanpham" => $info_product["tensanpham"],
            "masanpham" => $info_product["masanpham"],
            "dongia" => $info_product["dongia"],
            "soluong" => 1,
            "hinhanh" => $info_product["hinhanh"],
        );
    }
}

function update_info_cart()
{
    $num_order = 0;
    $total = 0;
    foreach ($_SESSION["cart"]["list_cart"] as $item) {
        $num_order += $item["soluong"];
        $total += $item["soluong"] * $item["dongia"];
    }
    $_SESSION["cart"]["info_cart"]["num_order"] = $num_order;
    $_SESSION["cart"]["info_cart"]["total"] = $total;
}


function delete_product_cart($id)
{
    foreach ($_SESSION["cart"]["list_cart"] as $item) {
        if ($item["id"] == $id) {
            unset($_SESSION["cart"]["list_cart"][$id]);
            break;
        }
    }
    update_info_cart();
}
