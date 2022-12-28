<?php
Class ClienteS{
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

    function anexarCliente($nombre, $correo, $mensaje){
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);
        $grabar_cliente="INSERT INTO sugerencias (nombre, correo, mensaje) VALUES ('$nombre','$correo','$mensaje')";
        $guardar_usuario=mysqli_query($link,$grabar_cliente) or die ('La insercion a la base de datos fallo'. mysqli_connect_error());
        mysqli_close($link);
        echo '<script> alert ("Sugerencia enviada");
        window.location.href="loginvista.html" </script>';


    }
   
}   
?>