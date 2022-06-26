<?php

    session_start();
    require ("../../conexion.php");

    class empleado{

        #empleados y perfiles
        private $id;
        private $nombre;
        private $apellido;
        private $identificacion;
        private $edad;
        private $salario;
        private $direccion;
        private $correo;
        private $telefono;
        private $horario;
        private $estado;
        private $cargo;
        private $area;
        private $funciones;
        private $profesion;
        private $dias;
        private $contraseña;
        private $educacion;
        private $admin;

        public function __construct($id,$nombre,$apellido,$identificacion,$edad,$salario,$direccion,$correo,$telefono,$horario,$estado,$cargo,$area,$funciones,$profesion,$dias,$contraseña,$educacion,$admin)
        {
            $this->id=$id;
            $this->nombre=$nombre;
            $this->apellido=$apellido;
            $this->identificacion=$identificacion;
            $this->edad=$edad;
            $this->salario=$salario;
            $this->direccion=$direccion;
            $this->correo=$correo;
            $this->telefono=$telefono;
            $this->horario=$horario;
            $this->estado=$estado;
            $this->cargo=$cargo;
            $this->area=$area;
            $this->funciones=$funciones;
            $this->profesion=$profesion;
            $this->dias=$dias;
            $this->contraseña=$contraseña;
            $this->educacion=$educacion;
            $this->admin=$admin;
        }

        public function crear(){

            $objCon=Conexion();

            try{

            $nombre=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->nombre);#necesario para que el bind_param no lo dañe
            $apellido=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->apellido);#necesario para que el bind_param no lo dañe
            $identificacion=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->identificacion);#necesario para que el bind_param no lo dañe
            $edad=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->edad);#necesario para que el bind_param no lo dañe
            $salario=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->salario);#necesario para que el bind_param no lo dañe
            $direccion=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->direccion);#necesario para que el bind_param no lo dañe
            $correo=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->correo);#necesario para que el bind_param no lo dañe
            $telefono=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->telefono);#necesario para que el bind_param no lo dañe
            $horario=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->horario);#necesario para que el bind_param no lo dañe
            $estado=preg_replace('/(?<!\\\)([%_])/','\\\$1',"activo");#necesario para que el bind_param no lo dañe
            $cargo=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->cargo);#necesario para que el bind_param no lo dañe
            $area=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->area);#necesario para que el bind_param no lo dañe
            $funciones=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->funciones);#necesario para que el bind_param no lo dañe
            $profesion=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->profesion);#necesario para que el bind_param no lo dañe
            $dias=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->dias);#necesario para que el bind_param no lo dañe
            $contraseña=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->contraseña);#necesario para que el bind_param no lo dañe
            $educacion=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->educacion);#necesario para que el bind_param no lo dañe
            $admin=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->admin);#necesario para que el bind_param no lo dañe

            #el codigo siguiente limpia la consulta envitando el SQLinyection
            $sql=$objCon->prepare(#se prepara la query sql para limpiarla
            "insert into empleado 
            (Nombre_emp,Apellido_emp,Documento_emp,
            Edad_emp,Salario_emp,Direccion_emp,Correo_emp,Telefono_emp,Horario_emp,
            Estado_emp,Cargo_emp,Area_emp,Funciones_emp,Profesion_emp,Diasdes_emp,
            Contraseña_usuario,NivelEducativo_emp,FechaAfiliacion_emp,Admin)
            values 
            (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,now(),?)");

            $sql->bind_param("ssssssssssssssssss",$nombre,$apellido,$identificacion,$edad,$salario,$direccion,$correo,$telefono,$horario,$estado,$cargo,$area,$funciones,$profesion,$dias,$contraseña,$educacion,$admin);

            $sql->execute();

            if($sql){
                header("Location: ../Vista/empleados.php?x=1");#x=1 es creado correctamente
            }

            }catch(Exception $e){

                header("Location: ../Vista/empleados.php?x=2");#x=2 es error en la insercion

            }

        }

        public function editar($elim,$doc){

            $objCon=Conexion();

            try{

            $nombre=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->nombre);#necesario para que el bind_param no lo dañe
            $apellido=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->apellido);#necesario para que el bind_param no lo dañe
            $identificacion=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->identificacion);#necesario para que el bind_param no lo dañe
            $edad=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->edad);#necesario para que el bind_param no lo dañe
            $salario=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->salario);#necesario para que el bind_param no lo dañe
            $direccion=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->direccion);#necesario para que el bind_param no lo dañe
            $correo=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->correo);#necesario para que el bind_param no lo dañe
            $telefono=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->telefono);#necesario para que el bind_param no lo dañe
            $horario=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->horario);#necesario para que el bind_param no lo dañe
            $estado=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->estado);#necesario para que el bind_param no lo dañe
            $cargo=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->cargo);#necesario para que el bind_param no lo dañe
            $area=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->area);#necesario para que el bind_param no lo dañe
            $funciones=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->funciones);#necesario para que el bind_param no lo dañe
            $profesion=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->profesion);#necesario para que el bind_param no lo dañe
            $dias=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->dias);#necesario para que el bind_param no lo dañe
            $contraseña=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->contraseña);#necesario para que el bind_param no lo dañe
            $educacion=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->educacion);#necesario para que el bind_param no lo dañe
            $admin=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->admin);#necesario para que el bind_param no lo dañe

            $sql=$objCon->prepare(
            "update empleado set 
            Nombre_emp=?,Apellido_emp=?,Documento_emp=?,
            Edad_emp=?,Salario_emp=?,Direccion_emp=?,Correo_emp=?,Telefono_emp=?,Horario_emp=?,
            Estado_emp=?,Cargo_emp=?,Area_emp=?,Funciones_emp=?,Profesion_emp=?,Diasdes_emp=?,
            Contraseña_usuario=?,NivelEducativo_emp=?,Admin=? 
            where id_empleado='$this->id'");

            $sql->bind_param("ssssssssssssssssss",$nombre,$apellido,$identificacion,$edad,$salario,$direccion,$correo,$telefono,$horario,$estado,$cargo,$area,$funciones,$profesion,$dias,$contraseña,$educacion,$admin);
            $sql->execute();

            $sql0=$objCon->prepare("select Fecha_modificacion from audi_empleado where Doc_emp=? order by id_audi desc");
            $sql0->bind_param("s",$doc);
            $sql0->execute();
            $res2=$sql0->get_result();
            $emp=$res2->fetch_object();

            $sql2=$objCon->prepare("update audi_empleado set Usuario_res=? where Doc_emp=? and Fecha_modificacion=?");
            $sql2->bind_param("sss",$elim,$doc,$emp->Fecha_modificacion);
            $sql2->execute();

            if($sql&&$sql2){
                header("Location: ../Vista/empleados.php?x=3");#x=3 es actualizado correctamente
            }

            }catch(Exception $e){

                header("Location: ../Vista/empleados.php?x=4");#x=4 hay un error en la actualizacion

            }

        }

        public function editarPerfil($elim,$doc){

            $objCon=Conexion();

            try{

            $nombre=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->nombre);#necesario para que el bind_param no lo dañe
            $apellido=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->apellido);#necesario para que el bind_param no lo dañe
            $identificacion=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->identificacion);#necesario para que el bind_param no lo dañe
            $edad=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->edad);#necesario para que el bind_param no lo dañe
            $direccion=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->direccion);#necesario para que el bind_param no lo dañe
            $correo=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->correo);#necesario para que el bind_param no lo dañe
            $telefono=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->telefono);#necesario para que el bind_param no lo dañe

            $sql=$objCon->prepare(
            "update empleado set 
            Nombre_emp=?,Apellido_emp=?,Documento_emp=?,
            Edad_emp=?,Direccion_emp=?,Correo_emp=?,Telefono_emp=?
            where id_empleado='$this->id'");

            $sql->bind_param("sssssss",$nombre,$apellido,$identificacion,$edad,$direccion,$correo,$telefono);
            $sql->execute();

            $sql0=$objCon->prepare("select Fecha_modificacion from audi_empleado where Doc_emp=? order by id_audi desc");
            $sql0->bind_param("s",$doc);
            $sql0->execute();
            $res2=$sql0->get_result();
            $emp=$res2->fetch_object();

            $sql2=$objCon->prepare("update audi_empleado set Usuario_res=? where Doc_emp=? and Fecha_modificacion=?");
            $sql2->bind_param("sss",$elim,$doc,$emp->Fecha_modificacion);
            $sql2->execute();

            if($sql&&$sql2){
                header("Location: ../Vista/empleados.php?x=8");#x=1 el perfil fue actualizado correctamente
            }

            }catch(Exception $e){

                header("Location: ../Vista/empleados.php?x=9");#x=2 hubo un error en la actualizacion

            }

        }

        public function eliminar($elim,$doc){

            $objCon=Conexion();

            try{

            $sql="Delete from empleado where id_empleado='$this->id'";

            $res=$objCon->query($sql);

            $sql0=$objCon->prepare("select Fecha_modificacion from audi_empleado where Doc_emp=? order by id_audi desc");
            $sql0->bind_param("s",$doc);
            $sql0->execute();
            $res2=$sql0->get_result();
            $emp=$res2->fetch_object();

            $sql2=$objCon->prepare("update audi_empleado set Usuario_res=? where Doc_emp=? and Fecha_modificacion=?");
            $sql2->bind_param("sss",$elim,$doc,$emp->Fecha_modificacion);
            $sql2->execute();

            if($res){
                header("Location: ../Vista/empleados.php?x=5");#x=5 eliminado exitosamente
            }

            }catch(Exception $e){

                header("Location: ../Vista/empleados.php?x=6");#x=6 error en la eliminacion

            }
                
        }

    }

    class archivos{

        #archivos
        private $nombre;
        private $tipo;
        private $peso;
        private $ruta;
        private $dueño;
        private $temp;

        public function __construct($nombre,$tipo,$peso,$ruta,$dueño,$temp)
        {
            $this->nombre=$nombre;
            $this->tipo=$tipo;
            $this->peso=$peso;
            $this->ruta=$ruta;
            $this->dueño=$dueño;
            $this->temp=$temp;
        }

        public function crearArchivo(){

            $objCon=Conexion();

            try{

                $nombre=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->nombre);
                $tipo=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->tipo);
                $peso=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->peso);
                $ruta=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->ruta);
                $dueño=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->dueño);
                $temp=preg_replace('/(?<!\\\)([%_])/','\\\$1',$this->temp);

                $sql=$objCon->prepare(
                    "Insert into archivos (Nombre_arc,Tipo_arc,Peso_arc,Dueño_arc,Fecha_sub,Ruta,Nombre_temp) 
                    values (?,?,?,?,now(),?,?)"
                );

                $sql->bind_param("ssssss",$nombre,$tipo,$peso,$dueño,$ruta,$temp);
                $sql->execute();

                if($sql){
                    header("Location: ../Vista/archivos_admin.php?x=1");#x=1 exito en la subida
                }
                
            }catch(Exception $e){

                header("Location: ../Vista/archivos_admin.php?x=2");#x=2 un error en la subida
                
            }
            

        }

        public function eliminarArchivo($id,$elim,$doc){

            $objCon=Conexion();

            try{

            $sql0=$objCon->prepare("select Fecha_sub from archivos where id_archivo=? order by id_archivo desc");
            $sql0->bind_param("s",$id);
            $sql0->execute();
            $res2=$sql0->get_result();
            $emp=$res2->fetch_object();
        
            $sql=$objCon->prepare("delete from archivos where id_archivo=?");
            $sql->bind_param("s",$id);
            $sql->execute();

            $sql2=$objCon->prepare("update audi_archivos set Usuario_res=? where id_arc=? and Fecha_subida=?");
            $sql2->bind_param("sss",$elim,$id,$emp->Fecha_sub);
            $sql2->execute();

            if($sql&&$sql2){
                header("Location: ../Vista/archivos_admin.php?x=3");#x=3 eliminacion exitosa
            }

            }catch(Exception $e){

                header("Location: ../Vista/archivos_admin.php?x=4");#x=4 error en la eliminacion

            }
        
        }

        public function getNombreArchivo($id){

            $objCon=Conexion();

            $sql=$objCon->prepare("select Nombre_temp from archivos where id_archivo=?");
            $sql->bind_param("s",$id);
            $sql->execute();

            $res=$sql->get_result();
            $obj=$res->fetch_object();

            $Nombre=$obj->Nombre_temp;

            return $Nombre;

        }

    }
?>