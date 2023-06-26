<?php
function conectar_docente(){
    $host="localhost";
    $user="root";
    $pass="";

    $db="db_sistema";
    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$db);
    return $con;
}
$con = conectar_docente();

$us_id = $_GET['us_id'];

$sql = "SELECT * FROM tb_usuario WHERE us_id='$us_id'";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);

$sql_tb = "select * from tb_docente";
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
    <h1 class="title-modules">DOCENTES</h1>
    <div id="main-container" class="table-responsive">
        <div>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>NOMBRES</th>
                        <th>APELLIDOS</th>
                        <th>DNI</th>
                        <th>ESPECIALIDAD</th>
                        <th>DOMICILIO</th>
                        <th>FECHA CONTRATO</th>
                        <th>FECHA FIN DE CONTRATO</th>
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
                                <?php echo $row_tb['do_nombre'] ?>
                            </th>
                            <th>
                                <?php echo $row_tb['do_apellido'] ?>
                            </th>
                            <th>
                                <?php echo $row_tb['do_dni'] ?>
                            </th>
                            <th>
                                <?php echo $row_tb['do_especialidad'] ?>
                            </th>
                            <th>
                                <?php echo $row_tb['do_domicilio'] ?>
                            </th>
                            <th>
                                <?php echo $row_tb['do_fecha_contrat'] ?>
                            </th>
                            <th>
                                <?php echo $row_tb['do_fech_fin_contrat'] ?>
                            </th>
                            <th><div class="btn-editar" onclick="window.location.href='./docente_update.php?us_id=<?php echo $row['us_id'] ?>&id_edit=<?php echo $row_tb['do_id'] ?>'">
                            </div>
                            </th>
                            <th><div class="btn-eliminar" onclick="window.location.href='./docente_delete.php?us_id=<?php echo $row['us_id'] ?>&id_delete=<?php echo $row_tb['do_id'] ?>'"></div>
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
                <a href="./docente_add.php?us_id=<?php echo $row['us_id'] ?>" class="enlace-sin-decoracion">+</a>
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