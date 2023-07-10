$(document).ready(function () {
    // console.log( "ready!" );

    $('.layout-header .btn-search').click(function () {
        $('.search-input').removeClass('hide');
    });
    $('.layout-header .search-input .btn-close').click(function () {
        $('.search-input').addClass('hide');
    });
});