<style>
    .template_general_block p {
        margin-top: 20px;
        max-width: 50%;
    }
    .template_general_block .button{
        margin-top: 30px;
    }
    @media (max-width: 800px) {
        .template_general_block p {
            max-width: 100%;
        }
    }
</style>
<div class="template_general_block">
    <h3><?= $args['title'] ?></h3>
    <p><?= $args['description']?></p>
    <?php if( $args['button']):?>
        <a class="button" href="<?= $args['button']['url'] ?>">
            <span><?= __('More')?></span>
        </a>
    <?php endif;?>
</div>