<?php
require_once __DIR__.'/../models/connectaBD.php';
require_once __DIR__.'/../models/compra.php';
require_once __DIR__.'/../models/producte.php';

// Comprobamos si el usuario está logueado y si hay productos en el carrito
if (isset($_SESSION['user_id']) && isset($_SESSION['carrito'])) {
    $connexio = connectaBD();
    $userId = $_SESSION['user_id'];
    $cart = $_SESSION['carrito'];
    $totalPrice = $_SESSION['totalPrice'];
    $totalQuantity = $_SESSION['totalProds'];
    $time = date('Y-m-d H:i:s');  // Hora actual
    $comandaId = realizar_compra($userId, $totalQuantity, $totalPrice, $time, $connexio);
    
    if ($comandaId) {

        // Preparar el recibo para mostrarlo en la vista
        $receipt = [
            'comanda_id' => $comandaId,
            'total_price' => $totalPrice,
            'total_quantity' => $totalQuantity,
            'products' => []
        ];

        // Guardar los detalles de cada producto en la comanda
        foreach ($cart as $productId => $quantity) {
            $product = getProducte($connexio, $productId);
            guardar_info_producto($productId, $quantity, $product['preu'], $comandaId, $connexio);
            
            $receipt['products'][] = [
                'name' => $product['nom'],
                'quantity' => $quantity,
                'price' => $product['preu'],
                'subtotal' => $product['preu'] * $quantity
            ];
        }

        // Vaciar el carrito después de la compra
        unset($_SESSION['carrito']);
        unset($_SESSION['totalProds']);
        unset($_SESSION['totalPrice']);
        
        $_SESSION['receipt'] = $receipt;
        require __DIR__.'/../vistes/menu_superior.php';
        require __DIR__.'/../vistes/compra.php';
    } else {
        $_SESSION['error_message'] = 'Hubo un problema al procesar tu compra. Intenta nuevamente.';
        header('Location: /index.php?accio=consulta-carrito');
        exit();
    }
} else {
    header('Location: /index.php');
    exit();
}
?>