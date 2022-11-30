<?php
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