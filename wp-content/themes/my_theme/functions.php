<?php

define("WP_THEME", get_template_directory_uri().'/');

// Pour savoir si Wordpress exécute l'interface de Back-Office, on utilise la
// fonction is_admin()
// https://developer.wordpress.org/reference/functions/is_admin/
// https://codex.wordpress.org/Function_Reference/is_admin
// is_admin(); retourne un booleen 

// La plupart des fonctions sont déclenchées par des événements.
// On utilise la méthode "add_action" pour associer le déclenchement d'une
// fonction à un événement.
// https://developer.wordpress.org/reference/functions/add_action/

// active la gestion des menus

function register_menu(){
        register_nav_menu("new-menu",__("New Menu", "CV_TextDomain"));
}

add_action("init","register_menu");

// ajout de bootstrap
function load_bootstrap(){
    // https://developer.wordpress.org/reference/functions/wp_enqueue_style/
    // ajout de bootstrap css
    wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css');
        
    // https://developer.wordpress.org/reference/functions/wp_enqueue_script/
    // ajout de bootstrap js
    wp_enqueue_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', ["jquery-3", "popperjs"], false, true);
    wp_enqueue_script('popperjs', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', [], false, true);
    wp_enqueue_script('jquery-3', 'https://code.jquery.com/jquery-3.3.1.min.js', [], false, true);
}                                    
add_action("wp_loaded", "load_bootstrap");

// - Uniquement sur le front-office
// - Event: wp_loaded
// - fonction Wordpress : wp_enqueue_style

// ajout d'une feuille de style personnaliséé
function load_custom_style(){
    wp_enqueue_style('my_custom_style', WP_THEME.'assets/css/main.css');
}
add_action("wp_loaded", "load_custom_style");

// Ajout de la balise <title>
function ajout_title(){
    if(!is_admin()){
        add_theme_support("title-tag");
    }    
}
add_action("after_setup_theme", "ajout_title");
// Event: wp_loaded
// - fonction Wordpress : after_setup_theme

// supprimer la balise 'meta' generator
remove_action("wp_head", "wp_generator");

function get_image($photo){
    return WP_THEME."assets/images/".$photo;
}
// ajout des customs post
  include_once "includes/portfolio.php";

//ajout des shortcode
include_once "includes/copyright_shortcode.php";