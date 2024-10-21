<?php
session_start();
require_once 'controlador/controlador.php';
require_once 'modelo/conexion.php';
require_once 'modelo/usuario.php';
require_once 'modelo/gestor_usuario.php';
require_once 'modelo/producto.php';
require_once 'modelo/gestor_producto.php';
require_once 'modelo/Tipo.php';
require_once 'modelo/gestor_tipo.php';
require_once 'modelo/descuentos.php';
require_once 'modelo/gestor_descuentos.php';

$controlador = new Controlador();

if (isset($_GET["accion"])) {
    if ($_GET["accion"] == "login") {
        $controlador->verPagina('vistas/html/login.php');
    } elseif ($_GET["accion"] == "principal") {
        $controlador->listarProductosPrincipal();
    } elseif ($_GET["accion"] == "productosCliente") {
        $controlador->listarProductosClientes();
    } elseif ($_GET["accion"] == "principalUsuario") {
        $controlador->listarProductosUsuario();
    } elseif ($_GET["accion"] == "productos") {
        $controlador->listarProductos();
    } elseif ($_GET["accion"] == "sinPermiso") {
        $controlador->verPagina('vistas/html/sinPermiso.php');
    } elseif ($_GET["accion"] == "crearCliente") {
        $controlador->verPagina('vistas/html/crearCliente.php');
    } elseif ($_GET["accion"] == "cuentaExitosa") {
        $controlador->verPagina('vistas/html/cuentaExitosa.php');
    } elseif ($_GET["accion"] == "perfil") {
        $controlador->verPagina('vistas/html/perfil.php');
    } elseif ($_GET["accion"] == "acercaDe") {
        $controlador->verPagina('vistas/html/acercaDe.php');
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
    } elseif ($_GET["accion"] == "agregarCliente") {
        $controlador->agregarCliente(
            null,
            $_POST["usuNombre"],
            $_POST["usuContraseña"],
            $_POST["usuUsuario"],
            2
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
        $datosUsuario = $controlador->verificar($usuario, $contraseña);

        if ($datosUsuario) {
            // Aquí $datosUsuario contiene todo el registro del usuario
            $_SESSION['usuario_id'] = $datosUsuario['id']; // Accede a los campos correctos
            $_SESSION['usuario_nombre'] = $datosUsuario['nombre']; 
            $_SESSION['usuario_contraseña'] = $datosUsuario['contraseña'];
            $_SESSION['usuario_usuarioN'] = $datosUsuario['usuarioN']; 
            $_SESSION['usuario_tipo'] = $datosUsuario['tipoUsuario'];
            header('Location: index.php?accion=principal');
        } else {
            header("Location: index.php?accion=sinPermiso");
        }
    }
} else {
    $controlador->listarProductosPrincipal();
}