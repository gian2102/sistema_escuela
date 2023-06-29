<?php
    include("conexion.php");
    $con=conectar();

    $id = $_POST['id'];

    $alumno_id = $_POST['Alumno_id']; 
    $fecha = $_POST['Fecha'];
    $asistencia = $_POST['Asistencia'];
    $observacion = $_POST['Observacion'];

    $sql="INSERT INTO tb_asistencia VALUES(NULL,'$alumno_id','$fecha', '$asistencia','$observacion')";    
    $query= mysqli_query($con,$sql);

    if($query){
        $url = './asistencias.php?us_id='. $id;
        header('Location: ' . $url);
    }else {
    }
?>