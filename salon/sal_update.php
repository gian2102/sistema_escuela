<?php
function conectar_sal_update(){
    $host="localhost";
    $user="root";
    $pass="";

    $db="db_sistema";
    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$db);
    return $con;
}
$con = conectar_sal_update();

$us_id = $_GET['us_id'];
$id_edit = $_GET['id_edit'];

$sql = "SELECT * FROM tb_usuario WHERE us_id='$us_id'";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);

$sql_edit = "select * from tb_salon WHERE sal_id='$id_edit'";
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
            <input type="hidden" name="sal_id" value="<?php echo $row_edit['sal_id'] ?>">
            <input type="text" class="form-control mb-3" name="grado" placeholder="Grado"
                value="<?php echo $row_edit['sal_grado'] ?>" pattern="[A-Za-z0-9\s]+" title="Ingrese un grado válido" required>
            <input type="text" class="form-control mb-3" name="seccion" placeholder="seccion"
                value="<?php echo $row_edit['sal_seccion'] ?>" pattern="[A-Za-z\s]+" title="Ingrese una sección válida" required>
            <input type="text" class="form-control mb-3" name="capacidad" placeholder="capacidad"
                value="<?php echo $row_edit['sal_capacidad'] ?>" pattern="[0-9]+" title="Ingrese una capacidad válida" required>
            <input type="text" class="form-control mb-3" name="doc_id" placeholder="ID DOCENTE"
                value="<?php echo $row_edit['doc_id'] ?>" pattern="[A-Za-z0-9\s]+" title="Ingrese un ID de docente válido" required>
            <input type="text" class="form-control mb-3" name="hor_id" placeholder="ID HORARIO"
                value="<?php echo $row_edit['hor_id'] ?>" pattern="[A-Za-z0-9\s]+" title="Ingrese un ID de horario válido" required>
            <input type="text" class="form-control mb-3" name="cur_id" placeholder="ID CURSO"
                value="<?php echo $row_edit['cur_id'] ?>" pattern="[A-Za-z0-9\s]+" title="Ingrese un ID de curso válido" required>

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
