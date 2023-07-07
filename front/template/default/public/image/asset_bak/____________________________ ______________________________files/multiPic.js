

function myFunction(){
  var datafileupload = new FormData();

  var path = $("base").attr("href");
    var x = document.getElementById("myFile");

       var key = $("input[name=masterkey_wb]").val();
       var id_mem = $("input[name=idProfile]").val();


    console.log(x);
    var txt = "";

    var checkFileupload = $(document).find('.uploadTxt-close').length;
  //  alert(checkFileupload);
    var filelimitup = 4;
    var startfile = filelimitup - x.files.length;

    if ('files' in x) {
        if (x.files.length == 0) {

        } else if(x.files.length <= (filelimitup - checkFileupload)) {

            for (var i = 0; i < x.files.length; i++) {
            txt = "";
              console.log(x.files[i]);
                var file = x.files[i];

             var ext = file.name.split('.').pop().toLowerCase();
             switch(ext){
                case 'gif': case 'jpg': case 'jpeg':
                if ('name' in file) {
                    txt = " <div> <div class='uploadTxt-close' data-id='"+(startfile+i)+"' style='margin-top: 0px !important; margin-right: 5px !important; '><i class='fa fa-close'></i></div>    " + file.name + "";
                }
                if ('size' in file) {
                    txt += " Size : " + file.size + " bytes </div><br>";
                }
                  $("#uploadTxt").append(txt).on('click',function(){
                    alert("test");
                  });

                  datafileupload.append('file-'+(startfile+i), file);



                break;

                default:
                  alert("กรุณาอัพโหลดเฉพาะไฟล์ .jpg และ .gif เท่านั้น");
                break;
              }


            }

            // $.ajax({
            //     url: path + "member/customer/upload-img?type=add&key=" + key +"&idmem=" + id_mem,
            //     type: 'POST',
            //     xhr: function () {
            //         var myXhr = $.ajaxSettings.xhr();
            //         return myXhr;
            //     },
            //     data: data,
            //     cache: false,
            //     contentType: false,
            //     processData: false,
            //     dataType: 'json',
            //     success: function (data) {
            //       console.log(data);
            //     }
            //   });


            $('#uploadTxt').show();
            $('.upload-wrapper').show();
        }else {
          alert('สามารถอัพโหลดได้ไม่เกิน 4 ภาพเท่านั้น');
        }
    }
  //  document.getElementById("uploadTxt").innerHTML = txt;
}



// $(document).ready(function () {
//     $('.uploadPicMul').click(function () {
//         $("input[name='uploadImgBoard']").trigger("click");
//     });
//
//   // var html = [];
//    // var html = '';
// $("input[name='uploadImgBoard']").change(function (e) {
//
//   e.preventDefault();
//   var path = $("base").attr("href");
//   var key = $("input[name=masterkey_wb]").val();
//   var id_mem = $("input[name=idProfile]").val();
//
//   var formData = new FormData($("#boardform")[0]);
//   // console.log($("#myFile"));
//   var names = [];
//
//   // if ($("#myFile")[0].files.length < 5) {
//     $(".uploadPicMul").append('<div class="loadding" style="position: absolute; top: 50%;left: 80%; transform: translate(-50%, -50%);pointer-events: none; color:#0058c6; opacity:0.7;font-size: 10px;"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i></div>');
//     // for (var i = 0; i < $('#myFile')[0].files.length; i++) {
//             // names.push($('#myFile').get(0).files[i].name);
//             // console.log($('#myFile').get(0).files[i].name);
//             // console.log(names);
//            var ext = $('#myFile').val().split('.').pop().toLowerCase();
//            console.log(ext);
//            switch(ext){
//                case 'gif': case 'jpg': case 'jpeg':
//                    // console.log('file : '+$('#myFile')[0].files[i].name);
//                    $.ajax({
//                        url: path + "member/customer/upload-img?type=add&key=" + key +"&idmem=" + id_mem,
//                        type: 'POST',
//                        xhr: function () {
//                            var myXhr = $.ajaxSettings.xhr();
//                            return myXhr;
//                        },
//                        success: function (data) {
//                            console.log("Data Uploaded: " + data);
//                            $(".uploadPicMul .loadding").delay(600).fadeOut("fast", function () {
//
//                              // $.each(data, function (index, element) {
//                                 // console.log(element);
//
//                                     var html = '';
//                                       //   html += '<figure style="background-image: url(' + element.real + ');"></figure><br/>';
//                                       // $("#uploadTxt").append('<figure style="background-image: url(' + element.real + ');"></figure><br/>');
//                                       // $('#uploadTxt').show();
//                                       html = '<div class="upload-file-txt">'+data['name']+'</div><div class="uploadTxt-close"><i class="fa fa-close"></i></div> <br/>';
//
//                                       // html.push('<figure style="background-image: url(' + element.real + ');"></figure>');
//                                      // $("#uploadTxt").attr("style", 'background-image: url(' + element.real + '); cursor:pointer;');
//                                      // $(".showProfile .cover-bg img").attr("src", element.real);
//                                      // $(".thumb").addClass('has-profile');
//
//                                      // $("input[name='picProfile']").val(element.name);
//
//                              // });
//                              console.log(html);
//                              $('.upload-wrapper').show();
//                              $(".upload-wrapper").append(html);
//                       });
//
//                            // console.log(html);
//                           // $("#uploadTxt").append(html);
//                            // $.each(data, function (index, element) {
//                            //    // console.log(element);
//                            //
//                            //     $(".showProfile .loadding").delay(600).fadeOut("fast", function () {
//                            //
//                            //         $(".showProfile .cover-bg").attr("style", 'background-image: url(' + element.real + '); cursor:pointer;');
//                            //         // $(".showProfile .cover-bg img").attr("src", element.real);
//                            //         $(".thumb").addClass('has-profile');
//                            //         $("input[name='picProfile']").val(element.name);
//                            //     });
//                            //
//                            // });
//
//
//
//                        },
//                        data: formData,
//                        cache: false,
//                        contentType: false,
//                        processData: false,
//                        dataType: 'json'
//                    });
//                    return false;
//
//                    break;
//                default:
//                    alert("กรุณาอัพโหลดเฉพาะไฟล์ .jpg และ .gif เท่านั้น");
//                    break;
//            }
//         // }
//     // }else {
//     //   alert("สามารถอัพโหลดได้ไม่เกิน 4 ภาพเท่านั้น");
//     // }
//
//
//
// });
//
//
// });
