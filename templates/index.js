$(".amount").keyup(function () {
    $(this).val($(this).attr("max"));
    if ($(this).val() >= 50) {
        $(this).val(50);
    }
})

$("#loginStart").on('click', function () {
    let loginInputCheck = 0;
    $("#login").attr("disabled", true);
    $("#passwordLogin").keyup(function () {
        if (loginInputCheck == 1) {
            $("#login").attr("disabled", false); //限制按鈕
        }

    })
    $("#mailLogin").keyup(function () {
        let mail = $(this).val();
        let reg = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/; //判斷格式
        if (reg.test(mail)) {
            $("#mailValueLogin").text("格式正確");
            $("#login").attr("disabled", false); //格式正確就解開按鈕
            loginInputCheck = 1
        } else {
            $("#mailValueLogin").text("mail格式不正確");
            $("#login").attr("disabled", true);
            loginInputCheck = 0
        }
    })
})

$("#login").on('click', function () {
    let dataToServer = {
        mail: $('#mailLogin').val(),
        password: $('#passwordLogin').val(),
        memberRoute: "login"
    }
    $.ajax({
        type: "POST",
        url: "./member.php",
        data: dataToServer,
        success: function (e) {
            console.log(e)
            if (e === "1") {
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
            if (e === "1") {
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
        let reg = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/; //判斷格式
        if (reg.test(mail)) {
            $("#mailValueSignUp").text("格式正確");
            disabledValueMail = 1
            if (disabledValueMail == 1 && disabledValuePwd == 1) {
                $("#signUp").attr("disabled", false); //格式正確就解開按鈕
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
        passwordCheck: $("#passwordCheckSignUp").val()
    }
    $.ajax({
        type: "POST",
        url: "./signUp.php",
        data: dataToServer,
        success: function (e) {
            if (e === "1") {
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

$('.deleteButton').on('click', function () {
    let dataToServer = {
        commodityID: $(this).prev().val()
    }
    $.ajax({
        type: "POST",
        url: "./deletecommodity.php",
        data: dataToServer,
        success: function (e) {
            if (e === "1") {
                $('#dataRow' + dataToServer.commodityID).remove()
                alert('刪除成功');
            } else {
                alert('刪除錯誤');
            }
        },
        error: function () {
            alert('錯誤');
        }
    })
})

$('#updatePasswordMemberManagement').on('click', function () {
    let dataToServer = {
        passwordMemberManagement: $("#passwordMemberManagement").val(),
        newPasswordMemberManagement: $("#newPasswordMemberManagement").val(),
        newCheckPasswordMemberManagement: $("#newCheckPasswordMemberManagement").val()
    }
    $.ajax({
        type: "POST",
        url: "./memberUpdate.php",
        data: dataToServer,
        success: function (e) {
            if (e === "3") {
                alert('不得為空值');
            } else if (e === "2") {
                alert('兩次密碼不相同');
            } else if (e === "1") {
                alert('變更成功');
            } else if (e === "4") {
                alert('密碼輸入錯誤');
            } else {
                alert('變更錯誤');
            }
        },
        error: function () {
            alert('錯誤');
        }
    })
})

$('.buyButton').on('click', function () {
    commodityID = $(this).prev().val();
    let amount = $('#amount' + commodityID).val()
    let price = $(this).prev().prev().val()
    let dataToServer = {
        memberID: $("#memberID").val(),
        commodityID: $(this).prev().val(),
        amount: $('#amount' + commodityID).val(),
        transactionRemarks: $('#transactionRemarks' + commodityID).val(),
        total: price * amount,
        stock: $(this).prev().prev().prev().val(),
    }
    $.ajax({
        type: "POST",
        url: "./transactionInsert.php",
        data: dataToServer,
        success: function (e) {
            if (e === "1") {
                let subTotal = dataToServer.stock - dataToServer.amount
                alert('成功購買');
                $("#stock" + commodityID).text("剩餘：" + subTotal + "個");
                $("#stockHidden" + commodityID).val(subTotal);
                if (subTotal <= 0) {
                    $("#buyButton" + commodityID).attr("disabled", true);
                    $("#transactionRemarks" + commodityID).attr("disabled", true);
                    $("#amount" + commodityID).attr("disabled", true);
                }

                let str = `<div class='container-fluid'>
                <div class='row'>
                    <div class='col-md-3'>
                        <h5 id='nameTransaction'>${$("#nameHidden" + commodityID).val()}</h5>
                    </div>
                    <div class="col-md-3">
                        <h5 id="transactionRemarksTransaction">${dataToServer.transactionRemarks}</h5>
                    </div>
                    <div class="col-md-2">
                        <h5 id="amountTransaction">${amount}</h5>
                    </div>
                    <div class="col-md-1">
                        <h5 id="totalTransaction">${dataToServer.total}</h5>
                    </div>
                    <div class="col-md-1">
                        <h5>剛剛...</h5>
                    </div>
                </div>
            </div>`
                $("#modalTransaction").append(str);

            } else if (e === "2") {
                alert('數量不得等於0');
            } else if (e === "9") {
                alert('帳號問題');
            } else if (e === "3") {
                alert('存貨不足');
                $("#buyButton" + commodityID).attr("disabled", true);
                $("#transactionRemarks" + commodityID).attr("disabled", true);
                $("#amount" + commodityID).attr("disabled", true);
            } else {
                alert("購買錯誤");
            }
        },
        error: function () {
            alert('錯誤');
        }
    })
})
