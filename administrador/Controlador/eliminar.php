<?php

    require("../Modelo/admin.php");
    extract($_REQUEST);

    $x=$_REQUEST['x'];
    $id=$_REQUEST['id'];

    $elim=$_REQUEST['elim'];

    if($x==0){
        $objEliminar=new empleado($id,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
        $objEliminar->eliminar($elim,$doc);
    }
    if($x==1){

        $idUser=$_REQUEST['idUser'];
        $doc=$idUser;

        $objEliminar1=new archivos(0,0,0,0,0,0,0);
        $Nombre=$objEliminar1->getNombreArchivo($id);

            if(unlink("../../Archivos/".$idUser."/".$Nombre)){
                
                $objEliminar=new archivos(0,0,0,0,0,0,0);
                $objEliminar->eliminarArchivo($id,$elim,$doc);

            }else{

                header("Location: ../Vista/archivos_admin.php?x=4");#error durante la eliminacion

            }

    }

?>