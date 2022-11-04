<?php
/*
Template Name: services
*/
?>

<?php get_header(); ?>

    <div class="afterheader">
        <div class="container">
            <div class="page-header-content service">
                <div>
                    <h1><?= get_field('about_title'); ?></h1>
                    <p><?= get_field('about_description'); ?></p>
                </div>

                <div class="header-img">
                    <img src="<?= get_field('about_image'); ?>"/>
                </div>
            </div>
        </div>
    </div>

    <div class="container page-main">


        <? if (get_field('sections') && is_array(get_field('sections'))): ?>
            <? foreach (get_field('sections') as $section): ?>
                <div class="page-item">
                    <div class="item-image">
                        <div class="item-image-border">
                            <img class="top-atom" src="<?= $section['over_image']; ?>"/>
                            <img class="bottom-atom" src="<?= $section['under_image']; ?>"/>
                            <div class="circle-img"
                                 style="background-image: url(<?= $section['image']; ?>)"></div>
                        </div>
                    </div>
                    <div class="item-content">
                        <h6><?php // $section['over_title_text']; ?></h6>
                        <h1><?= $section['title']; ?></h1>
                        <p><?= $section['description_1']; ?></p>
                        <p><?= $section['description_2']; ?></p>
                        <p><?= $section['description_3']; ?></p>

                        <h4 class="tag-header"><?= $section['advantages_title']; ?></h4>

                        <div class="services-tags">
                            <? if ($section['section_advantages']): ?>
                                <? foreach ($section['section_advantages'] as $adv): ?>
                                    <span class="services-tag">
                        <span class="tag-icon">
                            <img src="<?= $adv['adv_icon'] ?>" alt="">
                        </span>
                        <span class="tag-title"><?= $adv['adv_title'] ?></span>
                    </span>
                                    <span class="separator"></span>
                                <? endforeach; ?>
                            <? endif; ?>

                        </div>
                    </div>
                </div>
            <? endforeach; ?>
        <? endif; ?>
    </div>

<?php get_footer(); ?>