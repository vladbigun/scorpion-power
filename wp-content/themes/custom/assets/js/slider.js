window.addEventListener('DOMContentLoaded', (event) => {
    let swiper = new Swiper('.swiper', {
    // Optional parameters
    direction: 'horizontal',

    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.next',
        prevEl: '.prev',
    },
        autoplay: {
            disableOnInteraction: false,
            delay: 4000,
        },
    // And if we need scrollbar
    scrollbar: {
        el: '.swiper-scrollbar',
        dragSize: 25,
    },
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            // when window width is >= 640px
            640: {
                slidesPerView: 1,
                spaceBetween: 40
            }
        }
    });
    if(swiper.length > 0){
        swiper.map((item, index) => {
            let slide_count = document.querySelectorAll('.slide-count')[index]
            let slide_active = document.querySelectorAll('.slide-active')[index]
            slide_count.innerHTML = item.slides.length

            let slider_strip = document.querySelectorAll('.slider-strip')[index]
            let active_strip = slider_strip.querySelector('.slider-strip-active');
            active_strip.classList.add("animation");

            item.on('slideChange', function () {
                let slider_strip = document.querySelectorAll('.slider-strip')[index]
                let active_strip = slider_strip.querySelector('.slider-strip-active');
                active_strip.classList.remove("animation");
                setTimeout(
                    function(){
                        active_strip.classList.add("animation");
                    },200
                );

                slide_active.innerHTML = item.activeIndex + 1

            });
        })
    }
    let swiper_partners = new Swiper('.swiper-partners', {
        // Optional parameters
        direction: 'horizontal',

        // Navigation arrows
        navigation: {
            nextEl: '.next-el',
            prevEl: '.prev-el',
        },
        pagination: {
            el: ".slider-wrap-status",
            type: "fraction"
        },
        loop: true,
        // And if we need scrollbar
        autoplay: {
            disableOnInteraction: false,
            delay: 4000,
        },
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            // when window width is >= 640px
            640: {
                slidesPerView: 9,
                spaceBetween: 20,
            }
        }
    });
    let active_strip;
    swiper_partners.on('load', function () {
        active_strip = $('.swiper-partners').find('.slider-strip-active');
        active_strip.addClass('animation')
    })
    swiper_partners.on('slideChange', function () {
        active_strip = $('.swiper-partners').find('.slider-strip-active');
        active_strip.removeClass('animation')
        setTimeout(
            function(){
                active_strip.addClass('animation')
            },100
        );
    });
});

