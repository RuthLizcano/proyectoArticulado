<?php
Class ClienteCurso{
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

    function anexarCurso($nombreCurso, $candidadHora,  $nombreOrganizacion, $nit, $nombreProfesor, $cedulaProfesor, $direccion,
    $telefonoCelular, $fechaInicioCurso, $fechaFinalCurso, $diaClase, $horaClase, $tipoCurso, $costo, $valorClase,   $ingresoJac, $gastoJac, $codigoAdministrativo,$codigoEstado)
    {
        
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

                $consulta  = "SELECT cedula  From docente  WHERE cedula='$cedulaProfesor'";
                $result = mysqli_query($link,$consulta);

                   if ($row = mysqli_fetch_array($result)) {
        
                              
                                $fechaRegistro=date("Y-m-d") ;

                                 $grabar_cliente3="INSERT INTO curso (codigoEvento, nombreCurso, contidadHoras, fechaInicio,fechaFinal,diaClase, horaClase, tipoCurso,cedula,codigoAdministrativo,nit,codigoEstado,fechaRegistro) 
                                 VALUES ('601','$nombreCurso','$candidadHora','$fechaInicioCurso', '$fechaFinalCurso','$diaClase','$horaClase','$tipoCurso', '$cedulaProfesor', '$codigoAdministrativo', '$nit', '$codigoEstado','$fechaRegistro')";
                                $guardar_usuario3=mysqli_query($link,$grabar_cliente3) or die ('La insercion a la base de datos fallo13'. mysqli_connect_error());
                                
                                $consulta  = "SELECT codigoCurso  From curso  WHERE cedula ='$cedulaProfesor' AND fechaRegistro='$fechaRegistro'";
                                $result = mysqli_query($link,$consulta);
       
                                 if ($row = mysqli_fetch_array($result)) {
                                  
                                   do { 
                                   $codigoCurso= $row[0];
                                  } while ($row = mysqli_fetch_array($result)); 

                                  $grabar_cliente2="INSERT INTO presupuesto (codigoCurso, costoCurso, valorClase, ingresoJac, gastoJac) 
                                  VALUES ('$codigoCurso','$costo','$valorClase','$ingresoJac','$gastoJac')";
                                  $guardar_usuario2=mysqli_query($link,$grabar_cliente2) or die ('La insercion a la base de datos fallo12'. mysqli_connect_error());
                                  
                                  
                                  echo '<script> alert ("El codigo del curso es: '.$codigoCurso.' Por favor no lo olvide");
                                        window.location.href="exito.html" </script>';
                
                                    
                                 
                                   mysqli_close($link);
                
                                  
                                }else{
                                  echo '<script> alert ("Pasaa");
                                  window.location.href="exito.html" </script>';
                                }
                                
                          } else{

                            
                            $grabar_cliente2="INSERT INTO docente (nombre, cedula, direccion, telefonoCelular)  VALUES ('$nombreProfesor','$cedulaProfesor','$direccion','$telefonoCelular')";
                            $guardar_usuario2=mysqli_query($link,$grabar_cliente2) or die ('La insercion a la base de datos fallo12'. mysqli_connect_error());


                            $fechaRegistro=date("Y-m-d") ;

                            $grabar_cliente3="INSERT INTO curso (codigoEvento, nombreCurso, contidadHoras, fechaInicio,fechaFinal,diaClase, horaClase, tipoCurso,cedula,codigoAdministrativo,nit,codigoEstado,fechaRegistro) 
                              VALUES ('601','$nombreCurso','$candidadHora','$fechaInicioCurso', '$fechaFinalCurso','$diaClase','$horaClase','$tipoCurso', '$cedulaProfesor', '$codigoAdministrativo', '$nit', '$codigoEstado','$fechaRegistro')";
                             $guardar_usuario3=mysqli_query($link,$grabar_cliente3) or die ('La insercion a la base de datos fallo13'. mysqli_connect_error());
                             
                             $consulta  = "SELECT codigoCurso  From curso  WHERE cedula='$cedulaProfesor' AND fechaRegistro='$fechaRegistro'";
                             $result = mysqli_query($link,$consulta);
    
                              if ($row = mysqli_fetch_array($result)) {
                                
                                do { 
                                $codigoCurso= $row[0];
                               } while ($row = mysqli_fetch_array($result)); 

                               $grabar_cliente2="INSERT INTO presupuesto (codigoCurso, costoCurso, valorClase, ingresoJac, gastoJac) 
                               VALUES ('$codigoCurso','$costo','$valorClase','$ingresoJac','$gastoJac')";
                               $guardar_usuario2=mysqli_query($link,$grabar_cliente2) or die ('La insercion a la base de datos fallo12'. mysqli_connect_error());

                               echo '<script> alert ("El codigo del curso es: '.$codigoCurso.' Por favor no lo olvide");
                                        window.location.href="exito.html" </script>';
                                   mysqli_close($link);
                            }else{
                              echo '<script> alert ("Pasaa algooo");
                              window.location.href="exito.html" </script>';
                            }
                         }


                            
                            
                              


                        
                     
            }else{
                     $grabar_cliente1="INSERT INTO organizacion (nit, nombreOrganizacion) 
                     VALUES ('$nit','$nombreOrganizacion')";
                     $guardar_usuario1=mysqli_query($link,$grabar_cliente1) or die ('La insercion a la base de datos fallo11'. mysqli_connect_error());


                     $consulta  = "SELECT cedula  From docente  WHERE cedula='$cedulaProfesor'";
                    $result = mysqli_query($link,$consulta);

                   if ($row = mysqli_fetch_array($result)) {
        
                              
                                $fechaRegistro=date("Y-m-d") ;

                                 $grabar_cliente3="INSERT INTO curso (codigoEvento, nombreCurso, contidadHoras, fechaInicio,fechaFinal,diaClase, horaClase, tipoCurso,cedula,codigoAdministrativo,nit,codigoEstado,fechaRegistro) 
                                 VALUES ('601','$nombreCurso','$candidadHora','$fechaInicioCurso', '$fechaFinalCurso','$diaClase','$horaClase','$tipoCurso', '$cedulaProfesor', '$codigoAdministrativo', '$nit', '$codigoEstado','$fechaRegistro')";
                                $guardar_usuario3=mysqli_query($link,$grabar_cliente3) or die ('La insercion a la base de datos fallo13'. mysqli_connect_error());
                                
                                
                                $consulta  = "SELECT codigoCurso  From curso  WHERE cedula='$cedulaProfesor' AND  fechaRegistro='$fechaRegistro'";
                                $result = mysqli_query($link,$consulta);
       
                                 if ($row = mysqli_fetch_array($result)) {
                                   echo "<tr>";
                                   do { 
                                   $codigoCurso= $row[0];
                                  } while ($row = mysqli_fetch_array($result)); 

                                  $grabar_cliente2="INSERT INTO presupuesto (codigoCurso, costoCurso, valorClase, ingresoJac, gastoJac) 
                                  VALUES ('$codigoCurso','$costo','$valorClase','$ingresoJac','$gastoJac')";
                                  $guardar_usuario2=mysqli_query($link,$grabar_cliente2) or die ('La insercion a la base de datos fallo12'. mysqli_connect_error());
                                  echo '<script> alert ("El codigo del curso es: '.$codigoCurso.' Por favor no lo olvide");
                                  window.location.href="exito.html" </script>';
                                  mysqli_close($link);

                                 }else{
                                    echo '<script> alert ("Pasaa algoooppp");
                                  window.location.href="exito.html" </script>';
                                  }
                                
                                
                          } else{
                            $fechaRegistro=date("Y-m-d") ;
                            $grabar_cliente2="INSERT INTO docente (nombre, cedula, direccion, telefonoCelular) 
                            VALUES ('$nombreProfesor','$cedulaProfesor','$direccion','$telefonoCelular')";
                            $guardar_usuario2=mysqli_query($link,$grabar_cliente2) or die ('La insercion a la base de datos fallo12'. mysqli_connect_error());
                            $fechaRegistro=date("Y-m-d") ;

                            $grabar_cliente3="INSERT INTO curso (codigoEvento, nombreCurso, contidadHoras, fechaInicio,fechaFinal,diaClase, horaClase, tipoCurso,cedula,codigoAdministrativo,nit,codigoEstado,fechaRegistro) 
                            VALUES ('601','$nombreCurso','$candidadHora','$fechaInicioCurso', '$fechaFinalCurso','$diaClase','$horaClase','$tipoCurso', '$cedulaProfesor', '$codigoAdministrativo', '$nit', '$codigoEstado','$fechaRegistro')";
                           $guardar_usuario3=mysqli_query($link,$grabar_cliente3) or die ('La insercion a la base de datos fallo13'. mysqli_connect_error());
                            
                             $consulta  = "SELECT codigoCurso   From curso  WHERE cedula='$cedulaProfesor' AND fechaRegistro='$fechaRegistro'";
                             $result = mysqli_query($link,$consulta);
    
                              if ($row = mysqli_fetch_array($result)) {
                                
                                do { 
                                $codigoCurso= $row[0];
                               } while ($row = mysqli_fetch_array($result)); 

                               $grabar_cliente2="INSERT INTO presupuesto (codigoCurso, costoCurso, valorClase, ingresoJac, gastoJac) 
                               VALUES ('$codigoCurso','$costo','$valorClase','$ingresoJac','$gastoJac')";
                               $guardar_usuario2=mysqli_query($link,$grabar_cliente2) or die ('La insercion a la base de datos fallo12'. mysqli_connect_error());

                               echo '<script> alert ("El codigo del curso es: '.$codigoCurso.' Por favor no lo olvide");
                               window.location.href="exito.html" </script>';
                                  mysqli_close($link);
                                     }else{
                                 echo '<script> alert ("Pasaa algoooCCC");
                                     window.location.href="exito.html" </script>';
                                          }
                             
                            }



                    
            }

            
        }else{
          echo '<script> alert ("Codigo de administrativo incorrecto"); 
           window.location.href="registro.html" </script>';
         }
    }





    
   
    function modificarNombreCurso( $nombreCurso,$codigoCurso,$codigoAdministritativo ){


        
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);
        $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
          $result= mysqli_query($link, $consulta);
          $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
         
  
          if($row1 !=null ){
  
          $consulta  = "SELECT cedula FROM curso  WHERE  codigoCurso= '$codigoCurso' " ;
            $result = mysqli_query($link,$consulta);
         if ($row = mysqli_fetch_array($result)) {
      
  
                 $modificar= "UPDATE curso SET nombreCurso = '$nombreCurso' WHERE codigoCurso = '$codigoCurso' ";
                 $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
                  echo '<script> alert ("Modificacion exitosa"); 
                      window.location.href="modificacion.html" </script>';
  
                 mysqli_close($link);
  
        } else { 
          echo "¡ No se ha encontrado ningún curso!";
             } 
            }else{
              echo '<script> alert ("Codigo de administrativo incorrecto"); 
                   window.location.href="modificacion.html" </script>';
            }
  
    }
    function modificarCantidadHoras( $horasCurso, $codigoCurso,$codigoAdministritativo){
  
  
      $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
      mysqli_select_db($link,$this->basedato);
      $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
        $result= mysqli_query($link, $consulta);
        $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
       
  
        if($row1 !=null ){
  
        $consulta  = "SELECT cedula FROM curso  WHERE  codigoCurso= '$codigoCurso' " ;
          $result = mysqli_query($link,$consulta);
       if ($row = mysqli_fetch_array($result)) {
    
  
               $modificar= "UPDATE curso SET contidadHoras = '$horasCurso' WHERE codigoCurso = '$codigoCurso' ";
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
    function modificarNombreProfesor ( $nombreProfesor, $codigoCurso,$codigoAdministritativo){
  
          
      $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
      mysqli_select_db($link,$this->basedato);
      $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
        $result= mysqli_query($link, $consulta);
        $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
       
  
        if($row1 !=null ){
  
        $consulta  = "SELECT cedula FROM curso  WHERE  codigoCurso= '$codigoCurso' " ;
          $result = mysqli_query($link,$consulta);
       if ($row = mysqli_fetch_array($result)) {
    
             do { 
                 $cedula=$row[0]; 
               } while ($row = mysqli_fetch_array($result)); 
  
               $modificar= "UPDATE docente SET nombre = '$nombreProfesor' WHERE cedula = '$cedula' ";
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
    function modificarDireccion( $direccion, $codigoCurso,$codigoAdministritativo){
     
      $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
      mysqli_select_db($link,$this->basedato);
      $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
        $result= mysqli_query($link, $consulta);
        $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
       
  
        if($row1 !=null ){
  
        $consulta  = "SELECT cedula FROM curso  WHERE  codigoCurso= '$codigoCurso' " ;
          $result = mysqli_query($link,$consulta);
       if ($row = mysqli_fetch_array($result)) {
    
             do { 
                 $cedula=$row[0]; 
               } while ($row = mysqli_fetch_array($result)); 
  
               $modificar= "UPDATE docente SET direccion='$direccion' WHERE cedula = '$cedula' ";
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
  
   
  
    function modificarTelefonoCelular ( $telefonoCelular, $codigoCurso,$codigoAdministritativo){
  
      $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
      mysqli_select_db($link,$this->basedato);
      $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
        $result= mysqli_query($link, $consulta);
        $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
       
  
        if($row1 !=null ){
  
            $consulta  = "SELECT cedula FROM curso  WHERE  codigoCurso= '$codigoCurso' " ;
            $result = mysqli_query($link,$consulta);
            if ($row = mysqli_fetch_array($result)) {
      
               do { 
                   $cedula=$row[0]; 
                 } while ($row = mysqli_fetch_array($result)); 
    
            $modificar= "UPDATE docente SET telefonoCelular='$telefonoCelular' WHERE cedula = '$cedula' ";
            $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
             echo '<script> alert ("Modificacion exitosa"); 
                 window.location.href="modificacion.html" </script>';
  
            mysqli_close($link);

          }else{
            echo '<script> alert ("Codigo del curso incorrecto""); 
                 window.location.href="modificacion.html" </script>';
          }
              
  
       
      }else{
            echo '<script> alert ("Codigo de administrativo incorrecto"); 
                 window.location.href="modificacion.html" </script>';
          }
  
    
     
  
  }
  function modificarFechaInicio( $fechaInicioCurso, $codigoCurso,$codigoAdministritativo){
  
    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
    mysqli_select_db($link,$this->basedato);
    $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
      $result= mysqli_query($link, $consulta);
      $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
     
  
      if($row1 !=null ){
  
  
          $consulta  = "SELECT * FROM curso  WHERE  codigoCurso= '$codigoCurso' " ;
          $result = mysqli_query($link,$consulta);
          $row2 = mysqli_fetch_array($result, MYSQLI_NUM);
          
          if ($row2 !=null) {
    
            $modificar= "UPDATE curso SET fechaInicio='$fechaInicioCurso' WHERE codigoCurso = '$codigoCurso' ";
             $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
              echo '<script> alert ("Modificacion exitosa"); 
                  window.location.href="modificacion.html" </script>';
  
             mysqli_close($link);
          }else{
            echo '<script> alert ("Codigo del curso incorrecto"); 
                 window.location.href="modificacion.html" </script>';
          }
  
  
             
  
     
    }else{
          echo '<script> alert ("Codigo de administrativo incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
     
  
  }
  function modificarFechaFinal( $fechaFinalCurso, $codigoCurso,$codigoAdministritativo){
  
    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
    mysqli_select_db($link,$this->basedato);
    $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
      $result= mysqli_query($link, $consulta);
      $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
     
  
      if($row1 !=null ){
  
        $consulta  = "SELECT * FROM curso  WHERE  codigoCurso= '$codigoCurso' " ;
        $result = mysqli_query($link,$consulta);
        $row2 = mysqli_fetch_array($result, MYSQLI_NUM);
  
        if ($row2 !=null) {
  
             $modificar= "UPDATE curso SET fechaFinal='$fechaFinalCurso' WHERE codigoCurso = '$codigoCurso' ";
             $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
              echo '<script> alert ("Modificacion exitosa"); 
                  window.location.href="modificacion.html" </script>';
  
             mysqli_close($link);
  
        }else{
          echo '<script> alert ("Codigo del curso incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
     
    }else{
          echo '<script> alert ("Codigo de administrativo incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
     
  
  }
  function modificarDiaClase( $diaClase, $codigoCurso,$codigoAdministritativo){
  
    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
    mysqli_select_db($link,$this->basedato);
    $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
      $result= mysqli_query($link, $consulta);
      $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
     
  
      if($row1 !=null ){
  
        $consulta  = "SELECT * FROM curso  WHERE  codigoCurso= '$codigoCurso' " ;
        $result = mysqli_query($link,$consulta);
        $row2 = mysqli_fetch_array($result, MYSQLI_NUM);
  
        if ($row2 !=null) {
  
             $modificar= "UPDATE curso SET diaClase='$diaClase' WHERE codigoCurso = '$codigoCurso' ";
             $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
              echo '<script> alert ("Modificacion exitosa"); 
                  window.location.href="modificacion.html" </script>';
  
             mysqli_close($link);
  
        }else{
          echo '<script> alert ("Codigo del curso incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
     
    }else{
          echo '<script> alert ("Codigo de administrativo incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
     
  
     
  
  }
  
  
  
  function modiicarHoraClase( $horaClase, $codigoCurso,$codigoAdministritativo){
  
    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
    mysqli_select_db($link,$this->basedato);
    $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
      $result= mysqli_query($link, $consulta);
      $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
     
  
      if($row1 !=null ){
  
        $consulta  = "SELECT * FROM curso  WHERE  codigoCurso= '$codigoCurso' " ;
        $result = mysqli_query($link,$consulta);
        $row2 = mysqli_fetch_array($result, MYSQLI_NUM);
  
        if ($row2 !=null) {
  
             $modificar= "UPDATE curso SET horaClase='$horaClase' WHERE codigoCurso = '$codigoCurso' ";
             $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
              echo '<script> alert ("Modificacion exitosa"); 
                  window.location.href="modificacion.html" </script>';
  
             mysqli_close($link);
  
        }else{
          echo '<script> alert ("Codigo del curso incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
     
    }else{
          echo '<script> alert ("Codigo de administrativo incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
     
  
  }
  function modificarTipoCurso( $tipoCurso, $codigoCurso,$codigoAdministritativo){
    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
    mysqli_select_db($link,$this->basedato);
    $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
      $result= mysqli_query($link, $consulta);
      $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
     
  
      if($row1 !=null ){
  
        $consulta  = "SELECT * FROM curso  WHERE  codigoCurso= '$codigoCurso' " ;
        $result = mysqli_query($link,$consulta);
        $row2 = mysqli_fetch_array($result, MYSQLI_NUM);
  
        if ($row2 !=null) {
  
             $modificar= "UPDATE curso SET tipoCurso='$tipoCurso' WHERE codigoCurso = '$codigoCurso' ";
             $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
              echo '<script> alert ("Modificacion exitosa"); 
                  window.location.href="modificacion.html" </script>';
  
             mysqli_close($link);
  
        }else{
          echo '<script> alert ("Codigo del curso incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
     
    }else{
          echo '<script> alert ("Codigo de administrativo incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
     
   
  
  }

  
  function modificarCostoCurso( $costo,$codigoCurso ,$codigoAdministritativo){
  
  
    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
    mysqli_select_db($link,$this->basedato);
    $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
      $result= mysqli_query($link, $consulta);
      $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
     
  
      if($row1 !=null ){
  
        $consulta  = "SELECT * FROM curso  WHERE  codigoCurso= '$codigoCurso' " ;
        $result = mysqli_query($link,$consulta);
        $row2 = mysqli_fetch_array($result, MYSQLI_NUM);
  
        if ($row2 !=null) {
  
             $modificar= "UPDATE presupuesto SET costoCurso='$costo' WHERE codigoCurso = '$codigoCurso' ";
             $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
              echo '<script> alert ("Modificacion exitosa"); 
                  window.location.href="modificacion.html" </script>';
  
             mysqli_close($link);
  
        }else{
          echo '<script> alert ("Codigo de curso incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
     
    }else{
          echo '<script> alert ("Codigo de administrativo incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
     
   
  
  }
  function modificarValorClase( $valorClase,$codigoCurso ,$codigoAdministritativo){
  
    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
    mysqli_select_db($link,$this->basedato);
    $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
      $result= mysqli_query($link, $consulta);
      $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
     
  
      if($row1 !=null ){
  
  
        $consulta  = "SELECT * FROM curso  WHERE  codigoCurso= '$codigoCurso' " ;
        $result = mysqli_query($link,$consulta);
        $row2 = mysqli_fetch_array($result, MYSQLI_NUM);
        
        if ($row2 !=null) {
  
          $modificar= "UPDATE presupuesto SET valorClase='$valorClase' WHERE codigoCurso = '$codigoCurso' ";
             $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
              echo '<script> alert ("Modificacion exitosa"); 
                  window.location.href="modificacion.html" </script>';
  
             mysqli_close($link);
        }else{
          echo '<script> alert ("Codigo de curso incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
  
  
             
  
     
    }else{
          echo '<script> alert ("Codigo de administrativo incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
  
  }
  function modificarIngresoJac( $ingresoJac,$codigoCurso ,$codigoAdministritativo){
  
    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
    mysqli_select_db($link,$this->basedato);
    $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
      $result= mysqli_query($link, $consulta);
      $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
     
  
      if($row1 !=null ){
  
  
        $consulta  = "SELECT * FROM curso  WHERE  codigoCurso= '$codigoCurso' " ;
        $result = mysqli_query($link,$consulta);
        $row2 = mysqli_fetch_array($result, MYSQLI_NUM);
        
        if ($row2 !=null) {
  
          $modificar= "UPDATE presupuesto SET ingresoJac='$ingresoJac' WHERE codigoCurso = '$codigoCurso' ";
             $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
              echo '<script> alert ("Modificacion exitosa"); 
                  window.location.href="modificacion.html" </script>';
  
             mysqli_close($link);
        }else{
          echo '<script> alert ("Codigo de curso incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
  
  
             
  
     
    }else{
          echo '<script> alert ("Codigo de administrativo incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
  
  }
  function modificarGastoJac( $gastoJac,$codigoCurso ,$codigoAdministritativo){
  
    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
    mysqli_select_db($link,$this->basedato);
    $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
      $result= mysqli_query($link, $consulta);
      $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
     
  
      if($row1 !=null ){
  
  
        $consulta  = "SELECT * FROM curso  WHERE  codigoCurso= '$codigoCurso' " ;
        $result = mysqli_query($link,$consulta);
        $row2 = mysqli_fetch_array($result, MYSQLI_NUM);
        
        if ($row2 !=null) {
  
          $modificar= "UPDATE presupuesto SET gastoJac='$gastoJac' WHERE codigoCurso = '$codigoCurso' ";
             $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
              echo '<script> alert ("Modificacion exitosa"); 
                  window.location.href="modificacion.html" </script>';
  
             mysqli_close($link);
        }else{
          echo '<script> alert ("Codigo de curso incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
  
  
             
  
     
    }else{
          echo '<script> alert ("Codigo de administrativo incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
  
  }
  function modificarEstadoCurso( $codigoEstado,$codigoCurso ,$codigoAdministritativo){
  
    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
    mysqli_select_db($link,$this->basedato);
    $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
      $result= mysqli_query($link, $consulta);
      $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
     
  
      if($row1 !=null ){
  
  
        $consulta  = "SELECT * FROM curso  WHERE  codigoCurso= '$codigoCurso' " ;
        $result = mysqli_query($link,$consulta);
        $row2 = mysqli_fetch_array($result, MYSQLI_NUM);
        
        if ($row2 !=null) {
  
          $modificar= "UPDATE curso SET codigoEstado='$codigoEstado' WHERE codigoAlquiler = '$codigoAlquiler' ";
             $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
              echo '<script> alert ("Modificacion exitosa"); 
                  window.location.href="modificacion.html" </script>';
  
             mysqli_close($link);
        }else{
          echo '<script> alert ("Codigo de curso incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
  
  
             
  
     
    }else{
          echo '<script> alert ("Codigo de administrativo incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
  
  }
    
   
   
}   
?>