// Hello Programer

//paceOptions = {
  //  // Configuration goes here. Example:
 //   elements: false,
 //   restartOnPushState: false,
  //  restartOnRequestAfter: false
//}
$(document).ready(function() {
	$('#alertBookingLogin').hide();

    // var date = new Date();
    // var minutes = 1;
    // date.setTime(date.getTime() + (minutes * 60 * 1000));
    // $.cookie('CONSENT', true, { 
    //     expires: date, 
    //     path: '/'
    // });


    $('.select-control.filter').select2({
      theme: 'default filter',
         minimumResultsForSearch: Infinity
     });
	
	
	function detectmob() { 
	 if( navigator.userAgent.match(/Android/i)
	 || navigator.userAgent.match(/webOS/i)
	 || navigator.userAgent.match(/iPhone/i)
	 || navigator.userAgent.match(/iPad/i)
	 || navigator.userAgent.match(/iPod/i)
	 || navigator.userAgent.match(/BlackBerry/i)
	 || navigator.userAgent.match(/Windows Phone/i)
	 ){
		return true;
	  }
	 else {
		return false;
	  }
	}
	
	isMobile = detectmob();
	if(isMobile){
		$(".boxdestopsite").removeClass("box-none");
		$(".boxdestopsite").addClass("box-block");
	} else {
	//$(".boxdestopsite").hide();
		$(".boxdestopsite").removeClass("box-block");
		$(".boxdestopsite").addClass("box-none");

	}
	
    $('.captchaFunc').click(function() {
        // alert('captcha');
        var url = $("base").attr("href");
        if (url) {
            // $('.refresh-captcha span').addClass("fa-spin");
            $(".captcha-img").html('Lodding..');

            setTimeout(function() {
                vars = $.now();
                $(".captcha-img").html('<img src="' + url + '/captcha?date=' + vars + '" width="200" height="40px" class="cover-bg">  ');
                // $(".captchaFunc .cover-bg").attr("style", 'background-image: url(' + url + '/captcha?date=' + vars + ')');
                // $('.refreshcaptcha span').removeClass("fa-spin");
                $(".captcha-img .cover-bg").html("");
                $('input[name="captcha"]').val('');
            }, 1000);
        }
    });


    $('.clearTextComment').click(function() {
        $('.textComment').val('');
    });
	
	 $(".popUpHome a").fancybox({
		 hight: "300px", 
		 'autoScale': true,
		 transitionIn:true,
		 /*baseClass: "quick-view-container",
		 baseTpl: '<div class="fancybox-container" role="dialog">' + '<div class="quick-view-content">' + '<div class="quick-view-carousel">' + '<div class="fancybox-stage"></div>' + "</div>" + '<div class="quick-view-aside"></div>' + '<button data-fancybox-close class="quick-view-close">X</button>' + "</div>" + "</div>",
		*/
        onInit: function(instance) {
            /*
            #1 Create bullet navigation links
            =================================
            */
            var bullets = '<ul class="quick-view-bullets">';
            for (var i = 0; i < instance.group.length; i++) {
                bullets += '<li><a data-index="' + i + '" href="javascript:;"><span>' + (i + 1) + "</span></a></li>";
            }
            bullets += "</ul>";
            $(bullets).on("click touchstart", "a", function() {
                var index = $(this).data("index");
                $.fancybox.getInstance(function() {
                    this.jumpTo(index);
                });
            }).appendTo(instance.$refs.container.find(".quick-view-carousel"));
            /*
            #2 Add product form
            ===================
            */
            var $element = instance.group[instance.currIndex].opts.$orig;
            var form_id = $element.data("qw-form");
            instance.$refs.container.find(".quick-view-aside").append(// In this example, this element contains the form
            $("#" + form_id).clone(true).removeClass("hidden"));
        },
        beforeShow: function(instance) {
            /*
            Mark current bullet navigation link as active
            */
            instance.$refs.container.find(".quick-view-bullets").children().removeClass("active").eq(instance.currIndex).addClass("active");
        }
		}).eq(0).trigger('click');

    // ######################################################################################### Start Cookie ##################################################################################################

    // // var sitename = "unknown-browser";
    // // if (navigator.userAgent.indexOf("MSIE") != -1 || navigator.userAgent.indexOf("rv:11.0") != -1) {
    // //     sitename = "msie";
    // // } else if (navigator.userAgent.indexOf("Edge") != -1) {
    // //     sitename = "microsoft-edge";
    // // } else if (navigator.userAgent.indexOf("Firefox") != -1) {
    // //     sitename = "firefox";
    // // } else if (navigator.userAgent.indexOf("Opera") != -1) {
    // //     sitename = "opera";
    // // } else if (navigator.userAgent.indexOf("Chrome") != -1) {
    // //     sitename = "chrome";
    // // } else if (navigator.userAgent.indexOf("Safari") != -1) {
    // //     sitename = "safari";
    // // }
    // // console.log(sitename);

    // var url_pdpa = "";
    // var base = $("base").attr("href");

    // $.ajax({
    //     url: base + "/pdpa/get_cookieconsent",
    //     async: false,
    //     success: function(result) {
    //         var result = JSON.parse(result);
    //         url_pdpa = result.url_pdpa;
    //         // console.log(result.token_statuscode);
    //         // console.log(result.secretkey);
    //         // console.log(atob($.cookie("KEY")));
    //         // return false;
    //         if (typeof $.cookie("CONSENT") === "undefined" || atob($.cookie("KEY")) != result.secretkey) {
    //             $('.cookieconsent').html(result.html);
    //             $('.cookieconsent').show();
    //             // $.removeCookie('CONSENT', { path: '/' });
    //             // $.removeCookie('KEY', { path: '/' });
    //         } else {
    //             $('.cookieconsent').hide();
    //         }
    //     }
    // });

    // $(document).on('click', '.acceptCookie', function() {
    //     var date = new Date();
    //     var day = 1;
    //     var hour = 1;
    //     var minutes = 10;
    //     var Accept = $(this).data('accept');
    //     // var Token = $('#unknows').data('whatis');

    //     if (Accept == 'Accept') {
    //         $.ajax({
    //             url: base + "/pdpa/accept_cookieconsent",
    //             success: function(result) {
    //                 var result = JSON.parse(result);
    //                 if (result.statuscode == 201) {
    //                     date.setTime(date.getTime() + (day * (hour * minutes * 60 * 1000)));
    //                     $.cookie('CONSENT', true, {
    //                         expires: date,
    //                         path: '/'
    //                     });
    //                     $.cookie('KEY', btoa(result.secretkey), {
    //                         expires: date,
    //                         path: '/'
    //                     });
    //                     $('.cookieconsent').hide();
    //                 } else {
    //                     return false;
    //                 }
    //             }
    //         });
    //     }
    // });



    // // // GET_menu_policy
    // // $.ajax({
    // //     url: "http://183.88.224.221/dmcr/api/putApiPDPA.php",
    // //     async: false,
    // //     success: function (url) {
    // //         url_pdpa = url.data[0].url;
    // //     }
    // // });
    // // console.log(url_pdpa);

    // var html_menu_policy = '';
    // $.ajax({
    //     url: url_pdpa + "/home/get_menu_policy",
    //     success: function(result) {
    //         var result = JSON.parse(result);
    //         $.each(result, function(key, value) {
    //             var subject = value['subject'].split("ของ");
    //             html_menu_policy += '<li class="item">';
    //             html_menu_policy += ' <a href="javascript:void(0)" ';
    //             html_menu_policy += ' data-url="' + value['path_policy'] + '" ';
    //             html_menu_policy += ' data-id="' + value['id'] + '" ';
    //             html_menu_policy += ' class="link clickPolicy" ';
    //             html_menu_policy += ' title="' + subject[0] + '">';
    //             html_menu_policy += subject[0];
    //             html_menu_policy += ' </a>';
    //             html_menu_policy += '</li>';
    //         });
    //         $('#get_menu_policy').append(html_menu_policy);
    //     }
    // });


    // $(document).on('click', '.clickPolicy', function() {
    //     var path = $('base').attr("href");
    //     var html_modal = '';
    //     var urlPolicy = $(this).data('url');
    //     var idPolicy = $(this).data('id');

    //     $.ajax({
    //         url: url_pdpa + "/" + urlPolicy + "/" + idPolicy,
    //         success: function(data) {
    //             var data = JSON.parse(data);
    //             html_modal += '<div class="header">';
    //             html_modal += '     <h4 class="title">' + data['detail']['subject'] + '</h4>';
    //             html_modal += '     <p class="desc">';
    //             html_modal += data['detail']['title'];
    //             html_modal += '     </p>';
    //             html_modal += '</div>';

    //             html_modal += '<div class="content" style="line-height: 25px;">';
    //             html_modal += data['detail']['html'];
    //             html_modal += '</div>';
    //             // console.log(data['detail']['html']);

    //             if (data['numOfRows']['file'] > 0) {
    //                 html_modal += '     <div class="footer">';
    //                 html_modal += '         <h4 class="title">เอกสารแนบ</h4>';
    //                 $.each(data['file'], function(key, value) {
    //                     html_modal += '<div>';
    //                     html_modal += '<a href="' + value.path_download + '"';
    //                     if (value.file_type.type == '.pdf' || value.file_type.type == '.PDF') {
    //                         html_modal += 'target="_blank"';
    //                     }
    //                     html_modal += '>';
    //                     html_modal += '     <span class="icon">';
    //                     html_modal += '         <img src="' + value.path_icon + '" alt="">';
    //                     html_modal += '     </span>';
    //                     html_modal += value.name + value.file_type.type;
    //                     html_modal += '</a>';
    //                     html_modal += '<br>';

    //                     html_modal += '<span class="info">Type : ';
    //                     html_modal += value.file_type.type;
    //                     html_modal += ' | ';
    //                     html_modal += 'Size : ';
    //                     html_modal += value.file_size;
    //                     html_modal += ' | ';
    //                     html_modal += 'Download : ';
    //                     html_modal += value.download;
    //                     html_modal += '</span>';

    //                     html_modal += '</div>';
    //                 });
    //                 html_modal += '     </div>';
    //             }
    //             // console.log(html_modal);
    //             // return false;
    //             $('#modal-policy .wrapper').html(html_modal);
    //             $('#modal-policy').each(function() {
    //                 $('#modal-policy').modal('show');
    //             });
    //         }
    //     });
    //     return false;
    // });


    // ######################################################################################### End Cookie ##################################################################################################



	 
	 

});

