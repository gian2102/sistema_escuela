<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_sistema";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error al conectar con la base de datos: " . $conn->connect_error);
}

// Obtener el ID del alumno y el estado de asistencia desde la solicitud POST
$alumno_id = $_POST['alumno_id'];
$asistencia = $_POST['asistencia'];

// Obtener la fecha actual
$fecha = date('Y-m-d');

// Insertar la asistencia en la tabla asistencia_alumnos
$sql = "INSERT INTO asistencia_alumnos (alumno_id, fecha, asistencia)
        VALUES ('$alumno_id', '$fecha', '$asistencia')";

if ($conn->query($sql) === TRUE) {
    echo "La asistencia se ha guardado correctamente.";
} else {
    echo "Error al guardar la asistencia: " . $conn->error;
}

$conn->close();
?>
