function showconfirm(obj) {
    document.getElementById("alert").classList.add("show")
    var ok = document.getElementById("ok");
    var id = obj.id
        // ok.setAttribute("href", "?mod=cart&action=addtocart&id=" + id);
        // alert(obj.target)
    ok.setAttribute("href", obj.target);

}

function getinfopagging(obj) {

    var inf = document.getElementById(obj.id)
        // inf.setAttribute("style", "background:red")

    var str = inf.getAttribute("str")
    var cate = inf.getAttribute("cate")
    var pages = inf.getAttribute("pages")
    var num_pages = inf.getAttribute("num_pages")
    for (var i = 1; i <= num_pages; i++) {
        if (i == pages) {
            inf.setAttribute("style", "background:red")
        } else {
            var t = document.getElementById(i)
            t.setAttribute("style", "background:blue")
        }
    }
    var data = {
        str: str,
        cate: cate,
        pages: pages,
    }

    $.ajax({
        url: "?mod=home&action=paggingajax",
        method: 'POST',
        data: data,
        dataType: 'text',
        success: function(data) {
            // $(".err_usernamelogin").html(data.err_usernamelogin)
            $("#list-product").html(data)
        }

    })
}

// function get_bg(this) {
//     // alert("ok")

// }
function check() {
    alert("ok")
    var name = document.getElementById("name_conditions").value
    var num_1 = document.getElementById("num_1").value
    var num_2 = document.getElementById("num_2").value
    var cate_conditions = document.getElementById("cate_conditions").value
}
$(document).ready(function() {


    $("#load_menu").click(function() {
        // $(".menu_replace").classList.remove("hide")
        document.getElementById("menu_replace").classList.add("show")
            // alert("ok")
    })
    $("#hide").click(function() {
        // $(".menu_replace").classList.remove("hide")
        document.getElementById("menu_replace").classList.remove("show")
            // alert("ok")
    })
})