$(document).on('click', '.printer-content', function() {
    html2canvas(document.querySelector("#mainheaderprint")).then(canvas => {
        // $('[name="canvasprint"]').val(canvas.toDataURL());
        Popup(canvas.toDataURL());
    });
});

function Popup(data) {
    var mywindow = window.open("", "new div", "height=500,width=800");
    mywindow.document.write("<html><head><title>Print Content</title>");
    mywindow.document.write("</head><body >");
    mywindow.document.write("<img src=" + data + ">");
    mywindow.document.write("</body></html>");
    mywindow.print();
    mywindow.close();
    return false;
}


$(document).on('click', '.playYoutube', function() {
    var urlYoutube = $(this).data('url');
    var idThis = $(this).data('id');
    // console.log(urlYoutube);
    var html = '';
    html += '<div class=\"iframeYoutube\">';
    html += '<div class=\"cover-bg\">';
    html += '<iframe src=\"' + urlYoutube + '\"  allowfullscreen></iframe>';
    html += '<img src=\"front/template/default/public/image/asset/thumb-vdo.png\" alt="">';
    html += '</div>';
    html += '</div>';
    $('.playYoutube').hide();
    $('#youtube-' + idThis).append(html);

    $('.iframeYoutube iframe').attr('src', $('.iframeYoutube iframe').attr('src') + '?HD=1;autoplay=1;rel=0;showinfo=1;controls=1;');
    // alert($('.iframeYoutube iframe').trigger("click"));


});

