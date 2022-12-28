<?php
Class ClienteAdministrativo{
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

    function anexarAdministrativo($nombre, $apellido,  $cedula,  $anosBarrio, $codigoRol, $cedulaRegistrante, $codigoEstado){
        
        if($cedulaRegistrante=='1234'){
            $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
            mysqli_select_db($link,$this->basedato);
            
    
            $consulta  = "SELECT codigoLogin FROM afiliado  WHERE cedula='$cedula' ";
            $result = mysqli_query($link,$consulta);
             if ($row = mysqli_fetch_array($result)) {
           
                  echo "<tr>";
                     // recorre el vector e imprime los campos definidos en la clase
                  do { 
                  $codigoLogin= $row[0];
                 } while ($row = mysqli_fetch_array($result)); 

                    $fechaRegistro=date("Y-m-d") ;
    
                $grabar_cliente="INSERT INTO administrativo (cedula, cantidadAñosBarrio, codigoAdmin, codigoRol, codigoEstado, codigoLogin, fechaRegistro)
                VALUES ('$cedula','$anosBarrio','$cedulaRegistrante','$codigoRol','$codigoEstado', '$codigoLogin','$fechaRegistro')";
                $guardar_usuario=mysqli_query($link,$grabar_cliente) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());
                $consulta  = "SELECT codigoAdministrativo  FROM administrativo  WHERE cedula   = '$cedula' " ;
                $result = mysqli_query($link,$consulta);
                if ($row = mysqli_fetch_array($result)) {

                    do{
                        $newCodigoAdministrativo= $row[0];
                        echo '<script> alert ("El codigo del administrativo es: '.$newCodigoAdministrativo.' Por favor no lo olvide");
                        window.location.href="exito.html" </script>';

                 } while( $row = mysqli_fetch_array($result));
                 
                 mysqli_close($link);

                }
                
            }else{
                echo '<script> alert ("El Administrativo no se encontrada registrado como afiliado"); 
                window.location.href="registro.html" </script>';
            }
        }else{
            echo '<script> alert ("Codigo de administrativo incorrecto"); 
                window.location.href="registro.html" </script>';
        }
        

       
       

    }




    function consultarAdministrativoUsu($año){        
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);

        

        $consulta= "SELECT * FROM administrativo  WHERE  YEAR (fechaRegistro) = $año ORDER BY fechaRegistro ASC";
        $result= mysqli_query($link, $consulta);
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        
       
        if($row !=null ){
            echo "<table border='1'>";
            ?>
             <table border="1" >

                 <tr>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Administrativo </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Cantidad de Años en el Barrio </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Rol </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de Estado </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de Registro </td>
                    
                 </tr>

            <?php 
          $consulta  = "SELECT * FROM administrativo  WHERE  YEAR (fechaRegistro) = $año ORDER BY fechaRegistro ASC" ;
          $result = mysqli_query($link,$consulta);
           if ($row = mysqli_fetch_array($result)) {
         
         echo "<tr>";
        // recorre el vector e imprime los campos definidos en la clase
          do { 
           echo "<tr><td>".$row[0]."</td><td>".$row[2]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[7]."</td></tr> \n"; 
          } while ($row = mysqli_fetch_array($result)); 
         echo "</tr>";
          } else { 
            echo "¡ No se ha encontrado ningún registro !";
               }   

               
         ?> 
          </table>
          <button type="button" class="btn btn-light" margin-left: 20px;> <a href="consultaUsu.html" id="a">Consulta</a> </button>​
          <button type="button" class="btn btn-light"> <a href="ingresoUsuario.html" id="a">Inicio</a> </button>​
         <?php 
        }else{
            echo '<script> alert ("Fecha no encontrada"); 
             window.location.href="consulta.html" </script>';
        }

    }
    function consultarAdministrativoAdm($año){        
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);

        

        $consulta= "SELECT * FROM administrativo  WHERE  YEAR (fechaRegistro) = $año ORDER BY fechaRegistro ASC";
        $result= mysqli_query($link, $consulta);
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        
       
        if($row !=null ){
            echo "<table border='1'>";
            ?>
             <table border="1" >

                 <tr>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Administrativo </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Numero de cedula </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Cantidad de Años en el Barrio </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Codigo del Administrador  </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Rol </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de Estado </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Login </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de Registro </td>
                    
                 </tr>

            <?php 
          $consulta  = "SELECT * FROM administrativo  WHERE  YEAR (fechaRegistro) = $año ORDER BY fechaRegistro ASC" ;
          $result = mysqli_query($link,$consulta);
           if ($row = mysqli_fetch_array($result)) {
         
         echo "<tr>";
        // recorre el vector e imprime los campos definidos en la clase
          do { 
           echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td></tr> \n"; 
          } while ($row = mysqli_fetch_array($result)); 
         echo "</tr>";
          } else { 
            echo "¡ No se ha encontrado ningún registro !";
               }   
         ?> 
          </table>
          <button type="button" class="btn btn-light" margin-left: 20px;> <a href="consultaAdm.html" id="a">Consulta</a> </button>​
          <button type="button" class="btn btn-light"> <a href="ingresoAdministrados.html" id="a">Inicio</a> </button>​
         <?php 
        }else{
            echo '<script> alert ("Fecha no encontrada"); 
             window.location.href="consulta.html" </script>';
        }

    }

    function buscarCodigoAdministrativo( $codigoAministrativo){


        
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);
        $consulta= "SELECT * FROM administrativo  WHERE  codigoAdministrativo = '$codigoAministrativo'";
        $result= mysqli_query($link, $consulta);
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        
        if($row !=null ){
            echo "<table border='1'>";
            ?>
           
             <table border="1" >

                 <tr>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Administrativo </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Numero de cedula </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Cantidad de Años en el Barrio </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Codigo del Administrador  </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Rol </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de Estado </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Login </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de Registro </td>
                 </tr>

            <?php 
            
            $consulta  = "SELECT * FROM administrativo  WHERE  codigoAdministrativo = '$codigoAministrativo'" ;
            $result = mysqli_query($link,$consulta);
             if ($row = mysqli_fetch_array($result)) {
           
           echo "<tr>";
          // recorre el vector e imprime los campos definidos en la clase
            do { 
             echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td></tr> \n"; 
            } while ($row = mysqli_fetch_array($result)); 
           echo "</tr>";
            } else { 
              echo "¡ No se ha encontrado ningún registro !";
                 }   
         ?> 
          </table>
          <button type="button" class="btn btn-light" margin-left: 20px;> <a href="busqueda.html" id="a">Buscar</a> </button>​
          <button type="button" class="btn btn-light"> <a href="ingreso.html" id="a">Inicio</a> </button>​
         <?php 
        }else{
           
            echo '<script> alert ("Codigo de afiliado no encontrado"); 
             window.location.href="busqueda.html" </script>';
        }

    }


    function buscarCedulaAdministrativo( $cedula){



        
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);
        $consulta= "SELECT * FROM administrativo  WHERE  cedula = '$cedula'";
        $result= mysqli_query($link, $consulta);
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        
        if($row !=null ){
            echo "<table border='1'>";
            ?>
           
             <table border="1" >

                 <tr>
                 <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Administrativo </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Numero de cedula </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Cantidad de Años en el Barrio </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Codigo del Administrador  </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Rol </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de Estado </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Login </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de Registro </td>
                 </tr>

            <?php 
            
            $consulta  = "SELECT * FROM administrativo  WHERE  cedula = '$cedula'" ;
            $result = mysqli_query($link,$consulta);
             if ($row = mysqli_fetch_array($result)) {
           
           echo "<tr>";
          // recorre el vector e imprime los campos definidos en la clase
            do { 
             echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td></tr> \n"; 
            } while ($row = mysqli_fetch_array($result)); 
           echo "</tr>";
            } else { 
              echo "¡ No se ha encontrado ningún registro !";
                 } 
         ?> 
          </table>
          <button type="button" class="btn btn-light" margin-left: 20px;> <a href="busqueda.html" id="a">Buscar</a> </button>​
          <button type="button" class="btn btn-light"> <a href="ingreso.html" id="a">Inicio</a> </button>​
         <?php 
        }else{
           
            echo '<script> alert ("Codigo de administrativo no encontrado"); 
             window.location.href="busqueda.html" </script>';
        }

    }

    function buscarRol($codigoRol){
    
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);
        $consulta= "SELECT * FROM administrativo  WHERE  codigoRol = '$codigoRol'";
        $result= mysqli_query($link, $consulta);
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        
        if($row !=null ){
            echo "<table border='1'>";
            ?>
           
             <table border="1" >

                 <tr>
                 <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Administrativo </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Numero de cedula </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Cantidad de Años en el Barrio </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Codigo del Administrador  </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Rol </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de Estado </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Login </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de Registro </td>
                 </tr>

            <?php 
             $consulta  = "SELECT * FROM administrativo  WHERE  codigoRol = '$codigoRol'";
             $result = mysqli_query($link,$consulta);
              if ($row = mysqli_fetch_array($result)) {
            
            echo "<tr>";
           // recorre el vector e imprime los campos definidos en la clase
             do { 
              echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td></tr> \n"; 
             } while ($row = mysqli_fetch_array($result)); 
            echo "</tr>";
             } else { 
               echo "¡ No se ha encontrado ningún registro !";
                  } 
         ?> 
          </table>
          <button type="button" class="btn btn-light" margin-left: 20px;> <a href="busqueda.html" id="a">Buscar</a> </button>​
          <button type="button" class="btn btn-light"> <a href="ingreso.html" id="a">Inicio</a> </button>​
         <?php 
        }else{
           
            echo 'paso'.$codigoRol.'<script> alert ("Codigo de rol no encontrado"); 
             window.location.href="busqueda.html" </script>';
        }

    }

    function buscarUsuario( $usuariop ){

             $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
             mysqli_select_db($link,$this->basedato);
            
                 $consulta  = "SELECT codigoLogin FROM loginn  WHERE  usuario = '$usuariop'" ;
                  $result = mysqli_query($link,$consulta);
                   if ($row = mysqli_fetch_array($result)) {
                 
                        echo "<tr>";
                           // recorre el vector e imprime los campos definidos en la clase
                        do { 
                        $codigoLogin= $row[0];
                       } while ($row = mysqli_fetch_array($result)); 
                 
     
                       $consulta  ="SELECT * FROM administrativo  WHERE  codigoLogin = '$codigoLogin'";
                        $result = mysqli_query($link,$consulta);
                         if ($row = mysqli_fetch_array($result)) {
                             echo "<table border='1'>";
                             ?>
                
                       <table border="1" >
     
                      <tr>
                      <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Administrativo </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Numero de cedula </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Cantidad de Años en el Barrio </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Codigo del Administrador  </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Rol </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de Estado </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Login </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de Registro </td>
                 </tr>
     
                 <?php 
                 
                         echo "<tr>";
                
                      do { 
                        echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td></tr> \n";
                          } while ($row = mysqli_fetch_array($result)); 
                             echo "</tr>";
                  } else { 
                    echo "¡ No se ha encontrado ningún registro !";
                       } 
     
              ?> 
               </table>
               <button type="button" class="btn btn-light" margin-left: 20px;> <a href="busqueda.html" id="a">Buscar</a> </button>​
               <button type="button" class="btn btn-light"> <a href="ingreso.html" id="a">Inicio</a> </button>​
              <?php 
             }else{
                
                 echo '<script> alert ("Codigo de afiliado no encontrado"); 
                  window.location.href="busqueda.html" </script>';
             }
     
    }




        function buscarContrasena($contrasena){
    
                 $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
                 mysqli_select_db($link,$this->basedato);
                
                     $consulta  = "SELECT codigoLogin FROM loginn  WHERE  contrasena = '$contrasena'" ;
                      $result = mysqli_query($link,$consulta);
                       if ($row = mysqli_fetch_array($result)) {
                     
                            echo "<tr>";
                               // recorre el vector e imprime los campos definidos en la clase
                            do { 
                            $codigoLogin= $row[0];
                           } while ($row = mysqli_fetch_array($result)); 
                     
         
                           $consulta  ="SELECT * FROM administrativo  WHERE  codigoLogin = '$codigoLogin'";
                            $result = mysqli_query($link,$consulta);
                             if ($row = mysqli_fetch_array($result)) {
                                 echo "<table border='1'>";
                                 ?>
                    
                           <table border="1" >
         
                          <tr>
                          <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Administrativo </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Numero de cedula </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Cantidad de Años en el Barrio </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Codigo del Administrador  </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Rol </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de Estado </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Login </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de Registro </td>
                 </tr>
         
                     <?php 
                     
                             echo "<tr>";
                    
                          do { 
                            echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td></tr> \n";
                              } while ($row = mysqli_fetch_array($result)); 
                                 echo "</tr>";
                      } else { 
                        echo "¡ No se ha encontrado ningún registro !";
                           } 
         
                  ?> 
                   </table>
                   <button type="button" class="btn btn-light" margin-left: 20px;> <a href="busqueda.html" id="a">Buscar</a> </button>​
                   <button type="button" class="btn btn-light"> <a href="ingreso.html" id="a">Inicio</a> </button>​
                  <?php 
                 }else{
                    
                     echo '<script> alert ("Codigo de afiliado no encontrado"); 
                      window.location.href="busqueda.html" </script>';
                 }

         }


         function modificarEstado( $codigoEstado , $codigoAdministrativo, $codigoAdmin){

            echo $codigoEstado;
            echo $codigoAdministrativo;
            echo $codigoAdmin;

            if($codigoAdmin=='1234'){
        
            $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
            mysqli_select_db($link,$this->basedato);
            $modificar= "UPDATE administrativo SET codigoEstado='$codigoEstado' WHERE codigoAdministrativo = '$codigoAdministrativo' ";
            $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
            echo '<script> alert ("Modificacion exitosa"); 
                 window.location.href="modificacion.html" </script>';
                mysqli_close($link);

           }else{
            echo '<script> alert ("Codigo de administrativo incorrecto"); 
                window.location.href="registro.html" </script>';
            }
           

        }
        function modificarCantidadAnos( $cantidadAnos, $codigoAdministrativo, $codigoAdmin){


            if($codigoAdmin=='1234'){
        
                $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
                mysqli_select_db($link,$this->basedato);
                $modificar= "UPDATE administrativo SET cantidadAñosBarrio='$cantidadAnos' WHERE codigoAdministrativo = '$codigoAdministrativo' ";
                $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
                echo '<script> alert ("Modificacion exitosa"); 
                     window.location.href="modificacion.html" </script>';
                    mysqli_close($link);
    
            }else{
                echo '<script> alert ("Codigo de administrativo incorrecto"); 
                    window.location.href="registro.html" </script>';
                }
           

        }

        function modificarRol( $codigoRol, $codigoAdministrativo, $codigoAdmin ){

            if($codigoAdmin=='1234'){
        
                $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
                mysqli_select_db($link,$this->basedato);
                $modificar= "UPDATE administrativo SET codigoRol='$codigoRol' WHERE codigoAdministrativo = '$codigoAdministrativo' ";
                $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
                echo '<script> alert ("Modificacion exitosa"); 
                     window.location.href="modificacion.html" </script>';
                    mysqli_close($link);
    
             }else{
                echo '<script> alert ("Codigo de administrativo incorrecto"); 
                    window.location.href="registro.html" </script>';
                }

        }






















    
   
   
}   
?>