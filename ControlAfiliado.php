<?php
    include("ClienteAfiliado.php");

    Class ControlAfiliado{
        
        private $obj;

        function __construct(){
            $obj = new ClienteAfiliado();
        }

        function seleccionarOpcion(){
            if(isset($_POST['anexar'])){
                $this->registrarDatos(1);
            }
            if(isset($_POST['consultarUsu'])){
                $this->consultarDatos(1);
                # code...
            }
            if(isset($_POST['consultarAdm'])){
                $this->consultarDatos(2);
                # code...
            }
            if(isset($_POST['buscar'])){
                $this->buscarDatos(1);
                # code...
            }
           
            if(isset($_POST['modificar'])){
                $this->modificarDatos(1);
                # code...
            }

        }

        public function registrarDatos($oper){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $cedula = $_POST['cedula'];
            $nacion = $_POST['nacionalidad'];
            $nacionalidad=strtolower($nacion);
            $codigoNacionalidad=0;
            if($nacionalidad== 'colombia'){
                $codigoNacionalidad=5;
            }else if($nacionalidad== 'peru'){
                $codigoNacionalidad=10;
            }else if($nacionalidad== 'ecuador'){
                $codigoNacionalidad=15;
            }else if($nacionalidad== 'honduras'){
                $codigoNacionalidad=20;
            }elseif($nacionalidad== 'mexico'){
                $codigoNacionalidad=25;
            }else{
                echo '<script> alert ("Nacionalidad No Encontrada, las nacionalidades registradas por el momento son: colombia, peru, ecuador, honduras y mexico "); 
                window.location.href="registro.html" </script>';
            }
            $ciudadNacimiento = $_POST['ciudadNacimiento'];
            $varNacimiento = $_POST['fechaNacimiento'];
            $fechaNacimiento = str_replace('/', '-', $varNacimiento);
            $codigoSangre = $_POST['tipoSangre'];
            if($codigoSangre==12){
                $tipoSangre='A+';
            } else if($codigoSangre==13){
                $tipoSangre='B+';
            }else if($codigoSangre==14){
                $tipoSangre='O+';
            }else if($codigoSangre==15){
                $tipoSangre='AB+';
            }else if($codigoSangre==16){
                $tipoSangre='A-';
            }else if($codigoSangre==17){
                $tipoSangre='B-';
            }else if($codigoSangre==18){
                $tipoSangre='O-';
            } else if($codigoSangre==19){
                $tipoSangre='AB-';
            }else{
                echo '<script> alert ("Tipo de sangre no definido"); 
                window.location.href="registro.html" </script>';
            }

            $telefonoFijo = $_POST['telefonoFijo'];
            $telefonoCelular = $_POST['telefonoCelular'];
            $direccionDomicilio = $_POST['direccion'];
            $barrio = $_POST['barrio'];
            $ciudad = $_POST['ciudad'];
            $correo = $_POST['correo'];

            $codigoEstadoCivil = $_POST['estadoCivil'];
            if($codigoEstadoCivil==51){
                $estadoCivil='casado';
            }else if($codigoEstadoCivil==52){
                $estadoCivil='soltero';
            }else if($codigoEstadoCivil==53){
                $estadoCivil='union libre';
            }else{
                echo '<script> alert ("Estado civil no definido"); 
                window.location.href="registro.html" </script>';
            }
            $profecion = $_POST['profecion'];
            $numeroHijo = $_POST['numeroHijo'];
            $ragoEdad1=false;
            $ragoEdad2=false;
            $ragoEdad3=false;
            $ragoEdad4=false;
            if($numeroHijo >0)
            {
                $rangoEdades = $_POST['rangoEdades'];
                $tamaño= sizeof($rangoEdades);
                $i=0;
                
    
                while( $tamaño!=$i) {
    
                    if($rangoEdades[$i]==1)
                     {
                       $ragoEdad1=true;
                    }
                    if($rangoEdades[$i]==2)
                    {
                      $ragoEdad2=true;
                    }
                      if($rangoEdades[$i]==3)
                    {
                      $ragoEdad3=true;
                    }
                    if($rangoEdades[$i]==4)
                    {
                      $ragoEdad4=true;
                    }
                    $i++;
                } 
            }
           
            echo $ragoEdad1;
            echo $ragoEdad2;
            echo $ragoEdad3;
            echo $ragoEdad4;
        

            $adulto= $_POST['adultoCuidado'];

            if($adulto=="si")
            {
                $adultoCuidado=true;
            }else if($adulto=="no"){
                $adultoCuidado=false;
            }else{
                 echo '<script> alert ("Estado civil no definido"); 
                window.location.href="registro.html" </script>';
            }

            $personasViven = $_POST['viveCuantos'];

            $codigoVivienda = $_POST['viveEn'];

            if($codigoVivienda==100)
            {
                $tipoVivienda='casa';
            }else if($codigoVivienda==101)
            {
                $tipoVivienda='apartamento';
            }else{
                echo '<script> alert ("Vive en, no definido"); 
                window.location.href="registro.html" </script>';
            }

            $codigoEstadoVivienda = $_POST['tipoVivienda'];

            if($codigoEstadoVivienda==200)
            {
                $tipoEstadoVivienda='propia';
            }else if($codigoEstadoVivienda==201)
            {
                $tipoEstadoVivienda='alquile';
            }else if($codigoEstadoVivienda==202)
            {
                $tipoEstadoVivienda='familiar';
            }else{
                echo '<script> alert ("Tipo de vivienda, no definido"); 
                window.location.href="registro.html" </script>';
            }


            $codigoGenero = $_POST['genero'];

            if($codigoGenero==300)
            {
                $genero='mujer';
            }else if($codigoGenero==301)
            {
                $genero='hombre';
            }else if($codigoGenero==302)
            {
                $genero='indefinido';
            }else{
                echo '<script> alert ("Tipo de vivienda, no definido"); 
                window.location.href="registro.html" </script>';
            }
            $pertenece = $_POST['etnia'];
            if($adulto=="si")
            {
                $codigoGrupoEspecial=400;
            }else if($adulto=="no"){
                $codigoGrupoEspecial=401;
            }else{
                 echo '<script> alert ("Estado civil no definido"); 
                window.location.href="registro.html" </script>';
            }
            $intereses = $_POST['intereses'];
            $codigoEstado=10;
            $estado='activo';
            $usuariop=$nombre.$apellido;
            $contrasenap=$cedula.$apellido;
            
            $obj = new ClienteAfiliado();

            switch($oper){
                case 1:
                    $obj->anexarAfiliado($cedula,$nombre, $apellido,  $codigoNacionalidad ,$nacionalidad,   $ciudadNacimiento,    $fechaNacimiento, $codigoSangre, $tipoSangre,    $telefonoFijo,  $telefonoCelular, 
                    $direccionDomicilio,    $barrio,    $ciudad,    $correo,   $codigoEstadoCivil, $estadoCivil,    $profecion,   $numeroHijo,
                    $ragoEdad1, $ragoEdad2, $ragoEdad3, $ragoEdad4,  $adultoCuidado,       $personasViven, $codigoVivienda,  $tipoVivienda, $codigoEstadoVivienda, $tipoEstadoVivienda, $codigoGenero, $genero,  
                    $codigoGrupoEspecial, $pertenece,  $intereses, $codigoEstado,$estado,$usuariop, $contrasenap );
                    break;
            }
  
        }

        public function consultarDatos($oper){
           
            $año = $_POST['año'];

            $obj = new ClienteAfiliado();

            switch($oper){
                case 1:
                    
                        $obj->consultarAfiliadoUsu( $año );
                    break;
                case 2:
                    
                        $obj->consultarAfiliadoAdm( $año );
                    break;
            }
  
        }
        
        

        public function modificarDatos($oper){
           
            $cedula = $_POST['cedula'];
            $codigoAdministrativo = $_POST['cedulaRegistrante'];



            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $cedula = $_POST['cedula'];
            $nacion = $_POST['nacionalidad'];
            $nacionalidad=strtolower($nacion);
            $codigoNacionalidad=0;
            if($nacionalidad== 'colombia'){
                $codigoNacionalidad=5;
            }else if($nacionalidad== 'peru'){
                $codigoNacionalidad=10;
            }else if($nacionalidad== 'ecuador'){
                $codigoNacionalidad=15;
            }else if($nacionalidad== 'honduras'){
                $codigoNacionalidad=20;
            }elseif($nacionalidad== 'mexico'){
                $codigoNacionalidad=25;
            }else{
                echo '<script> alert ("Nacionalidad No Encontrada"); 
                window.location.href="registro.html" </script>';
            }
            $ciudadNacimiento = $_POST['ciudadNacimiento'];
            $varNacimiento = $_POST['fechaNacimiento'];
            $fechaNacimiento = str_replace('/', '-', $varNacimiento);
            $codigoSangre = $_POST['tipoSangre'];
            if($codigoSangre==12){
                $tipoSangre='A+';
            } else if($codigoSangre==13){
                $tipoSangre='B+';
            }else if($codigoSangre==14){
                $tipoSangre='O+';
            }else if($codigoSangre==15){
                $tipoSangre='AB+';
            }else if($codigoSangre==16){
                $tipoSangre='A-';
            }else if($codigoSangre==17){
                $tipoSangre='B-';
            }else if($codigoSangre==18){
                $tipoSangre='O-';
            } else if($codigoSangre==19){
                $tipoSangre='AB-';
            }else{
                echo '<script> alert ("Tipo de sangre no definido"); 
                window.location.href="registro.html" </script>';
            }

            $telefonoFijo = $_POST['telefonoFijo'];
            $telefonoCelular = $_POST['telefonoCelular'];
            $direccionDomicilio = $_POST['direccion'];
            $barrio = $_POST['barrio'];
            $ciudad = $_POST['ciudad'];
            $correo = $_POST['correo'];

            $codigoEstadoCivil = $_POST['estadoCivil'];
            if($codigoEstadoCivil==51){
                $estadoCivil='casado';
            }else if($codigoEstadoCivil==52){
                $estadoCivil='soltero';
            }else if($codigoEstadoCivil==53){
                $estadoCivil='union libre';
            }else{
                echo '<script> alert ("Estado civil no definido"); 
                window.location.href="registro.html" </script>';
            }
            $profecion = $_POST['profecion'];
            $numeroHijo = $_POST['numeroHijo'];
            $ragoEdad1=false;
            $ragoEdad2=false;
            $ragoEdad3=false;
            $ragoEdad4=false;
            if($numeroHijo >0)
            {
                $rangoEdades = $_POST['rangoEdades'];
                $tamaño= sizeof($rangoEdades);
                $i=0;
                
    
                while( $tamaño!=$i) {
    
                    if($rangoEdades[$i]==1)
                     {
                       $ragoEdad1=true;
                    }
                    if($rangoEdades[$i]==2)
                    {
                      $ragoEdad2=true;
                    }
                      if($rangoEdades[$i]==3)
                    {
                      $ragoEdad3=true;
                    }
                    if($rangoEdades[$i]==4)
                    {
                      $ragoEdad4=true;
                    }
                    $i++;
                } 
            }
           
            echo $ragoEdad1;
            echo $ragoEdad2;
            echo $ragoEdad3;
            echo $ragoEdad4;
        

            $adulto= $_POST['adultoCuidado'];

            if($adulto=="si")
            {
                $adultoCuidado=true;
            }else if($adulto=="no"){
                $adultoCuidado=false;
            }else{
                 echo '<script> alert ("Estado civil no definido"); 
                window.location.href="registro.html" </script>';
            }

            $personasViven = $_POST['viveCuantos'];

            $codigoVivienda = $_POST['viveEn'];

            if($codigoVivienda==100)
            {
                $tipoVivienda='casa';
            }else if($codigoVivienda==101)
            {
                $tipoVivienda='apartamento';
            }else{
                echo '<script> alert ("Vive en, no definido"); 
                window.location.href="registro.html" </script>';
            }

            $codigoEstadoVivienda = $_POST['tipoVivienda'];

            if($codigoEstadoVivienda==200)
            {
                $tipoEstadoVivienda='propia';
            }else if($codigoEstadoVivienda==201)
            {
                $tipoEstadoVivienda='alquile';
            }else if($codigoEstadoVivienda==202)
            {
                $tipoEstadoVivienda='familiar';
            }else{
                echo '<script> alert ("Tipo de vivienda, no definido"); 
                window.location.href="registro.html" </script>';
            }


            $codigoGenero = $_POST['genero'];

            if($codigoGenero==300)
            {
                $genero='mujer';
            }else if($codigoGenero==301)
            {
                $genero='hombre';
            }else if($codigoGenero==302)
            {
                $genero='indefinido';
            }else{
                echo '<script> alert ("Tipo de vivienda, no definido"); 
                window.location.href="registro.html" </script>';
            }
            $codigoEstado = $_POST['estadoAfiliado'];

            if($codigoEstado==10)
            {
                $estadoAfiliado='activo';
            }else if($codigoEstado==20){
                $estadoAfiliado='inactivo';
            }else{
                 echo '<script> alert ("Estado civil no definido"); 
                window.location.href="registro.html" </script>';
            }

            $obj = new ClienteAfiliado();

            switch($oper){
                case 1:
                    
                        $obj->modificarrAfiliado( $codigoAdministrativo, $cedula,$nombre, $apellido,  $codigoNacionalidad ,$nacionalidad,   $ciudadNacimiento,    $fechaNacimiento, $codigoSangre, $tipoSangre,    $telefonoFijo,  $telefonoCelular, 
                        $direccionDomicilio,    $barrio,    $ciudad,    $correo,   $codigoEstadoCivil, $estadoCivil,    $profecion,   $numeroHijo,
                        $ragoEdad1, $ragoEdad2, $ragoEdad3, $ragoEdad4,  $adultoCuidado,       $personasViven, $codigoVivienda,  $tipoVivienda, $codigoEstadoVivienda, $tipoEstadoVivienda, $codigoGenero, $genero,  
                        $codigoEstado,$estadoAfiliado );
                    break;
            }
  
        }
      

    
        public function buscarDatos($oper){

            $codigoAfiliado = $_POST['codigoAfiliado'];
            
            $apellidoAfiliado = $_POST['apellidoAfiliado'];
            $cedula = $_POST['cedula'];
            $usuariop = $_POST['UsuarioAfiliado'];
            $contrasena = $_POST['contrasenaAfiliado'];
            


                if( $codigoAfiliado=='')
                {
                    if( empty($cedula))
                    {
                            if(empty($apellidoAfiliado))
                            {
                                if(empty($usuariop))
                                {
                                    if(empty($contrasena)){
                                        $oper=7;
                                    }else{
                                        $oper=5;

                                    }
                                
                                    
                                }else{
                                    $oper=4;
                                }
      
                            }else{
                                 $oper=3;
                            }
                    }else{
                        $oper=2; 
                    }

                }else{
                    $oper=1;
                }
                
            $obj = new ClienteAfiliado();

            switch($oper){
                      
                case 1:

                    $obj->buscarCodigoAfiliado( $codigoAfiliado);
                    break;
                 case 2:
  
                        $obj->buscarCedulaAfiliado( $cedula );
                    break;
                case 3:

                        $obj->buscarApellidoAfiliado( $apellidoAfiliado );
                     break;
                 case 4:
      
                    $obj->buscarUsuario( $usuariop );
                      break;
                case 5:
      
                        $obj->buscarContrasena( $contrasena );
                          break;
                        
            }
  
        }

        
















    }

    $obj1 = new ControlAfiliado();
    $obj1->seleccionarOpcion();
?>