<?php
include_once "config.php";
include_once "entidades/usuario.php";

$entidadUsuario =  new Usuario();
$entidadUsuario->cargarFormulario($_REQUEST);


if ($_POST) {
    if (isset($_POST["btnRegistrar"])) {

        $clave = trim($_REQUEST["txtClave"]);
        $claveValida = trim($_REQUEST["txtClaveValida"]);
        //Es nuevo
        if ($clave == $claveValida){
            $entidadUsuario->generarCodigoAlfanumerico();
            echo "se ha registrado, Por favor revisar su email";        
            include "enviar-email.php";
            if($enviado){
                $entidadUsuario->confirmado = 0;
                $entidadUsuario->insertar();
                $mensajeEnvioCorrecto;

            }else {
                $mensajeEnvioIncorrecto;
            }
        }else{

            echo "La contraseña que ingreso no coincide. Vuelva a ingresar";
            
            header("Location:index.php");
        }
    }
}

?>