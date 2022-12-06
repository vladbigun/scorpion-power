<style>
    .technologies-post__stack{
        padding: 30px;
        box-shadow: 0px 0px 31px rgba(188, 188, 188, 0.2);
        border-radius: 10px;
        box-sizing: border-box;
        min-height: 230px;
        overflow: hidden;
        position: relative;
    }
    .technologies-post__stack h4{
        font-size: 24px;
    }
    @media (max-width: 800px) {
        .technologies-post__stack h4{
            font-size: 20px;
        }
    }
    .technologies-post__items{
        max-width: 450px;
        width: 100%;
    }


    .technologies-post__item{
        padding: 4px 0;
        margin-left: 20px;
        font-size: 16px;
    }
    @media (max-width: 800px) {
        .technologies-post__item{
            font-size: 14px;
        }
    }
    .technologies-post__background{
        background-repeat: no-repeat;
        position: absolute;
        width: 260px;
        background-position: bottom right;
        height: 260px;
        background-size: contain;
        display: flex;
        border-radius: 50%;
        bottom: -80px;
        right: -80px;
        justify-content: center;
        align-items: center;
    }
    .technologies-post__background .icon{
        height: 40px;
    }
    @media (max-width: 1030px) {
        .technologies-post__background {
            width: 200px;
            height: 200px;
            bottom: -70px;
            right: -70px;
        }
    }
    @media (max-width: 800px) {
        
    }

</style>

<div class="technologies-post__stack">
    <h4><?= get_field('technology_title' , get_the_ID()) ?></h4>
    <ul class="technologies-post__items">
        <?php foreach ( get_field('technologies', get_the_ID()) as $technology): ?>
            <li class="technologies-post__item">
                <?= $technology['name'] ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <div class="technologies-post__background" style="background-image: url(<?= get_field('technology_background',  get_the_ID())['url'] ?>)">
        <img class="icon" src="<?= get_field('technology_icon',  get_the_ID())['url'] ?>" alt="">
    </div>
</div>