<?php
/**
 * Scorpion Power functions and definitions
 *
 * @link https://developer.wordpress.org/
 *
 * @package WordPress
 * @subpackage scorpion_power
 * @since Scorpion Power 0.1
 */

/**
 * Table of Contents:
 * Theme Support
 * Required Files
 * Register Styles
 * Register Scripts
 * Register Menus
 * Custom Logo
 * WP Body Open
 * Register Sidebars
 * Enqueue Block Editor Assets
 * Enqueue Classic Editor Styles
 * Block Editor Settings
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Scorpion 0.1
 */

/**
 * Register and Enqueue Styles.
 *
 * @since Scorpion Power 0.1
 */

require_once get_template_directory() . '/inc/cases-post-type.php';
require_once get_template_directory() . '/inc/expertize-post-type.php';
require_once get_template_directory() . '/inc/services-post-type.php';

add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('custom-logo');
add_theme_support('menus');

register_nav_menus(array(
    'header-nav' => 'Header',
    'language-nav' => 'Language',
    'footer-nav' => 'Footer Social Media',
    'social-nav' => 'Social media',
    'contact-nav' => 'Contacts menu',
));

function scorpion_power_register_styles() {

    $theme_version = wp_get_theme()->get( 'Version' );

    wp_enqueue_style( 'scorpion_power-style', get_theme_file_uri() . '/styles/main.css', array(), $theme_version );
    wp_enqueue_style( 'scorpion_power-main', get_stylesheet_uri(), array(), $theme_version );
    wp_style_add_data( 'scorpion_power-style', 'rtl', 'replace' );
    wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css');

    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
    wp_enqueue_script('jquery');

    wp_enqueue_script('swiper-script', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array(), '', false);

    wp_enqueue_script( 'scorpion_power-js-main', get_template_directory_uri() . '/js/main.js');
}

add_action( 'wp_enqueue_scripts', 'scorpion_power_register_styles' );


if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' => 'General Settings',
        'menu_title' => 'General Theme Settings',
        'menu_slug' => 'theme-settings',
        'capability' => 'edit_posts',
        'icon_url' => 'dashicons-admin-generic',
        'redirect' => false
    ));
    /*
    $translations = pll_the_languages(array('raw' => 1));
    foreach ($translations as $lang) {
        $lang_name = $lang['name'];
        $lang = $lang['slug'];
        acf_add_options_sub_page([
            'page_title' => "Settings - $lang_name",
            'menu_title' => "Settings - $lang_name",
            'menu_slug' => "options-page-${lang}",
            'post_id' => 'options-' . $lang,
            'parent' => 'theme-general-settings',
        ]);
    }
    */
}

