<body>
    <div class="product-container">
        <?php foreach($productes as $producte) { ?>
            <div class="product-card" 
                data-imatge="<?php echo htmlspecialchars($producte['imatge'], ENT_QUOTES, 'UTF-8'); ?>"
                data-nom="<?php echo htmlspecialchars($producte['nom'], ENT_QUOTES, 'UTF-8'); ?>"
                data-preu="<?php echo htmlspecialchars($producte['preu'], ENT_QUOTES, 'UTF-8'); ?>"
                data-descripcio="<?php echo htmlspecialchars($producte['descripcio'], ENT_QUOTES, 'UTF-8'); ?>"
                data-prod_id="<?php echo $producte['id']; ?>"
                onclick="handleProductClick(this)">
                <img src="<?php echo htmlspecialchars($producte['imatge'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($producte['nom'], ENT_QUOTES, 'UTF-8'); ?>">
                <h3 class="nombre-producto"><?php echo htmlspecialchars($producte['nom'], ENT_QUOTES, 'UTF-8'); ?></h3>
                <p class="price"><?php echo htmlspecialchars($producte['preu'], ENT_QUOTES, 'UTF-8'); ?>€</p>
                <p class="preview-description"><?php echo htmlspecialchars($producte['descripcio'], ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
        <?php } ?>
    </div>

    <!-- Contenedor modal -->
    <div id="product-modal" class="modal" onclick="closeModal(event)">
        <div class="modal-content">
            <img id="modal-image" src="" alt="">
            <h3 id="modal-name"></h3>
            <p id="modal-price"></p>
            <p id="modal-description"></p>
            
            <!-- Formulario con selector de cantidad y botón -->
            <form id="add-to-cart-form" onsubmit="addToCart(event)" method="POST">
                <input type="hidden" id="modal-prodID" name="modal-prodID" value="">
            
                <!-- Selector de cantidad -->
                <div class="quantity-selector">
                    <label for="modal-quantity">Quantitat:</label>
                    <input type="number" id="modal-quantity" name="modal-quantity" value="1" min="1">
                </div>

                <!-- Botón añadir al carrito -->
                <button type="submit" id="add-to-cart-modal">Afegir al cabàs</button>
            </form>
        </div>
    </div>
</body>