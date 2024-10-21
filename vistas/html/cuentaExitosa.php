<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Cuenta exitosa</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="vistas/images/favicon.png" rel="icon">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Template Stylesheet -->
    <script src="vistas/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Incluir jQuery UI desde CDN -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="vistas/css/styleLogin.css" rel="stylesheet">


</head>

<body>
    <div class="login">
        <img src="vistas/images/granja.jpg" alt="login image" class="login__img">

        <form action="index.php?accion=crearCliente" autocomplete="nope" class="login__form autocomplete-off" method="post">
            <div class="home-img1">
                <img src="vistas/images/Logo.png" alt="">

            </div>
            <button type="submit" class="login__button" formaction="?accion=login">Inicia Sesion con tu nueva cuenta</button>          
        </form>
        <?php if(isset($_SESSION['mensaje'])) {?>
        <div class='mensaje'>
            <p><?php echo $_SESSION['mensaje'] ?></p>
        </div>
        <?php unset($_SESSION['mensaje']); }  ?>  

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- Template Javascript -->
    <script src="vistas/js/scriptLogin.js"></script>
</body>

</html>