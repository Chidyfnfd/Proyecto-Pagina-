<?php
class producto
{
    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $tipo;
    private $imagen;
    public function __construct($id = null, $nombre, $descripcion, $precio, $tipo, $imagen)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->tipo = $tipo;
        $this->imagen = $imagen;
    }

    public function obtener_id()
    {
        return
            $this->id;
    }
    public function obtener_nombre()
    {
        return
            $this->nombre;
    }
    public function obtener_descripcion()
    {
        return
            $this->descripcion;
    }
    public function obtener_precio()
    {
        return
            $this->precio;
    }
    public function obtener_tipo()
    {
        return
            $this->tipo;
    }
    public function obtener_imagen()
    {
        return
            $this->imagen;
    }
}