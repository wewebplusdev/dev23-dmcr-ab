// ############################## Start Multiple upload file ###################################

$(document).ready(function() {
    let urlgo = $("base").attr("href");
    let file = jQuery("input#inputFileUpload").val();
    let mk = $("input[name='msKey']").val();
    let myRand = $("input[name='randid']").val();

    // //    let lang = 'Thai';
    let url = urlgo + 'offer-demand/upload-file-multiple?type=file&masterkey=' + mk + '&myID=' + myRand;
    let url_to_show_file = urlgo + 'offer-demand/upload-show-file?masterkey=' + mk + '&myID=' + myRand;

    var vajSelectFile = 0;
      var valUploadFile = 0;
      var settings = {
        url: url,
        dragDrop: false,
        fileName: "myfile",
        allowedTypes: "jpeg,jpg,png,pdf,docx,doc,xlsx,xls,mp4,m4a",
        returnType: "json",
        onSelect: function(files) {
            vajSelectFile = files.length;
            $("#boxFileNew").append('<div class="loadding" style="position: absolute; top: 28%;left: 50%; transform: translate(-50%, -50%);pointer-events: none; color:#0058c6; opacity:0.7;font-size: 22px;"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i></div>');
        },

        onSuccess: function(files, data, xhr) {
          valUploadFile = valUploadFile + 1;
          if (vajSelectFile == valUploadFile) {
            loadShowfileUpdate(url_to_show_file, 'boxFileNew');
            // alert('goooo');
            valUploadFile = 0;
          }
          $("#boxFileNew .loadding").remove();
        },
        showStatusAfterSuccess: false,
        showAbort: false,
        showDone: false,
        showDelete: false,
        deleteCallback: function(data, pd) {
          for (var i = 0; i < data.length; i++) {

            $.post("delete.php", {
                op: "delete",
                name: data[i]
              },
              function(resp, textStatus, jqXHR) {

                //Show Message
                jQuery("#status").append("<div>File Deleted</div>");
              });

          }
          pd.statusbar.hide(); //You choice to hide/not.

        }
      }
      var uploadObj = jQuery("#mulitplefileuploader").uploadFile(settings);
});

function loadShowfileUpdate(fileAc, boxLoad) {

    // jQuery.blockUI({
    //     message: jQuery('#tallContent'),
    //     css: {
    //         border: 'none',
    //         padding: '35px',
    //         backgroundColor: '#000',
    //         '-webkit-border-radius': '10px',
    //         '-moz-border-radius': '10px',
    //         opacity: .9,
    //         color: '#fff'
    //     }
    // });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();
    // alert(dataSet);
    // alert(URL);
    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            // alert(html);
            jQuery("#" + boxLoad).show();
            jQuery("#" + boxLoad).html(html);

            // setTimeout(jQuery.unblockUI, 200);

        }
    });
}

function delFileUpload_multiple(iddel2, ele) {
    let iddel = iddel2;
    let newRand = $(ele).data('rand');
    // let myRand = Randdel;
    let urlgo = $("base").attr("href");
    let url = urlgo + 'offer-demand/delfile-upload-multiple?type=delFile&valDelFile=' + iddel + '&valEditID=' + newRand;

    // console.log(newRand);
    // return false;
    // $("#boxFileNew").append('<div class="loadding"><span class="fa fa-circle-o-notch fa-spin"></span></div>').show();
    $("#boxFileNew").append('<div class="loadding" style="position: absolute; top: 28%;left: 50%; transform: translate(-50%, -50%);pointer-events: none; color:#0058c6; opacity:0.7;font-size: 22px;"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i></div>');

    var URL = url;
    jQuery.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        success: function(data, status) {
            $("#boxFileNew .loadding").remove();
            jQuery("#boxFileNew").show();
            jQuery("#boxFileNew").html(data.msg);
            $("input[name='fileupload']").val(data.namefile).trigger("focusout");
            $("input[name='inputFileUpload']").val("").trigger("focusout");
            // setTimeout(jQuery.unblockUI, 200);
        },
        error: function() {
            console.log("error");
        }
    });
    return false;
}


// ############################## End Multiple upload file ###################################


$("#btn-fileupload").click(function() {
    $("#inputFileUpload").trigger("click");
});

