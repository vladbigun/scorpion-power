<?php

$post_type_arr = new WP_Query( [
    'post_type' => $args['post_type']
] );
?>
    <style>
        .wrapper_tech{
            flex-wrap: wrap;
            margin-top: 40px;

        }
        .wrapper_tech .swiper-slide{
            margin-bottom: 20px;
            width: calc(33.33% - 30px)!important;
        }

        @media (max-width: 1000px) {
            .wrapper_tech {
                flex-wrap: unset;
            }
            .wrapper_tech .swiper-slide{
                width: calc(50% - 30px)!important;
            }
        }
        @media (max-width: 800px) {
            .wrapper_tech {
                flex-wrap: unset;
            }
            .wrapper_tech .swiper-slide{
                width: calc(100%)!important;
            }
        }
        .navigation-wrapper.fix{
            display: none;
        }
        @media (max-width: 800px) {
            .navigation-wrapper.fix{
                display: flex;
            }
        }
    </style>
<?php if ($post_type_arr->have_posts()) :?>
<div
     class="swiper archive-<?=$args['post_type']?>"
     data-number-el-mobile="<?= get_field('number_element')['mobile'] ?>"
     data-number-el-tablet="<?= get_field('number_element')['tablet'] ?>"
     data-number-el-desktop="<?= get_field('number_element')['desktop'] ?>"
     data-type="<?=$args['post_type']?>
">
    <div class="swiper-wrapper wrapper_tech">
        <?php while ($post_type_arr->have_posts()) : $post_type_arr->the_post() ?>
            <div class="swiper-slide">
                <?= get_template_part( "template-parts/post_type/$args[post_type]", null, [] ); ?>
            </div>
        <?php endwhile; ?>
    </div>
</div>
    <div class="navigation-wrapper fix">
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
<?php endif;?>