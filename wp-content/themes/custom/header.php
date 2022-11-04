<?php
/*
Template Name: header
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Space IT</title>

    <?php wp_head(); ?>

<!--                        --><?php //the_meta(); ?>

</head>
<body>
<div class="cookie-container">
    <img src="/wp-content/uploads/2022/10/header-img-3.png"/>
    <div class="cookie-wrapper">
        <p>
            <?= pll__('We use cookies to improve user experience, analyze site usage, and contribute to marketing efforts.
            Please accept cookies for optimal performance.') ?>
        </p>
        <div class="wrapper-button">
            <a class="button allow"><?= pll__('Allow') ?></a>
            <a class="button decline"><?= pll__('Decline') ?></a>
        </div>
    </div>
</div>
<header class="header page-header">
    <div class="container">
        <div class="nav">
            <div class="left-nav">
                <div class="logo">

                    <?php if (get_field('logo')): ?>

                    <?php if(is_front_page()):?>
                            <a href="<?= get_home_url(); ?>"><img src="<?= get_field('light_logo', 'options-' . pll_current_language()); ?>"/></a>
                    <?php else: ?>
                            <a href="<?= get_home_url(); ?>"><img src="<?= get_field('dark_logo', 'options-' . pll_current_language()); ?>"/></a>
                    <?php endif;?>

                    <?php else: ?>
                        <img src="<?php bloginfo('template_url',); ?>/assets/img/Logo.png"/>
                    <?php endif; ?>

                </div>


                <?php $menu_items = wp_get_menu_array('header-nav'); ?>
                <ul class="nav-menu  <?= is_front_page() ? 'homepage' : ''; ?>">
                    <?php foreach ($menu_items as $item) : ?>
                        <?php if (!empty($item['children'])): ?>
                            <li class="menu-item menu-item-has-children">

                                <a href="<?= $item['url'] ?>" title="<?= $item['title'] ?>"><?= $item['title'] ?></a>
                                <ul class="sub-menu">
                                    <?php foreach ($item['children'] as $child): ?>
                                        <li class="b-main-header__sub-menu__nav-item">

                                            <a href="<?= $child['url'] ?>"
                                               title="<?= $child['title'] ?>">
                                                <?php if (wp_get_attachment_image_url($child['thumbnail_id'])): ?>
                                                    <img src="<?= wp_get_attachment_image_url($child['thumbnail_id']) ?>"/>
                                                <?php endif; ?>
                                                <?= $child['title'] ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li class="menu-item">
                                <a href="<?= $item['url'] ?>" title="<?= $item['title'] ?>"><?= $item['title'] ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>


            </div>
            <div class="mobile-menu-button"><img src="<?php bloginfo('template_url',); ?>/assets/img/u_bars.png"/></div>
            <div class="right-nav">

                <?php
                $langs_array = pll_the_languages(array('dropdown' => 1, 'hide_current' => 1, 'raw' => 1));
                ?>

                <div tabindex="0" id="lang" class="lang-dropdown <?= is_front_page() ? 'homepg' : ''; ?>">
                    <span class="lang-button lang-dropbtn">
                        <?= strtoupper(pll_current_language()); ?>
                    </span>

                    <?php if ($langs_array) : ?>
                        <ul class="lang-dropdown-content" id="lang-dropdown">
                            <?php foreach ($langs_array as $lang) : ?>
                                <li><a href="<?= $lang['url']; ?>"><?= strtoupper($lang['slug']); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>


                <?php if (get_field('btn_text')): ?>
                    <a href="<?= get_field('button_link', 'options-' . pll_current_language()); ?>" class="button"><?= get_field('btn_text', 'options-' . pll_current_language()); ?></a>
                <?php endif ?>
            </div>
        </div>

        <div class="nav-mobile">
            <div class="menu-mobile-container">
                <div class="header-mobile">
                    <div class="mobile-menu-button-close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M18.75 5.25L5.25 18.75" stroke="#1F2125" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.75 18.75L5.25 5.25" stroke="#1F2125" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="content-mobile">
                    <ul class="nav-menu  <?php echo is_front_page() ? 'homepage' : ''; ?>">
                        <?php foreach ($menu_items as $item) : ?>
                            <?php if (!empty($item['children'])): ?>
                                <li class="menu-item menu-item-children">
                                    <a href="<?= $item['url'] ?>" title="<?= $item['title'] ?>"><?= $item['title'] ?></a>
                                    <ul class="sub-menu-wrapper">
                                        <?php foreach ($item['children'] as $child): ?>
                                            <li class="b-main-header__sub-menu__nav-item">
                                                <a href="<?= $child['url'] ?>"
                                                   title="<?= $child['title'] ?>">
                                                    <?= $child['title'] ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                            <?php else: ?>
                                <li class="menu-item">
                                    <a href="<?= $item['url'] ?>" title="<?= $item['title'] ?>"><?= $item['title'] ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="footer-mobile">

                    <?php
                    $languages_array = pll_the_languages(array('raw' => 1));
                    ?>
                    <div class="mobile-lang-container">
                        <?php if ($languages_array) : ?>
                            <ul class="mobile-lang-wrap">
                                <?php foreach ($languages_array as $lang) :
                                    $active = (strtoupper(pll_current_language()) == strtoupper($lang['slug'])) ? 'active' : ''?>
                                    <li class="<?= $active ?>">
                                        <a href="<?= $lang['url']; ?>"><?= strtoupper($lang['slug']); ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <?php if (get_field('btn_text')): ?>
                        <a href="<?= get_field('button_link') ?>" class="button"><?= (get_field('btn_text')) ?></a>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</header>