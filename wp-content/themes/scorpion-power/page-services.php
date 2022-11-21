<?php
get_header() ;
require_once get_template_directory() . '/inc/component/header-page.php';
?>
<?php
$args = [
    'posts_per_page' => 50,
    'post_type' => 'services_post'
];
$the_query = new WP_Query( $args );
?>
    <style>
        .archive-items .icon-wrapper{
            width: 260px;
            height: 260px;
            position: absolute;
            z-index: 40;
            right: -80px;
            bottom: -80px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .archive-items .icon-wrapper .icon-bg{
            width: 100%;
            height: 100%;
            background: linear-gradient(76.66deg, #002026 13.13%, #0B798D 85.53%);
            border-radius: 50%;
            opacity: 0.5;
            position: absolute;
        }
        .archive-items .icon-wrapper .icon{
            opacity: 1;
            position: absolute;
            filter: saturate(0) brightness(0) invert();
        }
    </style>
    <div class="container">
        <div class="archive-items default">
            <?php if ($the_query->have_posts()) :?>
                <?php while ($the_query->have_posts()) : $the_query->the_post() ?>
                    <div class="archive-item">
                        <div class="img">
                            <?= get_the_post_thumbnail() ?>
                            <?php if(get_field('image_icon')):?>
                                <div class="icon-wrapper">
                                    <div class="icon-bg"></div>
                                    <img class="icon" src="<?= get_field('image_icon')['url'] ?>" alt="">
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="item-content">
                            <h4><?= get_the_title() ?></h4>
                            <?php if(get_field('position_list') == 'top' && get_field('list')): ?>
                                <div class="block-list horizontal">
                                    <?php foreach (get_field('list')  as $team):?>
                                        <div class="item"><?= $team['name'] ?></div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <p class="description"><?= get_field('description', get_the_ID()) ?> </p>
                            <?php if(get_field('position_list') == 'bottom' && get_field('list')): ?>
                                <div class="block-list horizontal">
                                    <?php foreach (get_field('list')  as $team):?>
                                        <div class="item"><?= $team['name'] ?></div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>

<?php
require_once get_template_directory() . '/inc/component/footer-page.php';
get_footer()
?>