<?php 

function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'root', 'root', "bienes_raices" );
    if (!$db) {
        echo "Error No se Pudo Conectar";
        exit;
    } 

    return $db;
    


}