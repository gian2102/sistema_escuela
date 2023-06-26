<?php
function conectar_est_add(){
    $host="localhost";
    $user="root";
    $pass="";

    $db="db_sistema";
    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$db);
    return $con;
}
$con = conectar_est_add();

$us_id = $_GET['us_id'];

$sql = "SELECT * FROM tb_usuario WHERE us_id='$us_id'";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);

$sql_tb = "select * from tb_estudiante";
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
    <h1 class="title-modules">BIENVENIDO AL PANEL DE CONTROL</h1>
        
    <div id="feedback-form">
        <h2 class="header">Ingresar datos</h2>
        <div>
            <form action="insert.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['us_id'] ?>">

                <input type="text" name="Nombre" placeholder="Nombre" pattern="[A-Za-z\s]+" title="Ingrese solo letras en el campo Nombre" required>
                <input type="text" name="Apellidos" placeholder="Apellidos" pattern="[A-Za-z\s]+" title="Ingrese solo letras en el campo Apellidos" required>
                <input type="text" name="Apoderado" placeholder="Apoderado" pattern="[A-Za-z\s]+" title="Ingrese solo letras en el campo Apoderado" required>
                <input type="text" name="Telefono" placeholder="Teléfono" pattern="\d{9}" title="Ingrese un número de teléfono válido de 9 dígitos" required>
                <input type="date" name="Fechanac" placeholder="Fecha de nacimiento" required>

                <button type="submit" value="Registrar">Registrar</button>
            </form>
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