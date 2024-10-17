<?php
require_once 'controlador/controlador.php';
require_once 'modelo/conexion.php';
require_once 'modelo/usuario.php';
require_once 'modelo/gestor_usuario.php';
require_once 'modelo/producto.php';
require_once 'modelo/gestor_producto.php';
require_once 'modelo/Tipo.php';
require_once 'modelo/gestor_tipo.php';

$controlador = new Controlador();
if (isset($_GET["accion"])) {
    if ($_GET["accion"] == "login") {
        $controlador->verPagina('vistas/html/login.php');
    } elseif ($_GET["accion"] == "principal") {
        $controlador->verPagina('vistas/html/principal.php');
    } elseif ($_GET["accion"] == "productos") {
        $controlador->listarProductos();
    } elseif ($_GET["accion"] == "sinPermiso") {
        $controlador->verPagina('vistas/html/sinPermiso.php');
    } elseif ($_GET["accion"] == "agregarProducto") {
        $controlador->agregarProducto(
            null,
            $_POST["proNombre"],
            $_POST["proDescripcion"],
            $_POST["proPrecio"],
            $_POST["proTipo"],
            $_FILES["proImagen"]
        );
    } elseif ($_GET["accion"] == "editarProducto") {
        $controlador->editarProducto(
            $_POST["productoId"],
            $_POST["nuevoNombre"],
            $_POST["nuevoDescripcion"],
            $_POST["nuevoPrecio"],
            $_POST["nuevoTipo"],
            $_FILES["nuevoImagen"]
        );
    } elseif ($_GET["accion"] == "agregarTipo") {
        $controlador->agregarTipo(
            null,
            $_POST["tipTipo"]
        );
    }
    
    if ($_GET["accion"] == "verificar") {
        if (empty($_POST["usuario"]) || empty($_POST["contraseña"])) {
            $_SESSION['mensaje'] = "El usuario y la contraseña son requeridos.";
            header('Location: index.php?accion=login');
            exit();
        }

        // Llamada al método verificar
        $usuario = $_POST["usuario"];
        $contraseña = $_POST["contraseña"];
        $credencialesCorrectas = $controlador->verificar($usuario, $contraseña);

        if ($credencialesCorrectas) {
            header("Location: index.php?accion=principal");
        } else {
            header("Location: index.php?accion=sinPermiso");
        }
    }
} else {
    $controlador->verPagina('vistas/html/login.php');
}