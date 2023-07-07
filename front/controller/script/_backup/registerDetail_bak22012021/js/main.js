function resetMyformInsert() {
    $('#myFormQuse')[0].reset();
    $('#myFormQuse_form')[0].reset();
}
$(document).ready(function(){
    // $('input[type="submit"]').prop('disabled', true);
    if($('.check_error[value="1"]').length > 0){
        $('input[type="submit"]').prop('disabled', true);
    }
});
var base = $("base").attr("href");
var valueReturn = [];
$('.checkOption').keyup(function(e){
    var vchar = e.which;
    var valueInput = $(this).val();
    var valueRequest = $(this).data('request');

    var valueReturn = checkData($(this), e.which ,valueInput);

    if (valueRequest == 1) { /////บังคับกรอก
        if(/^\s+/.test(valueReturn)) { //เช็ค first character ว่ามี space หรือเปล่า
            valueReturn = valueReturn.trim(); //trim first character
        }
        if(/\s+$/.test(valueReturn)) {  //เช็ค last character ว่ามี space หรือเปล่า
            //////// มีไม่ต้องทำอะไร
        }else{
            /////trim first character
            valueReturn = valueReturn.trim();
        }
    }
    $(this).val(valueReturn);
    
});

// $('.checkOption').focusout(function(){
//     var valueInput = $(this).val();

//     var valueRequest = $(this).data('request');
//     if (valueRequest == 1) {
//         valueReturn = valueInput.trim();
//         $(this).val(valueReturn);
//     }
//   });
// $(".checkOption").bind("paste", function(e){
//     console.log($(this).val());
//     // access the clipboard using the api
//     var pastedData = e.originalEvent.clipboardData.getData('text');
//     console.log(pastedData);
//     var pastedClearData = e.clipboardData.clearData();
//     console.log(pastedClearData);
//     // console.log(valueInput);
//     // $(this).val('');
//     // clipboardData.clearData('text');
//     // $(this).val(pastedData);
//     // // var valueInput = $(this).val();
//     // // e.originalEvent.clipboardData.pastedData(pastedData);
//     // var valueReturn = checkData($(this), null ,pastedData);
// } );

$('.checkOption').bind('paste', null, function(e) {
    var element = $(event.target);
    setTimeout(function() {
        var clipData = $(element).val();
        // do something with text
        checkData(element, null ,clipData)
    }, 100);
});

