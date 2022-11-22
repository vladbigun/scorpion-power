jQuery(document).ready(function($) {
    let clearFieldError = (th) => {
        th.find('input, textarea, select').map((index, item) => {
            if( $(item).attr('type') == 'submit') return;
            $(item).removeClass('error')
            $(item).parent().find('.scorpion-contact-form__field-error').text('')
        })
    }
    let clearFieldValue = (th) => {
        th.find('input, textarea, select').map((index, item) => {
            if( $(item).attr('type') == 'submit') return;
            $(item).val('')
        })
    }
    let addFieldError = (th, data) => {
        th.find('input, textarea, select').map((index, item) => {
            data.errors.map((error) => {
                if($(item).attr('name') == error.field){
                    $(item).addClass('error');
                    $(item).parent().find('.scorpion-contact-form__field-error').text(error.error)
                }
            })
        })
    }
    let generateArrayFields = (th) => {
        let fields = [];
        th.find('input, textarea, select').map((index, item) => {
            fields.push({
                'name' : $(item).attr('name'),
                'placeholder' : $(item).attr('placeholder'),
                'value' : $(item).val(),
            })
        })
        return fields;
    }
    $('.scorpion-contact-form form').on('submit', function(e){
        e.preventDefault();

        let this_element = $(this);
        let fields = generateArrayFields(this_element)

        this_element.find('.submit').attr('disabled', 'disabled')
        let request = $.ajax({
            type: 'POST',
            data : {
                action : 'action_api_contact_form',
                fields : fields,
                block_id: $(this).data('block-id'),
                post_id: $(this).data('post-id')
            },
            url: $(this).data('url')
        });
        request.done(function(msg) {
            clearFieldError(this_element)
            const data = JSON.parse(msg);
            if(data.success){
                clearFieldValue(this_element);
                $('.modal-success').addClass('active');
            } else {
                addFieldError(this_element, data)
            }
            this_element.find('.submit').removeAttr('disabled');
        });
    });
});