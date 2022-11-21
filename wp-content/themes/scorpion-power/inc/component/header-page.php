<div class="container">
    <div class="header-main">
        <div class="text">
            <h1><?= tf_acf_lang_get_field('page_title') ?></h1>
            <p><?= get_field('page_description') ?></p>
            <?php if(get_field('page_button')):?>
                <a class="button" href="<?= get_field('page_button')['url'] ?>">
                    <?= get_field('page_button')['title'] ?>
                </a>
            <?php endif;?>
            <?php if(get_field('page_contact_active')):?>
                <div class="contact-info">
                    <?php $contacts_info = get_field('contact_info', 'option'); ?>
                    <?php foreach ($contacts_info as $contact):?>
                        <a href="<?= $contact['type'] ?>:<?= $contact['text'] ?>">
                            <img src="<?= $contact['icon'] ?>" alt="">
                            <span><?= $contact['text'] ?></span>
                        </a>
                    <?php endforeach;?>
                </div>
            <?php endif;?>
        </div>
        <div class="img">
            <img src="<?= get_field('page_video') ?>" alt="">
        </div>

    </div>
</div>