function ajaxFileUploadDoc(Rand) {

    var urlgo = $("base").attr("href");
    var myRand = Rand;
    var file = jQuery("input#inputFileUpload").val();
    var mk = $("input[name='msKey']").val();

    // //    var lang = 'Thai';
    var url = urlgo + 'offer-demand/upload-file?type=file&myID=' + myRand + '&masterkey=' + mk;
    // // $("#boxFileNew").append('<div class="loadding"><span class="fa fa-circle-o-notch fa-spin"></span></div>').show();
    $("#boxFileNew").append('<div class="loadding" style="position: absolute; top: 0%;left: 20%; transform: translate(-50%, -50%);pointer-events: none; color:#0058c6; opacity:0.7;font-size: 14px;height: 78px;"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i></div>');

    jQuery.ajaxFileUpload({
        url: url,
        secureuri: true,
        fileElementId: 'inputFileUpload',
        dataType: 'json',
        success: function(data, status) {
            console.log(data);

            $("#boxFileNew .loadding").remove();
            if (typeof(data.error) != 'undefined') {

                if (data.error != '') {
                    //$("#boxFileNew").remove("loadding");
                    alert(data.error);
                } else {
                    //   jQuery("#boxFileNew").show();
                    $("#boxFileNew").html(data.msg);
                    // $(".career-form-att input[name='fileupload']").val(data.namefile);
                    $("input[name='inputFileUpload']").val("");
                }

            }

        },
        error: function(data, status, e) {
            console.log(e);
        }
    });
    return false;
}

function delFileUpload(id, Rand) {
    var iddel = id;
    var myRand = Rand;
    var urlgo = $("base").attr("href");
    var url = urlgo + 'offer-demand/delfile-upload?type=delFile&valDelFile=' + iddel + '&valEditID=' + myRand;
    //console.log(url);
    // $("#boxFileNew").append('<div class="loadding"><span class="fa fa-circle-o-notch fa-spin"></span></div>').show();
    $("#boxFileNew").append('<div class="loadding" style="position: absolute; top: 28%;left: 50%; transform: translate(-50%, -50%);pointer-events: none; color:#0058c6; opacity:0.7;font-size: 22px;"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i></div>');

    var URL = url;
    jQuery.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        success: function(data, status) {
            $("#boxFileNew .loadding").remove();
            console.log(data);
            jQuery("#boxFileNew").show();
            jQuery("#boxFileNew").html(data.msg);
            $("input[name='fileupload']").val(data.namefile).trigger("focusout");
            $("input[name='inputFileUpload']").val("").trigger("focusout");
            // setTimeout(jQuery.unblockUI, 200);
        },
        error: function() {
            console.log("error");
        }
    });
    return false;
}



function ajaxFileUploadDocModal(Rand) {

    var urlgo = $("base").attr("href");
    var myRand = Rand;
    var file = jQuery("input#inputFileUpload").val();
    var mk = $("input[name='msKey']").val();

    // //    var lang = 'Thai';
    var url = urlgo + 'offer-demand/upload-file?type=file&myID=' + myRand + '&masterkey=' + mk;
    // // $("#boxFileNew").append('<div class="loadding"><span class="fa fa-circle-o-notch fa-spin"></span></div>').show();
    $("#boxFileNew").append('<div class="loadding" style="position: absolute; top: 0%;left: 20%; transform: translate(-50%, -50%);pointer-events: none; color:#0058c6; opacity:0.7;font-size: 14px;height: 78px;"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i></div>');

    jQuery.ajaxFileUpload({
        url: url,
        secureuri: true,
        fileElementId: 'inputFileUpload',
        dataType: 'json',
        success: function(data, status) {
            console.log(data);

            $("#boxFileNew .loadding").remove();
            if (typeof(data.error) != 'undefined') {

                if (data.error != '') {
                    //$("#boxFileNew").remove("loadding");
                    alert(data.error);
                } else {
                    //   jQuery("#boxFileNew").show();
                    $("#boxFileNew").html(data.msg);
                    // $(".career-form-att input[name='fileupload']").val(data.namefile);
                    $("input[name='inputFileUpload']").val("");
                }

            }

        },
        error: function(data, status, e) {
            console.log(e);
        }
    });
    return false;
}

// function delFileUploadModal(id, Rand) {
//     var iddel = id;
//     var myRand = Rand;
//     var urlgo = $("base").attr("href");
//     var url = urlgo + 'offer-demand/delfile-upload?type=delFile&valDelFile=' + iddel + '&valEditID=' + myRand;
//     //console.log(url);
//     // $("#boxFileNew").append('<div class="loadding"><span class="fa fa-circle-o-notch fa-spin"></span></div>').show();
//     $("#boxFileNew").append('<div class="loadding" style="position: absolute; top: 28%;left: 50%; transform: translate(-50%, -50%);pointer-events: none; color:#0058c6; opacity:0.7;font-size: 22px;"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i></div>');

//     var URL = url;
//     jQuery.ajax({
//         url: url,
//         type: 'POST',
//         dataType: 'json',
//         success: function(data, status) {
//             $("#boxFileNew .loadding").remove();
//             console.log(data);
//             jQuery("#boxFileNew").show();
//             jQuery("#boxFileNew").html(data.msg);
//             $("input[name='fileupload']").val(data.namefile).trigger("focusout");
//             $("input[name='inputFileUpload']").val("").trigger("focusout");
//             // setTimeout(jQuery.unblockUI, 200);
//         },
//         error: function() {
//             console.log("error");
//         }
//     });
//     return false;
// }