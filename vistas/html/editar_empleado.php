<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="shortcut icon" href="vistas/images/favicon.png" type="">

  <title>ChampiLoco(Editar empleado)</title>

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

<body>

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
                <a class="nav-link" href="index.php?accion=principal">Inicio<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?accion=productos">Productos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?accion=acercaDe">Acerca de </a>
              </li>
              <li class="nav-item active">
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
    
<!-- Sección de empleados -->
  <?php
  require_once 'modelo/conexion.php';

  $conexion = new Conexion();
  $enlace = $conexion->abrir();

  // Procesar actualización
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
      $id = $_POST["id"];
      $nombre = $_POST["nombre"];
      $usuario = $_POST["usuario"];
      $contraseña = $_POST["contraseña"];

      $stmt = $enlace->prepare("UPDATE usuarios SET nombre=?, usuarioN=?, contraseña=? WHERE id=? AND tipoUsuario = 2");
      $stmt->bind_param("sssi", $nombre, $usuario, $contraseña, $id);
      $stmt->execute();
      echo "Empleado actualizado.<br>";
      $stmt->close();
  }

  // Mostrar empleados
  $result = $enlace->query("SELECT * FROM usuarios WHERE tipoUsuario = 2");

  echo "<h2>Editar Empleado</h2>";
  while ($row = $result->fetch_assoc()) {
      echo "<form method='post'>
          <input type='hidden' name='id' value='{$row['id']}'>
          Nombre: <input type='text' name='nombre' value='{$row['nombre']}'>
          Usuario: <input type='text' name='usuario' value='{$row['usuarioN']}'>
          Contraseña: <input type='text' name='contraseña' value='{$row['contraseña']}'>
          <input type='submit' value='Actualizar'>
      </form><hr>";
  }

  $conexion->cerrar();
  ?>
<!-- Fin de Sección de empleados -->


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
            Estamos disponibles
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