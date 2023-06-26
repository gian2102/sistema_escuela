<?php
    include("conexion.php");
    $con=conectar();

    $id = $_POST['id'];

    $fecha = $_POST['fecha'];
    $asistencia = $_POST['asistencia'];
    $observacion = $_POST['observacion'];

    $sql="INSERT INTO tb_asistencia VALUES(NULL,'$fecha','$asistencia','$observacion')";
    $query= mysqli_query($con,$sql);

    if($query){
        $url = './asistencias.php?us_id='. $id;
        header('Location: ' . $url);
    }else {
    }
?>