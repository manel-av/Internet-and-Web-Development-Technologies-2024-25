<body>
    <nav class="category-carousel">
        <div class="full-carousel">
            <div class="carousel-arrow left-arrow" id="left-arrow">❮</div>
            <div class="carousel-container" id="carousel-container">
                <?php foreach($categories as $categoria) {?>
                    <a href="javascript:void(0)" class="category-link" 
                    id="<?php echo htmlspecialchars($categoria['id'], ENT_QUOTES, 'UTF-8'); ?>" 
                    nom="<?php echo htmlspecialchars($categoria['nom'], ENT_QUOTES, 'UTF-8'); ?>"
                    onclick="recuperarProductesCategoria('<?php echo htmlspecialchars($categoria['id'], ENT_QUOTES, 'UTF-8'); ?>',
                                                            '<?php echo htmlspecialchars($categoria['nom'], ENT_QUOTES, 'UTF-8'); ?>');">
                    <div class="carousel-item" id="carousel-item-<?php echo htmlspecialchars($categoria['id'], ENT_QUOTES, 'UTF-8'); ?>">
                        <img src="<?php echo htmlspecialchars($categoria['imatge'], ENT_QUOTES, 'UTF-8'); ?>" 
                                alt="<?php echo htmlspecialchars($categoria['nom'], ENT_QUOTES, 'UTF-8'); ?>">
                        <p><?php echo htmlspecialchars($categoria['nom'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    </a>
                <?php }?>
            </div>
            <div class="carousel-arrow right-arrow" id="right-arrow">❯</div>
        </div>
    </nav>

    <!-- Contenedor para productos -->
    <div id="product-list"></div>
</body>