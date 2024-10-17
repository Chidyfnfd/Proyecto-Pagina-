<?php
class Tipo
{
    private $id;
    private $tipo;
    public function __construct($id = null, $tipo)
    {
        $this->id = $id;
        $this->tipo = $tipo;
    }

    public function obtener_id()
    {
        return
            $this->id;
    }
    public function obtener_tipo()
    {
        return
            $this->tipo;
    }
}