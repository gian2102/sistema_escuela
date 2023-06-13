<?php
    include("conexion.php");
    $con = conectar();

    $id = $_POST['id'];

    $est_id = $_POST['est_id'];

    $sql = "DELETE FROM tb_estudiante WHERE est_id='$est_id'";
    $query = mysqli_query($con, $sql);

    if($query){
        $url = './estudiantes.php?us_id='. $id;
        header('Location: ' . $url);
        
    }else {
    }
?>