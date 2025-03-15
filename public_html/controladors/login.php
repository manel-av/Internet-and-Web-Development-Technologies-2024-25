<?php
require_once __DIR__ . "/../models/connectaBD.php";
require __DIR__ . "/../models/login.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $connexio = connectaBD();

    $Email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $Contraseña = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    $login = login($Email, $Contraseña, $connexio);
    if($login) {
        $usuari = getUsuari($Email, $connexio);
        $_SESSION['user_id'] = $usuari['id'];
        $_SESSION['user_email'] = $usuari['email'];
        $_SESSION['user_name'] = $usuari['nom'];
        header("Location: https://tdiw-n15.deic-docencia.uab.cat/index.php");
        exit;
    } else {
        $_SESSION['error_message'] = "*Dades incorrectes.";
        header("Location: https://tdiw-n15.deic-docencia.uab.cat/index.php?accio=login");
        exit;
    }
}
else {
    require __DIR__ . "/../vistes/login.php";
}
?>