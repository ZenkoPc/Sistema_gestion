<?php

    session_start();

    require ("conexion.php");
    extract($_POST);
    $objCon=Conexion();

    $identificacion=$_POST['identificacion'];
    $identificacion=preg_replace('/(?<!\\\)([%_])/','\\\$1',$identificacion);#necesario para que el bind_param no lo dañe

    $password=$_POST['password'];
    $password=preg_replace('/(?<!\\\)([%_])/','\\\$1',$password);#necesario para que el bind_param no lo dañe

    #esto es parqa evitar el SQL injection
    $sql=$objCon->prepare("select * from empleado where Documento_emp= ? and Contraseña_usuario= ? ");
    $sql->bind_param('ss',$identificacion,$password);
    $sql->execute();

    $res=$sql->get_result();
    $existe=$res->num_rows;

    if($existe==1){
        $user=$res->fetch_object();
        $_SESSION['user']=$user->Documento_emp;
        if($user->Admin=="si"){
            header("location: administrador/Vista/index_admin.php");
        }
        if($user->Admin=="no"){
            header("location: usuario/Vista/index.php");
        }
    }else{
        header("location: login.php?x=1");
    }
?>
