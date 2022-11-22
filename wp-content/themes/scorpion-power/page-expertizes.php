<?php
get_header();
require_once get_template_directory() . '/inc/component/header-page.php';
?>
<?php
$args = [
    'posts_per_page' => 50,
    'post_type' => 'expertizes_post'
];
$the_query = new WP_Query( $args );
?>
    <style>

    </style>
    <div class="container p-t-50 p-b-50">
        <div class="archive-items default">
            <?php if ($the_query->have_posts()) :?>
                <?php while ($the_query->have_posts()) : $the_query->the_post() ?>
                    <div class="archive-item">
                        <div class="img">
                            <?= get_the_post_thumbnail() ?>
                        </div>
                        <div class="item-content">
                            <h4><?= get_the_title() ?></h4>
                            <?php if(get_field('position_list') == 'top' && get_field('list')): ?>
                                <ul class="block-list horizontal">
                                    <?php foreach (get_field('list')  as $team):?>
                                        <li class="item"><?= $team['name'] ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <p class="description"><?= get_field('description', get_the_ID()) ?> </p>
                        </div>
                        <?php if(get_field('position_list') == 'bottom' && get_field('list')): ?>
                            <ul class="block-list vertical">
                                <?php foreach (get_field('list')  as $team):?>
                                    <li class="item"><?= $team['name'] ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>

<?php
require_once get_template_directory() . '/inc/component/footer-page.php';
get_footer()
?>