$(document).on('click', '.playVideo', function() {
    var urlVideo = $(this).data('file');
    var idThis = $(this).data('id');
    // console.log(urlVideo);
    var html = '';
    html += '<div class=\"myVideo vdo\">';
    html += '<figure class=\"cover-bg\" >';
    html += '<img src=\"front/template/default/public/image/asset/thumb-vdo.png\" alt=\"\">';
    html += '<video id=\"my-video\" class=\"video-js\" controls autoplay preload=\"auto\" poster=\"\" data-setup=\"{}\">';
    html += '<source src=\"' + urlVideo + '\" type=\"video/mp4\">';
    html += '</video>';
    html += '</figure>';
    html += '</div>';


    $('.playVideo').hide();
    $('#video-' + idThis).append(html);
});

$(document).on('click', '.slider-nav', function() {

    $('.iframeYoutube').remove();
    $('.myVideo').remove();
    $('.playYoutube').show();
    $('.playVideo').show();
});

$(".printer-content").click(function() {
    html2canvas(document.querySelector("#mainheaderprin")).then(canvas => {
        // $('[name="canvasprint"]').val(canvas.toDataURL());
        Popup(canvas.toDataURL());
    });
});

function Popup(data) {
    var mywindow = window.open("", "new div", "height=500,width=800");
    mywindow.document.write("<html><head><title>Print Content</title>");
    mywindow.document.write("</head><body >");
    mywindow.document.write("<img src=" + data + ">");
    mywindow.document.write("</body></html>");
    mywindow.print();
    mywindow.close();
    return true;
}

