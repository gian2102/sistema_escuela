<?php
function conectar_asis_add(){
    $host="localhost";
    $user="root";
    $pass="";

    $db="db_sistema";
    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$db);
    return $con;
}
$con = conectar_asis_add();

$us_id = $_GET['us_id'];

$sql = "SELECT * FROM tb_usuario WHERE us_id='$us_id'";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);

$sql_tb = "select * from tb_asistencia";
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

                <input type="text" name="Alumno_id" placeholder="ID Alumno" title="ID Alumno" required>
                <input type="text" name="Fecha" placeholder="Fecha" title="Fecha" value="<?php echo date('Y-m-d'); ?>" readonly>
                
                <div class="container-labels">
                    <label for="asistio">Asistió:</label>
                    <input type="radio" name="Asistencia" id="asistio" value="Asistio" required>
                    <label for="no_asistio">No asistió:</label>
                    <input type="radio" name="Asistencia" id="no_asistio" value="No asistio">
                </div>

                <input type="text" name="Observacion" placeholder="Observación" title="Observacion" required>

                <button type="submit" value="Registrar">Registrar</button>
            </form>
        </div>
    </div>
    
    <script>

        // document.querySelector('#myForm').addEventListener('submit', function(event) {

        //     var nombres = document.querySelector('input[name="nombres"]').value;
        //     var apellidos = document.querySelector('input[name="apellidos"]').value;
        //     var dni = document.querySelector('input[name="dni"]').value;
        //     var fech_nac = document.querySelector('input[name="fech_nac"]').value;
            
            // //REGEX
            // var regexSoloLetras = /^[A-Za-z\s]+$/;
            // var regexDNI = /^\d{8}$/;
            // var regexFecha = /^\d{2}\/\d{2}\/\d{4}$/;

            // //VALIDACION
            // if (!regexSoloLetras.test(nombres)) {
            //     alert("Ingrese solo letras y espacios en el campo Nombres");
            //     event.preventDefault();
            //     return;
            // }

            // if (!regexSoloLetras.test(apellidos)) {
            //     alert("Ingrese solo letras y espacios en el campo Apellidos");
            //     event.preventDefault();
            //     return;
            // }

            // if (!regexDNI.test(dni)) {
            //     alert("Ingrese un DNI válido de 8 dígitos en el campo DNI");
            //     event.preventDefault();
            //     return;
            // }

            // if (!regexFecha.test(fech_nac)) {
            //     alert("Ingrese una fecha válida en formato dd/mm/yyyy en el campo Fecha de nacimiento");
            //     event.preventDefault();
            //     return;
            // }

        //});
    </script>

</body>
</html>
