<?php
/*
Template Name: about
*/
?>
    <style>
        .team h1{
            font-weight: 400;
            font-size: 64px;
            line-height: 109.5%;
            color: #1F2125;
            padding-top: 166px;
            padding-bottom: 30px;
        }
        .team .team-wrapper{
            display: flex;
            flex-wrap: wrap;
        }
        .team .team-item{
            padding: 12px;
            width: 33.33%;
        }
        .team span{
            font-weight: 400;
            font-size: 14px;
            line-height: 165%;
            color: #7C7D7E;
        }
        .team h3{
            font-family: 'K2D', sans-serif;
            font-weight: 600;
            padding-top: 10px;
            font-size: 32px;
            line-height: 42px;
            color: #1F2125;
        }
        .team p{
            padding-top: 8px;
            padding-bottom: 16px;
            font-weight: 400;
            font-size: 14px;
            line-height: 165%;
            color: #1F2125;
        }
        .team a{
            color: #2E5FFF;
            text-decoration: navajowhite;
        }
        .team-img-wrapper {
            position: relative;
            width: 70%;
        }

        .team-img-wrapper img{
            border-radius: 50%;
            z-index: 5;
            width: 100%;
            position: relative;
            box-sizing: border-box;
        }
        .team-img-wrapper:before{
            content: '';
            width: 104%;
            height: 104%;
            border-radius: 50%;
            display: block;
            position: absolute;
            box-sizing: border-box;
            border: 1px solid #2E5FFF;
            left: -2%;
            top: -2%;
        }
        .team-img-wrapper .item-one{
            position: absolute;
            top: 6px;
            left: 6px;
        }
        .team .item-link{
            display: flex;
            align-items: center;
        }
        .team .item-link :first-child{
            margin-right: 10px;
        }
        .team-img-wrapper .item-two{
            position: absolute;
            bottom: 0;
            right: -30px
        }
        @media (max-width: 720px) {
            .team .team-item{
                width: 100%;
                padding-bottom: 30px;
            }
        }
    </style>

<?php get_header(); ?>

    <div class="afterheader">
        <div class="container">

            <div class="page-header-content">
                <div>
                    <h1><?= get_field('about_title'); ?></h1>
                    <p><?= get_field('about_description'); ?></p>
                </div>

                <div class="header-img">
                    <img src="<?= get_field('about_image'); ?>"/>
                </div>
            </div>
        </div>
    </div>

    <div class="team">
        <div class="container">
            <?php if(get_field('team_title')) :?>
                <h1><?= get_field('team_title'); ?></h1>
                <div class="team-wrapper">
                    <?php foreach (get_field('team_list') as $item) :?>
                        <div class="team-item">
                            <div class="team-item-wrapper">
                                <div class="team-img-wrapper">
                                    <div class="item-one">
                                        <svg width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.76705 40.7958C3.92968 37.0109 8.28539 26.5827 17.5011 17.5025C26.7168 8.42233 37.3007 4.12869 41.1421 7.9116C44.9794 11.6965 40.6237 22.1247 31.408 31.2049C22.1923 40.2851 11.6084 44.5787 7.76705 40.7958ZM10.5516 38.0522C12.1891 39.6675 20.802 36.1716 28.6274 28.4613C36.4529 20.7509 39.9989 12.2646 38.3615 10.6513C36.7241 9.03598 28.1111 12.5319 20.2857 20.2422C12.4603 27.9525 8.91424 36.4388 10.5516 38.0522ZM17.5031 31.2029C8.28539 22.1247 3.92768 11.6965 7.76705 7.9116C11.6084 4.13067 22.1923 8.42233 31.408 17.5025C40.6237 26.5827 44.9814 37.0109 41.1421 40.7958C37.3007 44.5767 26.7168 40.2851 17.5011 31.2049L17.5031 31.2029ZM20.2857 28.4613C28.1111 36.1716 36.7241 39.6655 38.3615 38.0522C40.0009 36.4388 36.4529 27.9525 28.6274 20.2422C20.802 12.5319 12.1891 9.03796 10.5516 10.6513C8.91223 12.2646 12.4603 20.7509 20.2857 28.4613ZM24.4546 28.3128C23.3889 28.3128 22.3668 27.8957 21.6133 27.1532C20.8597 26.4107 20.4364 25.4037 20.4364 24.3537C20.4364 23.3037 20.8597 22.2967 21.6133 21.5542C22.3668 20.8117 23.3889 20.3946 24.4546 20.3946C25.5202 20.3946 26.5423 20.8117 27.2958 21.5542C28.0494 22.2967 28.4727 23.3037 28.4727 24.3537C28.4727 25.4037 28.0494 26.4107 27.2958 27.1532C26.5423 27.8957 25.5202 28.3128 24.4546 28.3128Z" fill="#2E5FFF" fill-opacity="0.15"/>
                                        </svg>
                                    </div>
                                    <img src="<?= $item['team_img']['url']?>" alt="">
                                    <div class="item-two">
                                        <svg width="96" height="95" viewBox="0 0 96 95" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.6073 79.9948C8.04546 72.538 16.6288 51.9928 34.7891 34.1035C52.9495 16.2142 73.806 7.75506 81.3758 15.208C88.9376 22.6648 80.3543 43.21 62.194 61.0993C44.0336 78.9886 23.1771 87.4476 15.6073 79.9948ZM21.0946 74.5894C24.3213 77.7718 41.2939 70.8844 56.7146 55.6939C72.1352 40.5034 79.123 23.7841 75.8964 20.6056C72.6697 17.4232 55.6971 24.3106 40.2764 39.5011C24.8558 54.6916 17.868 71.4109 21.0946 74.5894ZM34.7931 61.0954C16.6288 43.21 8.0415 22.6648 15.6073 15.208C23.1771 7.75896 44.0336 16.2142 62.194 34.1035C80.3543 51.9928 88.9416 72.538 81.3758 79.9948C73.806 87.4437 52.9495 78.9886 34.7891 61.0993L34.7931 61.0954ZM40.2764 55.6939C55.6971 70.8844 72.6697 77.7679 75.8964 74.5894C79.127 71.4109 72.1352 54.6916 56.7146 39.5011C41.2939 24.3106 24.3213 17.4271 21.0946 20.6056C17.864 23.7841 24.8558 40.5034 40.2764 55.6939ZM48.4915 55.4014C46.3915 55.4014 44.3775 54.5796 42.8925 53.1168C41.4076 51.654 40.5734 49.67 40.5734 47.6014C40.5734 45.5327 41.4076 43.5487 42.8925 42.0859C44.3775 40.6231 46.3915 39.8014 48.4915 39.8014C50.5916 39.8014 52.6056 40.6231 54.0905 42.0859C55.5755 43.5487 56.4097 45.5327 56.4097 47.6014C56.4097 49.67 55.5755 51.654 54.0905 53.1168C52.6056 54.5796 50.5916 55.4014 48.4915 55.4014Z" fill="#E1E8FF"/>
                                        </svg>
                                    </div>
                                </div>
                                <h3><?= $item['team_name']?></h3>
                                <span><?= $item['team_role']?></span>
                                <p><?= $item['team_content']?></p>
                                <a class="item-link" href="<?= $item['team_link']?>"><img src="/wp-content/uploads/2022/10/fi_linkedin-1.png?>" alt=""> <?= $item['team_link_name']?></a>
                            </div>

                        </div>
                    <?php endforeach;?>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php get_footer(); ?>