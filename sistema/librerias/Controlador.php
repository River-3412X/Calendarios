<?php
    class Controlador{
        protected $modelo;
        protected $vista;
        
        public function cargarModelo($modelo,$parametros=[]){            
            require_once "../sistema/modelos/".ucwords($modelo).".php";
            return new $modelo();
        }
        public function cargarVista($vista,$parametros=[]){            
            if(is_file("../sistema/vistas/".ucwords($vista).".php")){
                require_once "../sistema/vistas/".ucwords($vista).".php";
            }
            else{
                die("No existe vista");
            }
        }        
    }
?>