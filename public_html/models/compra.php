<?php 
function realizar_compra($userID, $quantity, $price, $time, $connection) {
    $query = 'INSERT INTO comanda (usuari_id, preu_total, quantitat_total, data) 
    VALUES ($1, $2, $3, $4) RETURNING id';

    $result = pg_query_params($connection, $query, array($userID, $price, $quantity, $time));

    if ($result) {
        $row = pg_fetch_row($result);
        return $row[0];
    } else {
        return false;
    }
}

function guardar_info_producto($prodID, $quantity, $price, $commandID, $connection) {
    $query = 'INSERT INTO linea_comanda (comanda_id, producte_id, quantitat, preu) 
        VALUES ($1, $2, $3, $4)';

    $result = pg_query_params($connection, $query, array($commandID, $prodID, $quantity, $price));

    return $result != false;
}
?>