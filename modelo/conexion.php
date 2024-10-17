<?php
class Conexion
{
    private $host = "localhost";
    private $db = "proyecto_pag1";
    private $user = "root";
    private $pass = "";
    private $conexion;

    public function abrir()
    {
        $this->conexion = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if (!$this->conexion) {
            die("Conexión fallida: " . mysqli_connect_error());
        }
        return $this->conexion;
    }

    public function cerrar()
    {
        if ($this->conexion) {
            mysqli_close($this->conexion);
            $this->conexion = null;
        }
    }

    public function consulta($sql, $params = [], $opcion)
    {
        // Prepara la declaración
        $stmt = mysqli_prepare($this->conexion, $sql);

        // Verifica si hay parámetros y los enlaza
        if ($params) {
            $types = str_repeat('s', count($params)); // Cambiar 's' a otros tipos según sea necesario
            mysqli_stmt_bind_param($stmt, $types, ...$params);
        }

        // Ejecuta la declaración
        mysqli_stmt_execute($stmt);

        // Verifica el tipo de opción
        if ($opcion == 1) {
            // Devuelve un solo resultado
            $result = mysqli_stmt_get_result($stmt);
            return mysqli_fetch_assoc($result);
        } elseif ($opcion == 2) {
            // Devuelve todos los resultados
            $result = mysqli_stmt_get_result($stmt);
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }

        // Obtiene el último ID insertado para operaciones de inserción
        if (strpos($sql, 'INSERT') !== false) {
            return mysqli_insert_id($this->conexion);
        }

        return null; // Devuelve null si no es un tipo de consulta que retorne resultados
    }

}