<?php
    for($i=1; $i<101;$i++){
        echo "$i - ";
    }

    echo "\nNumeros Pares\t";

    for($j=2; $j<101;$j+=2){
        echo "$j - ";
    }
    

    echo "\nUso del break corte 60\t";

    $max = 101;
    $pos = 0;
    while($pos<$max){ //NO ES OPTIMO 
        echo "$pos - ";
        if($pos==60){
            print_r("corte del break");
            break;
        }
        $pos++;
    }
?>