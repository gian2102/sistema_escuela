<?php
    function conectar_mat_add(){
        $host="localhost";
        $user="root";
        $pass="";

        $db="db_sistema";
        $con=mysqli_connect($host,$user,$pass);

        mysqli_select_db($con,$db);
        return $con;
    }
    $con = conectar_mat_add();

    $us_id = $_GET['us_id'];

    $sql = "SELECT * FROM tb_usuario WHERE us_id='$us_id'";
    $query = mysqli_query($con, $sql);

    $row = mysqli_fetch_array($query);

    $sql_tb = "SELECT mat.mat_id, mat.grado as sal_grado, mat.seccion as sal_seccion, es.est_nombres, es.est_apellidos FROM tb_matricula mat INNER JOIN tb_salon sal ON sal.sal_grado = mat.grado AND sal.sal_seccion = mat.seccion INNER JOIN tb_estudiante es ON es.est_id = mat.est_id GROUP BY es.est_nombres, es.est_apellidos";
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
    include_once($url);
    ?>
    <h1 class="title-modules">BIENVENIDO AL PANEL DE CONTROL</h1>
                
    <div id="feedback-form">
        <h2 class="header">Ingresar datos</h2>
        <div>
            <form action="insert.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['us_id'] ?>">

                <input type="text" name="grado" placeholder="Grado" pattern="[1-9]{1}[0-9]{0,1}" required>
                <input type="text" name="seccion" placeholder="Seccion" pattern="[A-Za-z0-9]{1,}" required>
                <input type="text" name="est_id" placeholder="ID ESTUDIANTE" pattern="[1-9]{1}[0-9]{0,}" required>


                <button type="submit" value="Registrar">Registrar</button>
            </form>
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