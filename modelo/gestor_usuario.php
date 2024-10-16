<?php
class GestorUsuario
{
    public function busqueda(Usuario $usuario)
    {
        $credencialesCorrectas=false;

        $conexion = new Conexion();
        $enlace_conexion = $conexion->abrir();
        $user_sql = $usuario->obtener_usuario();
        $password = $usuario->obtener_contraseña();
        $sql = $enlace_conexion->prepare("SELECT * FROM usuarios WHERE usuario = :user_sql");
        $sql->bindParam(":user_sql", $user_sql, PDO::PARAM_STR);
        $conexion->consulta($sql,1);
        $resultado = $conexion->obtenerResultado();
        $conexion->cerrar();
        

        if ($resultado) {
            if (($resultado["usu_usuario"] == $user_sql) && password_verify($password,$resultado["usu_contrasena"])) {
                $credencialesCorrectas=true;
            }else{
                $_SESSION["mensaje"] = "Las credenciales son incorrectas";
            }
        }
        return $credencialesCorrectas;
    }
}