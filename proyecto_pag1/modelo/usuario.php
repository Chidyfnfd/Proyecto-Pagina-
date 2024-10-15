<?php
    class usuario {
        private $id;
        private $nombre;
        private $contraseña;
        private $usuario;
         public function __construct($user, $password, $id, $nombre){
             $this ->usuario = $user;
             $this ->contraseña = $password;
             $this ->id = $id;
             $this -> nombre = $nombre;
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