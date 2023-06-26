<?php
function conectar_admin_add(){
    $host="localhost";
    $user="root";
    $pass="";

    $db="db_sistema";
    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$db);
    return $con;
}
$con = conectar_admin_add();

$us_id = $_GET['us_id'];

$sql = "SELECT * FROM tb_usuario WHERE us_id='$us_id'";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);

$sql_tb = "select * from tb_usuario";
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
            <form action="insert.php" method="POST" id="myForm">
                <input type="hidden" name="id" value="<?php echo $row['us_id'] ?>">

                <input type="text" name="Nombre" placeholder="Nombre" pattern="[A-Za-z\s]+" title="Ingrese solo letras en el campo Nombre" required>
                <input type="text" name="Telefono" placeholder="Teléfono" pattern="\d{9}" title="Ingrese un número de teléfono válido de 9 dígitos" required>
                <input type="text" name="Usuario" placeholder="Usuario" required>
                <input type="password" name="Contra" placeholder="Contraseña" required>
                <input type="password" name="confirmarContra" placeholder="Confirmar contraseña" required>
                <input type="text" name="Privilegio" placeholder="Privilegio" pattern="[0-1]" title="Ingrese Privilegio" required>

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

        document.getElementById("myForm").addEventListener("submit", function(event) {
            
            var nombre = document.querySelector('input[name="Nombre"]').value;
            var telefono = document.querySelector('input[name="Telefono"]').value;
            var usuario = document.querySelector('input[name="Usuario"]').value;
            var contra = document.querySelector('input[name="Contra"]').value;
            var confirmarContra = document.querySelector('input[name="confirmarContra"]').value;
            var privilegio = document.querySelector('input[name="Privilegio"]').value;
            var mensaje = document.getElementById('mensaje');

            //REGEX
            var regexNombre = /^[A-Za-z\s]+$/;
            var regexTelefono = /^\d{9}$/;
            var regexPrivilegio = [0,1];

            //VALIDAR
            if (!regexNombre.test(nombre)) {
                alert("Ingrese solo letras en el campo Nombre");
                event.preventDefault(); 
                return;
            }

            if (!regexTelefono.test(telefono)) {
                alert("Ingrese un número de teléfono válido de 9 dígitos en el campo Teléfono");
                event.preventDefault(); 
                return;
            }

            if (usuario.trim() === "") {
                alert("Ingrese el usuario");
                event.preventDefault(); 
                return;
            }

            if (!regexPrivilegio.test(privilegio)) {
                alert("Ingrese 0 o 1");
                event.preventDefault(); 
                return;
            }

        });
    </script>

</body>

</html>