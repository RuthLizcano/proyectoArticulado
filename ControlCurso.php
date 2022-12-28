<?php
    include("ClienteCurso.php");

    Class ControlCurso{
        
        private $obj;

        function __construct(){
            $obj = new ClienteCurso();
        }

        function seleccionarOpcion(){
            if(isset($_POST['anexar'])){
                $this->registrarDatos(1);
            }
            if(isset($_POST['modificar'])){
                $this->modificarDatos(1);
                # code...
            }

        }

        public function registrarDatos($oper){
            $nombreCurso = $_POST['nombreCurso'];
            $candidadHora = $_POST['candidadHora'];
            $nombreOrganizacion = $_POST['nombreOrganizacion'];
            $nit = $_POST['nit'];
            $nombreProfesor = $_POST['nombreProfesor'];
            $cedulaProfesor = $_POST['cedulaProfesor'];
            $direccion = $_POST['direccion'];
           
            
            $telefonoCelular = $_POST['telefonoCelular'];
            $varInicioC = $_POST['fechaInicioCurso'];
            $fechaInicioCurso = str_replace('/', '-', $varInicioC);
            $varFinalC = $_POST['fechaFinalCurso'];
            $fechaFinalCurso = str_replace('/', '-', $varFinalC);
            $diaClase = $_POST['diaClase'];
            $horaClase = $_POST['horaClase'];
            $tipoCurso = $_POST['tipoCurso'];

            $costo = $_POST['costo'];
            $valorClase = $_POST['valorClase'];
            $ingresoJac = $_POST['ingresoJAC'];
            $gastoJac = $_POST['gastoJAC'];
            $codigoAdministrativo = $_POST['cedulaRegistrante'];
            $codigoEstado=800;
            
            


        

            $obj = new ClienteCurso();

            switch($oper){
                case 1:
                    $obj->anexarCurso($nombreCurso, $candidadHora,  $nombreOrganizacion, $nit, $nombreProfesor, $cedulaProfesor, $direccion, 
                    $telefonoCelular, $fechaInicioCurso, $fechaFinalCurso, $diaClase, $horaClase, $tipoCurso, $costo, $valorClase,   $ingresoJac, $gastoJac, $codigoAdministrativo,$codigoEstado);
                    break;
            }
  
        }


        public function modificarDatos($oper){
            $codigoCurso = $_POST['codigoCurso'];
            $codigoAdministritativo = $_POST['codigoAdministritativo'];
           
             $mobra = $_POST['mobra'];
             if($mobra==1)
             {
               $nombreCurso = $_POST['valor'];
               $oper=1;
             }
             if($mobra==2)
             {
               
               $horasCurso = $_POST['valor'];        
               $oper=2;
             }
             if($mobra==3)
             {
               $nombreProfesor = $_POST['valor'];
              
               $oper=3;
             }
             if($mobra==4)
             {
               $direccion = $_POST['valor'];
               $oper=4;
             }
             if($mobra==5)
             {
               $telefonoCelular = $_POST['valor'];
               $oper=5;
             }
             if($mobra==6)
             {
               $fechaInicioCurso = $_POST['valor'];
               $oper=6;
             }
             if($mobra==7)
             {
               $fechaFinalCurso = $_POST['valor'];
               $oper=7;
             }
             if($mobra==8)
             {
               $diaClase = $_POST['valor'];
               $oper=8;
             }
             if($mobra==9)
             {
               $horaClase = $_POST['valor'];
               $oper=9;
             }
             if($mobra==10)
             {
               $tipoCurso = $_POST['valor'];
               $oper=10;
             }
             if($mobra==11)
             {
               $costo = $_POST['valor'];
               $oper=11;
             }
             if($mobra==12)
             {
               $valorClase = $_POST['valor'];
               $oper=12;
             }
             if($mobra==13)
             {
               $ingresoJac = $_POST['valor'];
               $oper=13;
             }
             if($mobra==14)
             {
               $gastoJac = $_POST['valor'];
               $oper=14;
             }
             if($mobra==15)
             {
               $estadop = $_POST['valor'];
               $estado=strtolower($estadop);
                         echo $estado;
    
                        if($estado=='terminado')
                          {
                           $codigoEstado=800;
                         }else if($estado=='en proceso')
                          {
                            $codigoEstado=801;
                        } else if($estado=='en espera')
                        {
                          $codigoEstado=802;
                        } else if($estado=='pagado')
                        {
                          $codigoEstado=803;
                        } else{
                          echo '<script> alert ("Estado No Encontrado"); 
                          window.location.href="registro.html" </script>';
                        }
                
               $oper=15;
             }
            
    
    
    
    $obj = new ClienteAlquiler();
    
    
    switch($oper){
       case 1:
           $obj->modificarNombreCurso( $nombreCurso,$codigoCurso,$codigoAdministritativo );
           break;
       case 2:
           $obj->modificarCantidadHoras( $horasCurso, $codigoCurso,$codigoAdministritativo);
           break;
       case 3:
            $obj->modificarNombreProfesor ( $nombreProfesor, $codigoCurso,$codigoAdministritativo);
                   break;
       case 4:
             $obj->modificarDireccion( $direccion, $codigoCurso,$codigoAdministritativo);
               break;
        case 5:
            $obj->modificarTelefonoCelular ( $telefonoCelular, $codigoCurso,$codigoAdministritativo);
              break;
        case 6:
            $obj->modificarFechaInicio( $fechaInicioCurso, $codigoCurso,$codigoAdministritativo);
             break;
        case 7:
            $obj->modificarFechaFinal( $fechaFinalCurso, $codigoCurso,$codigoAdministritativo);
            break;
        case 8:
            $obj->modificarDiaClase( $diaClase, $codigoCurso,$codigoAdministritativo);
            break;
        case 9:
            $obj->modiicarHoraClase( $horaClase, $codigoCurso,$codigoAdministritativo);
            break;
        case 10:
            $obj->modificarTipoCurso( $tipoCurso, $codigoCurso,$codigoAdministritativo);
             break;
        case 11:
            $obj->modificarCostoCurso( $costo,$codigoCurso ,$codigoAdministritativo);
            break;
        case 12:
            $obj->modificarValorClase( $valorClase,$codigoCurso ,$codigoAdministritativo);
                break;
        case 13:
            $obj->modificarIngresoJac( $ingresoJac,$codigoCurso ,$codigoAdministritativo);
                break;
         case 14:
            $obj->modificarGastoJac( $gastoJac,$codigoCurso ,$codigoAdministritativo);
                 break;
        case 15:
            $obj->modificarEstadoCurso( $codigoEstado,$codigoCurso ,$codigoAdministritativo);
                break;
    }
    
    }








    }
    $obj1 = new ControlCurso();
    $obj1->seleccionarOpcion();
?>