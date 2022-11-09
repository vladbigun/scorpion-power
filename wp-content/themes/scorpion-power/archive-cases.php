<?php get_header() ?>
<div class="container">
    <div class="header-archive">
        <div class="text">
            <h1><?= post_type_archive_title() ?></h1>
            <p><?= get_the_archive_description() ?></p>
        </div>
        <div class="img"></div>
    </div>

    <div class="archive-items cases">
        <?php if (have_posts()) :?>
        <?php while (have_posts()) : the_post() ?>
            <div class="archive-item">
                <div class="item-content">
                    <h3><?= get_the_title() ?></h3>
                    <p class="short-description"><?= get_field('short_description', get_the_ID()) ?> </p>

                    <?php $lists = get_field('lists', get_the_ID()); ?>
                    <?php if($lists) :?>
                        <h4>Project team</h4>
                        <ul class="team-list">
                            <?php foreach ($lists as $team):?>
                                <li><?= $team['count'] . ' ' . $team['name'] ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif;?>
                    <h4>Project description</h4>
                    <p class="description"><?= get_field('description', get_the_ID()) ?> </p>
                </div>
                <div class="img">
                    <?= get_the_post_thumbnail() ?>
                </div>
            </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>

<?php get_footer() ?>