<?php
function conectar_mat(){
    $host="localhost";
    $user="root";
    $pass="";

    $db="db_sistema";
    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$db);
    return $con;
}
$con = conectar_mat();

$us_id = $_GET['us_id'];

$sql = "SELECT * FROM tb_usuario WHERE us_id='$us_id'";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);

$sql_tb = "SELECT mat.mat_id, sal.sal_grado, sal.sal_seccion, es.est_nombres, es.est_apellidos FROM tb_matricula mat INNER JOIN tb_salon sal ON sal.sal_grado = mat.grado AND sal.sal_seccion = mat.seccion
INNER JOIN tb_estudiante es ON es.est_id = mat.est_id
GROUP BY es.est_nombres, es.est_apellidos";
$query_tb = mysqli_query($con, $sql_tb);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Escuela</title>
</head>
<body>
    <?php
        $url = "../extensiones/head.php";
        include_once ($url);
    ?>
    <h1 class="title-modules">MATRICULA</h1>
    <div id="main-container" class="table-responsive">
        <div>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>NOMBRE</th>
                        <th>APELLIDOS</th>
                        <th>GRADO</th>
                        <th>SECCION</th>
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
                                <?php echo $row_tb['est_nombres'] ?>
                            </th>
                            <th>
                                <?php echo $row_tb['est_apellidos'] ?>
                            </th>
                            <th>
                                <?php echo $row_tb['sal_grado'] ?>
                            </th>
                            <th>
                                <?php echo $row_tb['sal_seccion'] ?>
                            </th>
                            <th><div class="btn-editar" onclick="window.location.href='./mat_update.php?us_id=<?php echo $row['us_id'] ?>&id_edit=<?php echo $row_tb['mat_id'] ?>'">
                            </div>
                            </th>
                            <th><div class="btn-eliminar" onclick="window.location.href='./mat_delete.php?us_id=<?php echo $row['us_id'] ?>&id_delete=<?php echo $row_tb['mat_id'] ?>'"></div>
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
                <a href="./mat_add.php?us_id=<?php echo $row['us_id'] ?>" class="enlace-sin-decoracion">+</a>
            </div>
        </div>

    </div>
    
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