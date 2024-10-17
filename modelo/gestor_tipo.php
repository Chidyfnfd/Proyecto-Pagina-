<?php
class GestorTipo
{

    //public function agregarProducto(Producto $producto)
    //{
    //    $conexion = new Conexion();
    //    $enlaceConexion = $conexion->abrir();
    //    $nombre = $producto->obtener_nombre();
    //    $descripcion = $producto->obtener_descripcion();
    //    $precio = $producto->obtener_precio();
    //    $tipo = $producto->obtener_tipo();
    //    $imagen = $producto->obtener_imagen();

    //    $sql = $enlaceConexion->prepare("INSERT INTO productos (id, nombre, precio, descripcion, tipo, imagen) VALUES (NULL, ?, ?, ?, ?, ?)");
    //    $sql->bind_param("sisss", $nombre, $precio, $descripcion, $tipo, $imagen);

    //    $sql->execute();
    //    $filasAfectadas = $sql->affected_rows;

    //    $sql->close();
    //    $conexion->cerrar();

    //    return $filasAfectadas;
    //}

    public function listarTipos()
    {
        $conexion = new Conexion();
        $enlaceConexion = $conexion->abrir();

        // Definimos la consulta SQL
        $sql = "SELECT * FROM tipo_producto;";

        // Llamamos al método consulta sin necesidad de preparar la declaración
        $result = $conexion->consulta($sql, [], 2); // 2 indica que queremos todos los resultados

        // Cerramos la conexión
        $conexion->cerrar();

        // Retornamos los resultados
        return $result;
    }

}
