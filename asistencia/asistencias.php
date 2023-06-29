<?php
function conectar_asistencia(){
    $host="localhost";
    $user="root";
    $pass="";

    $db="db_sistema";
    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$db);
    return $con;
}

$con = conectar_asistencia();

$us_id = $_GET['us_id'];

$sql = "SELECT * FROM tb_usuario WHERE us_id='$us_id'";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);

$sql_tb = "select * from tb_asistencia";
$query_tb = mysqli_query($con, $sql_tb);
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

    <h2 id="fecha"></h2>

    <div id="main-container" class="table-responsive">
        <div>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>ALUMNO ID</th>
                        <th>FECHA</th>
                        <th>ASISTENCIA</th>
                        <th>OBSERVACIÓN</th>
                        <th></th>   
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    while ($row_tb = mysqli_fetch_array($query_tb)) {
                        ?>
                        <tr>
                            <th>
                                <?php echo $row_tb['alumno_id'] ?>
                            </th>
                            <th>
                                <?php echo $row_tb['fecha'] ?>
                            </th>
                            <th>
                                <?php echo $row_tb['asistencia'] ?>
                            </th>
                            <th>
                                <?php echo $row_tb['observacion'] ?>
                            </th>

                            <th><div class="btn-editar" onclick="window.location.href='./asis_update.php?us_id=<?php echo $row['us_id'] ?>&id_edit=<?php echo $row_tb['alumno_id'] ?>'">
                            </div>
                            </th>
                            <th><div class="btn-eliminar" onclick="window.location.href='./asis_delete.php?us_id=<?php echo $row['us_id'] ?>&id_delete=<?php echo $row_tb['alumno_id'] ?>'"></div>
                            </th>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-a">
            <div>
                <a>Agregar</a>
            </div>
            <div class="btn_agregar">
                <a href="./asis_add.php?us_id=<?php echo $row['us_id'] ?>" class="enlace-sin-decoracion">+</a>
            </div>
        </div>

    </div>
    
    <script>
        

        setInterval(() => {
            let fecha = new Date();
            let fechaHora = fecha.toLocaleString();
            document.getElementById("fecha").textContent = fechaHora;
        }, 1000);
    </script>

</body>

</html>