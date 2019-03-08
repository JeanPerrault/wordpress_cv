<?php

define("WP_THEME", get_template_directory_uri().'/');

/**
 * Déclaration du Custom Post "portfolio"
 */

 function portfolio_custom_post(){
    // definition du type de post (max 22 caracteres)
    $post_type ="portfolio";

    // definition des options du custom post
    $args = [

        // - PARAMETRES MINIMUM

        // etiquette du menu Admin
        'label' => "Mon Portfolio",
        // rendre le custom post public
        'public' => true,

        // - PARAMETRES DE L EDITEUR

        'supports' => [
            'title', // champ titre
            'editor', // champ de saisie du texte
            'excerpt', // chapeau de l article
            'author', // selection de l auteur
            'thumbnail', // illustration miniature
            'revisions', // historique du post
            'custom-fields', // ajout de champs personnalisés
        ],

        // - PARAMETRES FACULTATIFS

        // description
        'description' => "Découvrez mes travaux sur mon portfolio",

    ];

    // ajoute le custom post au registre de Wordpress
    register_post_type($post_type, $args);
 }
 add_action("init", "portfolio_custom_post");