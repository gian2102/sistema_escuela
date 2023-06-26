<?php
include("conexion.php");
$con = conectar();

if (isset($_POST['buscar'])) {
    $alumno_id = $_POST['alumno_id'];

    // Consulta para obtener la información del alumno
    $sql_alumno = "SELECT * FROM tb_estudiante WHERE est_id='$alumno_id'";
    $query_alumno = mysqli_query($con, $sql_alumno);
    $row_alumno = mysqli_fetch_array($query_alumno);

    // Consulta para obtener las asistencias y faltas del alumno
    $sql_asistencias = "SELECT * FROM tb_asistencia WHERE alumno_id='$alumno_id'";
    $query_asistencias = mysqli_query($con, $sql_asistencias);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Asistencias</title>
</head>
<body>
    <h1>Registro de Asistencias</h1>

    <!-- Formulario de búsqueda -->
    <form action="" method="POST">
        <label for="alumno_id">ID del Alumno:</label>
        <input type="text" name="alumno_id" id="alumno_id" required>
        <input type="submit" name="buscar" value="Buscar">
    </form>

    <?php if (isset($row_alumno)) : ?>
        <h2>Información del Alumno:</h2>
        <p>ID: <?php echo $row_alumno['est_id']; ?></p>
        <p>Nombre: <?php echo $row_alumno['est_nombres']; ?></p>
        <p>Apellidos: <?php echo $row_alumno['est_apellidos']; ?></p>
        <p>Apoderado: <?php echo $row_alumno['est_apoderado']; ?></p>
        <p>Teléfono Apoderado: <?php echo $row_alumno['est_apoderadocel']; ?></p>
        <p>Fecha de Nacimiento: <?php echo $row_alumno['est_fechanac']; ?></p>

        <!-- Tabla de asistencias -->
        <h2>Asistencias y Faltas Registradas:</h2>
        <table>
            <thead>
                <tr>
                    <th>FECHA</th>
                    <th>ASISTENCIA</th>
                    <th>OBSERVACION</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row_asistencia = mysqli_fetch_array($query_asistencias)) : ?>
                    <tr>
                        <td><?php echo $row_asistencia['fecha']; ?></td>
                        <td><?php echo $row_asistencia['asistencia']; ?></td>
                        <td><?php echo $row_asistencia['observacion']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
