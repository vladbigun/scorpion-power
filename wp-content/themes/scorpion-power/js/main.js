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

class ProgressRing extends HTMLElement {
    constructor() {
        super();

        const stroke = this.getAttribute('stroke');
        let radius = this.getAttribute('radius');

        const normalizedRadius = radius - stroke * 2;
        this._circumference = normalizedRadius * 2 * Math.PI;

        this._root = this.attachShadow({mode: 'open'});
        this._root.innerHTML = `
      <svg
        height="${radius * 2}"
        width="${radius * 2}"
       >
        <circle class="back-circle"
           stroke="rgba(26,24,24,0.2)"
           stroke-dasharray="500,500"
           style="stroke-dashoffset:${this._circumference}"
           stroke-width="${stroke}"
           fill="transparent"
           r="${normalizedRadius}"
           cx="${radius}"
           cy="${radius}"
        />
       <circle class="circle"
           stroke="rgba(26,24,24,1)"
           stroke-dasharray="${this._circumference} ${this._circumference}"
           style="stroke-dashoffset:${this._circumference}"
           stroke-width="${stroke}"
           fill="transparent"
           r="${normalizedRadius}"
           cx="${radius}"
           cy="${radius}"
        />
        <circle class="back-circle-2"
           stroke="rgba(26,54,24,1)"
           stroke-dasharray="500,500"
           style="stroke-dashoffset:${this._circumference}"
           stroke-width="${stroke}"
           fill="transparent"
           r="2"
           cx="${radius}"
           cy="${radius}"
        />
       
      </svg>

      <style>
      
        circle {
          /*transition: stroke-dashoffset 0.35s;*/
          transform: rotate(-90deg);
          transform-origin: 50% 50%;
        }
      </style>
    `;
    }

    setProgress(percent) {
        const back = this._root.querySelector('.back-circle');
      //  back.style.opacity = 1;
        if (percent == 0) {
          //  back.style.opacity = 0;
        }
        const offset = this._circumference - (percent / 100 * this._circumference);
        const circle = this._root.querySelector('.circle');
      //  circle.style.opacity = 1;

        if (percent == 0) {
           // circle.style.opacity = 0;
        }
        circle.style.strokeDashoffset = offset;
    }

    static get observedAttributes() {
        return ['progress'];
    }

    attributeChangedCallback(name, oldValue, newValue) {
        
        if(name === 'active'){
            if(newValue)
        }
        if (name === 'progress') {
            this.setProgress(newValue);
        }
    }
}
window.customElements.define('progress-ring', ProgressRing);

window.addEventListener('DOMContentLoaded', (event) => {
    let config = {

        direction: 'horizontal',

        pagination: {
            el: '.pagination',
            clickable: true,

            renderBullet: function (index, className) {
                return `<div class="${className}">
                            <progress-ring stroke="3" radius="20" progress="0"></progress-ring>
                        </div>`;
            },
        },

        navigation: {
            nextEl: '.button-next',
            prevEl: '.button-prev',
        },

        autoplay: {
            disableOnInteraction: false,
            delay: 4000,
        },
        scrollbar: {
            el: '.swiper-scrollbar',
            dragSize: 25,
        },
        breakpoints: {}
    };

    $('.swiper').each((index, item) => {
        console.log(item)
        console.log($(item).attr('data-item'))
        config.breakpoints = {
            1: {
                slidesPerView: 1,
                spaceBetween: 30,
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
        let swiper = new Swiper(item, config);

        swiper.on('slideChange', function (el) {
            console.log('slideChange')
            let autoplaySpeed = 3000;
            let interval = '';

            $(item).find('progress-ring').attr('active', false)
            let active_strip = $(item).find('.swiper-pagination-bullet-active');
            active_strip.find('progress-ring').attr('active', true)

           // jQuery('.progress progress-ring').attr('progress', 0)
            let progress = 0;


            interval = setInterval(() => {
                $(item).find('progress-ring').attr('progress', ++progress);
                if (progress === 100)
                    clearInterval(interval);
            }, (autoplaySpeed - 1500) / 100);
        });
    });

});



