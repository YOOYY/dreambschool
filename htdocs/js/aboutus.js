$('.close').click(function(){
    $('.mask').hide();
})
$('.more').click(function(){
    var index = $(this).parent().index();
    for(var i = 0;i<contents.length;i++){
        if(i === index){
            $('.mask .content .chapter').html(contents[i]);
        }
    }
    $('.mask').show();
})
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

if(!webKit.isPC()){
    $('.p_con').text('打造一流高端人才成长与创新教育服务的综合旗舰');
}