<?php
class GestorDescuento
{
    public function agregarDescuento(Descuento $descuento)
    {
        $conexion = new Conexion();
        $enlaceConexion = $conexion->abrir();
        $producto_id = $descuento->obtener_producto_id();
        $descuentoC = $descuento->obtener_descuento();
        $estado = $descuento->obtener_estado();


        // Prepara la declaración
        $sql = $enlaceConexion->prepare("INSERT INTO descuentos (producto_id, descuento, estado) VALUES (?, ?, ?)");

        // Verifica si la preparación fue exitosa
        if ($sql === false) {
            die("Error al preparar la consulta: " . mysqli_error($enlaceConexion));
        }

        // Enlaza los parámetros
        $sql->bind_param("iis", $producto_id, $descuentoC, $estado);

        // Ejecuta la declaración
        $sql->execute();

        // Obtiene el número de filas afectadas
        $filasAfectadas = $sql->affected_rows;

        // Cierra la declaración y la conexión
        $sql->close();
        $conexion->cerrar();

        return $filasAfectadas;
    }

    public function listarDescuentos()
    {
        $conexion = new Conexion();
        $enlaceConexion = $conexion->abrir();
        $sql = " SELECT d.id AS descuento_id, d.descuento, d.estado, p.id AS producto_id, p.nombre, p.precio, p.imagen FROM descuentos d JOIN productos p ON d.producto_id = p.id";
        $result = $conexion->consulta($sql, [], 2); // Asegúrate de pasar '2' para obtener todos los resultados
        $conexion->cerrar();
        return $result; // Esto debe ser un array de productos
    }

    public function editarDescuento(Descuento $descuento)
    {
        $conexion = new Conexion();
        $enlaceConexion = $conexion->abrir();
        $id = $descuento->obtener_id();
        $producto_id = $descuento->obtener_producto_id();
        $descuentoC = $descuento->obtener_descuento();
        $estado = $descuento->obtener_estado();

        // Prepara la consulta para actualizar el producto existente
        $sql = $enlaceConexion->prepare("UPDATE productos SET producto_id = ?, descuentoC = ?, estado = ? WHERE id = ?");

        // Verifica si la preparación fue exitosa
        if ($sql === false) {
            die("Error al preparar la consulta: " . mysqli_error($enlaceConexion));
        }

        // Enlaza los parámetros
        $sql->bind_param("iisi", $producto_id, $descuentoC, $estado, $id);

        // Ejecuta la declaración
        $sql->execute();

        // Obtiene el número de filas afectadas
        $filasAfectadas = $sql->affected_rows;

        // Cierra la declaración y la conexión
        $sql->close();
        $conexion->cerrar();

        return $filasAfectadas;
    }

    public function obtenerDescuentoPorId($id)
    {
        $conexion = new Conexion();
        $enlaceConexion = $conexion->abrir();

        $sql = $enlaceConexion->prepare("SELECT * FROM descuentos WHERE id = ?");

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
        $descuentoData = $result->fetch_assoc(); // Obtiene los datos del producto en forma de arreglo asociativo

        // Cierra la declaración y la conexión
        $sql->close();
        $conexion->cerrar();

        // Si se encontraron datos, crear un objeto Producto
        if ($descuentoData) {
            $descuento = new Descuento(
                $descuentoData['id'],
                $descuentoData['producto_id'],
                $descuentoData['descuento'],
                $descuentoData['estado'],
            );
            return $descuento;
        }

        // Si no se encontró el producto, retorna null
        return null;
    }
}