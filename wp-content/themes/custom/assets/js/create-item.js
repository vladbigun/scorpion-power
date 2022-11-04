jQuery(function($) {
    const maxElementAdd = 4;
    let elementAddNumber = 1;

    $(document).on('change', '.roles .role:last-child input', function() {
        const inputRole = $(this).parent()
            .clone()
            .find("input.variant-role-name")
            .val("")
            .end();

        let r = (Math.random() + 1).toString(36).substring(7);

        $(this).find('input').attr('name', 'te' + r)
        $(inputRole).find('input').attr('name', 'de' + r)

        $(this).parent().find('.none input').attr('name', 'roles_' +  $(this).val())


        if ($('input.variant-role-name').is(":empty")) {
             $(this).siblings('span').addClass('visible');
        }
        if(elementAddNumber < maxElementAdd && $(this).val()){
            elementAddNumber++;
            $( ".roles" ).append( inputRole );
        }

        if(!$('.role:last-child input').val()){
            $('.role:last-child input').siblings('span').removeClass('visible');
        }
        if(!$(this).val()){
            $(this).parent().find("input.quantity-num").val("0");
        } else{
            $(this).parent().find("input.quantity-num").val("1").end();
        }

    });

    const changeInputNumValue = (val, element) => {
        let inputName = $(element).parents('.role').children('.variant-role-name')
        let inputNumber = $(element).parent().children('input')
        const max_value = inputNumber.attr('max')
        let min_value = inputNumber.attr('min')
        let value = inputNumber.val();
        if(val === 'up' && inputName.val()) ++value;
        else if(val === 'down') --value;


        min_value = inputName.val() && inputName.hasClass('new') ? ++min_value : min_value;
        if(value <= max_value && value >= min_value){
            if(value > 0){
                $(element).parents('.role').addClass('active')
            } else{
                $(element).parents('.role').removeClass('active')
            }
            inputNumber.val(value)
        }
    };
    $('body').on('click', ".quantity-arrow-minus", function(e) {
        changeInputNumValue('down', this);
    });
    $('body').on('click', ".quantity-arrow-plus", function(e) {
        changeInputNumValue('up', this);
    });
    $('.roles').on('click', ".cancel", function() {
        $(this).closest('.variant-role').remove();
        --elementAddNumber;
        $('.role:last-child .variant-role-name').trigger( "change" );
    });
    $(document).on('change', 'input.technologies-checkbox', function() {
        if ($(this).is(':checked')) {
            $(this).parent().addClass("active")
        } else{
            $(this).parent().removeClass("active")
        }
    });
});