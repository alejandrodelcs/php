<?php


include_once "config.php";
include_once "entidades/usuario.php";


$entidadUsuario =  new Usuario();
$entidadUsuario->cargarFormulario($_REQUEST);


if ($_POST) {
    if (isset($_POST["btnGuardar"])) {
        if (isset($_GET["id"]) && $_GET["id"] > 0) {
            //Actualizo un  registro existente
            $entidadUsuario->actualizar();
        } else {
            //Es nuevo
            $entidadUsuario->insertar();
            header("Location: usuarios-listado.php");
        }

        $msg["texto"] = "Guardado correctamente";
        $msg["codigo"] = "alert-success";

    } else if (isset($_POST["btnBorrar"])) {
        $entidadUsuario->eliminar();
        header("Location: usuario-formulario.php");
        $msg["texto"] = "Se ha eliminado el registro";
        $msg["codigo"] = "alert-danger";
    }
}


if (isset($_GET["id"]) && $_GET["id"] > 0) {
    $entidadUsuario->obtenerPorId();
}


include_once("header.php");
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <?php if (isset($msg)) : ?>
        <div class="row">
            <div class="col-12">
                <div class="alert <?php echo $msg["codigo"]; ?>" role="alert">
                    <?php echo $msg["texto"]; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Usuarios</h1>
    <div class="row">
        <div class="col-12 mb-3">
            <a href="usuarios-listado.php" class="btn btn-primary mr-2">Listado</a>
            <a href="usuario-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
            <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
            <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
        </div>
    </div>
    <div class="row">
        <div class="col-6 form-group">
            <label for="txtentidadUsuario">Usuario:</label>
            <input type="text" class="form-control" name="txtUsuario" id="txtUsuario" value="<?php echo $entidadUsuario->usuario ?>" required>
        </div>
        <div class="col-6 form-group">
            <label for="txtNombre">Nombre:</label>
            <input type="text" class="form-control" name="txtNombre" id="txtNombre" value="<?php echo $entidadUsuario->nombre ?>" required>
        </div>
        <div class="col-6 form-group">
            <label for="txtApellido">Apellido:</label>
            <input type="" class="form-control" name="txtApellido" id="txtApellido" required value="<?php echo $entidadUsuario->apellido ?>" required>
        </div>
        <div class="col-6 form-group">
            <label for="txtCorreo">Correo:</label>
            <input type="text" class="form-control" name="txtCorreo" id="txtCorreo" value="<?php echo $entidadUsuario->correo ?>" required>
        </div>
        <div class="col-6 form-group">
            <label for="txtClave"">Contraseña:</label>
            <input type="password" class="form-control" name="txtClave" id="txtClave" value="<?php echo $entidadUsuario->clave ?>" required>
                <small>Completar únicamente para cambiar la clave</small>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?php include_once("footer.php"); ?>
</div>