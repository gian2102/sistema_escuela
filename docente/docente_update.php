<?php
function conectar_docente_update(){
    $host="localhost";
    $user="root";
    $pass="";

    $db="db_sistema";
    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$db);
    return $con;
}
$con = conectar_docente_update();

$us_id = $_GET['us_id'];
$id_edit = $_GET['id_edit'];

$sql = "SELECT * FROM tb_usuario WHERE us_id='$us_id'";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);

$sql_edit = "select * from tb_docente WHERE do_id='$id_edit'";
$query_edit = mysqli_query($con, $sql_edit);

$row_edit = mysqli_fetch_array($query_edit);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sidemenu.css">
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
            <form action="update.php" method="POST" id="myForm">
                <input type="hidden" name="id" value="<?php echo $row['us_id'] ?>">
                <input type="hidden" name="do_id" value="<?php echo $row_edit['do_id'] ?>">



                <div class="container">
                    <div class="box">
                        <input type="text" class="form-control mb-3" name="nombres" 
                            value="<?php echo $row_edit['do_nombre'] ?>" pattern="[A-Za-z ]+" placeholder="Edite solo letras y espacios" required>
                        <input type="text" class="form-control mb-3" name="apellidos" 
                            value="<?php echo $row_edit['do_apellido'] ?>" pattern="[A-Za-z ]+" placeholder="Edite solo letras y espacios" required>
                        <input type="text" class="form-control mb-3" name="dni" 
                            value="<?php echo $row_edit['do_dni'] ?>" pattern="[0-9]{8}" placeholder="Edite un DNI válido de 8 dígitos" required>
                        <input type="text" class="form-control mb-3" name="fech_nac" 
                            value="<?php echo $row_edit['do_fecha_nac'] ?>" pattern="\d{2}/\d{2}/\d{4}" placeholder="Edite con fecha válida en formato dd/mm/yyyy" required>
                        <input type="text" class="form-control mb-3" name="domicilio" 
                            value="<?php echo $row_edit['do_domicilio'] ?>" placeholder="Edite su dirección" required>
                        <input type="text" class="form-control mb-3" name="genero" 
                            value="<?php echo $row_edit['do_genero'] ?>" pattern="[MF]" placeholder="Edite 'M' para masculino o 'F' para femenino" required>
                        <input type="text" class="form-control mb-3" name="fech_contrat" 
                            value="<?php echo $row_edit['do_fecha_contrat'] ?>" pattern="\d{2}/\d{2}/\d{4}" placeholder="Edite con fecha válida en formato dd/mm/yyyy" required>
                        <input type="text" class="form-control mb-3" name="fech_fin_contrat" 
                            value="<?php echo $row_edit['do_fech_fin_contrat'] ?>" pattern="\d{2}/\d{2}/\d{4}" placeholder="Edite con fecha válida en formato dd/mm/yyyy" required>
                        <input type="text" class="form-control mb-3" name="especialidad" 
                            value="<?php echo $row_edit['do_especialidad'] ?>" placeholder="Edite especialidad" required>
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

        document.getElementById("myForm").addEventListener("submit", function(event) {
  
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

            //VALIDAR
            if (!regexSoloLetras.test(nombres)) {
                alert("Ingrese solo letras y espacios en el campo Nombres");
                event.preventDefault(); // Evitar el envío del formulario
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
