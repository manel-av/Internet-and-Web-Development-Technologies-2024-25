<body>
    <!-- Contenedor de la página de registro -->
    <div class="register-container">
        <div class="back-btn">
            <a href="/../index.php?accio=login" class="user-menu-btn">❮</a>
        </div>
        <h2>Registra't</h2>
        <form class="register-form" action="/../index.php?accio=registre" method="POST">
            <div class="input-group">
                <label for="name">Nom:</label>
                <input type="text" id="name" name="name" pattern="[A-Za-zÀ-ÿ\s]+" title="Només caràcters i espais" placeholder="Introduex el teu nom" required>
            </div>

            <div class="input-group">
                <label for="email">Adreça de correu electrònic:</label>
                <input type="email" id="email" name="email" placeholder="Introduex el teu email" required>
            </div>

            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" pattern="[A-Za-z0-9]+" title="Camp alfanumèric" placeholder="Introduex la teva clau" required>
            </div>

            <div class="input-group">
                <label for="address">Adreça:</label>
                <input type="text" id="address" name="address" maxlength="50" placeholder="Introduex la teva adreça" required>
            </div>

            <div class="input-group">
                <label for="city">Població:</label>
                <input type="text" id="city" name="city" maxlength="30" placeholder="Introduex la teva població" required>
            </div>

            <div class="input-group">
                <label for="postalcode">Codi Postal:</label>
                <input type="text" id="postalcode" name="postalcode" pattern="^\d{5}$" title="Ha de contenir 5 números" placeholder="Introduex el teu codi postal" required>
            </div>
            <?php
            if (isset($_SESSION['error_message'])) {?>
                    <p class="error-message"><?php echo htmlspecialchars($_SESSION['error_message']); ?></p>
                    <?php unset($_SESSION['error_message']);?>
                <?php }?>
            <button type="submit" class="register-btn">Registrar-se</button>
        </form>
    </div>
</body>
