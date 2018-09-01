<?php

    $paises = [
                'Peru' => ['Trujillo', 'Cajamarca', 'Tumbes'],
                'Colombia' => ['Bogotá', 'Medellin', 'Barranquilla'],
                'Ecuador' => ['Quito', 'Huaquillas', 'Guayaquil'],
                'Argentina' => ['Rosario', 'Buenos Aires', 'Mendoza'], 
                'Uruguay' => ['Montevideo', 'Rivera', 'Trinidad']
        ];

    foreach ($paises as $nombre => $pais) {
        echo "{$nombre}: {$pais[0]}, {$pais[1]}, {$pais[2]} </br>";
    }

?>