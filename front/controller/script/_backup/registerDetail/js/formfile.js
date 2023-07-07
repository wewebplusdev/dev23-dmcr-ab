$(".form-group .btn.btn-file").click(function () {
    var id = $(this).data('id');
    $("#inputFileUpload-"+id).trigger("click");
});


function ajaxFileUploadDoc(Rand,idAns) {
    var urlgo = $("base").attr("href");
    var myRand = Rand;
    var valuefilename = jQuery("input#inputFileUpload-"+idAns).val();
    var file = jQuery("input#inputFileUpload-"+idAns).val();
    var mk = $("input[name='msKey']").val();
    
//    var fi = document.getElementById('inputFileUpload');
//    alert(fi.files.length);
//    var lang = 'Thai';
    var url = urlgo + 'formDetail/uploadFile?myID=' + myRand + '&masterkey=' + mk + '&idAns=' + idAns;
// alert(url);
//    for (var i = 0; i <= fi.files.length - 1; i++) {
    $("#boxFileNew-"+idAns).append('<div class="loadding"><span class="fa fa-circle-o-notch fa-spin"></span></div>').show();
    jQuery.ajaxFileUpload({
        url: url,
        secureuri: true,
        fileElementId: 'inputFileUpload-'+idAns,
        dataType: 'json',
        success: function (data, status) {
			//console.log(idAns);
            $("#boxFileNew-"+idAns+" .loadding").remove();
            if (typeof (data.error) != 'undefined') {
                if (data.error != '') {
                    //$("#boxFileNew").remove("loadding");
                    alert(data.error);
                } else {
                    //   jQuery("#boxFileNew").show();
                    $("#boxFileNew-"+idAns).html(data.msg);
                    $('.form-form-att input[name="inputAns['+idAns+']"]').val(data.namefile);
                    $('.form-form-att input[name="inputFileUpload-'+idAns+'"]').val(null);
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

function delFileUpload(idAns) {
    // var iddel = id;
    // var myRand = Rand;
    var inputFile = $('#inputAns-'+idAns).val();
    console.log(inputFile);
    var urlgo = $("base").attr("href");
    var url = urlgo + 'formDetail/delFile?filename=' + inputFile;
    //console.log(url);
    $("#boxFileNew-"+idAns).append('<div class="loadding"><span class="fa fa-circle-o-notch fa-spin"></span></div>').show();
    var URL = url;
    jQuery.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        success: function (data, status) {
            $("#boxFileNew .loadding").remove();
           
            jQuery("#boxFileNew-"+idAns).show();
            jQuery("#boxFileNew-"+idAns).html('');
            $('input[name="inputAns['+idAns+']').val("").trigger("focusout");
            $('input[name="inputFileUpload-'+idAns+'"]').val(null).trigger("focusout");
            $('#myFormQuse_form').validate();
            // setTimeout(jQuery.unblockUI, 200);
        },
        error: function () {
            console.log("error");
        }
    });

    return false;
}
