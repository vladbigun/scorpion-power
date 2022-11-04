<?php
/*
Template Name: homeD
*/

?>

<?php get_header(); ?>

<style>
    .header, .afterheader-homepg {
        background-color: #1f2125;
    }
    .mobile-menu-button img{
        filter: unset;
    }
    .page-header .nav {
        margin-bottom: 0;
    }

    .nav a {
        color: #ffffff !important;
        text-decoration: none;
        position: relative;
        font-weight: 400;
        font-size: 14px;
        line-height: 165%;
    }

</style>

<? // var_dump(get_field('top_page_title', pll_current_language())); ?>

<div class="afterheader afterheader-homepg">
    <div class="container">
        <div class="header-content">
            <div class="item-text">
                <h1><?= get_field('top_page_title'); ?></h1>
                <p><?= get_field('top_page_description'); ?></p>
                <a href="<?= get_field('top_button_link'); ?>"
                   class="button"><?= get_field('top_button_text'); ?></a>
            </div>
            <div class="header-img">
                <img src="<?= get_field('header_image')['url']; ?>"/>
            </div>
        </div>
    </div>
</div>


<div class="main">
    <div class="container experts">
        <h1><?= get_field('experts_header'); ?></h1>
        <p><?= get_field('experts_description'); ?></p>
        <a href="<?= get_field('experts_button_link'); ?>" class="main-button"><?= get_field('experts_button_text'); ?></a>

        <? if (get_field('experts_slider') && is_array(get_field('experts_slider'))): ?>
            <div class="swiper hidden-840">
                <div class="swiper-wrapper">

                    <? $chunks_experts = array_chunk(get_field('experts_slider'), 4); ?>
                    <?php foreach ($chunks_experts as $key => $item): ?>
                        <div class="slider swiper-slide">
                            <?php foreach ($item as $elem): ?>
                                <div class="item">
                                    <h3>
                                        <img src="<?= $elem['image']["url"] ?>" alt="">
                                        <span><?= $elem['title'] ?></span>
                                    </h3>
                                    <p> <?= $elem['description'] ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="slider-navigation">
                    <div class="slider-status">
                        <div class="slider-wrap-status">
                            <span class="slide-active">1</span>
                            /
                            <span class="slide-count">1</span>
                        </div>
                        <div class="slider-strip">
                            <div class="slider-strip-active"></div>
                        </div>
                    </div>
                    <div class="slider-buttons">
                        <a href="" class="prev">
                            <svg width="6" height="12" viewBox="0 0 6 12" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.83607 0.827336C6.03477 1.02214 6.05284 1.32696 5.89026 1.54177L5.83607 1.60331L1.35106 5.99996L5.83607 10.3966C6.03477 10.5914 6.05284 10.8962 5.89026 11.111L5.83607 11.1726C5.63736 11.3674 5.32642 11.3851 5.1073 11.2257L5.04453 11.1726L0.163933 6.38795C-0.0347738 6.19315 -0.0528382 5.88832 0.10974 5.67351L0.163933 5.61197L5.04453 0.827336C5.26311 0.613056 5.61749 0.613056 5.83607 0.827336Z"
                                      fill="white"/>
                            </svg>
                        </a>
                        <a href="" class="next">
                            <svg width="6" height="12" viewBox="0 0 6 12" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.163933 11.1727C-0.0347736 10.9779 -0.0528378 10.673 0.10974 10.4582L0.163933 10.3967L4.64894 6.00004L0.163933 1.60339C-0.0347736 1.40859 -0.0528378 1.10376 0.10974 0.888958L0.163933 0.827417C0.362639 0.632618 0.673582 0.614909 0.892695 0.774291L0.95547 0.827417L5.83607 5.61205C6.03477 5.80685 6.05284 6.11168 5.89026 6.32649L5.83607 6.38803L0.95547 11.1727C0.736893 11.3869 0.38251 11.3869 0.163933 11.1727Z"
                                      fill="white"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="swiper swiper-mobile">
                <div class="swiper-wrapper">

                    <? $chunks_experts = array_chunk(get_field('experts_slider'), 2); ?>
                    <?php foreach ($chunks_experts as $key => $item): ?>
                        <div class="slider swiper-slide">
                            <?php foreach ($item as $elem): ?>
                                <div class="item">
                                    <h3>
                                        <img src="<?= $elem['image']["url"] ?>" alt="">
                                        <span><?= $elem['title'] ?></span>
                                    </h3>
                                    <p> <?= $elem['description'] ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="slider-navigation">
                    <div class="wrapper-slider-buttons">
                        <div class="slider-status">
                            <div class="slider-wrap-status">
                                <span class="slide-active">1</span>
                                /
                                <span class="slide-count">1</span>
                            </div>
                            <div class="slider-strip">
                                <div class="slider-strip-active"></div>
                            </div>
                        </div>
                        <div class="slider-buttons">
                            <a href="" class="prev">
                                <svg width="6" height="12" viewBox="0 0 6 12" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.83607 0.827336C6.03477 1.02214 6.05284 1.32696 5.89026 1.54177L5.83607 1.60331L1.35106 5.99996L5.83607 10.3966C6.03477 10.5914 6.05284 10.8962 5.89026 11.111L5.83607 11.1726C5.63736 11.3674 5.32642 11.3851 5.1073 11.2257L5.04453 11.1726L0.163933 6.38795C-0.0347738 6.19315 -0.0528382 5.88832 0.10974 5.67351L0.163933 5.61197L5.04453 0.827336C5.26311 0.613056 5.61749 0.613056 5.83607 0.827336Z"
                                          fill="white"/>
                                </svg>
                            </a>
                            <a href="" class="next">
                                <svg width="6" height="12" viewBox="0 0 6 12" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.163933 11.1727C-0.0347736 10.9779 -0.0528378 10.673 0.10974 10.4582L0.163933 10.3967L4.64894 6.00004L0.163933 1.60339C-0.0347736 1.40859 -0.0528378 1.10376 0.10974 0.888958L0.163933 0.827417C0.362639 0.632618 0.673582 0.614909 0.892695 0.774291L0.95547 0.827417L5.83607 5.61205C6.03477 5.80685 6.05284 6.11168 5.89026 6.32649L5.83607 6.38803L0.95547 11.1727C0.736893 11.3869 0.38251 11.3869 0.163933 11.1727Z"
                                          fill="white"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <a href="#" class="main-button mobile">Learn more</a>
                </div>
            </div>


        <? endif ?>
    </div>
    <div class="container we-are">
        <div class="block-image">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/we-are.png"/>
        </div>
        <div class="content">
            <h1><?= get_field('who_are_we_title') ?></h1>
            <div class="item-columns">
                <div>
                    <p><?= get_field('who_are_we_description_1'); ?></p>
                </div>
            </div>
            <a href="<?= get_field('who_are_we_button_link'); ?>" class="main-button mobile"><?= get_field('who_are_we_button_text'); ?></a>
        </div>
    </div>

    <div class="container we-do">
        <h1> <?= get_field('what_we_do_title'); ?></h1>
        <a href="<?= get_field('what_we_do_button_link'); ?>"
           class="main-button"><?= get_field('what_we_do_button_text'); ?></a>

        <? if (get_field('what_we_do_slider') && is_array(get_field('what_we_do_slider'))): ?>
            <div class="swiper hidden-840">
                <div class="swiper-wrapper">

                    <? $chunks_experts = array_chunk(get_field('what_we_do_slider'), 4); ?>
                    <?php foreach ($chunks_experts as $key => $item): ?>
                        <div class="slider swiper-slide">
                            <?php foreach ($item as $elem): ?>
                                <div class="item">
                                    <h3>
                                        <img src="<?= $elem['image']["url"] ?>" alt="">
                                        <span><?= $elem['title'] ?></span>
                                    </h3>
                                    <p> <?= $elem['description'] ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="slider-navigation">
                    <div class="slider-status">
                        <div class="slider-wrap-status">
                            <span class="slide-active">1</span>
                            /
                            <span class="slide-count">1</span>
                        </div>
                        <div class="slider-strip">
                            <div class="slider-strip-active"></div>
                        </div>
                    </div>
                    <div class="slider-buttons">
                        <a href="" class="prev">
                            <svg width="6" height="12" viewBox="0 0 6 12" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.83607 0.827336C6.03477 1.02214 6.05284 1.32696 5.89026 1.54177L5.83607 1.60331L1.35106 5.99996L5.83607 10.3966C6.03477 10.5914 6.05284 10.8962 5.89026 11.111L5.83607 11.1726C5.63736 11.3674 5.32642 11.3851 5.1073 11.2257L5.04453 11.1726L0.163933 6.38795C-0.0347738 6.19315 -0.0528382 5.88832 0.10974 5.67351L0.163933 5.61197L5.04453 0.827336C5.26311 0.613056 5.61749 0.613056 5.83607 0.827336Z"
                                      fill="white"/>
                            </svg>
                        </a>
                        <a href="" class="next">
                            <svg width="6" height="12" viewBox="0 0 6 12" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.163933 11.1727C-0.0347736 10.9779 -0.0528378 10.673 0.10974 10.4582L0.163933 10.3967L4.64894 6.00004L0.163933 1.60339C-0.0347736 1.40859 -0.0528378 1.10376 0.10974 0.888958L0.163933 0.827417C0.362639 0.632618 0.673582 0.614909 0.892695 0.774291L0.95547 0.827417L5.83607 5.61205C6.03477 5.80685 6.05284 6.11168 5.89026 6.32649L5.83607 6.38803L0.95547 11.1727C0.736893 11.3869 0.38251 11.3869 0.163933 11.1727Z"
                                      fill="white"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="swiper swiper-mobile">
                <div class="swiper-wrapper">

                    <? $chunks_experts = array_chunk(get_field('what_we_do_slider'), 2); ?>
                    <?php foreach ($chunks_experts as $key => $item): ?>
                        <div class="slider swiper-slide">
                            <?php foreach ($item as $elem): ?>
                                <div class="item">
                                    <h3>
                                        <img src="<?= $elem['image']["url"] ?>" alt="">
                                        <span><?= $elem['title'] ?></span>
                                    </h3>
                                    <p> <?= $elem['description'] ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="slider-navigation">
                    <div class="wrapper-slider-buttons">
                        <div class="slider-status">
                            <div class="slider-wrap-status">
                                <span class="slide-active">1</span>
                                /
                                <span class="slide-count">1</span>
                            </div>
                            <div class="slider-strip">
                                <div class="slider-strip-active"></div>
                            </div>
                        </div>
                        <div class="slider-buttons">
                            <a href="" class="prev">
                                <svg width="6" height="12" viewBox="0 0 6 12" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.83607 0.827336C6.03477 1.02214 6.05284 1.32696 5.89026 1.54177L5.83607 1.60331L1.35106 5.99996L5.83607 10.3966C6.03477 10.5914 6.05284 10.8962 5.89026 11.111L5.83607 11.1726C5.63736 11.3674 5.32642 11.3851 5.1073 11.2257L5.04453 11.1726L0.163933 6.38795C-0.0347738 6.19315 -0.0528382 5.88832 0.10974 5.67351L0.163933 5.61197L5.04453 0.827336C5.26311 0.613056 5.61749 0.613056 5.83607 0.827336Z"
                                          fill="white"/>
                                </svg>
                            </a>
                            <a href="" class="next">
                                <svg width="6" height="12" viewBox="0 0 6 12" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.163933 11.1727C-0.0347736 10.9779 -0.0528378 10.673 0.10974 10.4582L0.163933 10.3967L4.64894 6.00004L0.163933 1.60339C-0.0347736 1.40859 -0.0528378 1.10376 0.10974 0.888958L0.163933 0.827417C0.362639 0.632618 0.673582 0.614909 0.892695 0.774291L0.95547 0.827417L5.83607 5.61205C6.03477 5.80685 6.05284 6.11168 5.89026 6.32649L5.83607 6.38803L0.95547 11.1727C0.736893 11.3869 0.38251 11.3869 0.163933 11.1727Z"
                                          fill="white"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <a href="#" class="main-button mobile">Learn more</a>
                </div>
            </div>
        <? endif ?>
    </div>

    <div class="container expert-team">
        <div class="block-image">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/expert-team.png"/>
        </div>
        <div class="content">
            <!--            <h1>Who <span>We Are</span></h1>-->
            <h1><?= get_field('who_we_are_title'); ?></h1>
            <div class="item-columns">
                <div>
                    <p><?= get_field('who_we_are_description_1'); ?></p>
                </div>
            </div>
            <a href="<?= get_field('who_we_are_button_link'); ?>"
               class="main-button"><?= get_field('who_we_are_button_text'); ?></a>
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


    <?
    $tmp = get_field("technologies_stack", $post);
    if (isset($tmp) && is_array($tmp)) : ?>
        <div class="container we-use">
            <h1><?= get_field('technologies_we_use_title'); ?></h1>
            <div class="use-technologies">
                <?php foreach ($tmp as $key => $item): ?>
                    <ul class="technologies-items">
                        <li>
                            <a href="<?= trim($item['technology_stack_link']['url']); ?>">  <?= $item['technologies_stack_name']; ?> </a>
                            <span class="link-arrow"></span>
                        </li>
                        <?php foreach ($item['technologies'] as $tech): ?>
                            <li>
                                <img src="<?= $tech['technology_image']; ?>">
                                <span><?= $tech['technology_name'] ?></span>
                            </li>
                        <? endforeach; ?>
                    </ul>
                <? endforeach; ?>


            </div>
        </div>
    <? endif; ?>


    <div class="container we-trust">
        <h1><?= get_field('partners_we_trust_title'); ?></h1>
        <ul class="partners-block">


            <?php foreach (get_field('partners_we_trust_images') as $img): ?>
                <li><img src="<?= $img['image']['url'] ?>"/></li>
            <? endforeach; ?>
        </ul>
    </div>


</div>

<?php get_footer(); ?>


