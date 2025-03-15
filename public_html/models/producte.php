<?php
function getAllProductes($connexio)
{
    $sql_productes = "SELECT id, nom, preu, categoria_id, descripcio, 
        disponible, imatge FROM productes ORDER BY id DESC";
    $consulta_productes = pg_query_params($connexio, $sql_productes, array()) 
        or die("Error al ejecutar la consulta SQL de productos");
    $resultat_productes = pg_fetch_all($consulta_productes);

    return $resultat_productes;
}

function getProductesNous($connexio, $num)
{
    $sql_productes = "SELECT DISTINCT ON (categoria_id) id, nom, preu, categoria_id, descripcio, 
        disponible, imatge FROM productes ORDER BY categoria_id, id DESC LIMIT $num";
    $consulta_productes = pg_query_params($connexio, $sql_productes, array()) 
        or die("Error sql productes");
    $resultat_productes = pg_fetch_all($consulta_productes);

    return $resultat_productes;
}

function getProductesCategoria($connexio, $categoria)
{
    $sql_productes = "SELECT id, nom, preu, descripcio, imatge FROM productes WHERE categoria_id = $1";
    $consulta_productes = pg_query_params($connexio, $sql_productes, array($categoria));
    if (!$consulta_productes) {
        die("Error al ejecutar la consulta SQL de productos");
    }
    $resultat_productes = pg_fetch_all($consulta_productes);

    return $resultat_productes;
}

function getProducte($connexio, $prodID)
{
    $sql_producte = "SELECT id, nom, preu, categoria_id, descripcio, disponible, imatge FROM productes WHERE id = $1";
    $consulta_producte = pg_query_params($connexio, $sql_producte, array($prodID)) 
        or die("Error al ejecutar la consulta SQL de productos");
    
    $resultat_producte = pg_fetch_assoc($consulta_producte);
    
    if ($resultat_producte) {
        return $resultat_producte;
    } else {
        return null;
    }
}
?>