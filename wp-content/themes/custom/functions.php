<?php
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('custom-logo');

add_filter('upload_mimes', 'svg_upload_allow');

register_nav_menus(array(
    'header-nav' => 'Header',
    'language-nav' => 'Language',
    'footer-nav' => 'Footer Social Media',
    'social-nav' => 'Social media',
    'contact-nav' => 'Contacts menu',
));

add_action('init', function () {
    pll_register_string('not-specified', 'Not specified', 'theme');
    pll_register_string('contact-us', 'Contact Us', 'theme');
    pll_register_string('contact', 'Contact', 'theme');
    pll_register_string('copyright-footer', 'by Walton Web Agency.', 'theme');
    pll_register_string('services', 'Services', 'theme');
    pll_register_string('project-details', 'Project Details', 'theme');
    pll_register_string('main-advantages', 'Main advantages', 'theme');
    pll_register_string('key-benefits', 'Key benefits', 'theme');
    pll_register_string('privacy-policy', 'PolarisX. All Rights Reserved', 'theme');
    pll_register_string('more', 'More', 'theme');
});


function svg_upload_allow($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}


add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/style/style.css');
//    wp_enqueue_style('style2', get_template_directory_uri() . '/assets/style/style_need_to_add_in_main.css');


    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
    wp_enqueue_script('jquery');

    wp_enqueue_script('a_form', get_template_directory_uri() . '/assets/js/form.js', array('jquery'), '');

    wp_enqueue_script('swiper-script', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array(), '', false);
    wp_enqueue_script('slider', get_template_directory_uri() . '/assets/js/slider.js', array(), '', false);
    wp_enqueue_script('index', get_template_directory_uri() . '/assets/js/index.js', 'jquery', '', true);
    wp_enqueue_script('outstaffing_form', get_template_directory_uri() . '/assets/js/outstaffing_form.js', array('jquery'), '');
    wp_enqueue_script('create-item', get_template_directory_uri() . '/assets/js/create-item.js', array(), '');
    wp_localize_script( 'a_form', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'we_value' => 1234 ) );
    wp_enqueue_style('font', 'https://fonts.googleapis.com/css2?family=Jost&family=K2D&display=swap', array(), null);

});


function custom_polylang_langswitcher()
{
    $output = '';
    if (function_exists('pll_the_languages')) {
        $args = [
            'show_flags' => 1,
            'show_names' => 0,
            'echo' => 0,
            'dropdown' => 0,
        ];
        $output = '<ul class="polylang_langswitcher">' . pll_the_languages($args) . '</ul>';
    }

    return $output;
}


function wp_get_menu_array($nave_name)
{
    $menu_name = $nave_name; // название меню
    $locations = get_nav_menu_locations();
    $menu = wp_get_nav_menu_object($locations[$menu_name]);
    $array_menu = wp_get_nav_menu_items($menu->term_id, array('order' => 'DESC'));


    $menu = array();
    foreach ($array_menu as $m) {
        if (empty($m->menu_item_parent)) {
            $menu[$m->ID] = array();
            $menu[$m->ID]['ID'] = $m->ID;
            $menu[$m->ID]['title'] = $m->title;
            $menu[$m->ID]['url'] = $m->url;
            $menu[$m->ID]['url'] = $m->url;
            $menu[$m->ID]['thumbnail_id'] = $m->thumbnail_id;
            $menu[$m->ID]['children'] = array();
        }
    }
    $submenu = array();
    foreach ($array_menu as $m) {
        if ($m->menu_item_parent) {
            $submenu[$m->ID] = array();
            $submenu[$m->ID]['ID'] = $m->ID;
            $submenu[$m->ID]['title'] = $m->title;
            $submenu[$m->ID]['url'] = $m->url;
            $submenu[$m->ID]['thumbnail_id'] = $m->thumbnail_id;
            $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
        }
    }
    return $menu;
}


if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'General Settings',
        'menu_title' => 'General Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'icon_url' => 'dashicons-admin-generic',
        'redirect' => false
    ));
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
}


function wp_maintenance_mode(){
    if(get_option('technical_works_checkbox') == 'on'){
        if(!current_user_can('edit_themes') || !is_user_logged_in()){
            ob_start();
            include('templates/technical_works.php');
            $file_content = ob_get_contents();
            ob_end_clean ();
            wp_die($file_content);
        }
    }
}

add_action('get_header', 'wp_maintenance_mode');


function add_option_field_to_general_admin_page(){
    $option_name = 'technical_works_checkbox';

    // регистрируем опцию
    register_setting( 'general', $option_name );

    // добавляем поле
    add_settings_field(
        'technical_works_checkbox-id',
        'Technical Works',
        'technical_works_checkbox_callback_function',
        'general',
        'default',
        array(
            'id' => 'technical_works_checkbox-id',
            'option_name' => $option_name
        )
    );
}
add_action('admin_menu', 'add_option_field_to_general_admin_page');

function technical_works_checkbox_callback_function( $val ){
    $checked = esc_attr( get_option($val['option_name']));
    $checked = $checked ? 'checked' : '';
    echo '<input type="checkbox" name="' . $val['option_name'] . '" id="' . $val['id'] . '" '. $checked ;
    
}
