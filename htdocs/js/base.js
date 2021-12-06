var imgUrl = '/imgs/';

$(function () {
    $('.more img,img.more').hover(function(){
        $(this).addClass('pulse animated');
    },function(){
        $(this).removeClass('pulse animated');
    })
    $('.phone-nav img').click(function () {
        $('.p_subnav').hide();
        $('.phone-nav').children('ul').toggle();
    })
    $('.subnav li a').click(function () {
        $('.p_subnav').hide();
        $('.phone-nav').children('ul').hide();
    })
    $('.subnav li .p_t').click(function () {
        $('.p_subnav').hide();
        $(this).children('.p_subnav').show();
    })
    $('.p_subnav').click(function () {
        $('.phone-nav').children('ul').hide();
    })
})

function GetQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]);
    return "";
}