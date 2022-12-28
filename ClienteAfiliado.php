<?php
Class ClienteAfiliado{
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

    function anexarAfiliado($cedula,$nombre, $apellido,  $codigoNacionalidad ,$nacionalidad,   $ciudadNacimiento,    $fechaNacimiento, $codigoSangre, $tipoSangre,    $telefonoFijo,  $telefonoCelular, 
    $direccionDomicilio,    $barrio,    $ciudad,    $correo,   $codigoEstadoCivil, $estadoCivil,    $profecion,   $numeroHijo,
    $ragoEdad1, $ragoEdad2, $ragoEdad3, $ragoEdad4,  $adultoCuidado,       $personasViven, $codigoVivienda,  $tipoVivienda, $codigoEstadoVivienda, $tipoEstadoVivienda, $codigoGenero, $genero,  
    $codigoGrupoEspecial, $pertenece,  $intereses, $codigoEstado,$estado,$usuariop, $contrasenap ){
        
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);
        $consultaNacionalidad= "SELECT * FROM nacionalidad WHERE codigoNacionalidad='$codigoNacionalidad' ";
        $resultNacionalidad= mysqli_query($link, $consultaNacionalidad);
        $rowN = mysqli_fetch_array($resultNacionalidad, MYSQLI_NUM);
        if($rowN ==null ){
            $grabar_cliente="INSERT INTO nacionalidad (codigoNacionalidad, pais) VALUES ('$codigoNacionalidad','$nacionalidad')";
            $guardar_usuario=mysqli_query($link,$grabar_cliente) or die ('La insercion a la base de datos fallo1'. mysqli_connect_error());
        }
        $consultaEstadoCivil= "SELECT * FROM estadocivil WHERE codigoEstadoCivil='$codigoEstadoCivil' ";
        $resultEstadoCivil= mysqli_query($link, $consultaEstadoCivil);
        $rowEC = mysqli_fetch_array($resultEstadoCivil, MYSQLI_NUM);
        if($rowEC ==null ){
            $grabar_cliente="INSERT INTO estadocivil (codigoEstadoCivil, estado) VALUES ('$codigoEstadoCivil','$estadoCivil')";
            $guardar_usuario=mysqli_query($link,$grabar_cliente) or die ('La insercion a la base de datos fallo2'. mysqli_connect_error());
        }

        $consultaSangre= "SELECT * FROM tiposangre WHERE codigoSangre='$codigoSangre' ";
        $resultSangre= mysqli_query($link, $consultaSangre);
        $rowS = mysqli_fetch_array($resultSangre, MYSQLI_NUM);
        if($rowS ==null ){
            $grabar_cliente="INSERT INTO tiposangre (codigoSangre, tipo) VALUES ('$codigoSangre','$tipoSangre')";
            $guardar_usuario=mysqli_query($link,$grabar_cliente) or die ('La insercion a la base de datos fallo2'. mysqli_connect_error());
        }

        $consultaVivienda= "SELECT * FROM tipovivienda WHERE codigoVivienda='$codigoVivienda' ";
        $resultVivienda= mysqli_query($link, $consultaVivienda);
        $rowV = mysqli_fetch_array($resultVivienda, MYSQLI_NUM);

        if($rowV ==null ){
            $grabar_cliente="INSERT INTO tipovivienda (codigoVivienda, tipo) VALUES ('$codigoVivienda','$tipoVivienda')";
            $guardar_usuario=mysqli_query($link,$grabar_cliente) or die ('La insercion a la base de datos fallo3'. mysqli_connect_error());
        }
        
        
        $consultaEstadoVivienda= "SELECT * FROM estadovivienda WHERE codigoEstadoVivienda='$codigoEstadoVivienda'";
        $resultEstadoVivienda= mysqli_query($link, $consultaEstadoVivienda);
        $rowTV = mysqli_fetch_array($resultEstadoVivienda, MYSQLI_NUM);
       
        if($rowTV==null ){
            $grabar_cliente="INSERT INTO estadovivienda (codigoEstadoVivienda, tipo) VALUES ('$codigoEstadoVivienda','$tipoEstadoVivienda')";
            $guardar_usuario=mysqli_query($link,$grabar_cliente) or die ('La insercion a la base de datos fallo4'. mysqli_connect_error());
        }

        $consultaGenero= "SELECT * FROM tipogenero WHERE codigoGenero='$codigoGenero' ";
        $resultGenero= mysqli_query($link, $consultaGenero);
        $rowG = mysqli_fetch_array($resultGenero, MYSQLI_NUM);
        if($rowG ==null ){
            $grabar_cliente="INSERT INTO tipogenero (codigoGenero, genero) VALUES ('$codigoGenero','$genero')";
            $guardar_usuario=mysqli_query($link,$grabar_cliente) or die ('La insercion a la base de datos fallo5'. mysqli_connect_error());
        }

        $consultaGenero= "SELECT * FROM grupoespecial WHERE codigoGrupoEspecial='$codigoGrupoEspecial' ";
        $resultGenero= mysqli_query($link, $consultaGenero);
        $rowGE = mysqli_fetch_array($resultGenero, MYSQLI_NUM);
        if($rowGE ==null ){
            $grabar_cliente="INSERT INTO grupoespecial (codigoGrupoEspecial, pertenece) VALUES ('$codigoGrupoEspecial','$pertenece')";
            $guardar_usuario=mysqli_query($link,$grabar_cliente) or die ('La insercion a la base de datos fallo6'. mysqli_connect_error());
        }

        $consultaEstado= "SELECT * FROM estado  WHERE codigoEstado='$codigoEstado' ";
        $resultEstado= mysqli_query($link, $consultaEstado);
        $rowE = mysqli_fetch_array($resultEstado);
        if($rowE ==null ){
            $grabar_cliente="INSERT INTO estado (codigoEstado, tipo) VALUES ('$codigoEstado','$estado')";
            $guardar_usuario=mysqli_query($link,$grabar_cliente) or die ('La insercion a la base de datos fallo7'. mysqli_connect_error());
        }

        

        $consultaGenero= "SELECT * FROM domicilio  WHERE cedula='$cedula' ";
        $resultGenero= mysqli_query($link, $consultaGenero);
        $row = mysqli_fetch_array($resultGenero, MYSQLI_NUM);

       
        if($row !=null ){
            echo '<script> alert ("El afiliado ya se encuentra en la base de datos"); 
            window.location.href="registro.html" </script>';
        }else{
            $codigoLogin=0;
            echo $usuariop;
            $grabar_cliente="INSERT INTO loginn (usuario, contrasena) VALUES ('$usuariop','$contrasenap')";
            $guardar_usuario=mysqli_query($link,$grabar_cliente) or die ('La insercion a la base de datos fallo8'. mysqli_connect_error());
            

            $consulta  = "SELECT codigoLogin FROM  loginn  WHERE usuario='$usuariop' ";
            $result = mysqli_query($link,$consulta);
             if ($row = mysqli_fetch_array($result)) {
           
                  echo "<tr>";
                     // recorre el vector e imprime los campos definidos en la clase
                  do { 
                  $codigoLogin= $row[0];
                 } while ($row = mysqli_fetch_array($result)); 
                

               $fechaRegistro=date("Y-m-d") ;
              

                

                $grabar_cliente="INSERT INTO domicilio (cedula, direccionDomicilio, barrio, ciuddad, telefonoFijo, personasViven, codigoVivienda, codigoEstadoVivienda   )
                VALUES ('$cedula','$direccionDomicilio', '$barrio', '$ciudad', '$telefonoFijo', '$personasViven', '$codigoVivienda', '$codigoEstadoVivienda')";
                $guardar_usuario=mysqli_query($link,$grabar_cliente) or die ('La insercion a la base de datos fallo9'. mysqli_connect_error());
    
                $grabar_cliente="INSERT INTO parientes (cedula, adultosCuidado, numeroHijos, rangoEdad1, rangoEdad2, rangoEdad3, rangoEdad4) 
                 VALUES ('$cedula','$adultoCuidado','$numeroHijo','$ragoEdad1','$ragoEdad2', '$ragoEdad3','$ragoEdad4')";
                $guardar_usuario=mysqli_query($link,$grabar_cliente) or die ('La insercion a la base de datos fallo10'. mysqli_connect_error());
                 

                 $grabar_cliente2="INSERT INTO afiliado (cedula, nombre, apellido, codigoNacionalidad, ciudadNacimiento, fechaNacimiento, codigoSangre, telefonoCelular, correo, codigoEstadoCivil, profecion, codigoGenero, codigoGrupoEspecial, intereses, codigoEstado, codigoLogin, fechaRegistro ) 
                  VALUES ('$cedula','$nombre','$apellido','$codigoNacionalidad','$ciudadNacimiento', '$fechaNacimiento','$codigoSangre', '$telefonoCelular', '$correo', '$codigoEstadoCivil','$profecion', '$codigoGenero', '$codigoGrupoEspecial','$intereses','$codigoEstado','$codigoLogin','$fechaRegistro')";
                  $guardar_usuario2=mysqli_query($link,$grabar_cliente2) or die ('La insercion a la base de datos fallo11'. mysqli_connect_error());
                 
                  $consulta  = "SELECT codigoAfiliado   FROM afiliado  WHERE cedula  = '$cedula' " ;
                  $result = mysqli_query($link,$consulta);
                  if ($row = mysqli_fetch_array($result)) {
  
                      do{
                          $newCodigoAfiliado= $row[0];
                          
  
                   } while( $row = mysqli_fetch_array($result));
                   
                   $consulta  = "SELECT codigoLogin FROM afiliado  WHERE  codigoAfiliado = '$codigoAfiliado'" ;
                   $result = mysqli_query($link,$consulta);
                    if ($row = mysqli_fetch_array($result)) {
       
                   do { 
                       $codigoLogin= $row[0];
                   } while ($row = mysqli_fetch_array($result)); 
                    }
       
                  $consulta  = "SELECT * FROM loginn WHERE codigoLogin='$codigoLogin'  " ;
                  $result = mysqli_query($link,$consulta);
                     if ($row = mysqli_fetch_array($result)) {
               
                     // recorre el vector e imprime los campos definidos en la clase
                                do { 
                                     $newUsuario=$row["1"];
                                     $newContrasena= $row["2"]; 
                                  } while ($row = mysqli_fetch_array($result)); 
                      }

                   echo '<script> alert ("El codigo del afiliado es: '.$newCodigoAfiliado.' Por favor no lo olvide. \n Su usuario es: '.$newUsuario.' \n Su contraseña es: '.$newContrasena.' ");
                          window.location.href="exito.html" </script>';
                   
                   mysqli_close($link);
  
                  }
            }

         
        }

       
       

    }

    
    function consultarAfiliadoUsu($año){        
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);

        $consulta= "SELECT * FROM afiliado  WHERE  YEAR (fechaRegistro) = $año ORDER BY fechaRegistro ASC";
        $result= mysqli_query($link, $consulta);
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        
       
        if($row !=null ){
            echo "<table border='1'>";
            ?>
             <table border="1" >

                 <tr>
                   
                    
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nombre </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Apellido </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Ciudad de Nacimiento </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Profesion</td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Intereses</td>
            
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de registro </td>
                 </tr>

            <?php 
            $consulta  = "SELECT * FROM afiliado  WHERE  YEAR (fechaRegistro) = $año ORDER BY fechaRegistro ASC" ;
            $result = mysqli_query($link,$consulta);
             if ($row = mysqli_fetch_array($result)) {
           
                        echo "<tr>";
                         // recorre el vector e imprime los campos definidos en la clase
                              do { 
                         echo "<tr><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[6]."</td><td>".$row[11]."</td><td>".$row[14]."</td><td>".$row[17].
                        "</td></tr> \n"; 
                              } while ($row = mysqli_fetch_array($result)); 
                              echo "</tr>";
             } else { 
                                echo "¡ No se ha encontrado ningún registro !";
                                   }   
                           echo "\n";
               ?>
               </table>
               <?php 
             
        }else{
            echo '<script> alert ("Fecha no encontrada"); 
             window.location.href="consulta.html" </script>';
        }

    }


    function consultarAfiliadoAdm($año){        
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);

        $consulta= "SELECT * FROM afiliado  WHERE  YEAR (fechaRegistro) = $año ORDER BY fechaRegistro ASC";
        $result= mysqli_query($link, $consulta);
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        
       
        if($row !=null ){
            echo "<table border='1'>";
            ?>
             <table border="1" >

                 <tr>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Afiliado </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Numero de cedula </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nombre </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Apellido </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Codigo de Nacionalidad </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Ciudad de Nacimiento </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha Nacimiento </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo Sangre </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Telefono Celular </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Correo </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de Estado Civil </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Profesion</td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Codigo de Genero </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" >Codigo de Grupo Especial </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Intereses</td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de Estado </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo Login</td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de registro </td>
                 </tr>

            <?php 
            $consulta  = "SELECT * FROM afiliado  WHERE  YEAR (fechaRegistro) = $año ORDER BY fechaRegistro ASC" ;
            $result = mysqli_query($link,$consulta);
             if ($row = mysqli_fetch_array($result)) {
           
                        echo "<tr>";
                         // recorre el vector e imprime los campos definidos en la clase
                              do { 
                         echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6].
                        "</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td><td>".$row[10]."</td><td>".$row[11]."</td><td>".$row[12]."</td><td>".$row[13].
                                "</td><td>".$row[14]."</td><td>".$row[15]."</td><td>".$row[16]."</td><td>".$row[17]."</td></tr> \n"; 
                              } while ($row = mysqli_fetch_array($result)); 
                              echo "</tr>";
             } else { 
                                echo "¡ No se ha encontrado ningún registro !";
                                   }   
                           echo "\n";
               ?>
               </table>
               <?php 


               ?>

               <table border="1" >
               <tr> 
               <td style=" background-color:rgba(243,255,0); font-weight: bold; margint-left: 30px" > Tabla Nacionalidad  </td>
               </tr>
  
  
                <tr>
                   <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de Nacionalidad </td>
                   <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Pais</td>
                  
                </tr>
  
                <?php 
                $consulta  = "SELECT * FROM nacionalidad  " ;
                $result = mysqli_query($link,$consulta);
                   if ($row = mysqli_fetch_array($result)) {
             
                    echo "<tr>";
                   // recorre el vector e imprime los campos definidos en la clase
                              do { 
                                   echo "<tr><td>".$row["codigoNacionalidad"]."</td><td>".$row["pais"]."</td></tr>". " \n"; 
                                } while ($row = mysqli_fetch_array($result)); 
                    }
                     echo "</tr>";
                     ?>


                     <tr> 
                     <td style=" background-color:rgba(243,255,0); font-weight: bold; margint-left: 30px" > Tabla de Estado Civil  </td>
                     </tr>
        
        
                      <tr>
                         <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de estado civil </td>
                         <td style=" background-color:rgba(243,255,0); font-weight: bold;" > estado</td>
                        
                      </tr>
                      <?php 
                   
                           $consulta  = "SELECT * FROM estadocivil  " ;
                            $result = mysqli_query($link,$consulta);
                             if ($row = mysqli_fetch_array($result)) {
             
                            echo "<tr>";
                               // recorre el vector e imprime los campos definidos en la clase
                               do { 
                               echo "<tr><td>".$row["0"]."</td><td>".$row["1"]."</td></tr>". " \n"; 
                             } while ($row = mysqli_fetch_array($result)); 
                            }
                             echo "</tr>";
                             ?>

                             <tr> 
                             <td style=" background-color:rgba(243,255,0); font-weight: bold; margint-left: 30px" > Tabla Tipo de Sangre  </td>
                             </tr>
                
                
                              <tr>
                                 <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de sagre </td>
                                 <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Tipo</td>
                                
                              </tr>
                              <?php 
        
                                   $consulta  = "SELECT * FROM tiposangre  " ;
                                    $result = mysqli_query($link,$consulta);
                                     if ($row = mysqli_fetch_array($result)) {
                     
                                    echo "<tr>";
                                       // recorre el vector e imprime los campos definidos en la clase
                                       do { 
                                       echo "<tr><td>".$row["0"]."</td><td>".$row["1"]."</td></tr>". " \n"; 
                                     } while ($row = mysqli_fetch_array($result)); 
                                    }
                                     echo "</tr>";
                                     ?>

                             <tr> 
                             <td style=" background-color:rgba(243,255,0); font-weight: bold; margint-left: 30px" > Tabla de genero  </td>
                             </tr>
                
                
                              <tr>
                                 <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de Genero </td>
                                 <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Genero</td>
                                
                              </tr>
                              <?php 
        
                                   $consulta  = "SELECT * FROM tipogenero  " ;
                                    $result = mysqli_query($link,$consulta);
                                     if ($row = mysqli_fetch_array($result)) {
                     
                                    echo "<tr>";
                                       // recorre el vector e imprime los campos definidos en la clase
                                       do { 
                                       echo "<tr><td>".$row["0"]."</td><td>".$row["1"]."</td></tr>". " \n"; 
                                     } while ($row = mysqli_fetch_array($result)); 
                                    }
                                     echo "</tr>";
                                     ?>

                             <tr> 
                             <td style=" background-color:rgba(243,255,0); font-weight: bold; margint-left: 30px" > Tabla de grupo especial  </td>
                             </tr>
                
                
                              <tr>
                                 <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de grupo especial </td>
                                 <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Pertenece </td>
                                
                              </tr>
                              <?php 
        
                                   $consulta  = "SELECT * FROM grupoespecial  " ;
                                    $result = mysqli_query($link,$consulta);
                                     if ($row = mysqli_fetch_array($result)) {
                     
                                    echo "<tr>";
                                       // recorre el vector e imprime los campos definidos en la clase
                                       do { 
                                       echo "<tr><td>".$row["0"]."</td><td>".$row["1"]."</td></tr>". " \n"; 
                                     } while ($row = mysqli_fetch_array($result)); 
                                     }
                                     echo "</tr>";
                                     ?>

                             <tr> 
                             <td style=" background-color:rgba(243,255,0); font-weight: bold; margint-left: 30px" > Tabla de estado  </td>
                             </tr>
                
                
                              <tr>
                                 <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de estado </td>
                                 <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Tipo </td>
                                
                              </tr>
                              <?php 
        
                                   $consulta  = "SELECT * FROM estado  " ;
                                    $result = mysqli_query($link,$consulta);
                                     if ($row = mysqli_fetch_array($result)) {
                     
                                    echo "<tr>";
                                       // recorre el vector e imprime los campos definidos en la clase
                                       do { 
                                       echo "<tr><td>".$row["0"]."</td><td>".$row["1"]."</td></tr>". " \n"; 
                                         } while ($row = mysqli_fetch_array($result)); 
                                    }
                                     echo "</tr>";
                                    
                    


               
         ?> 
          </table>
          <button type="button" class="btn btn-light" margin-left: 20px;> <a href="consulta.html" id="a">Consulta</a> </button>​
          <button type="button" class="btn btn-light"> <a href="ingreso.html" id="a">Inicio</a> </button>​
         <?php 
             
        }else{
            echo '<script> alert ("Fecha no encontrada"); 
             window.location.href="consulta.html" </script>';
        }

    }


    function buscarCodigoAfiliado( $codigoAfiliado){


        
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);
        $consulta= "SELECT * FROM afiliado  WHERE  codigoAfiliado = '$codigoAfiliado'";
        $result= mysqli_query($link, $consulta);
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        
        if($row !=null ){
            echo "<table border='1'>";
            ?>
           
             <table border="1" >

                 <tr>
                 <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Afiliado </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Numero de cedula </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nombre </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Apellido </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Codigo de Nacionalidad </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Ciudad de Nacimiento </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha Nacimiento </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo Sangre </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Telefono Celular </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Correo </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de Estado Civil </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Profesion</td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Codigo de Genero </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" >Codigo de Grupo Especial </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Intereses</td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de Estado </td>

                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de registro </td>
                 </tr>

            <?php 
            
            $consulta  = "SELECT * FROM afiliado  WHERE  codigoAfiliado = '$codigoAfiliado'" ;
            $result = mysqli_query($link,$consulta);
             if ($row = mysqli_fetch_array($result)) {
           
           echo "<tr>";
          // recorre el vector e imprime los campos definidos en la clase
            do { 
              echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6].
             "</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td><td>".$row[10]."</td><td>".$row[11]."</td><td>".$row[12]."</td><td>".$row[13].
             "</td><td>".$row[14]."</td><td>".$row[15]."</td><td>".$row[17]."</td></tr> \n"; 
            } while ($row = mysqli_fetch_array($result)); 
           echo "</tr>";
           ?>
           </table>
           <button type="button" class="btn btn-light" margin-left: 20px;> <a href="busqueda.html" id="a">Buscar</a> </button>​
          <button type="button" class="btn btn-light"> <a href="ingreso.html" id="a">Inicio</a> </button>
           <?php 
 
 
          
             
 
           


            } else { 
              echo "¡ No se ha encontrado ningún registro !";
                 } 
         ?> 
          </table>
          ​
         <?php 
        }else{
           
            echo '<script> alert ("Codigo de afiliado no encontrado"); 
             window.location.href="busqueda.html" </script>';
        }

    }


    function buscarCedulaAfiliado( $cedula){


        
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);
        $consulta= "SELECT * FROM afiliado  WHERE  cedula = '$cedula'";
        $result= mysqli_query($link, $consulta);
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        
        if($row !=null ){
            echo "<table border='1'>";
            ?>
           
             <table border="1" >

                 <tr>
                 <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Afiliado </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Numero de cedula </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nombre </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Apellido </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Codigo de Nacionalidad </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Ciudad de Nacimiento </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha Nacimiento </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo Sangre </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Telefono Celular </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Correo </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de Estado Civil </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Profesion</td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Codigo de Genero </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" >Codigo de Grupo Especial </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Intereses</td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de Estado </td>

                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de registro </td>
                 </tr>

            <?php 
           $consulta  = "SELECT * FROM afiliado  WHERE  cedula = '$cedula'" ;
           $result = mysqli_query($link,$consulta);
            if ($row = mysqli_fetch_array($result)) {
          
          echo "<tr>";
         // recorre el vector e imprime los campos definidos en la clase
           do { 
             echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6].
            "</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td><td>".$row[10]."</td><td>".$row[11]."</td><td>".$row[12]."</td><td>".$row[13].
            "</td><td>".$row[14]."</td><td>".$row[15]."</td><td>".$row[17]."</td></tr> \n"; 
           } while ($row = mysqli_fetch_array($result)); 
          echo "</tr>";
          ?>
          </table>
          <button type="button" class="btn btn-light" margin-left: 20px;> <a href="busqueda.html" id="a">Buscar</a> </button>​
          <button type="button" class="btn btn-light"> <a href="ingreso.html" id="a">Inicio</a> </button>
          <?php 



           } else { 
             echo "¡ No se ha encontrado ningún registro !";
                } 
         ?> 
          </table>
          ​
         <?php 
        }else{
           
            echo '<script> alert ("Codigo de afiliado no encontrado"); 
             window.location.href="busqueda.html" </script>';
        }

    }

    function buscarApellidoAfiliado( $apellidoAfiliado){


        
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);
        $consulta= "SELECT * FROM afiliado  WHERE  apellido = '$apellidoAfiliado'";
        $result= mysqli_query($link, $consulta);
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        
        if($row !=null ){
            echo "<table border='1'>";
            ?>
           
             <table border="1" >

                 <tr>
                 <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Afiliado </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Numero de cedula </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nombre </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Apellido </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Codigo de Nacionalidad </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Ciudad de Nacimiento </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha Nacimiento </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo Sangre </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Telefono Celular </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Correo </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de Estado Civil </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Profesion</td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Codigo de Genero </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" >Codigo de Grupo Especial </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Intereses</td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de Estado </td>

                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de registro </td>
                 </tr>

            <?php 
             $consulta  = "SELECT * FROM afiliado  WHERE  apellido = '$apellidoAfiliado'" ;
             $result = mysqli_query($link,$consulta);
              if ($row = mysqli_fetch_array($result)) {
            
            echo "<tr>";
           // recorre el vector e imprime los campos definidos en la clase
             do { 
               echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6].
              "</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td><td>".$row[10]."</td><td>".$row[11]."</td><td>".$row[12]."</td><td>".$row[13].
              "</td><td>".$row[14]."</td><td>".$row[15]."</td><td>".$row[17]."</td></tr> \n"; 
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
           
            echo '<script> alert ("Apellido del afiliado no encontrado"); 
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
            

                  $consulta  ="SELECT * FROM afiliado  WHERE  codigoLogin = '$codigoLogin'";
                   $result = mysqli_query($link,$consulta);
                    if ($row = mysqli_fetch_array($result)) {
                        echo "<table border='1'>";
                        ?>
           
                  <table border="1" >

                 <tr>
                 <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Afiliado </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Numero de cedula </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nombre </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Apellido </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Codigo de Nacionalidad </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Ciudad de Nacimiento </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha Nacimiento </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo Sangre </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Telefono Celular </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Correo </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de Estado Civil </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Profesion</td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Codigo de Genero </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" >Codigo de Grupo Especial </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Intereses</td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de Estado </td>

                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de registro </td>
                 </tr>

            <?php 
            
                    echo "<tr>";
           
                 do { 
                         echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6].
                        "</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td><td>".$row[10]."</td><td>".$row[11]."</td><td>".$row[12]."</td><td>".$row[13].
                          "</td><td>".$row[14]."</td><td>".$row[15]."</td><td>".$row[17]."</td></tr> \n"; 
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
           
            echo '<script> alert ("Usuaro de afiliado no encontrado"); 
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
            

                  $consulta  ="SELECT * FROM afiliado  WHERE  codigoLogin = '$codigoLogin'";
                   $result = mysqli_query($link,$consulta);
                    if ($row = mysqli_fetch_array($result)) {
                        echo "<table border='1'>";
                        ?>
           
                  <table border="1" >

                 <tr>
                 <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Afiliado </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Numero de cedula </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nombre </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Apellido </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Codigo de Nacionalidad </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Ciudad de Nacimiento </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha Nacimiento </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo Sangre </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Telefono Celular </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Correo </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de Estado Civil </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Profesion</td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Codigo de Genero </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" >Codigo de Grupo Especial </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Intereses</td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de Estado </td>

                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de registro </td>
                 </tr>

            <?php 
            
                    echo "<tr>";
           
                 do { 
                         echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6].
                        "</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td><td>".$row[10]."</td><td>".$row[11]."</td><td>".$row[12]."</td><td>".$row[13].
                          "</td><td>".$row[14]."</td><td>".$row[15]."</td><td>".$row[17]."</td></tr> \n"; 
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

    









    function modificarrAfiliado( $codigoAdministrativo, $cedula,$nombre, $apellido,  $codigoNacionalidad ,$nacionalidad,   $ciudadNacimiento,    $fechaNacimiento, $codigoSangre, $tipoSangre,    $telefonoFijo,  $telefonoCelular, 
    $direccionDomicilio,    $barrio,    $ciudad,    $correo,   $codigoEstadoCivil, $estadoCivil,    $profecion,   $numeroHijo,
    $ragoEdad1, $ragoEdad2, $ragoEdad3, $ragoEdad4,  $adultoCuidado,       $personasViven, $codigoVivienda,  $tipoVivienda, $codigoEstadoVivienda, $tipoEstadoVivienda, $codigoGenero, $genero,  
    $codigoEstado,$estadoAfiliado ){
        
       
       
       
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);
        
        $consultaGenero= "SELECT * FROM domicilio  WHERE cedula='$cedula' ";
        $resultGenero= mysqli_query($link, $consultaGenero);
        $row1 = mysqli_fetch_array($resultGenero, MYSQLI_NUM);

       
        if($row1 !=null ){
           

                $modificarD="UPDATE  domicilio SET  direccionDomicilio = '$direccionDomicilio', barrio= '$barrio', ciuddad='$ciudad', telefonoFijo='$telefonoFijo',
                 personasViven='$personasViven', codigoVivienda='$codigoVivienda', codigoEstadoVivienda='$codigoEstadoVivienda'  WHERE cedula='$cedula'";
                $resultMD=mysqli_query($link,$modificarD) or die ('La insercion a la base de datos fallo1'. mysqli_connect_error());
    
                $modificarP="UPDATE parientes SET  adultosCuidado='$adultoCuidado', numeroHijos='$numeroHijo', rangoEdad1='$ragoEdad1', rangoEdad2='$ragoEdad2', 
                rangoEdad3='$ragoEdad3', rangoEdad4='$ragoEdad4' WHERE cedula='$cedula' ";
                $resultMP=mysqli_query($link,$modificarP) or die ('La insercion a la base de datos fallo2'. mysqli_connect_error());


                 $modificarA="UPDATE afiliado SET nombre='$nombre', apellido='$apellido', codigoNacionalidad='$codigoNacionalidad ', ciudadNacimiento='$ciudadNacimiento',
                  fechaNacimiento='$fechaNacimiento', codigoSangre='$codigoSangre', telefonoCelular='$telefonoCelular', correo='$correo', codigoEstadoCivil='$codigoEstadoCivil',
                   profecion='$profecion', codigoGenero='$codigoGenero', codigoEstado='$codigoEstado' WHERE cedula='$cedula'";
                  $resultMA=mysqli_query($link,$modificarA) or die ('La insercion a la base de datos fallo3'. mysqli_connect_error());
                  mysqli_close($link);
                  echo '<script> alert ("Modificacion exitosa"); 
                  window.location.href="modificacion.html" </script>';
              
            
        }else{
            
            echo '<script> alert ("El afiliado no se encuentra en la base de datos"); 
            window.location.href="registro.html" </script>';
         
        }

       
       

    }
   
   
}   
?>