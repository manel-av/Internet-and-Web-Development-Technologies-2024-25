<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once __DIR__ . "/../models/connectaBD.php";
    require __DIR__ . "/../models/registre.php";

    $connexio = connectaBD();
    $Nom = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $Email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $Contrasenya = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $Adreça = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
    $Població = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
    $CP = filter_var($_POST['postalcode'], FILTER_SANITIZE_NUMBER_INT);

    $registrat = registre($connexio, $Nom, $Email, $Contrasenya, $Adreça, $Població, $CP);
    if ($registrat) {
        header("Location: https://tdiw-n15.deic-docencia.uab.cat/index.php");
        exit;
    } else {
        $_SESSION['error_message'] = "*Usuari ja existent.";
        header("Location: https://tdiw-n15.deic-docencia.uab.cat/index.php?accio=registre");
        exit;
    }
} else {
    require __DIR__ . "/../vistes/registre.php";
}
?>
