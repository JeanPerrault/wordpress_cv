<?php get_header() ?>

<!-- Est-ce que j'ai des Posts ? -->
<?php if ( have_posts() ): ?>

    <!-- Je boucle tant que j'ai des posts -->
    <?php while ( have_posts() ): ?>

        <!-- j'initialise les données de mon post -->
        <?php the_post(); ?>

        <!-- Titre du post -->
        <h1><?= get_the_title() ?></h1>

        <!-- Contenu de la page -->
        <?php the_content() ?>

    <?php endwhile; ?>

<?php endif; ?>

<?php get_footer() ?>