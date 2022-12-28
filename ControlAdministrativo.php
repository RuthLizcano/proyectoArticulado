<?php
    include("ClienteAdministrativo.php");

    Class ControlAdministrativo{
        
        private $obj;

        function __construct(){
            $obj = new ClienteAdministrativo();
        }

        function seleccionarOpcion(){
            if(isset($_POST['anexar'])){
                $this->registrarDatos(1);
            }
            if(isset($_POST['consultarUsu'])){
                $this->consultarDatos(1);
                # code...
            }
            if(isset($_POST['consultarAdm'])){
                $this->consultarDatos(2);
                
            }
            if(isset($_POST['buscar'])){
                $this->buscarDatos(1);
                # code...
            }
           
            if(isset($_POST['modificar'])){
                $this->modificarDatos(1);
                # code...
            }

        }

        public function registrarDatos($oper){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $cedula = $_POST['cedula'];
            $anosBarrio = $_POST['anosBarrio'];
            $rolp = $_POST['rol'];
            $rol=strtolower($rolp);
            if($rol=='presidente')
            {
                $codigoRol=1;
            }else if($rol=='vicepresidente')
            {
                $codigoRol=2;
            }else if($rol=='secretaria')
            {
                $codigoRol=3;
            }else if($rol=='tesorero')
            {
                $codigoRol=4;
            }else if($rol=='fiscal')
            {
                $codigoRol=5;
            }  else if($rol=='coordinador')
            {
                $codigoRol=6;
            }else{
                echo '<script> alert ("Rol No Encontrada"); 
                window.location.href="registro.html" </script>';
            }

            $cedulaRegistrante = $_POST['cedulaRegistrante'];
            $codigoEstado = 10;

            $obj = new ClienteAdministrativo();

            switch($oper){
                case 1:
                    $obj->anexarAdministrativo($nombre, $apellido,  $cedula,  $anosBarrio, $codigoRol, $cedulaRegistrante, $codigoEstado);
                    break;
            }
  
        }

        public function consultarDatos($oper){
           
            $año = $_POST['año'];

            $obj = new ClienteAdministrativo();

            switch($oper){
                case 1:
                    
                        $obj->consultarAdministrativoUsu( $año );
                    break;
                case 2:
                    
                        $obj->consultarAdministrativoAdm( $año );
                    break;
            }
  
        }

        public function buscarDatos($oper){

            $codigoAministrativo = $_POST['codigoAministrativo'];
            
            $cedula = $_POST['cedula'];
            $usuariop = $_POST['UsuarioAdministrativo'];
            $contrasena = $_POST['contrasenaAdministrativo'];
            $rolp = $_POST['rolAdministrativo'];
           
            $codigoRol=null;
            


                if( $codigoAministrativo=='')
                {
                    if( empty($cedula))

                    {
                        if(empty($rolp))
                        {
                            

                                if(empty($usuariop))
                                {
                                    if(empty($contrasena)){
                                        echo '<script> alert ("Los campos Estan vacios"); 
                                              window.location.href="consulta.html" </script>';
                                    }else{
                                        $oper=5;

                                    }
                                
                                    
                                }else{
                                  

                                    $oper=4;
                                }
      

                        }else{
                       
                            $rol=strtolower($rolp);
                            if($rol=='presidente')
                            {
                                $codigoRol=1;
                            }else if($rol=='vicepresidente')
                            {
                                $codigoRol=2;
                            }else if($rol=='secretaria')
                            {
                                $codigoRol=3;
                            }else if($rol=='tesorero')
                            {
                                $codigoRol=4;
                            }else if($rol=='fiscal')
                            {
                                $codigoRol=5;
                            }  else if($rol=='coordinador')
                            {
                                $codigoRol=6;
                            }else{
                                echo '<script> alert ("Rol No Encontrada"); 
                                window.location.href="registro.html" </script>';
                            }
                            $oper=3;
                        }
                            
                    }else{
                        $oper=2; 
                    }

                }else{
                    $oper=1;
                }
  
            
                     
            $obj = new ClienteAdministrativo();

            switch($oper){
                      
                case 1:

                    $obj->buscarCodigoAdministrativo( $codigoAministrativo);
                    break;

                 case 2:
  
                        $obj->buscarCedulaAdministrativo( $cedula );
                    break;
                case 3:

                        $obj->buscarRol( $codigoRol );
                     break;
                case 4:
      
                        $obj->buscarUsuario( $usuariop );
                          break;
                 case 5:
      
                      $obj->buscarContrasena( $contrasena );
                               break;
                        
            }
  
        }


        public function modificarDatos($oper){
            $codigoAdministrativo = $_POST['codigoAdministrativo'];
            $valor = $_POST['valor'];
            $codigoAdmin = $_POST['codigoAdmin'];
           
            $modificar = $_POST['aspecto'];
            echo $modificar;

            if($modificar=='1'){
                     $estadop=$valor;
                     $estado=strtolower($estadop);
                     echo $estado;

                    if($estado=='activo')
                      {
                       $codigoEstado=10;
                     }else if($estado=='inactivo')
                      {
                        $codigoEstado=20;
                    } else{
                      echo '<script> alert ("Estado No Encontrado"); 
                      window.location.href="registro.html" </script>';
                    }
                $oper=1;

            }else if($modificar=='2'){
                $cantidadAnos=$valor;
                $oper=2;

            }else if($modificar=='3'){
                $rolp=$valor;
                $rol=strtolower($rolp);
                            if($rol=='presidente')
                            {
                                $codigoRol=1;
                            }else if($rol=='vicepresidente')
                            {
                                $codigoRol=2;
                            }else if($rol=='secretaria')
                            {
                                $codigoRol=3;
                            }else if($rol=='tesorero')
                            {
                                $codigoRol=4;
                            }else if($rol=='fiscal')
                            {
                                $codigoRol=5;
                            }  else if($rol=='coordinador')
                            {
                                $codigoRol=6;
                            }else{
                                echo '<script> alert ("Rol No Encontrado"); 
                                window.location.href="registro.html" </script>';
                            }
                    $oper=3;

            }else{
                echo '<script> alert ("No ingreso ningun aspecto a modificar"); 
                window.location.href="registro.html" </script>';
            }

            $obj = new ClienteAdministrativo();

           


            switch($oper){
                case 1:
                    
                        $obj->modificarEstado( $codigoEstado , $codigoAdministrativo, $codigoAdmin);
                    break;
                case 2:
                    
                        $obj->modificarCantidadAnos( $cantidadAnos, $codigoAdministrativo, $codigoAdmin);
                    break;
                case 3:
                    
                        $obj->modificarRol( $codigoRol, $codigoAdministrativo, $codigoAdmin );
                    break;
            }
  
        }







    }
    $obj1 = new ControlAdministrativo();
    $obj1->seleccionarOpcion();
?>