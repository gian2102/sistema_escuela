<?php
function conectar_est_update(){
    $host="localhost";
    $user="root";
    $pass="";

    $db="db_sistema";
    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$db);
    return $con;
}
$con = conectar_est_update();

$us_id = $_GET['us_id'];
$id_edit = $_GET['id_edit'];

$sql = "SELECT * FROM tb_usuario WHERE us_id='$us_id'";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);

$sql_edit = "select * from tb_estudiante WHERE est_id='$id_edit'";
$query_edit = mysqli_query($con, $sql_edit);

$row_edit = mysqli_fetch_array($query_edit);
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
    <h1 class="title-modules">BIENVENIDO AL PANEL DE CONTROL</h1>
    <div id="main-container">
        <div class="conteiner-add">
            <h1>Editar datos</h1>
            <form action="update.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['us_id'] ?>">
                <input type="hidden" name="est_id" value="<?php echo $row_edit['est_id'] ?>">
                <input type="text" class="form-control mb-3" name="nombre" placeholder="nombre" pattern="[A-Za-z\s]+" title="Ingrese solo letras en el campo nombre" value="<?php echo $row_edit['est_nombres'] ?>" required>
                <input type="text" class="form-control mb-3" name="apellido" placeholder="apellido" pattern="[A-Za-z\s]+" title="Ingrese solo letras en el campo apellido" value="<?php echo $row_edit['est_apellidos'] ?>" required>
                <input type="text" class="form-control mb-3" name="apoderado" placeholder="apoderado" pattern="[A-Za-z\s]+" title="Ingrese solo letras en el campo apoderado" value="<?php echo $row_edit['est_apoderado'] ?>" required>
                <input type="text" class="form-control mb-3" name="telefono" placeholder="telefono" pattern="\d{9}" title="Ingrese un número de teléfono válido de 9 dígitos" value="<?php echo $row_edit['est_apoderadocel'] ?>" required>
                <input type="date" class="form-control mb-3" name="fecha" placeholder="fecha" value="<?php echo $row_edit['est_fechnac'] ?>" required>

                <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
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
