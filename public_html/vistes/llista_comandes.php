<body>
    <div class="container-carrito-container">
        <div class="llistat">
            <h3>Llistat de comandes:</h3>
            <form method="POST" action="index.php">
                <button type="submit" class="user-menu-btn">Torna a la pàgina principal</button>
            </form>
        </div>

        <!-- Recorrer comandas -->
        <?php if (!empty($llistat_comandes)): ?>
            <ul class="container-carrito">
                <?php foreach ($llistat_comandes as $comanda_data): ?>
                    <li class="comanda-item">
                        <h2>Comanda ID: <?php echo htmlspecialchars($comanda_data['comanda']['id'], ENT_QUOTES, 'UTF-8'); ?></h2>
                        <p><strong>Data: </strong><?php echo htmlspecialchars($comanda_data['comanda']['data'], ENT_QUOTES, 'UTF-8'); ?></p>
                        <p><strong>Total: </strong><?php echo htmlspecialchars($comanda_data['comanda']['preu_total'], ENT_QUOTES, 'UTF-8'); ?>€</p>
                        <hr />
                        <!-- Productos de la comanda -->
                        <ul class="productes-comanda-container">
                            <?php foreach ($comanda_data['productes'] as $producte): ?>
                                <li class="productes-comanda-item">
                                    <img src="<?php echo htmlspecialchars($producte['imatge'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($producte['nom'], ENT_QUOTES, 'UTF-8'); ?>" class="productes-comanda-image">
                                    <div class="productes-comanda-details">
                                        <h3><?php echo htmlspecialchars($producte['nom'], ENT_QUOTES, 'UTF-8'); ?></h3>
                                        <p>Quantitat: <?php echo htmlspecialchars($producte['quantitat'], ENT_QUOTES, 'UTF-8'); ?></p>
                                        <p>Precio: <?php echo htmlspecialchars($producte['preu'], ENT_QUOTES, 'UTF-8'); ?>€</p>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</body>
