<?php
session_start();
require_once __DIR__.'/../models/connectaBD.php';
require_once __DIR__.'/../models/producte.php';
if (isset($_POST['modal-prodID']) && isset($_POST['modal-quantity']) && is_numeric($_POST['modal-quantity'])) {
    $prodID = $_POST['modal-prodID'];
    $quantity = (int) $_POST['modal-quantity'];

    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }

    if (!empty($prodID)) {
        if (isset($_SESSION['carrito'][$prodID])) {
            $_SESSION['carrito'][$prodID] += $quantity;
        } else {
            $_SESSION['carrito'][$prodID] = $quantity;
        }
    }
}
$num_productos = 0;
$total_price = 0;
$connexio = connectaBD();

if (isset($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $id => $quantity) {
        $num_productos += $quantity;
        $producte = getProducte($connexio, $id);
        $total_price += $producte['preu'] * $quantity;
    }
} 
$_SESSION['totalProds'] = $num_productos;
$_SESSION['totalPrice'] = $total_price;

echo $num_productos . ';' . number_format($total_price, 2, ',', '.');
exit;
?>