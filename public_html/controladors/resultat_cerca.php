<?php 
    require_once __DIR__.'/../models/connectaBD.php';
    require_once __DIR__.'/../models/llistar_categories.php';
    require_once __DIR__.'/../models/resultat_cerca.php';

    $connexio = connectaBD();
    $categories = getCategories($connexio);

    $cerca = isset($_POST['cerca']) ? $_POST['cerca'] : '';
    if ($_POST['categoria'] == "todas") {
        $productes = $cerca ? cercaProductes($connexio, $cerca) : [];
    } else {
        $productes = $cerca ? cercaProductesCategoria($connexio, $cerca, $_GET['categoria']) : [];
    }
    require __DIR__.'/../vistes/llistar_productes.php';
?>