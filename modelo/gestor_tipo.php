<?php
class GestorTipo
{

    public function agregarTipo(Tipo $tipo)
    {
        $conexion = new Conexion();
        $enlaceConexion = $conexion->abrir();
        $tipo = $tipo->obtener_tipo();

        // Prepara la declaración
        $sql = $enlaceConexion->prepare("INSERT INTO tipo_producto (tipo) VALUES (?)");

        // Verifica si la preparación fue exitosa
        if ($sql === false) {
            die("Error al preparar la consulta: " . mysqli_error($enlaceConexion));
        }

        // Enlaza los parámetros
        $sql->bind_param("s", $tipo);

        // Ejecuta la declaración
        $sql->execute();

        // Obtiene el número de filas afectadas
        $filasAfectadas = $sql->affected_rows;

        // Cierra la declaración y la conexión
        $sql->close();
        $conexion->cerrar();

        return $filasAfectadas;
    }

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
