<?php

//Sumar 60 minutos e ir informando la hora y minutos en pantalla.

//Modificar el ejercicio para que la variable $hr sea 23

//Probar que el ejercicio muestre las 0:10




$hr = date("H");
$min = date("i");
echo "La hora es $hr:$min hs. <br>";


for($i=0; $i < 60; $i++){
    echo "La hora es ". (($hr >= 0 && $hr <= 9)? "0$hr" : $hr)  .":" . (($min >= 0 && $min <= 9)? "0$min" : $min) . "<br>";
    $min++;
    if($min == 60){
        $min = 0;
        $hr++;
    }

    if ($hr == 24){
        $hr = 0;
    }
}

?>