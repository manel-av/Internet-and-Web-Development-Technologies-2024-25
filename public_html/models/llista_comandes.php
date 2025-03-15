<?php
function obtener_compras($connection, $userID) {
    $sql = 'SELECT id, data, preu_total FROM comanda WHERE usuari_id = $1';
    $result = pg_query_params($connection, $sql, array($userID));

    $comandes = [];
    if ($result) {
        while ($comanda = pg_fetch_assoc($result)) {
            $comandes[] = $comanda;
        }
    }
    return $comandes;
}

function obtener_productos_compra($connection, $commandID) {
    $sql = 'SELECT producte_id, quantitat, preu FROM linea_comanda WHERE comanda_id = $1';
    $result = pg_query_params($connection, $sql, array($commandID));

    $productos = [];
    if ($result) {
        while ($producto = pg_fetch_assoc($result)) {
            $productos[] = $producto;
        }
    }
    return $productos;
}
?>