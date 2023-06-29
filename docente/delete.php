<?php
    include("conexion.php");
    $con = conectar();

    $id = $_POST['id'];

    $do_id = $_POST['do_id'];

    $sql = "DELETE FROM tb_asistencia WHERE do_id='$do_id'";
    $query = mysqli_query($con, $sql);

    if($query){
        $url = './asistencias.php?us_id='. $id;
        header('Location: ' . $url);
        
    }else {
    }
?>