<?php
/*
Template Name: technology
*/
?>


<?php get_header(); ?>


<div class="afterheader">
    <div class="container">
        <div class="page-header-content">
            <div>
                <h1><?= get_field('technology_title'); ?></h1>
                <p><?= get_field('technology_description'); ?></p>
            </div>

            <div class="header-img">
                <img src="<?= get_field('technology_image'); ?>"/>
            </div>
        </div>
    </div>
</div>

<?
$post = 0;
switch (get_locale()) {
    case "en_GB": // EN
        $post = 10;
        break;
    case "pl_PL":  //PL
        $post = 547;
        break;
    case "uk": //UA
        $post = 522;
        break;
}
?>
<?// echo "<pre>" ?>
<?// print_r(get_field("technologies_stack", $post)); ?>

<? if (get_field("technologies_stack", $post)): ?>
    <? foreach (get_field("technologies_stack", $post) as $stack): ?>
<!--        --><?//= "<br/>" ?>
<!--        --><?// print_r(rtrim($stack['technology_stack_link']['url'], '/')); ?>
<!--        --><?// print_r(home_url($wp->request)); ?>

        <? if (rtrim($stack['technology_stack_link']['url'], '/') == home_url($wp->request)): ?>
            <div class="container technologies-main">
                <? foreach ($stack['technologies'] as $technology): ?>
                    <div class="technologies-item">
                        <div class="item-content">
                            <h1><?= $technology['technology_name']; ?></h1>
                            <p>
                                <?= $technology['technology_description'] ?>
                            </p>
                            <a class="read-more">
                                <span class="open"><?= pll__('Read more')?></span>
                                <span class="close"><?= pll__('Close')?></span>
                                <svg width="8" height="5" viewBox="0 0 8 5" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.120532 0.37295C0.266632 0.22392 0.495254 0.210372 0.656358 0.332305L0.702513 0.37295L4 3.73671L7.29749 0.37295C7.44359 0.22392 7.67221 0.210372 7.83331 0.332305L7.87947 0.37295C8.02557 0.521979 8.03885 0.755187 7.91931 0.919521L7.87947 0.966603L4.29099 4.62705C4.14489 4.77608 3.91627 4.78963 3.75517 4.6677L3.70901 4.62705L0.120532 0.966603C-0.0401774 0.80267 -0.0401774 0.536882 0.120532 0.37295Z"
                                          fill="#2E5FFF"/>
                                </svg>
                            </a>
                        </div>
                        <div class="item-image">
                            <div class="item-image-border">
                                <img class="top-atom"
                                     src="<?php bloginfo('template_url'); ?>/assets/img/expertise/top-atom.png"/>
                                <img class="bottom-atom"
                                     src="<?php bloginfo('template_url'); ?>/assets/img/expertise/top-atom.png"/>
                                <div class="circle-img"
                                     style="background-image: url('<?= $technology['technology_image'] ?>')"></div>
                            </div>
                        </div>
                    </div>
                <? endforeach ?>
            </div>


        <? endif; ?>
    <? endforeach; ?>
<? endif; ?>


<?php get_footer(); ?>
