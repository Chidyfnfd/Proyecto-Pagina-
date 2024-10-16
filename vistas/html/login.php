<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="index.php?accion=verificar" autocomplete="nope" class="login__form autocomplete-off" method="post">
        <label for="">usuario</label>
        <input type="text" name="usuario"></input> 
        <label for="">contraseña</label>
        <input type="password" name="contraseña"></input> 
        <button type="submit">Ingresar</button>
    </form>
</body>
</html>