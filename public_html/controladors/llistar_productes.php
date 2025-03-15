<?php
    require_once __DIR__.'/../models/connectaBD.php';
    require_once __DIR__.'/../models/producte.php';

    if (isset($_GET['categoria'])) {
        $categoria = $_GET['categoria'];
    } else {
        die("Categoría no especificada");
    }

    $connexio = connectaBD();
    $productes = getProductesCategoria($connexio, $categoria);
    
    if ($productes) {
        require __DIR__.'/../vistes/llistar_productes.php';
    } else {
        echo '<p>No se encontraron productos para esta categoría.</p>';
    }
?>
