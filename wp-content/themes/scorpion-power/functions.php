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
require_once get_template_directory() . '/inc/technologies-post-type.php';

require_once get_template_directory() . '/inc/api/contact_form.php';

require_once get_template_directory() . '/inc/component/block/default_block.php';


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
wp_localize_script( 'scorpion_power-js-main', 'scorpion_api', array( 'ajax_url' => admin_url('admin-ajax.php')) );

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



add_action('acf/init', 'my_register_blocks');
function my_register_blocks()
{
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type(array(
            'name' => 'scorpion-contact-form',
            'title' => __('Scorpion Contact Form'),
            'description' => __('A custom Scorpion Contact Form.'),
            'render_callback' => 'acf_block_scorpion_contact_form',
            'enqueue_script' => get_template_directory_uri() . '/template-parts/blocks/contact_form/contact_form.js',
            'render_template'   => get_template_directory() . '/template-parts/blocks/contact_form/contact_form.php',
            'enqueue_style' => get_template_directory_uri() . '/template-parts/blocks/contact_form/contact_form.css',
            'category' => 'formatting',
        ));
    }
}
/**
 * Testimonial Block Callback Function.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
function my_acf_block_render_callback( $block, $content = '', $is_preview = false, $post_id = 0, $wp_block = false, $context = false ) {

    // Create id attribute allowing for custom "anchor" value.
    $id = 'scorpion-contact-form-' . $block['id'];
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

}

add_action( 'after_setup_theme', 'misha_gutenberg_css' );
function misha_gutenberg_css(){
    add_theme_support( 'editor-styles' ); // if you don't add this line, your stylesheet won't be added
    add_editor_style( 'styles/style-editor.css' ); // tries to include style-editor.css directly from your theme folder
}
