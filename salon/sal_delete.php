<?php
function conectar_sal_delete(){
    $host="localhost";
    $user="root";
    $pass="";

    $db="db_sistema";
    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$db);
    return $con;
}
$con = conectar_sal_delete();

$us_id = $_GET['us_id'];
$id_delete = $_GET['id_delete'];

$sql = "SELECT * FROM tb_usuario WHERE us_id='$us_id'";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);

$sql_tb = "select * from tb_salon WHERE sal_id='$id_delete'";
$query_tb = mysqli_query($con, $sql_tb);

$row_delete = mysqli_fetch_array($query_tb);
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
            <h1>¿Seguro que desea eliminar?</h1>
            <form action="delete.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['us_id'] ?>">
                <input type="hidden" name="sal_id" value="<?php echo $row_delete['sal_id'] ?>">
                <input readonly type="text" class="form-control mb-3" name="grado" placeholder="Grado"
                value="<?php echo $row_delete['sal_grado'] ?>">
                <input readonly type="text" class="form-control mb-3" name="seccion" placeholder="seccion"
                    value="<?php echo $row_delete['sal_seccion'] ?>">
                <input readonly type="text" class="form-control mb-3" name="capacidad" placeholder="capacidad"
                    value="<?php echo $row_delete['sal_capacidad'] ?>">
                <input readonly type="text" class="form-control mb-3" name="doc_id" placeholder="ID DOCENTE"
                    value="<?php echo $row_delete['doc_id'] ?>">
                <input readonly type="text" class="form-control mb-3" name="hor_id" placeholder="ID HORARIO"
                    value="<?php echo $row_delete['hor_id'] ?>">
                <input readonly type="text" class="form-control mb-3" name="cur_id" placeholder="ID CURSO"
                    value="<?php echo $row_delete['cur_id'] ?>">
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