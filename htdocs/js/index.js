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