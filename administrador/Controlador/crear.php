<?php

require("../Modelo/admin.php");
extract($_POST);

#identificador
$x = $_POST['x'];

if ($x == "0") {

    #empleados y perfiles

    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];
    $documento = $_POST['Documento'];
    $edad = $_POST['Edad'];
    $salario = $_POST['Salario'];
    $direccion = $_POST['Direccion'];
    $correo = $_POST['Correo'];
    $telefono = $_POST['Telefono'];
    $horario = $_POST['Horario'];
    $estado = 0;
    $area = $_POST['Area'];
    $profesion = $_POST['Profesion'];
    $dias = $_POST['Dias_descanso'];
    $funciones = $_POST['Funciones'];
    $contraseña = $_POST['Contraseña'];
    $educativo = $_POST['Educativo'];
    $cargo = $_POST['Cargo'];
    $admin = $_POST['Admin1'];

    $objCrear = new empleado(0, $nombre, $apellido, $documento, $edad, $salario, $direccion, $correo, $telefono, $horario, $estado, $cargo, $area, $funciones, $profesion, $dias, $contraseña, $educativo, $admin);
    $crear = $objCrear->crear();
}

if ($x == "1") {

    #archivos

    $dueño = $_POST['dueño'];
    $id = $_POST['doc'];

    echo $id;

    #file

    if ($_FILES['archivo']['size'] > 0) { #si el archivo no pesa 0

        $carpeta = "../../Archivos/" . $id; #ruta de guardado

        if (!file_exists($carpeta)) { #si no existe el directorio con el documento del empleado
            mkdir($carpeta, 0777, true); #crea un directorio si no existe
        }

        $file_name = $_FILES['archivo']['name']; #nombre
        $file_tmp = $_FILES['archivo']['tmp_name']; #nombre temporal
        $file_error = $_FILES['archivo']['error']; #estado siempre debe ser 0
        $file_size = $_FILES['archivo']['size']; #tamaño

        if ($file_error == 0) {

            $file_ext = explode(".", $file_name); #terminacion ej .pdf
            $file_ext = strtolower(end($file_ext));
            $file_new = uniqid("", true) . "." . $file_ext; #nombre del archivo full

            $direction = $carpeta . "/" . $file_new; #url a subir el archivo

            if (move_uploaded_file($file_tmp, $direction)) {

                $nombre = $file_name;
                $tipo = $file_ext;
                $peso = $_FILES['archivo']['size'];
                $ruta = $direction;
                $dueño = $_POST['dueño'];
                $temp = $file_new;

                $objCrear = new archivos($nombre, $tipo, $peso, $ruta, $dueño, $temp);
                $objCrear->crearArchivo();
            }
        }
    } else {
        header("Location: archivos_admin.php?x=2"); #error en la subida
    }
}
?>