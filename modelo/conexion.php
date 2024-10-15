
<?php
class Conexion {
    private $host = "localhost";
    private $db = "proyecto_pag1";
    private $user = "root";
    private $pass = "";
    
    public function conectar() {
        $conexion = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if (!$conexion) {
            die("Conexión fallida: " . mysqli_connect_error());
        }
        return $conexion;
    }
}
?>