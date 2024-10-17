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

    public function editarProducto(Producto $producto)
    {
        $conexion = new Conexion();
        $enlaceConexion = $conexion->abrir();
        $id = $producto->obtener_id(); // Necesitarás un método para obtener el ID del producto
        $nombre = $producto->obtener_nombre();
        $descripcion = $producto->obtener_descripcion();
        $precio = $producto->obtener_precio();
        $tipo = $producto->obtener_tipo();
        $imagen = $producto->obtener_imagen();

        // Prepara la consulta para actualizar el producto existente
        $sql = $enlaceConexion->prepare("UPDATE productos SET nombre = ?, precio = ?, descripcion = ?, tipo = ?, imagen = ? WHERE id = ?");

        // Verifica si la preparación fue exitosa
        if ($sql === false) {
            die("Error al preparar la consulta: " . mysqli_error($enlaceConexion));
        }

        // Enlaza los parámetros
        $sql->bind_param("sisssi", $nombre, $precio, $descripcion, $tipo, $imagen, $id);

        // Ejecuta la declaración
        $sql->execute();

        // Obtiene el número de filas afectadas
        $filasAfectadas = $sql->affected_rows;

        // Cierra la declaración y la conexión
        $sql->close();
        $conexion->cerrar();

        return $filasAfectadas;
    }

    public function obtenerProductoPorId($id)
{
    $conexion = new Conexion();
    $enlaceConexion = $conexion->abrir();

    // Prepara la consulta para obtener el producto por su ID
    $sql = $enlaceConexion->prepare("SELECT * FROM productos WHERE id = ?");
    
    // Verifica si la preparación fue exitosa
    if ($sql === false) {
        die("Error al preparar la consulta: " . mysqli_error($enlaceConexion));
    }

    // Enlaza el ID del producto
    $sql->bind_param("i", $id);

    // Ejecuta la declaración
    $sql->execute();

    // Obtiene el resultado
    $result = $sql->get_result();
    $productoData = $result->fetch_assoc(); // Obtiene los datos del producto en forma de arreglo asociativo

    // Cierra la declaración y la conexión
    $sql->close();
    $conexion->cerrar();

    // Si se encontraron datos, crear un objeto Producto
    if ($productoData) {
        $producto = new Producto(
            $productoData['id'],
            $productoData['nombre'],
            $productoData['descripcion'],
            $productoData['precio'],
            $productoData['tipo'],
            $productoData['imagen']
        );
        return $producto;
    }

    // Si no se encontró el producto, retorna null
    return null;
}


}