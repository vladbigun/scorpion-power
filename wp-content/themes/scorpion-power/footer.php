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
<style>
    .wrapper-footer{
        display: flex;
        justify-content: space-between;
    }
    .wrapper-footer .logo{
        height: 50px;
    }
    .wrapper-footer a{
        text-decoration: none;
        color: #1A1818;
        font-weight: 400;
        font-size: 16px;
        line-height: 150%;
        text-transform: uppercase;
    }
    .wrapper-footer .menu-item{
        padding: 0 25px;
        list-style-type: none;
    }

    .contact-info a{
        display: flex;
        align-items: center;
        color: #1A1818;
        font-weight: 800;
        justify-content: end;
        margin-bottom: 8px;
    }
    .contact-info a:last-child{
        margin-bottom: 0;
    }
    .contact-info a > span{
        margin-left: 5px;
        text-transform: none;
    }
    .footer .top-footer{
        padding-top: 25px;
        padding-bottom: 20px;
        margin-top: 50px;
        border: 1px solid #E6E6E6;
    }
    .top-footer .wrapper-menu{
        display: flex;
        align-self: center;
        flex-wrap: wrap;
    }
    .footer .bottom-footer .wrapper-footer{
        min-height: 50px;
        align-items: center;
    }
    .bottom-footer .other-links a{
        margin-left: 30px;
    }
    .bottom-footer .social-links{
        display: flex;
        align-items: center;
    }
    .bottom-footer .social-links a{
        display: block;
        height: 18px;
    }
    .bottom-footer .social-links img{
        height: 100%;
        margin: 0 16px;
    }
    @media (max-width: 800px) {
        .wrapper-footer a{
            font-size: 14px;
        }
        .wrapper-footer .logo{
            height: 34px;
        }
        .top-footer .wrapper-menu{
            display: none;
        }
        .footer .bottom-footer .wrapper-footer{
            flex-direction: column-reverse;
        }
        .bottom-footer .social-links{
            display: none;
        }
        .bottom-footer .other-links{
            display: flex;
            justify-content: space-between;
            width: 100%;
            padding: 20px 0;
        }
        .bottom-footer .other-links a{
            margin-left: unset;
        }
        .bottom-footer{
            padding-bottom: 25px;
        }
    }
</style>
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
                                    <a href="<?= $contact['type'] ?>:<?= $contact['text'] ?>">
                                        <img src="<?= $contact['icon'] ?>" alt="">
                                        <span>
                                        <?= $contact['text'] ?>
                                    </span>
                                    </a>
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
