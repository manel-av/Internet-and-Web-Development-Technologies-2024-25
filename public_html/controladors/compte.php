<?php
require_once __DIR__.'/../models/connectaBD.php';
require_once __DIR__.'/../models/compte.php';

$connexio = connectaBD();
$usuari = getUsuari($connexio, $_SESSION['user_id']);

require __DIR__.'/../vistes/compte.php';
?>