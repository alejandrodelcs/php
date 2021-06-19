<?php
$aNumeros = array(8, 3, 5, 9, 7, 3, 6, 12, 5, 3, 9, 1, 3, 9, 10);

function promediar($aNumeros)
{
    $sumar = 0;
    foreach ($aNumeros as $nota) {
        $sumar += $nota;
    }
    return $sumar/count($aNumeros);
}

echo "El promedio es " . promediar($aNumeros) . "<br>";


function maximo($aNumeros){
    $mayor = $aNumeros[0];
    foreach($aNumeros as $nota){
        if ($nota>$mayor){
            $mayor = $nota;
        }
    }
    return $mayor;

}

echo "el mayor es ".maximo($aNumeros)."<br>";
