<?php

function construct(){
    load_model("index");
    load("helper", "data_tree");
    load("helper", "url_image");
    load("helper", "format");
    load("helper", "get_list_product");
    load("helper", "pagging");
}
function introduceAction(){
    load_view("introduce");
}