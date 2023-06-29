<?php
include("../conexion.php");
$con = conectar();

$us_id = $_GET['us_id'];

$sql = "SELECT * FROM tb_usuario WHERE us_id='$us_id'";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);
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
    <div id="sidemenu" class="menu-collapsed">

        <div id="header">
            <div id="title"><span>ADMINISTRACIÓN</span></div>
            <div id="menu-btn">
                <div class="btn-barramenu"></div>
                <div class="btn-barramenu"></div>
                <div class="btn-barramenu"></div>
            </div>
        </div>
        <div id="profile">
            <div id="photo"><img src="../img/logo.png" alt=""></div>
            <div id="name"><span>
                    <?php echo $row['us_nombre'] ?>
                </span></div>
        </div>
        <div id="menu-items">
            <div class="item">
                <a href="../administrativo/administradores.php?us_id=<?php echo $row['us_id'] ?>">
                    <div class="icon"><img src="../img/administrador.png" alt=""></div>
                    <div class="title"><span>Administradores</span></div>
                </a>
            </div>
            <div class="item">
                <a href="../docente/docentes.php?us_id=<?php echo $row['us_id'] ?>">
                    <div class="icon"><img src="../img/docente.png" alt=""></div>
                    <div class="title"><span>Docentes</span></div>
                </a>
            </div>
            <div class="item">
                <a href="../horario/horarios.php?us_id=<?php echo $row['us_id'] ?>">
                    <div class="icon"><img src="../img/horario.png" alt=""></div>
                    <div class="title"><span>Horarios</span></div>
                </a>
            </div>
            <div class="item">
                <a href="../curso/cursos.php?us_id=<?php echo $row['us_id'] ?>">
                    <div class="icon"><img src="../img/cursos.png" alt=""></div>
                    <div class="title"><span>Cursos</span></div>
                </a>
            </div>
            <div class="item">
                <a href="../salon/salones.php?us_id=<?php echo $row['us_id'] ?>">
                    <div class="icon"><img src="../img/salon.png" alt=""></div>
                    <div class="title"><span>Salones</span></div>
                </a>
            </div>
            <div class="item">
                <a href="../estudiante/estudiantes.php?us_id=<?php echo $row['us_id'] ?>">
                    <div class="icon"><img src="../img/estudiantes.png" alt=""></div>
                    <div class="title"><span>Estudiantes</span></div>
                </a>
            </div>
            <div class="item">
                <a href="../matricula/matriculas.php?us_id=<?php echo $row['us_id'] ?>">
                    <div class="icon"><img src="../img/matricula.png" alt=""></div>
                    <div class="title"><span>Matrícula</span></div>
                </a>
            </div>
            <div class="item">
                <a href="../asistencia/asistencias.php?us_id=<?php echo $row['us_id'] ?>">
                    <div class="icon"><img src="../img/matricula.png" alt=""></div>
                    <div class="title"><span>Asistencia</span></div>
                </a>
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