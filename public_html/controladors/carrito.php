<?php 
    require_once __DIR__.'/../models/connectaBD.php';
    require_once __DIR__.'/../models/producte.php';

    if (isset($_SESSION['carrito'])) {
        $connexio = connectaBD(); 
        $productes = array();
        foreach ($_SESSION['carrito'] as $productId => $quantity) {
            if ($quantity > 0) {
                $producte = getProducte($connexio, $productId);
                $productes[] = $producte;
            }
        }
    }

    require __DIR__.'/../vistes/carrito.php';
?>