
<?php
class Conexion {
    private $host = "localhost";
    private $db = "proyecto_pag1";
    private $user = "root";
    private $pass = "";
    private $sql;
    private $conexion;
    private $resultado;
    private $resultadoAll;
    private $filasAfectadas;
    private $dato;
    
    public function abrir() {
        $conexion = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if (!$conexion) {
            die("Conexión fallida: " . mysqli_connect_error());
        }
        return $conexion;
    }
    public function cerrar()
    {
        $this->conexion= null;
    }
    public function consulta($sql,$opcion)
    {
        $this->sql=$sql;
        try {
            
            $this->sql->execute();
            if($opcion==1){
                $this->resultado=$this->sql->fetch(PDO::FETCH_ASSOC);
            }elseif($opcion==2){
                $this->resultadoAll = $this->sql->fetchAll(PDO::FETCH_ASSOC);
            }
            $this->filasAfectadas = $this->sql->rowCount();
            $this->dato = $this->conexion->lastInsertId();
        
        }
        catch(\PDOException $e){
            echo $e->getMessage();
        }
        
    }
    public function obtenerResultado()
    {
        return $this->resultado;
    }
    public function obtenerResultadoAll()
    {
        return $this->resultadoAll;
    }
    public function obtenerFilasAfectadas()
    {
        return $this->filasAfectadas;
    }
    public function obtenerDato()
    {
        return $this->dato;
    }
    public function getConexion()
    {
        return $this->conexion;
    }
}
?>