$('#thecomment').ready(function() {
    var checklegnth = $('#thecomment').length;
    if (checklegnth >= 1) {
        var path = $('base').attr("href");
        var mdOn = $('#thecomment').data('md');
        var urlPage = $('#thecomment').data('url');
        var mk = $('#thecomment').data('masterkey');
		var gid = $('#thecomment').data('gid');
        $.ajax({
            url: path + "/comment",
            type: "POST", // type of action POST || GET
            dataType: 'html', // data type
            data: { mdPage: mdOn, urlPage: urlPage, masterkey: mk ,gid: gid}, // post data || get data
            success: function(result) {
                if (result) {
                    $('#thecomment').html(result);
                    // $('.ratepost').rating();
                } else {
                    $('#thecomment').hide();
                }
            },
            error: function(xhr, resp, text) {
                console.log(xhr, resp, text);
            }
        });
    }
});




// modal login member show
$(document).on('click', '#loginModal', function() {
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
$(document).on('click', '.loginMember', function() {
    // alert('test');
    var path = $('base').attr("href");
    var email = $('input[name=member_login_email]').val();
    var password = $('input[name=member_login_password]').val();
    if (email != '' && password != '') {
        var formData = new FormData($("#memberForm")[0]);
        // console.log(formData);
        $.ajax({
            url: path + "member/login-modal",
            type: "POST", // type of action POST || GET
            // dataType: 'json', // data type
            // data: formData,
            // data: {member_login_email: email, member_login_password: password,type:'modal'}, // post data || get data
            xhr: function() {
                var myXhr = $.ajaxSettings.xhr();
                return myXhr;
            },
            success: function(result) {
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
    if (email == '') {
        $('#alertMemberLogin').show();
        $('#alertMemberLogin').html('กรุณากรอกอีเมล์');
    } else if (password == '') {
        $('#alertMemberLogin').show();
        $('#alertMemberLogin').html('กรุณากรอกรหัสผ่าน');
    }


});



// Modal Login Boss Show
$(document).on('click', '#loginBossModal', function() {
    $("#login-boss").modal('show');
    return false;

});
// Submit Login Boss
$(document).on('click', '.loginBoss', function() {
    // $("#login-boss").modal('show');
    // return false;
    var path = $('base').attr("href");
    var username = $('#login-boss input[name=username]').val();
    var password = $('#login-boss input[name=password]').val();
    if (username != '' && password != '') {
        $.ajax({
            url: path + "boss/calendar-login",
            type: "GET", // type of action POST || GET
            dataType: 'json', // data type
            data: { username: username, password: password }, // post data || get data
            xhr: function() {
                var myXhr = $.ajaxSettings.xhr();
                return myXhr;
            },
            success: function(result) {
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
    if (username == '') {
        $('#alertBossLogin').show();
        $('#alertBossLogin').html('กรุณากรอกชื่อผู้ใช้งาน');
    } else if (password == '') {
        $('#alertBossLogin').show();
        $('#alertBossLogin').html('กรุณากรอกรหัสผ่าน');
    }


});


// Modal Login booking Show
//$(document).on('click', '#loginBookingModal', function() {

//    var login = $('#loginBookingModal').attr('data-login');
//    linkdirect = $(this).attr('href');
//    $('input[name=urltogo]').val(linkdirect);

//   if (!login) {
//        $("#login-booking").modal('show');
//        return false;
//    } else {
//        window.location = linkdirect;
//    }

//});
// Submit Login booking
$(document).on('click', '.loginBooking', function() {
    // $("#login-boss").modal('show');
    // return false;
    var path = $('base').attr("href");
    var username = $('#login-booking input[name=username]').val();
    var password = $('#login-booking input[name=password]').val();
    if (username != '' && password != '') {
        var formData = new FormData($("#bookingForm")[0]);
        $.ajax({
            url: path + "booking/login",
            type: "POST", // type of action POST || GET
            // dataType: 'json', // data type
            // data: {username: username, password: password}, // post data || get data
            xhr: function() {
                var myXhr = $.ajaxSettings.xhr();
                return myXhr;
            },
            success: function(result) {
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
    if (username == '') {
        $('#alertBookingLogin').show();
        $('#alertBookingLogin').html('กรุณากรอกชื่อผู้ใช้งาน');
    } else if (password == '') {
        $('#alertBookingLogin').show();
        $('#alertBookingLogin').html('กรุณากรอกรหัสผ่าน');
    }


});

$(document).on('click', '.loginSubmitBooking', function() {
    // $("#login-boss").modal('show');
    // return false;
    var path = $('base').attr("href");
    var username = $('#login-booking-page input[name=username]').val();
    var password = $('#login-booking-page input[name=password]').val();
    if (username != '' && password != '') {
        var formData = new FormData($("#login-booking-page")[0]);
        $.ajax({
            url: path + "booking/login",
            type: "POST", // type of action POST || GET
            // dataType: 'json', // data type
            // data: {username: username, password: password}, // post data || get data
            xhr: function() {
                var myXhr = $.ajaxSettings.xhr();
                return myXhr;
            },
            success: function(result) {
                // console.log(result);
                if (result['success']) {
                    window.location = result['success'];
                    //$("#login-booking").modal('hide');
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
    //if (username == '') {
    //    $('#alertBookingLogin').show();
    //    $('#alertBookingLogin').html('กรุณากรอกชื่อผู้ใช้งาน');
    //} else if (password == '') {
    //    $('#alertBookingLogin').show();
    //    $('#alertBookingLogin').html('กรุณากรอกรหัสผ่าน');
    //}


});



$(document).on('click', '.loginSubmitBookingCar', function() {
    // $("#login-boss").modal('show');
    // return false;
    var path = $('base').attr("href");
    var username = $('#login-bookingcar-page input[name=username]').val();
    var password = $('#login-bookingcar-page input[name=password]').val();
    if (username != '' && password != '') {
        var formData = new FormData($("#login-bookingcar-page")[0]);
        $.ajax({
            url: path + "bookingCar/login",
            type: "POST", // type of action POST || GET
            // dataType: 'json', // data type
            // data: {username: username, password: password}, // post data || get data
            xhr: function() {
                var myXhr = $.ajaxSettings.xhr();
                return myXhr;
            },
            success: function(result) {
                // console.log(result);
                if (result['success']) {
                    window.location = result['success'];
                    //$("#login-booking").modal('hide');
                    // $('#thecomment').html(result);
                    // $('.ratepost').rating();
                } else {
                    $('#alertBookingLogin').show();
                    $('#alertBookingLogin').html('การลงชื่อเข้าใช้ล้มเหลวอาจเกิดจาก ชื่อผู้ใช้ หรือ รหัสผ่าน ผิดพลาด');
                }
            },
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json'
        });


    }
    //if (username == '') {
    //    $('#alertBookingLogin').show();
    //    $('#alertBookingLogin').html('กรุณากรอกชื่อผู้ใช้งาน');
    //} else if (password == '') {
    //    $('#alertBookingLogin').show();
    //    $('#alertBookingLogin').html('กรุณากรอกรหัสผ่าน');
    //}


});


$(document).on('click', '.loginSubmitBoss', function() {
    // $("#login-boss").modal('show');
    // return false;
    var path = $('base').attr("href");
    var username = $('#login-boss-page input[name=username]').val();
    var password = $('#login-boss-page input[name=password]').val();
    if (username != '' && password != '') {
        var formData = new FormData($("#login-boss-page")[0]);
        $.ajax({
            url: path + "boss/calendar-login",
            type: "POST", // type of action POST || GET
            // dataType: 'json', // data type
            // data: {username: username, password: password}, // post data || get data
            xhr: function() {
                var myXhr = $.ajaxSettings.xhr();
                return myXhr;
            },
            success: function(result) {
                // console.log(result);
                if (result['success']) {
                    window.location = result['success'];
                    //$("#login-booking").modal('hide');
                    // $('#thecomment').html(result);
                    // $('.ratepost').rating();
                } else {
                    $('#alertBookingLogin').show();
                    $('#alertBookingLogin').html('การลงชื่อเข้าใช้ล้มเหลวอาจเกิดจาก ชื่อผู้ใช้ หรือ รหัสผ่าน ผิดพลาด');
                }
            },
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json'
        });


    }
    //if (username == '') {
    //    $('#alertBookingLogin').show();
    //    $('#alertBookingLogin').html('กรุณากรอกชื่อผู้ใช้งาน');
    //} else if (password == '') {
    //    $('#alertBookingLogin').show();
    //    $('#alertBookingLogin').html('กรุณากรอกรหัสผ่าน');
    //}


});


$(document).on('click', '.loginSubmitReportAll', function() {
    // $("#login-boss").modal('show');
    // return false;
    var path = $('base').attr("href");
    var username = $('#login-report-all input[name=username]').val();
    var password = $('#login-report-all input[name=password]').val();
    if (username != '' && password != '') {
        var formData = new FormData($("#login-report-all")[0]);
        $.ajax({
            url: path + "booking/login",
            type: "POST", // type of action POST || GET
            // dataType: 'json', // data type
            // data: {username: username, password: password}, // post data || get data
            xhr: function() {
                var myXhr = $.ajaxSettings.xhr();
                return myXhr;
            },
            success: function(result) {
                // console.log(result);
                if (result['success']) {
                    window.location = result['success'];
                    //$("#login-booking").modal('hide');
                    // $('#thecomment').html(result);
                    // $('.ratepost').rating();
                } else {
                    $('#alertBookingLogin').show();
                    $('#alertBookingLogin').html('การลงชื่อเข้าใช้ล้มเหลวอาจเกิดจาก ชื่อผู้ใช้ หรือ รหัสผ่าน ผิดพลาด');
                }
            },
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json'
        });


    }
    //if (username == '') {
    //    $('#alertBookingLogin').show();
    //    $('#alertBookingLogin').html('กรุณากรอกชื่อผู้ใช้งาน');
    //} else if (password == '') {
    //    $('#alertBookingLogin').show();
    //    $('#alertBookingLogin').html('กรุณากรอกรหัสผ่าน');
    //}


});

$(document).on('click',"#loginBoard",function(){
	
	        var login = $('#loginBoard').attr('data-login');
			var url_login = $('#loginBoard').attr('data-urllogin');
			linkdirect = $(this).attr('href');
			$('input[name=urltogo]').val(linkdirect);

			if (login != 0) {
				window.location = linkdirect;
				return false;
			} else {
				window.location = url_login;
				return false;
			}
	
});



$(document).on('click', '.loginSubmitBoard', function() {
    // $("#login-boss").modal('show');
    // return false;
    var path = $('base').attr("href");
    var username = $('#login-board-page input[name=member_login_email]').val();
    var password = $('#login-board-page input[name=member_login_password]').val();
    if (username != '' && password != '') {
        var formData = new FormData($("#login-board-page")[0]);
        $.ajax({
            url: path + "member/login-modal",
            type: "POST", // type of action POST || GET
            // dataType: 'json', // data type
            // data: {username: username, password: password}, // post data || get data
            xhr: function() {
                var myXhr = $.ajaxSettings.xhr();
                return myXhr;
            },
            success: function(result) {
                // console.log(result);
                if (result['success']) {
                    window.location = result['success'];
                    //$("#login-booking").modal('hide');
                    // $('#thecomment').html(result);
                    // $('.ratepost').rating();
                } else {
                    $('#alertBookingLogin').show();
                    $('#alertBookingLogin').html('การลงชื่อเข้าใช้ล้มเหลวอาจเกิดจาก อีเมล์ หรือ รหัสผ่าน ผิดพลาด');
                }
            },
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json'
        });


    }
    //if (username == '') {
    //    $('#alertBookingLogin').show();
    //    $('#alertBookingLogin').html('กรุณากรอกชื่อผู้ใช้งาน');
    //} else if (password == '') {
    //    $('#alertBookingLogin').show();
    //    $('#alertBookingLogin').html('กรุณากรอกรหัสผ่าน');
    //}


});

var modalConfirm = function(callback) {
    var linkdirect = null,
        baseurl = $('base').attr("href");
    $(document).on('click', "#modal-btn-nologin", function() {
        linkdirect = $(this).attr('href');
        // var linkdirect = path + "information/intranet";
        callback(true, linkdirect);
        $("#login-report").modal('hide');
    });
};



$('.datepickerMember').datepicker({
    dateFormat: 'dd-mm-yy',
    showOn: 'focus',
    buttonImage: '../img/calendar/calendar.gif',
    buttonImageOnly: true,
    dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
    monthNamesShort: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
    changeMonth: true,
    changeYear: true,
    yearRange: '1950:2018',
    beforeShow: function() {
        dateBefore = null;
        if (jQuery(this).val() != "") {
            var arrayDate = jQuery(this).val().split("-");
            arrayDate[2] = parseInt(arrayDate[2]) - 543;
            jQuery(this).val(arrayDate[0] + "-" + arrayDate[1] + "-" + arrayDate[2]);
        }
        setTimeout(function() {
            $.each(jQuery(".ui-datepicker-year option"), function(j, k) {
                var textYear = parseInt(jQuery(".ui-datepicker-year option").eq(j).val()) + 543;
                jQuery(".ui-datepicker-year option").eq(j).text(textYear);
            });
        }, 50);

    },
    onSubmit: function() {
        alert("test");
    },
    onChangeMonthYear: function() {
        setTimeout(function() {
            $.each(jQuery(".ui-datepicker-year option"), function(j, k) {
                var textYear = parseInt(jQuery(".ui-datepicker-year option").eq(j).val()) + 543;
                jQuery(".ui-datepicker-year option").eq(j).text(textYear);
            });
        }, 50);
    },
    onClose: function() {
        if (dateBefore == null) {
            dateBefore = jQuery(this).val();
        }

        if (jQuery(this).val() != "" && jQuery(this).val() == dateBefore) {
            var arrayDate = dateBefore.split("-");
            arrayDate[2] = parseInt(arrayDate[2]) + 543;
            jQuery(this).val(arrayDate[0] + "-" + arrayDate[1] + "-" + arrayDate[2]);

        }
    },
    onSelect: function(dateText, inst) {
        dateBefore = jQuery(this).val();
        var arrayDate = dateText.split("-");
        arrayDate[2] = parseInt(arrayDate[2]) + 543;
        jQuery(this).val(arrayDate[0] + "-" + arrayDate[1] + "-" + arrayDate[2]);
    }
});




$(".clickRadioEnews").click(function() {
    var value = $(this).attr('data-radio');
    if (value == 1) {
        document.getElementById('formEnews').style.display = 'block';
        document.getElementById('formEnewsTel').style.display = 'block';

        document.getElementById("subFname").disabled = false;
        document.getElementById("subFname").required = true;

        document.getElementById("subLname").disabled = false;
        document.getElementById("subLname").required = true;


    } else {
        document.getElementById('formEnews').style.display = 'none';
        document.getElementById('formEnewsTel').style.display = 'none';

        document.getElementById("subFname").disabled = true;
        document.getElementById("subFname").required = false;

        document.getElementById("subLname").disabled = true;
        document.getElementById("subLname").required = false;

    }
});


// Modal Policy
// $(document).on('click', '.clickPolicy', function() {

//     var path = $('base').attr("href");
//     var urlPolicy = $(this).data('url');
//     var idPolicy = $(this).data('id');

//     policyModalShow(path, urlPolicy, idPolicy);

// });

// $('#modal-policy').on('hidden.bs.modal', function() {
//     $('#modal-policy').html('');
// });

function policyModalShow(pathPo, urlPo, idPo){
    $.ajax({
        url: pathPo + urlPo + '/' + idPo,
        success: function(data) {
            $('#modal-policy').html(data);
            $('#modal-policy').each(function() {
                $('#modal-policy').modal('show');
            });
        }
    });

    return false;
}

// New Modal Policy
// $(document).on('click', '.clickPolicy', function() {
//     var path = $('base').attr("href");
//     var urlPolicy = $(this).data('url');
//     var idPolicy = $(this).data('page');
//     $.ajax({
//         url: 'https://pdpa.dmcr.go.th/' + urlPolicy + '/km?page=' + idPolicy,
//         success: function(data) {
//             // console.log(data);
//             $('#modal-policy .wrapper').html(data);
//             $('#modal-policy').each(function() {
//                 $('#modal-policy').modal('show');

//             });
//         }
//     });
//     return false;
// });



$(document).ready(function() {

    


    $('[data-fancybox^="popup"]').fancybox({
      animationEffect   : "fade",
      animationDuration : 300,
      margin : 0,
      gutter : 0,
      touch  : {
        vertical: false
      },
	  slideShow: {
        autoStart: true,
        speed: 5000
      },
	  loop: true,
      baseTpl   :
      '<div class="fancybox-container" role="dialog" tabindex="-1">' +
      '<div class="fancybox-bg"></div>' +
      '<div class="fancybox-inner">' +
      '<div class="fancybox-stage"></div>' +
      '<div class="fancybox-form-wrap">' +
      '<button data-fancybox-close class="fancybox-button fancybox-button--close" title="{{CLOSE}}">' +
      '<svg viewBox="0 0 40 40">' +
      '<path d="M10,10 L30,30 M30,10 L10,30" />' +
      '</svg>' +
      '</button></div>' +
      '</div>' +
      '</div>',

      onInit: function(instance) {
        var list = '', 
            $bullets;
        
        for ( var i = 0; i < instance.group.length; i++ ) {
          list += '<li><a data-index="' + i + '" href="javascript:;"><span>' + ( i + 1 ) + '</span></a></li>';
        }

        $bullets = $( '<ul class="popup-bullets">' + list + '</ul>' ).on('click touchstart', 'a', function() {
          var index = $(this).data('index');

          $.fancybox.getInstance(function() {
            this.jumpTo( index );
          });

        });
        
        instance.$refs.bullets = $bullets.appendTo( instance.$refs.stage );

      },
      beforeShow : function( instance ) {
        instance.$refs.stage.find('ul:first')
          .children()
          .removeClass('active')
          .eq( instance.currIndex )
          .addClass('active');

      },
      afterClose: function(instance, current) {
        instance.$refs.form.appendTo( current.opts.$orig.parent() );
      }
    }).eq(0).trigger('click');



  }); 


