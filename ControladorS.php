<?php
include("ClientesugerenciaS.php");
Class ControladorS{
        
    private $obj;

    function __construct(){
        $obj = new ClientesugerenciasS();
    }

    function seleccionarOpcion(){
        if(isset($_POST['anexar'])){
            $this->registrarDatos(1);
        }

    }

    public function registrarDatos($oper){
        
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $cedula = $_POST['cedula'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $correo = $_POST['correo'];
 
        $obj = new ClientesugerenciasS();
echo 'nose';
        switch($oper){
            case 1:
                $obj->anexarCliente($nombre, $apellido, $cedula, $telefono, $direccion, $correo);
                break;
        }
 
    }
}

$obj1 = new ControladorS();

$obj1->seleccionarOpcion();


?>