function checkData(thisObj, vchar, valueInput){

    var vchar = vchar;
    var valueInput = valueInput;
    var valueID = thisObj.data('id');
    var valueFID = thisObj.data('fid');
    var valueCID = thisObj.data('cid');
    var valueError = thisObj.data('error');
    var valueOption = thisObj.data('option');
    // console.log('valueInput',valueInput);
    // console.log(valueInput.length);
    // console.log($.isNumeric(valueInput));

    // console.log(valueID,valueFID,valueCID,valueError,valueOption);
    // return false;

    if(!valueInput){
        valueReturn[valueID] = '';
    }

    
    if (valueOption !== null) {
        // console.log(valueOption);
        if (valueOption.filter(x => x === '2').length == 0 && valueOption.filter(x => x === '3').length == 0 && valueOption.filter(x => x === '4').length == 0) {
            valueReturn[valueID] = valueInput;
        }

        if (valueOption.filter(x => x === '2').length > 0) {
            valueReturn[valueID] = valueInput;
        }

        if (valueOption.filter(x => x === '3').length > 0 && valueOption.filter(x => x === '4').length == 0) {

            valueReturn[valueID] = valueInput;
        }

        // if (valueOption.filter(x => x === '3').length > 0 && valueOption.filter(x => x === '4').length > 0) {
        if (valueOption.filter(x => x === '4').length > 0) {


                if (valueInput.length <= 13) {
                    valueReturn[valueID] = valueInput;
                }else{
                    valueReturn[valueID] = valueReturn[valueID];
                }
                if (chkDigitPidThai(valueReturn[valueID])) {
                    $('.alertErrorData-'+valueID).html('<ul class="list-unstyled"><li>'+valueError+'</li></ul>').css("color", "#737373");
                }else{
                    $('.alertErrorData-'+valueID).html('<ul class="list-unstyled"><li>'+valueError+'</li></ul>').css("color", "red");
                }
        }
        
    }else{
        valueReturn[valueID] = valueInput;
    }
  // console.log('valueReturn',valueReturn[valueID]);
    if (valueCID == 1) {

        if($('.check_error[value="1"]').length > 0){
            $('input[type="submit"]').prop('disabled', true);
        }
        var type="POST";
        var url= base +"registerDetail_new/checkData?valID="+valueID+"&valFID="+valueFID;
        var data= $('#myFormQuse_form').serialize();
        $.ajax({type:type,url:url,data:data,
            success:function(data){

            },
            complete: function(xhr, textStatus) {
                // console.log(xhr.status);
                if (xhr.status == 201) {
                    $('input[type="submit"]').prop('disabled', false);
                    $('.alertErrorData-'+valueID).html('<ul class="list-unstyled"><li>'+valueError+'</li></ul>').css("color", "#737373");
                    $('.check_error_'+valueID).val('0');
                }else{
                    $('input[type="submit"]').prop('disabled', true);
                    $('.alertErrorData-'+valueID).html('<ul class="list-unstyled"><li>ข้อมูลซ้ำในระบบ กรุณากรอกข้อมูลใหม่อีกครั้ง</li></ul>').css("color", "red");
                    $('.check_error_'+valueID).val('1');
                }
                if($('.check_error[value="1"]').length > 0){
                    $('input[type="submit"]').prop('disabled', true);
                }
            } 
        }).done(function() {
        

        });

    }

    return valueReturn[valueID];
}

$.fn.dataTableExt.oPagination.listboxWithButtons = {
    "fnInit": function (oSettings, nPaging, fnCallbackDraw) {
        var nBtnPrevious = document.createElement('button');
        var nBtnNext = document.createElement('button');
        var nInput = document.createElement('select');
        var nPage = document.createElement('span');
        var nOf = document.createElement('span');
        nBtnPrevious.className = "paginate_button previous";
        nBtnPrevious.textContent = "ก่อนหน้า";
        nBtnNext.className = "paginate_button next";
        nBtnNext.textContent = "ถัดไป";
        nOf.className = "paginate_of";
        nPage.className = "paginate_page";
        if (oSettings.sTableId !== '') {
            nPaging.setAttribute('id', oSettings.sTableId + '_paginate');
        }
        nInput.style.display = "inline";
        nPage.innerHTML = "Page ";
        nPaging.appendChild(nBtnPrevious);
        nPaging.appendChild(nBtnNext);
        nPaging.appendChild(nPage);
        nPaging.appendChild(nInput);
        nPaging.appendChild(nOf);
        $(nBtnPrevious).click(function () {
            if( $(this).hasClass("disabled") )
                return;
            oSettings.oApi._fnPageChange(oSettings, "previous");
            fnCallbackDraw(oSettings);
        }).bind('selectstart', function () { return false; });
        $(nBtnNext).click(function () {
            if( $(this).hasClass("disabled") )
                return;
            oSettings.oApi._fnPageChange(oSettings, "next");
            fnCallbackDraw(oSettings);
        }).bind('selectstart', function () { return false; });
        $(nInput).change(function (e) {
            window.scroll(0,0);
            if (this.value === "" || this.value.match(/[^0-9]/)) {
                return;
            }
            var iNewStart = oSettings._iDisplayLength * (this.value - 1);
            if (iNewStart > oSettings.fnRecordsDisplay()) {
                oSettings._iDisplayStart = (Math.ceil((oSettings.fnRecordsDisplay() - 1) / oSettings._iDisplayLength) - 1) * oSettings._iDisplayLength;
                fnCallbackDraw(oSettings);
                return;
            }
            oSettings._iDisplayStart = iNewStart;
            fnCallbackDraw(oSettings);
        });
        $('span', nPaging).bind('mousedown', function () {
            return false;
        });
        $('span', nPaging).bind('selectstart', function () {
            return false;
        });
    },
    "fnUpdate": function (oSettings, fnCallbackDraw) {
        if (!oSettings.aanFeatures.p) {
            return;
        }
        var iPages = Math.ceil((oSettings.fnRecordsDisplay()) / oSettings._iDisplayLength);
        var iCurrentPage = Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength) + 1;
        var an = oSettings.aanFeatures.p;
        for (var i = 0, iLen = an.length; i < iLen; i++) {
            var spans = an[i].getElementsByTagName('span');
            var inputs = an[i].getElementsByTagName('select');
            var elSel = inputs[0];
            if(elSel.options.length != iPages) {
                elSel.options.length = 0;
                for (var j = 0; j < iPages; j++) {
                    var oOption = document.createElement('option');
                    oOption.text = j + 1;
                    oOption.value = j + 1;
                    try {
                        elSel.add(oOption, null);
                    } catch (ex) {
                        elSel.add(oOption);
                    }
                }
                spans[1].innerHTML = "&nbsp;of&nbsp;" + iPages;
            }
          elSel.value = iCurrentPage;
        }
    }
};

