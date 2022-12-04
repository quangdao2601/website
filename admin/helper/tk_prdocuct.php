<?php 
function tk_product($list){
    $sum=0;
    $num=0;
    $max=0;
    foreach ($list as $item){
        if($item["soluong"] > $max){
            $max=$item["soluong"];
            $id=$item["id_sanpham"];
        }
        $num+=$item["soluong"];
        $sum+=$item["soluong"]*$item["dongia"];
    }
    $info=array(
        "max"=>$max,
        "id"=>$id,
        "soluong"=>$num,
        "tongtien"=>$sum
    );
    return $info;
}