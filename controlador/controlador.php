<?php
class controlador
{
    public function verPagina($ruta)
    {
        require_once $ruta;
    }
    public function verificar($usuario, $contraseña)
    {
        $usuario = new Usuario($usuario, $contraseña);
        $gestorUsuario = new GestorUsuario();
        return $gestorUsuario->busqueda($usuario);
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
        $resultProducto = $gestorProducto->listarProductos();
        $resultTipo = $gestorTipo->listarTipos();
        require_once 'vistas/html/productos.php';
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
}