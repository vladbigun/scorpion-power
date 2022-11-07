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
            <div class="container">
                <div class="header-wrapper">
                    <div class="logo-wrapper">
                        <a href="/">
                            <img src="<?= get_field('logo', 'option')['url'] ?? '' ?> " alt="">
                        </a>
                    </div>
                    <nav class="nav">
                        <a class="button" href="/contact-us">
                            <span>Contact Us</span>
                            <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.5 7.5L8.20711 6.79289L8.91421 7.5L8.20711 8.20711L7.5 7.5ZM2.20711 0.792894L8.20711 6.79289L6.79289 8.20711L0.792893 2.20711L2.20711 0.792894ZM8.20711 8.20711L2.20711 14.2071L0.792894 12.7929L6.79289 6.79289L8.20711 8.20711Z" fill="white"/>
                            </svg>
                        </a>
                        <div class="menu-burger">
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

