<?php
class  GestorProducto{

    public function agregarProducto(Producto $producto)
    {
        $conexion = new Conexion();
        $enlaceConexion = $conexion->abrir();
        $nombre = $producto->obtener_nombre();
        $descripcion = $producto->obtener_descripcion();
        $precio = $producto->obtener_precio();
        $tipo = $producto->obtener_tipo();
        $imagen = $producto->obtener_imagen();
        $sql = $enlaceConexion->prepare("INSERT INTO productos VALUES (NULL,:nombre,:precio,:descripcion,:tipo,:imagen)");
        $sql->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $sql->bindParam(":precio", $precio, PDO::PARAM_INT);
        $sql->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
        $sql->bindParam(":tipo", $tipo, PDO::PARAM_INT);
        $sql->bindParam(":imagen", $imagen, PDO::PARAM_STR);
        $conexion->consulta($sql, 0);
        $filasAfectadas = $conexion->obtenerFilasAfectadas();
        $conexion->cerrar();
        return $filasAfectadas;
    }
}