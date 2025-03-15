<?php
function actualitzaUsuari($connexio, $id, $nom, $email, $contrasenya, $adreça, $poblacio, $codiPostal, $imatge)
{
    $sql_actualitza = "UPDATE usuari SET 
        nom = $1, 
        email = $2, 
        contrasenya = $3, 
        adreça = $4, 
        poblacio = $5, 
        codi_postal = $6, 
        img = $7 
    WHERE id = $8";

    $params = array($nom, $email, $contrasenya, $adreça, $poblacio, $codiPostal, $imatge, $id);
    $resultat = pg_query_params($connexio, $sql_actualitza, $params);

    return $resultat !== false;
}
?>
