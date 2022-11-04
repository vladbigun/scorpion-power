<?php
/*
Template Name: outstaffing
*/
?>

<?php get_header(); ?>

<style>
    .step-button {
        padding: 15px 30px;
        margin-top: 40px;
        margin-bottom: 48px;
        display: inline-block;
        border: 1px solid #2E5FFF;
        min-height: 66px;
        cursor: pointer;

    }
    .step-button:hover{
        background: transparent;
        color: #2E5FFF;
    }
    .step-button.next, .step-button.back:hover{
        color: #fff;
        background-color: #2e5fff;
    }
    .step-button.back {
        background-color: transparent;
        color: #2E5FFF;
        border-color: #2E5FFF;
    }
    .step-button.next:hover{
        background-color: #ff8669;
        color: #fff;
        border-color: #ff8669;
    }
    .step-button.next:disabled{
        background-color: #ccc;
        border-color: #ccc;
    }
    .step-button.back:disabled{
        color: #ccc;
        border-color: #ccc;
    }
    .technologies, .period, .contact-details{
        display: none;
    }
    .outstaffing-page .choose-technologies{
        max-height: 550px;
        overflow: auto;
    }
    .outstaffing-page .project{
        background: #fff;
    }
    .step_number{
        font-weight: 600;
        font-size: 20px;
        line-height: 26px;
        color: #1F2125;
    }
</style>

<div class="afterheader">
    <div class="container">
        <div class="page-header-content">
            <div>
                <h1><?= get_field('outstaffing_title'); ?></h1>
                <p><?= get_field('outstaffing_description'); ?></p>
            </div>

            <div class="header-img">
                <img src="<?= get_field('outstaffing_image'); ?>"/>
            </div>
        </div>
    </div>
</div>

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
<style>

