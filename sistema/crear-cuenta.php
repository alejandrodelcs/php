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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Registro</title>
</head>
<body id="index">
    <div class="container row justify-content-md-center">
      
        <form class="col-3" action="registrar.php" method="POST">
            <h1>Registro</h1>
            <div class="form-group mb-3">
                <label for="txtNombre">Nombre</label>
                <input type="text" id="txtNombre" name="txtNombre" class="form-control" value"" required/>
            </div>
            <div class="form-group mb-3">
                <label for="txtCorreo">Email</label>
                <input type="text" id="txtCorreo" name="txtCorreo" class="form-control" value"" required/>
            </div>
            <div class="form-group mb-3">
                <label for="txtClave">Contraseña</label>
                <input type="password" id="txtClave" name="txtClave" class="form-control" value"" required/>
            </div>
            <div class="form-group mb-3">
                <label for="txtClaveValida">Confirmar Contraseña</label>
                <input type="password" id="txtClaveValida" name="txtClaveValida" class="form-control" value"" required/>
            </div>
            <div class="form-group mb-3">
                <button type="submit" class="btn btn-dark"  id="btnRegistrar" name="btnRegistrar">Registrar</button>
            </div>
        </form>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/sweetAlert.js"></script>
</body>
    
</html>