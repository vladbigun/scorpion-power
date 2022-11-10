<div class="container">
    <div class="header-main">
        <div class="text">
            <h1><?= get_field('page_title') ?></h1>
            <p><?= get_field('page_description') ?></p>
            <?php if(get_field('page_button')):?>
                <a class="button" href="<?= get_field('page_button')['url'] ?>">
                    <?= get_field('page_button')['title'] ?>
                </a>
            <?php endif;?>
        </div>
        <div class="img">
            <img src="<?= get_field('page_video') ?>" alt="">
        </div>
    </div>
</div>