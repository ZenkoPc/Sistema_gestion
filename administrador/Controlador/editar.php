<?php

    require("../Modelo/admin.php");
    extract($_POST);

    #identificador
    $x=$_POST['x'];
    $elim=$_REQUEST['elim'];
    $doc=$_REQUEST['doc'];

    #empleados y perfiles
    $id=$_POST['id'];
    $nombre=$_POST['Nombre'];
    $apellido=$_POST['Apellido'];
    $documento=$_POST['Documento'];
    $edad=$_POST['Edad'];
    $salario=$_POST['Salario'];
    $direccion=$_POST['Direccion'];
    $correo=$_POST['Correo'];
    $telefono=$_POST['Telefono'];
    $horario=$_POST['Horario'];
    $estado=$_POST['Estado'];
    $area=$_POST['Area'];
    $profesion=$_POST['Profesion'];
    $dias=$_POST['Dias_descanso'];
    $funciones=$_POST['Funciones'];
    $contraseña=$_POST['Contraseña'];
    $educativo=$_POST['Educativo'];
    $cargo=$_POST['Cargo'];
    $admin=$_POST['Admin1'];

    if($x=="0"){#editar empleados

        $objCrear=new empleado($id,$nombre,$apellido,$documento,$edad,$salario,$direccion,$correo,$telefono,$horario,$estado,$cargo,$area,$funciones,$profesion,$dias,$contraseña,$educativo,$admin);
        $crear=$objCrear->editar($elim,$doc);
    
    }
    if($x=="1"){#editar perfil

        $objCrear=new empleado($id,$nombre,$apellido,$documento,$edad,$salario,$direccion,$correo,$telefono,$horario,$estado,$cargo,$area,$funciones,$profesion,$dias,$contraseña,$educativo,$admin);
        $crear=$objCrear->editarPerfil($elim,$doc);
    }
?>