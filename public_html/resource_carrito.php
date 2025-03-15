<!DOCTYPE html>
<html lang="ca">
    <head>
        <title>Cabàs - Swapealo</title>
        <script src="/Resources/js/jquery-3.7.1.min.js"></script>
        <script src="/Resources/js/funcions.js"></script>
        <link rel="stylesheet" href="/Resources/css/styles.css">
        <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <?php require __DIR__.'/controladors/menu_superior.php';?> 
        </header>
        <div>
            <?php require __DIR__.'/controladors/carrito.php'; ?>
        </div>
    </body>
    <footer class="main-footer">
        <div class="total">
            <h3>Total a pagar: <?php echo number_format($_SESSION['totalPrice'], 2, ',', '.'); ?>€</h3>
            <form method="POST" action="/index.php?accio=hacer_compra">
                <button type="submit" name="compra" id="compra" class="user-menu-btn">Fer compra</button>
            </form>
        </div>
        <?php require __DIR__."/controladors/footer.php"; ?>
    </footer>
</html>