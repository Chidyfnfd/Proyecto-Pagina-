<?php
require_once 'controlador/controlador.php';
require_once 'modelo/conexion.php';
require_once 'modelo/usuario.php';
require_once 'modelo/gestor_usuario.php';

$controlador = new Controlador();
if (isset($_GET["accion"])) {
    if ($_GET["accion"] == "login") {
        $controlador->verPagina('vistas/html/login.php');
    }
    if ($_GET["accion"] == "verificar") {
        if (empty($_POST["usuario"]) || empty($_POST["contraseña"])) {
            $_SESSION['mensaje'] = "El usuario y la contraseña son requeridos.";
            header('Location: index.php?accion=login');
            exit();
        }
    }
    if ($credencialesCorrectas == true) {
        header("Location: index.php?accion=principal");
    } else {
        header("Location: index.php?accion=sinPermiso");
    }
} else {
    $controlador->verPagina('vistas/html/login.php');
}