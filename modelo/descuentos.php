<?php
class Descuento
{
    private $id;
    private $producto_id;
    private $descuento;
    private $estado;
    public function __construct($id = null, $producto_id, $descuento, $estado)
    {
        $this->id = $id;
        $this->producto_id = $producto_id;
        $this->descuento = $descuento;
        $this->estado = $estado;
    }

    public function obtener_id()
    {
        return
            $this->id;
    }
    public function obtener_producto_id()
    {
        return
            $this->producto_id;
    }
    public function obtener_descuento()
    {
        return
            $this->descuento;
    }
    public function obtener_estado()
    {
        return
            $this->estado;
    }
}