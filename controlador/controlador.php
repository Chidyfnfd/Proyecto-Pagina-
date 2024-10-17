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
        return $gestorUsuario->busqueda($usuario); // Retorna el resultado de la búsqueda
    }

    public function agregarProducto($id, $nombre, $descripcion, $precio, $tipo, $imagenFile)
    {
        // Llama a la función para subir la imagen y obtiene la ruta de la imagen
        $imagenPath = $this->subirImagen($imagenFile);

        // Si la imagen no se pudo subir, manejar el error
        if ($imagenPath === null) {
            echo "<script>
                alert('Error al subir la imagen.');
                window.location.href='index.php?accion=clientes&clierror=true';
            </script>";
            return;
        }

        // Crea el objeto Producto con la ruta de la imagen
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
    
        // Verificar si la carpeta existe, si no, crearla
        if (!is_dir($targetDirectory)) {
            mkdir($targetDirectory, 0755, true);
        }
    
        $targetFile = $targetDirectory . basename($file["name"]);
    
        // Verifica si se trata de un archivo de imagen
        $check = getimagesize($file["tmp_name"]);
        if ($check === false) {
            return null; // No es una imagen válida
        }
    
        // Verifica si la imagen se subió correctamente
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            return basename($file["name"]); // Retorna solo el nombre del archivo
        } else {
            return null; // Retorna null si hubo un error
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
}