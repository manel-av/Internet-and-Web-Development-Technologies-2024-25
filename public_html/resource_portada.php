<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Home - Swapealo</title>
    <link rel="stylesheet" href="/Resources/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="/Resources/js/jquery-3.7.1.min.js"></script>
    <script src="/Resources/js/funcions.js"></script>
</head>
<body>
    <header>
        <?php require __DIR__.'/controladors/menu_superior.php';?>  
    </header>
    <div class="search-container">
        <?php require __DIR__.'/controladors/cercador.php'; ?>
    </div>
    
    <section class="products" id="novetats">
        <h2>NOVETATS</h2>
        <?php require __DIR__.'/controladors/novetats.php';?>
    </section>

    <div class="options-container" id="preFooter">
        <?php require __DIR__.'/controladors/pre-footer.php';?>
    </div> 
</body>
<footer class="main-footer">
    <?php require __DIR__.'/controladors/footer.php'; ?>
</footer>
</html>