<?php
Class ClienteBrigada{
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



    




    function anexarBrigada($nombreOrganizacion, $nit,  $nombreResponsable, $apellidoResponsable,  $cedulaResponsable, $direccion, $telefonoCelular,   $tipoBrigada,
    $fechaBrigada, $horaInicioBrigada, $horaFinalBrigada, $codigoAdministrativo){
        
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);

        $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministrativo' ";
        $result= mysqli_query($link, $consulta);
        $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
       

        if($row1 !=null ){

               $consultaResponsable= "SELECT * From organizacion  WHERE nit='$nit' ";
               $resultResponsable= mysqli_query($link, $consultaResponsable);
               $rowR = mysqli_fetch_array($resultResponsable, MYSQLI_NUM);

      
            if($rowR !=null ){

                $consulta  = "SELECT *  From responsable  WHERE cedula='$cedulaResponsable'";
                $result = mysqli_query($link,$consulta);

                if ($row = mysqli_fetch_array($result)) {
        
                              
                                $fechaRegistro=date("Y-m-d") ;

                               

                                  $grabar_cliente2="INSERT INTO brigada (codigoEvento,  cedula, nit, tipoBrigada, fechaBrigada, horaInicial, horaFinal, codigoAdministrativo, codigoEstado, fechaRegistro) 
                                  VALUES ('603','$cedulaResponsable','$nit','$tipoBrigada','$fechaBrigada','$horaInicioBrigada','$horaFinalBrigada','$codigoAdministrativo','801', '$fechaRegistro')";
                                
                                  $guardar_usuario2=mysqli_query($link,$grabar_cliente2) or die ('La insercion a la base de datos fallo12'. mysqli_connect_error());

                                  $consulta  = "SELECT codigoBrigada  FROM brigada  WHERE fechaBrigada = '$fechaBrigada' AND nit= '$nit' AND fechaRegistro='$fechaRegistro' " ;
                                   $result = mysqli_query($link,$consulta);
                                if ($row = mysqli_fetch_array($result)) {
                
                                    do{
                                        $newCodigo= $row[0];
                                        echo '<script> alert ("El codigo del brigada es: '.$newCodigo.' Por favor no lo olvide");
                                        window.location.href="exito.html" </script>';
                
                                 } while( $row = mysqli_fetch_array($result));
                                 
                                 mysqli_close($link);
                
                                }
                                
                                
                } else{
                            
                            $grabar_cliente3="INSERT INTO responsable (nombreResponsable, apellidoResponsable, cedula, direccion,telefonoCelular ) 
                            VALUES ('$nombreResponsable','$apellidoResponsable','$cedulaResponsable','$direccion','$telefonoCelular')";
                            $guardar_usuario3=mysqli_query($link,$grabar_cliente3) or die ('La insercion a la base de datos fallo13'. mysqli_connect_error());



                            $fechaRegistro=date("Y-m-d") ;

                            $grabar_cliente2="INSERT INTO brigada (codigoEvento,  cedula, nit, tipoBrigada, fechaBrigada, horaInicial, horaFinal, codigoAdministrativo, codigoEstado, fechaRegistro) 
                            VALUES ('603','$cedulaResponsable','$nit','$tipoBrigada','$fechaBrigada','$horaInicioBrigada','$horaFinalBrigada','$codigoAdministrativo','801', '$fechaRegistro')";
                            $guardar_usuario2=mysqli_query($link,$grabar_cliente2) or die ('La insercion a la base de datos fallo12'. mysqli_connect_error());
                           
                            $consulta  = "SELECT codigoBrigada  FROM brigada  WHERE fechaBrigada = '$fechaBrigada' AND nit= '$nit' AND fechaRegistro='$fechaRegistro' " ;
                            $result = mysqli_query($link,$consulta);
                              if ($row = mysqli_fetch_array($result)) {
         
                             do{
                                 $newCodigo= $row[0];
                                 echo '<script> alert ("El codigo del brigada es: '.$newCodigo.' Por favor no lo olvide");
                                 window.location.href="exito.html" </script>';
         
                          } while( $row = mysqli_fetch_array($result));
                          
                          mysqli_close($link);
         
                         }

                          
                            
                         }


                            
                            
                              


                        
                     
            }else{
                     $grabar_cliente1="INSERT INTO organizacion (nit, nombreOrganizacion) 
                     VALUES ('$nit','$nombreOrganizacion')";
                     $guardar_usuario1=mysqli_query($link,$grabar_cliente1) or die ('La insercion a la base de datos fallo11'. mysqli_connect_error());



                     $consulta  = "SELECT *  From responsable  WHERE cedula='$cedulaResponsable'";
                     $result = mysqli_query($link,$consulta);

                     if ($row = mysqli_fetch_array($result)) {
        
                              
                                $fechaRegistro=date("Y-m-d") ;

                               

                                  $grabar_cliente2="INSERT INTO brigada (codigoEvento,  cedula, nit, tipoBrigada, fechaBrigada, horaInicial, horaFinal, codigoAdministrativo, codigoEstado, fechaRegistro) 
                                  VALUES ('603','$cedulaResponsable','$nit','$tipoBrigada','$fechaBrigada','$horaInicioBrigada','$horaFinalBrigada','$codigoAdministrativo','801', '$fechaRegistro')";
                                  $guardar_usuario2=mysqli_query($link,$grabar_cliente2) or die ('La insercion a la base de datos fallo12'. mysqli_connect_error());
                                  
                                  
                                  $consulta  = "SELECT codigoBrigada  FROM brigada  WHERE fechaBrigada = '$fechaBrigada' AND nit= '$nit' AND fechaRegistro='$fechaRegistro' " ;
                                  $result = mysqli_query($link,$consulta);
                               if ($row = mysqli_fetch_array($result)) {
               
                                   do{
                                       $newCodigo= $row[0];
                                       echo '<script> alert ("El codigo del brigada es: '.$newCodigo.' Por favor no lo olvide");
                                       window.location.href="exito.html" </script>';
               
                                } while( $row = mysqli_fetch_array($result));
                                
                                mysqli_close($link);
               
                               }
                                
                                
                } else{
                            
                            $grabar_cliente3="INSERT INTO responsable (nombreResponsable, apellidoResponsable, cedula, direccion,telefonoCelular ) 
                            VALUES ('$nombreResponsable','$apellidoResponsable','$cedulaResponsable','$direccion','$telefonoCelular')";
                            $guardar_usuario3=mysqli_query($link,$grabar_cliente3) or die ('La insercion a la base de datos fallo13'. mysqli_connect_error());



                            $fechaRegistro=date("Y-m-d") ;

                            $grabar_cliente2="INSERT INTO brigada (codigoEvento,  cedula, nit, tipoBrigada, fechaBrigada, horaInicial, horaFinal, codigoAdministrativo, codigoEstado, fechaRegistro) 
                            VALUES ('603','$cedulaResponsable','$nit','$tipoBrigada','$fechaBrigada','$horaInicioBrigada','$horaFinalBrigada','$codigoAdministrativo','801', '$fechaRegistro')";
                            $guardar_usuario2=mysqli_query($link,$grabar_cliente2) or die ('La insercion a la base de datos fallo12'. mysqli_connect_error());
                           
                           
                            $consulta  = "SELECT codigoBrigada  FROM brigada  WHERE fechaBrigada = '$fechaBrigada' AND nit= '$nit' AND fechaRegistro='$fechaRegistro' " ;
                            $result = mysqli_query($link,$consulta);
                             if ($row = mysqli_fetch_array($result)) {
         
                             do{
                                 $newCodigo= $row[0];
                                 echo '<script> alert ("El codigo del brigada es: '.$newCodigo.' Por favor no lo olvide");
                                 window.location.href="exito.html" </script>';
         
                          } while( $row = mysqli_fetch_array($result));
                          
                          mysqli_close($link);
         
                         }

                          
                            
                         }



                    
            }

            
        }else{
          echo '<script> alert ("Codigo de administrativo incorrecto"); 
           window.location.href="registro.html" </script>';
         }
    }


    function modificarNombreResponsable( $nombreResponsable,$codigoBrigada,$codigoAdministritativo ){


        
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);
        $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
          $result= mysqli_query($link, $consulta);
          $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
         
  
          if($row1 !=null ){
  
            $consulta  = "SELECT cedula FROM brigada WHERE codigoBrigada ='$codigoBrigada' " ;
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
          echo "¡ No se ha encontrado ninguna brigada con ese codigo!";
             } 
            }else{
              echo '<script> alert ("Codigo de administrativo incorrecto"); 
                   window.location.href="modificacion.html" </script>';
            }
  
    }
    function modificarApellidoResponsable( $apellidoResponsable, $codigoBrigada,$codigoAdministritativo){
  
  
     
        
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);
        $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
          $result= mysqli_query($link, $consulta);
          $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
         
  
          if($row1 !=null ){
  
            $consulta  = "SELECT cedula FROM brigada WHERE codigoBrigada ='$codigoBrigada' " ;
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
        echo "¡ No se ha encontrado ninguna brigada !";
           } 
      }else{
            echo '<script> alert ("Codigo de administrativo incorrecto"); 
                 window.location.href="modificacion.html" </script>';
          }
       
  
    }
    function modificarDireccion( $direccion, $codigoBrigada,$codigoAdministritativo){
  
       
        
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);
        $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
          $result= mysqli_query($link, $consulta);
          $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
         
  
          if($row1 !=null ){
  
            $consulta  = "SELECT cedula FROM brigada WHERE codigoBrigada ='$codigoBrigada' " ;
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
        echo "¡ No se ha encontrado ningún brigada !";
           } 
      }else{
            echo '<script> alert ("Codigo de administrativo incorrecto"); 
                 window.location.href="modificacion.html" </script>';
          }
  
    }
    function modificarTelefonoCelular( $telefonoCelular, $codigoBrigada,$codigoAdministritativo){
     
        
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);
        $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
          $result= mysqli_query($link, $consulta);
          $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
         
  
          if($row1 !=null ){
  
            $consulta  = "SELECT cedula FROM brigada WHERE codigoBrigada ='$codigoBrigada' " ;
            $result = mysqli_query($link,$consulta);

            if ($row = mysqli_fetch_array($result)) {
                do { 
                    $cedula=$row[0]; 
                  } while ($row = mysqli_fetch_array($result)); 
                 
      

                 $modificar= "UPDATE responsable SET telefonoCelular = '$telefonoCelular' WHERE cedula = '$cedula' ";
                 $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
                  echo '<script> alert ("Modificacion exitosa"); 
                      window.location.href="modificacion.html" </script>';
  
                 mysqli_close($link);
  
        } else { 
        echo "¡ No se ha encontrado ningún curso !";
           } 
      }else{
            echo '<script> alert ("Codigo de administrativo incorrecto"); 
                 window.location.href="modificacion.html" </script>';
          }
  
    }
  
   
  
    function modificarTipoBrigada ( $tipoBrigada, $codigoBrigada,$codigoAdministritativo){
  
      $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
      mysqli_select_db($link,$this->basedato);
      $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
        $result= mysqli_query($link, $consulta);
        $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
       
  
        if($row1 !=null ){
            
            
            $consulta  = "SELECT * FROM brigada WHERE codigoBrigada ='$codigoBrigada' " ;
            $result = mysqli_query($link,$consulta);
            $row2 = mysqli_fetch_array($result, MYSQLI_NUM);
            
  
            if($row2 !=null ){
               
    
            $modificar= "UPDATE brigada SET tipoBrigada ='$tipoBrigada ' WHERE codigoBrigada = '$codigoBrigada' ";
            $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
             echo '<script> alert ("Modificacion exitosa"); 
                 window.location.href="modificacion.html" </script>';
  
            mysqli_close($link);
       

          }else{
            echo '<script> alert ("Codigo de brigada incorrecto""); 
                 window.location.href="modificacion.html" </script>';
          }
              
  
       
      }else{
            echo '<script> alert ("Codigo de administrativo incorrecto"); 
                 window.location.href="modificacion.html" </script>';
          }
  
    
     
  
  }
  function modificarFechaBrigada( $fechaBrigada, $codigoBrigada,$codigoAdministritativo){
  
    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
    mysqli_select_db($link,$this->basedato);
    $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
      $result= mysqli_query($link, $consulta);
      $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
     

      if($row1 !=null ){


               $consulta  = "SELECT * FROM brigada WHERE codigoBrigada ='$codigoBrigada' " ;
               $result = mysqli_query($link,$consulta);

         if ($row = mysqli_fetch_array($result)) {
  
          $modificar= "UPDATE brigada SET fechaBrigada ='$fechaBrigada ' WHERE codigoBrigada = '$codigoBrigada' ";
          $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
           echo '<script> alert ("Modificacion exitosa"); 
               window.location.href="modificacion.html" </script>';

          mysqli_close($link);
       

        }else{
          echo '<script> alert ("Codigo de brigada incorrecto""); 
               window.location.href="modificacion.html" </script>';
        }
            

     
    }else{
          echo '<script> alert ("Codigo de administrativo incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
     
  
  }
  function modificarHoraInicio( $horaInicio, $codigoBrigada,$codigoAdministritativo){
  
    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
    mysqli_select_db($link,$this->basedato);
    $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
      $result= mysqli_query($link, $consulta);
      $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
     
  
      if($row1 !=null ){
  
        


            $consulta  = "SELECT * FROM brigada WHERE codigoBrigada ='$codigoBrigada' " ;
            $result = mysqli_query($link,$consulta);

         if ($row = mysqli_fetch_array($result)) {
  
             $modificar= "UPDATE brigada SET horaInicial  ='$horaInicio' WHERE codigoBrigada = '$codigoBrigada' ";
             $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
              echo '<script> alert ("Modificacion exitosa"); 
                  window.location.href="modificacion.html" </script>';
  
             mysqli_close($link);
            
  
        }else{
          echo '<script> alert ("Codigo de brigada incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
     
    }else{
          echo '<script> alert ("Codigo de administrativo incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
     
  
  }
  function modificarHoraFinal( $horaFinal, $codigoBrigada,$codigoAdministritativo){
  
    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
    mysqli_select_db($link,$this->basedato);
    $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
      $result= mysqli_query($link, $consulta);
      $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
     
  
      if($row1 !=null ){
  
    

            $consulta  = "SELECT * FROM brigada WHERE codigoBrigada ='$codigoBrigada' " ;
            $result = mysqli_query($link,$consulta);

         if ($row = mysqli_fetch_array($result)) {
  
             $modificar= "UPDATE brigada SET horaFinal ='$horaFinal ' WHERE codigoBrigada = '$codigoBrigada' ";
             $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
              echo '<script> alert ("Modificacion exitosa"); 
                  window.location.href="modificacion.html" </script>';
  
             mysqli_close($link);
          
  
        }else{
          echo '<script> alert ("Codigo de brigada incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
     
    }else{
          echo '<script> alert ("Codigo de administrativo incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
     
  
     
  
  }
  function modificarEstado( $codigoEstado, $codigoBrigada,$codigoAdministritativo){
  
    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
    mysqli_select_db($link,$this->basedato);
    $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
      $result= mysqli_query($link, $consulta);
      $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
     
  
      if($row1 !=null ){
  
        $consulta  = "SELECT * FROM brigada  WHERE  codigoBrigada= '$codigoBrigada' " ;
        $result = mysqli_query($link,$consulta);
        $row2 = mysqli_fetch_array($result, MYSQLI_NUM);
  
        if ($row2 !=null) {

            $consulta  = "SELECT * FROM brigada WHERE codigoBrigada ='$codigoBrigada' " ;
            $result = mysqli_query($link,$consulta);

         if ($row = mysqli_fetch_array($result)) {
  
             $modificar= "UPDATE brigada SET codigoEstado='$codigoEstado' WHERE codigoBrigada = '$codigoBrigada' ";
             $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
              echo '<script> alert ("Modificacion exitosa"); 
                  window.location.href="modificacion.html" </script>';
  
             mysqli_close($link);
            }else { 
                echo "¡ No se ha encontrado el codigo del brigada!";
                   }
  
        }else{
          echo '<script> alert ("Codigo de brigada incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
     
    }else{
          echo '<script> alert ("Codigo de administrativo incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
     
  
     
  
  }









   
   
}   
?>