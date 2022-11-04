jQuery(function($) {
    let data = {
        'step_1': {
            'items': [],
            'checkbox': ''
        },
        'step_2': {
            'items': [],
        },
    };

    jQuery(document).on('click', '#clouseModalOutstaffing', function (e){
        $('#modal_outstaffing').css({'display': 'none'})
        $('body').css({'overflow': 'unset'})
        location.reload()
    })
    jQuery(document).on('click', '#next-project', function (e){
        e.preventDefault();
        let roles =  document.querySelectorAll(".roles .role");
        [...roles].map(element => {
            let input = element.getElementsByTagName('input');
            let item = {
                'name': input[0].value,
                'value': input[1].value,
            }
            data.step_1.items.push(item)
        });
        let help_check =  document.querySelector(".help-check #help-checkbox ");
        data.step_1.checkbox = help_check.checked;

        let status = false;
        data.step_1.items.map(element => {
            if(element.value != 0) status = true;
        })
        let error_block = $('#outstaffing_form .item-error');

        $(window).scrollTop($('.afterheader').offset().top + $('.afterheader').height())
        if(status || data.step_1.checkbox){
            jQuery('.technologies').css({'display': 'block'});
            jQuery('.project').css({'display': 'none'});
            error_block.css({'display': 'none'});
        } else {

            error_lang_get('outstaffing_error_step_one_lang', (message) => {
                error_block.find('span').text(message);
                error_block.css({'display': 'flex'});
            })
           // error_block.find('span').text(12);

        }
    })
    jQuery(document).on('click', '#next-technologies', function (e){
        e.preventDefault();
        data.step_2 = {
            'items': [],
        };
        let technologies =  document.querySelectorAll(".choose-technologies .technologies-items");

        [...technologies].map(technology => {
            let name_technologies = technology.querySelectorAll('.choose-technologies-h1')[0].innerText;
            let array_technologies = [];

            [...technology.querySelectorAll('label')].map(technology_item => {
                let input = technology_item.getElementsByTagName('input')[0];
                if(input){
                    array_technologies.push({
                        'name' : input.value,
                        'value' : input.checked,
                    })
                }
            });

            data.step_2.items.push({
                'name': name_technologies,
                'technologies' : array_technologies,
            })
        });


        let help_check =  document.querySelector(".help-check #help-checkbox-2");
        data.step_2.checkbox = help_check.checked;


        let status = false;
        data.step_2.items.map(element => {
            element.technologies.map(item => {
                if(item.value) status = true;
            })
        })
        let error_block = $('#outstaffing_form .item-error');

        $(window).scrollTop($('.afterheader').offset().top + $('.afterheader').height())
        if(status || data.step_2.checkbox){
            error_block.css({'display': 'none'});
            jQuery('.period').css({'display': 'block'});
            jQuery('.contact-details').css({'display': 'block'});
            jQuery('.technologies').css({'display': 'none'});
        } else{
            error_lang_get('outstaffing_error_step_two_lang', (message) => {
                error_block.find('span').text(message);
                error_block.css({'display': 'flex'});
            })
        }
    })
    jQuery(document).on('click', '#back-technologies', function (e){
        e.preventDefault();
        jQuery('.technologies').css({'display': 'none'});
        jQuery('.project').css({'display': 'block'});
    })
    jQuery(document).on('click', '#back-contact-details', function (e){
        e.preventDefault();
        jQuery('.contact-details').css({'display': 'none'});
        jQuery('.period').css({'display': 'none'});
        jQuery('.technologies').css({'display': 'block'});
    })

    $("#outstaffing_form").submit(function (e) {
        e.preventDefault();
        submit_contact_form(data);
    });
});
