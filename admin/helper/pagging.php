<?php
function pagging($total, $type, $page,$str)
{
    $pagging = "";
    $pagging = "<ul class='pagination' style='margin:0px auto;width:50%;justify-content:center'>";
    for ($i = 1; $i <= $total; $i++) {
        $check = "";
        if ($page == $i) {
            $check = "background:red";
        }

        $pagging .= "<a  href='?mod=member&controller=index&action=listmember&page=$i&type=$type&str=$str'>   <li style='margin-right:10px;background:#007bff;color:white;display:block;padding:10px 12px;$check'>$i</li> </a> ";
    }
    $pagging .= "</ul>";
    return $pagging;
}
