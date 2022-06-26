<?php

    require("../Modelo/usuario.php");
    extract($_REQUEST);
    session_start();

    $id=$_POST['id'];
    $user=$_SESSION['user'];
    $documento=$_POST['documento'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $edad=$_POST['edad'];
    $direccion=$_POST['direccion'];
    $correo=$_POST['correo'];
    $telefono=$_POST['telefono'];

    echo $id." ";
    echo $user." ";
    echo $documento." ";
    echo $nombre." ";
    echo $apellido." ";
    echo $edad." ";
    echo $direccion." ";
    echo $correo." ";
    echo $telefono." ";

    if($x==1){

    $objEditar=new empleados;
    $objEditar->editarPerfil($id,$user,$documento,$nombre,$apellido,$edad,$direccion,$correo,$telefono);
    
}
?>
