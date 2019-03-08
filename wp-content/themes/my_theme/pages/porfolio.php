<?php
/*
Template Name: portfolio (pages/portfolio.php)
*/

$args = [
    "post_type" => "portfolio",
    "post_per_page" => 10,
];

$query = new WP_query($args);

// var_dump($query);

?>
<?php get_header() ?>

<?php if($query->have_posts()):?> 
    <?php while($query->have_posts()): ?>
        <?php $query->the_post() ?>
        <article>
            <h1><?= get_the_title() ?></h1>
            <div> <a href="<?= get_the_permalink() ?>"> <?= get_the_permalink() ?></a></div>
            <div><?= get_the_excerpt() ?></div>
            <div><?= get_the_content() ?></div>
            <br>

            <a href="<?= get_post_meta( get_the_ID(), "url", true ) ?>" class="btn btn-success">
                    <?= get_post_meta( get_the_ID(), "url_label", true ) ?>
                </a>
        </article>
        
    <?php endwhile; ?>
<?php else:?> 
    <div class="alert alert-warnings">
        Aucun post sur cette page
    </div>
<?php endif;?> 
<?php wp_reset_postdata() ?>

<?php get_footer() ?>