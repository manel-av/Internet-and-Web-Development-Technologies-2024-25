<!DOCTYPE html>
<html lang="ca">
    <head>
        <link rel="stylesheet" href="/Resources/css/styles.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap">
        <script src="/Resources/js/jquery-3.7.1.min.js"></script>
        <script src="/Resources/js/funcions.js"></script>
        <title>Resultat - <?php echo htmlspecialchars($_POST['cerca'], ENT_QUOTES, 'UTF-8'); ?></title>
    </head>
    <body>
        <header>
            <?php require __DIR__.'/controladors/menu_superior.php';?>  
        </header>
        <div class="search-container">
            <?php require __DIR__.'/controladors/cercador.php'; ?>
            <section class="products" id="cerca">
                <div class="llistat">
                    <h1>Resultat de cercar: <?php echo htmlspecialchars($_POST['cerca'], ENT_QUOTES, 'UTF-8'); ?></h1>
                    <form method="POST" action="index.php">
                        <button type="submit" class="user-menu-btn">Torna a la pàgina principal</button>
                    </form>
                </div>
                <?php require __DIR__.'/controladors/resultat_cerca.php';?>
            </section>
        </div>
    </body>
    <footer class="main-footer">
        <?php require __DIR__."/controladors/footer.php"; ?>
    </footer>
</html>