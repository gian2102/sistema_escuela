<?php
function conectar_mat_update(){
    $host="localhost";
    $user="root";
    $pass="";

    $db="db_sistema";
    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$db);
    return $con;
}
$con = conectar_mat_update();

$us_id = $_GET['us_id'];
$id_edit = $_GET['id_edit'];

$sql = "SELECT * FROM tb_usuario WHERE us_id='$us_id'";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);

$sql_edit = "select * from tb_matricula WHERE mat_id='$id_edit'";
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
    include_once($url);
    ?>
    <h1 class="title-modules">BIENVENIDO AL PANEL DE CONTROL</h1>
    <div id="main-container">
        <div class="conteiner-add">
            <h1>Editar datos</h1>
            <form action="update.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['us_id'] ?>">
                <input type="hidden" name="mat_id" value="<?php echo $row_edit['mat_id'] ?>">

                <input type="text" class="form-control mb-3" name="grado" placeholder="grado"
                    value="<?php echo $row_edit['grado'] ?>" pattern="[1-9]{1}[0-9]{0,}">
                <input type="text" class="form-control mb-3" name="seccion" placeholder="seccion"
                    value="<?php echo $row_edit['seccion'] ?>" pattern="[A-Za-z0-9]{1,}">
                <input type="text" class="form-control mb-3" name="est_id" placeholder="ID Estudiante"
                    value="<?php echo $row_edit['est_id'] ?>" pattern="[1-9]{1}[0-9]{0,}">

                <input type="submit" class="btn btn-primary btn-block" value="Actualizar"
                    onclick="return validateForm()">
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

        function validateForm() {
            const gradoInput = document.querySelector('input[name="grado"]');
            const seccionInput = document.querySelector('input[name="seccion"]');
            const estIdInput = document.querySelector('input[name="est_id"]');

            const gradoPattern = /^[1-9][0-9]{0,}$/;
            const seccionPattern = /^[A-Za-z0-9]{1,}$/;
            const estIdPattern = /^[1-9][0-9]{0,}$/;

            if (!gradoPattern.test(gradoInput.value)) {
                alert("El campo 'grado' debe ser un número de 1 o más dígitos.");
                return false;
            }

            if (!seccionPattern.test(seccionInput.value)) {
                alert("El campo 'seccion' debe contener al menos un carácter alfanumérico.");
                return false;
            }

            if (!estIdPattern.test(estIdInput.value)) {
                alert("El campo 'ID Estudiante' debe ser un número de 1 o más dígitos.");
                return false;
            }

            return true;
        }
    </script>

</body>

</html>
