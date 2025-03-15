<?php 
    require_once __DIR__.'/../models/connectaBD.php';
    require_once __DIR__.'/../models/llistar_categories.php';

    $connexio = connectaBD();
    $categories = getCategories($connexio);

    require __DIR__.'/../vistes/cercador.php';
    
    if ($_GET['accio'] != 'cerca_producte') {
        require __DIR__.'/../vistes/carousel.php';
    }
?>