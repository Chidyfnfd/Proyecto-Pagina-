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

        // Crea el objeto Producto con la ruta de la imagen
        $producto = new Producto($id, $nombre, $descripcion, $precio, $tipo, $imagenPath);
        $gestor = new GestorProducto();
        $registros = $gestor->agregarProducto($producto);

        if ($registros > 0) {
            echo "<script>
                window.location.href='index.php?accion=clientes&clisuccess=true';
            </script>";
        } else {
            echo "<script>
                window.location.href='index.php?accion=clientes&clierror=true';
            </script>";
        }
    }

    private function subirImagen($file)
{
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($file["name"]);
    
    // Verifica si la imagen se subió correctamente
    if (move_uploaded_file($file["tmp_name"], $targetFile)) {
        // Retorna solo el nombre del archivo o la ruta relativa
        return basename($file["name"]); // O puedes retornar directamente $targetFile si necesitas la ruta completa
    } else {
        // Maneja el error de subida si es necesario
        return null; // O lanza una excepción
    }
}

    public function listarCliente()
    {
        $gestor = new Gestor();
        $resultClientes = $gestor->listarClientes();
        require_once 'Vista/html/clientes.php';
    }
}