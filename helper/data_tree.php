<?php

function data_tree($data, $cat_parent, $level = 0)
{
    $result = [];
    foreach ($data as $item) {
        if ($item["danhmuccha"] == $cat_parent) {
            $item["level"]=$level;
            $result[] = $item;
            $child = data_tree($data, $item["id_theloai"], $level + 1);
            $result = array_merge($result, $child);
        }
    }
    return $result;
}
