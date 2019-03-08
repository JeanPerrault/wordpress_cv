<?php
/*
Template Name: Blog
*/

$BlogPosts = new WP_Query();
$BlogPosts->query([
    "showposts" => 5
]);

?>
<?php get_header() ?>

<!-- Est-ce que j'ai des Posts ? -->
<?php if ( $BlogPosts->have_posts() ): ?>

    <!-- Je boucle tant que j'ai des posts -->
    <?php while ( $BlogPosts->have_posts()): ?>

        <!-- j'initialise les données de mon post -->
        <?php $BlogPosts->the_post(); ?>

        <!-- Titre du post -->
        <h1><?= get_the_title() ?></h1>

        <!-- Contenu de l'article -->
        <?php // the_content() ?>
        <?php //the_excerpt() ?>
        <a href="<?= get_the_permalink() ?>"><?= get_the_excerpt() ?></a>

    <?php endwhile; ?>

<?php endif; ?>

<?php get_footer() ?>