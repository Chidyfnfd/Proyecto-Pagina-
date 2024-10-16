<?php
class controlador{

    public function verPagina($ruta)
    {
        require_once $ruta;
    }
    public function verificar($usuario, $contraseña)
{
    $usuario = new Usuario($usuario, $contraseña);
    $gestorUsuario = new GestorUsuario();
    return $gestorUsuario->busqueda($usuario); // Retorna el resultado de la búsqueda
}

}