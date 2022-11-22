<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/
 *
 * @package WordPress
 * @subpackage Scorpion_Power
 * @since Scorpion Power 0.1
 */

$locations = get_nav_menu_locations();
$menu = wp_get_nav_menu_object($locations['header-nav']);
$menu_items = wp_get_nav_menu_items($menu->term_id, array('order' => 'DESC')) ?? [];

$langs_array = pll_the_languages(array('raw' => 1));

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
		<link rel="profile" href="https://gmpg.org/xfn/11">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>

		<header id="site-header" class="header">
            <div class="header-active-wrapper">
                <div class="container">
                    <div class="header-wrapper">
                        <div class="logo-wrapper">
                            <a href="/">
                                <img class="logo-white" src="<?= get_field('logo_white', 'option')['url'] ?? '' ?> " alt="">
                            </a>
                        </div>
                        <nav class="nav">
                            <div class="block-lang">
                                <?php if ($langs_array) : ?>
                                    <?php foreach ($langs_array as $lang) :?>
                                        <div class="lang-item <?= $lang['current_lang'] ? 'active' : '' ?>">
                                            <a href="<?= $lang['url']; ?>"><?= strtoupper($lang['slug']); ?></a>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <div class="menu-burger main">
                                <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="2.18628" y="0.0649414" width="35" height="3" transform="rotate(45 2.18628 0.0649414)" fill="white"/>
                                    <rect x="0.0649414" y="24.8137" width="35" height="3" transform="rotate(-45 0.0649414 24.8137)" fill="white"/>
                                </svg>
                            </div>
                        </nav>
                    </div>

                    <div class="header-bottom">
                        <img class="default-menu-img" src="<?= get_field('default_menu_img', 'option')['url'] ?> " alt="">

                        <?php foreach ($menu_items as $item):?>
                            <div class="menu-item">
                                <?php if(get_field('image', $item)): ?>
                                    <img class="img" src="<?= get_field('image', $item)['url'] ?> " alt="">
                                <?php endif;?>
                                <a class="link" href="<?= $item->url ?>" title="<?= $item->title ?>"><?= $item->title ?></a>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="mobile-lang-wrapper">
                        <div class="block-lang">
                            <?php if ($langs_array) : ?>
                                <?php foreach ($langs_array as $lang) :?>
                                    <div class="lang-item <?= $lang['current_lang'] ? 'active' : '' ?>">
                                        <a href="<?= $lang['url']; ?>"><?= strtoupper($lang['slug']); ?></a>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="header-wrapper">
                    <div class="logo-wrapper">
                        <a href="/">
                            <img class="logo-black" src="<?= get_field('logo', 'option')['url'] ?? '' ?> " alt="">
                        </a>
                    </div>
                    <nav class="nav">
                        <?php if(get_field('header_button', 'option')): ?>
                            <a class="button contact" href="<?= get_field('header_button', 'option')['url'] ?>">
                                <span><?= get_field('header_button', 'option')['title'] ?></span>

                                <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.5 7.5L8.20711 6.79289L8.91421 7.5L8.20711 8.20711L7.5 7.5ZM2.20711 0.792894L8.20711 6.79289L6.79289 8.20711L0.792893 2.20711L2.20711 0.792894ZM8.20711 8.20711L2.20711 14.2071L0.792894 12.7929L6.79289 6.79289L8.20711 8.20711Z" fill="white"/>
                                </svg>
                            </a>
                        <?php endif;?>
                        <div class="menu-burger main">
                            <svg width="35" height="29" viewBox="0 0 35 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="35" height="3" fill="#1A1818"/>
                                <rect y="13" width="35" height="3" fill="#1A1818"/>
                                <rect y="26" width="35" height="3" fill="#1A1818"/>
                            </svg>
                        </div>
                    </nav>
                </div>
            </div>
		</header>

<?php

