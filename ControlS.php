<?php
    include("ClienteS.php");

    Class ControlS{
        private $obj;

        function __construct(){
            $obj = new ClienteS();
        }

        function seleccionarOpcion(){
            if(isset($_POST['anexar'])){
                $this->registrarDatos(1);
            }

        }

        public function registrarDatos($oper){
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $mensaje = $_POST['mensaje'];

            $obj = new ClienteS();

            switch($oper){
                case 1:
                    $obj->anexarCliente($nombre, $correo, $mensaje);
                    break;
            }
            
        }
    }
    $obj1 = new ControlS();
    $obj1->seleccionarOpcion();
?>