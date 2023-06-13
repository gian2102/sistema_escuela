<?php

    include("conexion.php");
    $con = conectar();

    $id = $_POST['id'];

    $hor_id = $_POST['hor_id'];
 
    $nombre = $_POST['nombre'];
    $inicio = $_POST['inicio'];
    $fin = $_POST['fin'];


    $sql = "UPDATE tb_horario SET hor_tipo='$nombre' ,hor_inicio='$inicio',hor_fin='$fin' WHERE hor_id='$hor_id'";
    $query = mysqli_query($con, $sql);

    if($query){
        $url = './horarios.php?us_id='. $id;
        header('Location: ' . $url);
        
    }else {
    }
?>