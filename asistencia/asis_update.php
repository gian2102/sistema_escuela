<?php
// Paso 1: Conexión a la base de datos
$con = conectar();

// Paso 2: Recuperar los datos del formulario
$alumno_id = $_POST['alumno_id'];
$fecha = $_POST['fecha'];
$asistencia = $_POST['asistencia'];
$observacion = $_POST['observacion'];

// Paso 3: Insertar los datos en la tabla tb_asistencia
$sql_insert = "INSERT INTO tb_asistencia (alumno_id, fecha, asistencia, observacion)
               VALUES ('$alumno_id', '$fecha', '$asistencia', '$observacion')";

if (mysqli_query($con, $sql_insert)) {
  // La inserción se realizó correctamente
  echo "Los datos de asistencia se han registrado correctamente.";
} else {
  // Si ocurre algún error en la inserción
  echo "Error: " . mysqli_error($con);
}

// Cerrar la conexión a la base de datos
mysqli_close($con);
?>
