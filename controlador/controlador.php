<?php
class controlador{

    public function verPagina($ruta)
    {
        require_once $ruta;
    }
    public function verificar($usuario, $contraseña)
    {
        $usuario = new Usuario(
            $usuario,
            $contraseña
        );
        $gestorUsuario = new GestorUsuario();
        $result = $gestorUsuario->busqueda($usuario);
        return $result;
    }
}