<?php

$con = conectar();

$alumno_id = $_POST['alumno_id'];
$fecha = $_POST['fecha'];
$asistencia = $_POST['asistencia'];
$observacion = $_POST['observacion'];

$sql_insert = "INSERT INTO tb_asistencia (alumno_id, fecha, asistencia, observacion)
               VALUES ('$alumno_id', '$fecha', '$asistencia', '$observacion')";

if (mysqli_query($con, $sql_insert)) {
  echo "Los datos de asistencia se han registrado correctamente.";
} else {
  echo "Error: " . mysqli_error($con);
}

mysqli_close($con);
?>
