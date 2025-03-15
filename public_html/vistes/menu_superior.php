<body>
    <header class="main-header">
        <!-- Logo de la página -->
        <div class="logo">
            <a href="index.php">
                <img src="/Resources/img/logo.png" alt="Logo de la página" class="logo-image">
            </a>
        </div>
        
        <!-- Icono del carrito -->
        <?php if (isset($_SESSION['user_id'])) {
            $action = "index.php?accio=consulta-carrito";
        } else {
            $action = "index.php?accio=login";
        }
        ?>

        <div class="carrito">
            <a href=<?php echo $action;?>>
                <img src="/Resources/img/carrito.png" alt="Carrito">
                <span class="carrito-count"><?php echo isset($_SESSION['carrito']) ? $_SESSION['totalProds'] : 0; ?></span>
            </a>
        </div>
        <h3 class="import-total">Import: <?php echo isset($_SESSION['totalPrice']) ? number_format($_SESSION['totalPrice'], 2, ',', '.') : number_format(0, 2, ',', '.'); ?>€</h3>
        <!-- Menú desplegable d'usuari -->
        <div class="user-menu">
            <button class="user-menu-btn">Menú</button>
            <ul class="user-menu-options">
                <?php if (isset($_SESSION['user_id'])) { ?>
                    <li><a href="index.php?accio=compte">El meu compte</a></li>
                    <li><a href="index.php?accio=comandes">Les meves compres</a></li>
                    <li><a href="index.php?accio=logout">Tancar sessió</a></li>
                <?php } else { ?>
                    <li><a href="index.php?accio=login">Iniciar sessió</a></li>
                <?php } ?>
            </ul>
        </div>
    </header>
</body>