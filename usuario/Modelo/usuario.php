<?php

    require("../../conexion.php");

    class empleados{

        public function editarPerfil($id,$user,$documento,$nombre,$apellido,$edad,$direccion,$correo,$telefono){

            $objCon=Conexion();

            $sql=$objCon->prepare("update empleado set Nombre_emp=?, Apellido_emp=?, Edad_emp=?, Direccion_emp=?, Correo_emp=?, Telefono_emp=? where id_empleado=?");
            $sql->bind_param("sssssss",$nombre,$apellido,$edad,$direccion,$correo,$telefono,$id);
            $sql->execute();

            $sql2=$objCon->prepare("select Fecha_modificacion from audi_empleado where Doc_emp=? order by id_audi desc");
            $sql2->bind_param("s",$documento);
            $sql2->execute();
            $res=$sql2->get_result();
            $emp=$res->fetch_object();

            $sql3=$objCon->prepare("update audi_empleado set Usuario_res=? where Doc_emp=? and Fecha_modificacion=?");
            $sql3->bind_param("sss",$user,$documento,$emp->Fecha_modificacion);
            $sql3->execute();

            if($sql){
                header("Location: ../Vista/index.php?x=2");#se ha actualizado correctamente los datos
            }else{
                header("Location: ../Vista/index.php?x=3");#un error se produjo
            }

        }

    }

?>