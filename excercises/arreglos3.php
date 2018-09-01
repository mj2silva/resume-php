<?php
    $valores = [23, 54, 32, 67, 34, 78, 98, 56, 21, 34, 57, 92, 12, 5, 61];

    rsort($valores); //ordena los valores de un array de mayor a menor

    echo("Valores máximos: ");
    for ($i = 0; $i < 3; $i++) {
        echo "{$valores[$i]} ";
    };

    sort($valores); //ordena los valores de un array de menor a mayor
    
    echo "</br>Valores mínimos: ";
    
    for ($i = 0; $i < 3; $i++) {
        echo "{$valores[$i]} ";
    };
?>