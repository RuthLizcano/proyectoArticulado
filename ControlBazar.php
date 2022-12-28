<?php
    include("ClienteBazar.php");

    Class ControlBazar{
        
        private $obj;

        function __construct(){
            $obj = new ClienteBazar();
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
            $nombreResponsable = $_POST['nombreResponsable'];
            $apellidoResponsable = $_POST['apellidoResponsable'];
            $cedulaResponsable = $_POST['cedulaResponsable'];
            $direccion = $_POST['direccion'];
            $nombreProfesor = $_POST['telefonoCelular'];
            $varEvento = $_POST['fechaEventor'];
            $fechaEventor = str_replace('/', '-', $varEvento);

            $horaInicioEvento = $_POST['horaInicioEvento'];
            $horaFinalEvento = $_POST['horaFinalEvento'];
            $dineroGastado = $_POST['dineroGastado'];
            $dineroRecaudado = $_POST['dineroRecaudado'];
            $grupoInvolucrados = $_POST['grupoInvolucrados'];
            $codigoAdministrativo = $_POST['cedulaRegistrante'];
            
            


        

            $obj = new ClienteBazar();

            switch($oper){
                case 1:
                    $obj->anexarBazar($nombreResponsable,   $apellidoResponsable, $cedulaResponsable,   $direccion, $nombreProfesor, $fechaEventor, $horaInicioEvento,
                    $horaFinalEvento, $dineroGastado, $dineroRecaudado, $grupoInvolucrados, $codigoAdministrativo);
                    break;
            }
  
        }
    


    

    public function modificarDatos($oper){

        $codigoBazar = $_POST['codigoBazar'];
        $codigoAdministritativo = $_POST['cedulaRegistrante'];
        
        $mobra = $_POST['mobra'];
        if($mobra==1)
        {
          $codigoResponsable = $_POST['valor'];
          $oper=1;
        }
        if($mobra==2)
        {
          
          $fechaEvento = $_POST['valor'];        
          $oper=2;
        }
        if($mobra==3)
        {
          $horaInicio = $_POST['valor'];
         
          $oper=3;
        }
        if($mobra==4)
        {
          $HoraFinal = $_POST['valor'];
          $oper=4;
        }
        if($mobra==5)
        {
          $dineroGastado = $_POST['valor'];
          $oper=5;
        }
        if($mobra==6)
        {
          $dineroRecaudado = $_POST['valor'];
          $oper=6;
        }
        if($mobra==7)
        {
          $gruposInvolucrados = $_POST['valor'];
          $oper=7;
        }
       
        if($mobra==8)
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
           
          $oper=8;
        }
       
echo $oper;


$obj = new ClienteBazar();


switch($oper){
  case 1:
      $obj->modificarCodigoResponsable( $codigoResponsable,$codigoBazar,$codigoAdministritativo );
      break;
  case 2:
      $obj->modificarFechaEvento( $fechaEvento, $codigoBazar,$codigoAdministritativo);
      break;
  case 3:
       $obj->modificarHoraInicio ( $horaInicio, $codigoBazar,$codigoAdministritativo);
              break;
  case 4:
        $obj->modificarHoraFinal( $HoraFinal, $codigoBazar,$codigoAdministritativo);
          break;
   case 5:
       $obj->modificarDineroGastado ( $dineroGastado, $codigoBazar,$codigoAdministritativo);
         break;
   case 6:
       $obj->modificarDineroRecaudado( $dineroRecaudado, $codigoBazar,$codigoAdministritativo);
        break;
   case 7:
       $obj->modificarGrupoInvolucrados( $gruposInvolucrados, $codigoBazar,$codigoAdministritativo);
       break;
   case 8:
       $obj->modificarEstado( $codigoEstado, $codigoBazar,$codigoAdministritativo);
       break;
   
}

}
    }














    $obj1 = new ControlBazar();
    $obj1->seleccionarOpcion();

?>