var tableRegis = $('#dataList').DataTable({
    "oLanguage": {
        "sLengthMenu": "แสดง _MENU_ รายการ",
        "sZeroRecords": "ไม่พบข้อมูลที่ค้นหา",
        "sInfo": "จำนวน _TOTAL_ รายการ",
        "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 รายการ",
        "sInfoFiltered": "(จากจำนวนทั้งหมด _MAX_ รายการ)",
        "sSearch": "ค้นหา :",
        "oPaginate": {
            "sFirst":    "หน้าแรก",
            "sPrevious": "ก่อนหน้า",
            "sNext":     "ถัดไป",
            "sLast":     "หน้าสุดท้าย"
        }
    },
    "pagingType": "listboxWithButtons"
});

$('.changeSelect').change(function(){
    if ($(this).val() == 999999) {
        $('.inputOther').find('input').prop('required',true);
        $('.inputOther').show();
    }else{
        $('.inputOther').find('input').prop('required',false);
        $('.inputOther').hide();
    }
});

// $(".numberIDCard").keyup(function(e) {
//     var vchar = e.which;
//     // // console.log($(this).val());

//     // /* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย
//     // หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น  รูปแบบเลขที่บัตรประชาชน
//     // 4-2215-54125-6-12 ก็สามารถกำหนดเป็น  _-____-_____-_-__
//     // รูปแบบเบอร์โทรศัพท์ 08-4521-6521 กำหนดเป็น __-____-____
//     // หรือกำหนดเวลาเช่น 12:45:30 กำหนดเป็น __:__:__
//     // ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบเลขบัตรประชาชน
//     // */
//     // var thisValue = $(this).val();
//     // var pattern = new String("_-____-_____-__-_"); // กำหนดรูปแบบในนี้
//     // var pattern_ex = new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
//     // var returnText = new String("");
//     // var obj_l = thisValue.length;
//     // var obj_l2 = obj_l - 1;
//     // for (i = 0; i < pattern.length; i++) {
//     //     if (obj_l2 == i && pattern.charAt(i + 1) == pattern_ex) {
//     //         returnText += thisValue + pattern_ex;
//     //         thisValue = returnText;
//     //     }
//     // }
//     // if (obj_l >= pattern.length) {
//     //     thisValue = thisValue.substr(0, pattern.length);
//     // }

//     // $(this).val(thisValue);
//     var arrIdCard = [];
//     var idcard = $(this).val();
//     if (idcard.length == 13 && $.isNumeric(idcard)) {
//         arrIdCard[0] = idcard.substring(0, 1);
//         arrIdCard[1] = idcard.substring(1, 5);
//         arrIdCard[2] = idcard.substring(5, 10);
//         arrIdCard[3] = idcard.substring(10, 12);
//         arrIdCard[4] = idcard.substring(12, 13);
//         $(this).val(arrIdCard[0]+''+arrIdCard[1]+''+arrIdCard[2]+''+arrIdCard[3]+''+arrIdCard[4]);
//     }
//     if(vchar == 46 || vchar == 8) {
//         var newIDCard = idcard.replace(/\ /g,"");
//         $(this).val(newIDCard);
//     }

