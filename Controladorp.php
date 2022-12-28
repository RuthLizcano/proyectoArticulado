<?php
include("Usuariop.php");
Class Controladorp{
        
    private $obj;

    function __construct(){
        $obj = new Usuariop();
    }

    function seleccionarOpcion(){
        if(isset($_POST['anexar'])){
            $this->registrarDatos(1);
        }

    }

    public function registrarDatos($oper){
        
        $usuariop = $_POST['usuario'];
        $contrasenap = $_POST['contrasena'];
 
        $obj = new Usuariop();
echo 'nose';
        switch($oper){
            case 1:
                $obj->consultarUsuario($usuariop, $contrasenap);
                break;
        }
 
    }
}
$obj1 = new Controladorp();

$obj1->seleccionarOpcion();


?>