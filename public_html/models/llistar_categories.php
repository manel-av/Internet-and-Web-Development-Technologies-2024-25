<?php
function getCategories($connexio)
{
    $sql_categorias = "SELECT id,nom,imatge FROM categories";
    $consulta_categorias =  pg_query_params($connexio, $sql_categorias, array()) or die("Error sql categorias");
    $resultat_categories = pg_fetch_all($consulta_categorias);

    return $resultat_categories;
}
?>