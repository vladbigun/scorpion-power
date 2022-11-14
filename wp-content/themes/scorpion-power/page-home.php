
<?php
get_header();
require_once get_template_directory() . '/inc/component/header-page.php';
?>

<?php
//the_widget('left_archive')

?>


<style>
    .archive-items-main{

    }
    .archive-items-main .archive-item-wrapper{
        padding-right: 30px;
        box-sizing: border-box;
    }
    .archive-items-main .archive-item{
        display: flex;
        box-shadow: 0px 0px 31px rgba(188, 188, 188, 0.2);
        border-radius: 10px;
    }
    .archive-items-main .item-content{
        padding: 30px;
    }

    .archive-items-main .item-content h4{
        font-size: 24px;
    }
    .archive-items-main .item-content p{
        font-size: 14px;
        max-height: 170px;
        overflow: hidden;
    }
    .archive-items-main .item-content a{
        font-size: 16px;
        color: #1A1818;
        text-decoration: unset;
        margin-top: 30px;
        display: flex;
        align-items: center;
        font-weight: 800;
    }
    .archive-items-main .item-content a svg{
        margin-left: 10px;
    }
    .archive-items-main .archive-item .img{
        overflow: hidden;
        width: 210px;
        min-height: 267px;
        display: flex;
        justify-content: center;
        border-radius: 10px;
    }
    .archive-items-main .archive-item img{
        height: 100%;
    }

    .navigation-wrapper{
        margin-top: 46px;
        display: flex;
        align-items: center;
    }
    .navigation-wrapper .pagination{
        position: relative;
        display: flex;
        align-items: center;
        width: unset;
        right: unset;
        left: unset;
        top: unset;
        bottom: unset;
        padding: 0 30px;
    }
    .button-next, .button-prev{
        display: flex;
        cursor: pointer;
        align-items: center;
    }
    .swiper-pagination-bullet{
        background: #1A1818;
        opacity: 0.5;
        width: 5px;
        height: 5px;
    }
    .swiper-pagination-bullet-active{
        opacity: 1;
        width: 9px;
        height: 9px;
    }
    .swiper-button-disabled{
        opacity: 0.5;
        cursor: unset;
    }
    .wrapper-main-archives{
        padding-top: 100px;
        padding-bottom: 50px;
    }
    .wrapper-main-archives .content-archive p{
        margin-top: 20px;
        max-width: 50%;
    }

    .wrapper-main-archives .content-archive .button{
        margin-top: 30px;
    }
    .wrapper-main-archives .content-archive{
        padding-bottom: 40px;
    }

    .archive-items-main .archive-item.image-icon{
        box-shadow: unset;
        border-radius: unset;
    }
    .archive-items-main .archive-item.vertical{
        flex-direction: column;
    }
    .archive-items-main .archive-item.vertical .img{
        width: 100%;
        min-height: 200px;
        max-height: 200px;
    }

    .archive-items-main .archive-item.image-icon .img{
        overflow: unset;
        max-width: 90px;
        min-height: 90px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #fff;
        box-shadow: 0px 0px 31px rgba(188, 188, 188, 0.2);
        border-radius: 10px;
    }
    .archive-items-main .archive-item.image-icon .item-content{
        padding: 20px 0;
    }
    @media (max-width: 800px) {
        .archive-items-main .archive-item{
            flex-direction: column;
        }
        .archive-items-main .archive-item .img{
            width: unset;
            display: block;
            justify-content: unset;
            max-height: 178px;
        }
        .archive-items-main .item-content{
            padding: 30px 15px;
        }
        .archive-items-main .item-content a{
            margin-top: 15px;
        }
    }
</style>
<div class="container">
    <?php foreach (get_field('archives') as $archive): ?>
        <?php
        $the_query_expertize = new WP_Query( [
            'post_type' => $archive['post_type']
        ] );
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
                <div class="archive-items-main swiper-wrapper">
                    <?php if ($the_query_expertize->have_posts()) :?>
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
                    <?php endif; ?>
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
            </div>
        </div>
     <?php endforeach;?>
</div>

<?php
require_once get_template_directory() . '/inc/component/footer-page.php';
get_footer()
?>

