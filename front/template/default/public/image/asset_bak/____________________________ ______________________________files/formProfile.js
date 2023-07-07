$(document).ready(function () {
    $('#clickuploadProfile').click(function () {
        $("input[name='uploadProfile']").trigger("click");
    });


    $("input[name='uploadProfile']").change(function (e) {
        $(".showProfile").append('<div class="loadding" style="position: absolute; top: 50%;left: 50%; transform: translate(-50%, -50%);pointer-events: none; color:#0058c6; opacity:0.7;font-size: 35px;"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i></div>');

        e.preventDefault();
        var path = $("base").attr("href");
        var key = $("input[name=keyProfile]").val();
        //var typeupload = $("input[name=typeupImage]").val();

        var formData = new FormData($("#profileinfo")[0]);
        // alert(formData);

        $.ajax({
            url: path + "member/customer/profile-edit/upload-profile?type=add&key=" + key,
            type: 'POST',
            xhr: function () {
                var myXhr = $.ajaxSettings.xhr();
                return myXhr;
            },
            success: function (data) {
                // alert("Data Uploaded: " + data);

                $.each(data, function (index, element) {
                   // console.log(element);

                    $(".showProfile .loadding").delay(600).fadeOut("fast", function () {

                        $(".showProfile .cover-bg").attr("style", 'background-image: url(' + element.real + '); cursor:pointer;');
                        // $(".showProfile .cover-bg img").attr("src", element.real);
                        $(".thumb").addClass('has-profile');
                        $("input[name='picProfile']").val(element.name);
                    });

                });


            },
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json'
        });
        return false;

    });
});
