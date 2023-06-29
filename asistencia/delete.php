<?php
    include("conexion.php");
    $con = conectar();

    $id = $_POST['id'];

    $alumno_id = $_POST['alumno_id'];

    $sql = "DELETE FROM tb_asistencia WHERE alumno_id='$alumno_id'";
    $query = mysqli_query($con, $sql);

    if($query){
        $url = './asistencias.php?us_id='. $id;
        header('Location: ' . $url);
        
    }else {
    }
?>