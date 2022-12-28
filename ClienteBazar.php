<?php
Class ClienteBazar{
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

    function anexarBazar($nombreResponsable,   $apellidoResponsable, $cedulaResponsable,   $direccion, $nombreProfesor, $fechaEventor, $horaInicioEvento,
    $horaFinalEvento, $dineroGastado, $dineroRecaudado, $grupoInvolucrados, $codigoAdministrativo){
        
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);

        $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministrativo' ";
        $result= mysqli_query($link, $consulta);
        $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
       

        if($row1 !=null ){

             

                     $consulta  = "SELECT codigoAfiliado  From afiliado  WHERE cedula='$cedulaResponsable'";
                     $result = mysqli_query($link,$consulta);
                              if ($row = mysqli_fetch_array($result)) {
                               
                                do { 
                                $codigoAfiliado= $row[0];
                               } while ($row = mysqli_fetch_array($result)); 
                               $fechaRegistro=date("Y-m-d") ;

                               $grabar_cliente3="INSERT INTO presupuestobazar (dineroGastado, dineroRecaudado, fechaRegistro) 
                               VALUES ('$dineroGastado','$dineroRecaudado','$fechaRegistro')";
                               $guardar_usuario3=mysqli_query($link,$grabar_cliente3) or die ('La insercion a la base de datos fallo13'. mysqli_connect_error());
                              
                                $consulta  = "SELECT codigoPresupuesto  From presupuestobazar  WHERE dineroGastado ='$dineroGastado' AND fechaRegistro='$fechaRegistro'";
                                $result = mysqli_query($link,$consulta);
     
                               if ($row = mysqli_fetch_array($result)) {
                                
                                 do { 
                                 $codigoPresupuesto= $row[0];
                                } while ($row = mysqli_fetch_array($result)); 
                       

                                $grabar_cliente2="INSERT INTO bazar (codigoEvento, codigoAfiliado, codigoEstado, fechaEvento,horaInicio, horaFinal, gruposInvolucrados, codigoAdministrativo, codigoPresupuesto , fechaRegistro) 
                                VALUES ('602','$codigoAfiliado','801','$fechaEventor','$horaInicioEvento','$horaFinalEvento','$grupoInvolucrados','$codigoAdministrativo', '$codigoPresupuesto', '$fechaRegistro')";
                                $guardar_usuario2=mysqli_query($link,$grabar_cliente2) or die ('La insercion a la base de datos fallo12'. mysqli_connect_error());

                                $consulta  = "SELECT codigoBazar FROM bazar  WHERE fechaEvento = '$fechaEventor' AND codigoPresupuesto= '$codigoPresupuesto' AND fechaRegistro='$fechaRegistro' " ;
                                $result = mysqli_query($link,$consulta);
                                if ($row = mysqli_fetch_array($result)) {
                
                                    do{
                                        $newCodigo= $row[0];
                                        echo '<script> alert ("El codigo del bazar es: '.$newCodigo.' Por favor no lo olvide");
                                        window.location.href="exito.html" </script>';
                
                                 } while( $row = mysqli_fetch_array($result));
                                 
                                 mysqli_close($link);
                
                                }
                              }


        
                            }else{
                                echo '<script> alert ("El responsable no hace parte de la junta de accion comunal"); 
                                window.location.href="registro.html" </script>';
                              }
                               
                            
                            
                            
                              

            
        }else{
          echo '<script> alert ("Codigo de administrativo incorrecto"); 
           window.location.href="registro.html" </script>';
         }

    }


    function modificarCodigoResponsable( $codigoResponsable,$codigoBazar,$codigoAdministritativo ){


        
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);
        $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
          $result= mysqli_query($link, $consulta);
          $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
         
  
          if($row1 !=null ){
  
            $consulta  = "SELECT * FROM afiliado WHERE codigoAfiliado ='$codigoResponsable' " ;
            $result = mysqli_query($link,$consulta);

            if ($row = mysqli_fetch_array($result)) {

                $consulta  = "SELECT * FROM bazar WHERE codigoBazar ='$codigoBazar' " ;
               $result = mysqli_query($link,$consulta);

            if ($row = mysqli_fetch_array($result)) {
      

                 $modificar= "UPDATE bazar SET codigoAfiliado = '$codigoResponsable' WHERE codigoBazar = '$codigoBazar' ";
                 $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
                  echo '<script> alert ("Modificacion exitosa"); 
                      window.location.href="modificacion.html" </script>';
  
                 mysqli_close($link);
            }else { 
                echo "¡ No se ha encontrado el codigo del bazar!";
                   }
  
        } else { 
          echo "¡ No se ha encontrado ningún afiliado con ese codigo!";
             } 
            }else{
              echo '<script> alert ("Codigo de administrativo incorrecto"); 
                   window.location.href="modificacion.html" </script>';
            }
  
    }
    function modificarFechaEvento( $fechaEvento, $codigoBazar,$codigoAdministritativo){
  
  
      $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
      mysqli_select_db($link,$this->basedato);
      $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
        $result= mysqli_query($link, $consulta);
        $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
       
  
        if($row1 !=null ){
  
        $consulta  = "SELECT codigoBazar FROM bazar  WHERE  codigoBazar= '$codigoBazar' " ;
          $result = mysqli_query($link,$consulta);
       if ($row = mysqli_fetch_array($result)) {

          $consulta  = "SELECT * FROM bazar WHERE codigoBazar ='$codigoBazar' " ;
             $result = mysqli_query($link,$consulta);

               if ($row = mysqli_fetch_array($result)) {
    
  
               $modificar= "UPDATE bazar SET fechaEvento = '$fechaEvento' WHERE codigoBazar = '$codigoBazar' ";
               $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
                echo '<script> alert ("Modificacion exitosa"); 
                    window.location.href="modificacion.html" </script>';
  
               mysqli_close($link);
            }else { 
                echo "¡ No se ha encontrado el codigo del bazar!";
                   }
  
        } else { 
        echo "¡ No se ha encontrado ningún bazar !";
           } 
      }else{
            echo '<script> alert ("Codigo de administrativo incorrecto"); 
                 window.location.href="modificacion.html" </script>';
          }
       
  
    }
    function modificarHoraInicio ( $horaInicio, $codigoBazar,$codigoAdministritativo){
  
          
      $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
      mysqli_select_db($link,$this->basedato);
      $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
        $result= mysqli_query($link, $consulta);
        $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
       
  
        if($row1 !=null ){
  
        $consulta  = "SELECT codigoBazar FROM bazar  WHERE  codigoBazar= '$codigoBazar' " ;
          $result = mysqli_query($link,$consulta);
       if ($row = mysqli_fetch_array($result)) {
    
             do { 
                 $cedula=$row[0]; 
               } while ($row = mysqli_fetch_array($result)); 
               $consulta  = "SELECT * FROM bazar WHERE codigoBazar ='$codigoBazar' " ;
               $result = mysqli_query($link,$consulta);

                if ($row = mysqli_fetch_array($result)) {
  
               $modificar= "UPDATE bazar SET horaInicio = '$horaInicio' WHERE codigoBazar = '$codigoBazar' ";
               $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
                echo '<script> alert ("Modificacion exitosa"); 
                    window.location.href="modificacion.html" </script>';
  
               mysqli_close($link);
            }else { 
                echo "¡ No se ha encontrado el codigo del bazar!";
                   }
  
        } else { 
        echo "¡ No se ha encontrado ningún bazar !";
           } 
      }else{
            echo '<script> alert ("Codigo de administrativo incorrecto"); 
                 window.location.href="modificacion.html" </script>';
          }
  
    }
    function modificarHoraFinal( $HoraFinal, $codigoBazar,$codigoAdministritativo){
     
      $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
      mysqli_select_db($link,$this->basedato);
      $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
        $result= mysqli_query($link, $consulta);
        $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
       
  
        if($row1 !=null ){
  
        $consulta  = "SELECT codigoBazar FROM bazar  WHERE  codigoBazar= '$codigoBazar' " ;
          $result = mysqli_query($link,$consulta);
       if ($row = mysqli_fetch_array($result)) {
    
             
             $consulta  = "SELECT * FROM bazar WHERE codigoBazar ='$codigoBazar' " ;
               $result = mysqli_query($link,$consulta);

             if ($row = mysqli_fetch_array($result)) {

               $modificar= "UPDATE bazar SET horaFinal='$HoraFinal' WHERE codigoBazar = '$codigoBazar' ";
               $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
                echo '<script> alert ("Modificacion exitosa"); 
                    window.location.href="modificacion.html" </script>';
  
               mysqli_close($link);
            }else { 
                echo "¡ No se ha encontrado el codigo del bazar!";
                   }
  
        } else { 
        echo "¡ No se ha encontrado ningún bazar !";
           } 
      }else{
            echo '<script> alert ("Codigo de administrativo incorrecto"); 
                 window.location.href="modificacion.html" </script>';
          }
  
    }
  
   
  
    function modificarDineroGastado ( $dineroGastado, $codigoBazar,$codigoAdministritativo){
  
      $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
      mysqli_select_db($link,$this->basedato);
      $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
        $result= mysqli_query($link, $consulta);
        $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
       
  
        if($row1 !=null ){
  
            $consulta  = "SELECT codigoPresupuesto FROM bazar  WHERE  codigoBazar= '$codigoBazar' " ;
            $result = mysqli_query($link,$consulta);
            if ($row = mysqli_fetch_array($result)) {
      
               do { 
                   $codigoPresupuesto=$row[0]; 
                 } while ($row = mysqli_fetch_array($result)); 

                 $consulta  = "SELECT * FROM bazar WHERE codigoBazar ='$codigoBazar' " ;
                 $result = mysqli_query($link,$consulta);
  
              if ($row = mysqli_fetch_array($result)) {
    
            $modificar= "UPDATE presupuestobazar SET dineroGastado='$dineroGastado' WHERE codigoPresupuesto = '$codigoPresupuesto' ";
            $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
             echo '<script> alert ("Modificacion exitosa"); 
                 window.location.href="modificacion.html" </script>';
  
            mysqli_close($link);
        }else { 
            echo "¡ No se ha encontrado el codigo del bazar!";
               }

          }else{
            echo '<script> alert ("Codigo del bazar incorrecto""); 
                 window.location.href="modificacion.html" </script>';
          }
              
  
       
      }else{
            echo '<script> alert ("Codigo de administrativo incorrecto"); 
                 window.location.href="modificacion.html" </script>';
          }
  
    
     
  
  }
  function modificarDineroRecaudado( $dineroRecaudado, $codigoBazar,$codigoAdministritativo){
  
    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
    mysqli_select_db($link,$this->basedato);
    $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
      $result= mysqli_query($link, $consulta);
      $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
     

      if($row1 !=null ){

          $consulta  = "SELECT codigoPresupuesto FROM bazar  WHERE  codigoBazar= '$codigoBazar' " ;
          $result = mysqli_query($link,$consulta);
          if ($row = mysqli_fetch_array($result)) {
    
             do { 
                 $codigoPresupuesto=$row[0]; 
               } while ($row = mysqli_fetch_array($result)); 

               $consulta  = "SELECT * FROM bazar WHERE codigoBazar ='$codigoBazar' " ;
               $result = mysqli_query($link,$consulta);

            if ($row = mysqli_fetch_array($result)) {
  
          $modificar= "UPDATE presupuestobazar SET dineroRecaudado='$dineroRecaudado' WHERE codigoPresupuesto = '$codigoPresupuesto' ";
          $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
           echo '<script> alert ("Modificacion exitosa"); 
               window.location.href="modificacion.html" </script>';

          mysqli_close($link);
        }else { 
            echo "¡ No se ha encontrado el codigo del bazar!";
               }

        }else{
          echo '<script> alert ("Codigo del bazar incorrecto""); 
               window.location.href="modificacion.html" </script>';
        }
            

     
    }else{
          echo '<script> alert ("Codigo de administrativo incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
     
  
  }
  function modificarGrupoInvolucrados( $gruposInvolucrados, $codigoBazar,$codigoAdministritativo){
  
    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
    mysqli_select_db($link,$this->basedato);
    $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
      $result= mysqli_query($link, $consulta);
      $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
     
  
      if($row1 !=null ){
  
        $consulta  = "SELECT * FROM bazar  WHERE  codigoBazar= '$codigoBazar' " ;
        $result = mysqli_query($link,$consulta);
        $row2 = mysqli_fetch_array($result, MYSQLI_NUM);
  
        if ($row2 !=null) {


            $consulta  = "SELECT * FROM bazar WHERE codigoBazar ='$codigoBazar' " ;
            $result = mysqli_query($link,$consulta);

         if ($row = mysqli_fetch_array($result)) {
  
             $modificar= "UPDATE bazar SET gruposInvolucrados='$gruposInvolucrados' WHERE codigoBazar = '$codigoBazar' ";
             $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
              echo '<script> alert ("Modificacion exitosa"); 
                  window.location.href="modificacion.html" </script>';
  
             mysqli_close($link);
            }else { 
                echo "¡ No se ha encontrado el codigo del bazar!";
                   }
  
        }else{
          echo '<script> alert ("Codigo de bazar incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
     
    }else{
          echo '<script> alert ("Codigo de administrativo incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
     
  
  }
  function modificarEstado( $codigoEstado, $codigoBazar,$codigoAdministritativo){
  
    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
    mysqli_select_db($link,$this->basedato);
    $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$codigoAdministritativo' ";
      $result= mysqli_query($link, $consulta);
      $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
     
  
      if($row1 !=null ){
  
        $consulta  = "SELECT * FROM bazar  WHERE  codigoBazar= '$codigoBazar' " ;
        $result = mysqli_query($link,$consulta);
        $row2 = mysqli_fetch_array($result, MYSQLI_NUM);
  
        if ($row2 !=null) {

            $consulta  = "SELECT * FROM bazar WHERE codigoBazar ='$codigoBazar' " ;
            $result = mysqli_query($link,$consulta);

         if ($row = mysqli_fetch_array($result)) {
  
             $modificar= "UPDATE bazar SET codigoEstado='$codigoEstado' WHERE codigoBazar = '$codigoBazar' ";
             $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
              echo '<script> alert ("Modificacion exitosa"); 
                  window.location.href="modificacion.html" </script>';
  
             mysqli_close($link);
            }else { 
                echo "¡ No se ha encontrado el codigo del bazar!";
                   }
  
        }else{
          echo '<script> alert ("Codigo de bazar incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
     
    }else{
          echo '<script> alert ("Codigo de administrativo incorrecto"); 
               window.location.href="modificacion.html" </script>';
        }
     
  
     
  
  }

    
   
   
}   
?>