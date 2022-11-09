<?php
/**
 * The template for displaying the 404 template in the Twenty Twenty theme.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

    <main id="site-content">
        <div class="container" style="min-height: 64vh; display: flex; justify-content: center; flex-direction: column">
            <h1 class="entry-title" style="margin-bottom: 30px"><?= __( 'Page Not Found', 'scorpion-power' ); ?></h1>
            <div class="intro-text"><p><?= __( 'The page you were looking for could not be found. It might have been removed, renamed, or did not exist in the first place.', 'scorpion-power' ); ?></p></div>
        </div>
    </main>

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
