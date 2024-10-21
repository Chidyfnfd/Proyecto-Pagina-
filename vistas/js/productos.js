// Modal Agregar Producto
const myModal1 = document.getElementById('exampleModal');
const myInput1 = document.getElementById('myInput');

myModal1.addEventListener('shown.bs.modal', () => {
    myInput1.focus();
});

// Modal Editar Producto
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

// Modal Agregar Producto
const myModal2 = document.getElementById('exampleModal2');
const myInput2 = document.getElementById('myInput');

myModal1.addEventListener('shown.bs.modal', () => {
    myInput2.focus();
});

$(document).ready(function () {
    // Evento de clic para los filtros
    $('.filters_menu li').click(function () {
        var filterValue = $(this).attr('data-filter');

        // Cambia la clase activa
        $('.filters_menu li').removeClass('active');
        $(this).addClass('active');

        // Filtra los productos
        $('.grid .col-sm-6, .grid .col-lg-4').hide(); // Ocultar todos los productos
        if (filterValue === '*') {
            $('.grid .col-sm-6, .grid .col-lg-4').show(); // Mostrar todos
        } else {
            $(filterValue).show(); // Mostrar solo los que coinciden
        }
    });
});

function editarDescuento(id, nombre, descuento, estado, imagen) {
    // Cargar los valores en los campos del modal
    document.getElementById('descuentoId').value = id;
    document.getElementById('productoNombre').value = nombre;
    document.getElementById('porcentajeDescuento').value = descuento;
    document.getElementById('estadoDescuento').value = estado;
    
    // Actualizar la vista previa de la imagen
    document.getElementById('imgDescuentoPreview').src = 'vistas/images/' + imagen;
  
    // Abrir el modal
    var modal = new bootstrap.Modal(document.getElementById('exampleModal4'));
    modal.show();
  }