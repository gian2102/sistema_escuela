<?php
function conectar_docente_add(){
    $host="localhost";
    $user="root";
    $pass="";

    $db="db_sistema";
    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$db);
    return $con;
}
$con = conectar_docente_add();

$us_id = $_GET['us_id'];

$sql = "SELECT * FROM tb_usuario WHERE us_id='$us_id'";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);

$sql_tb = "select * from tb_docente";
$query_tb = mysqli_query($con, $sql_tb);
?>
<!DOCTYPE html>
<html lang="en">

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

                <input type="text" name="nombres" placeholder="Nombres" pattern="[A-Za-z ]+" title="Ingrese solo letras y espacios" required>
                <input type="text" name="apellidos" placeholder="Apellidos" pattern="[A-Za-z ]+" title="Ingrese solo letras y espacios" required>
                <input type="text" name="dni" placeholder="DNI" pattern="[0-9]{8}" title="Ingrese un DNI válido de 8 dígitos" required>
                <input type="text" name="fech_nac" placeholder="Fecha de nacimiento" pattern="\d{2}/\d{2}/\d{4}" title="Ingrese una fecha válida en formato dd/mm/yyyy" required>
                <input type="text" name="domicilio" placeholder="Domicilio" required>
                <input type="text" name="genero" placeholder="Género" pattern="[MF]" title="Ingrese 'M' para masculino o 'F' para femenino" required>
                <input type="date" name="fech_contrat" placeholder="Fecha de contrato" pattern="\d{2}/\d{2}/\d{4}" title="Ingrese una fecha válida en formato dd/mm/yyyy" required>
                <input type="date" name="fech_fin_contrat" placeholder="Fecha fin de contrato" pattern="\d{2}/\d{2}/\d{4}" title="Ingrese una fecha válida en formato dd/mm/yyyy" required>
                <input type="text" name="especialidad" placeholder="Especialidad" required>

                <button type="submit" value="Registrar">Registrar</button>
            </form>
        </div>
    </div>
    
    <script>

        document.querySelector('#myForm').addEventListener('submit', function(event) {

            var nombres = document.querySelector('input[name="nombres"]').value;
            var apellidos = document.querySelector('input[name="apellidos"]').value;
            var dni = document.querySelector('input[name="dni"]').value;
            var fech_nac = document.querySelector('input[name="fech_nac"]').value;
            var domicilio = document.querySelector('input[name="domicilio"]').value;
            var genero = document.querySelector('input[name="genero"]').value;
            var fech_contrat = document.querySelector('input[name="fech_contrat"]').value;
            var fech_fin_contrat = document.querySelector('input[name="fech_fin_contrat"]').value;
            var especialidad = document.querySelector('input[name="especialidad"]').value;
            
            //REGEX
            var regexSoloLetras = /^[A-Za-z\s]+$/;
            var regexDNI = /^\d{8}$/;
            var regexFecha = /^\d{2}\/\d{2}\/\d{4}$/;

            //VALIDACION
            if (!regexSoloLetras.test(nombres)) {
                alert("Ingrese solo letras y espacios en el campo Nombres");
                event.preventDefault();
                return;
            }

            if (!regexSoloLetras.test(apellidos)) {
                alert("Ingrese solo letras y espacios en el campo Apellidos");
                event.preventDefault();
                return;
            }

            if (!regexDNI.test(dni)) {
                alert("Ingrese un DNI válido de 8 dígitos en el campo DNI");
                event.preventDefault();
                return;
            }

            if (!regexFecha.test(fech_nac)) {
                alert("Ingrese una fecha válida en formato dd/mm/yyyy en el campo Fecha de nacimiento");
                event.preventDefault();
                return;
            }

        });
    </script>

</body>
</html>
