//  menú hamburguesa
var isActive = false;
$('.menu').on('click', function () {
    if(isActive){
        $('.menu').removeClass('active');
        $('body').removeClass('menu-open');
    }else{
        $(this).addClass('active');
        $('body').addClass('menu-open');
    }
    isActive = !isActive;
});