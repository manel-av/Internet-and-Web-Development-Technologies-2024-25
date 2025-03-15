<body>
<div class="container-carrito-container">
    <div class="llistat">
        <h3>Informació de la compte</h3>
        <form method="POST" action="index.php">
            <button type="submit" class="user-menu-btn">Torna a la pàgina principal</button>
        </form>
    </div>
    <div id="user-info">
        <!-- Imagen de perfil -->
        <div id="profile-image-container">
            <?php
                $imatge = "/../Resources/img/default_img.png";
                if ($usuari[0]['img'] != NULL) {
                    $imatge = $usuari[0]['img'];
                }
            ?>
            <img id="profile-image" src="<?php echo htmlspecialchars($imatge); ?>" alt="Imatge de perfil" width="150">
        </div>

        <!-- Información del usuario -->
        <div id="user-details">
            <p><strong>Nom:</strong> <span id="user-name"><?php echo htmlspecialchars($usuari[0]['nom']); ?></span></p>
            <p><strong>Correu electrònic:</strong> <span id="user-email"><?php echo htmlspecialchars($usuari[0]['email']); ?></span></p>
            <p><strong>Adreça:</strong> <span id="user-address"><?php echo htmlspecialchars($usuari[0]['adreça']); ?></span></p>
            <p><strong>Població:</strong> <span id="user-city"><?php echo htmlspecialchars($usuari[0]['poblacio']); ?></span></p>
            <p><strong>Codi Postal:</strong> <span id="user-postal-code"><?php echo htmlspecialchars($usuari[0]['codi_postal']); ?></span></p>
        </div>

        <!-- Enlace para modificar información -->
        <div id="modify-info-button">
            <form action="/index.php?accio=modificar_compte" method="POST">
                <button type="submit">Modificar informació</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
