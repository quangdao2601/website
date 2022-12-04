$(document).ready(function() {
    $(".num_order").change(function() {
        var num_order = $(this).val();
        var id = $(this).attr('data-id')
        var data = {
            num_order: num_order,
            id: id
        }
        $.ajax({
            url: "?mod=cart&action=resloveajax",
            method: 'POST',
            data: data,
            dataType: 'json',
            success: function(data) {
                $("#total_cart").html("<strong>" + data.sub_total + "</strong")
                $(".thanhtien" + id).text(data.total)
            }
        })
    })

    var ccc = document.getElementById("inputsubmit")


    $("#form").keyup(function() {
        var fullname = $("#fullname").val()
        var username = $("#username").val()
        var email = $("#email").val()
        var password = $("#password").val()
        var re_password = $("#re_password").val()
        var address = $("#address").val()
        var data = {
            fullname: fullname,
            username: username,
            email: email,
            password: password,
            re_password: re_password,
            address: address
        }

        $.ajax({
            url: "?mod=login&action=reslovereg",
            method: 'POST',
            data: data,
            dataType: 'json',
            success: function(data) {

                if (data.err_fullname == "" && data.err_username == "" && data.err_email == "" && data.err_password == "" && data.err_re_password == "" && data.err_address == "") {
                    $('#inputsubmit').removeAttr("disabled")
                } else {
                    ccc.setAttribute("disabled", "true")
                }
                $(".fullname").html(data.err_fullname)
                $(".username").html(data.err_username)
                $(".email").html(data.err_email)
                $(".password").html(data.err_password)
                $(".re_password").html(data.err_re_password)
                $(".addresss").html(data.err_address)
            }

        })


    })
    $("#btnlogin").keyup(function() {
        var usernamelogin = $("#usernamelogin").val()
        var passwordlogin = $("#passwordlogin").val()
        var data = {
            usernamelogin: usernamelogin,
            passwordlogin: passwordlogin,
        }

        $.ajax({
            url: "?mod=login&action=reslovelogin",
            method: 'POST',
            data: data,
            dataType: 'json',
            success: function(data) {
                $(".err_usernamelogin").html(data.err_usernamelogin)
                $(".err_passwordlogin").html(data.err_passwordlogin)
            }

        })

    })

    $("#search_conditions").keyup(function() {
        // var mum1 = document.getElementById("num_1")
        // document.getElementById("num_1").value = ""
        var name_conditions = document.getElementById("name_conditions").value
        var cate_conditions = document.getElementById("cate_conditions").value
        var num1 = document.getElementById("num_1").value
        var num2 = document.getElementById("num_2").value
        var data = {
            name_conditions: name_conditions,
            cate_conditions: cate_conditions,
            num1: num1,
            num2: num2,
        }
        $.ajax({
            url: "?mod=home&action=resloveconditons",
            method: 'POST',
            data: data,
            dataType: 'text',
            success: function(data) {
                // $(".err_usernamelogin").html(data.err_usernamelogin)
                $("#list_search_conditions").html(data)
            }

        })
    })


    $("#search_conditions").click(function() {

        var mum1 = document.getElementById("num_1")
        document.getElementById("num_1").value = ""
        var name_conditions = document.getElementById("name_conditions").value
        var cate_conditions = document.getElementById("cate_conditions").value
        var num1 = document.getElementById("num_1").value
        var num2 = document.getElementById("num_2").value
        var data = {
            name_conditions: name_conditions,
            cate_conditions: cate_conditions,
            num1: num1,
            num2: num2,
        }
        $.ajax({
            url: "?mod=home&action=resloveconditons",
            method: 'POST',
            data: data,
            dataType: 'text',
            success: function(data) {
                // $(".err_usernamelogin").html(data.err_usernamelogin)
                $("#list_search_conditions").html(data)
            }

        })
    })

        $("#search").keyup(function() {
            var query = document.getElementById("search").value
            var data = {
                query: query
            }
            $.ajax({
                url: "?mod=home&action=search",
                method: 'POST',
                data: data,
                dataType: 'text',
                success: function(data) {
                    // $(".err_usernamelogin").html(data.err_usernamelogin)
                    $("#list_search").html(data)
                }

            })
        })



})