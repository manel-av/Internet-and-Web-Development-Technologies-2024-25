<body>
<div class="container-carrito-container">
    <div class="llistat">
        <h3>Informació de la compte</h3>
        <form method="POST" action="/index.php?accio=compte">
            <button type="submit" class="user-menu-btn">Torna a la pàgina d'usuari</button>
        </form>
    </div>
    <div id="modify-user-info">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="Nombre">Nom:</label>
                <input type="text" name="Nombre" id="Nombre" pattern="[A-Za-zÀ-ÿ\s]+" title="Només caràcters i espais" placeholder="Introduex el teu nom" value="<?php echo htmlspecialchars($usuari[0]['nom']); ?>" required>
            </div>

            <div class="form-group">
                <label for="Email">Adreça de correu electrònic:</label>
                <input type="email" name="Email" id="Email" placeholder="Introduex el teu email" value="<?php echo htmlspecialchars($usuari[0]['email']); ?>" required>
            </div>

            <div class="form-group">
                <label for="Contraseña">Nova contrasenya:</label>
                <input type="password" name="Contraseña" id="Contraseña" pattern="[A-Za-z0-9]+" placeholder="Introduex la teva clau" required>
            </div>

            <div class="form-group">
                <label for="Contraseña2">Repeteix la contrasenya:</label>
                <input type="password" name="Contraseña2" id="Contraseña2" pattern="[A-Za-z0-9]+" placeholder="Introduex la teva clau" required>
            </div>
            <p class="error-message"><?php echo htmlspecialchars($_SESSION['error_message']); ?></p>
            <?php unset($_SESSION['error_message']);?>

            <div class="form-group">
                <label for="Dirección">Adreça:</label>
                <input type="text" name="Dirección" id="Dirección" maxlength="30" placeholder="Introduex la teva adreça" value="<?php echo htmlspecialchars($usuari[0]['adreça']); ?>" required>
            </div>

            <div class="form-group">
                <label for="Población">Població:</label>
                <input type="text" name="Población" id="Población" maxlength="30" placeholder="Introduex la teva població" value="<?php echo htmlspecialchars($usuari[0]['poblacio']); ?>" required>
            </div>

            <div class="form-group">
                <label for="CP">Codi Postal:</label>
                <input type="text" name="CP" id="CP" pattern="^\d{5}$" title="Ha de contenir 5 números" placeholder="Introduex el teu codi postal" value="<?php echo htmlspecialchars($usuari[0]['codi_postal']); ?>" required>
            </div>

            <div class="form-group">
                <label for="upload-button">Imatge de perfil:</label>
            </div>
            <input type="file" name="upload-button" id="upload-button">

            <div id="submit-button">
                <button type="submit" name="Enviar" id="Enviar">Guarda canvis</button>
            </div>
        </form>
    </div>
</div>
</body>
