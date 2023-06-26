<?php
function conectar_hor(){
    $host="localhost";
    $user="root";
    $pass="";

    $db="db_sistema";
    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$db);
    return $con;
}
$con = conectar_hor();

$us_id = $_GET['us_id'];

$sql = "SELECT * FROM tb_usuario WHERE us_id='$us_id'";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);

$sql_tb = "select * from tb_horario";
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
    <h1 class="title-modules">HORARIOS</h1>
    <div id="main-container">
        <div>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>BLOQUE</th>
                        <th>HORA DE INICIO</th>   
                        <th>HORA DE FIN</th>
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
                                <?php echo $row_tb['hor_tipo'] ?>
                            </th>
                            <th>
                                <?php echo $row_tb['hor_inicio'] ?>
                            </th>
                            <th>
                                <?php echo $row_tb['hor_fin'] ?>
                            </th>
                            
                            <th><div class="btn-editar" onclick="window.location.href='./hor_update.php?us_id=<?php echo $row['us_id'] ?>&id_edit=<?php echo $row_tb['hor_id'] ?>'">
                            </div>
                            </th>
                            <th><div class="btn-eliminar" onclick="window.location.href='./hor_delete.php?us_id=<?php echo $row['us_id'] ?>&id_delete=<?php echo $row_tb['hor_id'] ?>'"></div>
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
                <a href="./hor_add.php?us_id=<?php echo $row['us_id'] ?>" class="enlace-sin-decoracion">+</a>
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