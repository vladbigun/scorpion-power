jQuery(function($) {

    $('.menu-burger').on('click', () => {
        let header = $('.header');
        if(header.hasClass('active')){
            header.find('.header-active-wrapper').css({'opacity' : 0})
            $('body').css({'overflow': 'auto'})
            setTimeout(function () {
                header.removeClass('active')
            }, 600);
        } else{
            header.addClass('active')
            setTimeout(function () {
                header.find('.header-active-wrapper').css({'opacity' : 1})
            }, 1);

            $('body').css({'overflow': 'hidden'})
        }
    })

})