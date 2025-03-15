<?php
function cercaProductes($connexio, $cerca)
{
    $sql_producto = 'SELECT * FROM productes WHERE "nom" LIKE $1 OR "descripcio" LIKE $1';
    $params = array("%$cerca%");
    $resultat_sql = pg_query_params($connexio, $sql_producto, $params) or die("Error sql cerca");
    $resultat_productes = pg_fetch_all($resultat_sql);

    return $resultat_productes;
}

function cercaProductesCategoria($connexio, $cerca, $categoria)
{
    $sql_producto = 'SELECT * FROM productes WHERE ("nom" LIKE $1 OR "descripcio" LIKE $1) AND "categoria_id" = $2';
    $params = array("%$cerca%", $categoria);
    $resultat_sql = pg_query_params($connexio, $sql_producto, $params) or die("Error sql cerca");
    $resultat_productes = pg_fetch_all($resultat_sql);

    return $resultat_productes;
}
?>