<?php
Class Usuariop{

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

    function consultarUsuario($usuariop, $contrasenap){
        

        $pdo = new PDO('mysql:host=localhost; dbname=jac', 'root', 'toor');
        $sql= "SELECT usuario,contrasena FROM loginn where usuario =:usuario AND contrasena=:contrasena ";  
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(":usuario", $usuariop , PDO::PARAM_STR);
        $consulta->bindParam(":contrasena", $contrasenap , PDO::PARAM_STR);
        $consulta->execute();
        if($consulta->rowCount()>0)
        {
        $link = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->basedato);
        mysqli_select_db($link,$this->basedato);
        $consulta= "SELECT codigoLogin FROM loginn WHERE usuario ='$usuariop' AND contrasena ='$contrasenap' ";
        $result= mysqli_query($link, $consulta);
        $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
        $aux=$row1[0];
        $consulta= "SELECT cedula FROM afiliado WHERE codigoLogin ='$aux' ";
        $result= mysqli_query($link, $consulta);
        $row2 = mysqli_fetch_array($result, MYSQLI_NUM);
        if($row2 !=null ){
          header('Location: ingresoAdministrados.html');
        }else{
          header('Location: ingresoUsuario.html');
        }
        }else{
          echo '<script> alert ("acceso denegado, credenciales invalidas"); 
          window.location.href="ingreso.html" </script>';
        }

  
     
     
    }
}   
?>