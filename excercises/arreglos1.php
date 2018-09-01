<?php
$arreglo = [
	'keyStr1' => 'lado',
	0 => 'ledo',
	'keyStr2' => 'lido',
	1 => 'lodo',
	2 => 'ludo'
];

echo "{$arreglo['keyStr1']} {$arreglo[0]} {$arreglo['keyStr2']} {$arreglo[1]} {$arreglo[2]}</br>";
echo "decirlo al revés lo dudo</br>";
echo "{$arreglo[2]} {$arreglo[1]} {$arreglo['keyStr2']} {$arreglo[0]} {$arreglo['keyStr1']}</br>";
echo "¡Qué trabajo me ha costado!</br>";
?>