// });


// $(".numberOnly").keydown(function(event) {
//     var vchar = event.which;
//     // console.log(vchar);
//     var thisValue = $(this).val();
//     if ((vchar > 95 && vchar < 106 || vchar > 47 && vchar < 58) || vchar == 8 || vchar == 9 || vchar == 32 || vchar == 109 || vchar == 173) {
//         return true;
//     } else {
//         return false;
//     }
// });

//function recaptcha_callback(e) {
//    $('input[type="submit"]').removeAttr('disabled');
//}



// function isBlank(myObj) {
//     if (myObj.value == '') {
//         return true;
//     }
//     return false;
// }
// function isNumber(myObj) {
//     return !isNaN(myObj.value * 1);
// }
// function isEqual(myObj1, myObj2) {
//     if (myObj1.value == myObj2.value) {
//         return true;
//     }
//     return false;
// }

// function clickBoosScrollTop(idName) {
//     $('html, body').animate({
//         scrollTop: $('#'+idName).offset().top - 90
//     }, 300);
// }
// $("#myFormQuse").submit(function () {
//     with (document.myFormBoss) {
//         // if (isBlank(inputSubject)) {
//         //     jQuery('#alert_inputSubject').show();
//         //     jQuery("#alert_inputSubject").html('กรุณากรอกหัวข้อ');
//         //     jQuery('#inputSubject').css({'border-color': '#FF0000'});
//         //     // inputName.focus();
//         //     clickBoosScrollTop('inputSubject');
//         //     return false;
//         // } else {
//         //     jQuery('#inputSubject').css('border-color', '#ebebeb');
//         //     jQuery('#alert_inputSubject').hide();
//         // }

//         // if (isBlank(inputTitle)) {
//         //     jQuery('#alert_inputTitle').show();
//         //     jQuery("#alert_inputTitle").html('กรุณากรอกรายละเอียด');
//         //     jQuery('#inputTitle').css({'border-color': '#FF0000'});
//         //     // inputName.focus();
//         //     clickBoosScrollTop('inputTitle');
//         //     return false;
//         // } else {
//         //     jQuery('#inputTitle').css('border-color', '#ebebeb');
//         //     jQuery('#alert_inputTitle').hide();
//         // }


//         // var valCheckTypeUsed = jQuery("input:radio[name=inputTypeUsed]:checked").val();

//         // if (valCheckTypeUsed == 1) {

//         //     if (isBlank(inputChdateS)) {
//         //         jQuery('#alert_inputChdateS').show();
//         //         jQuery("#alert_inputChdateS").html('กรุณาเลือกวันที่เริ่มต้น');
//         //         jQuery('#inputChdateS').css({'border-color': '#FF0000'});
//         //         // inputChdateS.focus();
//         //         clickBoosScrollTop('inputChdateS');
//         //         return false;
//         //     } else {
//         //         jQuery('#inputChdateS').css('border-color', '#ebebeb');
//         //         jQuery('#alert_inputChdateS').hide();
//         //     }



//         //     if (isBlank(inputChdateE)) {
//         //         jQuery('#alert_inputChdateE').show();
//         //         jQuery("#alert_inputChdateE").html('กรุณาเลือกวันที่สิ้นสุดการใช้งาน');
//         //         jQuery('#inputChdateE').css({'border-color': '#FF0000'});
//         //         // inputChdateE.focus();
//         //         clickBoosScrollTop('inputChdateE');
//         //         return false;
//         //     } else {
//         //         jQuery('#inputChdateE').css('border-color', '#ebebeb');
//         //         jQuery('#alert_inputChdateE').hide();
//         //     }


//         //     var valCheckDateS = jQuery("#inputChdateS").val();
//         //     var datePartsS = valCheckDateS.split("-");
//         //     var dateYearS = datePartsS[2] - 543;
//         //     var valCheckS = new Date(dateYearS, datePartsS[1], datePartsS[0]);


