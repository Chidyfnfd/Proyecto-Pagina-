<?php
class GestorUsuario
{
    public function busqueda(Usuario $usuario)
    {
        $credencialesCorrectas = false;

        $conexion = new Conexion();
        $enlace_conexion = $conexion->abrir();
        $user_sql = $usuario->obtener_usuario();
        $contraseña = $usuario->obtener_contraseña();

        // Preparar la consulta
        $sql = $enlace_conexion->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $sql->bind_param("s", $user_sql); // 's' indica que es un string
        $sql->execute();
        $resultado = $sql->get_result()->fetch_assoc();
        $conexion->cerrar();

        if ($resultado) {
            if ($resultado["usuario"] == $user_sql && $resultado["contraseña"]) {
                $credencialesCorrectas = true;
            } else {
                $_SESSION["mensaje"] = "Las credenciales son incorrectas";
            }
        }
        
        return $credencialesCorrectas; // Retornar el resultado
    }
}