<style>
    .technologies-post__stack{
        padding: 20px;
        box-shadow: 0px 0px 31px rgba(188, 188, 188, 0.2);
        border-radius: 10px;
        box-sizing: border-box;
        min-height: 230px;
        overflow: hidden;
        position: relative;
    }
    .technologies-post__items{
        max-width: 450px;
        width: 100%;
    }

    .technologies-post__item{
        overflow: hidden;
        padding: 4px 0;
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
</style>
<div class="technologies-post__stack">
    <h4><?= get_field('technology_title') ?></h4>
    <ul class="technologies-post__items">
        <?php foreach ( get_field('technologies') as $technology): ?>
            <li class="technologies-post__item">
                <?= $technology['name'] ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <div class="technologies-post__background" style="background-image: url(<?= get_field('technology_background')['url'] ?>)">
        <img class="icon" src="<?= get_field('technology_icon')['url'] ?>" alt="">
    </div>
</div>