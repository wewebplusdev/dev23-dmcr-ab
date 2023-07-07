$(document).ready(function () {
    var path = $("base").attr("href");
    var roxyFileman = 'fileman_front/index.html';
    var elementInput = CKEDITOR.replace('descript', {

        filebrowserUploadUrl: "/dmcr/ckeditor/ckupload.php",
        filebrowserBrowseUrl: roxyFileman,
        filebrowserImageBrowseUrl: roxyFileman + '?type=image',
        extraPlugins: 'tableresize,tabletools,quicktable',
        removeDialogTabs: 'link:upload;image:upload',

        allowedContent: true,
        toolbar: [
            {name: 'basicstyles',
                groups: ['basicstyles', 'cleanup'],
                items: ['Bold', 'Italic', 'Underline']
            },
            {name: 'paragraph',
                items: ['NumberedList', 'BulletedList',
                    'JustifyLeft', 'JustifyCenter',
                    'JustifyRight', 'JustifyBlock',
                ]
            },
            { name: 'colors', items: [ 'TextColor'] },
            { name: 'links', items: [ 'Link', 'Unlink' ] },
            { name: 'insert', items: [ 'Smiley' ] }

        ]
    });

});

// change Status
$(document).on('change','.changeStatusBoard',function() {
  var idBoard = $(this).attr('data-id');
  var statusBoard = $(this).attr('data-status');

  var path = $("base").attr("href");

  $.ajax({
      url: path + "member/changeStatusBoard",
      type: 'GET',
      data: {id: idBoard,status: statusBoard},
      dataType: "JSON",
      success: function (data) {

      }
  });
  return false;



});


//DELETE

var modalConfirm = function (callback) {
    var linkdirect = null, baseurl = $('base').attr("href");

    $(document).on('click', "#btn-confirm", function () {
        linkdirect = $(this).attr('href');
        //alert(baseurl + linkdirect);
        $("#modal-btn-si").attr('href',linkdirect);
        $("#mi-modal").modal('show');
        return false;
    });

    $(document).on('click', "#modal-btn-si", function () {
        callback(true,linkdirect);
        $("#mi-modal").modal('hide');
    });


    $(document).on('click', "#modal-btn-no", function () {
        callback(false);
        $("#mi-modal").modal('hide');
    });

};

modalConfirm(function (confirm, url = null) {
    if (confirm) {
        window.location = url;
        return true;
    } else {
        //Acciones si el usuario no confirma
        // $("#result").html("NO CONFIRMADO");
        //  alert("No Confirm");
        return false;
}
});
