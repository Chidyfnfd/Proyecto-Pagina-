<?php
class controlador
{
    public function verPagina($ruta)
    {
        require_once $ruta;
    }
    public function verificar($usuarioN, $contraseña)
    {
        $usuario = new Usuario(null, null, $contraseña, $usuarioN); // Asigna null a id y nombre
        $gestorUsuario = new GestorUsuario();
        $resultado = $gestorUsuario->busqueda($usuario);

        if ($resultado) {
            // Devuelve los datos completos del usuario
            return $resultado;
        } else {
            return false;
        }
    }

    public function agregarCliente($id, $nombre, $contraseña, $usuarioN, $tipoUsuario)
    {

        $usuario = new Usuario($id, $nombre, $contraseña, $usuarioN, $tipoUsuario);
        $gestor = new GestorUsuario();
        $registros = $gestor->agregarCliente($usuario);

        if ($registros > 0) {
            $_SESSION['mensaje'] = "Cliente creado exitosamente.";
            header("Location: index.php?accion=login");
            exit();
        } else {
            $_SESSION['mensaje'] = "Error al crear el cliente.";
            header("Location: index.php?accion=crearCliente");
            exit();
        }
    }
    public function agregarProducto($id, $nombre, $descripcion, $precio, $tipo, $imagenFile)
    {
        $imagenPath = $this->subirImagen($imagenFile);

        if ($imagenPath === null) {
            echo "<script>
                alert('Error al subir la imagen.');
                window.location.href='index.php?accion=clientes&clierror=true';
            </script>";
            return;
        }

        $producto = new Producto($id, $nombre, $descripcion, $precio, $tipo, $imagenPath);
        $gestor = new GestorProducto();
        $registros = $gestor->agregarProducto($producto);

        if ($registros > 0) {
            echo "<script>
                window.location.href = 'index.php?accion=productos';
            </script>";
        } else {
            echo "<script>
                window.location.href='index.php?accion=clientes&clierror=true';
            </script>";
        }
    }

    private function subirImagen($file)
    {
        $targetDirectory = "vistas/images/";

        if (!is_dir($targetDirectory)) {
            mkdir($targetDirectory, 0755, true);
        }

        $targetFile = $targetDirectory . basename($file["name"]);

        $check = getimagesize($file["tmp_name"]);
        if ($check === false) {
            return null;
        }

        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            return basename($file["name"]);
        } else {
            return null;
        }
    }

    public function listarProductos()
    {
        $gestorProducto = new GestorProducto();
        $gestorTipo = new GestorTipo();
        $gestorDescuento = new GestorDescuento();
        $resultProducto = $gestorProducto->listarProductos();
        $resultTipo = $gestorTipo->listarTipos();
        $resultDescuento = $gestorDescuento->listarDescuentos();
        require_once 'vistas/html/productos.php';
    }

    public function listarProductosUsuario()
    {
        $gestorProducto = new GestorProducto();
        $gestorTipo = new GestorTipo();
        $resultProducto = $gestorProducto->listarProductos();
        $resultTipo = $gestorTipo->listarTipos();
        require_once 'vistas/html/principalUsuario.php';
    }

    public function listarProductosPrincipal()
    {
        $gestorProducto = new GestorProducto();
        $gestorTipo = new GestorTipo();
        $resultProducto = $gestorProducto->listarProductos();
        $resultTipo = $gestorTipo->listarTipos();
        require_once 'vistas/html/principal.php';
    }
    public function listarProductosClientes()
    {
        $gestorProducto = new GestorProducto();
        $gestorTipo = new GestorTipo();
        $resultProducto = $gestorProducto->listarProductos();
        $resultTipo = $gestorTipo->listarTipos();
        require_once 'vistas/html/productosCliente.php';
    }

    public function editarProducto($id, $nombre, $descripcion, $precio, $tipo, $imagenFile)
    {
        // Verifica si se ha subido una nueva imagen
        $imagenPath = null;

        // Si hay una imagen nueva, sube la imagen
        if (!empty($imagenFile['tmp_name'])) {
            $imagenPath = $this->subirImagen($imagenFile);
        }

        // Si no se ha subido una nueva imagen, mantén la imagen actual
        if ($imagenPath === null) {
            $gestor = new GestorProducto();
            $productoActual = $gestor->obtenerProductoPorId($id);
            $imagenPath = $productoActual->obtener_imagen(); // Mantiene la imagen existente
        }

        // Crea el objeto del producto con la información actualizada
        $producto = new Producto($id, $nombre, $descripcion, $precio, $tipo, $imagenPath);

        // Realiza la actualización del producto
        $gestor = new GestorProducto();
        $registros = $gestor->editarProducto($producto);

        // Verifica si la edición fue exitosa
        if ($registros > 0) {
            echo "<script>
                window.location.href = 'index.php?accion=productos';
            </script>";
        } else {
            echo "<script>
                window.location.href='index.php?accion=clientes&clierror=true';
            </script>";
        }
    }

    public function agregarTipo($id, $tipo)
    {
        $tipo = new Tipo($id, $tipo);
        $gestor = new GestorTipo();
        $registros = $gestor->agregarTipo($tipo);

        if ($registros > 0) {
            echo "<script>
                window.location.href = 'index.php?accion=productos';
            </script>";
        } else {
            echo "<script>
                window.location.href='index.php?accion=clientes&clierror=true';
            </script>";
        }
    }
}