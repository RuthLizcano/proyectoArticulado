<?php
Class ClienteCampeonato{
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

    function anexarCampeonato( $nombreCampeonato, $codigoParticipante, $nombreResponsable,    $apellidoResponsable,   $cedulaResponsable, $direccion, $telefonoCelular, $costoCampeonato, $gastoJAC,
    $dineroRecaudadoJAC, $fechaInicio,   $fechaFinal, $diaCampeonato,  $horaCampeonato, $codigoAdministrativo) {
        
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);

        $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministrativo' ";
        $result= mysqli_query($link, $consulta);
        $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
        echo'entro';
       

        if($row1 !=null ){
            echo'entro1';
             

                     $consulta  = "SELECT *  From responsable  WHERE cedula='$cedulaResponsable'";
                     $result = mysqli_query($link,$consulta);
                              if ($row = mysqli_fetch_array($result)) {
 
                                echo'entro2';
                               $fechaRegistro=date("Y-m-d") ;

                               $grabar_cliente3="INSERT INTO presupuestocampeonato (costoCampeonato, dineroGastadoJac, dineroRecaudadoJac, fechaRegistro) 
                               VALUES ('$costoCampeonato','$gastoJAC','$dineroRecaudadoJAC', '$fechaRegistro')";
                               $guardar_usuario3=mysqli_query($link,$grabar_cliente3) or die ('La insercion a la base de datos fallo13'. mysqli_connect_error());
                              
                                $consulta  = "SELECT codigoPresupuesto  From presupuestocampeonato  WHERE dineroGastadoJac ='$dineroGastadoJac' AND fechaRegistro='$fechaRegistro'";
                                $result = mysqli_query($link,$consulta);
     
                               if ($row = mysqli_fetch_array($result)) {
                                
                                 do { 
                                 $codigoPresupuesto= $row[0];
                                } while ($row = mysqli_fetch_array($result)); 
                       

                                $grabar_cliente2="INSERT INTO campeonato (codigoEvento, cedula, codigoEstado, nombreCampeonato, codigoParticipante, fechaInicio, fechaFinal, diaCampeonato, horaCampeonato , codigoAdministrativo, codigoPresupuesto, fechaRegistro  ) 
                                VALUES ('604','$cedulaResponsable','801','$nombreCampeonato','$codigoParticipante','$fechaInicio','$fechaFinal','$diaCampeonato', '$horaCampeonato', '$codigoAdministrativo','$codigoPresupuesto','$fechaRegistro')";
                                $guardar_usuario2=mysqli_query($link,$grabar_cliente2) or die ('La insercion a la base de datos fallo12'. mysqli_connect_error());
                                
                                
                                $consulta  = "SELECT codigoCampeonato  FROM campeonato  WHERE cedula = '$cedulaResponsable' AND nombreCampeonato= '$nombreCampeonato' AND fechaRegistro='$fechaRegistro' " ;
                                $result = mysqli_query($link,$consulta);
                                if ($row = mysqli_fetch_array($result)) {
                
                                    do{
                                        $newCodigo= $row[0];
                                        echo '<script> alert ("El codigo del Campeonato es: '.$newCodigo.' Por favor no lo olvide");
                                        window.location.href="exito.html" </script>';
                
                                 } while( $row = mysqli_fetch_array($result));
                                 
                                 mysqli_close($link);
                
                                }

                              }


        
                            }else{

                                $grabar_cliente3="INSERT INTO responsable (nombreResponsable, apellidoResponsable, cedula, direccion,telefonoCelular ) 
                                VALUES ('$nombreResponsable','$apellidoResponsable','$cedulaResponsable','$direccion','$telefonoCelular')";
                                 $guardar_usuario3=mysqli_query($link,$grabar_cliente3) or die ('La insercion a la base de datos fallo13'. mysqli_connect_error());
                                 $fechaRegistro=date("Y-m-d") ;

                                 $grabar_cliente3="INSERT INTO presupuestocampeonato (costoCampeonato, dineroGastadoJac, dineroRecaudadoJac, fechaRegistro) 
                                 VALUES ('$costoCampeonato','$gastoJAC','$dineroRecaudadoJAC', '$fechaRegistro')";
                                 $guardar_usuario3=mysqli_query($link,$grabar_cliente3) or die ('La insercion a la base de datos fallo13'. mysqli_connect_error());
                                
                                  $consulta  = "SELECT codigoPresupuesto  From presupuestocampeonato  WHERE dineroGastadoJac ='$dineroGastadoJac' AND fechaRegistro='$fechaRegistro'";
                                  $result = mysqli_query($link,$consulta);
       
                                 if ($row = mysqli_fetch_array($result)) {
                                  
                                   do { 
                                   $codigoPresupuesto= $row[0];
                                  } while ($row = mysqli_fetch_array($result)); 
                         
  
                                    $grabar_cliente2="INSERT INTO campeonato (codigoEvento, cedula, codigoEstado, nombreCampeonato, codigoParticipante, fechaInicio, fechaFinal, diaCampeonato, horaCampeonato , codigoAdministrativo, codigoPresupuesto, fechaRegistro  ) 
                                    VALUES ('604','$cedulaResponsable','801','$nombreCampeonato','$codigoParticipante','$fechaInicio','$fechaFinal','$diaCampeonato', '$horaCampeonato', '$codigoAdministrativo','$codigoPresupuesto','$fechaRegistro')";
                                     $guardar_usuario2=mysqli_query($link,$grabar_cliente2) or die ('La insercion a la base de datos fallo12'. mysqli_connect_error());
                                    
                                     $consulta  = "SELECT codigoCampeonato  FROM campeonato  WHERE cedula = '$cedulaResponsable' AND nombreCampeonato= '$nombreCampeonato' AND fechaRegistro='$fechaRegistro' " ;
                                     $result = mysqli_query($link,$consulta);
                                     if ($row = mysqli_fetch_array($result)) {
                
                                    do{
                                        $newCodigo= $row[0];
                                        echo '<script> alert ("El codigo del Campeonato es: '.$newCodigo.' Por favor no lo olvide");
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


    function modificarNombreCampeonaro( $nombreCampeonato,$codigoCampeonato,$codigoAdministritativo ){


        
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);
        $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
          $result= mysqli_query($link, $consulta);
          $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
         
  
          if($row1 !=null ){
  

                $consulta  = "SELECT * FROM campeonato WHERE codigoCampeonato ='$codigoCampeonato' " ;
               $result = mysqli_query($link,$consulta);

            if ($row = mysqli_fetch_array($result)) {
      

                 $modificar= "UPDATE campeonato SET nombreCampeonato = '$nombreCampeonato' WHERE codigoCampeonato = '$codigoCampeonato' ";
                 $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
                  echo '<script> alert ("Modificacion exitosa"); 
                      window.location.href="modificacion.html" </script>';
  
                 mysqli_close($link);
            
  
        } else { 
          echo "¡ No se ha encontrado ningún campeonato con ese codigo!";
             } 
            }else{
              echo '<script> alert ("Codigo de administrativo incorrecto"); 
                   window.location.href="modificacion.html" </script>';
            }
  
    }
    function modificarParticipantes( $codigoParticipante, $codigoCampeonato,$codigoAdministritativo) {
  
  
      $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
      mysqli_select_db($link,$this->basedato);
      $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
        $result= mysqli_query($link, $consulta);
        $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
       
  
        if($row1 !=null ){
  
        $consulta  = "SELECT * FROM campeonato  WHERE  codigoCampeonato= '$codigoCampeonato' " ;
          $result = mysqli_query($link,$consulta);
       if ($row = mysqli_fetch_array($result)) {

    
  
               $modificar= "UPDATE campeonato SET codigoParticipante = '$codigoParticipante' WHERE codigoCampeonato = '$codigoCampeonato' ";
               $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
                echo '<script> alert ("Modificacion exitosa"); 
                    window.location.href="modificacion.html" </script>';
  
               mysqli_close($link);
            
  
        } else { 
        echo "¡ No se ha encontrado ningún campeonato !";
           } 
      }else{
            echo '<script> alert ("Codigo de administrativo incorrecto"); 
                 window.location.href="modificacion.html" </script>';
          }
       
  
    }
    function modificarNombreResponsable ( $nombreResponsablep, $codigoCampeonato,$codigoAdministritativo){
  
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);
        $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
          $result= mysqli_query($link, $consulta);
          $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
         
  
          if($row1 !=null ){
  
            $consulta  = "SELECT cedula FROM campeonato WHERE codigoCampeonato ='$codigoCampeonato' " ;
            $result = mysqli_query($link,$consulta);

            if ($row = mysqli_fetch_array($result)) {
                do { 
                    $cedula=$row[0]; 
                  } while ($row = mysqli_fetch_array($result)); 
                 

                 $modificar= "UPDATE responsable SET nombreResponsable = '$nombreResponsablep' WHERE cedula = '$cedula' ";
                 $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
                  echo '<script> alert ("Modificacion exitosa"); 
                      window.location.href="modificacion.html" </script>';
  
                 mysqli_close($link);
          
  
        } else { 
        echo "¡ No se ha encontrado ningún campeonato !";
           } 
      }else{
            echo '<script> alert ("Codigo de administrativo incorrecto"); 
                 window.location.href="modificacion.html" </script>';
          }
  
    }
    function modificarApellidoResponsable( $apellidoResponsable, $codigoCampeonato,$codigoAdministritativo){
     
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);
        $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
          $result= mysqli_query($link, $consulta);
          $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
         
  
          if($row1 !=null ){
  
            $consulta  = "SELECT cedula FROM campeonato WHERE codigoCampeonato ='$codigoCampeonato' " ;
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
        echo "¡ No se ha encontrado ningún campeonato !";
           } 
      }else{
            echo '<script> alert ("Codigo de administrativo incorrecto"); 
                 window.location.href="modificacion.html" </script>';
          }
  
    }
  
   
  
    function modificarDireccion ( $direccion, $codigoCampeonato,$codigoAdministritativo){
  
     
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);
        $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
          $result= mysqli_query($link, $consulta);
          $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
         
  
          if($row1 !=null ){
  
            $consulta  = "SELECT cedula FROM campeonato WHERE codigoCampeonato ='$codigoCampeonato' " ;
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
        

          }else{
            echo '<script> alert ("Codigo del campeonato incorrecto""); 
                 window.location.href="modificacion.html" </script>';
          }
              
  
       
      }else{
            echo '<script> alert ("Codigo de administrativo incorrecto"); 
                 window.location.href="modificacion.html" </script>';
          }
  
    
     
  
  }
  function modificarTelefonoCelular( $telefonoCelular, $codigoCampeonato,$codigoAdministritativo){
  
     
    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
    mysqli_select_db($link,$this->basedato);
    $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
      $result= mysqli_query($link, $consulta);
      $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
     

      if($row1 !=null ){

        $consulta  = "SELECT cedula FROM campeonato WHERE codigoCampeonato ='$codigoCampeonato' " ;
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
       

        }else{
          echo '<script> alert ("Codigo del campeonato incorrecto""); 
               window.location.href="modificacion.html" </script>';
        }
            

     
    }else{
          echo '<script> alert ("Codigo de administrativo incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
     
  
  }
  function modificarCostoCampeonato( $costoCampeonato, $codigoCampeonato,$codigoAdministritativo){
  
    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
    mysqli_select_db($link,$this->basedato);
    $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
      $result= mysqli_query($link, $consulta);
      $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
     
  
      if($row1 !=null ){
  
        $consulta  = "SELECT codigoPresupuesto FROM campeonato  WHERE  codigoCampeonato= '$codigoCampeonato' " ;
        $result = mysqli_query($link,$consulta);
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
  
        if ($row !=null) {
            do { 
                $codigoPresupuesto=$row[0]; 
              } while ($row = mysqli_fetch_array($result)); 


  
             $modificar= "UPDATE presupuestocampeonato SET costoCampeonato='$costoCampeonato' WHERE codigoPresupuesto = '$codigoPresupuesto' ";
             $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
              echo '<script> alert ("Modificacion exitosa"); 
                  window.location.href="modificacion.html" </script>';
  
                  mysqli_close($link);
  
        }else{
          echo '<script> alert ("Codigo de campeonato incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
     
    }else{
          echo '<script> alert ("Codigo de administrativo incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
     
  
  }
  function modificarDineroGastadoJAC( $gastoJAC, $codigoCampeonato,$codigoAdministritativo){
  
    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
    mysqli_select_db($link,$this->basedato);
    $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
      $result= mysqli_query($link, $consulta);
      $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
     
  
      if($row1 !=null ){
  
        $consulta  = "SELECT codigoPresupuesto FROM campeonato  WHERE  codigoCampeonato = '$codigoCampeonato' " ;
        $result = mysqli_query($link,$consulta);
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
  
        if ($row !=null) {
            do { 
                $codigoPresupuesto=$row[0]; 
              } while ($row = mysqli_fetch_array($result)); 


  
             $modificar= "UPDATE presupuestocampeonato SET dineroGastadoJac='$gastoJAC' WHERE codigoPresupuesto = '$codigoPresupuesto' ";
             $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
              echo '<script> alert ("Modificacion exitosa"); 
                  window.location.href="modificacion.html" </script>';
  
                  mysqli_close($link);
            
  
        }else{
          echo '<script> alert ("Codigo de camoeonato incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
     
    }else{
          echo '<script> alert ("Codigo de administrativo incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
     
  
     
  
  }

  function modificarFechaInicio( $fechaInicio, $codigoCampeonato,$codigoAdministritativo){
     
    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);
        $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
          $result= mysqli_query($link, $consulta);
          $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
         
  
          if($row1 !=null ){
  

                $consulta  = "SELECT * FROM campeonato WHERE codigoCampeonato ='$codigoCampeonato' " ;
               $result = mysqli_query($link,$consulta);

            if ($row = mysqli_fetch_array($result)) {
      

                 $modificar= "UPDATE campeonato SET fechaInicio = '$fechaInicio' WHERE codigoCampeonato = '$codigoCampeonato' ";
                 $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
                  echo '<script> alert ("Modificacion exitosa"); 
                      window.location.href="modificacion.html" </script>';
  
                 mysqli_close($link);
          

          } else { 
      echo "¡ No se ha encontrado ningún campeonato !";
         } 
    }else{
          echo '<script> alert ("Codigo de administrativo incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }

  }

 

  function modificarFechaFinal( $fechaFinal, $codigoCampeonato,$codigoAdministritativo){

    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);
        $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
          $result= mysqli_query($link, $consulta);
          $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
         
  
          if($row1 !=null ){
  

                $consulta  = "SELECT * FROM campeonato WHERE codigoCampeonato ='$codigoCampeonato' " ;
               $result = mysqli_query($link,$consulta);

            if ($row = mysqli_fetch_array($result)) {
      

                 $modificar= "UPDATE campeonato SET fechaFinal = '$fechaFinal' WHERE codigoCampeonato = '$codigoCampeonato' ";
                 $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
                  echo '<script> alert ("Modificacion exitosa"); 
                      window.location.href="modificacion.html" </script>';
  
                 mysqli_close($link);
      

        }else{
          echo '<script> alert ("Codigo del campeonato incorrecto""); 
               window.location.href="modificacion.html" </script>';
        }
            

     
    }else{
          echo '<script> alert ("Codigo de administrativo incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }

  
   

}
function modificarDiaCampeonato( $diaCampeonato, $codigoCampeonato,$codigoAdministritativo){

    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
    mysqli_select_db($link,$this->basedato);
    $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
      $result= mysqli_query($link, $consulta);
      $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
     

      if($row1 !=null ){


            $consulta  = "SELECT * FROM campeonato WHERE codigoCampeonato ='$codigoCampeonato' " ;
           $result = mysqli_query($link,$consulta);

        if ($row = mysqli_fetch_array($result)) {
  

             $modificar= "UPDATE campeonato SET diaCampeonato = '$diaCampeonato' WHERE codigoCampeonato = '$codigoCampeonato' ";
             $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
              echo '<script> alert ("Modificacion exitosa"); 
                  window.location.href="modificacion.html" </script>';

             mysqli_close($link);
      
      }else{
        echo '<script> alert ("Codigo del campeonato incorrecto""); 
             window.location.href="modificacion.html" </script>';
      }
          

   
  }else{
        echo '<script> alert ("Codigo de administrativo incorrecto"); 
             window.location.href="modificacion.html" </script>';
      }
   

}
function modificarHoraCampeonato( $horaCampeonato, $codigoCampeonato,$codigoAdministritativo){

    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);
        $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
          $result= mysqli_query($link, $consulta);
          $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
         
  
          if($row1 !=null ){
  

                $consulta  = "SELECT * FROM campeonato WHERE codigoCampeonato ='$codigoCampeonato' " ;
               $result = mysqli_query($link,$consulta);

            if ($row = mysqli_fetch_array($result)) {
      

                 $modificar= "UPDATE campeonato SET horaCampeonato = '$horaCampeonato' WHERE codigoCampeonato = '$codigoCampeonato' ";
                 $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
                  echo '<script> alert ("Modificacion exitosa"); 
                      window.location.href="modificacion.html" </script>';
  
                 mysqli_close($link);
        

      }else{
        echo '<script> alert ("Codigo de campeonato incorrecto"); 
             window.location.href="modificacion.html" </script>';
      }
   
  }else{
        echo '<script> alert ("Codigo de administrativo incorrecto"); 
             window.location.href="modificacion.html" </script>';
      }
   

}
function modificarEstado( $codigoEstado, $codigoCampeonato,$codigoAdministritativo){

   
    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);
        $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
          $result= mysqli_query($link, $consulta);
          $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
         
  
          if($row1 !=null ){
  

                $consulta  = "SELECT * FROM campeonato WHERE codigoCampeonato ='$codigoCampeonato' " ;
               $result = mysqli_query($link,$consulta);

            if ($row = mysqli_fetch_array($result)) {
      

                 $modificar= "UPDATE campeonato SET codigoEstado = '$codigoEstado' WHERE codigoCampeonato = '$codigoCampeonato' ";
                 $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
                  echo '<script> alert ("Modificacion exitosa"); 
                      window.location.href="modificacion.html" </script>';
  
                 mysqli_close($link);
      }else{
        echo '<script> alert ("Codigo de campeonato incorrecto"); 
             window.location.href="modificacion.html" </script>';
      }
   
  }else{
        echo '<script> alert ("Codigo de administrativo incorrecto"); 
             window.location.href="modificacion.html" </script>';
      }
   

   

}




    
   
   
}   
?>