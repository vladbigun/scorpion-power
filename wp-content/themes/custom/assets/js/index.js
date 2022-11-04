$("#lang").on("click", function () {
    let lang_dropdown = $(".lang-dropdown");
    if(lang_dropdown.hasClass('show')){
        lang_dropdown.removeClass("show");
    } else{
        lang_dropdown.addClass("show");
    }
});

$(".footer").on("click",  '.technologies',function () {
    let lang_dropdown = $(".footer .technologies");
    if(lang_dropdown.hasClass('show')){
        lang_dropdown.removeClass("show");
    } else{
        lang_dropdown.addClass("show");
    }
});

window.onclick = function (e) {
    if (!e.target.matches('.lang-dropbtn')) {
        var myDropdown = document.getElementById("lang");
        if (myDropdown.classList.contains('show')) {
            myDropdown.classList.remove('show');
        }
    }
}

jQuery(function ($) {

    let contents = document.querySelectorAll('.item-content')
    for (let i = 0; i < contents.length; i++){
        let lenght_p = contents[i].getElementsByTagName('p').length
        console.log(lenght_p)
        if(lenght_p > 3){
            contents[i].querySelector('.read-more').classList.add('more');
        }
    }
    jQuery('.technologies-item').on('click', '.read-more', function () {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active')

            $(this).parent().find('p').css({'display': 'none'});
            $(this).parent().find('p:nth-child(3)').css({'display': 'block'});
            $(this).find('open').css({'display': 'block'})
            $(this).find('close').css({'display': 'none'})
        } else {
            $(this).addClass('active');
            $(this).parent().find('p').css({'display': 'block'})
        }
    })

    function setCookie(key, value, expiry, path = '/') {
        var expires = new Date();
        expires.setTime(expires.getTime() + (expiry * 24 * 60 * 60 * 1000));
        document.cookie = key + '=' + value + ';expires=' + expires.toUTCString() + "; path= " + path;
    }

    function getCookie(key) {
        var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
        return keyValue ? keyValue[2] : null;
    }

    function cookieShow(cookie_block) {
        let cookie_wrapper = jQuery(cookie_block);
        let cookie_name = 'allow_cookie_new';
        if (getCookie(cookie_name) === 'false' || !getCookie(cookie_name)) {
            cookie_wrapper.css({'display': 'block'})
        }
        cookie_wrapper.on('click', '.button.allow', function () {
            cookie_wrapper.css({'display': 'none'})
            setCookie(cookie_name, true)
        });
        cookie_wrapper.on('click', '.button.decline', function () {
            cookie_wrapper.css({'display': 'none'})
            setCookie(cookie_name, false)
        });
    }

    cookieShow('.cookie-container');

    jQuery('body').on('click', '.mobile-menu-button', () => {
        jQuery('.nav-mobile').addClass("active")
        jQuery('body').css({'overflow': 'hidden'})
    })
    jQuery('body').on('click', '.mobile-menu-button-close', () => {
        jQuery('.nav-mobile').removeClass("active")
        jQuery('body').css({'overflow': 'auto'})
    })
    jQuery('body').on('click', '.menu-item.menu-item-children > a', function () {
        let parent = jQuery(this).parent()
        if (parent.hasClass('active')) {
            parent.removeClass('active')
            parent.find('.sub-menu-wrapper').css({'display': 'none'})
        } else {
            parent.addClass('active')
            parent.find('.sub-menu-wrapper').css({'display': 'block'})
        }
    })

})

const validateEmail = (email) => {
    return email.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
};



const varToString = varObj => Object.keys(varObj)[0]

function showErrorMessage(field, forText) {
    if (forText) {
        $('#form_error_message span.name').text(forText);
        $('#form_error_message').addClass('show');
        $('#form_error_message').addClass('show_' + field);

        setTimeout(() => {
            $('#form_error_message').removeClass('show');
            $('#form_error_message').removeClass('show_' + field);
        }, 4000)
    }
}

$("#footer_form").submit(async function (e) {
    e.preventDefault();
    const firstfield = document.getElementById("firstfield");
    const secondfield = document.getElementById("secondfield");
    const thirdfield = document.getElementById("thirdfield");
    const fourthfield = document.getElementById("fourthfield");
    const message = document.getElementById("form_textarea");
    let data_form = {
        'action' : 'action_api_contact_form',
        'fields' : {
            'name' : firstfield.value,
            'company_name' : secondfield.value,
            'email' : thirdfield.value,
            'phone' : fourthfield.value,
            'message' : message.value,
        }
    }
    /*
        if (!firstfield.value) {
            showErrorMessage(varToString({firstfield}), $('#firstfield').attr('name'));
            return false;
        }

        if (!secondfield.value) {
            showErrorMessage(varToString({secondfield}), $('#secondfield').attr('name'))
            return false;
        }


        if (!thirdfield.value) {
            showErrorMessage(varToString({thirdfield}), $('#thirdfield').attr('name'))
            return false;
        }

        if (!validateEmail(thirdfield.value)) {
            showErrorMessage(varToString({thirdfield}), $('#thirdfield').attr('name'))
            return false;
        }

    if (!fourthfield.value) {
        showErrorMessage(varToString({fourthfield}), $('#fourthfield').attr('name'))
        return false;
    }
    if ($('#fourthfield').val().length < 8 || $('#fourthfield').val().length > 12) {
        showErrorMessage(varToString({fourthfield}), $('#fourthfield').attr('name'))
        return false;
    }

    if (!parseInt($('#fourthfield').val().replace(/\D/g, '')) || 0) {
        showErrorMessage(varToString({fourthfield}), $('#fourthfield').attr('name'))
        return false;
    }
    if (!message.value) {
        showErrorMessage(varToString({message}), 'Message')
        return false;
    }
 */
    $(this).find('.submit-btn').attr('disabled', true);
    submit_contact_form_vb(data_form);
});


function submit_contact_form_vb(data) {
    $.ajax({
        url: ajax_object.ajax_url,
        type: 'post',
        data: data,
        success: function (response) {
            $('#footer_form .submit-btn').attr('disabled', false);

            let data = JSON.parse(response)
            if(data.success){
                openModalSuccess();
            } else{
                const before_error = data.errors[0];
                let item_error = $('.input-wrapper.'+ before_error['name_field'] + ' .item-error');
                item_error.css({'display': 'flex'});
                item_error.find('span').text(before_error.error)
                setTimeout(function () {
                    item_error.css({'display': 'none'});
                }, 4000);
            }
        }
    });
}