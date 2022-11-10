<?php
function expertize_post_type() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Expertize', 'Post Type General Name', 'scorpion-power' ),
        'singular_name'       => _x( 'Expertize', 'Post Type Singular Name', 'scorpion-power' ),
        'menu_name'           => __( 'Expertize', 'scorpion-power' ),
        'parent_item_colon'   => __( 'Parent Expertize', 'scorpion-power' ),
        'all_items'           => __( 'All Expertize', 'scorpion-power' ),
        'view_item'           => __( 'View Expertize', 'scorpion-power' ),
        'add_new_item'        => __( 'Add New Expertize', 'scorpion-power' ),
        'add_new'             => __( 'Add New', 'scorpion-power' ),
        'edit_item'           => __( 'Edit Expertize', 'scorpion-power' ),
        'update_item'         => __( 'Update Expertize', 'scorpion-power' ),
        'search_items'        => __( 'Search Expertize', 'scorpion-power' ),
        'not_found'           => __( 'Not Found', 'scorpion-power' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'scorpion-power' ),
    );

    $args = array(
        'label'               => __( 'expertize', 'scorpion-power' ),
        'description'         => __( 'expertize news and reviews', 'scorpion-power' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'thumbnail', 'custom-fields'),
        'taxonomies'          => array(),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,

    );

    register_post_type( 'expertizes_post', $args );

}

add_action( 'init', 'expertize_post_type', 0 );

if( function_exists('acf_add_options_page') ) {

    acf_add_options_sub_page(array(
        'page_title'     => 'General Expertize Options',
        'menu_title'    => 'General Expertize Options',
        'parent_slug'    => 'edit.php?post_type=expertize',
    ));
}



