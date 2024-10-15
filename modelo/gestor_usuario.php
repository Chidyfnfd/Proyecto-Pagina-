<?php
class GestorUsuario {
    public function validar($usuario, $contraseña) {
        $conexion = new Conexion();
        $abierto = $conexion->conectar();
        $sql = $abierto->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
        $sql->bindParam(':usuario', $usuario);
        $sql->execute();
        
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        
        if ($resultado) {
            if (password_verify($contraseña, $resultado['contraseña'])) {
                return true; // Usuario y contraseña válidos
            } else {
                return false; // Contraseña incorrecta
            }
        } else {
            return false; // Usuario no existe
        }
    }
}
?>