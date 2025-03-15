<?php
function registre($connexio, $nom, $email, $clau, $addr, $poblacio, $cPostal) {
    $contrasenyaXifrada = password_hash($clau, PASSWORD_DEFAULT);

    $sql = 'INSERT INTO usuari ("nom", "email", "contrasenya", "adreça", "poblacio", "codi_postal") VALUES ($1, $2, $3, $4, $5, $6)';
    $result = pg_query_params($connexio, $sql, array($nom, $email, $contrasenyaXifrada, $addr, $poblacio, $cPostal));

    if ($result) {
        return true;
    } else {
        return false;
    }
}
?>