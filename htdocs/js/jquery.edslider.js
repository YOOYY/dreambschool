/*
 * jQuery edSlider plugin v.1.4
 * @author Eduardo Moreno
 * Code under MIT License
 */

(function ($) {

    $.fn.edslider = function (settings) {
        var defaults = {
            width: 960,
            height: 400,
            position: 1,
            interval: 5000,
            duration: 500,
            animation: true,
            paginator: true,
            navigator: true,
            progress: true,
            loadImgSrc: imgUrl + 'load.gif',
            skin: 'edslider'
        };

        var options = $.extend({}, defaults, settings);

        this.each(function () {

            //Building (wrapping, validating, setting up)
            var slider = $(this),
                sliderLi = slider.find('li'),
                sliderBgImg = sliderLi.css('background-image');

            sliderLi.length == 0 && console.error('error: empty slider!');

            var sliderImg = slider.find('img'),
                wrapper = slider
                .wrap('<div class="' + options.skin + '"/>')
                .parent()
                .css({
                    'width': options.width,
                    'background-image': 'url("' + options.loadImgSrc + '")',
                    'background-repeat': 'no-repeat',
                    'background-position': 'center'
                }),
                startPosition = options.position;

            if (options.position == 0 || options.position > sliderLi.length) {
                console.error('error: start position value must be between 1 and ' + sliderLi.length + '!');
                startPosition = 1;
            }

            slider
                .on('mouseenter', function () {
                    $(this).addClass('hover');
                    hoverControl();
                })
                .on('mouseleave', function () {
                    $(this).removeClass('hover');
                    hoverControl();
                })
                .add(sliderLi)
                .css('height', options.height);

            sliderLi
                .css('width', options.width)
                .filter(':nth-child(' + startPosition + ')')
                .addClass('current');

            //Controls (navigation, pagination and progress bar)
            var position, controls, paginator, paginatorLi, progress, progressWidth, progressElapsed, interact = false;

            if ((options.navigator || options.paginator) && sliderLi.length > 1) {
                controls = wrapper
                    .on('selectstart', false)
                    .append('<div class="controls" />')
                    .find('.controls');

                if (options.paginator) {
                    paginator = controls
                        .prepend('<ul class="paginator"/>')
                        .find('.paginator')
                        .hide();

                    sliderLi.each(function () {
                        paginator.append('<li>&nbsp;</li>');
                    });

                    paginatorLi = paginator
                        .find('li')
                        .on('click', function () {
                            if (interact) {
                                position = $(this).index();
                                if ((index - 1) != position) {
                                    sliderLi
                                        .removeClass('current')
                                        .filter(':nth-child(' + ++position + ')')
                                        .addClass('current');
                                    play();
                                }
                            }
                        })
                }
                if (options.navigator) {
                    wrapper
                        .append('<div class="navigatorBox"><img src="/imgs/index/banner_text.png" class="banner_text"><div class="navigatorbar"><div class="navigator prev"><img src="' + imgUrl + 'edslider-prev.png"></div><div class="navigator next"><img src="' + imgUrl + 'edslider-next.png"></div></div></div>')
                        .find('.navigator')
                        .hide()
                        .on('click', function () {
                            var btn = $(this);
                            btn.hasClass('next') && interact && next();
                            btn.hasClass('prev') && interact && prev();
                        });
                }
            }

            progress = wrapper
                .prepend('<div class="progress"/>')
                .find('.progress').width(0);

            !options.progress && progress.height(0);

            //Functions (init, play, next, prev, pause, resume)
            var timeLeft = options.interval,
                current, index, paused;

            function init() {
                progressResize();
                sliderLi.length > 1 ? play() : sliderLi.fadeIn(options.duration);
            }

            function play() {
                progressReset();
                interact = false;
                current = sliderLi
                    .filter('.current')
                    .siblings()
                    .fadeOut(options.animation && options.duration || 0)
                    .end()
                    .fadeIn(options.animation && options.duration || 0, function () {
                        interval();
                    });

                $('.navigator')
                    .add('.paginator')
                    .fadeIn(options.animation && options.duration || 0);

                index = sliderLi.index(current) + 1;

                if (options.paginator) {
                    paginatorLi
                        .removeClass('current')
                        .filter(':nth-child(' + index + ')')
                        .addClass('current');
                }
            }

            function next() {
                sliderLi.removeClass('current');
                if (++index <= sliderLi.length) {
                    current
                        .next()
                        .addClass('current')
                } else {
                    sliderLi
                        .filter(':first-child')
                        .addClass('current');
                }
                play();
            }

            function prev() {
                sliderLi.removeClass('current');
                if (--index >= 1) {
                    current
                        .prev()
                        .addClass('current')
                } else {
                    sliderLi
                        .filter(':last-child')
                        .addClass('current');
                }
                play();
            }

            function pause() {
                paused = true;
                progressElapsed = progress
                    .stop()
                    .width();
                timeLeft = (progressWidth - progressElapsed) * (options.interval / progressWidth);
            }

            function interval() {
                paused = false;
                interact = true;
                progress
                    .stop()
                    .show()
                    .animate({
                        width: '+=' + (progressWidth - progressElapsed)
                    }, timeLeft, 'linear', function () {
                        progressReset();
                        next();
                    });
                hoverControl();
            }

            function progressReset() {
                progress.stop().width(0);
                progressElapsed = 0;
                timeLeft = options.interval;
            }

            function progressResize() {
                $(window)
                    .resize(function () {
                        progressWidth = slider.width();
                        pause();
                        interval();
                    }).resize();
            }

            function hoverControl() {
                if (interact) {
                    if (slider.hasClass('hover')) {
                        pause();
                    } else if (paused) {
                        interval();
                    }
                }
            }

            //Preloading images and init
            var totalImgsUrl = [],
                preloadedImgs = 0;

            sliderLi.each(function () {
                sliderBgImg = $(this).css('background-image').replace(/.*\s?url\([\'\"]?/, '').replace(/[\'\"]?\).*/, '');
                sliderBgImg != 'none' && totalImgsUrl.push(sliderBgImg);
            });

            sliderImg.each(function () {
                totalImgsUrl.push(this.src);
            });

            if (totalImgsUrl) {
                $.each(totalImgsUrl, function (value) {
                    $('<img/>')
                        .hide()
                        .on('load', function () {
                            if (++preloadedImgs == totalImgsUrl.length) {
                                slider.css({
                                    'background-image': 'none',
                                    "width": "100%"
                                });
                                init();
                            } else {
                                slider.css({
                                    'background-image': 'url("' + options.loadImgSrc + '")',
                                    'background-repeat': 'no-repeat',
                                    'background-position': 'center',
                                    "width": "100%"
                                });
                            }
                        })
                        .attr('src', totalImgsUrl[value]);
                });
            } else {
                init();
            }
            
            


            //??????????????????????????????????????????
            var startx,starty,movex,movey,endx,endy,nx,ny,angle;
            var box = document.getElementsByClassName('edslider')[0];
            
            //?????????????????????event???????????????
            function touchs(event){
            
                    //?????????????????????????????????
                event.preventDefault();
                        
                //??????if????????????event.type???????????????????????????
                if(event.type=="touchstart"){
                
                    // console.log('??????');
                    
                    //???????????????????????????????????????????????????
                    var touch = event.touches[0];
                    
                    //????????????????????????X???
                    startx = Math.floor(touch.pageX);
                    
                    //????????????????????????X???
                    starty = Math.floor(touch.pageY);
                    
                    //????????????????????????
                }else if(event.type=="touchmove"){
                
                    // console.log('?????????');
                    var touch = event.touches[0];
                    movex = Math.floor(touch.pageX);
                    movey = Math.floor(touch.pageY);
                    
                    //?????????????????????????????????????????????????????????
                }else if(event.type == "touchend" || event.type == "touchcancel"){
                
                        //???????????????????????????
                    endx = Math.floor(event.changedTouches[0].pageX);
                    endy = Math.floor(event.changedTouches[0].pageY);
                    // console.log('??????');
                    
                    //??????????????????????????????????????????
                    nx = endx-startx;
                    ny = endy-starty;
                    //?????????????????????????????? Math.atan2(y,x)*180/Math.PI
                    angle = Math.atan2(ny, nx) * 180 / Math.PI;
                    
                    if(Math.abs(nx)<=1 && Math.abs(ny)<=1){
                        // console.log('??????????????????');
                        return false;
                    }
                    
                    //??????????????????????????????????????????
                    if(angle<45 && angle>=-45){
                        // console.log('?????????');
                        interact && prev();
                        return false;
                    }else if(angle<135 && angle>=45){
                        // console.log('?????????');
                        return false;
                    }else if((angle<=180 && angle>=135) || (angle>=-180 && angle<-135 )){
                        // console.log('?????????');
                        interact && next();
                        return false;
                    }else if(angle<=-45 && angle >=-135){
                        // console.log('?????????');
                        return false;
                    }
                }
            }
            
            //????????????????????????????????????????????????????????????
            box.addEventListener('touchstart',touchs,false);
            box.addEventListener('touchmove',touchs,false);
            box.addEventListener('touchend',touchs,false);
        });
    }
})(jQuery);