<div class="container">
    <div class="header-main">
        <div class="text">
            <h1><?= get_field('page_footer_title', 'option') ?></h1>
            <p><?= get_field('page_footer_description', 'option') ?></p>
            <?php if(get_field('page_footer_button', 'option')):?>
                <a class="button" href="<?= get_field('page_footer_button', 'option')['url'] ?>">
                    <?= get_field('page_footer_button', 'option')['title'] ?>
                </a>
            <?php endif;?>
        </div>
        <div class="img">
            <img src="<?= get_field('page_footer_image', 'option') ?>" alt="">
        </div>

    </div>
</div>