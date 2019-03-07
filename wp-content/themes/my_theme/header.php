<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <title><?= bloginfo('name') ?></title> -->

    
    <?php 
    // ajoute les tags de l'entête
    wp_head() 
    ?>

</head>
<body>
    
<header id="main-header">
    <div class="row">
        <div class="col-6 nom">
           <h1>PERRAULT Jean</h1>
        </div>
        <div class="col-6">
         <nav class="navbar navbar-expand-lg "> 
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"> 
                <span class="navbar-toggler-icon"> 
            </button> 
            <div class="collapse navbar-collapse" id="navbarNavDropdown"> 
                <ul class="navbar-nav"> 
                    <li class="nav-item dropdown active"> 
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        Menu 
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"> 
                        <?php wp_nav_menu(["menu" => "main-menu"]) ?>        
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div> 
       
</header>

    <div class="row">
        <div class="col-6">
        <?php get_sidebar() ?>
        </div>
        <div class="col-6">

            <main id="main-content">
            
        