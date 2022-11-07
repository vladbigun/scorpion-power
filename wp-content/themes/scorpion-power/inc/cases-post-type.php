<?php
function expertize_post_type() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Cases', 'Post Type General Name', 'scorpion-power' ),
        'singular_name'       => _x( 'Cases', 'Post Type Singular Name', 'scorpion-power' ),
        'menu_name'           => __( 'Cases', 'scorpion-power' ),
        'parent_item_colon'   => __( 'Parent Cases', 'scorpion-power' ),
        'all_items'           => __( 'All Movies', 'scorpion-power' ),
        'view_item'           => __( 'View Movie', 'scorpion-power' ),
        'add_new_item'        => __( 'Add New Movie', 'scorpion-power' ),
        'add_new'             => __( 'Add New', 'scorpion-power' ),
        'edit_item'           => __( 'Edit Movie', 'scorpion-power' ),
        'update_item'         => __( 'Update Movie', 'scorpion-power' ),
        'search_items'        => __( 'Search Movie', 'scorpion-power' ),
        'not_found'           => __( 'Not Found', 'scorpion-power' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'scorpion-power' ),
    );

    $args = array(
        'label'               => __( 'cases', 'scorpion-power' ),
        'description'         => __( 'cases_description' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'thumbnail', 'custom-fields'),
        'taxonomies'          => array( 'genres' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,

    );

    register_post_type( 'cases', $args );
}
add_theme_support( 'post-thumbnails' );
/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action( 'init', 'expertize_post_type', 0 );

if( function_exists('acf_add_options_page') ) {

    acf_add_options_sub_page(array(
        'page_title'     => 'General Cases Options',
        'menu_title'    => 'General Cases Options',
        'parent_slug'    => 'edit.php?post_type=cases',
    ));
}




