<!DOCTYPE html>
<html lang="ca">
    <head>
        <title>Modificar Compte - Swapealo</title>
        <link rel="stylesheet" href="/Resources/css/styles.css">
        <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
        <script src="/Resources/js/jquery-3.7.1.min.js"></script>
        <script src="/Resources/js/funcions.js"></script>
    </head>
    <body>
        <header>
            <?php require __DIR__.'/controladors/menu_superior.php';?>
        </header>
        <div>
            <?php require __DIR__.'/controladors/modificar_compte.php'; ?>
        </div>
    </body>
    <footer class="main-footer">
        <?php require __DIR__."/controladors/footer.php"; ?>
    </footer>
</html>