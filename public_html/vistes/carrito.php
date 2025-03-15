<?php session_start(); ?>
<?php
if (isset($_SESSION['carrito'])) {
    // Vaciar el carrito
    if (isset($_POST['empty-cart-btn'])) {
        unset($_SESSION['carrito']);
        unset($_SESSION['totalProds']);
        unset($_SESSION['totalPrice']);
        header("Location: https://tdiw-n15.deic-docencia.uab.cat/index.php?accio=consulta-carrito");
        exit();
    }

    // Actualizar la cantidad de un producto
    if (isset($_POST['update-quantity-btn'])) {
        $productId = $_POST['product-id'];
        $newQuantity = intval($_POST['product-quantity']);
        if ($newQuantity > 0) {
            $_SESSION['carrito'][$productId] = $newQuantity;
        } else {
            unset($_SESSION['carrito'][$productId]);
        }

        $num_productos = 0;
        $total_price = 0;
        foreach ($productes as $producte) {
            $num_productos += $_SESSION['carrito'][$producte['id']];
            $total_price += (float)$producte['preu'] * $num_productos;
        }
        $_SESSION['totalProds'] = $num_productos;
        $_SESSION['totalPrice'] = $total_price;

        header("Location: https://tdiw-n15.deic-docencia.uab.cat/index.php?accio=consulta-carrito");
        exit();
    }

    // Eliminar un producto del carrito
    if (isset($_POST['remove-product-btn'])) {
        $productId = $_POST['product-id'];
        unset($_SESSION['carrito'][$productId]);

        $num_productos = 0;
        $total_price = 0;
        foreach ($productes as $producte) {
            $num_productos += $_SESSION['carrito'][$producte['id']];
            $total_price += (float)$producte['preu'] * $num_productos;
        }
        $_SESSION['totalProds'] = $num_productos;
        $_SESSION['totalPrice'] = $total_price;

        header("Location: https://tdiw-n15.deic-docencia.uab.cat/index.php?accio=consulta-carrito");
        exit();
    }
}
?>
<body>
    <div class="back-btn">
        <a href="/../index.php" class="user-menu-btn" id="carrito-back">❮</a>
    </div>
    <div class="container-carrito-container">
        <div class="llistat">
            <h3>Llistat de productes al Cabàs:</h3>
            <form method="POST" action="">
                <button type="submit" name="empty-cart-btn" id="empty-cart-btn" class="user-menu-btn">Buidar el cabàs</button>
            </form>
        </div>
        <ul class="container-carrito">
            <?php 
            foreach ($productes as $producte) {
                $quantity = $_SESSION['carrito'][$producte['id']];
                ?>
            <li class="product-item">
                <img src="<?php echo htmlspecialchars($producte['imatge'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($producte['nom'], ENT_QUOTES, 'UTF-8'); ?>" class="product-image">
                <div class="product-details">
                    <h3><?php echo htmlspecialchars($producte['nom'], ENT_QUOTES, 'UTF-8'); ?></h3>
                    <p>Precio: <?php echo htmlspecialchars($producte['preu'], ENT_QUOTES, 'UTF-8'); ?>€</p>
                    
                    <form method="POST" action="">
                        <div class="update-quantity-selector">
                            <label for="product-quantity-<?php echo $producte['id']; ?>">Cantidad:</label>
                            <input type="number" name="product-quantity" id="product-quantity-<?php echo $producte['id']; ?>" value="<?php echo $quantity; ?>" min="1">
                        </div>
                        <input type="hidden" name="product-id" value="<?php echo $producte['id']; ?>">
                        <button type="submit" name="update-quantity-btn" class="user-menu-btn">Actualizar</button>
                        <button type="submit" name="remove-product-btn" class="elim-btn">Eliminar</button>
                    </form>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
</body>
