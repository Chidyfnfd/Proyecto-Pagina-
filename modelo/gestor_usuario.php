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

        if ($resultado) {
            // Comparar la contraseña directamente (no recomendado en producción)
            if ($resultado["contraseña"] == $contraseña) {
                $credencialesCorrectas = true;
            } else {
                $_SESSION["mensaje"] = "Las credenciales son incorrectas";
            }
        } else {
            $_SESSION["mensaje"] = "El usuario no existe";
        }

        $conexion->cerrar();
        return $credencialesCorrectas; // Retornar el resultado
    }
}
