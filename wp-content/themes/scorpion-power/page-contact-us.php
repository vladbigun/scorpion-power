<?php
/**
 * The template for displaying the 404 template in the Twenty Twenty theme.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
require_once get_template_directory() . '/inc/component/header-page.php';
?>

<div class="container">
    <?php
    if ( have_posts() ) {
        while (have_posts()) {
            the_post();
            get_template_part('template-parts/content', get_post_type());
        }
    }
    ?>
</div>

<?php
get_template_part( 'template-parts/footer-menus-widgets' );
get_footer();
?>