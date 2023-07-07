// Hello Programer

$(document).ready(function () {
    $('.captchaFunc').click(function () {
// alert('captcha');
        var url = $("base").attr("href");
        if (url) {
            // $('.refresh-captcha span').addClass("fa-spin");
            $(".captcha-img").html('Lodding..');

            setTimeout(function () {
                vars = $.now();
                $(".captcha-img").html('<img src="' + url + '/captcha?date=' + vars + '" width="200" height="40px" class="cover-bg">  ');
                // $(".captchaFunc .cover-bg").attr("style", 'background-image: url(' + url + '/captcha?date=' + vars + ')');
                // $('.refreshcaptcha span').removeClass("fa-spin");
                $(".captcha-img .cover-bg").html("");
                $('input[name="captcha"]').val('');
            }, 1000);
        }
    });


    $('.clearTextComment').click(function () {
        $('.textComment').val('');
    });


});


$('#thecomment').ready(function () {
    var checklegnth = $('#thecomment').length;
    if (checklegnth >= 1) {
        var path = $('base').attr("href");
        var mdOn = $('#thecomment').data('md');
        var urlPage = $('#thecomment').data('url');
        var mk = $('#thecomment').data('masterkey');
        $.ajax({
            url: path + "/comment",
            type: "POST", // type of action POST || GET
            dataType: 'html', // data type
            data: {mdPage: mdOn, urlPage: urlPage, masterkey: mk}, // post data || get data
            success: function (result) {
                if (result) {
                    $('#thecomment').html(result);
                    // $('.ratepost').rating();
                } else {
                    $('#thecomment').hide();
                }
            },
            error: function (xhr, resp, text) {
                console.log(xhr, resp, text);
            }
        });
    }
});




// modal login member show
$(document).on('click', '#loginModal', function () {
    var login = $('#login-report').attr('data-login');
    linkdirect = $(this).attr('href');
    $('input[name=urltogo]').val(linkdirect);

    if (!login) {
        $("#login-report").modal('show');
        return false;
    } else {
        window.location = linkdirect;
    }

});
$(document).on('click', '.loginMember', function () {
// alert('test');
  var path = $('base').attr("href");
  var email = $('input[name=member_login_email]').val();
  var password = $('input[name=member_login_password]').val();
  if (email !='' && password != '') {
    var formData = new FormData($("#memberForm")[0]);
    // console.log(formData);
    $.ajax({
        url: path + "member/login-modal",
        type: "POST", // type of action POST || GET
        // dataType: 'json', // data type
        // data: formData,
        // data: {member_login_email: email, member_login_password: password,type:'modal'}, // post data || get data
        xhr: function () {
            var myXhr = $.ajaxSettings.xhr();
            return myXhr;
        },
        success: function (result) {
          // console.log(result);
            if (result['success']) {
              window.location = result['success'];
              $("#login-report").modal('hide');
                // $('#thecomment').html(result);
                // $('.ratepost').rating();
            } else {
                $('#alertMemberLogin').show();
                $('#alertMemberLogin').html(result['error']);
            }
        },
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json'
    });
  }
  if(email == '') {
    $('#alertMemberLogin').show();
    $('#alertMemberLogin').html('กรุณากรอกอีเมล์');
  }else if (password == '') {
    $('#alertMemberLogin').show();
    $('#alertMemberLogin').html('กรุณากรอกรหัสผ่าน');
  }


});



// Modal Login Boss Show
$(document).on('click', '#loginBossModal', function () {
  $("#login-boss").modal('show');
  return false;

});
// Submit Login Boss
$(document).on('click', '.loginBoss', function () {
  // $("#login-boss").modal('show');
  // return false;
  var path = $('base').attr("href");
  var username = $('#login-boss input[name=username]').val();
  var password = $('#login-boss input[name=password]').val();
  if (username!='' && password != '') {
    $.ajax({
        url: path + "boss/calendar-login",
        type: "GET", // type of action POST || GET
        dataType: 'json', // data type
        data: {username: username, password: password}, // post data || get data
        xhr: function () {
            var myXhr = $.ajaxSettings.xhr();
            return myXhr;
        },
        success: function (result) {
          // console.log(result);
            if (result['success']) {
              window.location = result['success'];
              $("#login-boss").modal('hide');
                // $('#thecomment').html(result);
                // $('.ratepost').rating();
            } else {
                $('#alertBossLogin').show();
                $('#alertBossLogin').html(result['error']);
            }
        }
    });


  }
  if(username == '') {
    $('#alertBossLogin').show();
    $('#alertBossLogin').html('กรุณากรอกชื่อผู้ใช้งาน');
  }else if (password == '') {
    $('#alertBossLogin').show();
    $('#alertBossLogin').html('กรุณากรอกรหัสผ่าน');
  }


});


// Modal Login booking Show
$(document).on('click', '#loginBookingModal', function () {

  var login = $('#loginBookingModal').attr('data-login');
  linkdirect = $(this).attr('href');
  $('input[name=urltogo]').val(linkdirect);

  if (!login) {
      $("#login-booking").modal('show');
      return false;
  } else {
      window.location = linkdirect;
  }

});
// Submit Login booking
$(document).on('click', '.loginBooking', function () {
  // $("#login-boss").modal('show');
  // return false;
  var path = $('base').attr("href");
  var username = $('#login-booking input[name=username]').val();
  var password = $('#login-booking input[name=password]').val();
  if (username!='' && password != '') {
    var formData = new FormData($("#bookingForm")[0]);
    $.ajax({
        url: path + "booking/login",
        type: "POST", // type of action POST || GET
        // dataType: 'json', // data type
        // data: {username: username, password: password}, // post data || get data
        xhr: function () {
            var myXhr = $.ajaxSettings.xhr();
            return myXhr;
        },
        success: function (result) {
          // console.log(result);
            if (result['success']) {
              window.location = result['success'];
              $("#login-booking").modal('hide');
                // $('#thecomment').html(result);
                // $('.ratepost').rating();
            } else {
                $('#alertBookingLogin').show();
                $('#alertBookingLogin').html(result['error']);
            }
        },
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json'
    });


  }
  if(username == '') {
    $('#alertBookingLogin').show();
    $('#alertBookingLogin').html('กรุณากรอกชื่อผู้ใช้งาน');
  }else if (password == '') {
    $('#alertBookingLogin').show();
    $('#alertBookingLogin').html('กรุณากรอกรหัสผ่าน');
  }


});


var modalConfirm = function (callback) {
    var linkdirect = null, baseurl = $('base').attr("href");
    $(document).on('click', "#modal-btn-nologin", function () {
        linkdirect = $(this).attr('href');
        // var linkdirect = path + "information/intranet";
        callback(true, linkdirect);
        $("#login-report").modal('hide');
    });
};
