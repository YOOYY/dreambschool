$(function () {
    var curpage = 1;
    $('#mySlide').edslider({
        width: '100%',
        height: 'auto',
        position: 1,
        interval: 5000,
        duration: 500,
        animation: true,
        paginator: false,
        navigator: true,
        progress: false,
        loadImgSrc: imgUrl + 'load.gif',
        skin: 'edslider'
    });
    $('#service .bgbox').hover(function(){
        var index = $(this).index();
        $('#service .bgbox').each(function(m){
            if(index === m){
            }else{
                
            }
        })
    })

    $('#service .bgbox').mouseenter(function(){
        var index = $(this).index();
        $('#service .bgbox').each(function(m){
            if(index === m){
                $(this).stop().animate({width:'25.5%'}).find('.content p').finish().fadeIn();
                $(this).css('background-image','url(/imgs/aboutus/bg'+(index+1)+'_on.jpg)');
            }else{
                $(this).stop().animate({width:'19.8%'}).find('.content p').finish().fadeOut();
                $(this).css('background-image','url(/imgs/aboutus/bg'+(m+1)+'.jpg)');
            }
        })
    }).mouseleave(function(){
        var index = $(this).index();
        $('#service .bgbox').each(function(m){
            if(index !== m){
                $(this).children('img').attr('src','/imgs/aboutus/bg'+(m+4)+'.jpg');
                $(this).stop().animate({width:'19.8%'}).find('.content p').finish().fadeOut();
            }
        })
    })
    $('#service .bgbox').eq(0).mouseenter()
    $('.row1').show();
    $('.bar .next').click(function(){
        if(curpage<page){
            $('.row'+curpage).fadeOut();
            curpage +=1;
            $('.row'+curpage).fadeIn();
            $('.curpage').attr('src','/imgs/aboutus/'+curpage+'.png');
        }
    })
    $('.bar .prev').click(function(){
        if(curpage>1){
            $('.row'+curpage).fadeOut();
            curpage -=1;
            $('.row'+curpage).fadeIn();
            $('.curpage').attr('src','/imgs/aboutus/'+curpage+'.png');
        }
    })
    var timer = null;
    function lunbo(){
        timer = setInterval(function(){
            $('.row'+curpage).fadeOut(1000);
            if(curpage === page){
                curpage = 1;
            }else{
                curpage +=1;
            }
            $('.row'+curpage).fadeIn(1000);
            $('.curpage').attr('src','/imgs/aboutus/'+curpage+'.png');
        }, 4000);
    }
    lunbo();
    $('.bar,.teacherBox').hover(function(){
        clearInterval(timer);
        timer = null;
    },function(){
        lunbo();
    })
    $('#student .bgbox').mouseenter(function(){
        var index = $(this).index();
        $('#student .bgbox').each(function(m){
            if(index === m){
                $(this).stop().animate({width:'21%'}).children('.content').finish().fadeIn();
            }else{
                $(this).stop().animate({width:'16%'}).children('.content').finish().fadeOut();
            }
        })
    }).mouseleave(function(){
        var index = $(this).index();
        $('#student .bgbox').each(function(m){
            if(index !== m){
                $(this).children('img').attr('src','/imgs/aboutus/bg'+(m+4)+'.jpg');
                $(this).stop().animate({width:'16%'}).children('.content').finish().fadeOut();
            }
        })
    })
    $('#student .bgbox').eq(0).mouseenter();
    var ua = window.navigator.userAgent.toLowerCase();
    var browser = {
        versions : function() {
            return {
                ie : ua.indexOf('trident') > -1, // IE鍐呮牳
                opera : ua.indexOf('presto') > -1, // opera鍐呮牳
                webKit : ua.indexOf('applewebkit') > -1, 
                gecko : ua.indexOf('gecko') > -1 && ua.indexOf('khtml') == -1, 
                mobile : !!ua.match(/applewebkit.*mobile.*/), // 鏄惁鏄Щ鍔�
                ios : !!ua.match(/\(i[^;]+;( u;)? cpu.+mac os x/), // ios鍐呮牳
                android : ua.indexOf('android') > -1 || ua.indexOf('Linux') > -1, // android鍐呮牳
                iPhone : ua.indexOf('iphone') > -1, // iPhone鍐呮牳
                iPad : ua.indexOf('ipad') > -1, // Ipad鍐呮牳
                webApp : ua.indexOf('娴忚鍣�') == -1,
                wechat : ua.indexOf('micromessenger') > -1,
                qq : ua.indexOf('qq') > -1,
                safari : ua.indexOf('safari') > -1 && ua.indexOf('chrome') < 0
            };
        }(),
        language : (navigator.browserLanguage || navigator.language).toLowerCase()
    };
    
    
    var webKit = {
        isMobile : function() {
            return browser.versions.mobile;
        },
        isAndroid : function() {
            return browser.versions.android;
        },
        isIos : function() {
            return browser.versions.ios || browser.versions.iPhone;
        },
        isiPad : function() {
            return browser.versions.iPad;
        },
        isWeixin : function(){
            return browser.versions.wechat;
        },
        isPC : function(){
            var Agents=["Android","iPhone",
            "SymbianOS","Windows Phone",
            "iPad","iPod"];
            var flag=true;
            for(var v=0;v<Agents.length;v++) {
                if(ua.toLowerCase().indexOf(Agents[v].toLowerCase())>0) {
                    flag=false;
                    break;
                }
            }
            if(browser.versions.mobile){
                flag = false;
            }
            return flag;
        }
    };

    if(webKit.isPC()){
    $(".swiper-container").height($(window).height());
        var index = getQueryVariable('id');
        var mySwiper = new Swiper('.swiper-container',{
            // autoplay: 3000,
            mousewheelControl:true,
            cssWidthAndHeight:false,
            mode:"vertical",
            initialSlide:index || 0
        });
    }else{
        $('#top').css({width:'100%',height:'190px'})
        $('#service .bgbox p').hide();
    }

    function getQueryVariable(variable)
{
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
}
})