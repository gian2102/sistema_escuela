<?php
function conectar_asistencia(){
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "db_sistema";

    $con = mysqli_connect($host, $user, $pass);

    mysqli_select_db($con, $db);
    return $con;
}

$con = conectar_asistencia();

$us_id = '';

if (isset($_GET['us_id'])) {
    $us_id = $_GET['us_id'];
    $sql = "SELECT * FROM tb_usuario WHERE us_id='$us_id'";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($query);

    $sql_tb = "SELECT * FROM tb_asistencia WHERE alumno_id='$us_id'";
    $query_tb = mysqli_query($con, $sql_tb);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sidemenu.css">
    <title>Sistema Escuela</title>
</head>

<body>
    <?php
        $url = "../extensiones/head.php";
        include_once ($url);
    ?>
    <h1 class="title-modules">ASISTENCIA</h1>

    <div id="main-container" class="table-responsive">
        <div>
            <form method="GET" action="">
                <input type="text" name="us_id" placeholder="ID del alumno" required>
                <button type="submit">Buscar</button>
            </form>
            <?php if ($us_id && mysqli_num_rows($query_tb) > 0) { ?>
            <table class="custom-table">
                <thead> 
                    <tr>
                        <th>ALUMNO ID</th>
                        <th>FECHA</th>
                        <th>ASISTENCIA</th>
                        <th>OBSERVACIÓN</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row_tb = mysqli_fetch_array($query_tb)) {
                        ?>
                        <tr>
                            <td><?php echo $row_tb['alumno_id'] ?></td>
                            <td><?php echo $row_tb['fecha'] ?></td>
                            <td><?php echo $row_tb['asistencia'] ?></td>
                            <td><?php echo $row_tb['observacion'] ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <?php } elseif ($us_id) { ?>
            <p>No se encontraron registros de asistencia para el ID de alumno ingresado.</p>
            <?php } ?>
        </div>
        <div class="col-a">
            <div>
                <a>Agregar</a>
            </div>
            <div class="btn_agregar">
            
                <a href="./asis_add.php?us_id=1" class="enlace-sin-decoracion">+</a>
            
            </div>
        </div>
    </div>
    
    <script>

    </script>

</body>

</html>
