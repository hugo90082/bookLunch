$("#commodityStock").keyup(function () {
    if ($(this).val() >= 9999) {
        $(this).val(9999);
    }else if($(this).val() <= 0){
        $(this).val(0);
    }
})
$("#commodityPrice").keyup(function () {
    if ($(this).val() >= 999) {
        $(this).val(999);
    }else if($(this).val() <= 30){
        $(this).val(30);
    }
})
