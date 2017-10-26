
<?php


if ((empty($argv[1]))) {
    echo 'Datos faltantes';
	die;
}else{

$txt = $argv[1];

// Consultar la base de datos
$con = mysqli_connect("localhost","root","","rally") or die ("Error de conexion");
$consulta = "SELECT e.cedula, e.nombre, e.apellidos, c.nombre, es.fecha FROM estudiante as e, estudiante_carrera as es, carrera as c WHERE e.cedula = es.id_estudiante AND c.nombre = es.id_carrera";
$ejecutar = mysqli_query($con,$consulta);



while ($row = mysqli_fetch_assoc($ejecutar)) {
    print_r($row);

    $file = fopen($txt, "a");
    fwrite($file, "$row\n" .PHP_EOL);
    fclose($file);   
    
}    
}
    
    ?>