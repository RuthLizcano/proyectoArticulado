<?php
    include("ClienteCampeonato.php");

    Class ControlCampeonato{
        
        private $obj;

        function __construct(){
            $obj = new ClienteCampeonato();
        }

        function seleccionarOpcion(){
            if(isset($_POST['anexar'])){
                $this->registrarDatos(1);
            }
            if(isset($_POST['modificar'])){
                $this->modificarDatos(1);
            }

        }

        public function registrarDatos($oper){
            echo'entooooo';
            $nombreCampeonato = $_POST['nombreCampeonato'];
            $codigoParticipante = $_POST['participantes'];
            $nombreResponsablep = $_POST['codigoAdministrador'];
            $apellidoResponsable = $_POST['apellidoResponsable'];
            $cedulaResponsable = $_POST['cedulaResponsable'];
            $direccion = $_POST['direccion'];
            $telefonoCelular = $_POST['telefonoCelular'];
            $costoCampeonato = $_POST['costoPersona'];
            $gastoJAC = $_POST['gastoJAC'];
            $dineroRecaudadoJAC = $_POST['dineroRecaudadoJAC'];
            $varInicio = $_POST['fechaInicio'];
            $fechaInicio = str_replace('/', '-', $varInicio);
            $varFinal = $_POST['fechaFinal'];
            $fechaFinal = str_replace('/', '-', $varFinal);
            $diaCampeonato = $_POST['diaCampeonato'];
            $horaCampeonato = $_POST['horaCampeonato'];
            $codigoAdministrativo = $_POST['cedulaRegistrante'];

            
            $obj = new ClienteCampeonato();

            switch($oper){
                case 1:
                    
                    $obj->anexarCampeonato( $nombreCampeonato, $codigoParticipante, $nombreResponsablep,    $apellidoResponsable,   $cedulaResponsable, $direccion, $telefonoCelular, $costoCampeonato, $gastoJAC,
                    $dineroRecaudadoJAC, $fechaInicio,   $fechaFinal, $diaCampeonato,  $horaCampeonato, $codigoAdministrativo);
                    break;
            }
  
        }


        public function modificarDatos($oper){
            

            $codigoCampeonato = $_POST['codigoCampeonato'];
            $codigoAdministritativo = $_POST['cedulaRegistrante'];
            
            $mobra = $_POST['mobra'];
            if($mobra==1)
            {
              $nombreCampeonato = $_POST['valor'];
              $oper=1;
            }
            if($mobra==2)
            {
              
              $participantep = $_POST['valor'];   
              $participante=strtolower($participantep);
                       
    
                       if($participante=='adultos')
                         {
                          $codigoParticipante=30;
                        }else if($participante=='jovenes')
                         {
                           $codigoParticipante=31;
                       } else if($participante=='niños')
                       {
                         $codigoParticipante=32;
                       } else if($participante=='mixto')
                       {
                         $codigoParticipante=33;
                       } else if($participante=='femenino')
                       {
                         $codigoParticipante=34;
                       }else{
                         echo '<script> alert ("Participante No Encontrado"); 
                         window.location.href="registro.html" </script>';
                       }

                   
              $oper=2;
            }
            if($mobra==3)
            {
              $nombreResponsablep = $_POST['valor'];
             
              $oper=3;
            }
            if($mobra==4)
            {
              $apellidoResponsable = $_POST['valor'];
              $oper=4;
            }
            if($mobra==5)
            {
              $direccion = $_POST['valor'];
              $oper=5;
            }
            if($mobra==6)
            {
              $telefonoCelular = $_POST['valor'];
              $oper=6;
            }
            if($mobra==7)
            {
              $costoCampeonato = $_POST['valor'];
              $oper=7;
            }
            if($mobra==8)
            {
              $gastoJAC = $_POST['valor'];
              $oper=8;
            }
            if($mobra==9)
            {
              $fechaInicio = $_POST['valor'];
              $oper=9;
            }
            if($mobra==10)
            {
              $fechaFinal = $_POST['valor'];
              $oper=10;
            }
            if($mobra==11)
            {
              $diaCampeonato = $_POST['valor'];
              $oper=11;
            }
            if($mobra==12)
            {
              $horaCampeonato = $_POST['valor'];
              $oper=12;
            }
           
            if($mobra==13)
            {
               
              $estadop = $_POST['valor'];

              $estado=strtolower($estadop);

                        
    
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
               
              $oper=13;
            }
           
    echo $oper;
    
    
    $obj = new ClienteCampeonato();
    
    
    switch($oper){
      case 1:
          $obj->modificarNombreCampeonaro( $nombreCampeonato,$codigoCampeonato,$codigoAdministritativo );
          break;
      case 2:
          $obj->modificarParticipantes( $codigoParticipante, $codigoCampeonato,$codigoAdministritativo);
          break;
      case 3:
           $obj->modificarNombreResponsable ( $nombreResponsablep, $codigoCampeonato,$codigoAdministritativo);
                  break;
      case 4:
            $obj->modificarApellidoResponsable( $apellidoResponsable, $codigoCampeonato,$codigoAdministritativo);
              break;
       case 5:
           $obj->modificarDireccion ( $direccion, $codigoCampeonato,$codigoAdministritativo);
             break;
       case 6:
           $obj->modificarTelefonoCelular( $telefonoCelular, $codigoCampeonato,$codigoAdministritativo);
            break;
       case 7:
           $obj->modificarCostoCampeonato( $costoCampeonato, $codigoCampeonato,$codigoAdministritativo);
           break;
       case 8:
           $obj->modificarDineroGastadoJAC( $gastoJAC, $codigoCampeonato,$codigoAdministritativo);
           break;
        case 9:
            $obj->modificarFechaInicio( $fechaInicio, $codigoCampeonato,$codigoAdministritativo);
             break;
        case 10:
             $obj->modificarFechaFinal( $fechaFinal, $codigoCampeonato,$codigoAdministritativo);
            break;
        case 11:
            $obj->modificarDiaCampeonato( $diaCampeonato, $codigoCampeonato,$codigoAdministritativo);
            break;
        case 12:
                $obj->modificarHoraCampeonato( $horaCampeonato, $codigoCampeonato,$codigoAdministritativo);
                break;
        case 13:
                $obj->modificarEstado( $codigoEstado, $codigoCampeonato,$codigoAdministritativo);
                break;
       
    }
    
    }



    }
    $obj1 = new ControlCampeonato();
    $obj1->seleccionarOpcion();
?>