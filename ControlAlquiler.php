<?php

include("ClienteAlquiler.php");

Class ControlAlquiler{
    
    private $obj;

    function __construct(){
        $obj = new ClienteAlquiler();
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
        $nombreResponsable = $_POST['nombreResponsable'];
        $apellidoResponsable = $_POST['apellidoResponsable'];
        $cedulaResponsable = $_POST['cedulaResponsable'];
        $direccion = $_POST['direccion'];
        $telefonoCelular = $_POST['telefonoCelular'];
        $tipoEvento = $_POST['tipoEvento'];
        $varEvento = $_POST['fechaEvento'];
        $fechaEvento = str_replace('/', '-', $varEvento);
        $horaAlquiler = $_POST['horaAlquiler'];
        $abono = $_POST['abono'];
        $costoAlquiler = $_POST['costo'];
        $deposito = $_POST['deposito'];
        $utileria = $_POST['utileria'];
       // $cartaCompromiso = $_POST['fileToUpload'];
        $cedulaRegistrante = $_POST['cedulaRegistrante'];
        $cartaCompromiso=false;
        $codigoEstado=802;





        $target_dir = "carga/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "El archivo es una imagen - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "El archivo no es una imagen. ";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "El archivo ya existe.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 5500000) {
            echo "Tamaño de archivo mas grande al especificado.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "pdf" && $imageFileType != "docx"  ) {
            echo "Solo se permiten archivos de extensión pdf o docx. ";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Ups! Hubo un error, tu archivo no ha sido cargado.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "El archivo". basename( $_FILES["fileToUpload"]["name"]). " fue cargado con exito :).";
                $cartaCompromiso=1;

            } else {
              
                echo "Ups! Hubo un error al momento de cargar tu archivo.";
            }
        }








    $obj = new ClienteAlquiler();

        switch($oper){
            case 1:
                $obj->anexarAlquiler( $nombreResponsable, $apellidoResponsable, $cedulaResponsable, $direccion,  $telefonoCelular, $tipoEvento, $fechaEvento, $horaAlquiler, $abono, $costoAlquiler,  $deposito, $utileria, $cedulaRegistrante, $cartaCompromiso, $codigoEstado);
                break;
        }

    }

    public function modificarDatos($oper){
        $codigoAlquiler = $_POST['codigoAlquiler'];
        $codigoAdministritativo = $_POST['codigoAdministritativo'];

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
           $tipoEvento = $_POST['valor'];
           $oper=5;
         }
         if($mobra==6)
         {
           $fechaEvento = $_POST['valor'];
           $oper=6;
         }
         if($mobra==7)
         {
           $horaAlquiler = $_POST['valor'];
           $oper=7;
         }
         if($mobra==8)
         {
           $abono = $_POST['valor'];
           $oper=8;
         }
         if($mobra==9)
         {
           $costoAlquiler = $_POST['valor'];
           $oper=9;
         }
         if($mobra==10)
         {
           $deposito = $_POST['valor'];
           $oper=10;
         }
         if($mobra==11)
         {
           $utileria = $_POST['valor'];
           $oper=11;
         }
         if($mobra==12)
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
            
           $oper=12;
         }
        



$obj = new ClienteAlquiler();


switch($oper){
   case 1:
       $obj->modificarNombreResponsable( $nombreResponsable,$codigoAlquiler,$codigoAdministritativo );
       break;
   case 2:
       $obj->modificarApellidoResponsable( $apellidoResponsable, $codigoAlquiler,$codigoAdministritativo);
       break;
   case 3:
        $obj->modificarDireccion ( $direccion, $codigoAlquiler,$codigoAdministritativo);
               break;
   case 4:
         $obj->modificarTelefonoCelular( $telefonoCelular, $codigoAlquiler,$codigoAdministritativo);
           break;
    case 5:
        $obj->modificarTipoEvento ( $tipoEvento, $codigoAlquiler,$codigoAdministritativo);
          break;
    case 6:
        $obj->modificarFechaEvento( $fechaEvento, $codigoAlquiler,$codigoAdministritativo);
         break;
    case 7:
        $obj->modificarHorasAlquiler( $horaAlquiler, $codigoAlquiler,$codigoAdministritativo);
        break;
    case 8:
        $obj->modificarAbono( $abono, $codigoAlquiler,$codigoAdministritativo);
        break;
    case 9:
        $obj->modificarCosto( $costoAlquiler, $codigoAlquiler,$codigoAdministritativo);
        break;
    case 10:
        $obj->modificarDeposito( $deposito, $codigoAlquiler,$codigoAdministritativo);
         break;
    case 11:
        $obj->modificarUtileria( $utileria,$codigoAlquiler ,$codigoAdministritativo);
        break;
    case 12:
        $obj->modificarEstadoAlquiler( $codigoEstado,$codigoAlquiler ,$codigoAdministritativo);
            break;
}

}






}
$obj1 = new ControlAlquiler();
$obj1->seleccionarOpcion();

?>