<!DOCTYPE html>
<html lang="ca">
    <head>
        <link rel="stylesheet" href="/Resources/css/styles.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap">
        <script src="/Resources/js/jquery-3.7.1.min.js"></script>
        <script src="/Resources/js/funcions.js"></script>
    </head>
    <body>
        <section class="products" id="prod_list">
            <h2>Categoria: <?php echo htmlspecialchars($_GET['name'], ENT_QUOTES, 'UTF-8'); ?></h2>
            <div>
                <?php require __DIR__.'/controladors/llistar_productes.php'; ?>
            </div>
        </section>
    </body>
</html>