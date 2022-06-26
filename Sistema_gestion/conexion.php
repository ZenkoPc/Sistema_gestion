<?php

function Conexion(){
    $conn=new mysqli("localhost","Admin1","Admin01","sistemagestion");

    if($conn->connect_errno){
        echo "Ha ocurrido un error conectandose a la base de datos MySQL".$conn->connect_error;
    }else{
        return $conn;
    }
}
?>