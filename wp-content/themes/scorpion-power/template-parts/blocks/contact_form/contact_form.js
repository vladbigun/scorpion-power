jQuery(document).ready(function($) {
    let clearField = () => {
        $('.scorpion-contact-form__fields-wrapper input').map((index, item) => {
            $(item).val('')
            $(item).removeClass('error')
            $(item).parent().find('.scorpion-contact-form__field-error').text('')
        })
    }

    $('.scorpion-contact-form form').on('submit', function(e){
        e.preventDefault();
        let fields = [];
        let th = $(this);
        $(this).find('input, textarea, select').map((index, item) => {
            fields.push({
                'name' : $(item).attr('name'),
                'placeholder' : $(item).attr('placeholder'),
                'value' : $(item).val(),
            })
        })

        $(this).find('.submit').attr('disabled', 'disabled')
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
            let data = JSON.parse(msg);
            console.log('telegram send data', data);
            clearField()
            if(data.success){
                $('.modal-success').addClass('active');
            } else {
                th.find('input, textarea, select').map((index, item) => {
                    console.log('item', item);
                    data.errors.map((error) => {
                        console.log('error', error);
                        if($(item).attr('name') == error.field){
                            $(item).addClass('error');
                            $(item).parent().find('.scorpion-contact-form__field-error').text(error.error)
                        }
                    })
                })
            }
            $('.scorpion-contact-form form .submit').removeAttr('disabled');
        });
    });
});