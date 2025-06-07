<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="shortcut icon" href="vistas/images/favicon.png" type="">

  <title>ChampiLoco(Productos)</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="vistas/css/bootstrap.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
    integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
    crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="vistas/css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="vistas/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="vistas/css/responsive.css" rel="stylesheet" />
  <link href="vistas/css/stylePrincipal.css" rel="stylesheet" />

</head>

<body class="sub_page">

  <div class="hero_area">
    <div class="bg-box">
      <img src="vistas/images/hero-bg.jpg" alt="">
    </div>
    <!-- Cabeza de pagina-->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php?accion=principal">
            <span>
              ChampiLoco
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto ">
              <li class="nav-item">
                <a class="nav-link" href="index.php?accion=principal">Inicio</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="index.php?accion=productos">Productos<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?accion=acercaDe">Acerca de </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?accion=reserva">Reserva Ahora</a>
              </li>
            </ul>
            <div class="user_option">
              <a href="index.php?accion=destruirSesion" class="user_link">
                <i class="ri-door-open-fill" aria-hidden="true"></i>
              </a>
              <a class="cart_link" href="index.php?accion=reserva">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                  <path
                    d="M4.00436 6.41686L0.761719 3.17422L2.17593 1.76001L5.41857 5.00265H20.6603C21.2126 5.00265 21.6603 5.45037 21.6603 6.00265C21.6603 6.09997 21.6461 6.19678 21.6182 6.29L19.2182 14.29C19.0913 14.713 18.7019 15.0027 18.2603 15.0027H6.00436V17.0027H17.0044V19.0027H5.00436C4.45207 19.0027 4.00436 18.5549 4.00436 18.0027V6.41686ZM5.50436 23.0027C4.67593 23.0027 4.00436 22.3311 4.00436 21.5027C4.00436 20.6742 4.67593 20.0027 5.50436 20.0027C6.33279 20.0027 7.00436 20.6742 7.00436 21.5027C7.00436 22.3311 6.33279 23.0027 5.50436 23.0027ZM17.5044 23.0027C16.6759 23.0027 16.0044 22.3311 16.0044 21.5027C16.0044 20.6742 16.6759 20.0027 17.5044 20.0027C18.3328 20.0027 19.0044 20.6742 19.0044 21.5027C19.0044 22.3311 18.3328 23.0027 17.5044 23.0027Z">
                  </path>
                </svg>
              </a>
              <?php
              if (isset($_SESSION['usuario_id'])) {
                if ($_SESSION['usuario_tipo'] == 1) {
                  // Mostrar opciones solo para administradores
                  echo "<a class='text-light' href='index.php?accion=perfil'><i class='ri-admin-fill'></i></a>";
                } else {
                  // Mostrar opciones para clientes
                  echo "<a class='text-light' href='index.php?accion=perfil'><i class='ri-user-settings-fill'></i></a>";
                }
              } else {
                // Mostrar opciones para usuarios no autenticados
                echo "<a class='text-light' href='index.php?accion=login'> <i class='ri-user-follow-fill'></i>INICIAR SESION</a>";
              }
              ?>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- Cabeza de pagina-->
  </div>

  <!-- Buscador de Producto-->
   <section class="">
      <form method="GET" action="index.php">
        <input type="hidden" name="accion" value="buscarProducto">
          <input type="text" name="termino" placeholder="Buscar producto..." required>
          <button type="submit">Buscar</button>
      </form>
    </section>
  <!-- Fin buscador de Producto-->

  <!-- Seccion de descuentos -->
  
  <section class="offer_section layout_padding-bottom">
    <div class="heading_container heading_center options">
      <h2>
        DESCUENTOS
        <?php
        if (isset($_SESSION['usuario_id'])) {
          if ($_SESSION['usuario_tipo'] == 1) {
            // Mostrar opciones solo para administradores
            echo "<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal3'>
          +
        </button>";
          }
        }
        ?>
      </h2>

    </div>
    <div id="descuentos" class="offer_container">
      <div class="container">
        <div class="row">
          <!-- descuento 1 -->
          <?php
          foreach ($resultDescuento as $producto) {
            // Calcula el precio con descuento
            $precioOriginal = $producto['precio'];
            $descuento = $producto['descuento'];
            $precioFinal = $precioOriginal - ($precioOriginal * ($descuento / 100));

            // Manejar estado
            $estado = isset($producto['estado']) ? htmlspecialchars($producto['estado'], ENT_QUOTES) : 'Desconocido';

            // Genera el HTML con los datos del producto
            echo '<div class="col-md-6">';
            echo '  <div class="box">';
            if (isset($_SESSION['usuario_id'])) {
              if ($_SESSION['usuario_tipo'] == 1) {
                // Mostrar opciones solo para administradores
                echo '    <div class="img-box position-relative" data-bs-toggle="modal" data-bs-target="#exampleModal4" onclick="editarDescuento(';
              } else {
                // Mostrar opciones para clientes
                echo '    <div class="img-box position-relative" data-bs-toggle="modal"';
              }
            } else {
              // Mostrar opciones para usuarios no autenticados
              echo '    <div class="img-box position-relative">';
            }
            echo '      \'' . $producto["descuento_id"] . '\',';
            echo '      \'' . htmlspecialchars($producto["nombre"], ENT_QUOTES) . '\',';
            echo '      ' . $producto["descuento"] . ',';
            echo '      \'' . $estado . '\',';
            echo '      \'' . htmlspecialchars($producto["imagen"], ENT_QUOTES) . '\')">';
            echo '      <img src="vistas/images/' . htmlspecialchars($producto["imagen"], ENT_QUOTES) . '" alt="' . htmlspecialchars($producto["nombre"], ENT_QUOTES) . '" class="img-fluid">';
            if (isset($_SESSION['usuario_id'])) {
              if ($_SESSION['usuario_tipo'] == 1) {
                // Mostrar opciones solo para administradores
                echo '      <div class="hover-icon">';
                echo '        <i class="ri-settings-4-fill"></i>';
                echo '      </div>';
              }
            }
            echo '    </div>';
            echo '    <div class="detail-box">';
            echo '      <h5>' . htmlspecialchars($producto["nombre"], ENT_QUOTES) . '</h5>';
            echo '      <h6><span>' . $descuento . '%</span> Off - Precio: $' . $precioFinal . '</h6>';
            echo '      <a href="#"><i class="ri-shopping-cart-2-fill"></i></a>';
            echo '    </div>';
            echo '  </div>';
            echo '</div>';
          }
          ?>
        </div>
      </div>
    </div>
  </section>

  <!--Seccion del Menú-->

  <section id="productos" class="food_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center options">
        <h2>
          PRODUCTOS
          <?php
          if (isset($_SESSION['usuario_id'])) {
            if ($_SESSION['usuario_tipo'] == 1) {
              // Mostrar opciones solo para administradores
              echo "<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
            +
          </button>";
            }
          }
          ?>
        </h2>
      </div>

      <ul class="filters_menu">
        <li class="active" data-filter="*">Todos</li>
        <?php foreach ($resultTipo as $Tipo): ?>
          <li data-filter=".<?php echo htmlspecialchars($Tipo['id']); ?>"><?php echo htmlspecialchars($Tipo['tipo']); ?>
          </li>
        <?php endforeach; ?>
        <?php
        if (isset($_SESSION['usuario_id'])) {
          if ($_SESSION['usuario_tipo'] == 1) {
            // Mostrar opciones solo para administradores
            echo "<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal2'>+</button>";
          }
        }
        ?>
      </ul>

      <!-- Caja Productos -->
      <div class="filters-content">
        <div class="row grid">
          <?php foreach ($resultProducto as $producto): ?>
            <div class="col-sm-6 col-lg-4 all <?php echo htmlspecialchars($producto['tipo']); ?>">
              <div class="box">
                <div>
                  <div class="img-box">
                    <img src="vistas/images/<?php echo htmlspecialchars($producto['imagen']); ?>" alt="">
                  </div>
                  <div class="detail-box">
                    <h5><?php echo htmlspecialchars($producto['nombre']); ?></h5>
                    <p><?php echo htmlspecialchars($producto['descripcion']); ?></p>
                    <div class="options">
                      <h6>$<?php echo htmlspecialchars($producto['precio']); ?></h6>
                      <?php
                      if (isset($_SESSION['usuario_id'])) {
                        if ($_SESSION['usuario_tipo'] == 1) {
                          // Mostrar opciones solo para administradores
                          ?>
                          <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1"
                            onclick="editarProducto('<?php echo $producto['id']; ?>', 
                                       '<?php echo htmlspecialchars($producto['nombre']); ?>',
                                       '<?php echo htmlspecialchars($producto['descripcion']); ?>',
                                       '<?php echo $producto['precio']; ?>',
                                       '<?php echo htmlspecialchars($producto['tipo']); ?>', <!-- Asegúrate de que aquí esté el nombre del tipo -->
                                       '<?php echo htmlspecialchars($producto['imagen']); ?>')">
                            <i class="ri-edit-2-line"></i>
                          </a>
                          <?php
                        } else {
                          // Mostrar opciones para clientes
                          echo "<a class='text-light' href='index.php?accion=#'><i class='ri-whatsapp-line'></i></a>";
                        }
                      } else {
                        // Mostrar opciones para usuarios no autenticados
                        echo "<a class='text-light' href='index.php?accion=login'> <i class='ri-login-circle-fill'></i></a>";
                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
  </section>

  <!-- end food section -->

  <!-- Pie de pagina -->
  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-4 footer-col">
          <div class="footer_contact">
            <h4>
              Contactanos
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="ri-whatsapp-line" aria-hidden="true"></i>
                <span>
                  Whatsapp +57 3000000000
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Llama +57 3000000000
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  correo@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <div class="footer_detail">
            <a href="" class="footer-logo">
              ChampiLoco
            </a>
            <p>
              Tu dosis diaria de locura... ¡con champiñones!
            </p>
            <div class="footer_social">
              <a href="https://www.facebook.com">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="https://www.x.com">
              <i class="ri-twitter-x-line" aria-hidden></i>
              </a>
              <a href="https://co.linkedin.com">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
              <a href="https://www.instagram.com">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
              <a href="https://co.pinterest.com">
                <i class="fa fa-pinterest" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <h4>
            Estamos disponible
          </h4>
          <p>
            Todos los dias
          </p>
          <p>
            10.00 Am -10.00 Pm
          </p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Modal Agregar Producto-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Producto</h1>
        </div>
        <div class="modal-body">
          <form id="productForm" action="index.php?accion=agregarProducto" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="proNombre" class="form-label">Nombre de Producto</label>
              <input type="text" class="form-control" id="proNombre" name="proNombre" required>
            </div>
            <div class="mb-3">
              <label for="proDescripcion" class="form-label">Descripción</label>
              <textarea class="form-control" id="proDescripcion" name="proDescripcion" rows="3" required></textarea>
            </div>
            <div class="mb-3">
              <label for="proPrecio" class="form-label">Precio</label>
              <input type="number" class="form-control" id="proPrecio" name="proPrecio" required>
            </div>
            <div class="mb-3">
              <label for="proTipo" class="form-label">Tipo</label>
              <select class="select-agregar" id="proTipo" name="proTipo" required>
                <option value="" selected="selected">Seleccione un Tipo</option>
                <?php
                if ($resultTipo) {
                  foreach ($resultTipo as $tipo) {
                    echo "<option value='" . $tipo["id"] . "'>" . $tipo["tipo"] . "</option>";
                  }
                }
                ?>
              </select>
            </div>
        </div>
        <div class="mb-3">
          <label for="proImagen" class="form-label">Imagen</label>
          <input type="file" class="form-control" id="proImagen" name="proImagen" accept="image/*" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Editar Producto-->
  <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Producto</h1>
        </div>
        <div class="modal-body">
          <form id="productForm" action="index.php?accion=editarProducto" method="POST" enctype="multipart/form-data">
            <input type="hidden" id="productoId" name="productoId">

            <div class="mb-3">
              <label for="nuevoNombre" class="form-label">Nombre de Producto:</label>
              <input type="text" class="form-control" id="nuevoNombre" name="nuevoNombre" required>
            </div>
            <div class="mb-3">
              <label for="nuevoDescripcion" class="form-label">Descripción:</label>
              <textarea class="form-control" id="nuevoDescripcion" name="nuevoDescripcion" rows="3" required></textarea>
            </div>
            <div class="mb-3">
              <label for="nuevoPrecio" class="form-label">Precio:</label>
              <input type="number" class="form-control" id="nuevoPrecio" name="nuevoPrecio" required>
            </div>
            <div class="mb-3">
              <label for="nuevoTipo" class="form-label">Tipo:</label>
              <br>
              <select class="select-agregar" id="nuevoTipo" name="nuevoTipo" required>
                <option value="" selected="selected">Seleccione un Tipo</option>
                <?php
                if ($resultTipo) {
                  foreach ($resultTipo as $tipo) {
                    echo "<option value='" . $tipo["id"] . "'>" . $tipo["tipo"] . "</option>";
                  }
                }
                ?>
              </select>
            </div>
            <br>
            <br>

            <!-- Vista previa de la imagen -->
            <div class="mb-3">
              <label for="imgPreview" class="form-label">Imagen Actual:</label><br>
              <img id="imgPreview" src="" alt="Imagen del producto" style="max-width: 200px; height: auto;">
            </div>
            <div class="mb-3">
              <label for="nuevoImagen" class="form-label">Cambiar Imagen:</label>
              <input type="file" class="form-control" id="nuevoImagen" name="nuevoImagen" accept="image/*">
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Agregar Tipo-->
  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Tipo</h1>
        </div>
        <div class="modal-body">
          <form id="TipoForm" action="index.php?accion=agregarTipo" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="tipTipo" class="form-label">Nombre del Tipo</label>
              <input type="text" class="form-control" id="tipTipo" name="tipTipo" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Agregar Descuento -->
  <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modalAgregarDescuentoLabel">Agregar Descuento</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="descuentoForm" action="index.php?accion=agregarDescuento" method="POST">
            <div class="mb-3">
              <label for="productoId" class="form-label">Seleccionar Producto</label>
              <select class="form-control" id="productoId" name="productoId" required>
                <option value="" selected="selected">Seleccione un Producto</option>
                <?php
                if ($resultProducto) {
                  foreach ($resultProducto as $producto) {
                    echo "<option value='" . $producto["id"] . "'>" . $producto["nombre"] . " - $" . $producto["precio"] . "</option>";
                  }
                }
                ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="porcentajeDescuento" class="form-label">Porcentaje de Descuento</label>
              <input type="number" class="form-control" id="porcentajeDescuento" name="porcentajeDescuento" min="0"
                max="100" step="1" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar Descuento</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Editar Descuento -->
  <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editarDescuentoModalLabel">Editar Descuento</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="descuentoForm" action="index.php?accion=editarDescuento" method="POST"
            enctype="multipart/form-data">
            <!-- Campo oculto para el ID del descuento -->
            <input type="hidden" id="descuentoId" name="descuentoId">

            <div class="mb-3">
              <label for="productoNombre" class="form-label">Nombre de Producto:</label>
              <input type="text" class="form-control" id="productoNombre" name="productoNombre" readonly>
            </div>

            <div class="mb-3">
              <label for="porcentajeDescuento" class="form-label">Porcentaje de Descuento (%):</label>
              <input type="number" class="form-control" id="porcentajeDescuento" name="porcentajeDescuento" min="0"
                max="100" required>
            </div>

            <div class="mb-3">
              <label for="estadoDescuento" class="form-label">Estado:</label>
              <br>
              <select class="form-select" id="estadoDescuento" name="estadoDescuento" required>
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
              </select>
            </div>

            <!-- Vista previa de la imagen -->
            <div class="mb-3">
              <label for="imgDescuentoPreview" class="form-label">Imagen del Producto:</label><br>
              <img id="imgDescuentoPreview" src="" alt="Imagen del producto" style="max-width: 200px; height: auto;">
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- Pie de pagina -->

  <!-- jQery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
  <!-- bootstrap js -->
  <script src="vistas/js/bootstrap.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="vistas/js/custom.js"></script>
  <script src="vistas/js/productos.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>