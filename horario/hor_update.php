<?php
function conectar_hor_update(){
    $host="localhost";
    $user="root";
    $pass="";

    $db="db_sistema";
    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$db);
    return $con;
}
$con = conectar_hor_update();

$us_id = $_GET['us_id'];
$id_edit = $_GET['id_edit'];

$sql = "SELECT * FROM tb_usuario WHERE us_id='$us_id'";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);

$sql_edit = "select * from tb_horario WHERE hor_id='$id_edit'";
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
                <input type="hidden" name="hor_id" value="<?php echo $row_edit['hor_id'] ?>">

                
                
                <div class="container">
                    <div class="box">
                    <input type="text" class="form-control mb-3" name="nombre" placeholder="Bloque" pattern="Bloque [1-9]" value="<?php echo $row_edit['hor_tipo'] ?>" required>
                <input type="time" class="form-control mb-3" name="inicio" placeholder="Hora de inicio" required value="<?php echo $row_edit['hor_inicio'] ?>">
                <input type ="time" class="form-control mb-3" name="fin" placeholder="Hora de fin" required value="<?php echo $row_edit['hor_fin'] ?>">   
                    </div>       
                </div> 

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