function showformconfirm(obj) {
    document.getElementById("form-confirm").classList.add("show");
    var a = document.getElementById("user_id")
    var t = obj.id
    a.setAttribute("href", "?mod=member&controller=index&action=deletemember&id=" + t)
}

function showformconfirm2(obj) {
    document.getElementById("form-confirm").classList.add("show");
    var a = document.getElementById("user_id")
    var t = obj.id
    a.setAttribute("href", "?mod=products&controller=product&action=deleteproduct&id=" + t)
}

function hideformconfirm() {
    document.getElementById("form-confirm").classList.remove("show");

}