<?php
    function connectaBD(){
        $servidor = "localhost";
        $port = "5432";
        $DBnom = "tdiw-n15";
        $usuari = "tdiw-n15";
        $clau = "AneYDjSi";
        $connexio = pg_connect("host=$servidor port=$port dbname=$DBnom
        user=$usuari password=$clau") or die("Error connexio DB");
        return($connexio);
    }
?>