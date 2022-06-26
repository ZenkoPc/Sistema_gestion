<?php

    extract($_REQUEST);

    if($_REQUEST['valor']==98){

        header("location: ../Vista/archivos.php?id=0");#limpia los filtros de busqueda

    }
?>