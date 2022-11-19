<?php
add_action( 'init', fn() => add_shortcode( 'footag', function ($test) {
    var_dump($test);
?>
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
<?php
}));
?>

<?php
function wpdocsq_the_shortcode_func( $atts ) {
    $attributes = shortcode_atts( array(
        'title' => 'test title',
        'description' => 'description empty',
    ), $atts );
    ob_start();
    ?>

    <div class="container">
        <div class="header-main">
            <div class="text">
                <h1><?= $attributes['title'] ?></h1>
                <p><?= $attributes['title'] ?></p>
                <!--
                <?php if(get_field('page_button')):?>
                    <a class="button" href="<?= get_field('page_button')['url'] ?>">
                        <?= get_field('page_button')['title'] ?>
                    </a>
                <?php endif;?> -->
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'scorpion_default_shortcode', 'wpdocsq_the_shortcode_func' );