</style>
<form id="outstaffing_form" action="" type="POST">
    <div class="outstaffing-page" id="outstaffing-page">
        <div class="project">
            <? if (get_field('roles') && is_array(get_field('roles'))): ?>
                <div class="container">
                    <span class="step_number">1/3</span>
                    <h1><?= get_field('choose_role_title') ?></h1>
                    <div class="item-error">
                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.00016 15.1663C11.6821 15.1663 14.6668 12.1816 14.6668 8.49967C14.6668 4.81778 11.6821 1.83301 8.00016 1.83301C4.31826 1.83301 1.3335 4.81778 1.3335 8.49967C1.3335 12.1816 4.31826 15.1663 8.00016 15.1663Z" stroke="#EC0030" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M8 11.167H8.00667" stroke="#EC0030" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M8 5.83301V8.49967" stroke="#EC0030" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <span></span>
                    </div>
                    <p><?= get_field('choose_role_description') ?></p>
                    <div class="roles">
                        <? foreach (get_field('roles') as $roles): ?>
                            <label for="quantity" class="role">
                                <?php
                                $role_name = preg_replace( "/[^a-zA-ZА-Яа-я0-9\s]/", '_', $roles['role_name']);
                                $role_name = str_replace(" ", "_", $role_name);
                                ?>
                                <input class="role-name variant-role-name" name="<?= $role_name ?>" value="<?= $roles['role_name'] ?>" readonly/>
                                <div class="none">
                                    <span class="quantity-arrow-minus">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3.33301 8H12.6663" stroke="#7C7D7E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                    <input class="quantity-num" type="number" min="0" max="9" value="0" readonly name="roles_<?= $role_name ?>"/>
                                    <span class="quantity-arrow-plus">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 3.33337V12.6667" stroke="#7C7D7E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M3.33301 8H12.6663" stroke="#7C7D7E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                </div>
                            </label>
                        <? endforeach; ?>
                        <? if (get_field('type_your_variant')): ?>
                            <label for="quantity" class="role variant-role">
                                <input type="text" placeholder="Type your variant" name="roles_yourVariant" class="variant-role-name new"/>
                                <div class="none">
                                    <span class="quantity-arrow-minus">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3.33301 8H12.6663" stroke="#7C7D7E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                    <input class="quantity-num" type="number" min="0" name="roles_yourVariantQty" max="9" value="0" readonly/>
                                    <span class="quantity-arrow-plus">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 3.33337V12.6667" stroke="#7C7D7E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M3.33301 8H12.6663" stroke="#7C7D7E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                </div>
                                <span class="cancel">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="12" fill="#B6B6B6"/>
                                        <path d="M8.7002 8.7002L15.2999 15.2999" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.7002 15.2998L15.2999 8.70014" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                            </label>
                        <? endif; ?>
                    </div>

                    <? if (get_field('need_help?')): ?>
                        <div class="help-check">
                            <input class="help-checkbox" type="checkbox" name="need-help" id="help-checkbox">
                            <label for="help-checkbox"><?= get_field('need_help_title'); ?></label>
                            <p><?= get_field('need_help_description'); ?></p>
                        </div>
                    <? endif; ?>
                    <button class="button step-button next" id="next-project"><?= pll__('Next step')?></button>
                </div>
            <? endif; ?>
        </div>


        <? if (get_field("technologies_stack", 10) && is_array(get_field("technologies_stack", 10))): ?>
            <div class="container technologies">
                <span class="step_number">2/3</span>
                <h1><?= get_field('choose_technologies_title'); ?></h1>
                <div class="item-error">
                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.00016 15.1663C11.6821 15.1663 14.6668 12.1816 14.6668 8.49967C14.6668 4.81778 11.6821 1.83301 8.00016 1.83301C4.31826 1.83301 1.3335 4.81778 1.3335 8.49967C1.3335 12.1816 4.31826 15.1663 8.00016 15.1663Z" stroke="#EC0030" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M8 11.167H8.00667" stroke="#EC0030" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M8 5.83301V8.49967" stroke="#EC0030" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <span></span>
                </div>
                <p><?= get_field('choose_technologies_description'); ?></p>
                <div class="choose-technologies">

                    <? foreach (get_field("technologies_stack", 10) as $stack): ?>
                        <div class="technologies-items">
                            <span class="choose-technologies-h1"><?= $stack['technologies_stack_name'] ?></span>

                            <?php
                            $technology_stack_name = preg_replace( "/[^a-zA-ZА-Яа-я0-9\s]/", '', $stack['technologies_stack_name']);
                            $technology_stack_name = str_replace(" ", "", $technology_stack_name);
                            ?>
                            <? foreach ($stack['technologies'] as $technology): ?>
                                <label>
                                    <?php
                                    $technology_name = preg_replace( "/[^a-zA-ZА-Яа-я0-9\s]/", '_', $technology['technology_name']);
                                    $technology_name = str_replace(" ", "", $technology_name);
                                    ?>
                                    <img src="<?= $technology['technology_image'] ?>">
                                    <span><?= $technology['technology_name'] ?></span>
                                    <input type="checkbox"
                                           name="<?= $technology_stack_name ?>#<?= $technology_name ?>"
                                           id="<?= $technology_stack_name ?>#<?= $technology_name ?>"
                                           class="technologies-checkbox"
                                           value="<?= $technology['technology_name']?>"
                                    >
                                    <span class="check"></span>
                                </label>
                            <? endforeach; ?>
                        </div>
                    <? endforeach; ?>

                </div>
                <? if (get_field('need_help?')): ?>
                    <div class="help-check">
                        <input class="help-checkbox" type="checkbox" name="need-help-2" id="help-checkbox-2">
                        <label for="help-checkbox-2"><?= get_field('need_help_title'); ?></label>
                        <p><?= get_field('need_help_description'); ?></p>
                    </div>
                <? endif; ?>
                <button class="button step-button back" id="back-technologies"><?= pll__('Back')?></button>
                <button class="button step-button next" id="next-technologies"><?= pll__('Next step')?></button>
            </div>
        <? endif; ?>

        <? if (get_field("periods") && is_array(get_field("periods"))): ?>
            <div class="period">
                <div class="container">
                    <span class="step_number">3/3</span>
                    <h1><?= get_field('set_period_title'); ?></h1>
                    <p><?= get_field('set_period_description'); ?></p>
                    <div class="period-container">
                        <div class="period-line"></div>
                        <div class="set-period">
                            <? foreach (get_field('periods') as $key => $period): ?>
                                <input <? if ($key == 0): ?>checked<? endif ?>
                                       id="period-<?= $period['how_many'] ?>"
                                       name="period"
                                       value="<?= $period['how_many'] ?>"
                                       type="radio">
                                <label for="period-<?= $period['how_many'] ?>"></label>
                            <? endforeach; ?>

                            <? if (get_field('more')): ?>
                                <input id="period-4" name="period" value="More" type="radio">
                                <label for="period-4"></label>
                            <? endif; ?>
                        </div>

                        <div class="set-period-title">
                            <? foreach (get_field('periods') as $period): ?>
                                <span><?= $period['how_many'] ?> <?php pll__('month') ?></span>
                            <? endforeach; ?>
                            <? if (get_field('more')): ?>
                                <span><?= pll__('More') ?></span>
                            <? endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <? endif; ?>

        <? if (get_field("fields") && is_array(get_field("fields"))): ?>
            <div class="container contact-details">

                <h1><?= get_field('your_contact_details_title'); ?></h1>
                <p><?= get_field('your_contact_details_description'); ?></p>

                <div id="response_div"></div>

                <div class="contact-details-form">
                    <?php foreach (get_field('fields') as $field):
                        $field_name = strtolower($field['fields_name']);
                        $field_name = str_replace(' ', '', $field_name)
                        ?>
                        <div class="input-wrapper <?= $field_name?>">
                            <input
                                   type="text"
                                   id="contact_<?= $field_name ?>"
                                   placeholder="<?= ucfirst($field['fields_title']); ?>"
                                   name="contact_<?= $field_name ?>"
                            />
                            <div class="item-error">
                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.00016 15.1663C11.6821 15.1663 14.6668 12.1816 14.6668 8.49967C14.6668 4.81778 11.6821 1.83301 8.00016 1.83301C4.31826 1.83301 1.3335 4.81778 1.3335 8.49967C1.3335 12.1816 4.31826 15.1663 8.00016 15.1663Z" stroke="#EC0030" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M8 11.167H8.00667" stroke="#EC0030" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M8 5.83301V8.49967" stroke="#EC0030" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <span></span>
                            </div>
                        </div>
                    <? endforeach; ?>
                </div>
                <button class="button step-button back" id="back-contact-details"><?= pll__('Back')?></button>
                <button class="button step-button next" id="submit_btn"><?= pll__('Get a team')?></button>
            </div>
        <? endif; ?>


    </div>
</form>


<?php get_footer(); ?>