//         //     var valCheckDateE = jQuery("#inputChdateE").val();
//         //     var datePartsE = valCheckDateE.split("-");
//         //     var dateYearE = datePartsE[2] - 543;
//         //     var valCheckE = new Date(dateYearE, datePartsE[1], datePartsE[0]);

//         //     if (valCheckE <= valCheckS) {
//         //         jQuery('#alert_inputChdateE').show();
//         //         jQuery("#alert_inputChdateE").html('กรุณาเลือกวันที่สิ้นสุดการใช้งาน ให้มากกว่าวันเริ่มต้น');
//         //         jQuery('#inputChdateE').css({'border-color': '#FF0000'});
//         //         // inputChdateE.focus();
//         //         clickBoosScrollTop('inputChdateE');
//         //         return false;
//         //     } else {
//         //         jQuery('#inputChdateE').css('border-color', '#ebebeb');
//         //         jQuery('#alert_inputChdateE').hide();
//         //     }

//         // } else {

//         //     if (isBlank(inputChdate)) {
//         //         jQuery('#alert_inputChdate').show();
//         //         jQuery("#alert_inputChdate").html('กรุณาเลือกวันที่');
//         //         jQuery('#inputChdate').css({'border-color': '#FF0000'});
//         //         // inputChdate.focus();
//         //         clickBoosScrollTop('inputChdateE');
//         //         return false;
//         //     } else {
//         //         jQuery('#inputChdate').css('border-color', '#ebebeb');
//         //         jQuery('#alert_inputChdate').hide();
//         //     }
//         //     var valCheckType = jQuery("input:radio[name=inputType]:checked").val();

//         //     if (valCheckType >= 1) {
//         //         jQuery('#alert_inputType').hide();
//         //     } else {
//         //         jQuery('#alert_inputType').show();
//         //         jQuery("#alert_inputType").html('กรุณาเลือกช่วงเวลา');
//         //         var tagRadio = document.getElementById("inputType");
//         //         // tagRadio.focus();
//         //         clickBoosScrollTop('tagRadio');
//         //         return false;
//         //     }
//         // }

//     }
// });


// function isEmail(str) {
//     //alert(str);
//     var supported = 0;
//     if (window.RegExp) {
//         var tempStr = "a";
//         var tempReg = new RegExp(tempStr);
//         if (tempReg.test(tempStr))
//             supported = 1;
//     }
//     //alert(str + '1');
//     if (!supported)
//         return (str.indexOf(".") > 2) && (str.indexOf("@") > 0);
//     var r1 = new RegExp("(@.*@)|(\\.\\.)|(@\\.)|(^\\.)");
//     var r2 = new RegExp("^.+\\@(\\[?)[a-zA-Z0-9\\-\\.]+\\.([a-zA-Z]{2,3}|[0-9]{1,3})(\\]?)$");
//     return (!r1.test(str) && r2.test(str));
// }

function chkDigitPidThai(p_iPID) {
    var total = 0;
    var iPID;
    var chk;
    var Validchk;
    iPID = p_iPID.replace(/-/g, "");
    Validchk = iPID.substr(12, 1);
    var j = 0;
    var pidcut;
    for (var n = 0; n < 12; n++) {
        pidcut = parseInt(iPID.substr(j, 1));
        total = (total + ((pidcut) * (13 - n)));
        j++;
    }

    chk = 11 - (total % 11);

    if (chk == 10) {
        chk = 0;
    } else if (chk == 11) {
        chk = 1;
    }
    if (chk == Validchk) {
        return true;
    } else {
        return false;
    }

}

function goToByScroll(id) {
    // Remove "link" from the ID
    id = id.replace("link", "");
    // Scroll
    $('html,body').animate({
        scrollTop: $("." + id).offset().top
    }, 'slow');
	
			console.log('==>'+id);

}




$(document).ready(function(){
						   


tableRegis.on('page.dt', function() {
  $('html, body').animate({
    scrollTop: $(".default-wrapper").offset().top
   }, 500);
});


});


