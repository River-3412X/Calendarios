<?php
    class Calendario extends Controlador{
        public function __construct(){
            $this->modelo=$this->cargarModelo("Modelo_calendario");
        }
        public function index(){
            
            if($_SERVER['REQUEST_METHOD']=="GET"){
                $this->cargarVista("home");
            }
            else{
                if($_SERVER['REQUEST_METHOD']=="POST"){
                    $inicio=$_POST['inicio'];
                    $fin=$_POST['fin'];
                    $columnas=$_POST['columnas'];
                    $this->modelo->mostrarCalendarios($inicio,$fin,$columnas);
                    $calendarios= $this->modelo->getCalendarios();
                    echo $calendarios;
                }  
               
            }
        }
    }
?>