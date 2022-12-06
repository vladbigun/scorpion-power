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
    <style>
        .archive-powerful .swiper-wrapper{
            justify-content: space-between;
        }
        .why_as_wrapper{
            display: flex;
        }
        .why_as_wrapper p{
            padding-top: 20px;
        }
        .why_as_wrapper .content{
            width: 60%;
        }
        .why_as_wrapper .img{
            padding-left: 116px;
            width: 40%;
        }
        .why_as_wrapper .content span{
            font-weight: 800;
            font-size: 30px;
            line-height: 150%;
            padding-top: 30px;
            color: #0B1524;
            display: block;
        }

        .why_as_wrapper .img img{
            width: 100%;
        }
        @media (max-width: 800px) {
            .why_as_wrapper{
                flex-direction: column;
            }
            .why_as_wrapper .img, .why_as_wrapper .content{
                width: 100%;
                padding-left: 0;
            }
            .why_as_wrapper .img{
                margin-top: 20px;
            }
            .why_as_wrapper .content span{
                font-size: 24px;
            }
        }
    </style>
    <img class="mobile-disabled" style="position:absolute; right: 150px; top: 1200px; z-index: -1" src="<?= get_template_directory_uri() ?>/image/oval-pink.png" alt="">

    <div class="container p-t-50 p-b-100">
        <div class="wrapper-main-archives">
            <div class="swiper swiper-a archive-powerful" data-number-el-mobile="2" data-number-el-tablet="4" data-number-el-desktop="<?= get_field('powerful_object')['powerful_item_count']?>" data-type="powerful">
                <div class="content-archive">
                    <h3><?= get_field('powerful_title') ?></h3>
                </div>
                <?php if (get_field('powerful_object')['powerful_items']) :?>
                    <div class="archive-items-main swiper-wrapper">
                        <?php foreach (get_field('powerful_object')['powerful_items'] as $item) : ?>
                        <div class="archive-items-main swiper-slide">
                            <div class="powerful_item swiper-slide">
                                <div class="img">
                                    <img src="<?= $item['powerful_image']['url'] ?>" alt="">
                                </div>
                                <span class="name"><?= $item['powerful_name'] ?></span>
                            </div>
                        </div>
                        <?php endforeach; ?>
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
                <?php endif; ?>
            </div>
        </div>
    </div>
    <style>
        .stats-wrapper{
            display: flex;
        }
        .stats-wrapper .items{
            padding-left: 60px;
            width: 60%;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .stats-wrapper .img{
            width: 40%;
        }
        .stats-wrapper .img img{
            width: 100%;
        }
        .stats-wrapper .item{
            width: 50%;
            padding: 20px;
            box-sizing: border-box;
        }
        .stats-wrapper .item h6{
            font-weight: 800;
            font-size: 70px;
            line-height: 120%;
            color: #8C1429;
        }
        .stats-wrapper .item span{
            font-weight: 800;
            font-size: 16px;
            line-height: 22px;
            color: #1A1818;
        }
        @media (max-width: 800px) {
            .stats-wrapper{
                flex-direction: column;
                padding-top: 40px;
            }
            .stats-wrapper .items, .stats-wrapper .img {
                padding-left: 0px;
                width: 100%;
            }
            .stats-wrapper .item h6{
                font-size: 45px;
            }
            .stats-wrapper .item span{
                font-size: 14px;
            }
        }
    </style>
    <div class="container p-t-50 p-b-100">
        <div class="stats-wrapper">
            <div class="img">
                <img src="<?= get_field('stats_object')['stats_image']['url'] ?>" alt="">
            </div>
            <div class="items">
                <?php foreach (get_field('stats_object')['stats_items'] as $item): ?>
                 <div class="item">
                     <h6><?= $item['count']?></h6>
                     <span><?= $item['description']?></span>
                 </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="container p-t-50 p-b-50">
        <div class="why_as_wrapper">
            <div class="content">
                <h3><?= get_field('why_us_title') ?></h3>
                <p><?= get_field('why_us_description') ?></p>
                <span><?= get_field('why_us_span') ?></span>
            </div>
            <div class="img">
                <img src="<?= get_field('why_us_image')['url'] ?>" alt="">
            </div>
        </div>
    </div>
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
<!--
    <div class="container p-t-50 p-b-100">
        <?php foreach (get_field('archives') as $archive): ?>
            <?php
            $the_query_expertize = new WP_Query( [
                'post_type' => $archive['post_type']
            ]);
            ?>
            <div class="wrapper-main-archives">
                <div class="swiper archive-<?=$archive['post_type']?>" data-item="<?= $archive['item_count'] ?? '2'?>" data-type="<?=$archive['post_type']?>">
                    <div class="content-archive">
                        <h3><?= $archive['title'] ?></h3>
                        <p><?= $archive['description']?></p>
                        <?php if( $archive['more_link']):?>
                            <a class="button" href="<?= $archive['more_link']['url'] ?>">
                                <span><?= __('More')?></span>
                            </a>
                        <?php endif;?>
                    </div>
                    <?php if ($the_query_expertize->have_posts()) :?>
                        <div class="archive-items-main swiper-wrapper">
                            <?php while ($the_query_expertize->have_posts()) : $the_query_expertize->the_post() ?>
                                <div class="archive-item-wrapper swiper-slide">
                                    <div class="archive-item <?=  $archive['type_position'] ?> <?= get_field('image_icon') ? 'image-icon' : '' ?>">
                                        <div class="img-wrapper">
                                            <div class="img">
                                                <?php if(get_field('image_icon')):?>
                                                    <img src="<?= get_field('image_icon')['url'] ?>" alt="">
                                                <?php else:?>
                                                    <?= get_the_post_thumbnail(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <h4><?= get_the_title() ?></h4>
                                            <p class="description"><?= get_field('description', get_the_ID()) ?> </p>
                                            <?php if( $archive['more_link'] && !get_field('image_icon')):?>
                                                <a href="<?=  $archive['more_link']['url'] ?>">
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
        <?php endforeach;?>
    </div>
-->
<?php
require_once get_template_directory() . '/inc/component/footer-page.php';
get_footer();
?>