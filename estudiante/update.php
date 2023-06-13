<?php

    include("conexion.php");
    $con = conectar();

    $id = $_POST['id'];

    $est_id = $_POST['est_id'];
 
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $apoderado = $_POST['apoderado'];
    $telefono = $_POST['telefono'];
    $fecha = $_POST['fecha'];

    $sql = "UPDATE tb_estudiante SET est_nombres='$nombre',est_apellidos='$apellido',est_apoderado='$apoderado',est_apoderadocel='$telefono',est_fechnac='$fecha' WHERE est_id='$est_id'";
    $query = mysqli_query($con, $sql);

    if($query){
        $url = './estudiantes.php?us_id='. $id;
        header('Location: ' . $url);
        
    }else {
    }
?>