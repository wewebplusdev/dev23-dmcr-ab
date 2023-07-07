window.onload = function() {
    // script
};

$(function () {
    ("use strict");
    

    $('#collapseSitemap').on('shown.bs.collapse', function (e) {
        $("html, body").animate({ scrollTop: $(document).height()-$(window).height() }, 400);
    }); 

    
    $('.select-control').select2({
        minimumResultsForSearch: Infinity,
        placeholder: "Select"
    });

    $('[data-toggle="menu-mobile"]').click(function(){
        $(this).toggleClass('close');
        $('.layout-global').toggleClass('sidebar-open');
        $('.layout-header .menu-sm').toggleClass('open');
    });
    $('[data-toggle="menu-overlay"]').click(function(){
        $('[data-toggle="menu-mobile"]').removeClass('close');
        $('.layout-global').removeClass('sidebar-open');
        $('.layout-header .menu-sm').removeClass('open');
    });
});