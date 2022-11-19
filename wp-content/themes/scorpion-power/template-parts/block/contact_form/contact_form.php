<?php
$items = get_field('items') ?: [];
?>
    <style>
        .scorpion-contact-form{
            display: flex;
        }
        .scorpion-contact-form *{
            box-sizing: border-box;
        }
        .scorpion-contact-form > .column {
            flex: 1;
        }
        .scorpion-contact-form .column:first-child{
            margin-right: 120px;
        }
        .scorpion-contact-form__fields-wrapper{
            width: 100%;
            display: flex;
            flex-wrap: wrap;
        }
        .scorpion-contact-form__field{
            width: 50%;
            padding: 10px 0;
        }
        .scorpion-contact-form__field:nth-child(2n+1){
            padding-right: 30px;
        }
        .scorpion-contact-form__field input{
            width: 100%;
            height: 50px;
            padding: 0 15px;
            border: 1px solid #AEAEAE;
            border-radius: 5px;
            font-weight: 400;
            font-size: 16px;
            line-height: 150%;
            color: #1A1818;
            opacity: 0.8;
            margin-top: 8px;
        }
        .scorpion-contact-form__field label{
            font-weight: 800;
            font-size: 16px;
            line-height: 22px;
            color: #0B1524;
        }
        .scorpion-contact-form__map{
            background-color: #ccc;
            height: 430px;
        }
        .button.submit{
            background: #8C1429;
            margin-top: 30px;
            min-width: 160px;
        }
        @media (max-width: 800px) {
            .scorpion-contact-form__fields-wrapper{
                padding-top: 30px;
            }
            .scorpion-contact-form{
                flex-direction: column-reverse;
            }
            .scorpion-contact-form .scorpion-contact-form__field{
                width: 100%;
                padding-right: 0;
            }
            .scorpion-contact-form .column:first-child{
                margin-right: 0;
            }
        }
    </style>
<script>
    jQuery(document).ready(function($) {
        $('.scorpion-contact-form form').on('submit', function(e){
            e.preventDefault();
            let fields = [];
            jQuery('.scorpion-contact-form__fields-wrapper input').map((index, item) => {
                fields.push({
                    'name' : $(item).attr('placeholder'),
                    'value' : $(item).val()
                })
            })
            let request = $.ajax({
                type: 'POST',
                data : {
                    action : 'action_api_contact_form',
                    fields : fields
                },
                url: '<?= admin_url('admin-ajax.php') ?>'
            });
            request.done(function(msg) {
                console.log('done', msg)
            });
        });
    });
</script>
<div class="scorpion-contact-form">
    <div class="column">
        <form class="scorpion-contact-form__form" action="" type="post">
            <div class="scorpion-contact-form__fields-wrapper">
                <?php foreach ($items as $item):?>
                    <div class="scorpion-contact-form__field">
                        <label for="<?= $item['name'] ?>"><?= $item['label'] ?></label>
                        <input type="text" name="<?= $item['name'] ?>" placeholder="<?= $item['content'] ?>">
                    </div>
                <?php endforeach; ?>
            </div>
            <input type="submit" class="button submit" value="<?= pll__('Send') ?>">
        </form>
    </div>
    <div class="column">
        <div class="scorpion-contact-form__map">

        </div>
    </div>
</div>
