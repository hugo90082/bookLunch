$(".amount").keyup(function () {
    if ($(this).val() >= 50) {
        $(this).val(50);
    }
})

$("#loginStart").on('click', function () {
    $("#login").attr("disabled", true);
    $("#passwordLogin").keyup(function () {
        $("#login").attr("disabled", false);//限制按鈕
    })
    $("#mailLogin").keyup(function () {
        let mail = $(this).val();
        let reg = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/;//判斷格式
        if (reg.test(mail)) {
            $("#mailValueLogin").text("格式正確");
            $("#login").attr("disabled", false);//格式正確就解開按鈕
        } else {
            $("#mailValueLogin").text("mail格式不正確");
            $("#login").attr("disabled", true);
        }
    })
})

$("#login").on('click', function () {
    let dataToServer = {
        mail: $('#mailLogin').val(),
        password: $('#passwordLogin').val(),
    }
    $.ajax({
        type: "POST",
        url: "./login.php",
        data: dataToServer,
        success: function (e) {
            if (e) {
                alert('登入成功');
                window.location.replace('index.php');
            } else {
                alert('帳號或密碼錯誤');
            }
        },
        error: function () {
            alert('錯誤');
        }
    })
})
$("#logout").on('click', function () {
    $.ajax({
        type: "POST",
        url: "./logout.php",
        success: function (e) {
            if (e) {
                alert('登出成功');
                window.location.replace('index.php');
            } else {
                alert('登出錯誤');
            }
        },
        error: function () {
            alert('錯誤');
        }
    })
})

$("#signUpStart").on('click', function () {
    let disabledValueMail = 0
    let disabledValuePwd = 0
    let password = 0
    let passwordCheck = 0
    $("#signUp").attr("disabled", true);
    $("#mailSignUp").keyup(function () {
        let mail = $(this).val();
        let reg = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/;//判斷格式
        if (reg.test(mail)) {
            $("#mailValueSignUp").text("格式正確");
            disabledValueMail = 1
            if (disabledValueMail == 1 && disabledValuePwd == 1) {
                $("#signUp").attr("disabled", false);//格式正確就解開按鈕
            }
        } else {
            $("#mailValueSignUp").text("mail格式不正確");
            $("#signUp").attr("disabled", true);
        }
    })
    $("#passwordSignUp").keyup(function () {
        password = $(this).val();
        if (password == passwordCheck) {
            $("#passwordValueSignUp").text("兩次密碼相同");
            disabledValuePwd = 1
            if (disabledValueMail == 1 && disabledValuePwd == 1) {
                $("#signUp").attr("disabled", false);
            }
        } else {
            $("#passwordValueSignUp").text("兩次密碼不相同");
            $("#signUp").attr("disabled", true);
        }
    })

    $("#passwordCheckSignUp").keyup(function () {
        passwordCheck = $(this).val();
        if (password == passwordCheck) {
            $("#passwordValueSignUp").text("兩次密碼相同");
            disabledValuePwd = 1

            if (disabledValueMail == 1 && disabledValuePwd == 1) {
                $("#signUp").attr("disabled", false);
            }


        } else {
            $("#passwordValueSignUp").text("兩次密碼不相同");
            $("#signUp").attr("disabled", true);
        }
    })
})

$("#signUp").on('click', function () {
    let dataToServer = {
        mail: $("#mailSignUp").val(),
        password: $("#passwordSignUp").val(),
        passwordCheck:$("#passwordCheckSignUp").val()
    }
    $.ajax({
        type: "POST",
        url: "./signUp.php",
        data: dataToServer,
        success: function (e) {
            if (e) {
                alert('註冊成功');
                $('#signUpModal').modal('hide');
                $('#loginModal').modal('show');
            } else {
                alert('註冊錯誤');
            }
        },
        error: function () {
            alert('錯誤');
        }
    })
})