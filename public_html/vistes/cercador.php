<body>
    <div class="search-container">
        <p class="search-Title">Què vols trobar?</p>
        <form method="POST" action="/../index.php?accio=cerca_producte">
            <div class="search-bar">
                <!-- Barra de búsqueda -->
                <div class="search-input-container">
                    <img src="Resources/img/lupa-gris.png" class="search-icon" alt="Buscar">
                    <input type="text" name="cerca" placeholder="Introdueix producte..." class="search-input" 
                            aria-label="Buscar productos o servicios">
                </div>

                <!-- Categorías desplegables -->
                <div class="category-dropdown-container">
                    <select name="categoria" class="categories-dropdown">
                        <option value="todas">Totes les categories</option>
                        <?php foreach($categories as $categoria){?>
                            <option value="<?php echo htmlspecialchars($categoria['id'], ENT_QUOTES, 'UTF-8'); ?>">
                                <?php echo htmlspecialchars($categoria['nom'], ENT_QUOTES, 'UTF-8'); ?>
                            </option>
                        <?php }?>
                    </select>
                </div>

                <!-- Botón de búsqueda -->
                <button type="submit" class="search-product-btn">
                    <div class="search-product">
                        <img src="Resources/img/lupa.png" class="search-product-icon" alt="Imagen lupa" >
                    </div>
                </button>
            </div>
        </form>
    </div>
</body>