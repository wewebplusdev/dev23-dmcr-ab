var path = $("base").attr("href");
$(document).ready(function() {
    // recaptcha v3
    grecaptcha.ready(function() {

        // do request for recaptcha token
        // response is promise with passed token
        grecaptcha
            .execute($(".sitekey").data("id"), { action: "validate_captcha" })
            .then(function(token) {
                // add token value to form
                document.getElementById("g-recaptcha-response").value = token;
            });
    });
});

$("#demand-form").validator().on("submit", function (e) {
    e.preventDefault();
    var formData = new FormData($("#demand-form")[0]);
    // console.log(formData);

    $.ajax({
        url: path + "/offer-demand/insert",
        type: "POST",
        xhr: function () {
            var myXhr = $.ajaxSettings.xhr();
            return myXhr;
        },
        success: function (data) {
            console.log(data);
            if(data.status == 200){
                $("#step-i").hide();
                $("#step-ii").show();
            }
            
            return false;
            
        },
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
    });
    return false;

});

function selectDistric(id, element) {
    var inputvalue = $(id).val();
    // console.log(inputvalue);
    $.ajax({
        url: path + "/offer-demand/distric",
        type: "POST",
        data: {
            id: inputvalue,
        },
        dataType: "json",
        xhr: function () {
            var myXhr = $.ajaxSettings.xhr();
            return myXhr;
        },
        success: function (data) {
            // console.log(data);
            $(element).html(data.msg);
        },
        error: function () {
            console.log("error");
        }
    });
    return false;
}

function selectAmphur(id, element) {
    var inputvalue = $(id).val();
    // console.log(inputvalue);
    $.ajax({
        url: path + "/offer-demand/amphur",
        type: "POST",
        data: {
            id: inputvalue,
        },
        dataType: "json",
        xhr: function () {
            var myXhr = $.ajaxSettings.xhr();
            return myXhr;
        },
        success: function (data) {
            // console.log(data);
            $(element).html(data.msg);
        },
        error: function () {
            console.log("error");
        }
    });
    return false;
}

function selectDiscode(id, element) {
    var inputvalue = $(id).val();
    // console.log(inputvalue);
    $.ajax({
        url: path + "/offer-demand/districcode",
        type: "POST",
        data: {
            id: inputvalue,
        },
        dataType: "json",
        xhr: function () {
            var myXhr = $.ajaxSettings.xhr();
            return myXhr;
        },
        success: function (data) {
            // console.log(data);
            $(element).val(data.msg);
        },
        error: function () {
            console.log("error");
        }
    });
    return false;
}