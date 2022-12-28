<?php
    include("ClienteBrigada.php");

    Class ControlBrigada{
        
        private $obj;

        function __construct(){
            $obj = new ClienteBrigada();
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
            $nombreOrganizacion = $_POST['nombreOrganizacion'];
            $nit = $_POST['nit'];
            $nombreResponsable = $_POST['nombreResponsable'];
            $apellidoResponsable = $_POST['apellidoResponsable'];
            $cedulaResponsable = $_POST['cedulaResponsable'];
            $direccion = $_POST['direccion'];
            $telefonoCelular = $_POST['telefonoCelular'];
            $tipoBrigada = $_POST['tipoBrigada'];

            $varBrigada = $_POST['fechaBrigada'];
            $fechaBrigada = str_replace('/', '-', $varBrigada);

            $horaInicioBrigada = $_POST['horaInicioBrigada'];
            $horaFinalBrigada = $_POST['horaFinalBrigada'];
          
            $codigoAdministrativo = $_POST['cedulaRegistrante'];

            


        

            $obj = new ClienteBrigada();

            switch($oper){
                case 1:
                    $obj->anexarBrigada( $nombreOrganizacion, $nit,  $nombreResponsable, $apellidoResponsable,  $cedulaResponsable, $direccion, $telefonoCelular,   $tipoBrigada,
                    $fechaBrigada, $horaInicioBrigada, $horaFinalBrigada, $codigoAdministrativo);
                    break;
            }
  
        }

        public function modificarDatos($oper){

            $codigoBrigada = $_POST['codigoBrigada'];
            $codigoAdministritativo = $_POST['cedulaRegistrante'];
            
            $mobra = $_POST['mobra'];
            if($mobra==1)
            {
              $nombreResponsable = $_POST['valor'];
              $oper=1;
            }
            if($mobra==2)
            {
              
              $apellidoResponsable = $_POST['valor'];        
              $oper=2;
            }
            if($mobra==3)
            {
              $direccion = $_POST['valor'];
             
              $oper=3;
            }
            if($mobra==4)
            {
              $telefonoCelular = $_POST['valor'];
              $oper=4;
            }
            if($mobra==5)
            {
              $tipoBrigada = $_POST['valor'];
              $oper=5;
            }
            if($mobra==6)
            {
              $fechaBrigada = $_POST['valor'];
              $oper=6;
            }
            if($mobra==7)
            {
              $horaInicio = $_POST['valor'];
              $oper=7;
            }
            if($mobra==8)
            {
              $horaFinal = $_POST['valor'];
              $oper=8;
            }
           
            if($mobra==9)
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
               
              $oper=9;
            }
           
    echo $oper;
    
    
    $obj = new ClienteBrigada();
    
    
    switch($oper){
      case 1:
          $obj->modificarNombreResponsable( $nombreResponsable,$codigoBrigada,$codigoAdministritativo );
          break;
      case 2:
          $obj->modificarApellidoResponsable( $apellidoResponsable, $codigoBrigada,$codigoAdministritativo);
          break;
      case 3:
           $obj->modificarDireccion( $direccion, $codigoBrigada,$codigoAdministritativo);
                  break;
      case 4:
            $obj->modificarTelefonoCelular( $telefonoCelular, $codigoBrigada,$codigoAdministritativo);
              break;
       case 5:
           $obj->modificarTipoBrigada ( $tipoBrigada, $codigoBrigada,$codigoAdministritativo);
             break;
       case 6:
           $obj->modificarFechaBrigada( $fechaBrigada, $codigoBrigada,$codigoAdministritativo);
            break;
       case 7:
           $obj->modificarHoraInicio( $horaInicio, $codigoBrigada,$codigoAdministritativo);
           break;
       case 8:
           $obj->modificarHoraFinal( $horaFinal, $codigoBrigada,$codigoAdministritativo);
           break;
        case 9:
            $obj->modificarEstado( $codigoEstado, $codigoBrigada,$codigoAdministritativo);
            break;
       
    }
    
    }
}
        
    
    







    
    $obj1 = new ControlBrigada();
    $obj1->seleccionarOpcion();
?>