function error_lang_get(error_tag, back) {
    console.log(error_tag)
    let data = {
        'tag' : error_tag,
        'action' : 'action_error_get_lang'
    }
    $.ajax({
        url: ajax_object.ajax_url,
        type: 'post',
        data: data,
        success: function (response) {
            let data = JSON.parse(response)
            back(data.message)
            console.log(data)
        },
    });
}

function submit_contact_form() {
    var fd = new FormData();
    var data = {
        'action' : 'action_api_outstaffing_form',
        'items': []
    };

    fd.append('ideaproContactSubmit', '1');
    fd.append('action', 'action_api_outstaffing_form');

    let elements = document.getElementById("outstaffing_form").elements
    let checkboxElements = [];
    for (let i = 0; i < elements.length; i++) {
        let fieldname = elements[i].getAttribute('name');
        let fieldType = elements[i].getAttribute('type');

        if (fieldname) {
            if (fieldType !== "checkbox" && fieldType !== "radio") {
                // fd.append(fieldname, $(`input[name="${fieldname}"]`).val());

                data.items.push([fieldname, $(`input[name="${fieldname}"]`).val()]);
                fd.append(fieldname, $(`input[name="${fieldname}"]`).val());
            } else if (elements[i].checked) {
                checkboxElements.push(elements[i]);
            }
        }
    }

    if (checkboxElements) {
        for (let i = 0; i < checkboxElements.length; i++) {
            let fieldname = checkboxElements[i].getAttribute('id');
            data.items.push([fieldname, $(`input[name="${fieldname}"]`).val()]);
            fd.append(fieldname, $(`input[id="${fieldname}"]`).val());
        }
    }
    let form_fields = jQuery('.contact-details-form .input-wrapper');
    let status = true;
    for(let j = 0; j < form_fields.length; j++){
        let input_item = $(form_fields[j]).children('input');
        let error_item = $(form_fields[j]).find('.item-error');

        if (status) {
            if (!input_item.val()) {
                status = false;
              //  let text_error = 'Wrong ' + input_item.attr('placeholder') + '!';
                if(input_item.attr('name') != 'isin'){
                    let arr = input_item.attr('name').replace('contact_', '');
                    error_item.find('span').text('');

                    error_lang_get('contact_empty_' + arr + '_lang', (message) => {
                        error_item.find('span').text(message);
                        error_item.css({'display': 'flex'});
                    })
                } else{
                    error_item.css({'display': 'flex'});
                }

                setTimeout(function () {
                    error_item.css({'display': 'none'});
                }, 2000);
            }
            if(status){
                if (input_item.attr('name') == 'contact_isin' && !parseInt(input_item.val().replace(/\D/g, '')) || 0) {
                    status = false;
                    error_item.find('span').text('');
                    error_lang_get('contact_error_isin_lang', (message) => {
                        error_item.find('span').text(message);
                        error_item.css({'display': 'flex'});
                    })
                    setTimeout(function () {
                        error_item.css({'display': 'none'});
                    }, 2000);
                }
                if (input_item.attr('name') == 'contact_email' && !validateEmail(input_item.val())) {
                    status = false;
                    error_item.find('span').text('');
                    error_lang_get('contact_error_email_lang', (message) => {
                        error_item.find('span').text(message);
                        error_item.css({'display': 'flex'});
                    })
                    // error_item.find('span').text(text_error);
                    setTimeout(function () {
                        error_item.css({'display': 'none'});
                    }, 2000);
                }
            }
        }
    }

    if (status) {
        js_submit(fd, submit_contact_form_callback);
    }

}


function openModalSuccess() {
    $('#modal_outstaffing').css({'display': 'flex'})
    $('body').css({'overflow': 'hidden'})
}

function submit_contact_form_callback(jdata) {
    var data = JSON.parse(jdata);
    console.log(data)
    if (data.success) {
        openModalSuccess();
        $("#response_div").html(data.message);

        jQuery('.period').css({'display': 'none'});
        jQuery('.contact-details').css({'display': 'none'});
        jQuery('.project').css({'display': 'block'});
    } else{
        console.log('error send form')
    }
}

function js_submit(fd, callback) {
    $.ajax({
        url: ajax_object.ajax_url,
        type: 'post',
        data: fd,
        contentType: false,
        processData: false,
        success: function (response) {
            callback(response);
        },
    });
}