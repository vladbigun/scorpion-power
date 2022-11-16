<div class="container">
    <div class="header-main">
        <div class="text">
            <h1><?= get_field('page_footer_title', 'option') ?></h1>
            <p><?= get_field('page_footer_description', 'option') ?></p>
            <?php if(get_field('page_footer_button', 'option')):?>
                <a class="button contact" href="<?= get_field('page_footer_button', 'option')['url'] ?>">
                    <?= get_field('page_footer_button', 'option')['title'] ?>
                    <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.5 7.5L8.20711 6.79289L8.91421 7.5L8.20711 8.20711L7.5 7.5ZM2.20711 0.792894L8.20711 6.79289L6.79289 8.20711L0.792893 2.20711L2.20711 0.792894ZM8.20711 8.20711L2.20711 14.2071L0.792894 12.7929L6.79289 6.79289L8.20711 8.20711Z" fill="white"/>
                    </svg>
                </a>
            <?php endif;?>
        </div>
        <div class="img">
            <img src="<?= get_field('page_footer_image', 'option') ?>" alt="">
        </div>

    </div>
</div>