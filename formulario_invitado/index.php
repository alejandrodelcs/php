<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('error_reporting', E_ALL);

$aInvitados = array("alejandro", "pedro", "omar", "pablo", "maria", "lucero", "paola");
$aPulseras = array("verde","azul","rojo");
if ($_POST) {

    if (isset($_REQUEST['btnProcesar'])) {

        $nombre = trim($_REQUEST['txtNombre']);

        if (in_array($nombre, $aInvitados)) {
            $aMensaje = array(
                "texto" => "Bienvenido a la fiesta",
                "estado" => "success"
            );
        } else {
            $aMensaje = array(
                "texto" => "No se encuentra en la lista de invitados",
                "estado" => "danger"
            );
        }
    } else if (isset($_REQUEST['btnPase'])) {

        $txtVip = trim($_REQUEST['txtVip']);

        if (in_array($txtVip, $aPulseras))
        {
            $aMensaje = array(
                "texto" => "Aqui tiene su pulsera",
                "estado" => "success"
            );
        }else{
            $aMensaje = array(
                "texto" => "Ud. no tiene pase VIP",
                "estado" => "danger"
            );
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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-3">
                <h1><br>Fiesta</br></h1>
            </div>
        </div>
        <?php if(isset($aMensaje)): ?>
        <div class="col-6">
            <div class="alert alert-<?php echo $aMensaje["estado"]; ?>" role="alert">
                <?php echo $aMensaje["texto"]; ?>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-6">
                <p>complete el formulario: </p>
                <form action="" method="POST">
                    <div class="col-12 form-group">
                        <label for="txtNombre">Nombre: </label>
                        <input type="text" id="txtNombre" class="form-control" name="txtNombre">
                    </div>
                    <div class="row">
                        <div class="col-12 form-group py-3">
                            <button type="submit" name="btnProcesar" class="btn btn-primary">Procesar</button>
                        </div>
                    </div>
                    <div class="col-12 form-group">
                        <label for="txtNombre">Código secreto para el pase VIP: </label>
                        <input type="text" id="txtVip" class="form-control" name="txtVip">
                    </div>
                    <div class="row">
                        <div class="col-12 form-group py-3">
                            <button type="submit" name="btnPase" class="btn btn-primary">Procesar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>