<?php
add_action('acf/init', 'archive_slider_block');
function archive_slider_block()
{
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type(array(
            'name' => 'tf-archive-slider',
            'title' => __('Archive Slider'),
            'description' => __('A custom archive slider.'),
            'render_callback' => 'acf_block_scorpion_contact_form',
            'enqueue_script' => get_template_directory_uri() . '/template-parts/blocks/archive_slider/archive_slider.js',
            'render_template'   => get_template_directory() . '/template-parts/blocks/archive_slider/archive_slider.php',
            'enqueue_style' => get_template_directory_uri() . '/template-parts/blocks/archive_slider/archive_slider.css',
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
function my_acf_block_render_callbackk( $block, $content = '', $is_preview = false, $post_id = 0, $wp_block = false, $context = false ) {

    // Create id attribute allowing for custom "anchor" value.
    $id = 'scorpion-contact-form-' . $block['id'];
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }
}

