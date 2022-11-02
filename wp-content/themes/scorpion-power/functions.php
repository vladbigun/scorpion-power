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
function scorpion_power_register_styles() {

    $theme_version = wp_get_theme()->get( 'Version' );

    wp_enqueue_style( 'scorpion_power-style', get_theme_file_uri() . '/styles/main.css', array(), $theme_version );
    wp_enqueue_style( 'scorpion_power-main', get_stylesheet_uri(), array(), $theme_version );

    wp_style_add_data( 'scorpion_power-style', 'rtl', 'replace' );

    // Add output of Customizer settings as inline style.
  //  wp_add_inline_style( 'scorpion_power-style', twentytwenty_get_customizer_css( 'front-end' ) );

    // Add print CSS.
  //  wp_enqueue_style( 'scorpion_power-print-style', get_template_directory_uri() . '/print.css', null, $theme_version, 'print' );

}

add_action( 'wp_enqueue_scripts', 'scorpion_power_register_styles' );