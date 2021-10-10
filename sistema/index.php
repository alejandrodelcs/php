<?php
    include_once "config.php";
    include_once "entidades/usuario.php";

    $usuario = new Usuario();
    $aUsuarios =  $usuario->obtenerTodos();


    if ($_POST) {
        foreach ($aUsuarios as $usuario) {
            $claveEncriptada = $usuario->clave;
    
            $correo = trim($_REQUEST["txtCorreo"]);
            $claveIngresada = trim($_REQUEST["txtClave"]);


            if ($usuario->verificarClave($claveIngresada, $claveEncriptada) && ($correo == $usuario->correo) && ($usuario->confirmado == 1)) //valida si el usuario y contraseña es válido
            {
                $mensaje = "ingreso correcto";
            } else {
                $mensaje = " Usuario y/o Contraseña no válidos. Asegúrese de introducir los datos correctos y de haber activado su cuenta..";
            }
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
        <div class="row col-md-12 text-center">


            <?php if (isset($mensaje) && $mensaje != "") : ?>
                <div class="alert alert-danger" onclick="" role="alert">
                    <?php echo $mensaje ?>
                </div>
            <?php endif; ?>

        
            <form action="" method="POST">

                <img class="text-center" src="" style="clip-path: circle(30% at 50% 50%);">
                <h1><i class="fas fa-user text-center"></i> Iniciar Sesión</h1>

                <div class="form-group text-center">
                    <label for="txtUsuario">Correo</label>
                    <input type="text" id="txtCorreo" name="txtCorreo" class="form-control" value="" />
                </div>
                <div class="form-group text-center">
                    <label for="txtClave">Contraseña</label>
                    <input type="password" id="txtClave" name="txtClave" class="form-control" value="" />
                </div>
                <div class="form-group custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-label" />
                    <label for="customCheck">Recordarme</label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Entrar</button>
                    <a href="crear-cuenta.php" class="btn btn-success">Registrarme</a>
                </div>
            </form>

        </div>
    </main>
</body>

</html>