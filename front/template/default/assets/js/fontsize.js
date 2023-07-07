$(document).ready(function() {
    
    
    jQuery(function () {
        var classFontSize = new Array();
        var txtFontSize = new Array();
        var nameClassFont = new Array();
        
        nameClassFont.push('.site-header .text-size .txt');
        nameClassFont.push('.site-header .language .link');
        nameClassFont.push('.default-header .main-text .title');
        nameClassFont.push('.default-header .main-text .desc');
        nameClassFont.push('.default-page .h-title');
        nameClassFont.push('.default-page .title');
        nameClassFont.push('.default-page .desc');
        nameClassFont.push('.download-blog .txt');
        nameClassFont.push('.download-blog .info .wrapper');
        nameClassFont.push('.footer-top .txt2');
        nameClassFont.push('.footer-bottom .copyright');
        nameClassFont.push('.project-close-slider .title');
        nameClassFont.push('.project-close-slider .date');
        nameClassFont.push('.project-close-slider .time');
        nameClassFont.push('.project-close-slider .num');
        nameClassFont.push('.pjr-box .txt');
        nameClassFont.push('.filter-box .filter .form-default .form-group .control-label');
        nameClassFont.push('.filter');
        nameClassFont.push('.body-box .thead .td');
        nameClassFont.push('.body-box .tbody .tr .td.title .title');
        nameClassFont.push('.body-box .tbody .desc .detail');
        nameClassFont.push('.body-box .tbody .td');
        nameClassFont.push('.body-box .tbody .date p:last-child');
        nameClassFont.push('.body-box .tbody .td .detail-etc .num');
        nameClassFont.push('.body-box .tbody .td .detail-etc .num .men');
        nameClassFont.push('.body-box .tbody .td.name a');
        nameClassFont.push('.footer-box .txt2');
        nameClassFont.push('.footer-box .wrapper .desc');
        nameClassFont.push('.footer-box .footer-bar li a');
        nameClassFont.push('.questionare-detail .control-label');
        nameClassFont.push('.title-group-name');
        nameClassFont.push('.assessment thead tr td');
        nameClassFont.push('.editor-content');
        nameClassFont.push('.member-list-page div#dataList_info');
        nameClassFont.push('.detail-block .header .title');
        nameClassFont.push('.detail-block .header .info');
        nameClassFont.push('.download-list .title');
        nameClassFont.push('.download-list .info');
        nameClassFont.push('');
        nameClassFont.push('');
        nameClassFont.push('');

        for (var i = 0; i < nameClassFont.length; i++) {
            classFontSize.push(nameClassFont[i]);
            txtFontSize.push(parseInt($(nameClassFont[i]).css('font-size')));
        }

        $('a.size-small').click(function () {
            for (var i = 0; i < classFontSize.length; i++) {
                $(classFontSize[i]).css("font-size", txtFontSize[i] + "px");
            }
            $(this).parent().addClass('active');
            $('a.size-medium').parent().removeClass('active');
            $('a.size-large').parent().removeClass('active');
            $('.overflow-line-1').trunk8({
                lines: 1,
                tooltip: false
            });
            $('.overflow-line-2').trunk8({
                lines: 2,
                tooltip: false
            });
            $('.overflow-line-3').trunk8({
                lines: 3,
                tooltip: false
            });
            $('.overflow-line-4').trunk8({
                lines: 4,
                tooltip: false
            });
        });

        $('a.size-medium').click(function () {
            for (var i = 0; i < classFontSize.length; i++) {
                $(classFontSize[i]).css("font-size", (txtFontSize[i] + parseInt(1)) + "px");
            }
            $(this).parent().addClass('active');
            $('a.size-small').parent().removeClass('active');
            $('a.size-large').parent().removeClass('active');
            $('.overflow-line-1').trunk8({
                lines: 1,
                tooltip: false
            });
            $('.overflow-line-2').trunk8({
                lines: 2,
                tooltip: false
            });
            $('.overflow-line-3').trunk8({
                lines: 3,
                tooltip: false
            });
            $('.overflow-line-4').trunk8({
                lines: 4,
                tooltip: false
            });
        });

        $('a.size-large').click(function () {
            for (var i = 0; i < classFontSize.length; i++) {
                $(classFontSize[i]).css("font-size", (txtFontSize[i] + parseInt(2)) + "px");
            }
            $(this).parent().addClass('active');
            $('a.size-small').parent().removeClass('active');
            $('a.size-medium').parent().removeClass('active');
            $('.overflow-line-1').trunk8({
                lines: 1,
                tooltip: false
            });
            $('.overflow-line-2').trunk8({
                lines: 2,
                tooltip: false
            });
            $('.overflow-line-3').trunk8({
                lines: 3,
                tooltip: false
            });
            $('.overflow-line-4').trunk8({
                lines: 4,
                tooltip: false
            });
        });
    });


});