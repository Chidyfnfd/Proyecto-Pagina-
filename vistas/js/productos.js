// Modal 1
const myModal1 = document.getElementById('exampleModal');
const myInput1 = document.getElementById('myInput');

myModal1.addEventListener('shown.bs.modal', () => {
    myInput1.focus();
});

function editarProducto(id, nombre, descripcion, precio, tipo, imagen) {
    // Asigna los valores a los campos del modal
    document.getElementById('productoId').value = id;
    document.getElementById('nuevoNombre').value = nombre;
    document.getElementById('nuevoDescripcion').value = descripcion;
    document.getElementById('nuevoPrecio').value = precio;

    // Seleccionar el tipo correcto en el select
    let selectTipo = document.getElementById('nuevoTipo');
    for (let option of selectTipo.options) {
        if (option.value == tipo) {
            option.selected = true;
            break;
        }
    }

    // Previsualiza la imagen actual del producto en el modal
    let imgPreview = document.getElementById('imgPreview');
    imgPreview.src = 'vistas/images/' + imagen;

    // Abre el modal
    var myModal = new bootstrap.Modal(document.getElementById('exampleModal1'));
    myModal.show();

    // Limpia los campos y el backdrop cuando se cierra el modal
    myModal._element.addEventListener('hidden.bs.modal', function () {
        // Limpia los campos del formulario
        document.getElementById('productForm').reset();
        imgPreview.src = ''; // Limpia la vista previa de la imagen
        // Elimina el backdrop manualmente si persiste
        const backdrop = document.querySelector('.modal-backdrop');
        if (backdrop) {
            backdrop.remove();
        }
        // Habilita el desplazamiento en el cuerpo
        document.body.style.overflow = ''; // Asegúrate de que el desplazamiento esté habilitado
    });
}