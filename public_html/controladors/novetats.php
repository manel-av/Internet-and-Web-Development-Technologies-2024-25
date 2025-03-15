<?php
    require_once __DIR__.'/../models/connectaBD.php';
    require_once __DIR__.'/../models/producte.php';

    $connexio = connectaBD();
    $productes = getProductesNous($connexio, 10);
    
    require __DIR__.'/../vistes/llistar_productes.php';
?>