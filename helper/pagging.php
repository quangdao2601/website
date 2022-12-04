<?php
function get_list_product_pagging($num_product, $pages, $listproduct)
{
    $start = ($pages - 1) * $num_product;
    $list = [];
    $check = 0;
    foreach ($listproduct as $key => $item) {
        if ($key == $start) {
            $list[] = $item;
            $check++;
            $start++;
        }
        if ($check == $num_product) {
            break;
        }
    }
    return $list;
}


function get_pagging($num_product, $total, $page, $theloai, $str)
{
    $pages = $total / $num_product;
    $pages = ceil($pages);
    $string = "<ul class='pagging'>";
    for ($i = 1; $i <= $pages; $i++) {
        $select = "";
        if($i==$page){
            $select="style='background:red'";
        }
        $string.="<li $select num_pages='".$pages."' id='".$i."'  cate='".$theloai."' str='".$str."' pages='".$i."'    onclick='getinfopagging(this);' >".$i."</li>";
        // $string .= "<a $select href='?mod=home&action=home&pages=" . $i . "&id=" . $theloai . "&str=" . $str . "' class='pagging_item'><li>" . $i . "</li></a>";
    }
    $string .= "</ul>";
    return $string;
}

function get_num_product($list)
{
    $count = array_keys($list);
    return end($count);
}


function get_pagging_conditions($name, $num1, $num2, $cate, $page, $total, $num_product)
{
    $pages = $total / $num_product;
    $pages = ceil($pages);
    $string = "<ul class='pagging'>";
    for ($i = 1; $i <= $pages; $i++) {
        $select = "";
        if ($i == $page) {
            $select = "style='background:red'";
        }
        $string .= "<a $select href='?mod=home&action=home&page=" . $i . "&name=" . $name . "&num1=" . $num1 . "&num2=" . $num2 . "&cate=" . $cate . "' class='pagging_item'><li>" . $i . "</li></a>";
    }
    $string .= "</ul>";
    return $string;
}
