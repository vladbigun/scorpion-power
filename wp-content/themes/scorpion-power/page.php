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
            <h1 style="margin: 30px 0"><?= get_field('page_title') ?></h1>
            <div class="intro-text"><p><?= get_field('page_description') ?></p></div>
        </div>
    </main>

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>
    
<?php
get_footer();
