<?php

/**
 * Gestion des menu à plusieurs niveaux
 */

// Récupération des éléments du menu "Main Menu"
$wp_menu = wp_get_nav_menu_items("main-menu");

// Déclaration du tableau final_menu
$final_menu = [];

// On récupère les élément du premier niveau
// Ce sont les éléments dont la propriété "menu_item_parent" vaut 0
foreach($wp_menu as $key => $item) 
{
    if ($item->menu_item_parent == 0) 
    {
        // On ajoute les élément du premier niveau au tableau $final_menu
        $final_menu[ $item->ID ] = $item;

        // On ajoute à l'objet "$item", la propriété "subnav", qui est un tableau vide
        $final_menu[ $item->ID ]->subnav = [];

        // On supprime l'$item du tableau $wp_menu afin d'alèger le tableau $wp_menu
        unset($wp_menu[$key]);
    }
}

// On fait une seconde boucle sur le tableau $wp_menu pour récupérer les éléments de sous-menu
// C.A.D. les éléments dont la propriété "menu_item_parent" vaut autre que 0
foreach($wp_menu as $key => $item) 
{
    if (isset($final_menu[ $item->menu_item_parent ])) 
    {
        // On ajoute à la propriété "subnav" de l'élément de premier niveau dont l'ID
        // correspont à la propriété "menu_item_parent" de l'élément de sous-menu 
        // de l'itération courante
        array_push( $final_menu[ $item->menu_item_parent ]->subnav , $item);
    }
}


// Affichage du menu
echo "<ul>";

// Boucle sur le premier niveau
foreach ($final_menu as $key => $item) 
{
    // Affichage de l'élément du premier niveau
    echo '<li> <a href="'.$item->url.'">'.$item->title.'</a>';

    // Si l'élément de premier niveau possède des entrées dans sa propriété "subnav"...
    if (!empty($item->subnav)) {
        echo "<ul>";
        // On boucle sur les éléments de second niveau
        foreach ($item->subnav as $subItem)
        {
            // on affiche les éléments de sous menu
            echo '<li>';
            echo '<a href="'.$subItem->url.'">'.$subItem->title.'</a>';
            echo '</li>';
        }
        echo "</ul>";
    }
    echo '</li>';
}
echo "</ul>";