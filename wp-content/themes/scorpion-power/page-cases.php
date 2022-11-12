<?php
get_header();
require_once get_template_directory() . '/inc/component/header-page.php';
?>
<?php
$args = [
        'post_type' => 'cases_post'
];
$the_query = new WP_Query( $args );
?>
    <div class="container">
        <div class="archive-items cases">
            <?php if ($the_query->have_posts()) :?>
                <?php while ($the_query->have_posts()) : $the_query->the_post() ?>
                    <div class="archive-item">
                        <div class="item-content">
                            <h3><?= get_the_title() ?></h3>
                            <p class="short-description"><?= get_field('short_description', get_the_ID()) ?> </p>

                            <?php $lists = get_field('lists', get_the_ID()); ?>
                            <?php if($lists) :?>
                                <h4><?= __('Project team') ?></h4>
                                <ul class="team-list">
                                    <?php foreach ($lists as $team):?>
                                        <li><?= $team['count'] . ' ' . $team['name'] ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif;?>
                            <h4><?= __('Project description') ?></h4>
                            <p class="description"><?= get_field('description', get_the_ID()) ?> </p>
                        </div>
                        <div class="img">
                            <?= get_the_post_thumbnail() ?>
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