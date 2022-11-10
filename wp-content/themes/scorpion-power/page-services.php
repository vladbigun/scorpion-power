<?php get_header() ?>
<?php
$args = [
    'post_type' => 'services_post'
];
$the_query = new WP_Query( $args );
?>
    <div class="container">
        <div class="archive-items default">
            <?php if ($the_query->have_posts()) :?>
                <?php while ($the_query->have_posts()) : $the_query->the_post() ?>
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