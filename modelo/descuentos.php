<?php
class Descuento
{
    private $id;
    private $producto_id;
    private $descuentoC;
    private $estado;
    public function __construct($id = null, $producto_id, $descuentoC, $estado)
    {
        $this->id = $id;
        $this->producto_id = $producto_id;
        $this->descuentoC = $descuentoC;
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
            $this->descuentoC;
    }
    public function obtener_estado()
    {
        return
            $this->estado;
    }
}