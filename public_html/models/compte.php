<?php
function getUsuari($connexio, $id)
{
    $sql_producto = "SELECT * FROM usuari WHERE id = $1";
    $params = array($id);
    $resultat_sql = pg_query_params($connexio, $sql_producto, $params) or die("Error sql usuari");
    $resultat_usuari = pg_fetch_all($resultat_sql);

    return $resultat_usuari;
}
?>