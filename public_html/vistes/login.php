<body>
    <div class="ocupar">
        <!-- Contenedor de la página de login -->
        <div class="login-container">
            <div class="back-btn">
                <a href="/../index.php" class="user-menu-btn">❮</a>
            </div>
            <h2>Iniciar Sessió</h2>
            <form class="login-form" action="/../index.php?accio=login" method="POST">
                <div class="input-group">
                    <label for="email">Correu electrònic</label>
                    <input type="email" id="email" name="email" placeholder="Introdueix el correo electrònic" required>
                </div>
                <div class="input-group">
                    <label for="password">Contrasenya</label>
                    <input type="password" id="password" name="password" placeholder="Introdueix la teva contrasenya" required>
                </div>
                <?php
                if (isset($_SESSION['error_message'])) {?>
                    <p class="error-message"><?php echo htmlspecialchars($_SESSION['error_message']); ?></p>
                    <?php unset($_SESSION['error_message']);?>
                <?php }?>
                <button type="submit" class="login-btn">Iniciar Sessió</button>
                <p class="register-link">No tens una compta? <a href="/../index.php?accio=registre">Registra't aquí</a></p>
            </form>
        </div>
    </div>
</body>
