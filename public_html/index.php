<?php
// index.php
session_start();
$accio = $_GET['accio'] ?? NULL;
$categoria = $_GET['categoria'] ?? NULL;
$filesAbsolutePath = '/home/TDIW/tdiw-n15/public_html/uploadedFiles/';
$filesPublicPath = 'uploadedFiles/';

switch ($accio) {
    case 'login':
        require __DIR__.'/resource_login.php';
        break;
    case 'registre':
        require __DIR__.'/resource_registre.php';
        break;
    case 'consulta-carrito':
        require __DIR__.'/resource_carrito.php';
        break;
    case 'añadir_producto':
        require __DIR__.'/resource_añadir_producto.php';
        break;
    case 'cerca_producte':
        require __DIR__.'/resource_cerca.php';
        break;
    case 'hacer_compra':
        require __DIR__.'/resource_compra.php';
        break;
    case 'compte':
        require __DIR__.'/resource_compte.php';
        break;
    case 'modificar_compte':
        require __DIR__.'/resource_modificar_compte.php';
        break;
    case 'comandes':
        require __DIR__.'/resource_comanda.php';
        break;
    case 'logout':
        require __DIR__.'/resource_logout.php';
        break;
    default:
        require __DIR__.'/resource_portada.php';
        break;
}
?>