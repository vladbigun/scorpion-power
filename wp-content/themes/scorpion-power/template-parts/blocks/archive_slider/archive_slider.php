

<div class="archive-slider p-t-50 p-b-100">
            <?php
            if(get_field('archive')->post_type == 'technologies_post') :
                get_template_part( 'template-parts/general_block', null, [
                    'title' => get_field('title'),
                    'description' => get_field('description'),
                    'button' => false,
                ] );
                get_template_part( 'template-parts/post_type_render', null, [
                    'post_type' => 'technologies_post',
                ] );
            else : ?>
            <?php
            $the_query_expertize = new WP_Query( [
                'post_type' => get_field('archive')->post_type
            ] );
            ?>

            <div class="wrapper-main-archives">
                <div
                        class="swiper archive-<?= get_field('archive')->post_type ?>"
                        data-number-el-mobile="<?= get_field('number_element')['mobile'] ?>"
                        data-number-el-tablet="<?= get_field('number_element')['tablet'] ?>"
                        data-number-el-desktop="<?= get_field('number_element')['desktop'] ?>"
                        data-type="<?= get_field('archive')->post_type ?>"
                >
                    <div class="content-archive">
                        <h3><?= get_field('title') ?></h3>
                        <p><?= get_field('description')?></p>
                        <?php if( get_field('button')):?>
                            <a class="button" href="<?= get_field('button')['url'] ?>">
                                <span><?= __('More')?></span>
                            </a>
                        <?php endif;?>
                    </div>
                    <?php if ($the_query_expertize->have_posts()) :?>
                        <div class="archive-items-main swiper-wrapper">
                            <?php $position = get_field('type_position')?>
                            <?php while ($the_query_expertize->have_posts()) : $the_query_expertize->the_post() ?>
                                <div class="archive-item-wrapper swiper-slide">
                                    <div class="archive-item <?= $position ?> <?= get_field('image_icon', get_the_ID() ) ? 'image-icon' : '' ?>">
                                        <div class="img-wrapper">
                                            <div class="img">
                                                <?php if(get_field('image_icon', get_the_ID() )):?>
                                                    <img src="<?= get_field('image_icon', get_the_ID() )['url'] ?>" alt="">
                                                <?php else:?>
                                                    <?= get_the_post_thumbnail(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <h4><?= get_the_title() ?></h4>
                                            <p class="description"><?= get_field('description', get_the_ID()) ?> </p>
                                            <?php if( get_field('button') && !get_field('image_icon')):?>
                                                <a href="<?= get_field('button')['url'] ?>">
                                                    <span><?= __('More')?></span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="9" height="14" viewBox="0 0 9 14" fill="none">
                                                        <path d="M7 7L7.70711 6.29289L8.41421 7L7.70711 7.70711L7 7ZM1.70711 0.292894L7.70711 6.29289L6.29289 7.70711L0.292893 1.70711L1.70711 0.292894ZM7.70711 7.70711L1.70711 13.7071L0.292894 12.2929L6.29289 6.29289L7.70711 7.70711Z" fill="#1A1818"/>
                                                    </svg>
                                                </a>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <div class="navigation-wrapper">
                            <div class="button-prev">
                                <svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 7L1.29289 7.70711L0.585786 7L1.29289 6.29289L2 7ZM7.29289 13.7071L1.29289 7.70711L2.70711 6.29289L8.70711 12.2929L7.29289 13.7071ZM1.29289 6.29289L7.29289 0.292893L8.70711 1.70711L2.70711 7.70711L1.29289 6.29289Z" fill="#1A1818"/>
                                </svg>
                            </div>
                            <div class="pagination"></div>
                            <div class="button-next">
                                <svg xmlns="http://www.w3.org/2000/svg" width="9" height="14" viewBox="0 0 9 14" fill="none">
                                    <path d="M7 7L7.70711 6.29289L8.41421 7L7.70711 7.70711L7 7ZM1.70711 0.292894L7.70711 6.29289L6.29289 7.70711L0.292893 1.70711L1.70711 0.292894ZM7.70711 7.70711L1.70711 13.7071L0.292894 12.2929L6.29289 6.29289L7.70711 7.70711Z" fill="#1A1818"/>
                                </svg>
                            </div>
                        </div>
                    <?php else: ?>
                        <h4><?= __('No post from this post type') ?></h4>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
</div>
