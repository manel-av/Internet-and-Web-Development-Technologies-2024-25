<?php
require_once __DIR__.'/../models/connectaBD.php';
require_once __DIR__.'/../models/llista_comandes.php';
require_once __DIR__.'/../models/producte.php';

session_start();
$userID = $_SESSION['user_id'] ?? null;

$connection = connectaBD();

$comandes = obtener_compras($connection, $userID);
$llistat_comandes = [];

foreach ($comandes as $comanda) {
    $comanda_id = $comanda['id'];
    $linies_comanda = obtener_productos_compra($connection, $comanda_id);

    $productes = [];
    foreach ($linies_comanda as $linia) {
        $producte = getProducte($connection, $linia['producte_id']);
        if ($producte) {
            $productes[] = array_merge($linia, $producte);
        }
    }

    $llistat_comandes[] = [
        'comanda' => $comanda,
        'productes' => $productes,
    ];
}

require __DIR__.'/../vistes/llista_comandes.php';
?>