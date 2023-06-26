<?php
function conectar_admin_delete(){
    $host="localhost";
    $user="root";
    $pass="";

    $db="db_sistema";
    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$db);
    return $con;
}
$con = conectar_admin_delete();

$us_id = $_GET['us_id'];
$id_delete = $_GET['id_delete'];

$sql = "SELECT * FROM tb_usuario WHERE us_id='$us_id'";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);

$sql_tb = "select * from tb_docente WHERE do_id='$id_delete'";
$query_tb = mysqli_query($con, $sql_tb);

$row_delete = mysqli_fetch_array($query_tb);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sidemenu.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Sistema Escuela</title>
</head>
<body>
    <?php
        $url = "../extensiones/head.php";
        include_once ($url);
    ?>
    <h1 class="title-modules">BIENVENIDO AL PANEL DE CONTROL</h1>
    <div id="main-container">
        <div class="conteiner-add">
            <h1>¿Seguro que desea eliminar?</h1>
            <form action="delete.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['us_id'] ?>">
                <input type="hidden" name="do_id" value="<?php echo $row_delete['do_id'] ?>">
                <input readonly type="text" class="form-control mb-3" name="nombres" 
                    value="<?php echo $row_delete['do_nombre'] ?>">
                <input readonly type="text" class="form-control mb-3" name="apellidos" 
                    value="<?php echo $row_delete['do_apellido'] ?>">
                <input readonly type="text" class="form-control mb-3" name="dni" 
                    value="<?php echo $row_delete['do_dni'] ?>">
                <input readonly type="text" class="form-control mb-3" name="fech_nac" 
                    value="<?php echo $row_delete['do_fecha_nac'] ?>">
                <input readonly type="text" class="form-control mb-3" name="domicilio" 
                    value="<?php echo $row_delete['do_domicilio'] ?>">
                <input readonly type="text" class="form-control mb-3" name="genero" 
                    value="<?php echo $row_delete['do_genero'] ?>">
                <input readonly type="text" class="form-control mb-3" name="fech_contrat" 
                    value="<?php echo $row_delete['do_fecha_contrat'] ?>">
                <input readonly type="text" class="form-control mb-3" name="fech_fin_contrat" 
                    value="<?php echo $row_delete['do_fech_fin_contrat'] ?>">
                <input readonly type="text" class="form-control mb-3" name="especialidad" 
                    value="<?php echo $row_delete['do_especialidad'] ?>">
                <input  type="submit" value="Eliminar">
            </form>
        </div>
        <div class="conteiner-btn">
            
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