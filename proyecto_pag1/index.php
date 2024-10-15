<?php
require_once 'controlador/controlador.php';
require_once 'modelo/conexion.php';
require_once 'modelo/reporte.php';
require_once 'modelo/usuario.php';
require_once 'modelo/gestor_usuario.php';

$controlador = new Controlador();
if (isset($_GET["accion"])) {
    if ($_GET["accion"] == "registro") {
        $controlador->verPagina('Vista/html/Registro.php');
    } elseif ($_GET["accion"] == "login") {
        $controlador->verPagina('Vista/html/login.php');
    } elseif ($_GET["accion"] == "agregarUsuario") {
        $controlador->agregarUsuario(
            null,
            $_POST["nombre"],
            $_POST["apellido"],
            $_POST["usuario"],
            $_POST["contraseña"],
            $_POST["fecha_actual"],
        );
    }
} else {
    $controlador->verPagina('Vista/html/login.php');
}