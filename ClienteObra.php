<?php
Class ClienteObra{
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

    function anexarObra($nombreObra,$tipoObra, $nit, $fechaInicio, $fechaFinal, $estado, $cedulaRegistrante, $nombreOrganizacion){
        
        
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);

        $consulta= "SELECT * FROM administrativo WHERE codigoAdministrativo ='$cedulaRegistrante' ";
        $result= mysqli_query($link, $consulta);
        $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
       

        if($row1 !=null ){


        $consulta= "SELECT * FROM organizacion WHERE nit= '$nit' AND nombreOrganizacion= '$nombreOrganizacion' ";
        $result= mysqli_query($link, $consulta);
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        
       
        if($row !=null ){
            $fechaRegistro=date("Y-m-d") ;
            $grabar_cliente="INSERT INTO obra (nombreObra, tipoObra, nit, fechaInicio, fechaFinal, estado, cedulaRegistrante, fechaRegistro) VALUES ('$nombreObra','$tipoObra','$nit','$fechaInicio','$fechaFinal', '$estado','$cedulaRegistrante', '$fechaRegistro')";
            $guardar_usuario=mysqli_query($link,$grabar_cliente) or die ('La insercion a la base de datos fallo1'. mysqli_connect_error());
            $consulta  = "SELECT codigo FROM obra  WHERE fechaInicio = '$fechaInicio' AND nombreObra= '$nombreObra' AND fechaRegistro='$fechaRegistro' AND  nit='$nit'" ;
            $result = mysqli_query($link,$consulta);
             if ($row = mysqli_fetch_array($result)) {

                do{
                    $newCodigo= $row[0];
                    echo '<script> alert ("El codigo de la obra es: '.$newCodigo.' Por favor no lo olvide");
                    window.location.href="exito.html" </script>';
             } while( $row = mysqli_fetch_array($result));
             
             mysqli_close($link);

            }
        }else{
            

            $grabar_cliente="INSERT INTO organizacion (nit, nombreOrganizacion) VALUES ('$nit','$nombreOrganizacion')";
            $guardar_usuario=mysqli_query($link,$grabar_cliente) or die ('La insercion a la base de datos fallo devido a que el nit se encuentra registrado a otra organizacion'. mysqli_connect_error());

            $consulta= "SELECT * FROM organizacion WHERE nit= '$nit' AND nombreOrganizacion= '$nombreOrganizacion' ";
            $result= mysqli_query($link, $consulta);
            $row = mysqli_fetch_array($result, MYSQLI_NUM);
            
           
            if($row !=null ){
                $fechaRegistro=date("Y-m-d") ;
            $grabar_cliente="INSERT INTO obra (nombreObra, tipoObra, nit, fechaInicio, fechaFinal, estado, cedulaRegistrante, fechaRegistro) VALUES ('$nombreObra','$tipoObra','$nit','$fechaInicio','$fechaFinal', '$estado','$cedulaRegistrante', '$fechaRegistro')";
            $guardar_usuario=mysqli_query($link,$grabar_cliente) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());
            $consulta  = "SELECT codigo FROM obra  WHERE fechaInicio = '$fechaInicio' AND nombreObra= '$nombreObra' AND fechaRegistro='$fechaRegistro'" ;
            $result = mysqli_query($link,$consulta);
             if ($row = mysqli_fetch_array($result)) {

                do{
                    $newCodigo= $row[0];
                    echo '<script> alert ("El codigo de la obra es: '.$newCodigo.' Por favor no lo olvide");
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

        function consultarObraUsu($año){        
            $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
            mysqli_select_db($link,$this->basedato);
            $consulta= "SELECT * FROM obra  WHERE  YEAR (fechaInicio) = $año ORDER BY fechaInicio ASC";
            $result= mysqli_query($link, $consulta);
            $row = mysqli_fetch_array($result, MYSQLI_NUM);
            
           
            if($row !=null ){

                echo "<table border='1'>";
                ?>
                 <table border="1" >
                 <tr>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Tabla obra </td>
                    </tr>

                     <tr>
                        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de la Obra </td>
                        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nombre Obra </td>
                        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Tipo de Obra </td>
                        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nit de la Organizacion </td>
                        <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Fecha de inicio </td>
                        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de finalizacion </td>
                        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Estado de la obra </td>
                       
                     </tr>

                <?php 
                $consulta  = "SELECT * FROM obra  WHERE  YEAR (fechaInicio) = $año ORDER BY fechaInicio ASC" ;
                $result = mysqli_query($link,$consulta);
                 if ($row = mysqli_fetch_array($result)) {
               
               echo "<tr>";
              // recorre el vector e imprime los campos definidos en la clase
                do { 
                 echo "<tr><td>".$row["codigo"]."</td><td>".$row["nombreObra"]."</td><td>".$row["tipoObra"]."</td><td>".$row["nit"]."</td><td>".$row["fechaInicio"]."</td><td>".$row["fechaFinal"]."</td><td>".$row["estado"]."</td></tr> \n"; 
                } while ($row = mysqli_fetch_array($result)); 
               echo "</tr>";
               echo "\n";
               ?>
               </table>
               <?php 

                } else { 
                  echo "¡ No se ha encontrado ningún registro !";
                     }   
              ?> 
              </table>
              <button type="button" class="btn btn-light" margin-left: 20px;> <a href="consultaUsu.html" id="a">Consultar</a> </button>​
              <button type="button" class="btn btn-light"> <a href="ingresoUsuario.html" id="a">Inicio</a> </button>​
              <?php 
              }else{
                echo '<script> alert ("Fecha no encontrada"); 
                 window.location.href="consultaUsu.html" </script>';
            }

        }

        function consultarObraAdm($año){        
          $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
          mysqli_select_db($link,$this->basedato);
          $consulta= "SELECT * FROM obra  WHERE  YEAR (fechaInicio) = $año ORDER BY fechaInicio ASC";
          $result= mysqli_query($link, $consulta);
          $row = mysqli_fetch_array($result, MYSQLI_NUM);
          
         
          if($row !=null ){

              echo "<table border='1'>";
              ?>
               <table border="1" >
               <tr>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Tabla obra </td>
                  </tr>

                   <tr>
                      <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de la Obra</td>
                      <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nombre Obra </td>
                      <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Tipo de Obra </td>
                      <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nit de la Organizacion </td>
                      <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Fecha de inicio </td>
                      <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de finalizacion </td>
                      <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Estado de la obra </td>
                      <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Administrativo </td>
                   </tr>

              <?php 
              $consulta  = "SELECT * FROM obra  WHERE  YEAR (fechaInicio) = $año ORDER BY fechaInicio ASC" ;
              $result = mysqli_query($link,$consulta);
               if ($row = mysqli_fetch_array($result)) {
             
             echo "<tr>";
            // recorre el vector e imprime los campos definidos en la clase
              do { 
               echo "<tr><td>".$row["codigo"]."</td><td>".$row["nombreObra"]."</td><td>".$row["tipoObra"]."</td><td>".$row["nit"]."</td><td>".$row["fechaInicio"]."</td><td>".$row["fechaFinal"]."</td><td>".$row["estado"]."</td><td>".$row["cedulaRegistrante"]."</td></tr> \n"; 
              } while ($row = mysqli_fetch_array($result)); 
             echo "</tr>";
             echo "\n";
             ?>
             </table>
             <?php 


             ?>

             <table border="1" >
             <tr> 
             <td style=" background-color:rgba(243,255,0); font-weight: bold; margint-left: 30px" > Tabla organizacion </td>
             </tr>


              <tr>
                 <td style=" background-color:rgba(243,255,0); font-weight: bold;" > NIT </td>
                 <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nombre de la organizacion</td>
                
              </tr>

              <?php 
              $consulta  = "SELECT * FROM organizacion  " ;
              $result = mysqli_query($link,$consulta);
                 if ($row = mysqli_fetch_array($result)) {
           
                  echo "<tr>";
                 // recorre el vector e imprime los campos definidos en la clase
                   do { 
                    echo "<tr><td>".$row["0"]."</td><td>".$row["1"]."</td></tr>". " \n"; 
                   } while ($row = mysqli_fetch_array($result)); 
                  echo "</tr>";
                 
                   } else { 
                     echo "¡ No se ha encontrado ningún registro !";
                        }  



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
               window.location.href="consultaAdm.html" </script>';
          }

      }

        function buscarObraCodigo($codigoObra){


        
            $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
            mysqli_select_db($link,$this->basedato);
            $consulta= "SELECT * FROM obra  WHERE  codigo = '$codigoObra' ";
            $result= mysqli_query($link, $consulta);
            $row = mysqli_fetch_array($result, MYSQLI_NUM);
            $mostrar=mysqli_fetch_array($result);
            
            
           
            if($row !=null ){
               
                echo "<table border='1'>";
              
                ?>
               
                 <table border="1" >
                    <tr>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Tabla obra </td>
                    </tr>


                     <tr>
                        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de la Obra </td>
                        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nombre Obra </td>
                        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Tipo de Obra </td>
                        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nit de la Organizacion </td>
                        <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Fecha de inicio </td>
                        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de finalizacion </td>
                        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Estado de la obra </td>
                        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Administrativo </td>
                     </tr>
                <?php 

              $consulta  = "SELECT * FROM obra  WHERE  codigo = '$codigoObra' " ;
              $result = mysqli_query($link,$consulta);
               if ($row = mysqli_fetch_array($result)) {
             
             echo "<tr>";
            // recorre el vector e imprime los campos definidos en la clase
              do { 
               echo "<tr><td>".$row["codigo"]."</td><td>".$row["nombreObra"]."</td><td>".$row["tipoObra"]."</td><td>".$row["nit"]."</td><td>".$row["fechaInicio"]."</td><td>".$row["fechaFinal"]."</td><td>".$row["estado"]."</td><td>".$row["cedulaRegistrante"]."</td></tr> \n"; 
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
                echo '<script> alert ("Dato no encontrado"); 
                 window.location.href="busqueda.html" </script>';
            }

        }

        
        function buscarObraNit($nit){


        
            $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
            mysqli_select_db($link,$this->basedato);
            $consulta= "SELECT * FROM obra  WHERE  nit = $nit ORDER BY nit ASC";
            $result= mysqli_query($link, $consulta);
            $row = mysqli_fetch_array($result, MYSQLI_NUM);
            
           
            if($row !=null ){
                echo "<table border='1'>";
                ?>
               
                <table border="1" >
                   <tr>
                   <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Tabla obra </td>
                   </tr>


                    <tr>
                       <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de la Obra </td>
                       <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nombre Obra </td>
                       <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Tipo de Obra </td>
                       <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nit de la Organizacion </td>
                       <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Fecha de inicio </td>
                       <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de finalizacion </td>
                       <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Estado de la obra </td>
                       <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Administrativo </td>
                    </tr>
               <?php 
               $consulta  = "SELECT * FROM obra  WHERE  nit = $nit ORDER BY nit ASC " ;
               $result = mysqli_query($link,$consulta);
                if ($row = mysqli_fetch_array($result)) {
              
              echo "<tr>";
             // recorre el vector e imprime los campos definidos en la clase
               do { 
                echo "<tr><td>".$row["codigo"]."</td><td>".$row["nombreObra"]."</td><td>".$row["tipoObra"]."</td><td>".$row["nit"]."</td><td>".$row["fechaInicio"]."</td><td>".$row["fechaFinal"]."</td><td>".$row["estado"]."</td><td>".$row["cedulaRegistrante"]."</td></tr> \n"; 
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
                echo '<script> alert ("Dato no encontrado"); 
                 window.location.href="busqueda.html" </script>';
            }

        }

        function buscarObraFechaInicio($añoInicio){

            $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
            mysqli_select_db($link,$this->basedato);
            $consulta= "SELECT * FROM obra  WHERE  YEAR (fechaInicio) = $añoInicio ORDER BY fechaInicio ASC";
            $result= mysqli_query($link, $consulta);
            $row = mysqli_fetch_array($result, MYSQLI_NUM);
            

            if($row !=null ){
                echo "<table border='1'>";
                ?>
               
                <table border="1" >
                   <tr>
                   <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Tabla obra </td>
                   </tr>


                    <tr>
                       <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de la Obra </td>
                       <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nombre Obra </td>
                       <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Tipo de Obra </td>
                       <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nit de la Organizacion </td>
                       <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Fecha de inicio </td>
                       <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de finalizacion </td>
                       <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Estado de la obra </td>
                       <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Administrativo </td>
                    </tr>
               <?php 
                $consulta  = "SELECT * FROM obra  WHERE  YEAR (fechaInicio) = $añoInicio ORDER BY fechaInicio ASC " ;
                $result = mysqli_query($link,$consulta);
                 if ($row = mysqli_fetch_array($result)) {
               
               echo "<tr>";
              // recorre el vector e imprime los campos definidos en la clase
                do { 
                 echo "<tr><td>".$row["codigo"]."</td><td>".$row["nombreObra"]."</td><td>".$row["tipoObra"]."</td><td>".$row["nit"]."</td><td>".$row["fechaInicio"]."</td><td>".$row["fechaFinal"]."</td><td>".$row["estado"]."</td><td>".$row["cedulaRegistrante"]."</td></tr> \n"; 
                } while ($row = mysqli_fetch_array($result)); 
                  echo "</tr>";
                } else { 
                  echo "¡ No se ha encontrado ningún registro !";
                     }
              ?> 
              </table>
              <button type="button" class="btn btn-light" margin-left: 20px;> <a href="Busqueda.html" id="a">Buscar</a> </button>​
              <button type="button" class="btn btn-light"> <a href="ingreso.html" id="a">Inicio</a> </button>​
             <?php 
            }else{
                echo '<script> alert ("Dato no encontrado"); 
                 window.location.href="busqueda.html" </script>';
            }

        }
        function buscarObraFechaFinal($añoFinal){


        
            $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
            mysqli_select_db($link,$this->basedato);
            $consulta= "SELECT * FROM obra  WHERE  YEAR (fechaFinal) = $añoFinal ORDER BY fechaFinal ASC";
            $result= mysqli_query($link, $consulta);
            $row = mysqli_fetch_array($result, MYSQLI_NUM);
            if($row !=null ){
                echo "<table border='1'>";
                ?>
               
                <table border="1" >
                   <tr>
                   <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Tabla obra </td>
                   </tr>


                    <tr>
                       <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de la Obra </td>
                       <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nombre Obra </td>
                       <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Tipo de Obra </td>
                       <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nit de la Organizacion </td>
                       <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Fecha de inicio </td>
                       <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de finalizacion </td>
                       <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Estado de la obra </td>
                       <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Administrativo </td>
                    </tr>
               <?php 
                 $consulta  = "SELECT * FROM obra  WHERE  YEAR (fechaFinal) = $añoFinal ORDER BY fechaFinal ASC" ;
                 $result = mysqli_query($link,$consulta);
                  if ($row = mysqli_fetch_array($result)) {
                
                echo "<tr>";
               // recorre el vector e imprime los campos definidos en la clase
                 do { 
                  echo "<tr><td>".$row["codigo"]."</td><td>".$row["nombreObra"]."</td><td>".$row["tipoObra"]."</td><td>".$row["nit"]."</td><td>".$row["fechaInicio"]."</td><td>".$row["fechaFinal"]."</td><td>".$row["estado"]."</td><td>".$row["cedulaRegistrante"]."</td></tr> \n"; 
                 } while ($row = mysqli_fetch_array($result)); 
                   echo "</tr>";
                 } else { 
                   echo "¡ No se ha encontrado ningún registro !";
                      }
             ?> 
              </table>
              <button type="button" class="btn btn-light" margin-left: 20px;> <a href="Busqueda.html" id="a">Buscar</a> </button>​
              <button type="button" class="btn btn-light"> <a href="ingreso.html" id="a">Inicio</a> </button>​
             <?php 
            }else{
                echo '<script> alert ("Dato no encontrado"); 
                 window.location.href="busqueda.html" </script>';
            }

        }


        function modificarTipoObra($tipoObra, $codigoObra, $cedulaRegistrante){


        
            $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
            mysqli_select_db($link,$this->basedato);
            $modificar= "UPDATE obra SET tipoObra = '$tipoObra' WHERE codigo = '$codigoObra' ";
            $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
            echo '<script> alert ("Modificacion exitosa"); 
                 window.location.href="modificacion.html" </script>';

            mysqli_close($link);
           

        }
        function modificarFechaInicio( $fechaInicio, $codigoObra, $cedulaRegistrante){


        
            $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
            mysqli_select_db($link,$this->basedato);
            $modificar= "UPDATE obra SET fechaInicio = '$fechaInicio' WHERE codigo = '$codigoObra' ";
            $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
            echo '<script> alert ("Modificacion exitosa"); 
                 window.location.href="modificacion.html" </script>';

            mysqli_close($link);
           

        }
        function modificarFinal( $fechaFinal, $codigoObra, $cedulaRegistrante){


        
            $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
            mysqli_select_db($link,$this->basedato);
            $modificar= "UPDATE obra SET fechaFinal = '$fechaFinal' WHERE codigo = '$codigoObra' ";
            $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
            echo '<script> alert ("Modificacion exitosa"); 
                 window.location.href="modificacion.html" </script>';

            mysqli_close($link);
           

        }
        function estado( $estado, $codigoObra,$cedulaRegistrante){


        
            $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
            mysqli_select_db($link,$this->basedato);
            $modificar= "UPDATE obra SET estado = '$estado' WHERE codigo = '$codigoObra' ";
            $result= mysqli_query($link, $modificar) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());;
            echo '<script> alert ("Modificacion exitosa"); 
                 window.location.href="modificacion.html" </script>';

            mysqli_close($link);
           

        }

        
    
   
   
}   
?>