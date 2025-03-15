<body>
    <div class="confirmació">
        <h1>La compra s'ha processat correctament.</h1>

        <?php
        // Acceder a la variable 'receipt' desde la sesión
        if (isset($_SESSION['receipt'])) {
            $receipt = $_SESSION['receipt'];
        ?>
            <h2>Comanda ID: <?php echo htmlspecialchars($receipt['comanda_id']); ?></h2>
            <p>Total quantitat: <?php echo htmlspecialchars($receipt['total_quantity']); ?> productes</p>
            <p>Total a pagar: <?php echo number_format($receipt['total_price'], 2, ',', '.'); ?>€</p>

            <h3>Detalls de la compra:</h3>
            <ul>
                <?php foreach ($receipt['products'] as $product) { ?>
                    <li>
                        <strong><?php echo htmlspecialchars($product['name']); ?></strong>
                        - Quantitat: <?php echo htmlspecialchars($product['quantity']); ?>
                        - Preu unitari: <?php echo number_format($product['price'], 2, ',', '.'); ?>€
                        - Subtotal: <?php echo number_format($product['subtotal'], 2, ',', '.'); ?>€
                    </li>
                <?php } ?>
            </ul>
        <?php
            // Limpiar el recibo de la sesión después de mostrarlo
            unset($_SESSION['receipt']);
        } else {
            echo "<p>No se pudo procesar la compra correctamente. Intenta de nuevo.</p>";
        }
        ?>
    </div>
    <div class="login-btn-container">
            <a href="/../index.php" class="login-btn">Torna</a>
    </div>
</body>