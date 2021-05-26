<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aPacientes =  array();

$aPacientes[] = array(
    "dni" => "33.765.012",
    "nombre" => "Zoila Vaca",
    "edad" => 45,
    "peso" => 81.50
);

$aPacientes[] = array(
    "dni" => "23.684.385",
    "nombre" => "Gonzalo Bustamante",
    "edad" => 66,
    "peso" => 79
);

$aPacientes[] = array(
    "dni" => "123.256.36",
    "nombre" => "Kin Perro",
    "edad" => 66,
    "peso" => 79
);

$aPacientes[] = array(
    "dni" => "23.364.2",
    "nombre" => "Estambul Juan",
    "edad" => 66,
    "peso" => 79
);

$aNotas = array(9, 8, 9.50, 4, 7, 8);


function contar($miArray){
    $cantidad = 0;

    foreach($miArray as $item){
        $cantidad++;
    }

    return $cantidad;
}

echo "Cantidad: ".contar($aPacientes);
echo "<br> Cantidad: ".contar($aNotas);

?>