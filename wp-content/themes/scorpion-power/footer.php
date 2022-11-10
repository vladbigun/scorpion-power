<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org
 *
 * @package WordPress
 * @subpackage Scorpion_Power
 * @since Scorpion Power 0.1
 */


$locations = get_nav_menu_locations();
$menu = wp_get_nav_menu_object($locations['header-nav']);
$menu_items = wp_get_nav_menu_items($menu->term_id, array('order' => 'DESC')) ?? [];

?>

			<footer id="site-footer" class="footer">
                <div class="top-footer">
                    <div class="container">
                        <div class="wrapper-footer">
                            <a href="/">
                                <img class="logo" src="<?= get_field('logo', 'option')['url'] ?? '' ?> " alt="">
                            </a>
                            <ul class="wrapper-menu">
                                <?php foreach ($menu_items as $item):?>
                                    <li class="menu-item">
                                        <a href="<?= $item->url ?>" title="<?= $item->title ?>"><?= $item->title ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="contact-info">
                                <?php $contacts_info = get_field('contact_info', 'option'); ?>
                                <?php foreach ($contacts_info as $contact):?>
                                    <?php if($contact['type'] != 'map') :?>
                                    <a href="<?= $contact['type'] ?>:<?= $contact['text'] ?>">
                                        <img src="<?= $contact['icon'] ?>" alt="">
                                        <span>
                                        <?= $contact['text'] ?>
                                    </span>
                                    </a>
                                    <?php endif; ?>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom-footer">
                    <div class="container">
                        <div class="wrapper-footer">
                            <div class="copyright">
                                <?= pll__('COPYRIGHT © 2019 SCORPION') ?>
                            </div>
                            <div class="social-links">
                                <?php $contacts_info = get_field('social_info', 'option'); ?>
                                <?php foreach ($contacts_info as $contact):?>
                                    <a target="_blank" href="<?= $contact['link'] ?>">
                                        <img src="<?= $contact['icon'] ?>" alt="">
                                    </a>
                                <?php endforeach;?>
                            </div>
                            <div class="other-links">
                                <a href="">Imprint</a>
                                <a href="/privacy-policy">PRIVACY POLICY</a>
                            </div>
                        </div>
                    </div>
                </div>
			</footer>

		<?php wp_footer(); ?>

	</body>
</html>
