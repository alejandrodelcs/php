<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('error_reporting', E_ALL);

if (file_exists("archivo.txt")) {
    //Leer el json del archivo
    $jsonClientes = file_get_contents("archivo.txt");
    //Convertir el json a un array $aClientes
    $aClientes = json_decode($jsonClientes, true);
} else {
    $aClientes = array();
}

$id = isset($_REQUEST["id"]) && $_REQUEST["id"] >= 0 ? $_REQUEST["id"] : "";

$nuevoNombre="";

if ($_POST) {

    $dni = trim($_REQUEST["txtDni"]);
    $nombre = trim($_REQUEST["txtNombre"]);
    $telefono = trim($_REQUEST["txtTelefono"]);
    $correo = trim($_REQUEST["txtCorreo"]);

    if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) { //este if nos dice si se subio o no una imagen
        $nombreAleatorio = date("Ymdhmsi") . rand(1000, 5000);
        $archivo_tmp = $_FILES["archivo"]["tmp_name"]; //guarda el archivo en temporal
        $nombreArchivo = $_FILES["archivo"]["name"];
        $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
        $nuevoNombre = "$nombreAleatorio.$extension";
        move_uploaded_file($archivo_tmp, "imagenes/$nuevoNombre");
    }

    if ($id != "") { //Estoy editando un cliente

        //Si no se subio la imagen, mantengo el nombre actual que ya existía de la imagen
        if ($_FILES["archivo"]["error"] !== UPLOAD_ERR_OK) {
            $nuevoNombre = $aClientes[$id]["imagen"];
        } else {
            //Si viene la imagen, elimino la imagen anterior y guardo el nombre de la nueva imagen
            unlink("imagenes/" . $aClientes[$id]["imagen"]); //elimina un archivo
        }

        //Actualiza un cliente existente
        $aClientes[$id] = array(
            "dni" => $dni,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "correo" => $correo,
            "imagen" => $nuevoNombre
        );

    } else { //Es un nuevo cliente
        //Inserta un nuevo cliente
        $aClientes[] = array(
            "dni" => $dni,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "correo" => $correo,
            "imagen" => $nuevoNombre
        );
    }

    $msg  = "Registro guardado con éxito";

    //header("Location: index.php");
    //Convertir el array a json
    $jsonClientes = json_encode($aClientes);

    //Guardar el json en un archivo llamado archivo.txt
    file_put_contents("archivo.txt", $jsonClientes);
}

if ($id != "" && isset($_REQUEST["do"]) && $_REQUEST["do"] == "eliminar") {
    unlink("imagenes/" . $aClientes[$id]["imagen"]);
    //Elimina el cliente del array
    unset($aClientes[$id]);
    //Actualizar el archivo con el nuevo array de aClientes
    $jsonClientes = json_encode($aClientes);
    file_put_contents("archivo.txt", $jsonClientes);
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <title>ABM Clientes</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Registro de Clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="row">
                <?php if (isset($msg)) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $msg; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12 form-group">
                            <label for="txtDni">DNI(*): </label>
                            <input type="text" id="txtDni" class="form-control" name="txtDni" required value="<?php echo isset($aClientes[$id]) ? $aClientes[$id]["dni"] : "" ?>" />
                        </div>
                        <div class=" col-12 form-group">
                            <label for="txtNombre">Nombre(*): </label>
                            <input type="text" id="txtNombre" class="form-control" name="txtNombre" required value="<?php echo isset($aClientes[$id]) ? $aClientes[$id]["nombre"] : "" ?>" />
                        </div>
                        <div class=" col-12 form-group">
                            <label for="txtTelefono">Teléfono: </label>
                            <input type="text" id="txtTelefono" class="form-control" name="txtTelefono" required value="<?php echo isset($aClientes[$id]) ? $aClientes[$id]["telefono"] : "" ?>" ? />
                        </div>
                        <div class=" col-12 form-group">
                            <label for="txtCorreo">Correo: </label>
                            <input type="text" id="txtCorreo" class="form-control" name="txtCorreo" required value="<?php echo isset($aClientes[$id]) ? $aClientes[$id]["correo"] : "" ?>" />
                        </div>
                        <div class="col-12 form-group">
                            <label for="txtImagen">Archivo adjunto:</label>
                            <input type="file" id="archivo" name="archivo" class="form-control-file py-2" accept=".jpg, .jpeg, .png">
                            <small class="d-block">Archivos admitidos: .jpg, .jpeg, .png</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 form-group py-2">
                            <button type="submit" name="btnGuardar" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <table class="table table-hover border">
                    <tr>
                        <th>Imagen</th>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                    <?php
                    foreach ($aClientes as $pos => $cliente) : ?>
                        <tr>
                            <td><img src="imagenes/<?php echo $cliente["imagen"]; ?>" class="img-thumbnail"></td>
                            <td><?php echo $cliente["dni"] ?></td>
                            <td><?php echo $cliente["nombre"] ?></td>
                            <td><?php echo $cliente["correo"] ?></td>
                            <td style="width: 110px;">
                                <a href="index.php?id=<?php echo $pos; ?>"><i class="fas fa-edit"></i></a>
                                <a href="index.php?id=<?php echo $pos; ?>&do=eliminar"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <a href="index.php"><i class="fas fa-plus"></i></a>
    </main>
</body>

</html>