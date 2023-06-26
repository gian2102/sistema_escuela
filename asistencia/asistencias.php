<?php
function conectar_asis(){
    $host="localhost";
    $user="root";
    $pass="";

    $db="db_sistema";
    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$db);
    return $con;
}
$con = conectar_asis();

$us_id = $_GET['us_id'];

$sql = "SELECT * FROM tb_usuario WHERE us_id='$us_id'";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);

$sql_tb = "select * from tb_curso";
$query_tb = mysqli_query($con, $sql_tb);
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
                <?php 
                while ($row_asistencia = mysqli_fetch_array($query_asistencias)) : ?>
                    <tr>
                        <td><?php echo $row_asistencia['fecha']; ?></td>
                        <td><?php echo $row_asistencia['asistencia']; ?></td>
                        <td><?php echo $row_asistencia['observacion']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <script>
        const btn = document.querySelector('#menu-btn');
        const menu = document.querySelector('#sidemenu');
        btn.addEventListener('click', e => {
            menu.classList.toggle("menu-expanded");
            menu.classList.toggle("menu-collapsed");

            document.querySelector('body').classList.toggle('body-expanded');
        });
    </script>
</body>
</html>
