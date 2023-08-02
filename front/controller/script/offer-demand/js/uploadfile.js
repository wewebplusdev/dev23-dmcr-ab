function ajaxFileUploadDoc(Rand,idAns, el) {
    var urlgo = $("base").attr("href");
    var myRand = Rand;
    var valuefilename = jQuery("input#inputFileUpload-"+idAns).val();
    var file = jQuery("input#inputFileUpload-"+idAns).val();
    var mk = $("input[name='msKey']").val();
    var data_class = $(el).data('class');

    // check input ของปัจจุบัน
    var count = 0;
    var input = $('.'+data_class+'-temp');
    input.each(function() {
        count++;
    });
    // ถ้ามีตัวเดียวใช้ 0
    // if(count == 1 && $('.form-form-att.'+data_class+' input[name="inputAns['+idAns+'][]"]').eq(0).val() == ''){
    //     count--;
    // }
    var url = urlgo + 'offer-demand/insertfile?myID=' + myRand + '&masterkey=' + mk + '&idAns=' + idAns + '&count=' + count + '&class=' + data_class;
// alert(data_count);
//    for (var i = 0; i <= fi.files.length - 1; i++) {
    $("#boxFileNew-"+idAns).append('<div class="loadding"><span class="fa fa-circle-o-notch fa-spin"></span></div>').show();
    jQuery.ajaxFileUpload({
        url: url,
        secureuri: true,
        fileElementId: 'inputFileUpload-'+idAns,
        dataType: 'json',
        success: function (data) {
			console.log(data);
            $("#boxFileNew-"+idAns+" .loadding").remove();
            if (typeof (data.error) != 'undefined') {
                if (data.error != '') {
                    //$("#boxFileNew").remove("loadding");
                    alert(data.error);
                } else {
                    //   jQuery("#boxFileNew").show();
                    $("#boxFileNew-"+idAns).html(data.msg);
                    // $('.file-class').append('<input type="hidden" name="inputAns['+idAns+'][]" value="'+data.namefile+'">');
                    // ถ้า input แรกไม่มีค่าเพิ่มค่าให้และ ถ้ามี new input ใหม่ทันที
                    if ($('.form-form-att.'+data_class+' input[name="inputAns['+idAns+'][]"]').eq(0).val() != '') {
                        $('.form-form-att.'+data_class+'').append('<input type="hidden" name="inputAns['+idAns+'][]" class="'+data_class+'-temp '+data_class+'-input" data-item="" value="'+data.namefile+'">');
                    }else{
                        $('.form-form-att.'+data_class+' input[name="inputAns['+idAns+'][]"]').eq(0).val(data.namefile);
                    }
                    $('.form-form-att input[name="inputFileUpload-'+idAns+'"]').val(null);
                    count = 0;
                    // check input ใหม่และเพิ่ม class ลำดับอีกรอบ
                    var input_after = $('.'+data_class+'-temp');
                    input_after.each(function() {
                        $(this).data('item',count)
                        $(this).removeClass();
                        $(this).addClass(data_class+'-temp');
                        $(this).addClass(data_class+'-input');
                        $(this).addClass(''+count+'');
                        console.log(this);
                        count++;
                        console.log(count);
                    });
                }

            }

        },
        error: function (data, status, e) {
//            console.log(e);
        }
    }
    );
//    }
    return false;
}

function delFileUpload(idAns, count, el) {
    // var iddel = id;
    // var myRand = Rand;
    // var inputFile = $('#inputAns-'+idAns).val();
    var class_name = $(el).data('class');
    var myArray = class_name.split(" ");
    var inputFile = $('.'+myArray[0]+'.'+myArray[1]).val();
    // alert(inputFile);
    // return false;
    var urlgo = $("base").attr("href");
    var url = urlgo + 'offer-demand/deletefile?filename=' + inputFile;
    //console.log(url);
    $("#boxFileNew-"+idAns).append('<div class="loadding"><span class="fa fa-circle-o-notch fa-spin"></span></div>').show();
    var URL = url;
    jQuery.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        success: function (data, status) {
            // $("#boxFileNew .loadding").remove();
            $("#boxFileNew-"+idAns+" .loadding").remove();
           
            jQuery("#boxFileNew-"+idAns).show();
            // jQuery("#boxFileNew-"+idAns).html('');
            // $('input[name="inputAns['+idAns+']').val("").trigger("focusout");
            $('.'+myArray[0]+'.'+myArray[1]+'.tempfile').remove();
            if(myArray[1] != 0){ // input มากกว่า 1
                $('.'+myArray[0]+'.'+myArray[1]).remove();
            }else{
                $('.'+myArray[0]+'.'+myArray[1]).val("").trigger("focusout");
            }
            $('input[name="inputFileUpload-'+idAns+'"]').val(null).trigger("focusout");
            // $('#demand-form').validate();
            // setTimeout(jQuery.unblockUI, 200);
        },
        error: function () {
            console.log("error");
        }
    });

    return false;
}
