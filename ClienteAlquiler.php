<?php
Class ClienteAlquiler{
    private $servidor;
    private $usuario;
    private $clave;
    private $basedato;

    function __construct(){
        $this->servidor = "127.0.0.1";
        $this->usuario= "root";
        $this->clave="toor";
        $this->basedato="jac";
    }

    function anexarAlquiler( $nombreResponsable, $apellidoResponsable, $cedulaResponsable, $direccion,  $telefonoCelular, $tipoEvento, $fechaEvento, $horaAlquiler,
    $abono, $costoAlquiler,  $deposito, $utileria,$cedulaRegistrante, $cartaCompromiso, $codigoEstado){
        
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);

        $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$cedulaRegistrante' ";
        $result= mysqli_query($link, $consulta);
        $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
       

        if($row1 !=null ){

               $consultaResponsable= "SELECT cedula  From responsable  WHERE cedula='$cedulaResponsable' ";
               $resultResponsable= mysqli_query($link, $consultaResponsable);
               $rowR = mysqli_fetch_array($resultResponsable, MYSQLI_NUM);

      
            if($rowR !=null ){
                    $fechaRegistro=date("Y-m-d") ;
                     $grabar_cliente2="INSERT INTO recurso (abono, costoAlquiler, deposito, utileria, cedula,fechaRegistro) 
                     VALUES ('$abono','$costoAlquiler','$deposito','$utileria','$cedulaResponsable','$fechaRegistro')";
                     $guardar_usuario2=mysqli_query($link,$grabar_cliente2) or die ('La insercion a la base de datos fallo12'. mysqli_connect_error());

                       $consulta  = "SELECT codigoGestionamiento  From recurso  WHERE cedula='$cedulaResponsable' AND fechaRegistro='$fechaRegistro'";
                       $result = mysqli_query($link,$consulta);

                       if ($row = mysqli_fetch_array($result)) {
                     
                            echo "<tr>";
                               
                            do { 
                            $codigoGestionamiento= $row[0];
                           } while ($row = mysqli_fetch_array($result)); 
                              
                              $fechaRegistro=date("Y-m-d") ;
                               $grabar_cliente3="INSERT INTO alquiler (codigoEvento, cedula, tipoEvento, fechaEvento,horaAlquiler,cartaCompromiso, codigoEstado, codigoGestionamiento,fechaRegistro) 
                                 VALUES ('600','$cedulaResponsable','$tipoEvento','$fechaEvento', '$horaAlquiler','$cartaCompromiso','$codigoEstado','$codigoGestionamiento', '$fechaRegistro')";
                                $guardar_usuario3=mysqli_query($link,$grabar_cliente3) or die ('La insercion a la base de datos fallo13'. mysqli_connect_error());
                               
                                $consulta  = "SELECT codigoAlquiler FROM alquiler  WHERE fechaEvento = '$fechaEvento' AND cedula= '$cedulaResponsable' AND fechaRegistro='$fechaRegistro' " ;
                                $result = mysqli_query($link,$consulta);
                                if ($row = mysqli_fetch_array($result)) {
                
                                    do{
                                        $newCodigo= $row[0];
                                        echo '<script> alert ("El codigo del alquiler es: '.$newCodigo.' Por favor no lo olvide");
                                        window.location.href="exito.html" </script>';
                
                                 } while( $row = mysqli_fetch_array($result));
                                 
                                 mysqli_close($link);
                
                                } else{
                                  echo '<script> alert ("No entro");
                                        window.location.href="exito.html" </script>';
                                }
                          }else{
                            echo '<script> alert ("Paso algo");
                                        window.location.href="exito.html" </script>';

                          }
                     
            }else{
                    $fechaRegistro=date("Y-m-d") ;
                     $grabar_cliente1="INSERT INTO responsable (nombreResponsable, apellidoResponsable, cedula, direccion, telefonoCelular) 
                     VALUES ('$nombreResponsable','$apellidoResponsable','$cedulaResponsable','$direccion','$telefonoCelular')";
                     $guardar_usuario1=mysqli_query($link,$grabar_cliente1) or die ('La insercion a la base de datos fallo11'. mysqli_connect_error());

                     $grabar_cliente2="INSERT INTO recurso (abono, costoAlquiler, deposito, utileria, cedula, fechaRegistro) 
                     VALUES ('$abono','$costoAlquiler','$deposito','$utileria','$cedulaResponsable','$fechaRegistro')";
                     $guardar_usuario2=mysqli_query($link,$grabar_cliente2) or die ('La insercion a la base de datos fallo12'. mysqli_connect_error());
                     
                       $consulta  = "SELECT codigoGestionamiento  From recurso  WHERE cedula='$cedulaResponsable' AND fechaRegistro='$fechaRegistro'";
                       $result = mysqli_query($link,$consulta);

                       if ($row = mysqli_fetch_array($result)) {
                     
                            echo "<tr>";
                               
                            do { 
                            $codigoGestionamiento= $row[0];
                           } while ($row = mysqli_fetch_array($result)); 
                              
                               $fechaRegistro=date("Y-m-d") ;
                               $grabar_cliente3="INSERT INTO alquiler (codigoEvento, cedula, tipoEvento, fechaEvento,horaAlquiler,cartaCompromiso, codigoEstado, codigoGestionamiento,fechaRegistro) 
                                 VALUES ('600','$cedulaResponsable','$tipoEvento','$fechaEvento', '$horaAlquiler','$cartaCompromiso','$codigoEstado','$codigoGestionamiento', '$fechaRegistro')";
                                $guardar_usuario3=mysqli_query($link,$grabar_cliente3) or die ('La insercion a la base de datos fallo13'. mysqli_connect_error());
                                
                                $consulta  = "SELECT codigoAlquiler FROM alquiler  WHERE fechaEvento = '$fechaEvento' AND cedula= '$cedulaResponsable' AND fechaRegistro='$fechaRegistro' " ;
                                $result = mysqli_query($link,$consulta);
                                if ($row = mysqli_fetch_array($result)) {
                
                                    do{
                                        $newCodigo= $row[0];
                                        echo '<script> alert ("El codigo del alquiler es: '.$newCodigo.' Por favor no lo olvide");
                                        window.location.href="exito.html" </script>';
                
                                 } while( $row = mysqli_fetch_array($result));
                                 
                                 mysqli_close($link);
                
                                }else{
                                  echo '<script> alert ("No entro AAA");
                                        window.location.href="exito.html" </script>';
                                }
                          }else{
                            echo '<script> alert ("No entropppp");
                                  window.location.href="exito.html" </script>';
                          }
          
            }

            
        }else{
          echo '<script> alert ("Codigo de administrativo incorrecto"); 
           window.location.href="registro.html" </script>';
         }
    }
    

   
    function modificarNombreResponsable( $nombreResponsable,$codigoAlquiler,$codigoAdministritativo ){


        
      $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
      mysqli_select_db($link,$this->basedato);
      $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
        $result= mysqli_query($link, $consulta);
        $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
       

        if($row1 !=null ){

        $consulta  = "SELECT cedula FROM alquiler  WHERE  codigoAlquiler= '$codigoAlquiler' " ;
          $result = mysqli_query($link,$consulta);
       if ($row = mysqli_fetch_array($result)) {
    
             do { 
                 $cedula=$row[0]; 
               } while ($row = mysqli_fetch_array($result)); 

               $modificar= "UPDATE responsable SET nombreResponsable = '$nombreResponsable' WHERE cedula = '$cedula' ";
               $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
                echo '<script> alert ("Modificacion exitosa"); 
                    window.location.href="modificacion.html" </script>';

               mysqli_close($link);

      } else { 
        echo "¡ No se ha encontrado ningún alquiler !";
           } 
          }else{
            echo '<script> alert ("Codigo de administrativo incorrecto"); 
                 window.location.href="registro.html" </script>';
          }

  }
  function modificarApellidoResponsable( $apellidoResponsable, $codigoAlquiler,$codigoAdministritativo){


  
        
    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
    mysqli_select_db($link,$this->basedato);
    $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
      $result= mysqli_query($link, $consulta);
      $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
     

      if($row1 !=null ){

      $consulta  = "SELECT cedula FROM alquiler  WHERE  codigoAlquiler= '$codigoAlquiler' " ;
        $result = mysqli_query($link,$consulta);
     if ($row = mysqli_fetch_array($result)) {
  
           do { 
               $cedula=$row[0]; 
             } while ($row = mysqli_fetch_array($result)); 

             $modificar= "UPDATE responsable SET apellidoResponsable = '$apellidoResponsable' WHERE cedula = '$cedula' ";
             $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
              echo '<script> alert ("Modificacion exitosa"); 
                  window.location.href="modificacion.html" </script>';

             mysqli_close($link);

      } else { 
      echo "¡ No se ha encontrado ningún alquiler !";
         } 
    }else{
          echo '<script> alert ("Codigo de administrativo incorrecto"); 
               window.location.href="registro.html" </script>';
        }
     

  }
  function modificarDireccion ( $direccion, $codigoAlquiler,$codigoAdministritativo){

        
    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
    mysqli_select_db($link,$this->basedato);
    $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
      $result= mysqli_query($link, $consulta);
      $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
     

      if($row1 !=null ){

      $consulta  = "SELECT cedula FROM alquiler  WHERE  codigoAlquiler= '$codigoAlquiler' " ;
        $result = mysqli_query($link,$consulta);
     if ($row = mysqli_fetch_array($result)) {
  
           do { 
               $cedula=$row[0]; 
             } while ($row = mysqli_fetch_array($result)); 

             $modificar= "UPDATE responsable SET direccion = '$direccion' WHERE cedula = '$cedula' ";
             $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
              echo '<script> alert ("Modificacion exitosa"); 
                  window.location.href="modificacion.html" </script>';

             mysqli_close($link);

      } else { 
      echo "¡ No se ha encontrado ningún alquiler !";
         } 
    }else{
          echo '<script> alert ("Codigo de administrativo incorrecto"); 
               window.location.href="registro.html" </script>';
        }

  }
  function modificarTelefonoCelular( $telefonoCelular, $codigoAlquiler,$codigoAdministritativo){
   
    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
    mysqli_select_db($link,$this->basedato);
    $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
      $result= mysqli_query($link, $consulta);
      $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
     

      if($row1 !=null ){

      $consulta  = "SELECT cedula FROM alquiler  WHERE  codigoAlquiler= '$codigoAlquiler' " ;
        $result = mysqli_query($link,$consulta);
     if ($row = mysqli_fetch_array($result)) {
  
           do { 
               $cedula=$row[0]; 
             } while ($row = mysqli_fetch_array($result)); 

             $modificar= "UPDATE responsable SET telefonoCelular='$telefonoCelular' WHERE cedula = '$cedula' ";
             $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
              echo '<script> alert ("Modificacion exitosa"); 
                  window.location.href="modificacion.html" </script>';

             mysqli_close($link);

      } else { 
      echo "¡ No se ha encontrado ningún alquiler !";
         } 
    }else{
          echo '<script> alert ("Codigo de administrativo incorrecto"); 
               window.location.href="registro.html" </script>';
        }

  }

 

  function modificarTipoEvento ( $tipoEvento, $codigoAlquiler,$codigoAdministritativo){

    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
    mysqli_select_db($link,$this->basedato);
    $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
      $result= mysqli_query($link, $consulta);
      $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
     

      if($row1 !=null ){

        $consulta  = "SELECT * FROM alquiler  WHERE  codigoAlquiler= '$codigoAlquiler' " ;
        $result = mysqli_query($link,$consulta);
        $row2 = mysqli_fetch_array($result, MYSQLI_NUM);
        
        if ($row2 !=null) {
  
          $modificar= "UPDATE alquiler SET tipoEvento='$tipoEvento' WHERE codigoAlquiler = '$codigoAlquiler' ";
          $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
           echo '<script> alert ("Modificacion exitosa"); 
               window.location.href="modificacion.html" </script>';

          mysqli_close($link);
        }else{
          echo '<script> alert ("Codigo de alquiler incorrecto"); 
               window.location.href="registro.html" </script>';
        }
            

     
    }else{
          echo '<script> alert ("Codigo de administrativo incorrecto"); 
               window.location.href="registro.html" </script>';
        }

  
   

}
function modificarFechaEvento( $fechaEvento, $codigoAlquiler,$codigoAdministritativo){

  $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
  mysqli_select_db($link,$this->basedato);
  $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
    $result= mysqli_query($link, $consulta);
    $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
   

    if($row1 !=null ){


        $consulta  = "SELECT * FROM alquiler  WHERE  codigoAlquiler= '$codigoAlquiler' " ;
        $result = mysqli_query($link,$consulta);
        $row2 = mysqli_fetch_array($result, MYSQLI_NUM);
        
        if ($row2 !=null) {
  
          $modificar= "UPDATE alquiler SET fechaEvento='$fechaEvento' WHERE codigoAlquiler = '$codigoAlquiler' ";
           $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
            echo '<script> alert ("Modificacion exitosa"); 
                window.location.href="modificacion.html" </script>';

           mysqli_close($link);
        }else{
          echo '<script> alert ("Codigo de alquiler incorrecto"); 
               window.location.href="registro.html" </script>';
        }


           

   
  }else{
        echo '<script> alert ("Codigo de administrativo incorrecto"); 
             window.location.href="registro.html" </script>';
      }
   

}
function modificarHorasAlquiler( $horaAlquiler, $codigoAlquiler,$codigoAdministritativo){

  $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
  mysqli_select_db($link,$this->basedato);
  $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
    $result= mysqli_query($link, $consulta);
    $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
   

    if($row1 !=null ){

      $consulta  = "SELECT * FROM alquiler  WHERE  codigoAlquiler= '$codigoAlquiler' " ;
      $result = mysqli_query($link,$consulta);
      $row2 = mysqli_fetch_array($result, MYSQLI_NUM);

      if ($row2 !=null) {

           $modificar= "UPDATE alquiler SET horaAlquiler='$horaAlquiler' WHERE codigoAlquiler = '$codigoAlquiler' ";
           $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
            echo '<script> alert ("Modificacion exitosa"); 
                window.location.href="modificacion.html" </script>';

           mysqli_close($link);

      }else{
        echo '<script> alert ("Codigo de alquiler incorrecto"); 
             window.location.href="registro.html" </script>';
      }
   
  }else{
        echo '<script> alert ("Codigo de administrativo incorrecto"); 
             window.location.href="registro.html" </script>';
      }
   

}
function modificarAbono( $abono, $codigoAlquiler,$codigoAdministritativo){

  $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
  mysqli_select_db($link,$this->basedato);
  $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
    $result= mysqli_query($link, $consulta);
    $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
   

    if($row1 !=null ){

    $consulta  = "SELECT codigoGestionamiento FROM alquiler  WHERE  codigoAlquiler= '$codigoAlquiler' " ;
      $result = mysqli_query($link,$consulta);

   if ($row = mysqli_fetch_array($result)) {

         do { 
             $codigoGestionamiento=$row[0]; 
           } while ($row = mysqli_fetch_array($result)); 

           $modificar= "UPDATE recurso SET abono='$abono' WHERE codigoGestionamiento = '$codigoGestionamiento' ";
           $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
            echo '<script> alert ("Modificacion exitosa"); 
                window.location.href="modificacion.html" </script>';

           mysqli_close($link);

    } else { 
    echo "¡ No se ha encontrado ningún alquiler !";
       } 
  }else{
        echo '<script> alert ("Codigo de administrativo incorrecto"); 
             window.location.href="registro.html" </script>';
      }

   

}



