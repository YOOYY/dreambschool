$(function () {
    var curpage = 1;
    function isPC(){
        var Agents=["Android","iPhone",
        "SymbianOS","Windows Phone",
        "iPad","iPod"];
        var ua = window.navigator.userAgent.toLowerCase();
        var flag=true;
        for(var v=0;v<Agents.length;v++) {
            if(ua.toLowerCase().indexOf(Agents[v].toLowerCase())>0) {
                flag=false;
                break;
            }
        }
        if(!!ua.match(/applewebkit.*mobile.*/)){
            flag = false;
        }
        return flag;
    }
    var wh = $(window).height();
    var ww = $(window).width();
    if(isPC()){
        $("#top,#dean,#service,#teacher,#student,#news,.swiper-container").height(wh);
        var index = getQueryVariable('id');
        new Swiper('.swiper-container',{
            mousewheelControl:true,
            mode:"vertical",
            keyboardControl : true,
            calculateHeight : true,
            initialSlide:index || 0
        });
    }else{
        $('#top').css({width:ww,height:'190px'})
    }

    // var mySwiper = new Swiper('#mySlide',{
    //     autoplay:3000,
    //     loop:true,
    //     speed:1000
    // });
    $('#top .next').click(function(){
        mySwiper.swipeNext();
    })
    $('#top .prev').click(function(){
        mySwiper.swipePrev();
    })
    $('#service .bgbox').mouseenter(function(){
        var index = $(this).index();
        $('#service .bgbox').each(function(m){
            if(index === m){
                $(this).stop().animate({width:'25.5%'}).find('.content p').finish().fadeIn();
                $(this).css('background-image','url('+imglist_on[index]+')');
            }else{
                $(this).stop().animate({width:'19.8%'}).find('.content p').finish().fadeOut();
                $(this).css('background-image','url('+imglist[m]+')');
            }
        })
    }).mouseleave(function(){
        var index = $(this).index();
        $('#service .bgbox').each(function(m){
            if(index !== m){
                $(this).stop().animate({width:'19.8%'}).find('.content p').finish().fadeOut();
            }
        })
    })
    $('#service .bgbox').eq(0).mouseenter()
    $('.teacherBox').hide();
    $('.row1').show();
    $('.bar .next').click(function(){
        if(curpage<page){
            $('.row'+curpage).fadeOut();
            curpage +=1;
            $('.row'+curpage).fadeIn();
            $('.curpage').attr('src','/imgs/index/'+curpage+'.png');
        }
    })
    $('.bar .prev').click(function(){
        if(curpage>1){
            $('.row'+curpage).fadeOut();
            curpage -=1;
            $('.row'+curpage).fadeIn();
            $('.curpage').attr('src','/imgs/index/'+curpage+'.png');
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
            $('.curpage').attr('src','/imgs/index/'+curpage+'.png');
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
                $(this).stop().animate({width:'16%'}).children('.content').finish().fadeOut();
            }
        })
    })
    $('#student .bgbox').eq(0).mouseenter();

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