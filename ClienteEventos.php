<?php
Class ClienteEventos{
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

    



    function consultarAlquiler($año){        
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);

        

        $consulta= "SELECT * FROM alquiler  WHERE  YEAR (fechaRegistro) = $año AND codigoEstado='801' ORDER BY fechaRegistro ASC";
        $result= mysqli_query($link, $consulta);
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        
       
        if($row !=null ){
            echo "<table border='1'>";
            ?>
             <table border="1" >

                 <tr>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Evento </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Alquiler </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Cedula del responsable </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Tipo de evento </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha del evento </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Horas de Alquiler </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Adjunto Carta de compromiso </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de estado del evento </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de Recursos </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de registro del evento </td>                   
                 </tr>

            <?php 
          $consulta  = "SELECT * FROM alquiler  WHERE  YEAR (fechaRegistro) = $año AND codigoEstado='801'  ORDER BY fechaRegistro ASC" ;
          $result = mysqli_query($link,$consulta);
           if ($row = mysqli_fetch_array($result)) {
         
         echo "<tr>";
        // recorre el vector e imprime los campos definidos en la clase
          do { 
           echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td></tr> \n"; 
          } while ($row = mysqli_fetch_array($result)); 
         echo "</tr>";
          } else { 
            echo "¡ No se ha encontrado ningún registro !";
               }   
         ?> 
          </table>
          <button type="button" class="btn btn-light" margin-left: 20px;> <a href="consultaUsu.html" id="a">Consulta</a> </button>​
          <button type="button" class="btn btn-light"> <a href="ingreso.html" id="a">Inicio</a> </button>​
           <?php 
         }else{
            echo '<script> alert ("Fecha no encontrada"); 
             window.location.href="consulta.html" </script>';
        }

    }

    
    function consultarCurso($año){        
      $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
      mysqli_select_db($link,$this->basedato);

      

      $consulta= "SELECT * FROM curso  WHERE  YEAR (fechaRegistro) = $año AND codigoEstado='801' ORDER BY fechaRegistro ASC";
      $result= mysqli_query($link, $consulta);
      $row = mysqli_fetch_array($result, MYSQLI_NUM);
      
     
      if($row !=null ){
          echo "<table border='1'>";
          ?>
           <table border="1" >

               <tr>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Evento </td>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del curso </td>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nombre del curso </td>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Cantidad de horas del curso </td>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de inicio </td>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de finalización </td>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Dias de clase </td>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > horas de clase </td>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Tipo de curso </td>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Numero de Cedula del docente </td>   
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de estado del curso </td>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del administrativo</td>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > NIT de la Organización </td>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de registro</td>                   
               </tr>

          <?php 
        $consulta  = "SELECT * FROM curso  WHERE  YEAR (fechaRegistro) = $año  AND codigoEstado='801' ORDER BY fechaRegistro ASC" ;
        $result = mysqli_query($link,$consulta);
         if ($row = mysqli_fetch_array($result)) {
       
       echo "<tr>";
      // recorre el vector e imprime los campos definidos en la clase
        do { 
         echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td><td>".$row[10]."</td><td>".$row[11]."</td><td>".$row[12]."</td><td>".$row[13]."</td></tr> \n"; 
        } while ($row = mysqli_fetch_array($result)); 
       echo "</tr>";
        } else { 
          echo "¡ No se ha encontrado ningún registro !";
             }   
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

  function consultarBazar($año){        
    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
    mysqli_select_db($link,$this->basedato);

    

    $consulta= "SELECT * FROM bazar  WHERE  YEAR (fechaRegistro) = $año  AND codigoEstado='801' ORDER BY fechaRegistro ASC";
    $result= mysqli_query($link, $consulta);
    $row = mysqli_fetch_array($result, MYSQLI_NUM);
    
   
    if($row !=null ){
        echo "<table border='1'>";
        ?>
         <table border="1" >

             <tr>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Evento </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del bazar </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del afiliado responsable </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Codigo de estado del evento </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha del evanto </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Hora de inicio </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nora de finalizacion </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Grupos involucrados </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Administrativo</td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del presupuesto </td>   
                                  
             </tr>

        <?php 
      $consulta  = "SELECT * FROM bazar  WHERE  YEAR (fechaRegistro) = $año AND codigoEstado='801' ORDER BY fechaRegistro ASC" ;
      $result = mysqli_query($link,$consulta);
       if ($row = mysqli_fetch_array($result)) {
     
     echo "<tr>";
    // recorre el vector e imprime los campos definidos en la clase
      do { 
       echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td></tr> \n"; 
      } while ($row = mysqli_fetch_array($result)); 
     echo "</tr>";
      } else { 
        echo "¡ No se ha encontrado ningún registro !";
           }   
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

function consultarBrigada($año){        
  $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
  mysqli_select_db($link,$this->basedato);

  

  $consulta= "SELECT * FROM brigada  WHERE  YEAR (fechaRegistro) = $año AND codigoEstado='801' ORDER BY fechaRegistro ASC";
  $result= mysqli_query($link, $consulta);
  $row = mysqli_fetch_array($result, MYSQLI_NUM);
  
 
  if($row !=null ){
      echo "<table border='1'>";
      ?>
       <table border="1" >

           <tr>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Evento </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de la Brigada </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Numero de cedula del responsable </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > NIT de la organización </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Tipo de brigada </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de la Brigada </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Hora de inicio de la brigada </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Hora de finalización de la brigada </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del administrativo</td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del estado del evento </td>   
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de registro </td>   
                                                
           </tr>>

      <?php 
    $consulta  = "SELECT * FROM brigada  WHERE  YEAR (fechaRegistro) = $año AND codigoEstado='801' ORDER BY fechaRegistro ASC" ;
    $result = mysqli_query($link,$consulta);
     if ($row = mysqli_fetch_array($result)) {
   
   echo "<tr>";
  // recorre el vector e imprime los campos definidos en la clase
    do { 
     echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td><td>".$row[10]."</td></tr> \n"; 
    } while ($row = mysqli_fetch_array($result)); 
   echo "</tr>";
    } else { 
      echo "¡ No se ha encontrado ningún registro !";
         }   
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
function consultarCampeonato($año){        
  $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
  mysqli_select_db($link,$this->basedato);

  

  $consulta= "SELECT * FROM campeonato  WHERE  YEAR (fechaRegistro) = $año ORDER BY fechaRegistro ASC";
  $result= mysqli_query($link, $consulta);
  $row = mysqli_fetch_array($result, MYSQLI_NUM);
  
 
  if($row !=null ){
      echo "<table border='1'>";
      ?>
       <table border="1" >

           <tr>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Evento </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del campenato </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Numero de cedula del responsable </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Codigo del estado del evento </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nombre del campeonato </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de participantes </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de inicio </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de finalizacion </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Dias del campeonato</td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Hora del pampeonato </td>   
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del administrativo </td>   
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del presupuesto </td>   
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de registro</td>                                     
           </tr>>

      <?php 
    $consulta  = "SELECT * FROM campeonato  WHERE  YEAR (fechaRegistro) = $año AND codigoEstado='801' ORDER BY fechaRegistro ASC" ;
    $result = mysqli_query($link,$consulta);
     if ($row = mysqli_fetch_array($result)) {
   
   echo "<tr>";
  // recorre el vector e imprime los campos definidos en la clase
    do { 
     echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td><td>".$row[10]."</td><td>".$row[11]."</td><td>".$row[12]."</td></tr> \n"; 
    } while ($row = mysqli_fetch_array($result)); 
   echo "</tr>";
    } else { 
      echo "¡ No se ha encontrado ningún registro !";
         }   
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








function consultarAlquilerAdm($año){        
  $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
  mysqli_select_db($link,$this->basedato);

  

  $consulta= "SELECT * FROM alquiler  WHERE  YEAR (fechaRegistro) = $año ORDER BY fechaRegistro ASC";
  $result= mysqli_query($link, $consulta);
  $row = mysqli_fetch_array($result, MYSQLI_NUM);
  
 
  if($row !=null ){
      echo "<table border='1'>";
      ?>
       <table border="1" >

           <tr>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Evento </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Alquiler </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Cedula del responsable </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Tipo de evento </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha del evento </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Horas de Alquiler </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Adjunto Carta de compromiso </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de estado del evento </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de Recursos </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de registro del evento </td>                   
           </tr>>

      <?php 
    $consulta  = "SELECT * FROM alquiler  WHERE  YEAR (fechaRegistro) = $año ORDER BY fechaRegistro ASC" ;
    $result = mysqli_query($link,$consulta);
     if ($row = mysqli_fetch_array($result)) {
   
   echo "<tr>";
  // recorre el vector e imprime los campos definidos en la clase
    do { 
     echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td></tr> \n"; 
    } while ($row = mysqli_fetch_array($result)); 
   echo "</tr>";
    } else { 
      echo "¡ No se ha encontrado ningún registro !";
         }   
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


function consultarCursoAdm($año){        
$link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
mysqli_select_db($link,$this->basedato);



$consulta= "SELECT * FROM curso  WHERE  YEAR (fechaRegistro) = $año ORDER BY fechaRegistro ASC";
$result= mysqli_query($link, $consulta);
$row = mysqli_fetch_array($result, MYSQLI_NUM);


if($row !=null ){
    echo "<table border='1'>";
    ?>
     <table border="1" >

         <tr>
            <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Evento </td>
            <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del curso </td>
            <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nombre del curso </td>
            <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Cantidad de horas del curso </td>
            <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de inicio </td>
            <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de finalización </td>
            <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Dias de clase </td>
            <td style=" background-color:rgba(243,255,0); font-weight: bold;" > horas de clase </td>
            <td style=" background-color:rgba(243,255,0) font-weight: bold;" > Tipo de curso </td>
            <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Numero de Cedula del docente </td>   
            <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de estado del curso </td>
            <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del administrativo</td>
            <td style=" background-color:rgba(243,255,0); font-weight: bold;" > NIT de la Organización </td>
            <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de registro</td>                   
         </tr>>

    <?php 
  $consulta  = "SELECT * FROM curso  WHERE  YEAR (fechaRegistro) = $año ORDER BY fechaRegistro ASC" ;
  $result = mysqli_query($link,$consulta);
   if ($row = mysqli_fetch_array($result)) {
 
 echo "<tr>";
// recorre el vector e imprime los campos definidos en la clase
  do { 
   echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td><td>".$row[10]."</td><td>".$row[11]."</td><td>".$row[12]."</td><td>".$row[13]."</td></tr> \n"; 
  } while ($row = mysqli_fetch_array($result)); 
 echo "</tr>";
  } else { 
    echo "¡ No se ha encontrado ningún registro !";
       }   
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

function consultarBazarAdm($año){        
$link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
mysqli_select_db($link,$this->basedato);



$consulta= "SELECT * FROM bazar  WHERE  YEAR (fechaRegistro) = $año ORDER BY fechaRegistro ASC";
$result= mysqli_query($link, $consulta);
$row = mysqli_fetch_array($result, MYSQLI_NUM);


if($row !=null ){
  echo "<table border='1'>";
  ?>
   <table border="1" >

       <tr>
          <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Evento </td>
          <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del bazar </td>
          <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del afiliado responsable </td>
          <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Codigo de estado del evento </td>
          <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha del evanto </td>
          <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Hora de inicio </td>
          <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nora de finalizacion </td>
          <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Grupos involucrados </td>
          <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Administrativo</td>
          <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del presupuesto </td>   
                            
       </tr>

  <?php 
$consulta  = "SELECT * FROM bazar  WHERE  YEAR (fechaRegistro) = $año ORDER BY fechaRegistro ASC" ;
$result = mysqli_query($link,$consulta);
 if ($row = mysqli_fetch_array($result)) {

echo "<tr>";
// recorre el vector e imprime los campos definidos en la clase
do { 
 echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td></tr> \n"; 
} while ($row = mysqli_fetch_array($result)); 
echo "</tr>";
} else { 
  echo "¡ No se ha encontrado ningún registro !";
     }   
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

function consultarBrigadaAdm($año){        
$link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
mysqli_select_db($link,$this->basedato);



$consulta= "SELECT * FROM brigada  WHERE  YEAR (fechaRegistro) = $año ORDER BY fechaRegistro ASC";
$result= mysqli_query($link, $consulta);
$row = mysqli_fetch_array($result, MYSQLI_NUM);


if($row !=null ){
echo "<table border='1'>";
?>
 <table border="1" >

     <tr>
        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Evento </td>
        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de la Brigada </td>
        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Numero de cedula del responsable </td>
        <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > NIT de la organización </td>
        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Tipo de brigada </td>
        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de la Brigada </td>
        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Hora de inicio de la brigada </td>
        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Hora de finalización de la brigada </td>
        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del administrativo</td>
        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del estado del evento </td>   
        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de registro </td>   
                                          
     </tr>

<?php 
$consulta  = "SELECT * FROM brigada  WHERE  YEAR (fechaRegistro) = $año ORDER BY fechaRegistro ASC" ;
$result = mysqli_query($link,$consulta);
if ($row = mysqli_fetch_array($result)) {

echo "<tr>";
// recorre el vector e imprime los campos definidos en la clase
do { 
echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td><td>".$row[10]."</td></tr> \n"; 
} while ($row = mysqli_fetch_array($result)); 
echo "</tr>";
} else { 
echo "¡ No se ha encontrado ningún registro !";
   }   
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
function consultarCampeonatoAdm($año){        
$link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
mysqli_select_db($link,$this->basedato);



$consulta= "SELECT * FROM campeonato  WHERE  YEAR (fechaRegistro) = $año ORDER BY fechaRegistro ASC";
$result= mysqli_query($link, $consulta);
$row = mysqli_fetch_array($result, MYSQLI_NUM);


if($row !=null ){
echo "<table border='1'>";
?>
 <table border="1" >

     <tr>
        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Evento </td>
        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del campenato </td>
        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Numero de cedula del responsable </td>
        <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Codigo del estado del evento </td>
        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nombre del campeonato </td>
        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de participantes </td>
        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de inicio </td>
        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de finalizacion </td>
        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Dias del campeonato</td>
        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Hora del pampeonato </td>   
        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del administrativo </td>   
        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del presupuesto </td>   
        <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de registro</td>                                     
     </tr>

<?php 
$consulta  = "SELECT * FROM campeonato  WHERE  YEAR (fechaRegistro) = $año ORDER BY fechaRegistro ASC" ;
$result = mysqli_query($link,$consulta);
if ($row = mysqli_fetch_array($result)) {

echo "<tr>";
// recorre el vector e imprime los campos definidos en la clase
do { 
echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td><td>".$row[10]."</td><td>".$row[11]."</td><td>".$row[12]."</td></tr> \n"; 
} while ($row = mysqli_fetch_array($result)); 
echo "</tr>";
} else { 
echo "¡ No se ha encontrado ningún registro !";
   }   
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
















    function buscarAlquilerCodigo ( $codigoEvento, $codigoAdministrativo  ) {


        
      $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
      mysqli_select_db($link,$this->basedato);
      $consulta= "SELECT * FROM administrativo  WHERE  codigoAdministrativo = '$codigoAdministrativo'";
      $result= mysqli_query($link, $consulta);
      $row = mysqli_fetch_array($result, MYSQLI_NUM);
      
      if($row !=null ){
          echo "<table border='1'>";

          $consulta  = "SELECT * FROM alquiler  WHERE  codigoAlquiler  = '$codigoEvento'" ;
          $result = mysqli_query($link,$consulta);

           if ($row = mysqli_fetch_array($result)) {

          ?>
         
           <table border="1" >

               <tr>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Evento </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Alquiler </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Cedula del responsable </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Tipo de evento </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha del evento </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Horas de Alquiler </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Adjunto Carta de compromiso </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de estado del evento </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de Recursos </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de registro del evento </td> 
               </tr>

          <?php 
          
          
         
          echo "<tr>";
        // recorre el vector e imprime los campos definidos en la clase
          do { 
            echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td></tr> \n"; 
          } while ($row = mysqli_fetch_array($result)); 
         echo "</tr>";
         ?>
         </table>
         <?php 


         ?>

         <table border="1" >
         <tr> 
         <td style=" background-color:rgba(1, 251, 197, 0.774); font-weight: bold; margint-left: 30px" > Tabla Responsable  </td>
         </tr>>


          <tr>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nombre del Responsable </td>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Apellido del Responsable </td>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Numero de Cedula </td>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Direccion </td>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Telefono de Celular </td>
            
          </tr>

          <?php 
           $consulta  = "SELECT cedula FROM alquiler  WHERE  codigoAlquiler  = '$codigoEvento'" ;
           $result = mysqli_query($link,$consulta);
            if ($row = mysqli_fetch_array($result)) {

           do { 
               $cedula= $row[0];
           } while ($row = mysqli_fetch_array($result)); 
            }

          $consulta  = "SELECT * FROM responsable WHERE cedula='$cedula'  " ;
          $result = mysqli_query($link,$consulta);
             if ($row = mysqli_fetch_array($result)) {
       
              echo "<tr>";
             // recorre el vector e imprime los campos definidos en la clase
                        do { 
                             echo "<tr><td>".$row["0"]."</td><td>".$row["1"]."</td><td>".$row["2"]."</td><td>".$row["3"]."</td><td>".$row["4"]."</td></tr>"." \n"; 
                          } while ($row = mysqli_fetch_array($result)); 
              }
               echo "</tr>";

               ?>
         </table>
         <?php 


         ?>

         <table border="1" >
         <tr> 
         <td style=" background-color:rgba(1, 251, 197, 0.774); font-weight: bold; margint-left: 30px" > Tabla Recurso  </td>
         </tr>


          <tr>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de Recurso </td>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Abono </td>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Costo del Alquiler </td>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Deposito </td>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Utileria </td>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Numero de cedula </td>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de registro </td>
            
          </tr>

          <?php 
           $consulta  = "SELECT codigoGestionamiento FROM alquiler  WHERE  codigoAlquiler  = '$codigoEvento'" ;
           $result = mysqli_query($link,$consulta);
            if ($row = mysqli_fetch_array($result)) {

           do { 
               $codigoGestionamiento= $row[0];
           } while ($row = mysqli_fetch_array($result)); 
            }

          $consulta  = "SELECT * FROM recurso WHERE codigoGestionamiento ='$codigoGestionamiento'  " ;
          $result = mysqli_query($link,$consulta);
             if ($row = mysqli_fetch_array($result)) {
       
              echo "<tr>";
             // recorre el vector e imprime los campos definidos en la clase
                        do { 
                             echo "<tr><td>".$row["0"]."</td><td>".$row["1"]."</td><td>".$row["2"]."</td><td>".$row["3"]."</td><td>".$row["4"]."</td><td>".$row["5"]."</td><td>".$row["6"]."</td></tr>"." \n"; 
                          } while ($row = mysqli_fetch_array($result)); 
              }
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


  function buscarAlquilerFecha( $fechaRegistro, $codigoAdministrativo  ) {


        
    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
    mysqli_select_db($link,$this->basedato);
    $consulta= "SELECT * FROM administrativo  WHERE  codigoAdministrativo = '$codigoAdministrativo'";
    $result= mysqli_query($link, $consulta);
    $row = mysqli_fetch_array($result, MYSQLI_NUM);
    
    if($row !=null ){
        echo "<table border='1'>";

        $consulta  = "SELECT * FROM alquiler  WHERE  fechaRegistro  = '$fechaRegistro'" ;
        $result = mysqli_query($link,$consulta);

         if ($row = mysqli_fetch_array($result)) {

        ?>
       
         <table border="1" >

             <tr>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Evento </td>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Alquiler </td>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Cedula del responsable </td>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Tipo de evento </td>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha del evento </td>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Horas de Alquiler </td>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Adjunto Carta de compromiso </td>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de estado del evento </td>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de Recursos </td>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de registro del evento </td> 
             </tr>

        <?php 
        
        
       
        echo "<tr>";
      // recorre el vector e imprime los campos definidos en la clase
        do { 
          echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td></tr> \n"; 
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

    function buscarCursoCodigo ( $codigoEvento, $codigoAdministrativo  ) {


        
      $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
      mysqli_select_db($link,$this->basedato);
      $consulta= "SELECT * FROM administrativo  WHERE  codigoAdministrativo = '$codigoAdministrativo'";
      $result= mysqli_query($link, $consulta);
      $row = mysqli_fetch_array($result, MYSQLI_NUM);
      
      if($row !=null ){
          echo "<table border='1'>";

          $consulta  = "SELECT * FROM curso  WHERE  codigoCurso  = '$codigoEvento'" ;
          $result = mysqli_query($link,$consulta);

           if ($row = mysqli_fetch_array($result)) {

          ?>
         
           <table border="1" >

               <tr>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Evento </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Alquiler </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Cedula del responsable </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Tipo de evento </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha del evento </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Horas de Alquiler </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Adjunto Carta de compromiso </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de estado del evento </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de Recursos </td>
                    <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de registro del evento </td> 
               </tr>

          <?php 
          
          
         
          echo "<tr>";
        // recorre el vector e imprime los campos definidos en la clase
          do { 
            echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td></tr> \n"; 
          } while ($row = mysqli_fetch_array($result)); 
         echo "</tr>";
         ?>
         </table>
         <?php 


         ?>

         <table border="1" >
         <tr> 
         <td style=" background-color:rgba(243,255,0); font-weight: bold; margint-left: 30px" > Tabla Presupuesto  </td>
         </tr>


          <tr>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Curso</td>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Costo del Curso </td>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Valor de cada clase </td>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Ingreso de la J.A.C </td>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Gasto de la J.A.C </td>
            
          </tr>

          <?php 
         

          $consulta  = "SELECT * FROM presupuesto WHERE codigoCurso ='$codigoEvento'  " ;
          $result = mysqli_query($link,$consulta);
             if ($row = mysqli_fetch_array($result)) {
       
              echo "<tr>";
             // recorre el vector e imprime los campos definidos en la clase
                        do { 
                             echo "<tr><td>".$row["0"]."</td><td>".$row["1"]."</td><td>".$row["2"]."</td><td>".$row["3"]."</td><td>".$row["4"]."</td></tr>"." \n"; 
                          } while ($row = mysqli_fetch_array($result)); 
              }
               echo "</tr>";

               ?>
         </table>
         <?php 


         ?>

         <table border="1" >
         <tr> 
         <td style=" background-color:rgba(243,255,0); font-weight: bold; margint-left: 30px" > Tabla Docente  </td>
         </tr>


          <tr>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nombre</td>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Numero de cedula </td>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Direccion </td>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" >Telefono de celular </td>
            
            
          </tr>

          <?php 
           $consulta  = "SELECT cedula  FROM curso  WHERE  codigoCurso  = '$codigoEvento'" ;
           $result = mysqli_query($link,$consulta);
            if ($row = mysqli_fetch_array($result)) {

           do { 
               $cedula = $row[0];
           } while ($row = mysqli_fetch_array($result)); 
            }

          $consulta  = "SELECT * FROM docente WHERE cedula  ='$cedula '  " ;
          $result = mysqli_query($link,$consulta);
             if ($row = mysqli_fetch_array($result)) {
       
              echo "<tr>";
             // recorre el vector e imprime los campos definidos en la clase
                        do { 
                             echo "<tr><td>".$row["0"]."</td><td>".$row["1"]."</td><td>".$row["2"]."</td><td>".$row["3"]."</td></tr>"." \n"; 
                          } while ($row = mysqli_fetch_array($result)); 
              }
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


  function buscarCursoFecha( $fechaRegistro, $codigoAdministrativo  ) {


        
    $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
    mysqli_select_db($link,$this->basedato);
    $consulta= "SELECT * FROM administrativo  WHERE  codigoAdministrativo = '$codigoAdministrativo'";
    $result= mysqli_query($link, $consulta);
    $row = mysqli_fetch_array($result, MYSQLI_NUM);
    
    if($row !=null ){
        echo "<table border='1'>";

        $consulta  = "SELECT * FROM curso  WHERE  fechaRegistro  = '$fechaRegistro'" ;
        $result = mysqli_query($link,$consulta);

         if ($row = mysqli_fetch_array($result)) {

        ?>
       
         <table border="1" >

             <tr>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Evento </td>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Alquiler </td>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Cedula del responsable </td>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Tipo de evento </td>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha del evento </td>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Horas de Alquiler </td>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Adjunto Carta de compromiso </td>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de estado del evento </td>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de Recursos </td>
                  <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de registro del evento </td> 
             </tr>

        <?php 
        
        
       
        echo "<tr>";
      // recorre el vector e imprime los campos definidos en la clase
        do { 
          echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td></tr> \n"; 
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



function buscarBazarCodigo ( $codigoEvento, $codigoAdministrativo  ) {


        
  $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
  mysqli_select_db($link,$this->basedato);
  $consulta= "SELECT * FROM administrativo  WHERE  codigoAdministrativo = '$codigoAdministrativo'";
  $result= mysqli_query($link, $consulta);
  $row = mysqli_fetch_array($result, MYSQLI_NUM);
  
  if($row !=null ){
      echo "<table border='1'>";

      $consulta  = "SELECT * FROM bazar  WHERE  codigoBazar   = '$codigoEvento'" ;
      $result = mysqli_query($link,$consulta);

       if ($row = mysqli_fetch_array($result)) {

      ?>
     
       <table border="1" >

           <tr>
           <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Evento </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del bazar </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del afiliado responsable </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Codigo de estado del evento </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha del evanto </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Hora de inicio </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nora de finalizacion </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Grupos involucrados </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Administrativo</td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del presupuesto </td>   
           </tr>

      <?php 
      
      
     
      echo "<tr>";
    // recorre el vector e imprime los campos definidos en la clase
      do { 
        echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td></tr> \n"; 
      } while ($row = mysqli_fetch_array($result)); 
     echo "</tr>";
     ?>
         </table>
         <?php 


               ?>
         </table>
         <?php 


         ?>

         <table border="1" >
         <tr> 
         <td style=" background-color:rgba(243,255,0); font-weight: bold; margint-left: 30px" > Tabla Presupuesto del Bazar  </td>
         </tr>


          <tr>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de Presupuesto </td>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Dinero Gastado </td>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Dinero Recaudado </td>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de registrto </td>
             
            
          </tr>

          <?php 
           $consulta  = "SELECT codigoPresupuesto  FROM bazar  WHERE  codigoBazar   = '$codigoEvento'" ;
           $result = mysqli_query($link,$consulta);
            if ($row = mysqli_fetch_array($result)) {

           do { 
               $codigoPresupuesto = $row[0];
           } while ($row = mysqli_fetch_array($result)); 
            }

          $consulta  = "SELECT * FROM presupuestobazar WHERE codigoPresupuesto  ='$codigoPresupuesto '  " ;
          $result = mysqli_query($link,$consulta);
             if ($row = mysqli_fetch_array($result)) {
       
              echo "<tr>";
             // recorre el vector e imprime los campos definidos en la clase
                        do { 
                             echo "<tr><td>".$row["0"]."</td><td>".$row["1"]."</td><td>".$row["2"]."</td><td>".$row["3"]."</td></tr>"." \n"; 
                          } while ($row = mysqli_fetch_array($result)); 
              }
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


function buscarBazarFecha( $fechaRegistro, $codigoAdministrativo  ) {
    
$link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
mysqli_select_db($link,$this->basedato);
$consulta= "SELECT * FROM administrativo  WHERE  codigoAdministrativo = '$codigoAdministrativo'";
$result= mysqli_query($link, $consulta);
$row = mysqli_fetch_array($result, MYSQLI_NUM);

if($row !=null ){
    echo "<table border='1'>";

    $consulta  = "SELECT * FROM bazar  WHERE  fechaRegistro  = '$fechaRegistro'" ;
    $result = mysqli_query($link,$consulta);

     if ($row = mysqli_fetch_array($result)) {

    ?>
   
     <table border="1" >

         <tr>
         <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Evento </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del bazar </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del afiliado responsable </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Codigo de estado del evento </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha del evanto </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Hora de inicio </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nora de finalizacion </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Grupos involucrados </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Administrativo</td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del presupuesto </td>   
         </tr>

    <?php 
    
    
   
    echo "<tr>";
  // recorre el vector e imprime los campos definidos en la clase
    do { 
      echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td></tr> \n"; 
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

    

function buscarBrigadaCodigo ( $codigoEvento, $codigoAdministrativo  ) {


        
  $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
  mysqli_select_db($link,$this->basedato);
  $consulta= "SELECT * FROM administrativo  WHERE  codigoAdministrativo = '$codigoAdministrativo'";
  $result= mysqli_query($link, $consulta);
  $row = mysqli_fetch_array($result, MYSQLI_NUM);
  
  if($row !=null ){
      echo "<table border='1'>";

      $consulta  = "SELECT * FROM brigada  WHERE  codigoBrigada   = '$codigoEvento'" ;
      $result = mysqli_query($link,$consulta);

       if ($row = mysqli_fetch_array($result)) {

      ?>
     
       <table border="1" >

           <tr>
           <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Evento </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del bazar </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del afiliado responsable </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Codigo de estado del evento </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha del evanto </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Hora de inicio </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nora de finalizacion </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Grupos involucrados </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Administrativo</td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del presupuesto </td>   
           </tr>

      <?php 
      
      
     
      echo "<tr>";
    // recorre el vector e imprime los campos definidos en la clase
      do { 
        echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td></tr> \n"; 
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


function buscarBrigadaFecha( $fechaRegistro, $codigoAdministrativo  ) {
    
$link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
mysqli_select_db($link,$this->basedato);
$consulta= "SELECT * FROM administrativo  WHERE  codigoAdministrativo = '$codigoAdministrativo'";
$result= mysqli_query($link, $consulta);
$row = mysqli_fetch_array($result, MYSQLI_NUM);

if($row !=null ){
    echo "<table border='1'>";

    $consulta  = "SELECT * FROM brigada  WHERE  fechaRegistro  = '$fechaRegistro'" ;
    $result = mysqli_query($link,$consulta);

     if ($row = mysqli_fetch_array($result)) {

    ?>
   
     <table border="1" >

         <tr>
         <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Evento </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del bazar </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del afiliado responsable </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Codigo de estado del evento </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha del evanto </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Hora de inicio </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nora de finalizacion </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Grupos involucrados </td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Administrativo</td>
                <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del presupuesto </td>   
         </tr>

    <?php 
    
    
   
    echo "<tr>";
  // recorre el vector e imprime los campos definidos en la clase
    do { 
      echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td></tr> \n"; 
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



function buscarCampeonatoCodigo ( $codigoEvento, $codigoAdministrativo  ) {


        
  $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
  mysqli_select_db($link,$this->basedato);
  $consulta= "SELECT * FROM administrativo  WHERE  codigoAdministrativo = '$codigoAdministrativo'";
  $result= mysqli_query($link, $consulta);
  $row = mysqli_fetch_array($result, MYSQLI_NUM);
  
  if($row !=null ){
      echo "<table border='1'>";

      $consulta  = "SELECT * FROM campeonato  WHERE  codigoCampeonato   = '$codigoEvento'" ;
      $result = mysqli_query($link,$consulta);

       if ($row = mysqli_fetch_array($result)) {

      ?>
     
       <table border="1" >

           <tr>
           <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Evento </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del campenato </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Numero de cedula del responsable </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Codigo del estado del evento </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nombre del campeonato </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de participantes </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de inicio </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de finalizacion </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Dias del campeonato</td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Hora del pampeonato </td>   
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del administrativo </td>   
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del presupuesto </td>   
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de registro</td>  
           </tr>

      <?php 
      
      
     
      echo "<tr>";
    // recorre el vector e imprime los campos definidos en la clase
      do { 
        echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td><td>".$row[10]."</td><td>".$row[11]."</td><td>".$row[12]."</td></tr> \n"; 
      } while ($row = mysqli_fetch_array($result)); 
     echo "</tr>";
     ?>
         </table>
         <?php 


         ?>

         <table border="1" >
         <tr> 
         <td style=" background-color:rgba(243,255,0); font-weight: bold; margint-left: 30px" > Tabla Responsable  </td>
         </tr>


          <tr>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nombre del Responsable </td>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Apellido del Responsable </td>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Numero de Cedula </td>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Direccion </td>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Telefono de Celular </td>
            
          </tr>

          <?php 
           $consulta  = "SELECT cedula FROM campeonato  WHERE  codigoCampeonato  = '$codigoEvento'" ;
           $result = mysqli_query($link,$consulta);
            if ($row = mysqli_fetch_array($result)) {

           do { 
               $cedula= $row[0];
           } while ($row = mysqli_fetch_array($result)); 
            }

          $consulta  = "SELECT * FROM responsable WHERE cedula='$cedula'  " ;
          $result = mysqli_query($link,$consulta);
             if ($row = mysqli_fetch_array($result)) {
       
              echo "<tr>";
             // recorre el vector e imprime los campos definidos en la clase
                        do { 
                             echo "<tr><td>".$row["0"]."</td><td>".$row["1"]."</td><td>".$row["2"]."</td><td>".$row["3"]."</td><td>".$row["4"]."</td></tr>"." \n"; 
                          } while ($row = mysqli_fetch_array($result)); 
              }
               echo "</tr>";

               ?>
         </table>
         <?php 


         ?>

         <table border="1" >
         <tr> 
         <td style=" background-color:rgba(243,255,0); font-weight: bold; margint-left: 30px" > Tabla Presupuesto Campeonato  </td>
         </tr>>


          <tr>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de Presupuesto </td>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Costo del campeonato </td>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Dinero gastado por la J.A.C. </td>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Dinero Recaudado por la J.A.C. </td>
             <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de registro </td>
            
          </tr>

          <?php 
           $consulta  = "SELECT codigoPresupuesto FROM campeonato  WHERE  codigoCampeonato   = '$codigoEvento'" ;
           $result = mysqli_query($link,$consulta);
            if ($row = mysqli_fetch_array($result)) {

           do { 
               $codigoPresupuesto= $row[0];
           } while ($row = mysqli_fetch_array($result)); 
            }

          $consulta  = "SELECT * FROM presupuestocampeonato WHERE codigoPresupuesto ='$codigoPresupuesto'  " ;
          $result = mysqli_query($link,$consulta);
             if ($row = mysqli_fetch_array($result)) {
       
              echo "<tr>";
             // recorre el vector e imprime los campos definidos en la clase
                        do { 
                             echo "<tr><td>".$row["0"]."</td><td>".$row["1"]."</td><td>".$row["2"]."</td><td>".$row["3"]."</td><td>".$row["4"]."</td></tr>"." \n"; 
                          } while ($row = mysqli_fetch_array($result)); 
              }
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


function buscarCampeonatoFecha( $fechaRegistro, $codigoAdministrativo  ) {
    
$link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
mysqli_select_db($link,$this->basedato);
$consulta= "SELECT * FROM administrativo  WHERE  codigoAdministrativo = '$codigoAdministrativo'";
$result= mysqli_query($link, $consulta);
$row = mysqli_fetch_array($result, MYSQLI_NUM);

if($row !=null ){
    echo "<table border='1'>";

    $consulta  = "SELECT * FROM campeonato  WHERE  fechaRegistro  = '$fechaRegistro'" ;
    $result = mysqli_query($link,$consulta);

     if ($row = mysqli_fetch_array($result)) {

    ?>
   
     <table border="1" >

         <tr>
         <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del Evento </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del campenato </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Numero de cedula del responsable </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;"  > Codigo del estado del evento </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Nombre del campeonato </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo de participantes </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de inicio </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de finalizacion </td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Dias del campeonato</td>
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Hora del pampeonato </td>   
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del administrativo </td>   
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Codigo del presupuesto </td>   
              <td style=" background-color:rgba(243,255,0); font-weight: bold;" > Fecha de registro</td>  
         </tr>

    <?php 
    
    
   
    echo "<tr>";
  // recorre el vector e imprime los campos definidos en la clase
    do { 
      echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td><td>".$row[10]."</td><td>".$row[11]."</td><td>".$row[12]."</td></tr> \n"; 
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











    
   
   
}   
?>