function modificarCosto( $costoAlquiler, $codigoAlquiler,$codigoAdministritativo){

  $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
  mysqli_select_db($link,$this->basedato);
  $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
    $result= mysqli_query($link, $consulta);
    $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
   

    if($row1 !=null ){

    $consulta  = "SELECT codigoGestionamiento FROM alquiler  WHERE  codigoAlquiler= '$codigoAlquiler' " ;
      $result = mysqli_query($link,$consulta);
   if ($row = mysqli_fetch_array($result)) {

         do { 
             $codigoGestionamiento=$row[0]; 
           } while ($row = mysqli_fetch_array($result)); 

           $modificar= "UPDATE recurso SET costoAlquiler='$costoAlquiler' WHERE codigoGestionamiento = '$codigoGestionamiento' ";
           $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
            echo '<script> alert ("Modificacion exitosa"); 
                window.location.href="modificacion.html" </script>';

           mysqli_close($link);

    } else { 
    echo "¡ No se ha encontrado ningún alquiler !";
       } 
  }else{
        echo '<script> alert ("Codigo de administrativo incorrecto"); 
             window.location.href="registro.html" </script>';
      }

}
function modificarDeposito( $deposito, $codigoAlquiler,$codigoAdministritativo){

  $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
  mysqli_select_db($link,$this->basedato);
  $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
    $result= mysqli_query($link, $consulta);
    $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
   

    if($row1 !=null ){

    $consulta  = "SELECT codigoGestionamiento FROM alquiler  WHERE  codigoAlquiler= '$codigoAlquiler' " ;
      $result = mysqli_query($link,$consulta);
   if ($row = mysqli_fetch_array($result)) {

         do { 
             $codigoGestionamiento=$row[0]; 
           } while ($row = mysqli_fetch_array($result)); 

           $modificar= "UPDATE recurso SET deposito='$deposito' WHERE codigoGestionamiento = '$codigoGestionamiento' ";
           $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
            echo '<script> alert ("Modificacion exitosa"); 
                window.location.href="modificacion.html" </script>';

           mysqli_close($link);

    } else { 
    echo "¡ No se ha encontrado ningún alquiler !";
       } 
  }else{
        echo '<script> alert ("Codigo de administrativo incorrecto"); 
             window.location.href="registro.html" </script>';
      }
 

}
function modificarUtileria( $utileria,$codigoAlquiler ,$codigoAdministritativo){



  $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
  mysqli_select_db($link,$this->basedato);
  $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
    $result= mysqli_query($link, $consulta);
    $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
   

    if($row1 !=null ){

    $consulta  = "SELECT codigoGestionamiento FROM alquiler  WHERE  codigoAlquiler= '$codigoAlquiler' " ;
      $result = mysqli_query($link,$consulta);
   if ($row = mysqli_fetch_array($result)) {

         do { 
             $codigoGestionamiento=$row[0]; 
           } while ($row = mysqli_fetch_array($result)); 

           $modificar= "UPDATE recurso SET utileria='$utileria' WHERE codigoGestionamiento = '$codigoGestionamiento' ";
           $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
            echo '<script> alert ("Modificacion exitosa"); 
                window.location.href="modificacion.html" </script>';

           mysqli_close($link);

    } else { 
    echo "¡ No se ha encontrado ningún alquiler !";
       } 
  }else{
        echo '<script> alert ("Codigo de administrativo incorrecto"); 
             window.location.href="registro.html" </script>';
      }
 

}
function modificarEstadoAlquiler( $codigoEstado,$codigoAlquiler ,$codigoAdministritativo){

  $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
  mysqli_select_db($link,$this->basedato);
  $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
    $result= mysqli_query($link, $consulta);
    $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
   

    if($row1 !=null ){


      $consulta  = "SELECT * FROM alquiler  WHERE  codigoAlquiler= '$codigoAlquiler' " ;
      $result = mysqli_query($link,$consulta);
      $row2 = mysqli_fetch_array($result, MYSQLI_NUM);
      
      if ($row2 !=null) {

        $modificar= "UPDATE alquiler SET codigoEstado='$codigoEstado' WHERE codigoAlquiler = '$codigoAlquiler' ";
           $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
            echo '<script> alert ("Modificacion exitosa"); 
                window.location.href="modificacion.html" </script>';

           mysqli_close($link);
      }else{
        echo '<script> alert ("Codigo de alquiler incorrecto"); 
             window.location.href="registro.html" </script>';
      }


           

   
  }else{
        echo '<script> alert ("Codigo de administrativo incorrecto"); 
             window.location.href="registro.html" </script>';
      }

}




   
}   
?>