<?php
$items = get_field('items') ?: [];
?>
<div class="modal-success">
    <div class="modal-success__container">
        <h5><?= get_field('success_object')['title'] ?></h5>
        <span><?= get_field('success_object')['content'] ?></span>
        <button class="button contact" onclick="$('.modal-success').removeClass('active')"><?= pll__('Ok') ?></button>
    </div>
</div>

<div class="scorpion-contact-form__wrapper">
    <div class="scorpion-contact-form__title">
        <h3><?= get_field('title') ?> </h3>
        <p><?= get_field('description') ?></p>
    </div>
</div>
<div class="scorpion-contact-form">
    <div class="column">
        <form data-post-id="<?= get_the_ID() ?>" data-url="<?= admin_url('admin-ajax.php') ?>" data-block-id="<?= $block['id'] ?>" class="scorpion-contact-form__form" action="" type="post">
            <div class="scorpion-contact-form__fields-wrapper">
                <?php foreach ($items as $item):?>
                    <?php
                        $width_field = $item['width'] ?? 50;
                        $styles = "width: $width_field%;";
                        if($width_field == 100) {
                            $styles .= "padding-right: 0;";
                            $styles .= "padding-left: 0;";
                        }
                    ?>

                    <div class="scorpion-contact-form__field" style="<?= $styles ?>">
                        <div class="scorpion-contact-form__field-text">
                            <label for="<?= $item['name'] ?>"><?= $item['text_group']['label'] ?> <?= $item['required'] ? '*' : '' ?> </label>
                            <div class="scorpion-contact-form__field-error"></div>
                        </div>
                        <?php if($item['type_group']['type'] == 'select'): ?>

                        <div class="datalist-wrapper">
                            <input class="input datalist-input" type="text" placeholder="<?= $item['text_group']['content'] ?>" name="<?= $item['name'] ?>" list="<?= $item['name'] ?>-id">
                            <datalist id="<?= $item['name'] ?>-id">
                                <option value=""><?= $item['text_group']['content'] ?></option>
                                <?php foreach ($item['type_group']['select'] as $option):?>
                                    <option value="<?= $option['name'] ?>"></option>
                                <?php endforeach;?>
                            </datalist>
                        </div>

                        <?php elseif($item['type_group']['type'] == 'textarea'): ?>
                            <textarea class="input" name="<?= $item['name'] ?>" rows="5" placeholder="<?= $item['text_group']['content'] ?>"></textarea>
                        <?php else: ?>
                            <input class="input" type="<?= $item['type_group']['type'] ?>" name="<?= $item['name'] ?>" placeholder="<?= $item['text_group']['content'] ?>">
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <input type="submit" class="button submit" value="<?= pll__('Send') ?>" formnovalidate>
        </form>
    </div>
    <div class="column">
        <div class="scorpion-contact-form__map">
            <iframe src="<?= get_field('map_src')?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>
