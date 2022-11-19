<?php
function technologies_post_type() {

    $labels = array(
        'name'                => _x( 'Technologies', 'Post Type General Name', 'scorpion-power' ),
        'singular_name'       => _x( 'Technologies', 'Post Type Singular Name', 'scorpion-power' ),
        'menu_name'           => __( 'Technologies', 'scorpion-power' ),
        'parent_item_colon'   => __( 'Parent Technologies', 'scorpion-power' ),
        'all_items'           => __( 'All Technologies', 'scorpion-power' ),
        'view_item'           => __( 'View Technologies', 'scorpion-power' ),
        'add_new_item'        => __( 'Add New Technologies', 'scorpion-power' ),
        'add_new'             => __( 'Add New', 'scorpion-power' ),
        'edit_item'           => __( 'Edit Technologies', 'scorpion-power' ),
        'update_item'         => __( 'Update Technologies', 'scorpion-power' ),
        'search_items'        => __( 'Search Technologies', 'scorpion-power' ),
        'not_found'           => __( 'Not Found', 'scorpion-power' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'scorpion-power' ),
    );

    $args = array(
        'label'               => __( 'technologies', 'scorpion-power' ),
        'description'         => __( 'technologies-description', 'scorpion-power' ),
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

    register_post_type( 'technologies_post', $args );

}

add_action( 'init', 'technologies_post_type', 0 );


