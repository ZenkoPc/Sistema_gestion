<?php

    extract($_REQUEST);

    if($_REQUEST['valor']==99){

        header("location: ../Vista/empleados.php?id=0");#limpia los filtros de busqueda

    }

    if($_REQUEST['valor']==98){

        header("location: ../Vista/archivos_admin.php?id=0");#limpia los filtros de busqueda

    }

    if($_REQUEST['valor']==97){

        header("location: ../Vista/salarios.php?id=0");#limpia los filtros de busqueda

    }
?>