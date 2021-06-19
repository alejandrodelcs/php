<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$aEmpleados = array();
$aEmpleados[] = array("dni" => 333300123, "nombre" => "David García", "bruto" => 85000.30);
$aEmpleados[] = array("dni" => 12635341, "nombre" => "Ana del Valle", "bruto" => 90000);
$aEmpleados[] = array("dni" => 1461333, "nombre" => "Andrés Perez", "bruto" => 100000);
$aEmpleados[] = array("dni" => 35567233, "nombre" => "Victoria Luz", "bruto" => 70000);

function calcularNeto($bruto){
    return $bruto-($bruto*0.17);
}

?>