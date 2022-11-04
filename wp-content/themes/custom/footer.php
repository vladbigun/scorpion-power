<style>
    .wrapper-modal {
        position: fixed;
        width: 100vw;
        background: rgba(31, 33, 37, 0.4);
        left: 0;
        top: 0;
        z-index: 100;
        display: none;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container-modal {
        padding: 32px 35px;
        max-width: 400px;
        box-sizing: border-box;
        background-color: #fff;
    }

    .container-modal .title-modal {
        display: flex;
    }

    .container-modal .title-modal h2 {
        font-weight: 600;
        font-size: 20px;
        line-height: 26px;
        font-family: 'K2D';
    }

    .container-modal .title-modal span {
        color: #EC0030;
    }

    .container-modal .content-modal p {
        font-weight: 400;
        font-size: 16px;
        line-height: 165%;
        padding-top: 0px;
        padding-bottom: 8px;
        color: #45474D;
    }

    .wrapper-modal .button {
        margin: 0 auto;
        cursor: pointer;
        display: block;
        background: #2E5FFF;
        border: 1px solid #2E5FFF;
        color: #fff;
        height: 48px;
        margin-top: 24px;
        min-width: 110px;
        width: 100%;
    }

    .wrapper-modal .right_mssg {
        display: flex;
        justify-content: end;
    }
</style>
<div class="wrapper-modal" id="modal_outstaffing">
    <div class="container-modal">
        <div class="title-modal">
            <h2><?= pll__('Thanks for filling out our form❤') ?>️</h2>
        </div>
        <div class="content-modal">
            <p> <?= pll__('We will review your message and get back to you as soon as possible. In the meantime, you can read our portfolio and blog with helpful information on the site. We are glad you have chosen us.')?></p>
            <div style="float: right; padding-bottom: 24px;"><?= pll__('Your SpaceIT team!') ?></div>
        </div>
        <button class="button" id="clouseModalOutstaffing"><?= pll__('Look forward to hearing from you') ?></button>
    </div>
</div>

<div class="container contact-us" id="contact-us">

    <div class="form">
        <h1><?= get_field('contact_us_title', 'options-' . pll_current_language()); ?></h1>
        <p><?= get_field('contact_us_description', 'options-' . pll_current_language()); ?></p>

        <form type="post" id="footer_form">
            <div>
                <div class="input-wrapper name">
                    <input type="text" id="firstfield" name="<?= get_field('contact_us_first_form_field', 'options-' . pll_current_language()); ?>"
                           placeholder="<?= get_field('contact_us_first_form_field', 'options-' . pll_current_language()); ?> *">
                    <div class="item-error">
                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.00016 15.1663C11.6821 15.1663 14.6668 12.1816 14.6668 8.49967C14.6668 4.81778 11.6821 1.83301 8.00016 1.83301C4.31826 1.83301 1.3335 4.81778 1.3335 8.49967C1.3335 12.1816 4.31826 15.1663 8.00016 15.1663Z" stroke="#EC0030" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M8 11.167H8.00667" stroke="#EC0030" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M8 5.83301V8.49967" stroke="#EC0030" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <span></span>
                    </div>
                </div>
                <div class="input-wrapper company_name">
                    <input type="text" id="secondfield" name="<?= get_field('contact_us_second_form_field', 'options-' . pll_current_language()); ?>"
                           placeholder="<?= get_field('contact_us_second_form_field', 'options-' . pll_current_language()); ?> *">
                    <div class="item-error">
                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.00016 15.1663C11.6821 15.1663 14.6668 12.1816 14.6668 8.49967C14.6668 4.81778 11.6821 1.83301 8.00016 1.83301C4.31826 1.83301 1.3335 4.81778 1.3335 8.49967C1.3335 12.1816 4.31826 15.1663 8.00016 15.1663Z" stroke="#EC0030" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M8 11.167H8.00667" stroke="#EC0030" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M8 5.83301V8.49967" stroke="#EC0030" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <span></span>
                    </div>
                </div>
                <div class="input-wrapper email">
                    <input type="email" id="thirdfield" name="<?= get_field('contact_us_third_form_field', 'options-' . pll_current_language()); ?>"
                           placeholder="<?= get_field('contact_us_third_form_field', 'options-' . pll_current_language()); ?> *">
                    <div class="item-error">
                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.00016 15.1663C11.6821 15.1663 14.6668 12.1816 14.6668 8.49967C14.6668 4.81778 11.6821 1.83301 8.00016 1.83301C4.31826 1.83301 1.3335 4.81778 1.3335 8.49967C1.3335 12.1816 4.31826 15.1663 8.00016 15.1663Z" stroke="#EC0030" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M8 11.167H8.00667" stroke="#EC0030" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M8 5.83301V8.49967" stroke="#EC0030" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <span></span>
                    </div>
                </div>

                <div class="input-wrapper phone">
                    <input type="text" id="fourthfield" name="<?= get_field('contact_us_fourt_form_field', 'options-' . pll_current_language()); ?>"
                           placeholder="<?= get_field('contact_us_fourt_form_field', 'options-' . pll_current_language()); ?> *">
                    <div class="item-error">
                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.00016 15.1663C11.6821 15.1663 14.6668 12.1816 14.6668 8.49967C14.6668 4.81778 11.6821 1.83301 8.00016 1.83301C4.31826 1.83301 1.3335 4.81778 1.3335 8.49967C1.3335 12.1816 4.31826 15.1663 8.00016 15.1663Z" stroke="#EC0030" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M8 11.167H8.00667" stroke="#EC0030" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M8 5.83301V8.49967" stroke="#EC0030" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <span></span>
                    </div>
                </div>

                <div class="input-wrapper message">
                    <textarea id="form_textarea" name="<?= get_field('contact_us_text_area_field', 'options-' . pll_current_language()); ?>"
                              placeholder="<?= get_field('contact_us_text_area_field', 'options-' . pll_current_language()); ?> *"></textarea>
                    <div class="item-error">
                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.00016 15.1663C11.6821 15.1663 14.6668 12.1816 14.6668 8.49967C14.6668 4.81778 11.6821 1.83301 8.00016 1.83301C4.31826 1.83301 1.3335 4.81778 1.3335 8.49967C1.3335 12.1816 4.31826 15.1663 8.00016 15.1663Z" stroke="#EC0030" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M8 11.167H8.00667" stroke="#EC0030" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M8 5.83301V8.49967" stroke="#EC0030" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <span></span>
                    </div>
                </div>



                <div class="form_error_message" id="form_error_message">
                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.00016 15.1663C11.6821 15.1663 14.6668 12.1816 14.6668 8.49967C14.6668 4.81778 11.6821 1.83301 8.00016 1.83301C4.31826 1.83301 1.3335 4.81778 1.3335 8.49967C1.3335 12.1816 4.31826 15.1663 8.00016 15.1663Z"
                              stroke="#EC0030" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8 11.167H8.00667" stroke="#EC0030" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <path d="M8 5.83301V8.49967" stroke="#EC0030" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                    <span class="message"><?= pll__('Wrong')?></span>
                    <span class="name">email</span>
                </div>

            </div>
            <!--            <a href="-->
            <? //= get_field('contact_us_button_link'); ?><!--" class="button send-button">-->
            <!--                --><? //= get_field('contact_us_button_text'); ?>
            <!--            </a>-->
            <button type="submit" formnovalidate="formnovalidate"
                    class="button send-button submit-btn"><?= get_field('contact_us_button_text', 'options-' . pll_current_language()); ?></button>
        </form>

    </div>
    <div class="form-img"><img src="<?php bloginfo('template_url'); ?>/assets/img/contuct-us-img.png"></div>
</div>

<div class="container footer">
    <div class="footer-content">
        <div class="footer-logo">
            <? if (get_field('footer_logo')): ?>
                <img src="<?= get_field('footer_logo', 'options-' . pll_current_language()); ?>"/>
            <? else: ?>
                <img src="<?php bloginfo('template_url'); ?>/assets/img/Logo-black.png"/>
            <? endif; ?>
        </div>
        <div class="copyright">
            <p><?= get_field('copyright_text', 'options-' . pll_current_language()); ?> <?= date("Y"); ?></p>
            <a href="<?= get_field('privacy_policy', 'options-' . pll_current_language())['url']; ?>"><?= get_field('privacy_policy', 'options-' . pll_current_language())['title']; ?></a>
        </div>
    </div>

    <ul class="footer-pages">
        <li class="hidden-840"><?= get_field('pages_title', 'options-' . pll_current_language()); ?></li>

        <?
        wp_nav_menu([
            'theme_location' => 'header-nav',
//            'menu_id'         => '28',
            'container' => '',
            'depth' => '1',
            'menu_class' => '',
        ]);
        ?>


    </ul>


    <ul class="technologies">
        <?php $menu_items = wp_get_menu_array('header-nav'); ?>
        <?php foreach ($menu_items as $item) : ?>
            <?php if (!empty($item['children'])): ?>
                <li><?= $item['title'] ?></li>
                <div class="wrapper-technologies">
                    <?php foreach ($item['children'] as $child): ?>
                        <li>
                            <a href="<?= $child['url'] ?>"
                               title="<?= $child['title'] ?>">
                                <?= $child['title'] ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>

    <ul class="social">
        <li class="hidden-720"><?= get_field('social_media_title', 'options-' . pll_current_language()); ?></li>

        <?php $selector = get_field('social_media', 'option');
        if ($selector): ?>
            <?php foreach ($selector as $item) : ?>
                <li class="menu-item">
                    <a href="<?= $item['link']['url'] ?>">
                        <img src="<?= $item['icon']['url']; ?>"/>
                        <span class="hidden-720"><?= $item['text'] ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>


    <ul class="contact">
        <li class="hidden-720"><?= get_field('contact_title', 'options-' . pll_current_language()); ?></li>

        <?php $selector = get_field('contacts', 'option');
        if ($selector): ?>
            <?php foreach ($selector as $item) : ?>
                <li class="menu-item">
                    <a href="<?= $item['link']['url'] ?>">
                        <img class="hidden-840" src="<?= $item['icon']['url']; ?>"/>
                        <?= $item['text'] ?>
                    </a>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>

    <div class="copyright-mobile">
        <p>All rights reserved &copy SpaceIT <?= date("Y"); ?></p>
        <a href="#">Privacy Policy</a>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
