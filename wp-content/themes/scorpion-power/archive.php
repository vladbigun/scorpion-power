
<?php get_header() ?>
<div class="container">
    <div class="header-archive">
        <div class="text">
            <h1><?= pll__(post_type_archive_title()) ?></h1>
            <p><?= pll__(get_the_archive_description()) ?></p>
        </div>
        <div class="img"></div>
    </div>

    <div class="archive-items default">
        <?php if (have_posts()) :?>
        <?php while (have_posts()) : the_post() ?>
            <div class="archive-item">
                <div class="img">
                    <?= get_the_post_thumbnail() ?>
                </div>
                <div class="item-content">
                    <h4><?= get_the_title() ?></h4>
                    <p class="description"><?= get_field('description', get_the_ID()) ?> </p>
                </div>
            </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>

<?php get_footer() ?>