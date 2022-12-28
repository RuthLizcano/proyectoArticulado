<?php
Class ClientesugerenciasS{
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

    function anexarCliente($nombre, $apellido, $cedula, $telefono, $direccion, $correo){
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);
        $grabar_cliente="INSERT INTO solicitudregistro (nombre, apellido, cedula, telefono, direccion, correo) VALUES ('$nombre','$apellido','$cedula', '$telefono', '$direccion', '$correo ')";
        $guardar_usuario=mysqli_query($link,$grabar_cliente) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());
        mysqli_close($link);
        echo '<script> alert ("Su solicitud ha sido procesada en unos días un administrativo se comunicara con usted");
        window.location.href="loginvista.html" </script>';


    }
   
}   
?>