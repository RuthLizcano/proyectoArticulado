<?php
    include("ClienteEventos.php");

    Class ControlEventos{
        
        private $obj;
        

        function __construct(){
            $obj = new ClienteEventos();
        }

        function seleccionarOpcion(){
            
            
            if(isset($_POST['consultarUsu'])){
                $this->consultarUsu(1);
                
                # code...
            }
            if(isset($_POST['consultarAdm'])){
                $this->consultarAdm(1);
                # code...
            }
            if(isset($_POST['buscar'])){
                $this->buscarDatos(1);
                # code...
            }

        }

       

        public function consultarUsu($oper){
            $oper=0;
            $año = $_POST['año'];
            $tipoEvento = $_POST['tipoEvento'];
            if($tipoEvento==1){
                $oper=1;
            }else if($tipoEvento==2){
                $oper=2;
            }else if($tipoEvento==3){
                $oper=3;
            }else if($tipoEvento==4){
                $oper=4;
            }else if($tipoEvento==5){
                $oper=5;
            }else{
                echo '<script> alert ("Tipo de evento no seleccionado"); 
                window.location.href="consultaUsu.html" </script>';
            }
           echo $oper;
            $obj = new ClienteEventos();
           

            switch($oper){
                case 1:
                    
                        $obj->consultarAlquiler( $año );
                    break;
                case 2:
                    
                        $obj->consultarCurso( $año );
                    break;
                case 3:
                    
                       $obj->consultarBazar( $año );
                    break;
                case 4:
                    
                        $obj->consultarBrigada( $año );
                    break;
                case 5:
                    
                       $obj->consultarCampeonato( $año );
                    break;
            }
  
        }

        public function consultarAdm($oper){
            $oper=0;
            $año = $_POST['año'];
            $tipoEvento = $_POST['tipoEvento'];
            if($tipoEvento==1){
                $oper=1;
            }else if($tipoEvento==2){
                $oper=2;
            }else if($tipoEvento==3){
                $oper=3;
            }else if($tipoEvento==4){
                $oper=4;
            }else if($tipoEvento==5){
                $oper=5;
            }else{
                echo '<script> alert ("Tipo de evento no seleccionado"); 
                window.location.href="consultaAdm.html" </script>';
            }
           echo $oper;
            $obj = new ClienteEventos();

            switch($oper){
                case 1:
                    
                        $obj->consultarAlquilerAdm( $año );
                    break;
                case 2:
                    
                        $obj->consultarCursoAdm( $año );
                    break;
                case 3:
                    
                       $obj->consultarBazarAdm( $año );
                    break;
                case 4:
                    
                        $obj->consultarBrigadaAdm( $año );
                    break;
                case 5:
                    
                       $obj->consultarCampeonatoAdm( $año );
                    break;
            }
  
        }

        public function buscarDatos($oper){
            $oper=0;
            
            $varRegistro = $_POST['fechaRegistro'];
            $fechaRegistro = str_replace('/', '-', $varRegistro);
            $codigoEvento = $_POST['codigoEvento'];
            $codigoAdministrativo = $_POST['codigoAdministrativo'];
            $tipoEvento = $_POST['tipoEvento'];

            if($tipoEvento==1){
                
                if(empty($codigoEvento)){
                    if(empty($fechaRegistro)){
                        echo '<script> alert ("Ingrese la fecha de registro o el codigo del evento"); 
                        window.location.href="consulta.html" </script>';
                    }else{
                        $oper=2;
                    }

                }else{
                    $oper=1;
                }
                
            }else if($tipoEvento==2){
                if(empty($codigoEvento)){
                    if(empty($fechaRegistro)){
                        echo '<script> alert ("Ingrese la fecha de registro o el codigo del evento"); 
                        window.location.href="consulta.html" </script>';
                    }else{
                        $oper=4;
                    }

                }else{
                    $oper=3;
                }
            }else if($tipoEvento==3){

                if(empty($codigoEvento)){
                    if(empty($fechaRegistro)){
                        echo '<script> alert ("Ingrese la fecha de registro o el codigo del evento"); 
                        window.location.href="consulta.html" </script>';
                    }else{
                        $oper=6;
                    }

                }else{
                    $oper=5;
                }

            }else if($tipoEvento==4){
                if(empty($codigoEvento)){
                    if(empty($fechaRegistro)){
                        echo '<script> alert ("Ingrese la fecha de registro o el codigo del evento"); 
                        window.location.href="consulta.html" </script>';
                    }else{
                        $oper=8;
                    }

                }else{
                    $oper=7;
                }
            }else if($tipoEvento==5){

                if(empty($codigoEvento)){
                    if(empty($fechaRegistro)){
                        echo '<script> alert ("Ingrese la fecha de registro o el codigo del evento"); 
                        window.location.href="consulta.html" </script>';
                    }else{
                        $oper=10;
                    }

                }else{
                    $oper=9;
                }

            }else{
                echo '<script> alert ("Tipo de evento no seleccionado"); 
                window.location.href="consulta.html" </script>';
            }



          
            $obj = new ClienteEventos();

            switch($oper){
                case 1:
                    
                        $obj->buscarAlquilerCodigo ( $codigoEvento, $codigoAdministrativo  );
                    break;
                case 2:
                       $obj->buscarAlquilerFecha( $fechaRegistro, $codigoAdministrativo  );
                      
                    break;
                case 3:
                      
                    $obj->buscarCursoCodigo( $codigoEvento, $codigoAdministrativo  );
                    break;
                case 4:
                    
                    $obj->buscarCursoFecha( $fechaRegistro,  $codigoAdministrativo  );
                    break;
                case 5:
                     $obj->buscarBazarCodigo( $codigoEvento,  $codigoAdministrativo  );
                   
                    break;
                case 6:
                       $obj->buscarBazarFecha( $fechaRegistro, $codigoAdministrativo  );
                        
                 break;
                case 7:
                            
                        $obj->buscarBrigadaCodigo( $codigoEvento, $codigoAdministrativo  );
                          
                            break;
                 case 8:
                        $obj->buscarBrigadaFecha( $fechaRegistro, $codigoAdministrativo  );
                                break;
                case 9:
                         
                                 
                     $obj->buscarCampeonatoCodigo( $codigoEvento, $codigoAdministrativo  );
                                    break;
                case 10:
                                       
                        $obj->buscarCampeonatoFecha( $fechaRegistro, $codigoAdministrativo  );
                  break;
            }
  
        }

      




    }
    $obj1 = new ControlEventos();
    $obj1->seleccionarOpcion();
?>