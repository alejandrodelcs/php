<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Inicia sesion
session_start();

$claveEncriptada = password_hash("admin123", PASSWORD_DEFAULT);

if ($_POST) {

    $usuario = trim($_REQUEST["txtUsuario"]);
    $clave = trim($_REQUEST["txtClave"]);

    if ((password_verify($clave, $claveEncriptada)) && ($usuario == "admin")) //valida si el usuario y contraseña es válido
    {
        $_SESSION["usuario"] = $usuario;
        header("location:ventas.php");
    } else {
        $mensaje = " Usuario y/o Contraseña no válidos. Por favor, inténtalo de nuevo."; 
    }
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
    <title>Login</title>
</head>

<body id="index">
    <main class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1><i class="fas fa-user"></i> Iniciar Sesión</h1>
            </div>
            <?php if (isset($mensaje) && $mensaje != "") : ?>
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        <?php echo $mensaje ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-12">
            <form action="" method="POST">
                <div class="form-group text-center">
                    <label for="txtUsuario">Usuario</label>
                    <input type="text" id="txtUsuario" name="txtUsuario" class="form-control" value="" />
                </div>
                <div class="form-group text-center">
                    <label for="txtClave">Contraseña</label>
                    <input type="password" id="txtClave" name="txtClave" class="form-control" value=""/>
                </div>
                <div class="form-group custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-label" />
                    <label for="customCheck">Recordarme</label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Entrar</button>
                </div>
            </form>
            </div>
        </div>
    </main>
</body>

</html>