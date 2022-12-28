<?php
    include("ClienteObra.php");

    Class ControlObra{
        
        private $obj;

        function __construct(){
            $obj = new ClienteObra();
        }

        function seleccionarOpcion(){

            if(isset($_POST['anexar'])){
                $this->registrarDatos(1);
            }
             if(isset($_POST['consultarUsu'])){
                $this->registrarDatos(2);
                # code...
            }
            if(isset($_POST['consultarAdm'])){
                $this->registrarDatos(3);
                # code...
            }
            if(isset($_POST['buscar'])){
                $this->buscarObra(1);
                # code...
            }
           
            if(isset($_POST['modificar'])){
                $this->modificarObra(1);
                # code...
            }

        }

        public function registrarDatos($oper){
            $obj = new ClienteObra();

            switch($oper){
                case 1:
                      $nombreObra = $_POST['nombreObra'];
                      $tipoObra = $_POST['tipoObra'];
                      $nombreOrganizacion = $_POST['nombreOrganizacion'];
                      $nit = $_POST['nit'];
                      $varInicio = $_POST['fechaInicio'];
                      $fechaInicio = str_replace('/', '-', $varInicio);
                      $varFinal = $_POST['fechaFinal'];
                      $fechaFinal = str_replace('/', '-', $varFinal);
                      $estado = $_POST['estado'];
                      $cedulaRegistrante = $_POST['cedulaRegistrante'];

            
                    $obj->anexarObra( $nombreObra,$tipoObra, $nit, $fechaInicio, $fechaFinal, $estado, $cedulaRegistrante, $nombreOrganizacion);
                    break;
              case 2:
                        $año = $_POST['año'];
                        $obj->consultarObraUsu( $año);
                    break;
              case 3:
                        $año = $_POST['año'];
                        $obj->consultarObraAdm( $año);
                    break;
            }
  
        }

        public function modificarObra($oper){
                     $codigoObra = $_POST['codigoObra'];
                     $cedulaRegistrante = $_POST['cedulaRegistrante'];

                      $mobra = $_POST['mobra'];
                      if($mobra==0)
                      {
                        $tipoObra = $_POST['valor'];
                        $oper=1;
                      }
                      if($mobra==1)
                      {
                        
                        $fechaInicio = $_POST['valor'];
                      
                        $oper=2;
                      }
                      if($mobra==2)
                      {
                        $fechaFinal = $_POST['valor'];
                       
                        $oper=3;
                      }
                      if($mobra==3)
                      {
                        $estado = $_POST['valor'];
                        $oper=4;
                      }

            $obj = new ClienteObra();


            switch($oper){
                case 1:
                    $obj->modificarTipoObra( $tipoObra,$codigoObra,$cedulaRegistrante );
                    break;
                case 2:
                $obj->modificarFechaInicio( $fechaInicio, $codigoObra,$cedulaRegistrante);
                    break;
                case 3:
                $obj->modificarFinal( $fechaFinal, $codigoObra,$cedulaRegistrante);
                            break;
                case 4:
                $obj->estado( $estado, $codigoObra,$cedulaRegistrante);
                                            break;
            }
  
        }

        public function buscarObra($oper){

            $nit = $_POST['nit'];
            $codigoObra = $_POST['codigoObra'];
            $añoInicio = $_POST['añoInicio'];
            $añoFinal = $_POST['añoFinal'];
            

            

            if($nombreObra='' && $nit='' && $codigoObra='' && $finicio=''  && $fFinal='' ){
              echo '<script> alert ("Debe ingresar por lo menos un dato"); 
              window.location.href="busqueda.html" </script>';
            }else{

                if( empty($codigoObra) ){
                    if( empty($nit)){
                            if(empty($añoInicio)){

                                $oper=4;
      
                            }else{
                                 $oper=3;
                            }
                    }else{
                        $oper=2; 
                    }
                  }else{
                    $oper=1;
                  }
            }

            
                     
            $obj = new ClienteObra();

            switch($oper){
                      
                case 1:

                    $obj->buscarObraCodigo( $codigoObra);
                    break;
                 case 2:
  
                        $obj->buscarObraNit( $nit );
                    break;
                case 3:

                    $obj->buscarObraFechaInicio( $añoInicio );
                     break;
                 case 4:
      
                    $obj->buscarObraFechaFinal( $añoFinal );
                      break;
                        
            }
  
        }


    }
    $obj1 = new ControlObra();
    $obj1->seleccionarOpcion();
?>