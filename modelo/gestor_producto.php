<?php
class GestorProducto
{
    public function agregarProducto(Producto $producto)
    {
        $conexion = new Conexion();
        $enlaceConexion = $conexion->abrir();
        $nombre = $producto->obtener_nombre();
        $descripcion = $producto->obtener_descripcion();
        $precio = $producto->obtener_precio();
        $tipo = $producto->obtener_tipo();
        $imagen = $producto->obtener_imagen();

        // Prepara la declaración
        $sql = $enlaceConexion->prepare("INSERT INTO productos (nombre, precio, descripcion, tipo, imagen) VALUES (?, ?, ?, ?, ?)");

        // Verifica si la preparación fue exitosa
        if ($sql === false) {
            die("Error al preparar la consulta: " . mysqli_error($enlaceConexion));
        }

        // Enlaza los parámetros
        $sql->bind_param("sisss", $nombre, $precio, $descripcion, $tipo, $imagen);

        // Ejecuta la declaración
        $sql->execute();

        // Obtiene el número de filas afectadas
        $filasAfectadas = $sql->affected_rows;

        // Cierra la declaración y la conexión
        $sql->close();
        $conexion->cerrar();

        return $filasAfectadas;
    }

    public function listarProductos()
    {
        $conexion = new Conexion();
        $enlaceConexion = $conexion->abrir();
        $sql = "SELECT * FROM productos;";
        $result = $conexion->consulta($sql, [], 2); // Llama al método con 2 como opción para obtener todos los resultados
        $conexion->cerrar();
        return $result;
    }
    
}