<?php
class controlador{
    public function verificar($user, $password){
        
        $gestorUsuario = new GestorUsuario();
        $result= $gestorUsuario->validar($usuario);
        return $result;
    }
}