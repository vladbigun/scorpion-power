<style>
    .technologies-post__stack{
        padding: 20px;
        box-shadow: 0px 0px 31px rgba(188, 188, 188, 0.2);
        border-radius: 10px;
        box-sizing: border-box;
        min-height: 230px;
    }
    .technologies-post__items{
        max-width: 450px;
        width: 100%;
    }

    .technologies-post__items{
    }
    .technologies-post__item{
        padding: 4px 0;
    }
    .technologies-post__background{
        background-repeat: no-repeat;
        position: absolute;
        bottom: 0;
        right: 0;
        width: 130px;
        background-position: bottom right;
        height: 130px;
        background-size: contain;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .technologies-post__background .icon{
        height: 40px;
    }
</style>
<div class="technologies-post__stack">
    <h4><?= get_field('technology_title') ?></h4>
    <div class="technologies-post__items">
        <?php foreach ( get_field('technologies') as $technology): ?>
            <div class="technologies-post__item">
                <?= $technology['name'] ?>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="technologies-post__background" style="background-image: url(<?= get_field('technology_background')['url'] ?>)">
        <img class="icon" src="<?= get_field('technology_icon')['url'] ?>" alt="">
    </div>
</div>