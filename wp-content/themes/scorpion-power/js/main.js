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

    $('.datalist-input').on('focus', function (el){
        $(this).parent().addClass('active')
    })
    $('.datalist-input').on('focusout', function (el){
        $(this).parent().removeClass('active')
    })
})



class ProgressRingg extends HTMLElement {
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
           r="3"
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
        console.log(this.getAttribute('active'))
        const back = this._root.querySelector('.back-circle');
        const circle = this._root.querySelector('.circle');
        const circle2 = this._root.querySelector('.back-circle-2');

        if(this.getAttribute('active') === 'true'){
            back.style.opacity = 1;
            circle.style.opacity = 1;
            circle2.style.r = 5;

        } else{
            circle.style.opacity = 0;
            back.style.opacity = 0;
            circle2.style.r = 2;
        }

        const offset = this._circumference - (percent / 100 * this._circumference);

        circle.style.strokeDashoffset = offset;
    }

    static get observedAttributes() {
        return ['progress'];
    }

    attributeChangedCallback(name, oldValue, newValue) {
        if (name === 'progress') {
            this.setProgress(newValue);
        }

    }
}
window.customElements.define('progress-ringg', ProgressRingg);


function loaRA(item){
    let autoplaySpeed = 5000;
    let interval = '';

    $(item).find('progress-ring').attr('active', 'false')
    let active_strip = $(item).find('.swiper-pagination-bullet-active');
    let progress = 0;

    active_strip.find('progress-ring').attr('active', 'true')
    $(item).find('progress-ring').attr('progress', 0);

    let item_int = $(item);
    interval = setInterval(() => {
        if(active_strip.find('progress-ring').attr('active') === 'true'){
            item_int.find('progress-ring').attr('progress', ++progress);
        }
        if (progress === 100) clearInterval(interval);
    }, (autoplaySpeed - 1500) / 100);
}
window.addEventListener('DOMContentLoaded', (event) => {


    $('.swiper-a').each((index, item) => {
        let config = {

            direction: 'horizontal',
            navigation: {
                nextEl: '.button-next',
                prevEl: '.button-prev',
            },
            pagination: {
                el: '.pagination',
                clickable: false,
                renderBullet: function (index, className) {
                    return `<div class="${className}">
                            <progress-ringg stroke="3" radius="16" progress="0"></progress-ringg>
                        </div>`;
                },
            },
            autoplay: {
                disableOnInteraction: false,
                delay: 4000,
            },
            scrollbar: {
                el: '.swiper-scrollbar',
                dragSize: 25,
            },
            slidesPerView: $(item).data('number-el-mobile') ?? 1 ,
            spaceBetween: 30,
            breakpoints: {
                800: {
                    slidesPerView: $(item).data('number-el-tablet') ?? 2,
                    spaceBetween: 30,
                },
                1400: {
                    slidesPerView: $(item).data('number-el-desktop') ?? 3,
                    spaceBetween: 30,
                }
            }
        };
        let swiper = new Swiper(item, config);
        loaRA(item);
        swiper.on('slideChange', function () {
            loaRA(item);
        });
    });
});




