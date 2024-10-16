<?php
    class usuario {
        private $id;
        private $nombre;
        private $contraseña;
        private $usuario;
        public function __construct($usuario, $contraseña, $id = null, $nombre = null) {
         $this->usuario = $usuario;
         $this->contraseña = $contraseña;
         $this->id = $id;
         $this->nombre = $nombre;
     }

         public function obtener_id (){
            return
            $this -> id;
         }
         public function obtener_nombre (){
            return
            $this -> nombre;
         }
         public function obtener_contraseña (){
            return
            $this -> contraseña;
         }
         public function obtener_usuario (){
            return
            $this -> usuario;
         }
    }