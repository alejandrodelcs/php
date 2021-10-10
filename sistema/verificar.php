<?php

include_once "config.php";
include_once "entidades/usuario.php";

$entidadUsuario =  new Usuario();

if(isset($_GET['correo']) && !empty($_GET['correo']) AND isset($_GET['codigo']) && !empty($_GET['codigo'])){
    // Verify data

    $entidadUsuario->confirmado = 0;
    $entidadUsuario->correo = $_GET['correo'];
    $entidadUsuario->codigo = $_GET['codigo'];
    $row = $entidadUsuario->validar();

    if($row > 0){
        // Activa la cuenta
        $entidadUsuario->confirmarUsuario();
        
        include "confirmacion.php";
    }else{
        // URL invalido o cuenta activada 
        echo 'La url no es válida o ya has activado tu cuenta.';
    }
}else{
    // Invalid approach
    echo 'ERROR. Por favor utilice el enlace que ha sido enviado a su correo electrónico';
}

?>