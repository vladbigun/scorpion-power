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


window.addEventListener('DOMContentLoaded', (event) => {
    let config = {

        direction: 'horizontal',

        pagination: {
            el: '.pagination',
        },

        navigation: {
            nextEl: '.button-next',
            prevEl: '.button-prev',
        },
        /*
        autoplay: {
            disableOnInteraction: false,
            delay: 4000,
        }, */
        scrollbar: {
            el: '.swiper-scrollbar',
            dragSize: 25,
        },
        breakpoints: {}
    };

    $('.swiper').each((index, item) => {
        console.log($(item).attr('data-item'))
        config.breakpoints = {
            1: {
                slidesPerView: 1,
                spaceBetween: 0,
            },
            800: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            1000: {
                slidesPerView: $(item).attr('data-item'),
                spaceBetween: 30,
            }
        }
        new Swiper('.archive-' + $(item).attr('data-type'), config);
    });

});

